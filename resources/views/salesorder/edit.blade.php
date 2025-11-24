@extends('layouts.admin')
@section('page-title')
{{ __('Sales Orders Edit') }}
@endsection
@section('title')
{{ __('Edit Sales') }} {{ '(' . $salesOrder->lead->cust_name . ')' }}
@endsection
@php
$plansettings = App\Models\Utility::plansettings();
@endphp
@section('action-btn')
<div class="btn-group" role="group">
    @if (!empty($previous))
    <div class="action-btn ms-2">
        <a href="{{ route('salesorder.edit', $previous) }}" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="{{ __('Previous') }}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @else
    <div class="action-btn ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="{{ __('Previous') }}">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    @endif
    @if (!empty($next))
    <div class="action-btn  ms-2">
        <a href="{{ route('salesorder.edit', $next) }}" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="{{ __('Next') }}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @else
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="{{ __('Next') }}">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    @endif
</div>
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Home') }}</a></li>
<li class="breadcrumb-item"><a href="{{ route('salesorder.index') }}">{{ __('Sales Order') }}</a></li>
<li class="breadcrumb-item">{{ __('Edit') }}</li>
@endsection
@section('content')
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top" style="top:30px">
                    <div class="list-group list-group-flush" id="useradd-sidenav">
                        <a href="#useradd-1"
                           class="list-group-item list-group-item-action border-0">{{ __('Overview') }} <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-2"
                           class="list-group-item list-group-item-action border-0">{{ __('Yard Details') }} <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    {{ Form::model($salesOrder, ['route' => ['salesorder.update', $salesOrder->id], 'method' => 'PUT']) }}
                    <div class="card-header">
                        <!--                        @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
                                                <div class="float-end">
                                                    <a href="#" data-size="md" class="btn btn-sm btn-primary "
                                                       data-ajax-popup-over="true" data-size="md"
                                                       data-title="{{ __('Generate content with AI') }}"
                                                       data-url="{{ route('generate', ['sales order']) }}" data-toggle="tooltip"
                                                       title="{{ __('Generate') }}">
                                                        <i class="fas fa-robot"></span><span
                                                                class="robot">{{ __('Generate With AI') }}</span></i>
                                                    </a>
                                                </div>
                                                @endif-->
                        <h5>{{ __('Overview') }}</h5>
                        <small class="text-muted">{{ __('Edit About Your sales orders Information') }}</small>
                    </div>

                    <div class="card-body">

                        <!-- Sales order form is visible for sales agents, admins, and owners -->
                        <form>
                            <div class="row">
                                <!-- Non-editable fields section -->
                                <div class="col-12">
                                    <h6 class="text-muted mb-0">{{ __('Sales Information') }}</h6>
                                </div>
                                <div class="card-body table-border-style">
                                    <div class="table-responsive">
                                        <table class="table" >
<!--                                            <tr>
                                                <th>{{ __('Sales Order Number') }}</th><th>{{'SO-' . str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT);}}</th>
                                                <th>{{ __('Sale Date') }}</th><td>{{\Auth::user()->dateFormat($salesOrder->sale_date);}}</td>
                                            </tr>-->
                                            <tr>
                                                <th>{{ __('Customer Name') }}</th><td>{{($salesOrder->lead)?$salesOrder->lead->cust_name:''}}</td>
                                                <th>{{ __('Contact') }}</th><td>{{($salesOrder->lead)?$salesOrder->lead->contact:''}}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Lead Type') }}</th><td>{{$salesOrder->lead->leadType ? $salesOrder->lead->leadType->name : ''}}</td>
                                                <th>{{ __('Sales Agent') }}</th><td>{{($salesOrder->salesUser)?$salesOrder->salesUser->name:''}}</td>                                                    
                                            </tr>
                                            <tr>
                                                <th>{{ __('Year') }}</th><td>{{($salesOrder->lead && $salesOrder->lead->product) ? $salesOrder->lead->product->year : ''}}</td>  
                                                <th>{{ __('Make') }}</th><td>{{($salesOrder->lead && $salesOrder->lead->product) ? $salesOrder->lead->product->make : ''}}</td>                                                                                                                                            
                                            </tr>
                                            <tr>
                                                <th>{{ __('Model') }}</th><td>{{($salesOrder->lead && $salesOrder->lead->product) ? $salesOrder->lead->product->model:''}}</td>  
                                                <th>{{ __('Part Name') }}</th><td>{{($salesOrder->lead && $salesOrder->lead->product) ? $salesOrder->lead->product->part_name : ''}}</td>                                                                                                  
                                            </tr>                                            
                                        </table>
                                    </div>
                                </div>              

                                <!-- Sourcing Details section -->
                                <div class="col-12 mt-0">
                                    <h5 class="border-bottom pb-2">{{ __('Sourcing Details') }}</h5>
                                </div>                                
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('Sale Date', __('Sale Date'), ['class' => 'form-label']) }}
                                        {{ Form::text('sale_invoice_number', \Auth::user()->dateFormat($salesOrder->sale_date), ['class' => 'form-control', 'placeholder' => __('VIN Number'),'readonly'=>'true']) }}                                         
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('user', __('Source User'), ['class' => 'form-label']) }}
                                        {!! Form::select('user', $user, $salesOrder->source_id, ['class' => 'form-control ']) !!}
                                        @error('user')
                                        <span class="invalid-user" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- M. VIN Number -->
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('invoice_number', __('Invoice Number'), ['class' => 'form-label']) }}
                                        {{ Form::text('sale_invoice_number', 'INV-' . $lastSaleId, ['class' => 'form-control', 'placeholder' => __('VIN Number')]) }}
                                    </div>
                                </div>    
                                <!-- M. VIN Number -->
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('vin_number', __('VIN Number'), ['class' => 'form-label']) }}
                                        {{ Form::text('vin_number', $salesOrder->vin_number, ['class' => 'form-control', 'placeholder' => __('VIN Number')]) }}
                                    </div>
                                </div>    
                                <!-- Sale Status -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('sale_status', __('Sale Status'), ['class' => 'form-label']) }}
                                        {{ Form::text('sale_status', $salesOrder->sale_status ?? 'Sourcing', ['class' => 'form-control']) }}
                                    </div>
                                </div>                                                                                     
                                <!-- O. Part Number -->
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('part_number', __('Part Number'), ['class' => 'form-label']) }}
                                        {{ Form::text('part_number', $salesOrder->part_number, ['class' => 'form-control', 'placeholder' => __('Part Number'),'required'=>'required']) }}
                                    </div>
                                </div>

                                <!-- P. Part Type -->
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('part_type', __('Part Type'), ['class' => 'form-label']) }}
                                        {!! Form::select('part_type', $partTypes, $salesOrder->part_type, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <!-- Sourcing Type -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('source_type', __('Sourcing Type'), ['class' => 'form-label']) }}
                                        {!! Form::select('source_type', $sourceTypes, $salesOrder->source_type, ['class' => 'form-control', 'id' => 'source_type','required'=>'required']) !!}
                                    </div>
                                </div>

                                <!-- Billing Details section -->
                                <div class="col-12 mt-0">
                                    <h5 class="border-bottom pb-2">{{ __('Billing Details') }}</h5>
                                </div>   
                                <!-- Billing Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('billing_address_text', __('Streat Address'), ['class' => 'form-label']) }}
                                        {{ Form::textarea('billing_address_text', $salesOrder->billing_address_text, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Billing Address')]) }}
                                    </div>
                                </div>
                                <!-- Billing Country -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('billing_country', __('Country'), ['class' => 'form-label']) }}
                                        {{ Form::text('billing_country', ($salesOrder->billing_country?$salesOrder->billing_country:'USA'), ['class' => 'form-control', 'placeholder' => __('Country')]) }}
                                    </div>
                                </div>
                                <!-- Billing City -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('billing_city', __('City'), ['class' => 'form-label']) }}
                                        {{ Form::text('billing_city', $salesOrder->billing_city, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                                    </div>
                                </div>
                                <!-- Billing State -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('billing_state', __('State'), ['class' => 'form-label']) }}
                                        {{ Form::text('billing_state', $salesOrder->billing_state, ['class' => 'form-control', 'placeholder' => __('State')]) }}
                                    </div>
                                </div>                               
                                <!-- Billing Zipcode-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('billing_zipcode', __('Zipcode'), ['class' => 'form-label']) }}
                                        {{ Form::text('billing_zipcode', $salesOrder->billing_zipcode, ['class' => 'form-control', 'placeholder' => __('Zipcode')]) }}
                                    </div>
                                </div>
                                <!-- Shipping Details section -->
                                <div class="col-12 mt-0">
                                    <h5 class="border-bottom pb-2">{{ __('Shipping Details') }}</h5>
                                </div>       
                                <!-- Shipping Address -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::label('shipping_address_text', __('Shipping Address'), ['class' => 'form-label']) }}
                                        {{ Form::textarea('shipping_address_text', ($salesOrder->shipping_address_text?$salesOrder->shipping_address_text:'USA'), ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Shipping Address')]) }}
                                    </div>
                                </div>
                                <!-- Shipping Country -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('shipping_country', __('Country'), ['class' => 'form-label']) }}
                                        {{ Form::text('shipping_country', $salesOrder->shipping_country, ['class' => 'form-control', 'placeholder' => __('Country')]) }}
                                    </div>
                                </div>
                                <!-- Shipping City -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('shipping_city', __('City'), ['class' => 'form-label']) }}
                                        {{ Form::text('shipping_city', $salesOrder->shipping_city, ['class' => 'form-control', 'placeholder' => __('City')]) }}
                                    </div>
                                </div>
                                <!-- Shipping State -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('shipping_state', __('State'), ['class' => 'form-label']) }}
                                        {{ Form::text('shipping_state', $salesOrder->shipping_state, ['class' => 'form-control', 'placeholder' => __('State')]) }}
                                    </div>
                                </div>                                
                                <!-- Shipping Zipcode-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        {{ Form::label('shipping_zipcode', __('Zipcode'), ['class' => 'form-label']) }}
                                        {{ Form::text('shipping_zipcode', $salesOrder->shipping_zipcode, ['class' => 'form-control', 'placeholder' => __('Zipcode')]) }}
                                    </div>
                                </div>                                  
                                <!-- Payment Information section -->
                                <div class="col-12 mt-0">
                                    <h5 class="border-bottom pb-2">{{ __('Payment Information') }}</h5>
                                </div>

                                <!-- Payment Gateway -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('payment_gateway_name', __('Payment Gateway'), ['class' => 'form-label']) }}
                                        {!! Form::select('payment_gateway_name', $paymentGateways, $salesOrder->payment_gateway_name, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <!-- Name On Card -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('name_on_card', __('Name On Card'), ['class' => 'form-label']) }}
                                        {{ Form::text('name_on_card', $salesOrder->card_number, ['class' => 'form-control', 'placeholder' => __('Name On Card')]) }}
                                    </div>
                                </div>

                                <!-- Card Number -->
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('card_number', __('Card Number'), ['class' => 'form-label']) }}
                                        {{ Form::text('card_number', $salesOrder->card_number, ['class' => 'form-control', 'placeholder' => __('Card Number')]) }}
                                    </div>
                                </div>

                                <!-- Expiration -->
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('expiration', __('Expiration'), ['class' => 'form-label']) }}
                                        {{ Form::text('expiration', $salesOrder->expiration, ['class' => 'form-control', 'placeholder' => __('MM/YY')]) }}
                                    </div>
                                </div>

                                <!-- CVV -->
                                <div class="col-md-4 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('cvv_number', __('CVV'), ['class' => 'form-label']) }}
                                        {{ Form::text('cvv_number', $salesOrder->cvv_number, ['class' => 'form-control', 'placeholder' => __('CVV')]) }}
                                    </div>
                                </div>

                                <!-- Pricing Details section -->
                                <div class="col-12 mt-0">
                                    <h5 class="border-bottom pb-2">{{ __('Pricing Details') }}</h5>
                                </div>

                                <!-- Part Price -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('part_price', __('Part Price'), ['class' => 'form-label']) }}
                                        {{ Form::number('part_price', $salesOrder->part_price, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => __('0.00')]) }}
                                    </div>
                                </div>

                                <!-- Shipping Price -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('shipping_price', __('Shipping Price'), ['class' => 'form-label']) }}
                                        {{ Form::number('shipping_price', $salesOrder->shipping_price, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => __('0.00')]) }}
                                    </div>
                                </div>

                                <!-- Charge Amount -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('charge_amount', __('Charge Amount'), ['class' => 'form-label']) }}
                                        {{ Form::number('charge_amount', $salesOrder->charge_amount, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => __('0.00')]) }}
                                    </div>
                                </div>

                                <!-- Total Quoted -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('total_amount_quoted', __('Total Quoted'), ['class' => 'form-label']) }}
                                        {{ Form::number('total_amount_quoted', $salesOrder->total_amount_quoted, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => __('0.00')]) }}
                                    </div>
                                </div>
                                <!-- Total Quoted -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {{ Form::label('gross_profit', __('Gross Profit'), ['class' => 'form-label']) }}
                                        {{ Form::number('gross_profit', $salesOrder->gross_profit, ['class' => 'form-control', 'step' => '0.01', 'placeholder' => __('0.00')]) }}
                                    </div>
                                </div>
                                <!-- Agent Note -->
                                <div class="col-12 mb-4">
                                    <div class="form-group">
                                        {{ Form::label('agent_note', __('Agent Notes'), ['class' => 'form-label']) }}
                                        {{ Form::textarea('agent_note', $salesOrder->agent_note, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Agent Note')]) }}
                                    </div>
                                </div>                                                                                           
                                <div class="col-12 text-end">
                                    {{ Form::submit(__('Save Changes'), ['class' => 'btn btn-primary']) }}
                                    <a href="{{ route('salesorder.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                                </div>
                            </div>
                        </form>                       


                    </div>
                    {{ Form::close() }}
                </div>                 
                <!-- Yard form section is visible for source agents, admins, and owners -->
                <div id="useradd-2" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>{{ __('Yard Details') }}</h5>
                                <small class="text-muted">{{ __('Yard information and order details') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(\Auth::user()->type == 'Source Agent' || \Auth::user()->type == 'admin' || \Auth::user()->type == 'owner') 
                        <!-- Step 1: Yard Details Form -->
                        <div class="row">
                            <h6 class="border-bottom pb-2 mb-3">{{ __(' Yard Order Details') }}</h6>
                            {{ Form::model($salesOrder, ['route' => ['salesorder.save-yard-logs', $salesOrder->id], 'method' => 'POST']) }}        
                            <div class="row">
                                <!-- Yard Name -->
                             <div class="col-md-6">
                                 <label>Yard Name</label>
    <input type="text" id="yardSearch" class="form-control" placeholder="Search Yard">

    <div id="yardResults" 
         class="border bg-white" 
         style="position:absolute;width:100%;z-index:1000;"></div>
</div>

<div class="col-md-6">
    <label>Email</label>
    <input type="text" id="yard_email" class="form-control">
    </div>
<div class="col-md-6">
    <label class="mt-3">Contact Person</label>
    <input type="text" id="yard_person_name" class="form-control">
    </div>
<div class="col-md-6">
    <label class="mt-3">Contact No</label>
    <input type="text" id="yard_contact" class="form-control">

   
</div>

                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Yard Name') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon-user">
                                            {{ Form::text('yard_name', $salesOrder->yard->yard_name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Yard Name')]) }}
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Email') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon-user">
                                            {{ Form::email('yard_email', $salesOrder->yard->yard_email, ['class' => 'form-control',  'placeholder' => __('Enter Email')]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Contact Person') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon-user">
                                            {{ Form::text('yard_person_name', $salesOrder->yard->yard_person_name, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Person Name')]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Phone') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon-user">
                                            {{ Form::text('contact', $salesOrder->yard->contact, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Number')]) }}
                                        </div>
                                    </div>
                                </div>   -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">{{ __('Address') }} <span class="text-danger">*</span></label>
                                        <div class="form-icon-user">
                                            {{ Form::textarea('yard_address', null, [
    'id' => 'yard_address',
    'class' => 'form-control',
    'required' => 'required',
    'placeholder' => __('Enter Address'),
    'rows' => 3
]) }}

                                        </div>
                                    </div>
                                </div>
                                <!-- Yard Order Date -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('yard_order_date', __('Yard Order Date'), ['class' => 'form-label']) }}
                                        {{ Form::date('yard_order_date', $salesOrder->yard_order_date, ['class' => 'form-control']) }}
                                    </div>
                                </div>

                                <!-- Additional fields -->
                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('tracking_no', __('Tracking Number'), ['class' => 'form-label']) }}
                                        {{ Form::text('tracking_no', 'SO-' . str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT), ['class' => 'form-control fw-bold', 'readonly' => true, 'style' => 'background-color: #f8f9fa;']) }}
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        {{ Form::label('delivery_date', __('Delivery Date'), ['class' => 'form-label']) }}
                                        {{ Form::date('delivery_date', $salesOrder->delivery_date, ['class' => 'form-control']) }}
                                    </div>
                                </div>     
                                <!-- Card Used -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('card_used', __('Card Used'), ['class' => 'form-label']) }}
                                        {{ Form::text('card_used', $salesOrder->card_used, ['class' => 'form-control', 'placeholder' => __('Card used for payment'), 'id' => 'yard_form_card_used']) }}
                                    </div>
                                </div>
                                <!-- Comment -->
                                <div class="col-12 mb-3">
                                    <div class="form-group">
                                        {{ Form::label('comment', __('Order Comments'), ['class' => 'form-label']) }}
                                        {{ Form::textarea('comments', $salesOrder->comments, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter yard order comments'), 'id' => 'yard_form_comment']) }}
                                    </div>
                                </div>
                                <!-- Save Button -->
                                <div class="col-12 text-end">
                                    {{ Form::submit(__('Save Yard Details'), ['class' => 'btn btn-primary']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        @endif
                        @if($salesOrder->yard_id)
                        <!-- Saved Yard Details Display (Hidden initially) -->
                        <div class="row" >
                            <h6 class="border-bottom pb-2 mb-3">{{ __('Final Yard Details') }}</h6>
                            <div class="alert alert-success">
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>{{ __('Yard Name:') }}</strong> <span>{{$salesOrder->yard->yard_name}}</span><br>
                                        <strong>{{ __('Order Date:') }}</strong> <span>{{\Auth::user()->dateFormat($salesOrder->yard_order_date)}}</span><br>
                                        <strong>{{ __('Expected Delivery:') }}</strong> <span>{{\Auth::user()->dateFormat($salesOrder->delivery_date)}}</span><br>                                        
                                    </div>
                                    <div class="col-md-6">
                                        <strong>{{ __('Card Used:') }}</strong> <span>{{$salesOrder->card_used}}</span><br>
                                        <strong>{{ __('Comments:') }}</strong> <span>{{$salesOrder->comment}}</span>
                                        <strong>{{ __('Tracking Number:') }}</strong> <span>{{$salesOrder->tracking_no}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Yard Selection Results (After Search) -->
                        <div id="yard_selection_results" class="row" style="display: none;">
                            <h6 class="mb-3">{{ __('Search Results:') }}</h6>
                            <!-- Search results will be loaded here -->
                        </div>

                        <!-- Selected Yards Summary -->
                        <div id="selected_yards_summary" class="mt-3" style="display: none;">
                            <h6>{{ __('Selected Yards:') }}</h6>
                            <div id="selected_yards_list"></div>
                            <button type="button" class="btn btn-success mt-2" id="confirm_yard_selection">
                                <i class="ti ti-check me-2"></i>{{ __('Confirm Yard Selection') }}
                            </button>
                        </div>

                        @if($salesOrder->yardLogs)            
                        <!-- Yard Logs Section -->
                        <div class="row mt-4">
                            <h6 class="border-bottom pb-2 mb-3">{{ __('Yard Activity Logs') }}</h6>
                            <div id="yard_logs_container">                           
                                @foreach($salesOrder->yardLogs as $log)
                                <div class="card mb-2">
                                    <div class="card-body py-2">
                                        <div class="row align-items-center">
                                            <div class="col-md-1">
                                                <div class="form-check">
                                                    @if(\Auth::user()->type == 'Source Agent' || \Auth::user()->type == 'admin' || \Auth::user()->type == 'owner')                                                    
                                                    <input class="form-check-input yard-log-checkbox" 
                                                           type="checkbox" 
                                                           data-log-id="{{ $log->id }}"
                                                           {{ $log->is_completed ? 'checked' : '' }}>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <h6 class="mb-1">
                                                            @if($log->yard)
                                                            <small class="text-muted">({{ $log->yard->yard_name }})</small>
                                                            @endif
                                                        </h6>
                                                        <small class="text-muted">
                                                            <i class="ti ti-user me-1"></i>{{ $log->createdBy->name ?? 'Unknown' }}
                                                            <i class="ti ti-clock me-1 ms-2"></i>{{ $log->created_at->format('M d, Y H:i') }}
                                                        </small>
                                                        @if($log->comments)
                                                        <br><small class="text-info">
                                                            <i class="ti ti-message me-1"></i>{{ $log->comments }}
                                                        </small>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach                            
                            </div>
                        </div>
                        @else
                        <div class="text-center py-4">
                            <i class="ti ti-clipboard-list text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-2">{{ __('No yard activity logs yet. Save yard details to create logs.') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>          
        </div>
    </div>
    <!-- [ sample-page ] end -->
</div>
<!-- [ Main Content ] end -->
</div>
@endsection
@push('script-page')
<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
<script>
    $(document).on('click', '#billing_data', function () {
        $("[name='shipping_address']").val($("[name='billing_address']").val());
        $("[name='shipping_city']").val($("[name='billing_city']").val());
        $("[name='shipping_state']").val($("[name='billing_state']").val());
        $("[name='shipping_country']").val($("[name='billing_country']").val());
        $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
    });
    // Display saved yard details
    function displaySavedYardDetails(yardData) {
        $('#display_order_date').text(yardData.yard_order_date || 'Not set');
        $('#display_delivery_date').text(yardData.delivery_date || 'Not set');
        $('#display_payment_method').text(yardData.card_used || 'Not set');
        $('#display_comments').text(yardData.comment || 'No comments');
    }

    // Confirm yard selection
    $('#confirm_yard_selection').on('click', function () {
        var selectedYardIds = [];
        $('.yard-selection-checkbox:checked').each(function () {
            selectedYardIds.push($(this).val());
        });
        if (selectedYardIds.length === 0) {
            console.log('Please select at least one yard');
            return;
        }

        $.ajax({
            url: '{{ route("salesorder.select-yards", $salesOrder->id) }}',
            type: 'POST',
            data: {
                yard_ids: selectedYardIds,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    console.log('Success: ' + response.message);
                    location.reload();
                } else {
                    console.log('Error: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                console.log('Error selecting yards:', xhr, status, error);
            }
        });
    });
    // Yard log checkbox functionality
    $(document).on('change', '.yard-log-checkbox', function () {
        var logId = $(this).data('log-id');
        var isCompleted = $(this).is(':checked');
        var $card = $(this).closest('.card');
        $.ajax({
            url: '{{ route("salesorder.yard-log.update-status", ":logId") }}'.replace(':logId', logId),
            type: 'POST',
            data: {
                is_completed: isCompleted ? 1 : 0,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    console.log('Success: ' + response.message);
                    window.location.reload();
                    // Update UI based on completion status
                } else {
                    // Revert checkbox state on error
                    $(this).prop('checked', !isCompleted);
                    console.log('Error: ' + (response.message || '{{ __("Error updating log status.") }}'));
                }
            },
            error: function (xhr, status, error) {
                // Revert checkbox state on error
                $(this).prop('checked', !isCompleted);
                console.log('Error: {{ __("Error updating log status. Please try again.") }}');
                console.error('Error:', error);
            }
        });
    });

   
        // In your Blade file or a separate JS file
    
        $('#searchInput').on('keyup', function() {
            var query = $(this).val();

            if (query.length > 2) { // Only search if query is long enough
                $.ajax({
                    url: "{{ route('yards.search') }}",
                    method: 'GET',
                    data: { query: query },
                    success: function(response) {console.log(response);
                        $('#searchResults').empty(); // Clear previous results
                        if (response.length > 0) {
                            $.each(response, function(index, yard) {alert(yard);
                                $('#searchResults').append('<div class="search-result-item" data-id="' + yard.id + '">' + yard.yard_name + '</div>');
                            });
                        } else {
                            $('#searchResults').append('<div>No results found.</div>');
                        }
                    }
                });
            } else {
                $('#searchResults').empty();
            }
        });

        // Optional: Handle selection from the dropdown
        $(document).on('click', '.search-result-item', function() {
            var selectedId = $(this).data('id');
            var selectedName = $(this).text();

            $('#searchInput').val(selectedName); // Set selected item in input
            $('#searchResults').empty(); // Hide results
            // You can also store the selectedId in a hidden input field
            // $('#selectedItemId').val(selectedId);
        });
</script>
<script>
$(document).ready(function(){

    $("#yardSearch").keyup(function(){

        let query = $(this).val();

        if (query.length < 1) {
            $("#yardResults").html('');
            return;
        }

        $.ajax({
            url: "{{ route('yard.autosearch') }}",
            type: "GET",
            data: { term: query },
            success: function(res) {
                let html = "";

                if (res.length > 0) {
                    res.forEach(row => {
                        html += `
                            <div class="p-2 border-bottom yard-item" 
                                style="cursor:pointer;"
                                data-name="${row.yard_name}"
                                data-email="${row.yard_email}"
                                data-person="${row.yard_person_name}"
                                data-contact="${row.contact}"
                                data-address="${row.yard_address}">
                                
                                <strong>${row.yard_name}</strong><br>
                                <small>${row.yard_email}</small>
                            </div>
                        `;
                    });
                } else {
                    html = '<div class="p-2 text-muted">No results found</div>';
                }

                $("#yardResults").html(html);
            }
        });
    });

    // When user clicks on result
    $(document).on("click", ".yard-item", function(){

        $("#yardSearch").val($(this).data("name"));
        $("#yard_email").val($(this).data("email"));
        $("#yard_person_name").val($(this).data("person"));        
        $("#yard_contact").val($(this).data("contact"));
        $("#yard_address").val($(this).data("address"));

        $("#yardResults").html(""); // hide dropdown
    });

});
</script>

@endpush
