{{Form::open(array('url'=>'payment_type','method'=>'post'))}}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('paymentType',__('Payment Gateway'),['class'=>'form-label']) }}
            {{Form::text('paymentType',null,array('class'=>'form-control','placeholder'=>__('Enter Payment Gateway'),'required'=>'required'))}}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
            {{Form::submit(__('Save'),array('class'=>'btn  btn-primary '))}}{{Form::close()}}
    </div>
</div>
{{Form::close()}}
