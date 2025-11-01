<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersLocationLogs;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class LogController extends Controller {

    public function index(Request $request) {

        $userLogRecords = UsersLocationLogs::where('user_id', $request->user_id)
                ->whereDate('logged_at', $request->date)
                ->get();
        return response()->json($userLogRecords);
    }

    public function store(Request $request) {
        $validator = \Validator::make(
                $request->all(),
                ['user_id' => 'required',
                    "latitude" => 'required',
                    "longitude" => 'required',
                    "battery_percent" => 'required',
                    "logged_at" => 'required',
                ]
        );
        if ($validator->fails()) {
            return response()->json([
                        'errors' => $validator->errors(),
                        'status' => 422,
                            ], 422);
        } else {
            try {
                $userLogs = new UsersLocationLogs();
                $userLogs['user_id'] = $request->user_id;
                $userLogs['latitude'] = $request->latitude;
                $userLogs['longitude'] = $request->longitude;
                $userLogs['accuracy'] = $request->accuracy;
                $userLogs['battery_percent'] = $request->battery_percent;
                $userLogs['logged_at'] = $request->logged_at;
                // Save the user logs
                $userLogs->save();
                return response()->json([
                            'status' => 'success',
                            'message' => 'Added successfully',
                            'log' => $userLogs,
                ]);
            } catch (\Exception $e) {
                Log::error('Log form submission error: ' . $e->getMessage());
                return response()->json([
                            'status' => 'error',
                            'message' => 'An error occurred while creating the Log',
                            'error' => $e->getMessage()
                                ], 500);
            }
        }
    }

    public function live_logs($id = NULL) {
        $query = User::with('usersLocationLogs');
        if ($id) {
            $userLogs = $query->where('id', $id);
        }
        $userLogs = $query->get();
        return response()->json($userLogs);
    }
}
