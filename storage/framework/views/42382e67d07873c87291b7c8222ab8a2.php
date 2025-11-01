<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Sales Return Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Edit Sales Return')); ?>  <?php echo e('('. \Auth::user()->salesorderNumberFormat($salesreturn->salesorder_id) .')'); ?>

<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('sales_return.edit',$previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php endif; ?>
    <?php if(!empty($next)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('sales_return.edit',$next)); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('sales_return.index')); ?>"><?php echo e(__('Sales Return')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-12">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($salesreturn,array('route' => array('sales_return.update', $salesreturn->id), 'method' => 'PUT'))); ?>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <?php echo e(Form::label('salesorder',__('Sales Orders'),['class'=>'form-label'])); ?>

                                    <?php echo Form::select('salesorder', $salesorder, $salesreturn->salesorder_id,array('id'=>'salesorder','class' => 'form-control','required'=>'required')); ?>

                                </div>
                            </div>        
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('salesreturn_number',__('Sales Return Number'),['class'=>'form-label'])); ?>

                                    <?php echo e(Form::text('salesreturn_number',\Auth::user()->salesReturnFormat($salesreturn->salesreturn_id),array('class'=>'form-control','placeholder'=>__('Enter Sales Return Number'),'disabled'))); ?>

                                    <input type="hidden" name="salesreturn_id" id="salesreturn_id" value="<?php echo e($salesreturn->salesreturn_id); ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('return_date',__('Return Date'),['class'=>'form-label'])); ?>

                                    <?php echo e(Form::date('return_date',date('Y-m-d',strtotime($salesreturn->return_date)),array('class'=>'form-control datepicker','required'=>'required'))); ?>


                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <?php echo e(Form::label('request_type',__('Request Type'),['class'=>'form-label'])); ?>

                                    <?php echo Form::select('request_type', $request_type, $salesreturn->request_type,array('id'=>'request_type','class' => 'form-control','required'=>'required')); ?>

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
                            <div class="text-end">
                                <?php echo e(Form::submit(__('Update'),array('class'=>'btn-submit btn btn-primary'))); ?>

                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
</div>



<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<script>
    var scrollSpy = new bootstrap.ScrollSpy(document.body, {
        target: '#useradd-sidenav',
        offset: 300
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/sales_return/edit.blade.php ENDPATH**/ ?>