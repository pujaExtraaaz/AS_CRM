<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="list-group-item">
        <div class="row align-items-center">
            
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e($plan->name); ?></a>
                <div>
                    <span class="text-sm"><?php echo e(\Auth::user()->priceFormat($plan->price)); ?> <?php echo e(' / '. __(\App\Models\Plan::$arrDuration[$plan->duration])); ?></span>
                </div>
            </div>
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e(__('User')); ?></a>
                <div>
                    <span class="text-sm"><?php echo e($plan->max_user); ?></span>
                </div>
            </div>
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e(__('Account')); ?></a>
                <div>
                    <span class="text-sm"><?php echo e($plan->max_account); ?></span>
                </div>
            </div>
            <div class="col ml-n2">
                <a href="#!" class="d-block h6 mb-0"><?php echo e(__('Contact')); ?></a>
                <div>
                    <span class="text-sm"><?php echo e($plan->max_contact); ?></span>
                </div>
            </div>
            <div class="col-auto">
                <?php if($user->plan==$plan->id): ?>
                    <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Active')); ?></span>
                <?php else: ?>
                <div class="action-btn bg-warning ms-2">
                    <a href="<?php echo e(route('plan.active',[$user->id,$plan->id])); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Upgrade Plan')); ?>" data-title="<?php echo e(__('Click to Upgrade Plan')); ?>">
                        <span class="btn-inner--icon"><i class="fas fa-cart-plus"></i></span>
                    </a>
                </div>
                 
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/user/plan.blade.php ENDPATH**/ ?>