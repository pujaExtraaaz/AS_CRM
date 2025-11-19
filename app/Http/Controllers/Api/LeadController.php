<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stream;
use App\Models\Lead;
use App\Models\LeadSource;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeadController extends Controller {

    public function index($id) {
        if (\Auth::user()->can('Manage Lead')) {
            $lead = Lead::where('user_id', $id)->where('status', 1)->get()->pluck('name', 'id');
//        $lead->prepend('New Lead', 0);
            return response()->json($lead);
        } else {
            return response()->json([
                        'errors' => 'permission Denied',
                        'status' => 422,
                            ], 422);
        }
    }

    public function store(Request $request) {
        if (\Auth::user()->can('Manage Lead')) {
            $validator = \Validator::make(
                    $request->all(),
                    [
                        'user_id' => 'required',
//                    'user' => 'required',
                        "title" => 'required',
                        'name' => 'required|max:120',
                        'email' => 'required|email',
                        'lead_postalcode' => 'required',
                        'opportunity_amount' => 'required|numeric',
                        'status' => 'required',
                        'source' => 'required',
                        'phone' => 'required',
//                    'website' => 'required',
                        'lead_country' => 'required',
                        'lead_state' => 'required',
                        'lead_city' => 'required',
                        'lead_address' => 'required',
                    ]
            );
            if ($validator->fails()) {
                return response()->json([
                            'errors' => $validator->errors(),
                            'status' => 422,
                                ], 422);
            } else {
                try {
                    $lead = new Lead();
//                $lead['user_id'] = $request->user;
                    $lead['title'] = $request->title;
                    $lead['name'] = $request->name;
                    $lead['email'] = $request->email;
                    $lead['account'] = $request->account;
                    $lead['lead_postalcode'] = $request->lead_postalcode;
                    $lead['opportunity_amount'] = $request->opportunity_amount;
                    $lead['status'] = $request->status;
                    $lead['source'] = $request->source;
                    $lead['phone'] = $request->phone;
                    $lead['website'] = $request->website;
                    $lead['lead_address'] = $request->lead_address;
                    $lead['lead_city'] = $request->lead_city;
                    $lead['lead_state'] = $request->lead_state;
                    $lead['lead_country'] = $request->lead_country;
                    $lead['campaign'] = $request->campaign;
                    $lead['industry'] = $request->industry;
                    $lead['description'] = $request->description;
                    $lead['created_by'] = $request->user_id;
                    $lead->save();

                    $user = User::where('id', $request->user_id)->first();
                    Stream::create(
                            [
                                'user_id' => $request->user_id, 'created_by' => $request->user_id,
                                'log_type' => 'created',
                                'remark' => json_encode(
                                        [
                                            'owner_name' => $user->username,
                                            'title' => 'lead',
                                            'stream_comment' => '',
                                            'user_name' => $lead->name,
                                        ]
                                ),
                            ]
                    );
                    return response()->json([
                                'status' => 'success',
                                'message' => 'Added successfully',
                                'lead' => $lead,
                    ]);
                } catch (\Exception $e) {
                    Log::error('Visit Detils form submission error: ' . $e->getMessage());
                    return response()->json([
                                'status' => 'error',
                                'message' => 'An error occurred while creating the Visit Detils',
                                'error' => $e->getMessage()
                                    ], 500);
                }
            }
        } else {
            return response()->json([
                        'errors' => 'permission Denied',
                        'status' => 422,
                            ], 422);
        }
    }

    public function getLeadStatus() {
        $status = Lead::$status;
        return response()->json($status);
    }

    public function getLeadSource($id) {
        $leadsource = LeadSource::where('created_by', $id)->get()->pluck('name', 'id');
        return response()->json($leadsource);
    }

    public function getLeadTotal($id) {
        $date = Carbon::now()->format('Y-m-d');
        $today_total_lead = Lead::where('user_id', $id)->whereDate('created_at', $date)->get()->count();
        $today_visit_lead = Lead::where('user_id', $id)->where('visit_status', 1)->whereDate('created_at', $date)->get()->count();
        $pending_lead = Lead::where('user_id', $id)->where('status', 1)->where('visit_status', 0)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $total_lead = Lead::where('user_id', $id)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $visit_lead = Lead::where('user_id', $id)->where('visit_status', 1)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $in_process_lead = Lead::where('user_id', $id)->where('status', 2)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $converted_lead = Lead::where('user_id', $id)->where('status', 3)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $recycled_lead = Lead::where('user_id', $id)->where('status', 4)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $dead_lead = Lead::where('user_id', $id)->where('status', 5)->where('visit_status', 0)->whereBetween(
                        'created_at',
                        [
                            Carbon::now()->startOfMonth(),
                            Carbon::now()->endOfMonth(),
                        ]
                )->get()->count();
        $total_lead = ['today_total_lead' => $today_total_lead,
            'today_visit_lead' => $today_visit_lead,
            'total_lead' => $total_lead,
            'visit_lead' => $visit_lead,
            'pending_lead' => $pending_lead,
            'in_process_lead' => $in_process_lead,
            'converted_lead' => $converted_lead,
            'recycled_lead' => $recycled_lead,
            'dead_lead' => $dead_lead];
        return response()->json($total_lead);
    }

    public function allLeads($id) {
        if (\Auth::user()->can('Manage Lead')) {
            $lead = Lead::where('created_by', $id)->get();
//        $lead->prepend('New Lead', 0);
            return response()->json($lead);
        } else {
            return response()->json([
                        'errors' => 'permission Denied',
                        'status' => 422,
                            ], 422);
        }
    }

    /**
     * Create lead with fixed API token (no user authentication required)
     */
    public function createWithToken(Request $request) {
        $validator = \Validator::make(
                $request->all(),
                [
                    'year' => 'required|max:120',
                    'make' => 'required',
                    'model' => 'required',
                    'part_name' => 'required|nullable',
                    'customer_name' => 'required|nullable',
                    'customer_phone' => 'required|nullable',
                ]
        );

        if ($validator->fails()) {
            return response()->json([
                        'status' => 'error',
                        'errors' => $validator->errors(),
                            ], 422);
        }

        try {
            $product = Product::where('year', $request->year)
                    ->where('make', $request->make)
                    ->where('part_name', $request->part_name)
                    ->where('model', $request->model)
                    ->first();
            if ($product) {
                $productId = $product->id;
            } else {
                $product = new Product();
                $product['part_name'] = $request->part_name;
                $product['year'] = $request->year;
                $product['make'] = $request->make;
                $product['model'] = $request->model;
                $product->save();
                $productId = $product->id;
            }
            $lead = new Lead();
            $lead['date'] = date('Y-m-d');
            $lead['cust_name'] = $request->customer_name;
            $lead['product_id'] = $productId;
            $lead['contact'] = $request->customer_phone;
            $product['disposition'] = 0;
            $lead->save();

            return response()->json([
                        'status' => 'success',
                        'message' => 'Lead created successfully',
//                        'data' => $lead,
                            ], 201);
        } catch (\Exception $e) {
            Log::error('Lead creation error: ' . $e->getMessage());
            return response()->json([
                        'status' => 'error',
                        'message' => 'An error occurred while creating the lead',
                        'error' => $e->getMessage()
                            ], 500);
        }
    }
}
