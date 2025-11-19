<?php

namespace App\Http\Controllers;

use App\Models\SalesReturn;
use App\Models\SalesOrder;
use App\Models\User;
use App\Models\Stream;
use App\Models\Utility;
use Illuminate\Http\Request;

class SalesReturnController extends Controller {

    public function index() {
        if (\Auth::user()->can('Manage SalesOrder')) {
            if (\Auth::user()->type == 'owner') {

                $salesreturn = SalesReturn::with('source_user')->get();
            } else {
                $salesreturn = SalesReturn::with('source_user')->where('user_id', \Auth::user()->id)->get();
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
            $salesreturn_no = $this->salesreturnNumber();
            $salesorders = SalesOrder::get();
            $salesorder = ['--', ''];
            foreach ($salesorders as $sales_order) {
                $salesorder[$sales_order['id']] = $sales_order['name'] . ' (' . \Auth::user()->salesorderNumberFormat($sales_order['salesorder_id']) . ')';
            }
            return view('sales_return.create', compact('salesorder', 'request_type', 'salesreturn_no'));
        } else {
            return redirect()->back()->with('error', 'permission Denied');
        }
    }

    public function store(Request $request) {
        if (\Auth::user()->can('Create SalesOrder')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'salesorder' => 'required',
                        'return_date' => 'required',
                        'request_type' => 'required',
                        'refund_amount' => 'required',
                    //    'tax' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $salesorder = SalesOrder::find($request->salesorder);

                $salesreturn = new SalesReturn();
                $salesreturn['user_id'] = \Auth::user()->id;
                $salesreturn['lead_id'] = $salesorder->lead_id;
                $salesreturn['salesorder_id'] = $request->salesorder;
                $salesreturn['salesreturn_id'] = $request->salesreturn_id;
                $salesreturn['return_date'] = $request->return_date;
                $salesreturn['request_type'] = $request->request_type;
                $salesreturn['refund_amount'] = $request->refund_amount;
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
            $salesorders = SalesOrder::get();
            $salesorder = ['--', ''];
            foreach ($salesorders as $sales_order) {
                $salesorder[$sales_order['id']] = $sales_order['name'] . ' (' . \Auth::user()->salesorderNumberFormat($sales_order['salesorder_id']) . ')';
            }
            return view('sales_return.edit', compact('salesorder', 'request_type', 'salesreturn'));
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
                        'salesorder' => 'required',
                        'return_date' => 'required',
                        'request_type' => 'required',
                        'refund_amount' => 'required',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $salesorder = SalesOrder::find($request->salesorder);
                
                
                 $salesreturn['user_id'] = \Auth::user()->id;
                $salesreturn['lead_id'] = $salesorder->lead_id;
                $salesreturn['salesorder_id'] = $request->salesorder;
                $salesreturn['salesreturn_id'] = $request->salesreturn_id;
                $salesreturn['return_date'] = $request->return_date;
                $salesreturn['request_type'] = $request->request_type;
                $salesreturn['refund_amount'] = $request->refund_amount;
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
