<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

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
            
            $description['form_source'] = $formType;
            $lead->description = json_encode($description);
            
            // Set default values for required fields
            $lead->status = 0; // New status
            $lead->user_id = 1; // Default to admin user ID (1) - will be visible only to admin until reassigned
            $lead->created_by = 3; // Set created_by to user ID 3
            $lead->source = 'website'; // Set source as website
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
                    'stream_comment' => 'Lead created from website form: ' . $formType,
                    'user_name' => $lead->name,
                ]),
            ]);
            
            // For production, uncomment these lines and implement proper email notification
            // Note: In testing environment, we're skipping email notifications
            /*
            // Send notification email to admin
            $adminEmail = config('app.admin_email', 'admin@example.com');
            $uArr = [
                'lead_name' => $lead->name,
                'lead_email' => $lead->email,
                'form_type' => $formType,
            ];
            
            try {
                // Implement your email notification here
                // Example: Mail::to($adminEmail)->send(new LeadNotification($uArr));
            } catch (\Exception $e) {
                // Log email error but continue processing
                Log::error('Failed to send lead notification email: ' . $e->getMessage());
            }
            
            // Send webhook notification if configured
            try {
                // Implement your webhook notification here
                // Example: Http::post($webhookUrl, ['lead' => $lead]);
            } catch (\Exception $e) {
                // Log webhook error but continue processing
                Log::error('Failed to send webhook notification: ' . $e->getMessage());
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
            Log::error('Lead form submission error: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while creating the lead',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 