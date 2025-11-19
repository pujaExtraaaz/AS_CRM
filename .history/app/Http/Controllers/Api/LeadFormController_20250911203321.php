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
            'email' => 'required|email|max:255',
            'formType' => 'required|string|in:contact,partner,blueprint',
        ]);

        // Add conditional validation rules based on form type
        if ($request->input('formType') === 'partner' && !$request->has('fullName')) {
            $validator->addRules(['name' => 'required|string|max:255']);
        } elseif ($request->input('formType') === 'partner') {
            $validator->addRules(['fullName' => 'required|string|max:255']);
        } else {
            $validator->addRules(['name' => 'required|string|max:255']);
        }

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
            $formType = $request->input('formType');
            
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
            $lead->opportunity_amount = 0; // Set a default value
            $lead->is_converted = 0; // Not converted
            
            // Save the lead
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
            
            // Send notification email if needed
            // Commented out for testing purposes
            /*
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
            */
            
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