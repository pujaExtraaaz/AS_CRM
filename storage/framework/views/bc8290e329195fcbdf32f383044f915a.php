<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(['url' => 'commoncases', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
            data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['case'])); ?>"
            data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
        </a>
    </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('status', $status, null, ['class' => 'form-control ', 'required' => 'required']); ?>

        </div>
    </div>

    <?php if($type == 'account'): ?>
        <div class="col-6">
            <div class="form-group">
                <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                <?php echo Form::select('account', $account, $id, ['class' => 'form-control ']); ?>

            </div>
        </div>
    <?php else: ?>
        <div class="col-6">
            <div class="form-group">
                <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                <?php echo Form::select('account', $account, null, ['class' => 'form-control ']); ?>

            </div>
        </div>
    <?php endif; ?>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('priority', __('Priority'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('priority', $priority, null, ['class' => 'form-control ', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('contacts', __('Contact'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('contacts', $contact_name, null, ['class' => 'form-control ']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('type', $case_type, null, ['class' => 'form-control ', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('User', __('Assigned User'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('user', $user, null, ['class' => 'form-control ']); ?>

        </div>
    </div>

    


<div class="col-12">
    <div class="form-group">
        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

        <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Description')])); ?>

    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">Close</button>
    <?php echo e(Form::submit(__('Save'), ['class' => 'btn  btn-primary '])); ?><?php echo e(Form::close()); ?>

</div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH D:\xampp\htdocs\CRM\resources\views/commoncase/create.blade.php ENDPATH**/ ?>