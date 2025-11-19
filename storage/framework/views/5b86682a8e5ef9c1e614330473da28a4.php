<?php echo e(Form::open(array('url'=>'target_list','method'=>'post'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Target List'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Target List'),'required'=>'required'))); ?>

        </div>
        <div class="form-group">
            <?php echo e(Form::label('description',__('Description'),['class'=>'form-label'])); ?>

            <?php echo e(Form::textarea('description',null,array('class'=>'form-control','rows'=>'3','placeholder'=>__('Enter Description')))); ?>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn  btn-light"
            data-bs-dismiss="modal">Close</button>
            <?php echo e(Form::submit(__('Save'),array('class'=>'btn  btn-primary '))); ?><?php echo e(Form::close()); ?>

    </div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH D:\xampp\htdocs\CRM\resources\views/target_list/create.blade.php ENDPATH**/ ?>