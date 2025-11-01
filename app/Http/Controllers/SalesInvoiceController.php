<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Lead;
use App\Models\SalesInvoice;
use App\Models\ShippingProvider;
use App\Models\Stream;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\Auth::user()->can('Manage SalesInvoice')) {
            if (\Auth::user()->type == 'owner') {
                $salesInvoices = SalesInvoice::with(['sourcingAgent', 'billingContact', 'shippingContact'])
                    ->where('created_by', \Auth::user()->creatorId())
                    ->get();
            } else {
                $salesInvoices = SalesInvoice::with(['sourcingAgent', 'billingContact', 'shippingContact'])
                    ->where('sourcing_agent_id', \Auth::user()->id)
                    ->get();
            }
            
            return view('salesinvoice.index', compact('salesInvoices'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        if (\Auth::user()->can('Create SalesOrder')) {
            $users = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $users->prepend('--', 0);
            
            $contacts = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $contacts->prepend('--', 0);
            
            $shippingProviders = ShippingProvider::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $shippingProviders->prepend('--', 0);
            
            // Get available leads (not already converted to sales invoices)
//            $usedLeadIds = SalesInvoice::where('created_by', \Auth::user()->creatorId())
//                ->whereNotNull('lead_id')
//                ->pluck('lead_id')
//                ->toArray();
            
             $leads = Lead::where('created_by', \Auth::user()->creatorId())
//                 ->whereNotIn('id', $usedLeadIds)
                 ->get()
                 ->pluck('name', 'id');
             $leads->prepend('--', 0);
            
            // Fetch existing sales order number from the latest sales_invoice record
            $latestSalesInvoice = SalesInvoice::where('created_by', \Auth::user()->creatorId())
                ->orderBy('id', 'desc')
                ->first();
            
            $existingSalesOrderNumber = $latestSalesInvoice ? $latestSalesInvoice->sales_order_number : null;
            
            // Debug logging
            \Log::info('=== SALES ORDER CREATE DEBUG ===');
            \Log::info('Creator ID: ' . \Auth::user()->creatorId());
            \Log::info('Latest Sales Invoice: ' . ($latestSalesInvoice ? json_encode($latestSalesInvoice->toArray()) : 'NULL'));
            \Log::info('Existing Sales Order Number: ' . ($existingSalesOrderNumber ?? 'NULL'));
            
            // If no existing sales order number, generate a new formatted one
            if (!$existingSalesOrderNumber) {
                $nextId = SalesInvoice::generateSalesOrderNumber(\Auth::user()->creatorId());
                $existingSalesOrderNumber = 'SOP' . sprintf("%05d", $nextId);
                \Log::info('No existing sales invoices found - generating new number: ' . $existingSalesOrderNumber);
            }
            \Log::info('Final sales_no value: ' . $existingSalesOrderNumber);
            \Log::info('================================');
            
            return view('salesorder.create', compact('users', 'contacts', 'shippingProviders', 'leads', 'existingSalesOrderNumber'))->with('sales_no', $existingSalesOrderNumber);
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Add debugging
        \Log::info('=== SALES INVOICE STORE METHOD CALLED ===');
        \Log::info('SalesInvoice Store Request Data:', $request->all());
        
        // Temporarily remove permission check for debugging
        // if (\Auth::user()->can('Create SalesInvoice')) {
            \Log::info('Skipping permission check for debugging');
            
            $validator = Validator::make($request->all(), [
                'sale_date' => 'required|date',
                'sale_status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
                'sourcing_agent_id' => 'required|exists:users,id',
//                'billing_address' => 'required|string|max:255',
//                'billing_country' => 'required|string|max:100',
//                'billing_state' => 'required|string|max:100',
//                'billing_city' => 'required|string|max:100',
//                'billing_postalcode' => 'required|string|max:20',
//                'shipping_address' => 'required|string|max:255',
//                'shipping_country' => 'required|string|max:100',
//                'shipping_state' => 'required|string|max:100',
//                'shipping_city' => 'required|string|max:100',
//                'shipping_postalcode' => 'required|string|max:20',
//                'payment_gateway' => 'required|in:card,paypal,zelle,bank_transfer,ach,invoice',
//                'part_price' => 'required|numeric|min:0',
//                'shipping_price' => 'required|numeric|min:0',
//                'gross_profit' => 'required|numeric|min:0',
//                'charge_amount' => 'required|numeric|min:0',
//                'total_amount_quoted' => 'required|numeric|min:0',
//                'billing_contact_id' => 'nullable|exists:contacts,id',
//                'shipping_contact_id' => 'nullable|exists:contacts,id',
//                'shipping_provider_id' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                \Log::info('Validation failed:', $validator->errors()->toArray());
                return redirect()->back()->with('error', $validator->errors()->first());
            }

            // Additional validation for card payment
            if ($request->payment_gateway === 'card') {
                $cardValidator = Validator::make($request->all(), [
                    'name_on_card' => 'required|string|max:255',
                    'card_number' => 'required|string|max:19',
                    'expiration' => 'required|string|max:5',
                    'cvv' => 'required|string|max:4',
                ]);

                if ($cardValidator->fails()) {
                    \Log::info('Card validation failed:', $cardValidator->errors()->toArray());
                    return redirect()->back()->with('error', $cardValidator->errors()->first());
                }
            }

            try {
                $salesInvoice = new SalesInvoice();
                $salesInvoice->fill($request->all());
                $salesInvoice->created_by = \Auth::user()->creatorId();
                
                // Debug before save
                \Log::info('SalesInvoice before save:', $salesInvoice->toArray());
                
                $salesInvoice->save();
                
                // Generate sales order number based on sales invoice ID after save
                $salesInvoice->sales_order_number = \Auth::user()->salesorderNumberFormat($salesInvoice->id);
                $salesInvoice->save(); // Save again with the generated sales order number
                
                // Debug after save
                \Log::info('SalesInvoice after save:', $salesInvoice->toArray());
                \Log::info('Sales Invoice saved successfully with ID: ' . $salesInvoice->id);
                \Log::info('Generated Sales Order Number: ' . $salesInvoice->sales_order_number);
            } catch (\Exception $e) {
                \Log::error('Error saving Sales Invoice: ' . $e->getMessage());
                \Log::error('Stack trace: ' . $e->getTraceAsString());
                return redirect()->back()->with('error', 'Error saving data: ' . $e->getMessage());
            }

            // Create activity stream
            Stream::create([
                'user_id' => \Auth::user()->id,
                'created_by' => \Auth::user()->creatorId(),
                'log_type' => 'created',
                'remark' => json_encode([
                    'owner_name' => \Auth::user()->username,
                    'title' => 'sales_invoice',
                    'stream_comment' => '',
                    'user_name' => $salesInvoice->sales_order_number,
                ]),
            ]);

            // Send notification if enabled
            $setting = Utility::settings(\Auth::user()->creatorId());
            if ($setting['twilio_salesorder_create'] ?? false) {
                $sourcingAgent = User::find($request->sourcing_agent_id);
                if ($sourcingAgent) {
                    $uArr = [
                        'sales_order_number' => $salesInvoice->sales_order_number,
                        'total_amount' => $salesInvoice->total_amount_quoted,
                        'user_name' => \Auth::user()->name,
                    ];
                    Utility::send_twilio_msg($sourcingAgent->phone, 'new_salesinvoice', $uArr);
                }
            }

            return redirect()->route('salesinvoice.index')->with('success', __('Sales Invoice successfully created!'));
        // } else {
        //     \Log::info('User does NOT have permission to create SalesInvoice');
        //     return redirect()->back()->with('error', 'Permission Denied');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        if (\Auth::user()->can('Show SalesInvoice')) {
            $salesInvoice = SalesInvoice::with(['sourcingAgent', 'billingContact', 'shippingContact'])
                ->findOrFail($id);

            return view('salesinvoice.show', compact('salesInvoice'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (\Auth::user()->can('Edit SalesInvoice')) {
            $salesInvoice = SalesInvoice::findOrFail($id);
            
            $users = User::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $users->prepend('--', 0);
            
            $contacts = Contact::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $contacts->prepend('--', 0);
            
            $shippingProviders = ShippingProvider::where('created_by', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $shippingProviders->prepend('--', 0);

            return view('salesinvoice.edit', compact('salesInvoice', 'users', 'contacts', 'shippingProviders'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (\Auth::user()->can('Edit SalesInvoice')) {
            $salesInvoice = SalesInvoice::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'sale_date' => 'required|date',
                'sale_status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
                'sourcing_agent_id' => 'required|exists:users,id',
                'billing_address' => 'required|string|max:255',
                'billing_country' => 'required|string|max:100',
                'billing_state' => 'required|string|max:100',
                'billing_city' => 'required|string|max:100',
                'billing_postalcode' => 'required|string|max:20',
                'shipping_address' => 'required|string|max:255',
                'shipping_country' => 'required|string|max:100',
                'shipping_state' => 'required|string|max:100',
                'shipping_city' => 'required|string|max:100',
                'shipping_postalcode' => 'required|string|max:20',
                'payment_gateway' => 'required|in:card,paypal,zelle,bank_transfer,ach,invoice',
                'part_price' => 'required|numeric|min:0',
                'shipping_price' => 'required|numeric|min:0',
                'gross_profit' => 'required|numeric|min:0',
                'charge_amount' => 'required|numeric|min:0',
                'total_amount_quoted' => 'required|numeric|min:0',
                'billing_contact_id' => 'nullable|exists:contacts,id',
                'shipping_contact_id' => 'nullable|exists:contacts,id',
                'shipping_provider_id' => 'nullable|string|max:255',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->errors()->first());
            }

            // Additional validation for card payment
            if ($request->payment_gateway === 'card') {
                $cardValidator = Validator::make($request->all(), [
                    'name_on_card' => 'required|string|max:255',
                    'card_number' => 'required|string|max:19',
                    'expiration' => 'required|string|max:5',
                    'cvv' => 'required|string|max:4',
                ]);

                if ($cardValidator->fails()) {
                    return redirect()->back()->with('error', $cardValidator->errors()->first());
                }
            }

            $salesInvoice->fill($request->all());
            $salesInvoice->save();

            // Create activity stream
            Stream::create([
                'user_id' => \Auth::user()->id,
                'created_by' => \Auth::user()->creatorId(),
                'log_type' => 'updated',
                'remark' => json_encode([
                    'owner_name' => \Auth::user()->username,
                    'title' => 'sales_invoice',
                    'stream_comment' => '',
                    'user_name' => $salesInvoice->sales_order_number,
                ]),
            ]);

            return redirect()->route('salesinvoice.index')->with('success', __('Sales Invoice successfully updated!'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (\Auth::user()->can('Delete SalesInvoice')) {
            $salesInvoice = SalesInvoice::findOrFail($id);
            $salesInvoice->delete();

            return redirect()->back()->with('success', __('Sales Invoice successfully deleted!'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Duplicate a sales invoice
     */
    public function duplicate($id)
    {
        if (\Auth::user()->can('Create SalesInvoice')) {
            $originalInvoice = SalesInvoice::findOrFail($id);
            
            $duplicate = $originalInvoice->replicate();
            $duplicate->sales_order_number = \Auth::user()->salesorderNumberFormat(SalesInvoice::generateSalesOrderNumber(\Auth::user()->creatorId()));
            $duplicate->sale_status = 'pending';
            $duplicate->created_by = \Auth::user()->creatorId();
            $duplicate->save();

            // Create activity stream
            Stream::create([
                'user_id' => \Auth::user()->id,
                'created_by' => \Auth::user()->creatorId(),
                'log_type' => 'created',
                'remark' => json_encode([
                    'owner_name' => \Auth::user()->username,
                    'title' => 'sales_invoice',
                    'stream_comment' => 'Duplicated from ' . $originalInvoice->sales_order_number,
                    'user_name' => $duplicate->sales_order_number,
                ]),
            ]);

            return redirect()->back()->with('success', __('Sales Invoice successfully duplicated!'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }

    /**
     * Export sales invoices
     */
    public function export()
    {
        if (\Auth::user()->can('Export SalesInvoice')) {
            // Implementation for Excel export
            return redirect()->back()->with('success', __('Export functionality will be implemented'));
        } else {
            return redirect()->back()->with('error', 'Permission Denied');
        }
    }
}