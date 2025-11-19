<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserCheckinCheckoutDetails;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class VisitController extends Controller {

    public function checkin(Request $request) {
        $validator = \Validator::make(
                $request->all(),
                ['user_id' => 'required',
                    'user_name' => 'required|string',
                    "in_latitude" => 'required',
                    "in_longitude" => 'required',
                    "check_in_time" => 'required',
                    "in_battery_percent" => 'required',
                    "in_notes" => 'required',
                ]
        );
        if ($validator->fails()) {
            return response()->json([
                        'errors' => $validator->errors(),
                        'status' => 422,
                            ], 422);
        } else {
            try {
                $date = Carbon::now()->format('Y-m-d');
                $userCheckin = UserCheckinCheckoutDetails::whereDate('check_in_time', $date)->where('is_checkIn', 1)->where('is_checkOut', 0)->where('user_id', $request->user_id)->orderBy('id', 'DESC')->first();
                if ($userCheckin) {
                    return response()->json([
                                'errors' => ['user_name' => ['You Already Checked In. If you want to Check In again then You Need to Check Out First!']],
                                'status' => 422,
                                    ], 422);
                } else {
                    $userCheckinData = new UserCheckinCheckoutDetails();
                    $userCheckinData['user_id'] = $request->user_id;
                    $userCheckinData['user_name'] = $request->user_name;
                    $userCheckinData['in_latitude'] = $request->in_latitude;
                    $userCheckinData['in_longitude'] = $request->in_longitude;
                    $userCheckinData['in_accuracy'] = $request->in_accuracy;
                    $userCheckinData['in_battery_percent'] = $request->in_battery_percent;
                    $userCheckinData['check_in_time'] = $request->check_in_time;
                    $userCheckinData['in_notes'] = $request->in_notes;
                    $userCheckinData['is_checkIn'] = 1;
                    // Save the checkindetails
                    $userCheckinData->save();
                    return response()->json([
                                'status' => 'success',
                                'message' => 'Added successfully',
                                'visit' => $userCheckinData,
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Check In form submission error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while creating the Check In',
                            'error' => $e->getMessage()
                                ], 500);
            }
        }
    }

    public function checkout(Request $request, $id) {
        $validator = \Validator::make(
                $request->all(),
                ['user_id' => 'required',
                    "out_latitude" => 'required',
                    "out_longitude" => 'required',
                    "check_out_time" => 'required',
                    "out_battery_percent" => 'required',
                    "out_notes" => 'required',
                ]
        );
        if ($validator->fails()) {
            return response()->json([
                        'errors' => $validator->errors(),
                        'status' => 422,
                            ], 422);
        } else {
            try {
                $userCheckoutData = UserCheckinCheckoutDetails::find($id);

                if ($userCheckoutData->is_checkIn == 1 && $userCheckoutData->is_checkOut == 1) {
                    return response()->json([
                                'errors' => ['user_name' => ['You Already Checked Out!']],
                                'status' => 422,
                                    ], 422);
                } else {
                    $userCheckoutData['user_id'] = $request->user_id;
                    $userCheckoutData['out_latitude'] = $request->out_latitude;
                    $userCheckoutData['out_longitude'] = $request->out_longitude;
                    $userCheckoutData['out_accuracy'] = $request->out_accuracy;
                    $userCheckoutData['out_battery_percent'] = $request->out_battery_percent;
                    $userCheckoutData['check_out_time'] = $request->check_out_time;
                    $userCheckoutData['out_notes'] = $request->out_notes;
                    $userCheckoutData['is_checkOut'] = 1;
                    // Save the checkoutdetails
                    $userCheckoutData->update();
                }
                return response()->json([
                            'status' => 'success',
                            'message' => 'Updated successfully',
                            'visit' => $userCheckoutData,
                ]);
            } catch (\Exception $e) {
                Log::error('Check Out form submission error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while creating the Check Out',
                            'error' => $e->getMessage()
                                ], 500);
            }
        }
    }

    public function checkinId($id) {
        $date = Carbon::now()->format('Y-m-d');
        $userCheckin = UserCheckinCheckoutDetails::whereDate('check_in_time', $date)->where('is_checkIn', 1)->where('is_checkOut', 0)->where('user_id', $id)->orderBy('id', 'DESC')->first();
        return response()->json(($userCheckin) ? $userCheckin->id : NULL);
    }

    public function checkInOutHistory($id) {
        $userHistory = User::with('userCheckInCheckOutDetails')
                        ->where('id', $id)->get();
        return response()->json($userHistory);
    }
}
