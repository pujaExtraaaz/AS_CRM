<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5><?php echo e(__('Lead Information')); ?></h5>
            </div>
            <div class="card-body" style=>
                <dl class="row">
                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Lead Name')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->name ?: '-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Customer Name')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->cust_name ?: '-'); ?></span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Contact Person')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->contact ?: '-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Email')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->email ?: '-'); ?></span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Phone')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->phone ?: '-'); ?></span></dd> -->

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Website')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->website ?: '-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Date')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->date ? \Auth::user()->dateFormat($lead->date) : '-'); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Lead Type')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->leadType)?$lead->leadType->name:'-'); ?></span></dd>

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Product')); ?></span></dt>
                    <dd class="col-md-8">
                        <?php if(!empty($lead->product)): ?>
                            <div class="product-details">
                                <div><strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($lead->product->part_name); ?></div>
                                <?php if($lead->product->Year): ?>
                                    <div><strong><?php echo e(__('Year')); ?>:</strong> <?php echo e($lead->product->Year); ?></div>
                                <?php endif; ?>
                                <?php if($lead->product->make): ?>
                                    <div><strong><?php echo e(__('Make')); ?>:</strong> <?php echo e($lead->product->make); ?></div>
                                <?php endif; ?>
                            </div>
                        <?php else: ?>
                            <span class="text-md">-</span>
                        <?php endif; ?>
                    </dd>
                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Account')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(!empty($lead->accounts)?$lead->accounts->name:'-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Disposition')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e(__(\App\Models\Lead::$disposition[$lead->disposition])); ?></span></dd>

                    <!-- <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Opportunity Amount')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->opportunity_amount ? '$' . number_format($lead->opportunity_amount, 2) : '-'); ?></span></dd> -->

                    <dt class="col-md-4"><span class="h6 text-md mb-0"><?php echo e(__('Note')); ?></span></dt>
                    <dd class="col-md-8"><span class="text-md"><?php echo e($lead->note ?: '-'); ?></span></dd>
                </dl>
            </div>
        </div>
    </div>

</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="d-flex justify-content-end">
            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Lead')): ?>
            <div class="action-btn bg-info ms-2">
                <a href="<?php echo e(route('lead.edit',$lead->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white" data-bs-toggle="tooltip" data-title="<?php echo e(__('Lead Edit')); ?>" title="<?php echo e(__('Edit')); ?>">
                    <i class="ti ti-edit"></i>
                </a>
            </div>
            <?php endif; ?> -->
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Lead')): ?>
            <button type="button" class="btn  btn-primary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php /**PATH E:\xampp2\htdocs\AS_CRM\resources\views/lead/view.blade.php ENDPATH**/ ?>