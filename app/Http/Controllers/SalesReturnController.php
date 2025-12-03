<?php

namespace App\Http\Controllers;

use App\Models\SalesReturn;
use App\Models\SalesOrder;
use App\Models\User;
use App\Models\Stream;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesReturnController extends Controller {

    public function index() {
        if (\Auth::user()->can('Manage SalesOrder')) {
            if (\Auth::user()->type == 'owner') {

                $salesreturn = SalesReturn::with('source_user', 'sales_order', 'lead')->get();
            } else {
                $salesreturn = SalesReturn::with('source_user', 'sales_order', 'lead')->where('user_id', \Auth::user()->id)->get();
            }
            return view('sales_return.index', compact('salesreturn'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function create() {
        if (\Auth::user()->can('Create SalesOrder')) {
            $request_type = collect(SalesReturn::$request_type);
            $request_type->prepend('--', '');

            $case_status = collect(SalesReturn::$case_status);
            $case_status->prepend('--', '');
            $salesreturn_no = $this->salesreturnNumber();
            return view('sales_return.create', compact('request_type', 'case_status', 'salesreturn_no'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function store(Request $request) {
        if (\Auth::user()->can('Create SalesOrder')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'salesorder_id' => 'required|unique:sales_return,salesorder_id',
                        'return_date' => 'required',
                        'request_type' => 'required',
                        'refund_received' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $salesorder = SalesOrder::find($request->salesorder_id);

                $salesreturn = new SalesReturn();
                $salesreturn['user_id'] = \Auth::user()->id;
                $salesreturn['lead_id'] = $salesorder->lead_id;
                $salesreturn['salesorder_id'] = $request->salesorder_id;
                $salesreturn['salesreturn_id'] = $request->salesreturn_id;
                $salesreturn['return_date'] = $request->return_date;
                $salesreturn['salesreturn_tracknumber'] = $request->salesreturn_tracknumber;
                $salesreturn['request_type'] = $request->request_type;
                $salesreturn['case_status'] = $request->case_status;
                $salesreturn['refund_received'] = $request->refund_received;
                $salesreturn['refund_issued'] = $request->refund_issued;
                $salesreturn['gp_deduction'] = $request->gp_deduction;
                $salesreturn['loss'] = $request->loss;
                $salesreturn['total_deduction'] = ($request->gp_deduction + $request->loss);
                $salesreturn['reason'] = $request->reason;
                $salesreturn['created_by'] = \Auth::user()->creatorId();
                $salesreturn->save();
                $salesreturnNo = \Auth::user()->salesReturnFormat($request->salesreturn_id);
                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'created_by' => \Auth::user()->creatorId(),
                            'log_type' => 'created',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'salesreturn',
                                        'stream_comment' => '',
                                        'user_name' => $salesreturnNo,
                                    ]
                            ),
                        ]
                );

                if (\Auth::user()) {
                    return redirect()->back()->with('success', __('Sales Return successfully created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
                } else {
                    return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
                }
            } catch (\Exception $e) {
                // Log detailed error information
                Log::error('Sales Return creation failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'request_data' => $request->all(),
                    'timestamp' => now()
                ]);
                return redirect()->back()->with('error', 'Failed to create Sales Return: ' . $e->getMessage());
            }
        }
    }

    public function show(SalesReturn $salesreturn, $id) {
        $salesreturn = SalesReturn::where('id', $id)->with('source_user')->first();
        $company_setting = Utility::settings();
        if (\Auth::user()->can('Show SalesOrder')) {
            return view('sales_return.view', compact('salesreturn', 'company_setting'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function edit(SalesReturn $salesreturn, $id) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $salesreturn = SalesReturn::find($id);
            $request_type = collect(SalesReturn::$request_type);
            $request_type->prepend('--', '');

            $case_status = collect(SalesReturn::$case_status);
            $case_status->prepend('--', '');

            $salesOrder = null;
            if ($salesreturn->salesorder_id) {
                $salesOrder = SalesOrder::with(['lead', 'sourceAgent'])->find($salesreturn->salesorder_id);
            }

            return view('sales_return.edit', compact('request_type', 'case_status', 'salesreturn', 'salesOrder'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function update(Request $request, $id) {
        if (\Auth::user()->can('Edit SalesOrder')) {
            $salesreturn = SalesReturn::find($id);

            $validator = \Validator::make(
                    $request->all(),
                    [
                        // 'salesorder_id' => 'required|unique:sales_return,salesorder_id,' . $id,
                        'return_date' => 'required',
                        'request_type' => 'required',
                        'refund_received' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                // $salesorder = SalesOrder::find($salesreturn->salesorder_id);               
                $salesreturn['user_id'] = \Auth::user()->id;
                // $salesreturn['lead_id'] = $salesorder->lead_id;
                // $salesreturn['salesorder_id'] = $request->salesorder_id;
                // $salesreturn['salesreturn_id'] = $request->salesreturn_id;
                $salesreturn['return_date'] = $request->return_date;
                $salesreturn['salesreturn_tracknumber'] = $request->salesreturn_tracknumber;
                $salesreturn['request_type'] = $request->request_type;
                $salesreturn['case_status'] = $request->case_status;
                $salesreturn['refund_received'] = $request->refund_received;
                $salesreturn['refund_issued'] = $request->refund_issued;
                $salesreturn['gp_deduction'] = $request->gp_deduction;
                $salesreturn['loss'] = $request->loss;
                $salesreturn['total_deduction'] = ($request->gp_deduction + $request->loss);
                $salesreturn['reason'] = $request->reason;
                $salesreturn->save();

                $salesreturnNo = \Auth::user()->salesReturnFormat($request->salesreturn_id);
                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'created_by' => \Auth::user()->creatorId(),
                            'log_type' => 'created',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'salesreturn',
                                        'stream_comment' => '',
                                        'user_name' => $salesreturnNo,
                                    ]
                            ),
                        ]
                );

                return redirect()->back()->with('success', __('Sales Return Successfully Updated.'));
            } catch (\Exception $e) {
                // Log detailed error information
                Log::error('Sales Return creation failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'request_data' => $request->all(),
                    'timestamp' => now()
                ]);
                return redirect()->back()->with('error', 'Failed to update Sales Return: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    function salesreturnNumber() {
        $latest = SalesReturn::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();

        if (!$latest) {
            return 1;
        }

        return $latest->salesreturn_id + 1;
    }
}
