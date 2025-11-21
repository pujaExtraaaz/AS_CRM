{{Form::open(array('url'=>'part_type','method'=>'post'))}}
<div class="row">
    <div class="col-12">
        <div class="form-group">
            {{Form::label('part_type_name',__('Part Type'),['class'=>'form-label']) }}
            {{Form::text('part_type_name',null,array('class'=>'form-control','placeholder'=>__('Enter Part Type'),'required'=>'required'))}}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
            {{Form::submit(__('Save'),array('class'=>'btn  btn-primary '))}}{{Form::close()}}
    </div>
</div>
{{Form::close()}}
