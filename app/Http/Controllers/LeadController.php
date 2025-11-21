<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\AccountIndustry;
use App\Models\AccountType;
use App\Models\Campaign;
use App\Models\Contact;
use App\Models\Document;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadType;
use App\Models\Plan;
use App\Models\Stream;
use App\Models\Task;
use App\Models\Utility;
use App\Models\User;
use App\Models\SalesOrder;
use App\Models\LeadStatuses;
use App\Models\UserDefualtView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\LeadExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LeadImport;
use Illuminate\Support\Facades\Log;

class LeadController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->can('Manage Lead')) {
            if (\Auth::user()->type == 'owner') {
                $leads = Lead::with('assign_user', 'leadType', 'product', 'LeadSource')->where('disposition', '!=', 1)->where('user_id', \Auth::user()->id)->latest()->get();
                $defualtView = new UserDefualtView();
                $defualtView->route = \Request::route()->getName();
                $defualtView->module = 'lead';
                $defualtView->view = 'list';
                User::userDefualtView($defualtView);
            } else {
                $leads = Lead::with('assign_user', 'leadType', 'product', 'LeadSource')->where('disposition', '!=', 1)->where('user_id', \Auth::user()->id)->latest()->get();
                $defualtView = new UserDefualtView();
                $defualtView->route = \Request::route()->getName();
                $defualtView->module = 'lead';
                $defualtView->view = 'list';
            }
            $status = collect(Lead::$disposition);
            return view('lead.index', compact('leads', 'status'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type, $id) {
        if (\Auth::user()->can('Create Lead')) {
            $user = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', '');
            $leadsource = LeadSource::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign = Campaign::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign->prepend('--', 0);
            $industry = AccountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', 0);
            $product = Product::get()->mapWithKeys(function ($product) {
                return [$product->id] = $product->model . ' (' . $product->part_name . ')';
            });
            $product->prepend('--', 0);
            $leadTypes = LeadType::pluck('name', 'id');
            $leadTypes->prepend('--', 0);
            $status = Lead::$disposition;

            // Add part types
            $partTypes = collect([
                'Engine Parts' => 'Engine Parts',
                'Transmission Parts' => 'Transmission Parts',
                'Electronics' => 'Brake Parts',
                'Suspension Parts' => 'Suspension Parts',
                'Electrical Parts' => 'Electrical Parts',
                'Body Parts' => 'Body Parts',
                'Interior Parts' => 'Interior Parts',
                'Exhaust Parts' => 'Exhaust Parts',
                'Cooling System Parts' => 'Cooling System Parts',
                'Fuel System Parts' => 'Fuel System Parts',
                'Other' => 'Other'
            ]);
            $partTypes->prepend('--', '');

            // Add brands for vehicle information
            $brands = ProductBrand::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $brands->prepend('--', 0);

            // Add part numbers for vehicle information
            $partNumbers = Product::where('created_by', \Auth::user()->creatorId())
                    ->whereNotNull('part_number')
                    ->where('part_number', '!=', '')
                    ->distinct()
                    ->pluck('part_number', 'part_number');
            $partNumbers->prepend('--', 0);

            // Generate year options (same as product form)
            $currentYear = date('Y');
            $years = [];
            for ($i = $currentYear - 30; $i <= $currentYear + 10; $i++) {
                $years[$i] = $i;
            }
            $years = array_reverse($years, true); // Most recent years first

            return view('lead.create', compact('status', 'leadsource', 'user', 'account', 'product', 'industry', 'campaign', 'leadTypes', 'brands', 'partNumbers', 'years', 'partTypes', 'type', 'id'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if (\Auth::user()->can('Create Lead')) {

            // Log incoming request data
            Log::info('Lead creation request received', [
                'user_id' => \Auth::user()->id,
                'request_data' => $request->all(),
                'lead_type_id_received' => $request->lead_type_id,
                'timestamp' => now()
            ]);

            $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|max:120',
                        'phone' => 'required|numeric',
                        'email' => 'nullable|email',
                        'lead_postalcode' => 'nullable|numeric',
                        'opportunity_amount' => 'nullable|numeric',
                        'disposition' => 'nullable',
                        'source' => 'nullable',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                // Log validation errors
                Log::warning('Lead creation validation failed', [
                    'user_id' => \Auth::user()->id,
                    'validation_errors' => $messages->all(),
                    'request_data' => $request->all()
                ]);

                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $lead = new Lead();
                $lead['user_id'] = (!empty($request->user) ? ($request->user) : \Auth::user()->creatorId());
                $lead['lead_type_id'] = ($request->lead_type_id && $request->lead_type_id != '0') ? $request->lead_type_id : null;
                $lead['name'] = $request->name;
                $lead['cust_name'] = $request->cust_name;
                $lead['contact'] = $request->contact;
                $lead['account'] = $request->account;
                $lead['product_id'] = $request->product;
                $lead['email'] = $request->email;
                $lead['phone'] = $request->phone;
                $lead['part_name'] = $request->part_name;
                $lead['title'] = $request->title;
                $lead['website'] = $request->website;
                $lead['date'] = $request->date;
                $lead['lead_address'] = $request->lead_address;
                $lead['lead_city'] = $request->lead_city;
                $lead['lead_state'] = $request->lead_state;
                $lead['lead_country'] = $request->lead_country;
                $lead['lead_postalcode'] = $request->lead_postalcode;
                $lead['disposition'] = $request->disposition;
                $lead['note'] = $request->note;
                $lead['source'] = $request->source;
                $lead['opportunity_amount'] = $request->opportunity_amount;
                $lead['campaign'] = $request->campaign ?: 0;
                $lead['industry'] = $request->industry ?: 0;
                $lead['description'] = $request->description;
                // $lead['vehicle_year'] = $request->vehicle_year;
                // $lead['vehicle_brand'] = $request->vehicle_brand;
                // $lead['vehicle_part_number'] = $request->vehicle_part_number;
                $lead['user_id'] = \Auth::user()->id;
                $lead->save();

                // Log successful lead creation
                Log::info('Lead successfully created', [
                    'lead_id' => $lead->id,
                    'lead_name' => $lead->name,
                    'lead_email' => $lead->email,
                    'lead_phone' => $lead->phone,
                    'lead_type_id_saved' => $lead->lead_type_id,
                    'timestamp' => now()
                ]);

                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'log_type' => 'created',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'lead',
                                        'stream_comment' => '',
                                        'user_name' => $lead->name,
                                    ]
                            ),
                        ]
                );
                if (!empty($request->email)) {
                    $uArr = [
                        'lead_name' => $lead->name,
                        'lead_email' => $lead->email,
                    ];
                    $resp = Utility::sendEmailTemplate('lead_assign', [$lead->id => $lead->email], $uArr);
                }
                //webhook
                $module = 'New Lead';
                $webhook = Utility::webhookSetting($module);
                if ($webhook) {
                    $parameter = json_encode($lead);
                    // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                    $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                    if ($status != true) {
                        $msg = "Webhook call failed.";
                    }
                }
                if (Auth::user()) {
                    $successMessage = __('Lead successfully created!') . ' Lead ID: ' . $lead->id . ' | Name: ' . $lead->name . ' | Phone: ' . $lead->phone;
                    if (isset($msg)) {
                        $successMessage .= '<br> <span class="text-danger">' . $msg . '</span>';
                    }
                    return redirect()->back()->with('success', $successMessage);
                } else {
                    return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
                }
                $Assign_user_phone = User::where('id', $request->user)->first();
                $setting = Utility::settings(\Auth::user()->creatorId());
                if (!empty($request->email)) {
                    $uArr = [
                        'lead_name' => $lead->name,
                        'lead_email' => $lead->email,
                            // 'lead_assign_user' => $Assign_user_phone->name,
                    ];

                    // $resp = Utility::sendEmailTemplate('lead_assigned', [$lead->id => $Assign_user_phone->email], $uArr);



                    if (isset($setting['twilio_lead_create']) && $setting['twilio_lead_create'] == 1) {
                        // $msg = __("New Lead created by") . ' ' . \Auth::user()->name . '.';

                        $uArr = [
                            // 'company_name'  => $lead->name,
                            'lead_email' => $lead->email,
                            'lead_name' => $lead->name
                        ];
                        Utility::send_twilio_msg($Assign_user_phone->phone, 'new_lead', $uArr);
                    }
                }
            } catch (\Exception $e) {
                // Log detailed error information
                Log::error('Lead creation failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'request_data' => $request->all(),
                    'timestamp' => now()
                ]);
                return redirect()->back()->with('error', 'Failed to create lead: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Lead $lead) {

        if (\Auth::user()->can('Show Lead')) {
            $status = collect(Lead::$disposition);
            $lead->load('leadType', 'product', 'assign_user');
            return view('lead.view', compact('lead', 'status'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Lead $lead) {
        if (\Auth::user()->can('Edit Lead')) {
            $status = Lead::$disposition;
            $source = LeadSource::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            $account = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', 0);
            $industry = AccountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $parent = 'lead';
            $tasks = Task::where('parent', $parent)->where('parent_id', $lead->id)->get();
            $log_type = 'lead comment';
            $streams = Stream::where('log_type', $log_type)->get();
            $campaign = Campaign::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $campaign->prepend('--', 0);

            // Updated product selection to match create method
            $products = Product::all();
            $product = [];
            foreach ($products as $product_value) {
                $product[$product_value['id']] = $product_value->year.' - '.$product_value->make.' - ( '.$product_value->model . ' ' . $product_value->part_name . ' )';
            }
            $leadTypes = LeadType::pluck('name', 'id');
            $leadTypes->prepend('--', 0);

            // Add part types
            $partTypes = collect([
                'Engine Parts' => 'Engine Parts',
                'Transmission Parts' => 'Transmission Parts',
                'Electronic' => 'Electronic',
                'Wiring' => 'Wiring',
                'Mechanical' => 'Mechanical',
                'Electrical' => 'Electrical',
                'Body Parts' => 'Body Parts',
                'Interior Parts' => 'Interior Parts',
                'Body Part' => 'Body Part',
                'Other' => 'Other'
            ]);
            $partTypes->prepend('--', '');

            // get previous user id
            $previous = Lead::where('id', '<', $lead->id)->max('id');
            // get next user id
            $next = Lead::where('id', '>', $lead->id)->min('id');

            return view('lead.edit', compact('lead', 'account', 'product', 'user', 'source', 'industry', 'status', 'tasks', 'streams', 'campaign', 'leadTypes', 'partTypes', 'previous', 'next'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lead $lead) {
        if (\Auth::user()->can('Edit Lead')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'cust_name' => 'required|max:120',
                        'contact' => 'required|numeric',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $lead['cust_name'] = $request->cust_name;
                $lead['lead_type_id'] = ($request->lead_type_id && $request->lead_type_id != '0') ? $request->lead_type_id : null;
                $lead['contact'] = $request->contact;
                $lead['product_id'] = $request->product;
                $lead['email'] = $request->email;
                $lead['date'] = $request->date;
                $lead['disposition'] = $request->disposition;
                $lead['note'] = $request->note;
                $lead['user_id'] = \Auth::user()->id;
                $lead->update();

                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'log_type' => 'updated',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'lead',
                                        'stream_comment' => '',
                                        'user_name' => $lead->cust_name,
                                    ]
                            ),
                        ]
                );

                LeadStatuses::create(
                        [
                            'created_by' => \Auth::user()->id,
                            'lead_id' => $lead->id,
                            'lead_status' => $request->disposition,
                            'followup_note' => $request->note
                        ]
                );
                if ($request->disposition == 1) {
                    SalesOrder::create(
                            [
                                'sale_date' => date("Y-m-d"),
                                'lead_id' => $lead->id,
                                'sales_user_id' => \Auth::user()->id,
                            ]
                    );
                    return redirect('/lead');
                }
                return redirect()->back()->with('success', __('Lead Successfully Updated.'));
            } catch (\Exception $e) {
                Log::error('Lead error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while creating the Lead',
                            'error' => $e->getMessage()
                                ], 500);
            }
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Lead $lead
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lead $lead) {
        if (\Auth::user()->can('Delete Lead')) {
            $lead->delete();

            return redirect()->back()->with('success', __('Lead Successfully Deleted.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function grid() {
        $leads = Lead::with('leadType')->get();
        $statuss = Lead::get();

        // if($leads->isNotEmpty())
        // {
        //     $users = user::where('id', $leads[0]->user_id)->get();
        // }

        $defualtView = new UserDefualtView();
        $defualtView->route = \Request::route()->getName();
        $defualtView->module = 'lead';
        $defualtView->view = 'kanban';
        User::userDefualtView($defualtView);
        // if($leads->isEmpty())
        // {
        //     return view('lead.grid', compact( 'statuss'));
        // }
        // else
        // {
        //      return view('lead.grid', compact('leads', 'statuss','users'));
        // }
        return view('lead.grid', compact('leads', 'statuss'));
    }

    public function changeorder(Request $request) {
        $post = $request->all();
        $lead = Lead::find($post['lead_id']);
        $status = Lead::where('disposition', $post['status_id'])->get();

        if (!empty($status)) {
            $lead->disposition = $post['status_id'];
            $lead->save();
        }

        foreach ($post['order'] as $key => $item) {
            $order = Lead::find($item);
            $order->disposition = $post['status_id'];
            $order->save();
        }
    }

    public function showConvertToAccount($id) {
        if (\Auth::user()->type == 'owner') {
            $lead = Lead::findOrFail($id);
            $accountype = accountType::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $industry = accountIndustry::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $document_id = Document::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('lead.convert', compact('lead', 'accountype', 'industry', 'user', 'document_id'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function convertToAccount($id, Request $request) {
        if (\Auth::user()->type == 'owner') {
            $lead = Lead::findOrFail($id);
            $usr = \Auth::user();

            $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required',
                        'email' => 'required|email|unique:accounts,email',
                        'shipping_postalcode' => 'required',
                        'lead_postalcode' => 'required',
                    ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $account = new account();
            $account['user_id'] = $request->user;
            $account['document_id'] = $request->document_id;
            $account['name'] = $request->name;
            $account['email'] = $request->email;
            $account['phone'] = $request->phone;
            $account['website'] = $request->website;
            $account['billing_address'] = $request->lead_address;
            $account['billing_city'] = $request->lead_city;
            $account['billing_state'] = $request->lead_state;
            $account['billing_country'] = $request->lead_country;
            $account['billing_postalcode'] = $request->lead_postalcode;
            $account['shipping_address'] = $request->shipping_address;
            $account['shipping_city'] = $request->shipping_city;
            $account['shipping_state'] = $request->shipping_state;
            $account['shipping_country'] = $request->shipping_country;
            $account['shipping_postalcode'] = $request->shipping_postalcode;
            $account['type'] = $request->type;
            $account['industry'] = $request->industry;
            $account['description'] = $request->description;
            $account['created_by'] = \Auth::user()->creatorId();
            $account->save();
            // end create deal
            // Update is_converted field as deal_id
            $lead->is_converted = $account->id;
            $lead->save();

            return redirect()->back()->with('success', __('Lead successfully converted.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function fileExport() {
        $name = 'lead_' . date('Y-m-d i:h:s');
        $data = Excel::download(new LeadExport(), $name . '.xlsx');
        ob_end_clean();

        return $data;
    }

    public function fileImportExport() {

        return view('lead.import');
    }

    public function fileImport(Request $request) {

        $rules = [
            'file' => 'required|mimes:csv,txt,xlsx',
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $leads = Excel::toArray(new LeadImport(), request()->file('file'))[0];

        $totalLead = count($leads) - 1;
        $errorArray = [];
        for ($i = 1; $i <= count($leads) - 1; $i++) {
            $lead = $leads[$i];

            $leadByEmail = Lead::where('email', $lead[4])->first();

            if (!empty($leadByEmail)) {
                $leadData = $leadByEmail;
            } else {
                $leadData = new Lead();
            }
            $leadData['id'] = $lead[0] ?? '';
            $leadData['user_id'] = $lead[1] ?? '0';
            $leadData['name'] = $lead[2] ?? '';
            $leadData['account'] = $lead[3] ?? '';
            $leadData['email'] = $lead[4] ?? '';
            $leadData['phone'] = $lead[5] ?? '';
            $leadData['title'] = $lead[6] ?? '';
            $leadData['website'] = $lead[7] ?? '';
            $leadData['lead_address'] = $lead[8] ?? '';
            $leadData['lead_city'] = $lead[9] ?? '';
            $leadData['lead_state'] = $lead[10] ?? '';
            $leadData['lead_country'] = $lead[11] ?? '';
            $leadData['lead_postalcode'] = $lead[12] ?? '';
            $leadData['disposition'] = $lead[13] ?? '';
            $leadData['source'] = $lead[14] ?? '';
            $leadData['opportunity_amount'] = $lead[15] ?? '';
            $leadData['campaign'] = $lead[16] ?? '';
            $leadData['industry'] = $lead[17] ?? '';
            $leadData['description'] = $lead[18] ?? '';
            $leadData['user_id'] = \Auth::user()->id;

            if (empty($leadData)) {
                $errorArray[] = $leadData;
            } else {
                $leadData->save();
            }
        }

        $errorRecord = [];
        if (empty($errorArray)) {
            $data['disposition'] = 'success';
            $data['msg'] = __('Record successfully imported');
        } else {
            $data['disposition'] = 'error';
            $data['msg'] = count($errorArray) . ' ' . __('Record imported fail out of' . ' ' . $totalLead . ' ' . 'record');

            foreach ($errorArray as $errorData) {

                $errorRecord[] = implode(',', $errorData);
            }

            \Session::put('errorArray', $errorRecord);
        }

        return redirect()->back()->with($data['disposition'], $data['msg']);
    }

    public function getLeadforNotify() {
        if (\Auth::user()->can('Manage Lead')) {
            $hasLeads = Lead::where('user_id', \Auth::user()->id)
                    ->where('disposition', '!=', 1)
                    ->exists();
            if (!$hasLeads) {
                $lead = Lead::with('product')->where('user_id', NULL)->where('disposition', 0)->first();
                if ($lead) {
                    return response()->json($lead);
                }
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function assign_leads($id) {
        if (\Auth::user()->can('Manage Lead')) {
            try {
                $lead = Lead::find($id);
                $lead['user_id'] = \Auth::user()->id;
//            $lead['disposition'] = 1;
                $lead->update();

                LeadStatuses::create(
                        [
                            'created_by' => \Auth::user()->id,
                            'lead_id' => $id,
                            'lead_status' => 0
                        ]
                );
                return response()->json(['success', __('Lead Successfully Updated.')]);
            } catch (\Exception $e) {
                Log::error('Lead Assign Agent error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while Assign Lead.',
                            'error' => $e->getMessage()
                                ], 500);
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function statusLogs($id) {
        if (\Auth::user()->can('Manage Lead')) {
            $status = collect(Lead::$disposition);
            $logs = LeadStatuses::with('lead', 'creator')->where('lead_id', $id)->get();
            return view('lead.lead_status', compact('logs', 'status'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }
}
