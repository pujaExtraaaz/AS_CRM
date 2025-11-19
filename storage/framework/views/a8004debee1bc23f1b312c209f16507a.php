<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(array('url'=>'sales_return','method'=>'post','enctype'=>'multipart/form-data'))); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
           data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['invoice'])); ?>"
           data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>   

    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('salesorder',__('Sales Orders'),['class'=>'form-label'])); ?>

            <?php echo Form::select('salesorder', $salesorder, null,array('id'=>'salesorder','class' => 'form-control','required'=>'required')); ?>

        </div>
    </div>        
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('salesreturn_number',__('Sales Return Number'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('salesreturn_number',\Auth::user()->salesReturnFormat($salesreturn_no),array('class'=>'form-control','placeholder'=>__('Enter Sales Return Number'),'disabled'))); ?>

            <input type="hidden" name="salesreturn_id" id="salesreturn_id" value="<?php echo e($salesreturn_no); ?>">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('return_date',__('Return Date'),['class'=>'form-label'])); ?>

            <?php echo e(Form::date('return_date',date('Y-m-d'),array('class'=>'form-control datepicker','required'=>'required'))); ?>


        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('request_type',__('Request Type'),['class'=>'form-label'])); ?>

            <?php echo Form::select('request_type', $request_type, null,array('id'=>'request_type','class' => 'form-control','required'=>'required')); ?>

        </div>
    </div> 
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('refund_amount',__('Refund Amount'),['class'=>'form-label'])); ?>

            <div class="input-group">
                <span class="input-group-text">$</span>
                <?php echo e(Form::number('refund_amount',null,array('class'=>'form-control','placeholder'=>__('Enter Refund Amount'),'step'=>'0.01','min'=>'0'))); ?>

            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('reason',__('Reason'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('reason',null,array('class'=>'form-control','rows'=>2,'placeholder'=>__('Enter Reason')))); ?>

        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
    <?php echo e(Form::submit(__('Save'),array('class'=>'btn btn-primary'))); ?><?php echo e(Form::close()); ?>

</div>

</div>
</div>
<?php echo e(Form::close()); ?>



<?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/sales_return/create.blade.php ENDPATH**/ ?>