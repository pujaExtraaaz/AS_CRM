
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Create Yard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <?php echo e(__('Create Yard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('yards.index')); ?>"><?php echo e(__('Yards')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Create')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="<?php echo e(route('yards.store')); ?>" class="needs-validation" novalidate="">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Yard Name')); ?> <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::text('yard_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Yard Name')])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Email')); ?> <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::email('yard_email', null, ['class' => 'form-control',  'placeholder' => __('Enter Email')])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Contact Person')); ?> <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::text('yard_person_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Person Name')])); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Phone')); ?> <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::text('contact', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Contact Number')])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label"><?php echo e(__('Address')); ?> <span class="text-danger">*</span></label>
                                    <div class="form-icon-user">
                                        <?php echo e(Form::textarea('yard_address', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => __('Enter Address'), 'rows' => 3])); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-end">
                                        <input type="submit" value="<?php echo e(__('Create')); ?>" class="btn btn-primary">
                                        <input type="button" value="<?php echo e(__('Cancel')); ?>" class="btn btn-secondary" onclick="location.href = '<?php echo e(route('yards.index')); ?>';">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/yards/create.blade.php ENDPATH**/ ?>