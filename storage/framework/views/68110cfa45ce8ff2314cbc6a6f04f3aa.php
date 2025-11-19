<?php $__env->startSection('breadcrumb'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Home')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Dashboard')); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Mobile responsive styles for traffic chart */
    @media (max-width: 768px) {
        .card-body {
            padding: 0.75rem;
        }
        #traffic-chart {
            min-height: 180px !important;
        }
    }

    @media (max-width: 480px) {
        .card-body {
            padding: 0.5rem;
        }
        #traffic-chart {
            min-height: 160px !important;
        }
    }
</style>
<div class="row">

    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <?php if(\Auth::user()->type == 'owner'): ?>
            <div class="col-xxl-7">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-user"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3"><?php echo e(__('Total User')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalUser']); ?> </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-info">
                                    <i class="fas fa-address-card"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3"><?php echo e(__('Total Lead')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalLead']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-secondary">
                                    <i class="ti ti-file-invoice"></i>
                                </div>
                                <p class="text-muted text-sm mb-1 "></p>
                                <h6 class="mb-3"><?php echo e(__('Total Sales Order')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalSalesorder']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-success">
                                    <i class="ti ti-brand-producthunt"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3"><?php echo e(__('Total Product')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalProduct']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-danger">
                                    <i class="fas fa-house-damage"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3"><?php echo e(__('Total Yard')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalYard']); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="theme-avtar bg-dark">
                                    <i class="fas fa-history"></i>
                                </div>
                                <p class="text-muted text-sm mt-4 mb-2"></p>
                                <h6 class="mb-3"><?php echo e(__('Total Return')); ?></h6>
                                <h3 class="mb-0"><?php echo e($data['totalSalesReturn']); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <!-- [ sample-page ] end -->
    </div>

    <!-- [ Main Content ] end -->
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/home.blade.php ENDPATH**/ ?>