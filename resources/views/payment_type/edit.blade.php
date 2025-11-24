{{Form::model($paymentType, array('route' => array('payment_type.update', $paymentType->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('paymentType',__('Payment Gateway'),['class'=>'form-label'])}}
            {{Form::text('paymentType',null,array('class'=>'form-control','placeholder'=>__('Enter Payment Gateway')))}}
            @error('name')
            <span class="invalid-name" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
        data-bs-dismiss="modal">Close</button>
        {{Form::submit(__('Update'),array('class'=>'btn  btn-primary '))}}{{Form::close()}}
</div>
{{Form::close()}}
