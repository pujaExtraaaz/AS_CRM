<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AuthLoginController extends Controller {

    public function sign_in(Request $request) {
        $validator = \Validator::make(
                $request->all(),
                [
                    'email' => 'required|email',
                    'password' => 'required',
                ]
        );
        if ($validator->fails()) {
            return response()->json([
                        'errors' => $validator->errors(),
                        'status' => 422,
                            ], 422);
        } else {
            try {
                $user = User::where('email', $request->email)->first();
                if (!$user || !Hash::check($request->password, $user->password)) {
                    return response()->json([
                                'errors' => ['email' => ['The provided credentials do not match our records.']],
                                'status' => 422,
                                    ], 422);
                }
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                            'message' => 'Login successfully Done.',
                            'user' => $user,
                            'token' => $token,
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
    }
}
