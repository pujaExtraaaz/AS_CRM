<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Sales Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Sales Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Sales Order')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="action-btn ms-2">
    <a href="<?php echo e(route('salesorder.export')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
       title=" <?php echo e(__('Export')); ?>">
        <i class="ti ti-file-export"></i>
    </a>
</div>


<!--    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create SalesOrder')): ?>
        <div class="action-btn bg-warning ms-2">
            <a href="#" data-size="lg" data-url="<?php echo e(route('salesorder.create', ['salesorder', 0])); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Sales Order')); ?>" title="<?php echo e(__('Create')); ?>"
                class="btn btn-sm btn-primary btn-icon m-1">
                <i class="ti ti-plus"></i>
            </a>
        </div>
    <?php endif; ?>-->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive" style="overflow-x: auto;">
                    <table class="table datatable" id="datatable" style="min-width: 1200px;">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="name" style="width: 100px;"><?php echo e(__('ID')); ?></th>
                                <th scope="col" class="sort" data-sort="name" style="width: 150px;"><?php echo e(__('Name')); ?></th>
                                <th scope="col" class="sort" data-sort="sale_date" style="width: 120px;"><?php echo e(__('Sale Date')); ?></th>
                                <th scope="col" class="sort" data-sort="sale_status" style="width: 120px;"><?php echo e(__('Sale Status')); ?></th>
                                <!--<th scope="col" class="sort" data-sort="lead_id" style="width: 100px;"><?php echo e(__('Lead ID')); ?></th>-->
                                <th scope="col" class="sort" data-sort="source_type" style="width: 130px;"><?php echo e(__('Sourcing Type')); ?></th>
                                <th scope="col" class="sort" data-sort="yard" style="width: 120px;"><?php echo e(__('Yard')); ?></th>
                                <th scope="col" class="sort" data-sort="payment_gateway" style="width: 140px;"><?php echo e(__('Payment Gateway')); ?></th>
                                <th scope="col" class="sort" data-sort="status" style="width: 100px;"><?php echo e(__('Status')); ?></th>
                                <th scope="col" class="sort" data-sort="completion" style="width: 120px;"><?php echo e(__('Amount')); ?></th>
                                <th scope="col" class="sort" data-sort="completion" style="width: 150px;"><?php echo e(__('Source User')); ?></th>
                                <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                <th scope="col" class="text-end" style="width: 150px;"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $salesorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('salesorder.edit', $salesorder->id)); ?>"
                                       class="btn btn-outline-primary" data-title="<?php echo e(__('Sales Order Details')); ?>">
                                        <?php echo e('SO-' . str_pad($salesorder->id, 6, '0', STR_PAD_LEFT)); ?>

                                    </a>
                                </td>
                                <td> <?php echo e(ucfirst($salesorder->lead->cust_name)); ?> </td>
                                <td>
                                    <span class="budget"><?php echo e($salesorder->sale_date ? \Auth::user()->dateFormat($salesorder->sale_date) : ($salesorder->created_at ? \Auth::user()->dateFormat($salesorder->created_at) : '--')); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-primary p-2 px-3 rounded"><?php echo e($salesorder->sale_status ?? 'Open'); ?></span>
                                </td>
<!--                                        <td>
                                    <span class="budget"><?php echo e($salesorder->lead_id ?? '--'); ?></span>
                                </td>-->
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($salesorder->sourceType ?$salesorder->sourceType->name: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e($salesorder->yard ? $salesorder->yard->yardname : '--'); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-info p-2 px-3 rounded"><?php echo e(ucfirst($salesorder->payment_gateway_name ?? '--')); ?></span>
                                </td>
                                <td>
                                    <?php if(isset($salesorder->status)): ?>
                                    <?php
                                    $statusText = \App\Models\SalesOrder::statuss($salesorder->status);
                                    ?>
                                    <?php if($salesorder->status == 0): ?>
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;"><?php echo e(__($statusText)); ?></span>
                                    <?php elseif($salesorder->status == 1): ?>
                                    <span class="badge bg-info p-2 px-3 rounded" style="width: 79px;"><?php echo e(__($statusText)); ?></span>
                                    <?php elseif($salesorder->status == 2): ?>
                                    <span class="badge bg-warning p-2 px-3 rounded" style="width: 79px;"><?php echo e(__($statusText)); ?></span>
                                    <?php elseif($salesorder->status == 3): ?>
                                    <span class="badge bg-success p-2 px-3 rounded" style="width: 79px;"><?php echo e(__($statusText)); ?></span>
                                    <?php elseif($salesorder->status == 4): ?>
                                    <span class="badge bg-danger p-2 px-3 rounded" style="width: 79px;"><?php echo e(__($statusText)); ?></span>
                                    <?php else: ?>
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;"><?php echo e(__('Unknown')); ?></span>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <span class="badge bg-secondary p-2 px-3 rounded" style="width: 79px;"><?php echo e(__('--')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(\Auth::user()->priceFormat($salesorder->getTotal())); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(ucfirst(!empty($salesorder->sourceAgent) ? $salesorder->sourceAgent->name : '-')); ?></span>
                                </td>
                                <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                <td class="text-end">
                                    <!--                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create SalesOrder')): ?>
                                                                                        <div class="action-btn bg-success ms-2">
                                                                                            <?php echo Form::open(['method' => 'get', 'route' => ['salesorder.duplicate', $salesorder->id], 'id' => 'duplicate-form-' . $salesorder->id]); ?>

                                                                                            <a href="#" class="mx-3 btn btn-sm align-items-center text-white duplicate_confirm"
                                                                                                data-bs-toggle="tooltip" title="<?php echo e(__('Duplicate')); ?>"
                                                                                                data-confirm="You want to confirm this action. Press Yes to continue or Cancel to go back"
                                                                                                data-confirm-yes="document.getElementById('duplicate-form-<?php echo e($salesorder->id); ?>').submit();">
                                                                                                <i class="ti ti-copy"></i>
                                                                                                <?php echo Form::close(); ?>

                                                                                            </a>
                                                                                        </div>
                                                                                    <?php endif; ?>-->
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show SalesOrder')): ?>
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="<?php echo e(route('salesorder.show', $salesorder->id)); ?>"
                                           data-size="md" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                           data-title="<?php echo e(__('SalesOrders Details')); ?>">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit SalesOrder')): ?>
                                    <div class="action-btn bg-info ms-2">
                                        <a href="<?php echo e(route('salesorder.edit', $salesorder->id)); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                           data-title="<?php echo e(__('Edit SalesOrders')); ?>"><i class="ti ti-edit"></i></a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete SalesOrder')): ?>
                                    <div class="action-btn bg-danger ms-2">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['salesorder.destroy', $salesorder->id]]); ?>

                                        <a href="#!"
                                           class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                           data-bs-toggle="tooltip" title='Delete'>
                                            <i class="ti ti-trash"></i>
                                        </a>
                                        <?php echo Form::close(); ?>

                                    </div>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<script>
    $(document).on('click', '#billing_data', function () {
        $("[name='shipping_address']").val($("[name='billing_address']").val());
        $("[name='shipping_city']").val($("[name='billing_city']").val());
        $("[name='shipping_state']").val($("[name='billing_state']").val());
        $("[name='shipping_country']").val($("[name='billing_country']").val());
        $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
    })

    $(document).on('change', 'select[name=opportunity]', function () {

        var opportunities = $(this).val();

        getaccount(opportunities);
    });

    function getaccount(opportunities_id) {

        $.ajax({
            url: '<?php echo e(route('salesorder.getaccount')); ?>',
            type: 'POST',
            data: {
                "opportunities_id": opportunities_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function (data) {
                console.log(data);
                $('#amount').val(data.opportunitie.amount);
                $('#account_name').val(data.account.name);
                $('#account_id').val(data.account.id);
                $('#billing_address').val(data.account.billing_address);
                $('#shipping_address').val(data.account.shipping_address);
                $('#billing_city').val(data.account.billing_city);
                $('#billing_state').val(data.account.billing_state);
                $('#shipping_city').val(data.account.shipping_city);
                $('#shipping_state').val(data.account.shipping_state);
                $('#billing_country').val(data.account.billing_country);
                $('#billing_postalcode').val(data.account.billing_postalcode);
                $('#shipping_country').val(data.account.shipping_country);
                $('#shipping_postalcode').val(data.account.shipping_postalcode);

            }
        });
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/salesorder/index.blade.php ENDPATH**/ ?>