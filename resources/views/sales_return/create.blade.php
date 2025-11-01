@php
$plansettings = App\Models\Utility::plansettings();
@endphp
{{Form::open(array('url'=>'sales_return','method'=>'post','enctype'=>'multipart/form-data'))}}
<div class="row">
    @if (isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on')
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="{{ __('Generate content with AI') }}" data-url="{{ route('generate', ['invoice']) }}"
           data-toggle="tooltip" title="{{ __('Generate') }}">
            <i class="fas fa-robot"></span><span class="robot">{{ __('Generate With AI') }}</span></i>
        </a>
    </div>
    @endif   

    <div class="col-12">
        <div class="form-group">
            {{Form::label('salesorder',__('Sales Orders'),['class'=>'form-label']) }}
            {!!Form::select('salesorder', $salesorder, null,array('id'=>'salesorder','class' => 'form-control','required'=>'required')) !!}
        </div>
    </div>        
    <div class="col-6">
        <div class="form-group">
            {{Form::label('salesreturn_number',__('Sales Return Number'),['class'=>'form-label']) }}
            {{Form::text('salesreturn_number',\Auth::user()->salesReturnFormat($salesreturn_no),array('class'=>'form-control','placeholder'=>__('Enter Sales Return Number'),'disabled'))}}
            <input type="hidden" name="salesreturn_id" id="salesreturn_id" value="{{$salesreturn_no}}">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('return_date',__('Return Date'),['class'=>'form-label']) }}
            {{Form::date('return_date',date('Y-m-d'),array('class'=>'form-control datepicker','required'=>'required'))}}

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{Form::label('request_type',__('Request Type'),['class'=>'form-label']) }}
            {!!Form::select('request_type', $request_type, null,array('id'=>'request_type','class' => 'form-control','required'=>'required')) !!}
        </div>
    </div> 
    <div class="col-6">
        <div class="form-group">
            {{Form::label('refund_amount',__('Refund Amount'),['class'=>'form-label']) }}
            <div class="input-group">
                <span class="input-group-text">$</span>
                {{Form::number('refund_amount',null,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))}}
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            {{Form::label('reason',__('Reason'),['class'=>'form-label']) }}
            {{Form::textarea('reason',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Reason')))}}
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
    {{Form::submit(__('Save'),array('class'=>'btn btn-primary'))}}{{Form::close()}}
</div>

</div>
</div>
{{Form::close()}}


