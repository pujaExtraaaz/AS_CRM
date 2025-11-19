<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserVisitDetails;
use App\Models\User;
use App\Models\Stream;
use App\Models\Lead;
use App\Models\LeadSource;
use Illuminate\Support\Facades\Log;

class UserVisitDetailsController extends Controller {

    public function store(Request $request) {
        $validator = \Validator::make(
                $request->all(),
                [
                    'user_id' => 'required',
                    'lead_id' => 'required',
                    "latitude" => 'required',
                    "longitude" => 'required',
                    "area_name" => 'required',
                    "visiting_place" => 'required',
                    "person_name" => 'required',
                    "reason" => 'required',
                    "photo" => 'required',
                ]
        );

        if ($validator->fails()) {
            return response()->json([
                        'errors' => $validator->errors(),
                        'status' => 422,
                            ], 422);
        } else {
            try {
                if ($request->hasFile('photo')) {
                    $file = $request->file('photo');
                    $extension = $file->getClientOriginalExtension();
                    $newimage = rand() . '.' . $extension;
                    $file->move(public_path() . ("/img/visits/"), $newimage);
                } else {
                    $newimage = $request->photo;
                }
                $userVisitsData = new UserVisitDetails();
                $userVisitsData['user_id'] = $request->user_id;
                $userVisitsData['lead_id'] = $request->lead_id;
                $userVisitsData['latitude'] = $request->latitude;
                $userVisitsData['longitude'] = $request->longitude;
                $userVisitsData['area_name'] = $request->area_name;
                $userVisitsData['visiting_place'] = $request->visiting_place;
                $userVisitsData['person_name'] = $request->person_name;
                $userVisitsData['reason'] = $request->reason;
                $userVisitsData['photo'] = $newimage;
                // Save the user Visit Details
                $userVisitsData->save();
                
                // update visit_status in lead table
                $lead = Lead::find($request->lead_id);
                $lead->visit_status = 1;
                $lead->save();
                
                return response()->json([
                            'status' => 'success',
                            'message' => 'Added successfully',
                            'visit_details' => $userVisitsData,
                ]);
            } catch (\Exception $e) {
                Log::error('Visit Details form submission error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while creating the Visit Details',
                            'error' => $e->getMessage()
                                ], 500);
            }
        }
    }

    public function getVisitHistory($id) {
        $visit_history = UserVisitDetails::with('getLead')->where('user_id', $id)->get();
        return response()->json($visit_history);
    }
}
