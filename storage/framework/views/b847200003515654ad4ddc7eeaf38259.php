<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Lead Edit')); ?>

<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('title'); ?>
<div class="page-header-title">
    <?php echo e(__('Edit Lead')); ?> <?php echo e('(' . $lead->cust_name . ')'); ?>

</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<!--<?php if($lead->is_converted != 0): ?>
<a href="#" data-url="<?php echo e(route('account.show', $lead->is_converted)); ?>" data-title="<?php echo e(__('Account Details')); ?>"
   data-size="md" data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Already Convert To Account')); ?>"
   class="btn btn-sm btn-primary btn-icon m-1">
    <i class="ti ti-eye"></i>
</a>
<?php else: ?>
<a href="#" data-url="<?php echo e(route('lead.convert.account', $lead->id)); ?>" data-size="lg" data-ajax-popup="true"
   data-title="<?php echo e(__('Convert [' . $lead->cust_name . '] To Account')); ?>" data-bs-toggle="tooltip"
   title="<?php echo e(__('Convert To Account')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
    <i class="ti ti-exchange">
    </i>
</a>
<?php endif; ?>-->

<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('lead.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php endif; ?>
    <?php if(!empty($next)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('lead.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn  ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="<?php echo e(__('Next')); ?>">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><a href="<?php echo e(route('lead.index')); ?>"><?php echo e(__('Lead')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Details')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <!-- [ sample-page ] start -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-xl-3">
                <div class="card sticky-top" style="top:30px">
                    <div class="list-group list-group-flush" id="useradd-sidenav">
                        <a href="#useradd-1"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Overview')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-2"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Stream')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
<!--                        <a href="#useradd-3"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Tasks')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>-->
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($lead, ['route' => ['lead.update', $lead->id], 'method' => 'PUT'])); ?>

                    <div class="card-header">
                        <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary "
                               data-ajax-popup-over="true" data-size="md"
                               data-title="<?php echo e(__('Generate content with AI')); ?>"
                               data-url="<?php echo e(route('generate', ['lead'])); ?>" data-toggle="tooltip"
                               title="<?php echo e(__('Generate')); ?>">
                                <i class="fas fa-robot"></span><span
                                        class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit About Your Lead Information')); ?></small>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row">                               
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('cust_name', __('Customer Name'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('cust_name', null, ['class' => 'form-control', 'placeholder' => __('Enter Customer Name')])); ?>

                                        <?php $__errorArgs = ['cust_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-cust_name" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('contact', __('Contact Person'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('contact', null, ['class' => 'form-control', 'placeholder' => __('Enter Contact Person')])); ?>

                                        <?php $__errorArgs = ['contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-contact" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('date', __('Date'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::date('date', null, ['class' => 'form-control'])); ?>

                                        <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-date" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('email', __('Email'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter Email')])); ?>

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-email" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('lead_type_id', __('Lead Type'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('lead_type_id', $leadTypes, $lead->lead_type_id, ['class' => 'form-control']); ?>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('product', __('Product / Service'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('product', $product, $lead->product_id, ['class' => 'form-control', 'id' => 'product-select']); ?>

                                        <?php $__errorArgs = ['product_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-product_id" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('disposition', __('Disposition'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('disposition', $status, $lead->disposition, ['class' => 'form-control']); ?>

                                        <?php $__errorArgs = ['disposition'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-disposition" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('note', __('Note'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::textarea('note', null, ['class' => 'form-control', 'rows' => 3, 'placeholder' => __('Enter Note')])); ?>

                                        <?php $__errorArgs = ['note'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-note" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>                                
                                <div class="text-end">
                                    <?php echo e(Form::submit(__('Update'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                </div>
                            </div>
                        </form>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div id="useradd-2" class="card">
                    <?php echo e(Form::open(['route' => ['streamstore', 'lead', $lead->id, $lead->name ?: 'Lead-' . $lead->id], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="card-header">
                        <h5><?php echo e(__('Stream')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Add stream comment')); ?></small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('stream', __('Stream'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('stream_comment', null, ['class' => 'form-control', 'placeholder' => __('Enter Stream Comment'), 'required' => 'required'])); ?>

                                    </div>
                                </div>
                                <input type="hidden" name="log_type" value="lead comment">
                                <div class="col-12 mb-3 field" data-name="attachments">
                                    <div class="attachment-upload">
                                        <div class="attachment-button">
                                            <div class="pull-left">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('attachment', __('Attachment'), ['class' => 'form-label'])); ?>

                                                    
                                                    <input type="file"name="attachment" class="form-control mb-3"
                                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah" width="20%" height="20%" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="attachments"></div>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <?php echo e(Form::submit(__('Save'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="card-header">
                            <h5><?php echo e(__('Latest comments')); ?></h5>
                        </div>
                        <?php $__currentLoopData = $streams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stream): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $remark = json_decode($stream->remark);
                        ?>
                        <?php if($remark->data_id == $lead->id): ?>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-12">
                                    <ul class="list-group team-msg">
                                        <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                            <div class="avatar me-3">
                                                <?php
                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                                ?>
                                                <a href="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>"
                                                   target="_blank">
                                                    <img alt="" class="rounded-circle"
                                                         <?php if(!empty($stream->file_upload)): ?> src="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : asset(url('./assets/images/user/avatar-5.jpg'))); ?>" <?php else: ?>  avatar="<?php echo e($remark->user_name); ?>" <?php endif; ?>>
                                                </a>
                                            </div>
                                            <div class="d-block d-sm-flex align-items-center right-side">
                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                                    <div class="h6 mb-1"><?php echo e($remark->user_name); ?>

                                                    </div>
                                                    <span class="text-sm lh-140 mb-0">
                                                        posted to <a href="#"><?php echo e($remark->title); ?></a> ,
                                                        <?php echo e($stream->log_type); ?> <a
                                                            href="#"><?php echo e($remark->stream_comment); ?></a>
                                                    </span>
                                                </div>
                                                <div class=" ms-2  d-flex align-items-center ">
                                                    <small
                                                        class="float-end "><?php echo e($stream->created_at); ?></small>
                                                </div>
                                            </div>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<script>
            $(document).ready(function() {
    // Handle product selection change
    $('#product-select').on('change', function() {
    var productId = $(this).val();
    if (productId && productId !== '0') {
    // Make AJAX request to get product details
    $.ajax({
    url: '<?php echo e(route("product.details")); ?>',
            method: 'GET',
            data: { product_id: productId },
            success: function(response) {
            if (response.success) {
            var product = response.product;
            // Populate vehicle brand field
            if (product.brand_name) {
            $('#vehicle-brand option').filter(function() {
            return $(this).text() === product.brand_name;
            }).prop('selected', true);
            }

            // Populate vehicle year field
            if (product.Year) {
            $('#vehicle_year option').filter(function() {
            return $(this).val() == product.Year;
            }).prop('selected', true);
            }

            // Populate part number field
            if (product.part_number) {
            $('#vehicle-part-number option').filter(function() {
            return $(this).val() === product.part_number;
            }).prop('selected', true);
            }
            }
            },
            error: function(xhr) {
            console.error('Error fetching product details:', xhr);
            }
    });
    } else {
    // Clear fields if no product selected
    $('#vehicle-brand').val('');
    $('#vehicle_year').val('');
    $('#vehicle-part-number').val('');
    }
    });
    });</script>

<script>
    $(document).on('change', 'select[name=parent]', function() {
    console.log('h');
    var parent = $(this).val();
    getparent(parent);
    });
    function getparent(bid) {
    console.log(bid);
    $.ajax({
    url: '<?php echo e(route('task.getparent')); ?>',
            type: 'POST',
            data: {
            "parent": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(data) {
            console.log(data);
            $('#parent_id').empty();
            

            $.each(data, function(key, value) {
            $('#parent_id').append('<option value="' + key + '">' + value + '</option>');
            });
            if (data == '') {
            $('#parent_id').empty();
            }
            }
    });
    }
</script>
<script>
    $(document).on('click', '#billing_data', function() {
    $("[name='shipping_address']").val($("[name='billing_address']").val());
    $("[name='shipping_city']").val($("[name='billing_city']").val());
    $("[name='shipping_state']").val($("[name='billing_state']").val());
    $("[name='shipping_country']").val($("[name='billing_country']").val());
    $("[name='shipping_postalcode']").val($("[name='billing_postalcode']").val());
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp2\htdocs\AS_CRM\resources\views/lead/edit.blade.php ENDPATH**/ ?>