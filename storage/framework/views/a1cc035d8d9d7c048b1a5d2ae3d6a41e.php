<div class="row">
    <div class="col-lg-12">

            <div class="">
                <dl class="row">
                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Year')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($product->year ?? '-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Make')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($product->make ?? '-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Model')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($product->model ?? '-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Part Name')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e($product->part_name ?? '-'); ?></span></dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Status')); ?></span></dt>
                    <dd class="col-md-5">
                        <?php if($product->is_active == 1): ?>
                            <span class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Active')); ?></span>
                        <?php else: ?>
                            <span class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('Inactive')); ?></span>
                        <?php endif; ?>
                    </dd>

                    <dt class="col-md-5"><span class="h6 text-md mb-0"><?php echo e(__('Created')); ?></span></dt>
                    <dd class="col-md-5"><span class="text-md"><?php echo e(\Auth::user()->dateFormat($product->created_at)); ?></span></dd>

                </dl>
            </div>

    </div>
    <div class="w-100 text-end pr-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Product')): ?>
        <div class="action-btn bg-info ms-2">
            <a href="<?php echo e(route('product.edit', ['product' => $product->id, 'year' => $year ?? '', 'warehouse' => $warehouse ?? ''])); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip"data-title="<?php echo e(__('product Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
        </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/product/view.blade.php ENDPATH**/ ?>