@php
$plansettings = App\Models\Utility::plansettings();
@endphp
{{ Form::open(['url' => 'quote', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
<div class="row">
    @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="{{ __('Generate content with AI') }}" data-url="{{ route('generate', ['quote']) }}"
           data-toggle="tooltip" title="{{ __('Generate') }}">
            <i class="fas fa-robot"></span><span class="robot">{{ __('Generate With AI') }}</span></i>
        </a>
    </div>
    @endif
    <div class="col-9">
        <div class="form-group">
            {{ Form::label('lead', __('Select Lead'), ['class' => 'form-label']) }}
            {!! Form::select('lead', $lead, null, ['id' => 'lead', 'class' => 'form-control', 'required' => 'required']) !!}
        </div>
    </div>
    <div class="col-3">
        @can('Create Lead')
        <div class="form-group">
            {{ Form::label('lead', __('Select Lead'), ['class' => 'form-label invisible']) }}
            <a href="javascript::void(0);" data-url="{{ route('lead.create',['lead',0]) }}" data-size="lg" data-ajax-popup="true" data-bs-toggle="tooltip" data-title="{{__('Create New Lead')}}"title="{{__('Create')}}" class="btn btn-primary btn-icon m-1">
                {{__('Create New Lead')}}
            </a>
        </div>
        @endcan
    </div>
    <!--    <div class="col-6">
            <div class="form-group">
                {{ Form::label('name', __('Name'), ['class' => 'form-label']) }}
                {{ Form::text('name', null, ['id' => 'name', 'class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required']) }}
            </div>
        </div>-->

    <div class="col-6">
        <div class="form-group">
            {{ Form::label('quote_number', __('Quote Number'), ['class' => 'form-label']) }}
            {{ Form::text('quote_number', \Auth::user()->quoteNumberFormat($quote_no) , ['class' => 'form-control','disabled']) }}
            <input type="hidden" name="quote_id" id="quote_id" value="{{$quote_no}}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('date_quoted', __('Date Quoted'), ['class' => 'form-label']) }}
            {{ Form::date('date_quoted', null, ['class' => 'form-control datepicker', 'required' => 'required']) }}
        </div>
    </div>        
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('billing_address', __('Billing Address'), ['class' => 'form-label']) }}
            <div class="action-btn bg-primary ms-2 float-end">
                <a class="btn btn-sm btn-primary btn-icon m-1" id="billing_data" data-toggle="tooltip"
                   data-placement="top" title="Same As Billing Address"><i class="fas fa-copy"></i></a>
                <span class="clearfix"></span>
            </div>
            {{ Form::text('billing_address', null, ['id' => 'billing_address', 'class' => 'form-control', 'placeholder' => __('Billing Address')]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('shipping_address', __('Shipping Address'), ['class' => 'form-label']) }}
            {{ Form::text('shipping_address', null, ['id' => 'shipping_address', 'class' => 'form-control', 'placeholder' => __('Shipping Address')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('billing_country', null, ['id' => 'billing_country', 'class' => 'form-control', 'placeholder' => __('Billing Country')]) }}
        </div>
    </div>    
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('billing_state', null, ['id' => 'billing_state', 'class' => 'form-control', 'placeholder' => __('Billing State')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('shipping_country', null, ['id' => 'shipping_country', 'class' => 'form-control', 'placeholder' => __('Shipping Country')]) }}
        </div>
    </div>    
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('shipping_state', null, ['id' => 'shipping_state', 'class' => 'form-control', 'placeholder' => __('Shipping State')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('billing_city', null, ['id' => 'billing_city', 'class' => 'form-control', 'placeholder' => __('Billing city')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('billing_postalcode', null, ['id' => 'billing_postalcode', 'class' => 'form-control', 'placeholder' => __('Billing Postal Code')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('shipping_city', null, ['id' => 'shipping_city', 'class' => 'form-control', 'placeholder' => __('Shipping City')]) }}
        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            {{ Form::text('shipping_postalcode', null, ['id' => 'shipping_postalcode', 'class' => 'form-control', 'placeholder' => __('Shipping Postal Code')]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('billing_contact', __('Billing Contact'), ['class' => 'form-label']) }}
            {!! Form::select('billing_contact', $contact, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('shipping_contact', __('Shipping Contact'), ['class' => 'form-label']) }}
            {!! Form::select('shipping_contact', $contact, null, ['class' => 'form-control']) !!}
        </div>
    </div>
    {{-- <div class="col-6">
        <div class="form-group">
            {{ Form::label('tax', __('Tax'), ['class' => 'form-label']) }}
    {{ Form::select('tax[]', $tax,null, array('class' => 'form-control select2','id'=>'choices-multiple1','multiple'=>'')) }}
</div>
</div> --}}
<div class="col-6">
    <div class="form-group">
        {{ Form::label('opportunity', __('Opportunity'), ['class' => 'form-label']) }}
        {!! Form::select('opportunity', $opportunities, null, ['id' => 'opportunity', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{Form::label('account',__('Account'),['class'=>'form-label']) }}
        {!!Form::select('account', $account, null, array('class' => 'form-control ')) !!}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('Assign User', __('Assign User'), ['class' => 'form-label']) }}
        {!! Form::select('user', $user, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('shipping_provider', __('Shipping Provider'), ['class' => 'form-label']) }}
        {!! Form::select('shipping_provider', $shipping_provider, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="col-6">
    <div class="form-group">
        {{ Form::label('status', __('Status'), ['class' => 'form-label']) }}
        <select name="status" id="status" class="form-control" data-toggle="select" required>
                        @foreach ($status as $k => $v)
                        <option value="{{ $k }}">{{ __($v) }}</option>
                        @endforeach
                    </select>
                </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                {{ Form::label('description', __('Description'), ['class' => 'form-label']) }}
                {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Description')]) }}
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn  btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
            {{ Form::submit(__('Save'), ['class' => 'btn btn-primary']) }}
        </div>
    </div>
    {{ Form::close() }}
