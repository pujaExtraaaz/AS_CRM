<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Opportunities;
use App\Models\Product;
use App\Models\ProductTax;
use App\Exports\SalesOrderExport;
use App\Models\Plan;
use App\Models\Quote;
use App\Models\SalesOrder;
use App\Models\SalesOrderItem;
use App\Models\ShippingProvider;
use App\Models\Stream;
use App\Models\User;
use App\Models\Utility;
use App\Models\Yard;
use App\Models\YardLog;
use App\Models\Lead;
use App\Models\LeadSource;
use App\Models\LeadType;
use App\Models\PartType;
use App\Models\PaymentType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class SalesOrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (\Auth::user()->can('Manage SalesOrder')) {
            if (\Auth::user()->type == 'owner') {
                $salesorders = SalesOrder::with(['sourceAgent', 'lead.product', 'yard', 'sourceType'])->get();
            } else {
                $salesorders = SalesOrder::with(['sourceAgent', 'lead.product', 'yard', 'sourceType'])->orWhere('sales_user_id', \Auth::user()->id)->orWhere('source_id', \Auth::user()->id)->get();
            }
            return view('salesorder.index', compact('salesorders'));
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
        if (\Auth::user()->can('Create SalesOrder')) {
            $user = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            $tax = ProductTax::where('created_by', \Auth::user()->creatorId())->get()->pluck('tax_name', 'id');
            $tax->prepend('No Tax', 0);
            $account = Account::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $account->prepend('--', 0);
            $opportunities = Opportunities::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $opportunities->prepend('--', 0);
            $quotes = Quote::where('created_by', \Auth::user()->creatorId())->select('name', 'id', 'quote_id')->get();
            $quote = ['' => '--'];
            foreach ($quotes as $quote_value) {
                $quote[$quote_value['id']] = $quote_value['name'] . ' (' . \Auth::user()->quoteNumberFormat($quote_value['salesorder_id']) . ')';
            }
            $status = SalesOrder::$status;
            $contact = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $contact->prepend('--', 0);
            // Always generate the next ID from sales_invoice table
            $sales_no = \App\Models\SalesInvoice::generateSalesOrderNumber(\Auth::user()->creatorId());
            $shipping_provider = ShippingProvider::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');

            return view('salesorder.create', compact('user', 'tax', 'account', 'opportunities', 'status', 'contact', 'shipping_provider', 'quote', 'type', 'id', 'sales_no'));
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
        if (\Auth::user()->can('Create SalesOrder')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'quote' => 'required',
                        'date_quoted' => 'required',
//                        'shipping_postalcode' => 'required',
//                        'billing_postalcode' => 'required',
                    //    'tax' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            // if(count($request->tax) > 1 && in_array(0, $request->tax))
            // {
            //     return redirect()->back()->with('error', 'Please select valid tax');
            // }
            $quote = Quote::find($request->quote);
            $salesorder = new SalesOrder();
            $salesorder['user_id'] = $request->user;
            // $salesorder['salesorder_id'] = $request->salesorder_id;
            $salesorder['name'] = $quote->name;
            $salesorder['quote'] = $request->quote;
            $salesorder['opportunity'] = $request->opportunity;
            $salesorder['status'] = $request->status;
            $salesorder['account'] = $request->account;
            $salesorder['date_quoted'] = $request->date_quoted;
            $salesorder['quote_number'] = $request->quote;
            $salesorder['billing_address'] = $request->billing_address;
            $salesorder['billing_city'] = $request->billing_city;
            $salesorder['billing_state'] = $request->billing_state;
            $salesorder['billing_country'] = $request->billing_country;
            $salesorder['billing_postalcode'] = ($request->billing_postalcode) ? $request->billing_postalcode : 0;
            $salesorder['shipping_address'] = $request->shipping_address;
            $salesorder['shipping_city'] = $request->shipping_city;
            $salesorder['shipping_state'] = $request->shipping_state;
            $salesorder['shipping_country'] = $request->shipping_country;
            $salesorder['shipping_postalcode'] = ($request->shipping_postalcode) ? $request->shipping_postalcode : 0;
            $salesorder['billing_contact'] = $request->billing_contact;
            $salesorder['shipping_contact'] = $request->shipping_contact;
            // $salesorder['tax']                 = implode(',', $request->tax);
            $salesorder['shipping_provider'] = $request->shipping_provider;
            $salesorder['description'] = $request->description;

            $salesorder['created_by'] = \Auth::user()->creatorId();
            $salesorder->save();

            Stream::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'created_by' => \Auth::user()->creatorId(),
                        'log_type' => 'created',
                        'remark' => json_encode(
                                [
                                    'owner_name' => \Auth::user()->username,
                                    'title' => 'salesorder',
                                    'stream_comment' => '',
                                    'user_name' => $salesorder->name,
                                ]
                        ),
                    ]
            );

            $Assign_user_phone = User::where('id', $request->user)->first();
            $setting = Utility::settings(\Auth::user()->creatorId());
            if ($Assign_user_phone) {
                $uArr = [
                    'quote_number' => $request->quote_number,
                    'billing_address' => $request->billing_address,
                    'shipping_address' => $request->shipping_address,
                    'description' => $request->description,
                    'date_quoted' => $request->date_quoted,
                        // 'salesorder_assign_user' => $Assign_user_phone->name??'',
                ];
                $resp = Utility::sendEmailTemplate('new_sales_order', [$salesorder->id => $Assign_user_phone->email], $uArr);

                if (isset($setting['twilio_salesorder_create']) && $setting['twilio_salesorder_create'] == 1) {

                    // $msg = "New Salesorder" . " " . \Auth::user()->salesorderNumberFormat($this->salesorderNumber()) . " created by " . \Auth::user()->name . '.';

                    $uArr = [
                        'quote_number' => $request->quote_number,
                        'billing_address' => $request->billing_address,
                        'shipping_address' => $request->shipping_address,
                        'user_name' => \Auth::user()->name,
                    ];
                    Utility::send_twilio_msg($Assign_user_phone->phone, 'new_salesorder', $uArr);
                }
            }
            //webhook
            $module = 'New Sales Order';
            $webhook = Utility::webhookSetting($module);
            if ($webhook) {
                $parameter = json_encode($salesorder);
                // 1 parameter is  URL , 2 parameter is data , 3 parameter is method
                $status = Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
                if ($status != true) {
                    $msg = "Webhook call failed.";
                }
            }
            if (\Auth::user()) {
                return redirect()->back()->with('success', __('Sales order successfully created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            } else {
                return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\SalesOrder $salesOrder
     *
     * @return \Illuminate\Http\Response
     */
    public function show(SalesOrder $salesOrder, $id) {
        if (\Auth::user()->can('Show SalesOrder')) {

            $salesOrder = SalesOrder::with(['yard', 'assign_user', 'yardLogs.yard', 'yardLogs.createdBy', 'salesUser', 'lead.leadType', 'sourceType'])->find($id);
            $settings = Utility::settings();

            $items = [];
            $totalTaxPrice = 0;
            $totalQuantity = 0;
            $totalRate = 0;
            $totalDiscount = 0;
            $taxesData = [];
            foreach ($salesOrder->itemsdata as $item) {
                $totalQuantity += $item->quantity;
                $totalRate += $item->price;
                $totalDiscount += $item->discount;
                $taxes = Utility::tax($item->tax);

                $itemTaxes = [];
                foreach ($taxes as $tax) {
                    if (!empty($tax)) {
                        $taxPrice = Utility::taxRate($tax->rate, $item->price, $item->quantity);
                        $totalTaxPrice += $taxPrice;
                        $itemTax['tax_name'] = $tax->tax_name;
                        $itemTax['tax'] = $tax->tax . '%';
                        $itemTax['price'] = Utility::priceFormat($settings, $taxPrice);
                        $itemTaxes[] = $itemTax;
                        if (array_key_exists($tax->name, $taxesData)) {
                            $taxesData[$tax->tax_name] = $taxesData[$tax->tax_name] + $taxPrice;
                        } else {
                            $taxesData[$tax->tax_name] = $taxPrice;
                        }
                    } else {
                        $taxPrice = Utility::taxRate(0, $item->price, $item->quantity);
                        $totalTaxPrice += $taxPrice;
                        $itemTax['tax_name'] = 'No Tax';
                        $itemTax['tax'] = '';
                        $itemTax['price'] = Utility::priceFormat($settings, $taxPrice);
                        $itemTaxes[] = $itemTax;

                        if (array_key_exists('No Tax', $taxesData)) {
                            $taxesData[$itemTax['tax_name']] = $taxesData['No Tax'] + $taxPrice;
                        } else {
                            $taxesData['No Tax'] = $taxPrice;
                        }
                    }
                }
                $item->itemTax = $itemTaxes;
                $items[] = $item;
            }
            $salesOrder->items = $items;
            $salesOrder->totalTaxPrice = $totalTaxPrice;
            $salesOrder->totalQuantity = $totalQuantity;
            $salesOrder->totalRate = $totalRate;
            $salesOrder->totalDiscount = $totalDiscount;
            $salesOrder->taxesData = $taxesData;

            $company_setting = Utility::settings();

            return view('salesorder.view', compact('salesOrder', 'company_setting'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\SalesOrder $salesOrder
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesOrder $salesOrder, $id) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $lastSaleId = str_pad((4000 + $id), 6, '0', STR_PAD_LEFT);

            $salesOrder = SalesOrder::with(['yard', 'salesUser', 'sourceAgent', 'lead.leadType', 'yardLogs', 'yardLogs.createdBy'])->find($id);
            $shipping_provider = ShippingProvider::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $user = User::where('created_by', \Auth::user()->creatorId())->where('type', 'Source Agent')->get()->pluck('name', 'id');
            $user->prepend('--', 0);
            // New fields for the updated form
            $yards = Yard::get()->pluck('yard_name', 'id');
            $yards->prepend('--', 0);
            $leadTypes = LeadType::get()->pluck('name', 'id');
            $leadTypes->prepend('--', '');
//dd($salesOrder);
            // Source type options
            $sourceTypes = LeadSource::get()->pluck('name', 'id');
            $sourceTypes->prepend('--', '');

            // Payment gateway options
            $paymentGateways = PaymentType::pluck('PaymentType', 'id');
            $paymentGateways->prepend('--', '');
            // Part type options
            $partTypes = PartType::pluck('part_type_name', 'id');
            $partTypes->prepend('--', '');

            return view('salesorder.edit', compact('salesOrder', 'shipping_provider', 'user', 'leadTypes', 'sourceTypes', 'paymentGateways', 'partTypes', 'lastSaleId', 'yards'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\SalesOrder $salesOrder
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $salesOrder = SalesOrder::find($id);

            $validator = \Validator::make(
                    $request->all(),
                    [
                        'sale_invoice_number' => 'required',
//                        'part_type' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }

            $salesOrder['sale_status'] = $request->sale_status;
            // $salesOrder['sales_user_id'] = $request->sales_user_id ?: null; // Prevent update
            $salesOrder['source_id'] = $request->user ?: null;
            $salesOrder['source_date'] = $request->user ? date('Y-m-d') : null;
            // $salesOrder['lead_type_id'] = $request->lead_type_id ?: null; // Prevent update
            $salesOrder['vin_number'] = $request->vin_number;
            $salesOrder['sale_invoice_number'] = $request->sale_invoice_number;
            $salesOrder['part_number'] = $request->part_number;
            $salesOrder['part_type'] = $request->part_type;
            $salesOrder['source_type'] = $request->source_type;
            $salesOrder['billing_address_text'] = $request->billing_address_text;
            $salesOrder['billing_country'] = $request->billing_country;
            $salesOrder['billing_state'] = $request->billing_state;
            $salesOrder['billing_city'] = $request->billing_city;
            $salesOrder['shipping_address_text'] = $request->shipping_address_text;
            $salesOrder['shipping_country'] = $request->shipping_country;
            $salesOrder['shipping_state'] = $request->shipping_state;
            $salesOrder['shipping_city'] = $request->shipping_city;
            $salesOrder['payment_gateway_name'] = $request->payment_gateway_name;
            $salesOrder['name_on_card'] = $request->name_on_card;
            $salesOrder['card_number'] = $request->card_number;
            $salesOrder['expiration'] = $request->expiration;
            $salesOrder['cvv_number'] = $request->cvv_number;
            $salesOrder['part_price'] = $request->part_price;
            $salesOrder['shipping_price'] = $request->shipping_price;
            $salesOrder['gross_profit'] = $request->gross_profit;
            $salesOrder['charge_amount'] = $request->charge_amount;
            $salesOrder['total_amount_quoted'] = $request->total_amount_quoted;
            $salesOrder['agent_note'] = $request->agent_note;
            $salesOrder->update();

            Stream::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'created_by' => \Auth::user()->creatorId(),
                        'log_type' => 'updated',
                        'remark' => json_encode(
                                [
                                    'owner_name' => \Auth::user()->username,
                                    'title' => 'salesOrder',
                                    'stream_comment' => '',
                                    'user_name' => $salesOrder->part_number,
                                ]
                        ),
                    ]
            );

            return redirect()->back()->with('success', __('Salesorder Successfully Updated.'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    /**
     * Save yard details and create yard logs
     */

    /**
     * Create yard logs for various actions
     */
    public function createYardLogs(Request $request, $id) {
        $salesOrder = SalesOrder::find($id);
        \Log::info('createYardLogs method called', [
            'sales_order_id' => $salesOrder->id,
            'yard_name' => $request->yard_name
        ]);
        $validator = \Validator::make(
                $request->all(),
                [
                    'yard_name' => 'required|string|max:255',
                    'yard_address' => 'required|string|max:500',
                    'yard_email' => 'required|email|max:255',
                    'yard_person_name' => 'required|string|max:255',
                    'contact' => 'required|string|max:20',
                ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
//        $yard = \App\Models\Yard::find($request->yard_id);

        try {

            $yard = new Yard();
            $yard->yard_name = $request->yard_name;
            $yard->yard_address = $request->yard_address;
            $yard->yard_email = $request->yard_email;
            $yard->yard_person_name = $request->yard_person_name;
            $yard->contact = $request->contact;
            $yard->created_by = \Auth::user()->id;
            $yard->save();

            $yardLog = new YardLog();

            $yardLog->sales_order_id = $salesOrder->id;
            $yardLog->yard_id = $yard->id;
            $yardLog->comments = $request->comments;
            $yardLog->card_used = $request->card_used;
            $yardLog->yard_order_date = $request->yard_order_date;
            $yardLog->delivery_date = $request->delivery_date;
            $yardLog->card_used = $request->card_used;
            $yardLog->created_by = \Auth::user()->id;
            $yardLog->save();
            \Log::info('Yard and Yard log created', ['log_id' => $yardLog->id]);
            return redirect()->back()->with('success', __('Yard log Successfully Updated.'));
        } catch (\Exception $e) {
            \Log::error('Error creating yard and log', ['error' => $e->getMessage()]);
        }
    }

    public function grid() {
        $salesorders = SalesOrder::where('created_by', \Auth::user()->creatorId())->get();

        return view('salesorder.grid', compact('salesorders'));
    }

    function salesorderNumber() {
        // Get the latest sales order
        $latest = SalesOrder::latest()->first();

        // If no sales orders exist, start from 1
        if (!$latest) {
            return 1;
        }

        // Otherwise, increment the last salesorder_id
        return $latest->salesorder_id + 1;
    }

    public function getaccount(Request $request) {
        if ($request->opportunities_id) {
            $opportunitie = Opportunities::where('id', $request->opportunities_id)->first()->toArray();
            $account = Account::find($opportunitie['account'])->toArray();

            return response()->json(
                            [
                                'opportunitie' => $opportunitie,
                                'account' => $account,
                            ]
                    );
        }
    }

    public function salesorderitem($id) {
        $salesorder = SalesOrder::find($id);

        $items = Product::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $items->prepend('select', 0);
        $tax_rate = ProductTax::where('created_by', \Auth::user()->creatorId())->get()->pluck('rate', 'id');

        return view('salesorder.salesorderitem', compact('items', 'salesorder', 'tax_rate'));
    }

    public function salesorderItemEdit($id) {
        $salesorderItem = SalesOrderItem::find($id);
        $items = Product::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
        $items->prepend('select', 0);
        $tax_rate = ProductTax::where('created_by', \Auth::user()->creatorId())->get()->pluck('rate', 'id');

        return view('salesorder.salesorderitemEdit', compact('items', 'salesorderItem', 'tax_rate'));
    }

    public function items(Request $request) {

        $items = Product::where('id', $request->item_id)->first();

        $items->taxes = $items->tax($items->tax);

        return json_encode($items);
    }

    public function itemsDestroy($id) {
        $item = SalesOrderItem::find($id);
        $item->delete();

        return redirect()->back()->with('success', __('Item Successfully delete.'));
    }

    public function storeitem(Request $request, $id) {
        $validator = \Validator::make(
                $request->all(),
                []
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $salesorderitem = new SalesOrderItem();
        $salesorderitem['salesorder_id'] = $request->id;
        $salesorderitem['item'] = $request->item;
        $salesorderitem['quantity'] = $request->quantity;
        $salesorderitem['price'] = $request->price;
        $salesorderitem['discount'] = $request->discount;
        $salesorderitem['tax'] = $request->tax;
        $salesorderitem['description'] = $request->description;
        $salesorderitem['created_by'] = \Auth::user()->creatorId();
        $salesorderitem->save();

        return redirect()->back()->with('success', __('Sales Order Item Successfully Created.'));
    }

    public function salesorderItemUpdate(Request $request, $id) {
        $validator = \Validator::make(
                $request->all(),
                []
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }
        $salesorderitem = SalesOrderItem::find($id);
        $salesorderitem['item'] = $request->item;
        $salesorderitem['quantity'] = $request->quantity;
        $salesorderitem['price'] = $request->price;
        $salesorderitem['discount'] = $request->discount;
        $salesorderitem['tax'] = $request->tax;
        $salesorderitem['description'] = $request->description;
        $salesorderitem->save();

        return redirect()->back()->with('success', __('Sales Order Item Successfully Updated.'));
    }

    public function previewInvoice($template, $color) {
        $objUser = \Auth::user();
        $settings = Utility::settings();
        $salesorder = new SalesOrder();

        $user = new \stdClass();
        $user->company_name = '<Company Name>';
        $user->name = '<Name>';
        $user->email = '<Email>';
        $user->mobile = '<Phone>';
        $user->address = '<Address>';
        $user->country = '<Country>';
        $user->state = '<State>';
        $user->city = '<City>';

        $totalTaxPrice = 0;
        $taxesData = [];

        $items = [];
        for ($i = 1; $i <= 3; $i++) {
            $item = new \stdClass();
            $item->name = 'Item ' . $i;
            $item->quantity = 1;
            $item->tax = 5;
            $item->discount = 50;
            $item->price = 100;

            $taxes = [
                'Tax 1',
                'Tax 2',
            ];

            $itemTaxes = [];
            foreach ($taxes as $k => $tax) {
                $taxPrice = 10;
                $totalTaxPrice += $taxPrice;
                $itemTax['name'] = 'Tax ' . $k;
                $itemTax['rate'] = '10 %';
                $itemTax['price'] = '$10';
                $itemTaxes[] = $itemTax;
                if (array_key_exists('Tax ' . $k, $taxesData)) {
                    $taxesData['Tax ' . $k] = $taxesData['Tax 1'] + $taxPrice;
                } else {
                    $taxesData['Tax ' . $k] = $taxPrice;
                }
            }
            $item->itemTax = $itemTaxes;
            $items[] = $item;
        }

        $salesorder->invoice_id = 1;
        $salesorder->issue_date = date('Y-m-d H:i:s');
        $salesorder->due_date = date('Y-m-d H:i:s');
        $salesorder->items = $items;

        $salesorder->totalTaxPrice = 60;
        $salesorder->totalQuantity = 3;
        $salesorder->totalRate = 300;
        $salesorder->totalDiscount = 10;
        $salesorder->taxesData = $taxesData;

        $preview = 1;
        $color = '#' . $color;
        $font_color = Utility::getFontColor($color);

        $logo = \App\Models\Utility::get_file('uploads/logo/');
        $dark_logo = Utility::getValByName('company_logo_dark');
        $salesorder_logo = Utility::getValByName('salesorder_logo');
        if (isset($salesorder_logo) && !empty($salesorder_logo)) {
            $img = \App\Models\Utility::get_file('/') . $salesorder_logo;
        } else {
            $img = asset($logo . '/' . (isset($dark_logo) && !empty($dark_logo) ? $dark_logo : 'logo-dark.png'));
        }

        return view('salesorder.templates.' . $template, compact('salesorder', 'preview', 'color', 'img', 'settings', 'user', 'font_color'));
    }

    public function saveSalesorderTemplateSettings(Request $request) {
        $user = \Auth::user();
        $post = $request->all();
        unset($post['_token']);

        if (isset($post['salesorder_template']) && (!isset($post['salesorder_color']) || empty($post['salesorder_color']))) {
            $post['salesorder_color'] = "ffffff";
        }

        if ($request->salesorder_logo) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'salesorder_logo' => 'image|mimes:png|max:2048',
                    ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $salesorder_logo = $user->id . '_salesorder_logo.png';
            $dir = 'salesorder_logo/';

            $validation = [
                'mimes:' . 'png',
                'max:' . '20480',
            ];

            $path = Utility::upload_file($request, 'salesorder_logo', $salesorder_logo, $dir, $validation);
            if ($path['flag'] == 1) {
                $salesorder_logo = $path['url'];
            } else {
                return redirect()->back()->with('error', __($path['msg']));
            }
            // $path                 = $request->file('salesorder_logo')->storeAs('salesorder_logo', $salesorder_logo);
            $post['salesorder_logo'] = $salesorder_logo;
        }

        foreach ($post as $key => $data) {
            \DB::insert(
                    'insert into settings (`value`, `name`,`created_by`) values (?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`) ',
                    [
                        $data,
                        $key,
                        \Auth::user()->creatorId(),
                    ]
            );
        }

        return redirect()->back()->with('success', __('Invoice Setting successfully updated.'));
    }

    public function pdf($id) {
        $settings = Utility::settings();

        $salesorderId = Crypt::decrypt($id);
        $salesorder = SalesOrder::where('id', $salesorderId)->first();

        $data = \DB::table('settings');
        $data = $data->where('created_by', '=', $salesorder->created_by);
        $data1 = $data->get();

        foreach ($data1 as $row) {
            $settings[$row->name] = $row->value;
        }

        $user = new User();
        $user->name = $salesorder->name;
        $user->email = $salesorder->contacts->email ?? '';
        $user->mobile = $salesorder->contacts->phone ?? '';

        $user->bill_address = $salesorder->billing_address;
        $user->bill_zip = $salesorder->billing_postalcode;
        $user->bill_city = $salesorder->billing_city;
        $user->bill_country = $salesorder->billing_country;
        $user->bill_state = $salesorder->billing_state;

        $user->address = $salesorder->shipping_address;
        $user->zip = $salesorder->shipping_postalcode;
        $user->city = $salesorder->shipping_city;
        $user->country = $salesorder->shipping_country;
        $user->state = $salesorder->shipping_state;

        $items = [];
        $totalTaxPrice = 0;
        $totalQuantity = 0;
        $totalRate = 0;
        $totalDiscount = 0;
        $taxesData = [];

        foreach ($salesorder->itemsdata as $product) {
            $item = new \stdClass();
            $item->name = $product->item;
            $item->quantity = $product->quantity;
            $item->tax = !empty($product->taxs) ? $product->taxs->rate : '';
            $item->discount = $product->discount;
            $item->price = $product->price;

            $totalQuantity += $item->quantity;
            $totalRate += $item->price;
            $totalDiscount += $item->discount;

            //     $taxes = \App\Models\Utility::tax($product->tax);
            //     $itemTaxes = [];
            //     foreach ($taxes as $tax) {
            //         $taxPrice      = \App\Models\Utility::taxRate($tax->rate, $item->price, $item->quantity);
            //         $totalTaxPrice += $taxPrice;
            //         $itemTax['name']  = $tax->tax_name;
            //         $itemTax['rate']  = $tax->rate . '%';
            //         $itemTax['price'] = \App\Models\Utility::priceFormat($settings, $taxPrice);
            //         $itemTaxes[]      = $itemTax;
            //         if (array_key_exists($tax->tax_name, $taxesData)) {
            //             $taxesData[$tax->tax_name] = $taxesData[$tax->tax_name] + $taxPrice;
            //         } else {
            //             $taxesData[$tax->tax_name] = $taxPrice;
            //         }
            //     }
            //     $item->itemTax = $itemTaxes;
            //     $items[]       = $item;
        }
        $salesorder->issue_date = $salesorder->date_quoted;
        $salesorder->items = $items;
        $salesorder->totalTaxPrice = $totalTaxPrice;
        $salesorder->totalQuantity = $totalQuantity;
        $salesorder->totalRate = $totalRate;
        $salesorder->totalDiscount = $totalDiscount;
        $salesorder->taxesData = $taxesData;

        //Set your logo
        $logo = \App\Models\Utility::get_file('uploads/logo/');
        $dark_logo = Utility::getValByName('company_logo_dark');
        $salesorder_logo = Utility::getValByName('salesorder_logo');
        if (isset($salesorder_logo) && !empty($salesorder_logo)) {
            $img = \App\Models\Utility::get_file('/') . $salesorder_logo;
        } else {
            $img = asset($logo . '/' . (isset($dark_logo) && !empty($dark_logo) ? $dark_logo : 'logo-dark.png'));
        }

        if ($salesorder) {
            $color = '#' . $settings['salesorder_color'];
            $font_color = Utility::getFontColor($color);

            return view('salesorder.templates.' . $settings['salesorder_template'], compact('salesorder', 'user', 'color', 'settings', 'img', 'font_color'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function duplicate($id) {
        if (\Auth::user()->can('Create Quote')) {
            $salesorder = SalesOrder::find($id);

            $duplicate = new SalesOrder();
            $duplicate['user_id'] = $salesorder->user_id;
            $duplicate['salesorder_id'] = $this->salesorderNumber();
            $duplicate['name'] = $salesorder->name;
            $duplicate['quote'] = $salesorder->quote;
            $duplicate['opportunity'] = $salesorder->opportunity;
            $duplicate['status'] = $salesorder->status;
            $duplicate['account'] = $salesorder->account;
            $duplicate['amount'] = $salesorder->amount;
            $duplicate['date_quoted'] = $salesorder->date_quoted;
            $duplicate['quote_number'] = $salesorder->quote_number;
            $duplicate['billing_address'] = $salesorder->billing_address;
            $duplicate['billing_city'] = $salesorder->billing_city;
            $duplicate['billing_state'] = $salesorder->billing_state;
            $duplicate['billing_country'] = $salesorder->billing_country;
            $duplicate['billing_postalcode'] = $salesorder->billing_postalcode;
            $duplicate['shipping_address'] = $salesorder->shipping_address;
            $duplicate['shipping_city'] = $salesorder->shipping_city;
            $duplicate['shipping_state'] = $salesorder->shipping_state;
            $duplicate['shipping_country'] = $salesorder->shipping_country;
            $duplicate['shipping_postalcode'] = $salesorder->shipping_postalcode;
            $duplicate['billing_contact'] = $salesorder->billing_contact;
            $duplicate['shipping_contact'] = $salesorder->shipping_contact;
            $duplicate['tax'] = $salesorder->tax;
            $duplicate['shipping_provider'] = $salesorder->shipping_provider;
            $duplicate['description'] = $salesorder->description;
            $duplicate['created_by'] = \Auth::user()->creatorId();
            $duplicate->save();

            Stream::create(
                    [
                        'user_id' => \Auth::user()->id,
                        'created_by' => \Auth::user()->creatorId(),
                        'log_type' => 'created',
                        'remark' => json_encode(
                                [
                                    'owner_name' => \Auth::user()->username,
                                    'title' => 'salesorder',
                                    'stream_comment' => '',
                                    'user_name' => $salesorder->name,
                                ]
                        ),
                    ]
            );

            if ($duplicate) {
                $salesorderItem = SalesOrderItem::where('salesorder_id', $salesorder->id)->get();

                foreach ($salesorderItem as $item) {

                    $salesorderitem = new SalesOrderItem();
                    $salesorderitem['salesorder_id'] = $duplicate->id;
                    $salesorderitem['item'] = $item->item;
                    $salesorderitem['quantity'] = $item->quantity;
                    $salesorderitem['price'] = $item->price;
                    $salesorderitem['discount'] = $item->discount;
                    $salesorderitem['tax'] = $item->tax;
                    $salesorderitem['description'] = $item->description;
                    $salesorderitem['created_by'] = \Auth::user()->creatorId();
                    $salesorderitem->save();
                }
            }

            return redirect()->back()->with('success', __('Salesorder duplicate successfully.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function paysalesorder($salesorder_id) {

        if (!empty($salesorder_id)) {
            try {
                $id = \Illuminate\Support\Facades\Crypt::decrypt($salesorder_id);
            } catch (\RuntimeException $e) {
                return redirect()->back()->with('error', __('Sales Order not avaliable'));
            }
            // $id = \Illuminate\Support\Facades\Crypt::decrypt($salesorder_id);

            $salesorder = SalesOrder::where('id', $id)->first();

            if (!is_null($salesorder)) {

                $settings = Utility::settings();

                $items = [];
                $totalTaxPrice = 0;
                $totalQuantity = 0;
                $totalRate = 0;
                $totalDiscount = 0;
                $taxesData = [];

                foreach ($salesorder->itemsdata as $item) {
                    $totalQuantity += $item->quantity;
                    $totalRate += $item->price;
                    $totalDiscount += $item->discount;
                    $taxes = Utility::tax($item->tax);

                    $itemTaxes = [];
                    foreach ($taxes as $tax) {
                        if (!empty($tax)) {
                            $taxPrice = Utility::taxRate($tax->rate, $item->price, $item->quantity);
                            $totalTaxPrice += $taxPrice;
                            $itemTax['tax_name'] = $tax->tax_name;
                            $itemTax['tax'] = $tax->tax . '%';
                            $itemTax['price'] = Utility::priceFormat($settings, $taxPrice);
                            $itemTaxes[] = $itemTax;

                            if (array_key_exists($tax->name, $taxesData)) {
                                $taxesData[$itemTax['tax_name']] = $taxesData[$tax->tax_name] + $taxPrice;
                            } else {
                                $taxesData[$tax->tax_name] = $taxPrice;
                            }
                        } else {
                            $taxPrice = Utility::taxRate(0, $item->price, $item->quantity);
                            $totalTaxPrice += $taxPrice;
                            $itemTax['tax_name'] = 'No Tax';
                            $itemTax['tax'] = '';
                            $itemTax['price'] = Utility::priceFormat($settings, $taxPrice);
                            $itemTaxes[] = $itemTax;

                            // if (array_key_exists('No Tax', $taxesData)) {
                            //     $taxesData[$tax->tax_name] = $taxesData['No Tax'] + $taxPrice;
                            // } else {
                            //     $taxesData['No Tax'] = $taxPrice;
                            // }
                        }
                    }
                    $item->itemTax = $itemTaxes;
                    $items[] = $item;
                }
                $salesorder->items = $items;
                $salesorder->totalTaxPrice = $totalTaxPrice;
                $salesorder->totalQuantity = $totalQuantity;
                $salesorder->totalRate = $totalRate;
                $salesorder->totalDiscount = $totalDiscount;
                $salesorder->taxesData = $taxesData;

                $company_setting = Utility::settings();

                $ownerId = Utility::ownerIdforSalesorder($salesorder->created_by);

                $payment_setting = Utility::invoice_payment_settings($ownerId);
                $site_setting = Utility::settingsById($ownerId);

                $users = User::where('id', $salesorder->created_by)->first();

                if (!is_null($users)) {
                    \App::setLocale($users->lang);
                } else {
                    $users = User::where('type', 'owner')->first();
                    \App::setLocale($users->lang);
                }

                return view('salesorder.salesorderpay', compact('salesorder', 'company_setting', 'users', 'payment_setting', 'site_setting'));
            } else {
                return abort('404', 'The Link You Followed Has Expired');
            }
        } else {
            return abort('404', 'The Link You Followed Has Expired');
        }
    }

    public function fileExport() {
        $name = 'Salesorder_' . date('Y-m-d i:h:s');
        $data = Excel::download(new SalesOrderExport(), $name . '.xlsx');
        ob_end_clean();

        return $data;
    }

    /**
     * Select yards for sales order (Step 2)
     */
    public function selectYards(Request $request, $id) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $salesOrder = SalesOrder::find($id);

            if (!$salesOrder) {
                return response()->json(['success' => false, 'message' => __('Sales order not found')]);
            }

            // Update sales order with selected yards
            $salesOrder->yard_id = implode(',', $request->yard_ids);
            $salesOrder->save();

            // Create yard logs for each selected yard
            foreach ($request->yard_ids as $yardId) {
                $yard = \App\Models\Yard::find($yardId);
                if ($yard) {
                    YardLog::create([
                        'sales_order_id' => $salesOrder->id,
                        'yard_id' => $yardId,
                        'action' => 'yard_selected',
                        'description' => "Yard '{$yard->yard_name}' selected for order",
                        'data' => ['yard_name' => $yard->yard_name],
                        'created_by' => \Auth::user()->id
                    ]);
                }
            }

            return response()->json(['success' => true, 'message' => __('Yards selected successfully!')]);
        } else {
            return response()->json(['success' => false, 'message' => __('Permission denied')]);
        }
    }

    /**
     * Update yard request (Accept/Reject)
     */
    public function updateYardRequest(Request $request, $logId) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $yardLog = YardLog::find($logId);

            if (!$yardLog) {
                return response()->json(['success' => false, 'message' => __('Yard log not found')]);
            }

            if ($request->action == 'accept') {
                // Check if any other yard has already accepted
                $existingAccepted = YardLog::where('sales_order_id', $yardLog->sales_order_id)
                        ->where('action', 'yard_accepted')
                        ->exists();

                if ($existingAccepted) {
                    return response()->json(['success' => false, 'message' => __('Only one yard can accept the request.')]);
                }

                $yardLog->markAsCompleted();
                $yardLog->delivery_status = 'pending';
                $yardLog->delivery_notes = $request->notes;
                $yardLog->save();

                // Create acceptance log
                YardLog::create([
                    'sales_order_id' => $yardLog->sales_order_id,
                    'yard_id' => $yardLog->yard_id,
                    'action' => 'yard_accepted',
                    'description' => "Yard '{$yardLog->yard->yard_name}' accepted the request",
                    'data' => ['yard_name' => $yardLog->yard->yard_name, 'notes' => $request->notes],
                    'is_completed' => true,
                    'completed_at' => now(),
                    'created_by' => \Auth::user()->id
                ]);

                $message = __('Yard request accepted successfully!');
            } else {
                $yardLog->delivery_status = 'rejected';
                $yardLog->delivery_notes = $request->notes;
                $yardLog->delivered_at = now();
                $yardLog->save();

                // Create rejection log
                YardLog::create([
                    'sales_order_id' => $yardLog->sales_order_id,
                    'yard_id' => $yardLog->yard_id,
                    'action' => 'yard_rejected',
                    'description' => "Yard '{$yardLog->yard->yard_name}' rejected the request",
                    'data' => ['yard_name' => $yardLog->yard->yard_name, 'notes' => $request->notes],
                    'is_completed' => true,
                    'completed_at' => now(),
                    'created_by' => \Auth::user()->id
                ]);

                $message = __('Yard request rejected successfully!');
            }

            return response()->json(['success' => true, 'message' => $message]);
        } else {
            return response()->json(['success' => false, 'message' => __('Permission denied')]);
        }
    }

    /**
     * Update product delivery status
     */
    public function updateProductDelivery(Request $request, $logId) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $yardLog = YardLog::find($logId);

            if (!$yardLog) {
                return response()->json(['success' => false, 'message' => __('Yard log not found')]);
            }

            $notes = $request->get('notes', '');
            $action = $request->get('action', 'delivered');

            if ($action == 'delivered') {
                // Create product delivered log
                YardLog::create([
                    'sales_order_id' => $yardLog->sales_order_id,
                    'yard_id' => $yardLog->yard_id,
                    'action' => 'product_delivered',
                    'description' => "Product delivered to '{$yardLog->yard->yard_name}'",
                    'data' => ['yard_name' => $yardLog->yard->yard_name, 'notes' => $notes],
                    'is_completed' => true,
                    'completed_at' => now(),
                    'delivery_status' => 'delivered',
                    'delivery_notes' => $notes,
                    'delivered_at' => now(),
                    'created_by' => \Auth::user()->id
                ]);

                $message = __('Product delivery status updated successfully!');
            } else {
                // Create product not delivered log
                YardLog::create([
                    'sales_order_id' => $yardLog->sales_order_id,
                    'yard_id' => $yardLog->yard_id,
                    'action' => 'product_not_delivered',
                    'description' => "Product not delivered to '{$yardLog->yard->yard_name}'",
                    'data' => ['yard_name' => $yardLog->yard->yard_name, 'notes' => $notes],
                    'is_completed' => true,
                    'completed_at' => now(),
                    'delivery_status' => 'rejected',
                    'delivery_notes' => $notes,
                    'delivered_at' => now(),
                    'created_by' => \Auth::user()->id
                ]);

                $message = __('Product delivery status updated successfully!');
            }

            return response()->json(['success' => true, 'message' => $message]);
        } else {
            return response()->json(['success' => false, 'message' => __('Permission denied')]);
        }
    }

    public function SaleAutoSearch(Request $request) {
        $search = $request->get('term');
        $yards = SalesOrder::leftJoin('part_type', 'sales_orders.part_type', '=', 'part_type.id')
                ->where(function($query) use ($search) {
                    $query->where('sales_orders.sale_invoice_number', 'LIKE', "%{$search}%")
                          ->orWhere('sales_orders.part_number', 'LIKE', "%{$search}%")
                          ->orWhere('part_type.part_type_name', 'LIKE', "%{$search}%");
                })
                ->select('sales_orders.id', 'sales_orders.sale_invoice_number', 'sales_orders.part_number', 'sales_orders.total_amount_quoted','part_type.part_type_name')
                ->limit(10)
                ->get();
        return response()->json($yards);
    }

    public function getSalesOrderById(Request $request, $id) {
        $salesOrder = SalesOrder::with([
                'lead',
                'yard',
                'sourceAgent',
                'salesUser',
                'sourceType'
            ])
            ->leftJoin('part_type', 'sales_orders.part_type', '=', 'part_type.id')
            ->where('sales_orders.id', $id)
            ->select(
                'sales_orders.*',
                'part_type.part_type_name'
            )
            ->first();

        if (!$salesOrder) {
            return response()->json(['error' => 'Sales order not found'], 404);
        }

        return response()->json($salesOrder);
    }
}
