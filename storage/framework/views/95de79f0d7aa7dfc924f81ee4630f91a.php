<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Sales Return')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Sales Return')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Sales Return')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create SalesOrder')): ?>
<div class="action-btn ms-2">
    <a href="#" data-size="lg" data-url="<?php echo e(route('sales_return.create')); ?>" data-ajax-popup="true"
       data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Sales Return')); ?>" title=" <?php echo e(__('Create')); ?>"
       class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-plus"></i>
    </a>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table datatable" id="datatable">
                        <thead>
                            <tr>
                                <th scope="col" class="sort" data-sort="id"><?php echo e(__('ID')); ?></th>
                                <th scope="col" class="sort" data-sort="name"><?php echo e(__('Sales Order No')); ?></th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Return Date')); ?> </th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Request Type')); ?></th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Return By User')); ?></th>
                                <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $salesreturn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sales_return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <a href="<?php echo e(route('sales_return.edit', $sales_return->id)); ?>"
                                       class="btn btn-outline-primary" data-title="<?php echo e(__('Sales Return Details')); ?>">
                                        <?php echo e(\Auth::user()->salesReturnFormat($sales_return->id)); ?>

                                    </a>
                                </td>
                                <td>
                                    <span class="budget">
                                        <?php echo e(\Auth::user()->salesorderNumberFormat($sales_return->salesorder_id)); ?>


                                    </span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(\Auth::user()->dateFormat($sales_return->return_date)); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-warning p-2 px-3 rounded"
                                          style="width: 91px;"><?php echo e(__(\App\Models\SalesReturn::$request_type[$sales_return->request_type])); ?></span>
                                </td>   
                                <td>
                                    <span
                                        class="budget"><?php echo e(ucfirst(!empty($sales_return->source_user) ? $sales_return->source_user->name : '-')); ?></span>
                                </td>
                                <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                <td class="text-end">                                    
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show SalesOrder')): ?>
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="<?php echo e(route('sales_return.show', $sales_return->id)); ?>"
                                           data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="<?php echo e(__('Sales Return Details')); ?>">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit SalesOrder')): ?>
                                    <div class="action-btn bg-info ms-2">
                                        <a href="<?php echo e(route('sales_return.edit', $sales_return->id)); ?>"
                                           data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                           class="mx-3 btn btn-sm align-items-center text-white "
                                           data-title="<?php echo e(__('Edit Sales Return')); ?>"><i
                                                class="ti ti-edit"></i></a>
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
        console.log(opportunities);
        getaccount(opportunities);
    });

    function getaccount(opportunities_id) {
        $.ajax({
            url: '<?php echo e(route('invoice.getaccount')); ?>',
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp2\htdocs\AS_CRM\resources\views/sales_return/index.blade.php ENDPATH**/ ?>