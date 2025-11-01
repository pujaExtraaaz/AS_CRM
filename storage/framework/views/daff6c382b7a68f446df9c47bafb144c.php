<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Create Product / Service')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('product.index')); ?>"><?php echo e(__('Product')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Create')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo e(__('Create Product / Service')); ?></h5>
                <small class="text-muted"><?php echo e(__('Add new product information')); ?></small>
            </div>
            <div class="card-body">
                <?php
                $plansettings = App\Models\Utility::plansettings();
                ?>
                <?php echo e(Form::open(array('url'=>'product','method'=>'post','enctype'=>'multipart/form-data'))); ?>

                <div class="row">
                    <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                    <div class="text-end">
                        <a href="#" data-size="md" class="btn btn-sm btn-primary" data-ajax-popup-over="true" data-size="md"
                           data-title="<?php echo e(__('Generate content with AI')); ?>" data-url="<?php echo e(route('generate', ['product'])); ?>"
                           data-toggle="tooltip" title="<?php echo e(__('Generate')); ?>">
                            <i class="fas fa-robot"></span><span class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="col-6">
                        <div class="form-group">
                            <?php echo e(Form::label('year',__('Year'),['class'=>'form-label'])); ?>

                            <?php echo Form::select('year', $years, null,array('class' => 'form-control','required'=>'required')); ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <?php echo e(Form::label('make',__('Make'),['class'=>'form-label'])); ?>

                            <?php echo e(Form::text('make',null,array('class'=>'form-control','placeholder'=>__('Enter Make'),'required'=>'required'))); ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <?php echo e(Form::label('model',__('Model'),['class'=>'form-label'])); ?>

                            <?php echo e(Form::text('model',null,array('class'=>'form-control','placeholder'=>__('Enter Model'),'required'=>'required'))); ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <?php echo e(Form::label('part_name',__('Part Name'),['class'=>'form-label'])); ?>

                            <?php echo e(Form::text('part_name',null,array('class'=>'form-control','placeholder'=>__('Enter Part Name'),'required'=>'required'))); ?>

                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <?php echo e(Form::label('is_active',__('Status'),['class'=>'form-label'])); ?>

                            <?php echo Form::select('is_active', $status, null,array('class' => 'form-control','required'=>'required')); ?>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group text-end">
                            <a href="<?php echo e(route('product.index')); ?>" class="btn btn-light"><?php echo e(__('Cancel')); ?></a>
                            <?php echo e(Form::submit(__('Create'),array('class'=>'btn btn-primary'))); ?>

                        </div>
                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script-page'); ?>
<script src="<?php echo e(asset('assets/js/plugins/choices.min.js')); ?>"></script>
<script src="<?php echo e(asset('libs/select2/dist/js/select2.min.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/product/create.blade.php ENDPATH**/ ?>