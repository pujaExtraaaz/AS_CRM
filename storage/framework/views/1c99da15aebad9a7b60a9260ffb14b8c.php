<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php echo e(Form::open(['url' => 'account', 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

<div class="row">
    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
    <div class="text-end">
        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
            data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['account'])); ?>"
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
            <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('phone', __('Phone'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('Enter Phone'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('website', __('Website'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('Website'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('billingaddress', __('Billing Address'), ['class' => 'form-label'])); ?>

            <div class="action-btn bg-primary ms-2 float-end">
                <a class="mx-3 btn btn-sm d-inline-flex align-items-center text-white " id="billing_data"
                    data-bs-toggle="tooltip" data-placement="top" title="<?php echo e('Same As Billing Address'); ?>"><i
                        class="fas fa-copy"></i></a>
                <span class="clearfix"></span>
            </div>
            <?php echo e(Form::text('billing_address', null, ['class' => 'form-control', 'placeholder' => __('Billing Address'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('shippingaddress', __('Shipping Address'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::text('shipping_address', null, ['class' => 'form-control', 'placeholder' => __('Shipping Address'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_city', null, ['class' => 'form-control', 'placeholder' => __('Billing City'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_state', null, ['class' => 'form-control', 'placeholder' => __('Billing State'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_city', null, ['class' => 'form-control', 'placeholder' => __('Shipping City'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_state', null, ['class' => 'form-control', 'placeholder' => __('Shipping State'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_country', null, ['class' => 'form-control', 'placeholder' => __('Billing Country'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('billing_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Billing Postal Code'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_country', null, ['class' => 'form-control', 'placeholder' => __('Shipping Country'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-3">
        <div class="form-group">
            <?php echo e(Form::text('shipping_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Shipping Postal Code'), 'required' => 'required'])); ?>

        </div>
    </div>
    <div class="col-12">
        <hr class="mt-2 mb-2">
        <h6><?php echo e(__('Detail')); ?></h6>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('type', $accountype, null, ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Industry', __('Industry'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('industry', $industry, null, ['class' => 'form-control', 'required' => 'required']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('document_id', __('Document'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('document_id', $document_id, null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php echo e(Form::label('Assign User', __('Assign User'), ['class' => 'form-label'])); ?>

            <?php echo Form::select('user', $user, null, ['class' => 'form-control']); ?>

        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <?php echo e(Form::label('Description', __('Description'), ['class' => 'form-label'])); ?>

            <?php echo e(Form::textarea('description', null, ['class' => 'form-control','rows' => 2, 'placeholder' => __('Enter Description')])); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn  btn-light" data-bs-dismiss="modal">Close</button>
    <?php echo e(Form::submit(__('Save'), ['class' => 'btn btn-primary '])); ?>

</div>
</div>
<?php echo e(Form::close()); ?>

<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/account/create.blade.php ENDPATH**/ ?>