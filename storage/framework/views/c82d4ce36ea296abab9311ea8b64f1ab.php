<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Sales Order')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Sales Order')); ?> <?php echo e('(' . $salesOrder->lead->cust_name . ')'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('salesorder.index')); ?>"><?php echo e(__('Sales Order')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<div class="action-btn bg-warning ms-2">
    <a href="<?php echo e(route('salesorder.pdf', \Crypt::encrypt($salesOrder->id))); ?>" target="_blank"
       class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" title="<?php echo e(__('Print')); ?>">
        <span class="btn-inner--icon text-white"><i class="ti ti-printer"></i></span>
    </a>
</div>
<!--    <?php if(Auth::user()->type == 'owner'): ?>
        <div class="action-btn ms-2">
            <a href="#" class="btn btn-sm btn-warning btn-icon m-1 cp_link"
                data-link="<?php echo e(route('pay.salesorder', \Illuminate\Support\Facades\Crypt::encrypt($salesOrder->id))); ?>"
                data-bs-toggle="tooltip"
                data-title="<?php echo e(__('Click to copy SalesOrder link')); ?>"title="<?php echo e(__('copy salesorder')); ?>"><span
                    class="btn-inner--icon text-white"><i class="ti ti-file"></i></span></a>
        </div>
    <?php endif; ?>-->
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit SalesOrder')): ?>
<div class="action-btn ms-2">
    <a href="<?php echo e(route('salesorder.edit', $salesOrder->id)); ?>" class="btn btn-sm btn-info btn-icon m-1"
       data-bs-toggle="tooltip" data-title="<?php echo e(__('Sales order Edit')); ?>" title="<?php echo e(__('Edit')); ?>"><i
            class="ti ti-edit"></i>
    </a>
</div>
<?php endif; ?>
<!--    <div class="action-btn ms-2">
        <a href="#" data-size="md" data-url="<?php echo e(route('salesorder.salesorderitem', $salesOrder->id)); ?>"
            data-ajax-popup="true" data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New SalesOrder')); ?>"
            title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
            <i class="ti ti-plus"></i>
        </a>
    </div>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <!-- [ Invoice ] start -->
        <div class="container">
            <div>
                <div class="card" id="printTable">
                    <div class="card-body">
                       
                        <div class="col-lg-10 mt-4">
                            <!-- Sales Order Details Section -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0"><?php echo e(__('Sales Order Details')); ?></h5>
                                            <small class="text-muted"><?php echo e(__('Complete sales order information')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Sales Information -->
                                        <div class="col-md-6">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Sales Information')); ?></h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Sales Order Number:')); ?></strong> SO-<?php echo e(str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT)); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Sale Date:')); ?></strong> <?php echo e($salesOrder->sale_date ?? ($salesOrder->created_at ? \Auth::user()->dateFormat($salesOrder->created_at) : 'Not set')); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Sale Status:')); ?></strong> <?php echo e($salesOrder->sale_status ?? 'Open'); ?>

                                                </div>
<!--                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Lead ID:')); ?></strong> <?php echo e($salesOrder->lead_id ?? 'Not set'); ?>

                                                </div>-->
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Sales Agent:')); ?></strong> <?php echo e($salesOrder->salesUser ? $salesOrder->salesUser->name : 'Not assigned'); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Customer Information -->
                                        <div class="col-md-6">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Customer Information')); ?></h6>
                                            <div class="row">
                                                <?php if($salesOrder->lead): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Customer Name:')); ?></strong> <?php echo e($salesOrder->lead->cust_name ?? $salesOrder->lead->name ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Contact Number:')); ?></strong> <?php echo e($salesOrder->lead->contact ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Customer Email:')); ?></strong> <?php echo e($salesOrder->lead->email ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Lead Type:')); ?></strong> <?php echo e($salesOrder->leadType ? $salesOrder->leadType->name : 'Not set'); ?>

                                                </div>
                                                <?php else: ?>
                                                <div class="col-12 mb-2">
                                                    <span class="text-muted"><?php echo e(__('No lead information available')); ?></span>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Product Information -->
                                        <?php if($salesOrder->lead && $salesOrder->lead->product): ?>
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Product Information')); ?></h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Part Name:')); ?></strong> <?php echo e($salesOrder->lead->product->part_name ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Part Number:')); ?></strong> <?php echo e($salesOrder->part_number ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Year:')); ?></strong><br><?php echo e($salesOrder->lead->product->year ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Make:')); ?></strong><br><?php echo e($salesOrder->lead->product->make ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Model:')); ?></strong><br><?php echo e($salesOrder->lead->product->model ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('VIN Number:')); ?></strong> <?php echo e($salesOrder->vin_number ?? 'Not set'); ?>

                                                </div>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Part Type:')); ?></strong> <?php echo e(ucfirst($salesOrder->part_type ?? 'Not set')); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Sourcing Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Sourcing Information')); ?></h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Source Type:')); ?></strong> <?php echo e($salesOrder->sourceType ?$salesOrder->sourceType->name: 'Not set'); ?>

                                                </div>
                                                <?php if($salesOrder->yard): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Yard Name:')); ?></strong> <?php echo e($salesOrder->yard->yard_name); ?>

                                                </div>
                                                <?php endif; ?>
                                                <?php if($salesOrder->yard_order_date): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Yard Order Date:')); ?></strong> <?php echo e(\Auth::user()->dateFormat($salesOrder->yard_order_date)); ?>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Pricing Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Pricing Information')); ?></h6>
                                            <div class="row">
                                                <div class="col-6 mb-2">
                                                    <strong><?php echo e(__('Part Price:')); ?></strong><br><?php echo e($salesOrder->part_price ? \Auth::user()->priceFormat($salesOrder->part_price) : 'Not set'); ?>

                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong><?php echo e(__('Shipping Price:')); ?></strong><br><?php echo e($salesOrder->shipping_price ? \Auth::user()->priceFormat($salesOrder->shipping_price) : 'Not set'); ?>

                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong><?php echo e(__('Charge Amount:')); ?></strong><br><?php echo e($salesOrder->charge_amount ? \Auth::user()->priceFormat($salesOrder->charge_amount) : 'Not set'); ?>

                                                </div>
                                                <div class="col-6 mb-2">
                                                    <strong><?php echo e(__('Total Quoted:')); ?></strong><br><?php echo e($salesOrder->total_amount_quoted ? \Auth::user()->priceFormat($salesOrder->total_amount_quoted) : 'Not set'); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Payment Information -->
                                        <div class="col-md-6 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Payment Information')); ?></h6>
                                            <div class="row">
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Payment Gateway:')); ?></strong> <?php echo e(ucfirst($salesOrder->payment_gateway_name ?? 'Not set')); ?>

                                                </div>
                                                <?php if($salesOrder->card_number): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Card Number:')); ?></strong> <?php echo e($salesOrder->card_number); ?>

                                                </div>
                                                <?php endif; ?>
                                                <?php if($salesOrder->expiration): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('Expiration:')); ?></strong> <?php echo e($salesOrder->expiration); ?>

                                                </div>
                                                <?php endif; ?>
                                                <?php if($salesOrder->cvv_number): ?>
                                                <div class="col-12 mb-2">
                                                    <strong><?php echo e(__('CVV:')); ?></strong> <?php echo e($salesOrder->cvv_number); ?>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Agent Notes -->
                                        <?php if($salesOrder->agent_note): ?>
                                        <div class="col-12 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Agent Notes')); ?></h6>
                                            <div class="alert alert-light">
                                                <?php echo e($salesOrder->agent_note); ?>

                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <!-- Description -->
                                        <?php if($salesOrder->description): ?>
                                        <div class="col-12 mt-3">
                                            <h6 class="text-primary mb-3"><?php echo e(__('Description')); ?></h6>
                                            <div class="alert alert-light">
                                                <?php echo e($salesOrder->description); ?>

                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <!-- Yard Details Section -->
                            <?php if($salesOrder->yard): ?>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0"><?php echo e(__('Yard Details')); ?></h5>
                                            <small class="text-muted"><?php echo e(__('Yard information and order details')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-success">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong><?php echo e(__('Yard Name:')); ?></strong> <?php echo e($salesOrder->yard ? $salesOrder->yard->yard_name : 'Not set'); ?><br>
                                                <strong><?php echo e(__('Yard Order Date:')); ?></strong> <?php echo e($salesOrder->yard_order_date ? \Auth::user()->dateFormat($salesOrder->yard_order_date) : 'Not set'); ?><br>
                                                <strong><?php echo e(__('Expected Delivery:')); ?></strong> <?php echo e($salesOrder->delivery_date ? \Auth::user()->dateFormat($salesOrder->delivery_date) : 'Not set'); ?><br>                                                
                                            </div>
                                            <div class="col-md-6">
                                                <strong><?php echo e(__('Card Used:')); ?></strong> <?php echo e($salesOrder->card_used ?: 'Not set'); ?><br>                                                
                                                <strong><?php echo e(__('Tracking Number:')); ?></strong> SO-<?php echo e(str_pad($salesOrder->id, 6, '0', STR_PAD_LEFT)); ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong><?php echo e(__('Comments:')); ?></strong> <?php echo e($salesOrder->comment ?: 'No comments'); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <!-- Yard Logs Section -->
                            <?php if($salesOrder->yardLogs && $salesOrder->yardLogs->count() > 0): ?>
                            <div class="card mt-4">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="mb-0"><?php echo e(__('Yard Activity Logs')); ?></h5>
                                            <small class="text-muted"><?php echo e(__('Track yard operations and delivery status')); ?></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php $__currentLoopData = $salesOrder->yardLogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card mb-2">
                                        <div class="card-body py-2">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <h6 class="mb-1">
                                                                <?php if($log->yard): ?>
                                                                <small class="text-muted">(<?php echo e($log->yard->yard_name); ?>)</small>
                                                                <?php endif; ?>
                                                            </h6>
                                                            <small class="text-muted">
                                                                <i class="ti ti-user me-1"></i><?php echo e($log->createdBy->name ?? 'Unknown'); ?>

                                                                <i class="ti ti-clock me-1 ms-2"></i><?php echo e($log->created_at->format('M d, Y H:i')); ?>

                                                            </small>
                                                            <?php if($log->comments): ?>
                                                            <br><small class="text-info">
                                                                <i class="ti ti-message me-1"></i><?php echo e($log->comments); ?>

                                                            </small>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>
<script>
    document.querySelector('.btn-print-invoice').addEventListener('click', function() {
    var link2 = document.createElement('link');
    link2.innerHTML =
            '<style>@media print{*,::after,::before{text-shadow:none!important;box-shadow:none!important}a:not(.btn){text-decoration:none}abbr[title]::after{content:" ("attr(title) ")"}pre{white-space:pre-wrap!important}blockquote,pre{border:1px solid #adb5bd;page-break-inside:avoid}thead{display:table-header-group}img,tr{page-break-inside:avoid}table,thead,tr,td{background:transparent}h2,h3,p{orphans:3;widows:3}h2,h3{page-break-after:avoid}@page{size:a3}body{min-width:992px!important}.container{min-width:992px!important}.page-header,.pc-sidebar,.pc-mob-header,.pc-header,.pct-customizer,.modal,.navbar{display:none}.pc-container{top:0;}.invoice-contact{padding-top:0;}@page,.card-body,.card-header,body,.pcoded-content{padding:0;margin:0}.badge{border:1px solid #000}.table{border-collapse:collapse!important}.table td,.table th{background-color:#fff!important}.table-bordered td,.table-bordered th{border:1px solid #dee2e6!important}.table-dark{color:inherit}.table-dark tbody+tbody,.table-dark td,.table-dark th,.table-dark thead th{border-color:#dee2e6}.table .thead-dark th{color:inherit;border-color:#dee2e6}}</style>';
    document.getElementsByTagName('head')[0].appendChild(link2);
    window.print();
    })
</script>
<script>
            $(document).on('change', 'select[name=item]', function() {
    var item_id = $(this).val();
    $.ajax({
    url: '<?php echo e(route('salesorder.items')); ?>',
            type: 'GET',
            headers: {
            'X-CSRF-TOKEN': jQuery('#token').val()
            },
            data: {
            'item_id': item_id,
            },
            cache: false,
            success: function(data) {
            var invoiceItems = JSON.parse(data);
            $('.taxId').val('');
            $('.tax').html('');
            $('.price').val(invoiceItems.price);
            $('.quantity').val(1);
            $('.discount').val(0);
            var taxes = '';
            var tax = [];
            for (var i = 0; i < invoiceItems.taxes.length; i++) {
            taxes += '<span class="badge bg-primary ms-1 mt-1">' + invoiceItems.taxes[i]
                    .tax_name + ' ' + '(' + invoiceItems.taxes[i].rate + '%)' + '</span>';
            }
            $('.taxId').val(invoiceItems.tax);
            $('.tax').html(taxes);
            }
    });
    });
    $('.cp_link').on('click', function() {
    var value = $(this).attr('data-link');
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(value).select();
    document.execCommand("copy");
    $temp.remove();
    show_toastr('Success', '<?php echo e(__('Link Copy on Clipboard')); ?>', 'success')
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\AS_CRM\resources\views/salesorder/view.blade.php ENDPATH**/ ?>