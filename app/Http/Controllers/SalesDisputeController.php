<?php

namespace App\Http\Controllers;

use App\Models\SalesDispute;
use App\Models\SalesOrder;
use App\Models\User;
use App\Models\Stream;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesDisputeController extends Controller {

    public function index() {
        if (\Auth::user()->can('Manage Dispute')) {
            if (\Auth::user()->type == 'owner') {
                $disputes = SalesDispute::with('source_user', 'sales_order', 'sales_order.lead')->get();
            } else {
                $disputes = SalesDispute::with('source_user', 'sales_order', 'sales_order.lead')->where('user_id', \Auth::user()->id)->get();
            }
            return view('sales_dispute.index', compact('disputes'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function create() {
        if (\Auth::user()->can('Create Dispute')) {
            $dispute_type = collect(['' => '--', 'Defective' => 'Defective', 'Wrong' => 'Wrong', 'Warranty' => 'Warranty', 'Pricing' => 'Pricing', 'Missing' => 'Missing']);
            $dispute_status = collect(['' => '--', 'Pending' => 'Pending', 'Under Review' => 'Under Review', 'Inspection' => 'Inspection', 'Approved' => 'Approved', 'Resolved' => 'Resolved', 'Closed' => 'Closed', 'Rejected' => 'Rejected']);
            $dispute_no = $this->disputeNumber();
            return view('sales_dispute.create', compact('dispute_no', 'dispute_type', 'dispute_status'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function store(Request $request) {
        if (\Auth::user()->can('Create Dispute')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'salesorder_id' => 'required|unique:sales_dispute,salesorder_id',
                        'dispute_date' => 'required',
                        'dispute_type' => 'required',
                        'disputed_amount' => 'required|numeric|min:0',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $salesorder = SalesOrder::find($request->salesorder_id);

                $dispute = new SalesDispute();
                $dispute['user_id'] = \Auth::user()->id;
                $dispute['salesorder_id'] = $request->salesorder_id;
                $dispute['dispute_id'] = $request->dispute_id;
                $dispute['dispute_date'] = $request->dispute_date;
                $dispute['dispute_type'] = $request->dispute_type;
                $dispute['dispute_status'] = $request->dispute_status ?? 'Pending';
                $dispute['disputed_amount'] = $request->disputed_amount;
                $dispute['gp_deduction'] = $request->gp_deduction ?? 0;
                $dispute['loss'] = $request->loss ?? 0;
                $dispute['total_deduction'] = ($request->gp_deduction ?? 0) + ($request->loss ?? 0);
                $dispute['reason'] = $request->reason;
                $dispute['created_by'] = \Auth::user()->creatorId();
                $dispute->save();

                $disputeNo = \Auth::user()->disputeFormat($request->dispute_id);
                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'created_by' => \Auth::user()->creatorId(),
                            'log_type' => 'created',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'dispute',
                                        'stream_comment' => '',
                                        'user_name' => $disputeNo,
                                    ]
                            ),
                        ]
                );

                if (\Auth::user()) {
                    return redirect()->back()->with('success', __('Dispute successfully created!') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
                } else {
                    return redirect()->back()->with('error', __('Webhook call failed.') . ((isset($msg) ? '<br> <span class="text-danger">' . $msg . '</span>' : '')));
                }
            } catch (\Exception $e) {
                // Log detailed error information
                Log::error('Dispute creation failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'request_data' => $request->all(),
                    'timestamp' => now()
                ]);
                return redirect()->back()->with('error', 'Failed to create Dispute: ' . $e->getMessage());
            }
        }
    }

    public function show($id) {
        if (\Auth::user()->can('Show Dispute')) {
            $dispute = SalesDispute::where('id', $id)->with('source_user', 'sales_order', 'sales_order.lead')->first();
            return view('sales_dispute.view', compact('dispute'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function edit($id) {
        if (\Auth::user()->can('Edit Dispute')) {
            $dispute_type = collect(['' => '--', 'Defective' => 'Defective', 'Wrong' => 'Wrong', 'Warranty' => 'Warranty', 'Pricing' => 'Pricing', 'Missing' => 'Missing']);
            $dispute_status = collect(['' => '--', 'Pending' => 'Pending', 'Under Review' => 'Under Review', 'Inspection' => 'Inspection', 'Approved' => 'Approved', 'Resolved' => 'Resolved', 'Closed' => 'Closed', 'Rejected' => 'Rejected']);
            $dispute = SalesDispute::with('source_user', 'sales_order', 'sales_order.lead')->find($id);
            return view('sales_dispute.edit', compact('dispute', 'dispute_type', 'dispute_status'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function update(Request $request, $id) {
        if (\Auth::user()->can('Edit Dispute')) {
            $dispute = SalesDispute::find($id);

            $validator = \Validator::make(
                    $request->all(),
                    [
                        'dispute_date' => 'required',
                        'dispute_type' => 'required',
                        'disputed_amount' => 'required|numeric|min:0',
                    ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            try {
                $dispute['user_id'] = \Auth::user()->id;
                $dispute['dispute_date'] = $request->dispute_date;
                $dispute['dispute_type'] = $request->dispute_type;
                $dispute['dispute_status'] = $request->dispute_status;
                $dispute['disputed_amount'] = $request->disputed_amount;
                $dispute['gp_deduction'] = $request->gp_deduction ?? 0;
                $dispute['loss'] = $request->loss ?? 0;
                $dispute['total_deduction'] = ($request->gp_deduction ?? 0) + ($request->loss ?? 0);
                $dispute['reason'] = $request->reason;
                $dispute->save();

                $disputeNo = \Auth::user()->disputeFormat($dispute->dispute_id);
                Stream::create(
                        [
                            'user_id' => \Auth::user()->id,
                            'created_by' => \Auth::user()->creatorId(),
                            'log_type' => 'updated',
                            'remark' => json_encode(
                                    [
                                        'owner_name' => \Auth::user()->username,
                                        'title' => 'dispute',
                                        'stream_comment' => '',
                                        'user_name' => $disputeNo,
                                    ]
                            ),
                        ]
                );

                return redirect()->back()->with('success', __('Dispute Successfully Updated.'));
            } catch (\Exception $e) {
                // Log detailed error information
                Log::error('Dispute update failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'error_trace' => $e->getTraceAsString(),
                    'request_data' => $request->all(),
                    'timestamp' => now()
                ]);
                return redirect()->back()->with('error', 'Failed to update Dispute: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    public function destroy($id) {
        if (\Auth::user()->can('Delete Dispute')) {
            try {
                $dispute = SalesDispute::find($id);
                if ($dispute) {
                    $dispute->delete();
                    return redirect()->route('dispute.index')->with('success', __('Dispute successfully deleted.'));
                } else {
                    return redirect()->route('dispute.index')->with('error', __('Dispute not found.'));
                }
            } catch (\Exception $e) {
                Log::error('Dispute deletion failed', [
                    'user_id' => \Auth::user()->id,
                    'error_message' => $e->getMessage(),
                    'timestamp' => now()
                ]);
                return redirect()->route('dispute.index')->with('error', 'Failed to delete Dispute: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    function disputeNumber() {
        $latest = SalesDispute::where('created_by', '=', \Auth::user()->creatorId())->latest()->first();
        if (!$latest) {
            return 1;
        }
        return ($latest->dispute_id ?? 0) + 1;
    }
}
