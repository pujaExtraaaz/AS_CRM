<div class="col-lg-12 order-lg-1">
    <dl class="row">
        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Name')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->name); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Website')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->website); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Email')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->email); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Phone')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->phone); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Billing Address')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->billing_address); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('City')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->billing_city); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Country')); ?></span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e($account->billing_country); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Type')); ?></span></dt>
        <dd class="col-sm-8"><span
                class="text-sm"><?php echo e(!empty($account->accountType) ? $account->accountType->name : '-'); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Industry')); ?></span></dt>
        <dd class="col-sm-8"><span
                class="text-sm"><?php echo e(!empty($account->accountIndustry) ? $account->accountIndustry->name : '-'); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
        <dd class="col-sm-8"><span
                class="text-sm"><?php echo e(!empty($account->assign_user) ? $account->assign_user->name : '-'); ?></span></dd>

        <dt class="col-sm-4"><span class="h6 text-sm mb-0">Created</span></dt>
        <dd class="col-sm-8"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($account->created_at)); ?></span></dd>
    </dl>
</div>

</div>
<div class="w-100 text-end pr-2">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Account')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('account.edit', $account->id)); ?>"
                data-bs-toggle="tooltip"class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                data-title="<?php echo e(__('Account Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
            </a>
        </div>
    <?php endif; ?>
</div>
</div>
<?php /**PATH D:\xampp\htdocs\CRM\resources\views/account/view.blade.php ENDPATH**/ ?>