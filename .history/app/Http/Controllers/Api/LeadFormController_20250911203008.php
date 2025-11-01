<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Stream;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeadFormController extends Controller
{
    /**
     * Store a new lead from website forms.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'message' => 'nullable|string',
            'businessType' => 'nullable|string|max:255',
            'business' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'cityState' => 'nullable|string|max:255',
            'fullName' => 'nullable|string|max:255',
            'applyingFor' => 'nullable|string|max:255',
            'businessBackground' => 'nullable|string|max:1000',
            'captchaInput' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create new lead
            $lead = new Lead();
            
            // Map form fields to lead model fields
            $lead->name = $request->input('fullName') ?? $request->input('name');
            $lead->email = $request->input('email');
            $lead->phone = $request->input('mobile') ?? $request->input('phone');
            
            // Set additional fields based on form type
            $formType = $request->input('formType', 'contact'); // Default to contact form
            
            // Store form-specific data in description field
            $description = [];
            
            switch ($formType) {
                case 'contact':
                    $description['message'] = $request->input('message');
                    $description['business'] = $request->input('business') ?? $request->input('businessType');
                    $description['location'] = $request->input('location');
                    break;
                    
                case 'partner':
                    $description['applyingFor'] = $request->input('applyingFor');
                    $description['businessBackground'] = $request->input('businessBackground');
                    $description['cityState'] = $request->input('cityState');
                    $description['message'] = $request->input('message');
                    break;
                    
                case 'blueprint':
                    $description['businessType'] = $request->input('businessType');
                    break;
            }
            
            $lead->description = json_encode($description);
            
            // Set default values for required fields
            $lead->status = 0; // New status
            $lead->created_by = 1; // Admin user ID (you may need to adjust this)
            
            $lead->save();
            
            // Create activity stream
            Stream::create([
                'user_id' => 1, // Admin user ID
                'created_by' => 1, // Admin user ID
                'log_type' => 'created',
                'remark' => json_encode([
                    'owner_name' => 'Website Form',
                    'title' => 'lead',
                    'stream_comment' => '',
                    'user_name' => $lead->name,
                ]),
            ]);
            
            // Send notification email
            $uArr = [
                'lead_name' => $lead->name,
                'lead_email' => $lead->email,
            ];
            Utility::sendEmailTemplate('lead_assign', [$lead->id => $lead->email], $uArr);
            
            // Send webhook notification if configured
            $module = 'New Lead';
            $webhook = Utility::webhookSetting($module);
            if ($webhook) {
                $parameter = json_encode($lead);
                Utility::WebhookCall($webhook['url'], $parameter, $webhook['method']);
            }
            
            return response()->json([
                'status' => 'success',
                'message' => 'Lead successfully created',
                'data' => [
                    'lead_id' => $lead->id
                ]
            ], 201);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the lead',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 