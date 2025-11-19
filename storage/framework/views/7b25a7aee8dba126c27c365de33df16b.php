<?php echo e(Form::model($taskStage, array('route' => array('task_stage.update', $taskStage->id), 'method' => 'PUT'))); ?>

<div class="row">
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

            <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Account Type')))); ?>

            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-name" role="alert">
                    <strong class="text-danger"><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light"
        data-bs-dismiss="modal">Close</button>
        <?php echo e(Form::submit(__('Update'),array('class'=>'btn  btn-primary '))); ?><?php echo e(Form::close()); ?>

</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/task_stage/edit.blade.php ENDPATH**/ ?>