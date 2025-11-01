<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Account Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<div class="page-header-title">
    <h4 class="m-b-10"><?php echo e(__('Edit Account')); ?> <?php echo e('(' . $account->name . ')'); ?></h4>
</div>
<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('account.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn ms-2">
        <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip"
           title="<?php echo e(__('Previous')); ?>">
            <i class="ti ti-chevron-left"></i>
        </a>
    </div>
    <?php endif; ?>
    <?php if(!empty($next)): ?>
    <div class="action-btn ms-2">
        <a href="<?php echo e(route('account.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
           data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
            <i class="ti ti-chevron-right"></i>
        </a>
    </div>
    <?php else: ?>
    <div class="action-btn ms-2">
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
<li class="breadcrumb-item"><a href="<?php echo e(route('account.index')); ?>"><?php echo e(__('Account')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Edit')); ?></li>
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
                        <a href="#useradd-3"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Contacts')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-4"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Opportunities')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-5"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Cases')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-6"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Documents')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-7"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Tasks')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-8"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Quotes')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-9"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Sales Orders')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-10"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoices')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-11"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Calls')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-12"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Meetings')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">

                    <?php echo e(Form::model($account, ['route' => ['account.update', $account->id], 'method' => 'PUT'])); ?>

                    <div class="card-header">
                        <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary "
                               data-ajax-popup-over="true" data-size="md"
                               data-title="<?php echo e(__('Generate content with AI')); ?>"
                               data-url="<?php echo e(route('generate', ['account'])); ?>" data-toggle="tooltip"
                               title="<?php echo e(__('Generate')); ?>">
                                <i class="fas fa-robot"></span><span
                                        class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit details about your account information')); ?></small>

                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Enter Name'), 'required' => 'required'])); ?>

                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-name" role="alert">
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

                                        <?php echo e(Form::text('email', null, ['class' => 'form-control', 'placeholder' => __('Enter email')])); ?>

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
                                        <?php echo e(Form::label('phone', __('Phone'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'placeholder' => __('Enter phone'), 'required' => 'required'])); ?>

                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-phone" role="alert">
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
                                        <?php echo e(Form::label('website', __('Website'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('website', null, ['class' => 'form-control', 'placeholder' => __('Enter Website')])); ?>

                                        <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-website" role="alert">
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
                                        <?php echo e(Form::label('billing_address', __('Billing Address')), ['class' => 'form-label']); ?>

                                        <div class="action-btn bg-primary ms-2 float-end">
                                            <a class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                               id="billing_data" data-bs-toggle="tooltip" data-placement="top"
                                               title="Same As Billing Address"><i class="ti ti-copy"></i></a>
                                        </div>
                                        <span class="clearfix"></span>
                                        <?php echo e(Form::text('billing_address', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing Address')])); ?>

                                        <?php $__errorArgs = ['billing_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_address" role="alert">
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
                                        <?php echo e(Form::label('shipping_address', __('Shipping Address'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('shipping_address', null, ['class' => 'form-control', 'placeholder' => __('Enter Shipping Address')])); ?>

                                        <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_address" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('billing_country', __('Billing Country'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('billing_country', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing country')])); ?>

                                        <?php $__errorArgs = ['billing_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_country" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('state', __('Billing State'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('billing_state', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing State')])); ?>

                                        <?php $__errorArgs = ['billing_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_state" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>                                    
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('shipping_country', __('Shipping Country'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('shipping_country', null, ['class' => 'form-control', 'placeholder' => __('Enter Shipping Country')])); ?>

                                        <?php $__errorArgs = ['shipping_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_country" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('state', __('Shipping State'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('shipping_state', null, ['class' => 'form-control', 'placeholder' => __('Enter Shipping State')])); ?>

                                        <?php $__errorArgs = ['shipping_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_state" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>       
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('city', __('Billing City'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('billing_city', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing City')])); ?>

                                        <?php $__errorArgs = ['billing_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_city" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('billing_postalcode', __('Billing Postal Code'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::number('billing_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Enter Billing Postal Code')])); ?>

                                        <?php $__errorArgs = ['billing_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_postalcode" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>    
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('city', __('Shipping City'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('shipping_city', null, ['class' => 'form-control', 'placeholder' => __('Enter Shipping City')])); ?>

                                        <?php $__errorArgs = ['shipping_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_city" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <?php echo e(Form::label('shipping_postalcode', __('Shipping Postal Code'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::number('shipping_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Enter Shipping Postal Code')])); ?>

                                        <?php $__errorArgs = ['shipping_postalcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_postalcode" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <hr class="mt-1 mb-2">
                                    <h6><?php echo e(__('Detail')); ?></h6>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('type', $accountype, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-name" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('industry', __('Industry'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('industry', $industry, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-industry" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <?php echo e(Form::label('document_id', __('Document'))); ?>

                                        <?php echo Form::select('document_id', $document_id, null, ['class' => 'form-control']); ?>

                                        <?php $__errorArgs = ['industry'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-industry" role="alert">
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
                                        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Name')])); ?>

                                    </div>
                                </div>


                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('user', __('Assigned User'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('user', $user, $account->user_id, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['user'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-user" role="alert">
                                            <strong class="text-danger"><?php echo e($message); ?></strong>
                                        </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="text-end">
                                    <?php echo e(Form::submit(__('Save'), ['class' => 'btn-submit btn btn-primary'])); ?>

                                </div>


                            </div>
                        </form>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>

                <div id="useradd-2" class="card">
                    <?php echo e(Form::open(['route' => ['streamstore', ['account', $account->name, $account->id]], 'method' => 'post', 'enctype' => 'multipart/form-data'])); ?>

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
                                <input type="hidden" name="log_type" value="account comment">
                                <div class="col-12 mb-3 field" data-name="attachments">
                                    <div class="attachment-upload">
                                        <div class="attachment-button">
                                            <div class="pull-left">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('attachment', __('Attachment'), ['class' => 'form-label'])); ?>

                                                    
                                                    <input type="file"name="attachment" class="form-control mb-3"
                                                           onchange="document.getElementById('attachment').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="attachment" width="20%" height="20%" />


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
                        <?php if($remark->data_id == $account->id): ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12">
                                    <ul class="list-group team-msg">
                                        <li class="list-group-item border-0 d-flex align-items-start mb-2">
                                            <div class="avatar me-3">
                                                <?php
                                                $profile = \App\Models\Utility::get_file('upload/profile/');
                                                ?>
                                                <a href="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : $profile . 'avatar.png'); ?>"
                                                   target="_blank">
                                                    <img alt="" class="rounded-circle"
                                                         <?php if(!empty($stream->file_upload)): ?> src="<?php echo e(!empty($stream->file_upload) ? $profile . $stream->file_upload : $profile . 'avatar.png'); ?>" <?php else: ?>  avatar="<?php echo e($remark->user_name); ?>" <?php endif; ?>>
                                                </a>

                                            </div>
                                            <div class="d-block d-sm-flex align-items-center right-side">
                                                <div
                                                    class="d-flex align-items-start flex-column justify-content-center mb-3 mb-sm-0">
                                                    <div class="h6 mb-1"><?php echo e($remark->user_name); ?>

                                                    </div>
                                                    <span class="text-sm lh-140 mb-0">
                                                        posted to <a href="#"><?php echo e($remark->title); ?></a>
                                                        ,
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

                <div id="useradd-3" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Contacts')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned contacts for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('contact.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Contact')); ?>" class="btn btn-sm btn-primary ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Email')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Phone')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('City')); ?></th>
                                        <?php if(Gate::check('Show Contact') || Gate::check('Edit Contact') || Gate::check('Delete Contact')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('contact.edit', $contact->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Contact Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($contact->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($contact->email); ?>

                                        </td>
                                        <td>
                                            <span class="budget">
                                                <?php echo e($contact->phone); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e($contact->contact_city); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Contact') || Gate::check('Edit Contact') || Gate::check('Delete Contact')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Contact')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('contact.show', $contact->id)); ?>"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                   data-ajax-popup="true"
                                                   data-title="<?php echo e(__('Contact Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Contact')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('contact.edit', $contact->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Contact Edit')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Contact')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $contact->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
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

                <div id="useradd-4" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Opportunities')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Opportunities for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('opportunities.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Opportunities')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive ">
                            <table class="table datatable" id="datatable1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="status">
                                            <?php echo e(__('Opportunities Stage')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Amount')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assigned User')); ?></th>
                                        <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $opportunitiess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opportunities): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('opportunities.edit', $opportunities->id)); ?>"
                                               data-size="md" data-title="<?php echo e(__('Opportunities Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($opportunities->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(!empty($opportunities->stages) ? $opportunities->stages->name : '-'); ?></span>
                                        </td>

                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($opportunities->amount)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(!empty($opportunities->assign_user) ? $opportunities->assign_user->name : '-'); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                        <td class="text-end">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Opportunities')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('opportunities.show', $opportunities->id)); ?>"
                                                   data-bs-toggle="tooltip" data-ajax-popup="true"
                                                   data-title="<?php echo e(__('Opportunities Details')); ?>"
                                                   title="<?php echo e(__(' Quick View')); ?>"class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Opportunities')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('opportunities.edit', $opportunities->id)); ?>"
                                                   data-bs-toggle="tooltip"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-title="<?php echo e(__('Opportunities Edit')); ?>"title="<?php echo e(__(' Details')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Opportunities')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['opportunities.destroy', $opportunities->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
                                                   data-bs-toggle="tooltip" title='Delete'>
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <div id="useradd-5" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Cases')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Cases for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('commoncases.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Common Case')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable2">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Number')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Priority')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?></th>
                                        <?php if(Gate::check('Show CommonCase') || Gate::check('Edit CommonCase') || Gate::check('Delete CommonCase')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $case): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('commoncases.edit', $case->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Cases Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($case->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($case->number); ?>

                                        </td>
                                        <td>
                                            <?php if($case->status == 0): ?>
                                            <span
                                                class="badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 1): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 2): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 3): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 4): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php elseif($case->status == 5): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$status[$case->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($case->priority == 0): ?>
                                            <span
                                                class="badge bg-primary p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 1): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 2): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php elseif($case->priority == 3): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\CommonCase::$priority[$case->priority])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($case->created_at)); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show CommonCase') || Gate::check('Edit CommonCase') || Gate::check('Delete CommonCase')): ?>
                                        <td class="text-end">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show CommonCase')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('commoncases.show', $case->id)); ?>"
                                                   data-ajax-popup="true" data-bs-toggle="tooltip"
                                                   title="<?php echo e(__('Quick View')); ?>"
                                                   data-title="<?php echo e(__('Cases Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit CommonCase')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('commoncases.edit', $case->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Cases Edit')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete CommonCase')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['commoncases.destroy', $case->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
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

                <div id="useradd-6" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Documents')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Documents for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('document.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Documents')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('File')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?></th>
                                        <?php if(Gate::check('Show Document') || Gate::check('Edit Document') || Gate::check('Delete Document')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('document.edit', $document->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Document Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($document->name); ?></a>
                                        </td>
                                        <td class="budget">
                                            <?php if(!empty($document->attachment)): ?>
                                            <?php
                                            $profile = \App\Models\Utility::get_file('upload/profile/');
                                            ?>
                                            <a href="<?php echo e($profile . '/' . $document->attachment); ?>"
                                               download=""><i class="ti ti-download"></i></a>
                                            <?php else: ?>
                                            <span>
                                                <?php echo e(__('No File')); ?>

                                            </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($document->status == 0): ?>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 1): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 2): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php elseif($document->status == 3): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 rounded"><?php echo e(__(\App\Models\Document::$status[$document->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($document->created_at)); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Document') || Gate::check('Edit Document') || Gate::check('Delete Document')): ?>
                                        <td class="text-end">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Document')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('document.show', $document->id)); ?>"
                                                   data-ajax-popup="true" data-bs-toggle="tooltip"
                                                   title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Document Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Document')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('document.edit', $document->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"
                                                   data-title="<?php echo e(__('Document Edit')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Document')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['document.destroy', $document->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
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

                <div id="useradd-7" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Tasks')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Tasks for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg" data-url="<?php echo e(route('task.create',['task',0])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"
                                       data-title="<?php echo e(__('Create New Task')); ?>" title="<?php echo e(__('Create')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable4">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Date Start')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assigned User')); ?></th>
                                        <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('task.edit', $task->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Task Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($task->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($task->parent); ?>

                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(!empty($task->stages) ? $task->stages->name : ''); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(\Auth::user()->dateFormat($task->start_date)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(!empty($task->assign_user) ? $task->assign_user->name : '-'); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Task') || Gate::check('Edit Task') || Gate::check('Delete Task')): ?>
                                        <td class="text-end">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Task')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('task.show', $task->id)); ?>"
                                                   data-ajax-popup="true" data-bs-toggle="tooltip"
                                                   title="<?php echo e(__('Quick View')); ?>"
                                                   data-title="<?php echo e(__('Task Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Task')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('task.edit', $task->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Edit Task')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Task')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['task.destroy', $task->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm  align-items-center text-white show_confirm"
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

                <div id="useradd-8" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Quotes')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Quotes for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('quote.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"
                                       data-title="<?php echo e(__('Create New Quote')); ?>" title="<?php echo e(__('Create')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable4">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Amount')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assign User')); ?>

                                        </th>
                                        <?php if(Gate::check('Show Quote') || Gate::check('Edit Quote') || Gate::check('Delete Quote')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('quote.edit', $quote->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Quote Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($quote->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <?php if($quote->status == 0): ?>
                                            <span class="badge bg-secondary p-2 px-3 rounded"
                                                  style="width: 79px;"><?php echo e(__(\App\Models\Quote::$status[$quote->status])); ?></span>
                                            <?php elseif($quote->status == 1): ?>
                                            <span class="badge bg-info p-2 px-3 rounded"
                                                  style="width: 79px;"><?php echo e(__(\App\Models\Quote::$status[$quote->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($quote->created_at)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($quote->getTotal())); ?></span>
                                        </td>
                                        <td>
                                            <span class="col-sm-12"><span
                                                    class="text-sm"><?php echo e(ucfirst(!empty($quote->assign_user) ? $quote->assign_user->name : '-')); ?></span></span>
                                        </td>
                                        <?php if(Gate::check('Show Quote') || Gate::check('Edit Quote') || Gate::check('Delete Quote')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Quote')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('quote.show', $quote->id)); ?>"
                                                   data-size="md"class="mx-3 btn btn-sm align-items-center text-white "
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                   data-title="<?php echo e(__('Quote Details')); ?>">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Quote')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('quote.edit', $quote->id)); ?>"
                                                   class="mx-3 btn btn-sm align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Edit Quote')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Quote')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['quote.destroy', $quote->id]]); ?>

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

                <div id="useradd-9" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Sales Orders')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned SalesOrder for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('salesorder.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"
                                       data-title="<?php echo e(__('Create New SalesOrder')); ?>" title="<?php echo e(__('Create')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?> </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Amount')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assigned User')); ?></th>
                                        <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $salesorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('salesorder.edit', $salesorder->id)); ?>"
                                               data-size="md" data-title="<?php echo e(__('SalesOrder')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($salesorder->name); ?></a>
                                        </td>
                                        <td>
                                            <?php if($salesorder->status == 0): ?>
                                            <span class="badge bg-secondary p-2 px-3 rounded"
                                                  style="width: 79px;"><?php echo e(__(\App\Models\SalesOrder::$status[$salesorder->status])); ?></span>
                                            <?php elseif($salesorder->status == 1): ?>
                                            <span class="badge bg-info p-2 px-3 rounded"
                                                  style="width: 79px;"><?php echo e(__(\App\Models\SalesOrder::$status[$salesorder->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($salesorder->created_at)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($salesorder->getTotal())); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($salesorder->assign_user) ? $salesorder->assign_user->name : '-')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show SalesOrder') || Gate::check('Edit SalesOrder') || Gate::check('Delete SalesOrder')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show SalesOrder')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('salesorder.show', $salesorder->id)); ?>"
                                                   data-size="md"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
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
                                                   data-title="<?php echo e(__('Edit SalesOrders')); ?>"><i
                                                        class="ti ti-edit"></i></a>
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

                <div id="useradd-10" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Invoices')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned SalesInvoice for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('invoice.create', ['account', $account->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"
                                       data-title="<?php echo e(__('Create New SalesInvoice')); ?>"
                                       title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Amount')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assigned User')); ?>

                                        </th>
                                        <?php if(Gate::check('Show Invoice') || Gate::check('Edit Invoice') || Gate::check('Delete Invoice')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $salesinvoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salesinvoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('invoice.edit', $salesinvoice->id)); ?>"
                                               data-size="md" data-title="<?php echo e(__('SalesInvoice')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($salesinvoice->name); ?></a>
                                        </td>
                                        <td>
                                            <?php if($salesinvoice->status == 0): ?>
                                            <span class="badge bg-secondary p-2 px-3 rounded"
                                                  style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                            <?php elseif($salesinvoice->status == 1): ?>
                                            <span class="badge bg-danger p-2 px-3 rounded"
                                                  style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                            <?php elseif($salesinvoice->status == 2): ?>
                                            <span class="badge bg-warning p-2 px-3 rounded"
                                                  style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                            <?php elseif($salesinvoice->status == 3): ?>
                                            <span class="badge bg-success p-2 px-3 rounded"
                                                  style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                            <?php elseif($salesinvoice->status == 4): ?>
                                            <span class="badge bg-info p-2 px-3 rounded"
                                                  style="width: 91px;"><?php echo e(__(\App\Models\Invoice::$status[$salesinvoice->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($salesinvoice->created_at)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($salesinvoice->getTotal())); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($salesinvoice->assign_user) ? $salesinvoice->assign_user->name : '-')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Invoice') || Gate::check('Edit Invoice') || Gate::check('Delete Invoice')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Invoice')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('invoice.show', $salesinvoice->id)); ?>"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                   class="mx-3 btn btn-sm align-items-center text-white "
                                                   data-title="<?php echo e(__('Invoice Details')); ?>">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Invoice')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('invoice.edit', $salesinvoice->id)); ?>"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   class="mx-3 btn btn-sm align-items-center text-white "
                                                   data-title="<?php echo e(__('Edit Invoice')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Invoice')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $salesinvoice->id]]); ?>

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

                <div id="useradd-11" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Calls')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Call for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('call.create', ['call', 0])); ?>" data-ajax-popup="true"
                                       data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Call')); ?>"
                                       title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Date Start')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Assigned User')); ?></th>
                                        <?php if(Gate::check('Show Call') || Gate::check('Edit Call') || Gate::check('Delete Call')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $calls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $call): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('call.edit', $call->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Call')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($call->name); ?></a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e(ucfirst($call->parent)); ?>

                                        </td>
                                        <td>
                                            <?php if($call->status == 0): ?>
                                            <span class="badge bg-success p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php elseif($call->status == 1): ?>
                                            <span class="badge bg-warning p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php elseif($call->status == 2): ?>
                                            <span class="badge bg-danger p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Call::$status[$call->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($call->start_date)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($call->assign_user) ? $call->assign_user->name : '')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Call') || Gate::check('Edit Call') || Gate::check('Delete Call')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Call')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('call.show', $call->id)); ?>"
                                                   data-ajax-popup="true" data-bs-toggle="tooltip"
                                                   data-title="<?php echo e(__('Show Call')); ?>"
                                                   title="<?php echo e(__('Quick View')); ?>"class="mx-3 btn btn-sm d-inline-flex align-items-center text-white  ">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Call')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('call.edit', $call->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                   data-bs-toggle="tooltip"
                                                   data-title="<?php echo e(__('Edit Call')); ?>"title="<?php echo e(__('Details')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Call')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['call.destroy', $call->id]]); ?>

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

                <div id="useradd-12" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Meetings')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned Meeting for this account')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('meeting.create', ['meeting', 0])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip"
                                       data-title="<?php echo e(__('Create New Meeting')); ?>" title="<?php echo e(__('Create')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable3">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Parent')); ?></th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Date Start')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Assigned User')); ?></th>
                                        <?php if(Gate::check('Show Meeting') || Gate::check('Edit Meeting') || Gate::check('Delete Meeting')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('meeting.edit', $meeting->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Meeting')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($meeting->name); ?></a>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e(ucfirst($meeting->parent)); ?></span>
                                        </td>
                                        <td>
                                            <?php if($meeting->status == 0): ?>
                                            <span class="badge bg-success p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                                            <?php elseif($meeting->status == 1): ?>
                                            <span class="badge bg-warning p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                                            <?php elseif($meeting->status == 2): ?>
                                            <span class="badge bg-danger p-2 px-3 rounded"
                                                  style="width: 73px;"><?php echo e(__(\App\Models\Meeting::$status[$meeting->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($meeting->start_date)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($meeting->assign_user) ? $meeting->assign_user->name : '')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Meeting') || Gate::check('Edit Meeting') || Gate::check('Delete Meeting')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Meeting')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('meeting.show', $meeting->id)); ?>"
                                                   data-ajax-popup="true" data-bs-toggle="tooltip"
                                                   data-title="<?php echo e(__('Meeting Details')); ?>"title="<?php echo e(__('Quick View')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Meeting')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('meeting.edit', $meeting->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip"
                                                   data-title="<?php echo e(__('Edit Meeting')); ?>"
                                                   title="<?php echo e(__('Details')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Meeting')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['meeting.destroy', $meeting->id]]); ?>

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
            $(document).on('change', 'select[name=parent]', function() {
    console.log('click');
    var parent = $(this).val();
    getparent(parent);
    });
    function getparent(bid) {
    console.log('getparent', bid);
    $.ajax({
    url: '<?php echo e(route('task.getparent')); ?>',
            type: 'POST',
            data: {
            "parent": bid,
                    "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(data) {
            console.log('get data');
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
    })

            $(document).on('change', 'select[name=opportunity]', function() {

    var opportunities = $(this).val();
    console.log(opportunities);
    getaccount(opportunities);
    });
    function getaccount(opportunities_id) {
    $.ajax({
    url: '<?php echo e(route('quote.getaccount')); ?>',
            type: 'POST',
            data: {
            "opportunities_id": opportunities_id,
                    "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function(data) {
            console.log(data);
            $('#amount').val(data.opportunitie.amount);
            $('#name').val(data.opportunitie.name);
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
<script>
    $(document).on('change', 'select[name=parent]', function() {
    var parent = $(this).val();
    getparent(parent);
    });
    function getparent(bid) {
    console.log(bid);
    $.ajax({
    url: '<?php echo e(route('call.getparent')); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/account/edit.blade.php ENDPATH**/ ?>