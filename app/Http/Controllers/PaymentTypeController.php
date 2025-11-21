<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\Request;


class PaymentTypeController extends Controller
{
    public function index()
    {
        // if (\Auth::user()->can('Manage PartType')) {

            if (\Auth::user()->type == 'owner') {
                $payment_type = PaymentType::get();
            } else {
                $payment_type = PaymentType::where('created_by', \Auth::user()->id)->get();
            }

            return view('payment_type.index', compact('payment_type'));
        // }

        return redirect()->back()->with('error', 'Permission Denied');
    }
      /**
     * Show the form for creating a new resource.
     *_name
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(\Auth::user()->can('Create LeadSource'))
        // {
            return view('payment_type.create');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
    
    public function store(Request $request)
    {
        
        // if(\Auth::user()->can('Create LeadSource'))
        // {
            $this->validate(
                $request, ['paymentType' => 'required|max:40',]
            );
            $paymentType  = $request['paymentType'];
            $payment_Type       = new paymentType();
            $payment_Type->paymentType = $paymentType;
            // $parttype['created_by']   = \Auth::user()->creatorId();
            $payment_Type->save();

            return redirect()->route('payment_type.index')->with('success', 'Payment Type ' . $payment_Type->paymentType . ' added!');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
      public function edit($id)
{
    $paymentType = PaymentType::findOrFail($id);

    return view('payment_type.edit', compact('paymentType'));
}

 /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\LeadSource $leadSource
     *
     * @return \Illuminate\Http\Response
     */
 public function update(Request $request, PaymentType $paymentType)
{
    $this->validate($request, [
        'paymentType' => 'required|max:40',
    ]);

    // Update the model properly
    $paymentType->paymentType = $request->paymentType;
    $paymentType->save();

    return redirect()->route('payment_type.index')
            ->with('success', 'Payment Type ' . $paymentType->paymentType . ' Updated!');
}
 public function destroy(PaymentType $paymentType)
    {
        // if(\Auth::user()->can('Delete LeadSource'))
        // {
            $paymentType->delete();

            return redirect()->route('payment_type.index')->with('success', 'Part Type ' . $paymentType->paymentType . ' Deleted!');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'permission Denied');
        // }
    }
    
}

