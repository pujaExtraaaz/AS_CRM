<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Sales Orders Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Edit Sales Order')); ?> <?php echo e('(' . $salesOrder->name . ')'); ?>

<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn ms-2">
        <a href="<?php echo e(route('salesorder.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('salesorder.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
<li class="breadcrumb-item"><a href="<?php echo e(route('salesorder.index')); ?>"><?php echo e(__('Sales Order')); ?></a></li>
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
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Invoice')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($salesOrder, ['route' => ['salesorder.update', $salesOrder->id], 'method' => 'PUT'])); ?>

                    <div class="card-header">
                        <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary "
                               data-ajax-popup-over="true" data-size="md"
                               data-title="<?php echo e(__('Generate content with AI')); ?>"
                               data-url="<?php echo e(route('generate', ['sales order'])); ?>" data-toggle="tooltip"
                               title="<?php echo e(__('Generate')); ?>">
                                <i class="fas fa-robot"></span><span
                                        class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit About Your sales orders Information')); ?></small>
                    </div>

                    <div class="card-body">
                        <form>
                            <div class="row">
                                <!--                                    <div class="col-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('name', __('Name'), ['class' => 'form-label'])); ?>

                                                                            <?php echo e(Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('Name'), 'required' => 'required'])); ?>

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
                                                                    </div>-->
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('quote', __('Quote'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('quote', $quote, $salesOrder->quote, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['quote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-quote" role="alert">
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
                                        <?php echo e(Form::label('sales_order_number', __('Sales Order Number'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('sales_order_number', \Auth::user()->salesorderNumberFormat($salesOrder->salesorder_id), ['class' => 'form-control', 'placeholder' => __('Sales Order Number'), 'required' => 'required','disabled'])); ?>

                                        <input type="hidden" name="salesorder_id" id="salesorder_id" value="<?php echo e($salesOrder->salesorder_id); ?>">
                                        <?php $__errorArgs = ['quote_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-quote_number" role="alert">
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
                                        <?php echo e(Form::label('date_salesorder', __('Date SalesOrder'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::date('date_quoted', date('Y-m-d'), ['class' => 'form-control datepicker', 'placeholder' => __('Date Quoted'), 'required' => 'required'])); ?>

                                        <?php $__errorArgs = ['date_quoted'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-date_quoted" role="alert">
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
                                        <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                                        <select name="status" id="status" class="form-control" required>
                                            <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>"
                                                    <?php echo e($salesOrder->status == $k ? 'selected' : ''); ?>>
                                                <?php echo e(__($v)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-status" role="alert">
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
                                        <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('account', $account, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-account" role="alert">
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
                                        <?php echo e(Form::label('opportunity', __('Opportunity'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('opportunity', $opportunity, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['opportunity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-opportunity" role="alert">
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
                                        <?php echo e(Form::label('billing_address', __('Billing Address'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::text('billing_address', null, ['class' => 'form-control', 'placeholder' => __('Billing Address'), 'required' => 'required'])); ?>

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

                                        <?php echo e(Form::text('shipping_address', null, ['class' => 'form-control', 'placeholder' => __('Shipping Address'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('billing_country', null, ['class' => 'form-control', 'placeholder' => __('Billing country'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('billing_state', null, ['class' => 'form-control', 'placeholder' => __('Billing State'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('shipping_country', null, ['class' => 'form-control', 'placeholder' => __('Shipping Country'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('shipping_state', null, ['class' => 'form-control', 'placeholder' => __('Shipping State'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('billing_city', null, ['class' => 'form-control', 'placeholder' => __('Billing City'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('billing_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Billing Postal Code'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('shipping_city', null, ['class' => 'form-control', 'placeholder' => __('Shipping City'), 'required' => 'required'])); ?>

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
                                        <?php echo e(Form::text('shipping_postalcode', null, ['class' => 'form-control', 'placeholder' => __('Shipping Postal Code'), 'required' => 'required'])); ?>

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
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('billing_contact', __('Billing Contact'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('billing_contact', $billing_contact, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['billing_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-billing_contact" role="alert">
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
                                        <?php echo e(Form::label('shipping_contact', __('Shipping Contact'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('shipping_contact', $billing_contact, null, ['class' => 'form-control']); ?>

                                        <?php $__errorArgs = ['shipping_contact'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_contact" role="alert">
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
                                        <?php echo e(Form::label('shipping_provider', __('Shipping Provider'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('shipping_provider', $shipping_provider, null, [
                                        'class' => 'form-control ',
                                        'required' => 'required',
                                        ]); ?>

                                        <?php $__errorArgs = ['shipping_provider'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-shipping_provider" role="alert">
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
                                        <?php echo e(Form::label('user', __('Assigned User'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('user', $user, $salesOrder->user_id, ['class' => 'form-control ']); ?>

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
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Name')])); ?>

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
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Invoice')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned invoice for this sales orders')); ?></small>
                            </div>
                            <div class="col">
                                <div class="text-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('invoice.create', ['salesorder', $salesOrder->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Invoice')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only ">
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
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Account')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Status')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Created At')); ?></th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Amount')); ?>

                                        </th>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('invoice.show', $invoice->id)); ?>"
                                               class="action-item text-primary"
                                               data-title="<?php echo e(__('Invoice Details')); ?>">
                                                <?php echo e($invoice->name); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <?php echo e(!empty($invoice->accounts->name) ? $invoice->accounts->name : '-'); ?>

                                        </td>
                                        <td>
                                            <?php if($invoice->status == 0): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php elseif($invoice->status == 1): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php elseif($invoice->status == 2): ?>
                                            <span
                                                class="badge bg-info p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php elseif($invoice->status == 3): ?>
                                            <span
                                                class="badge bg-success p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php elseif($invoice->status == 4): ?>
                                            <span
                                                class="badge bg-warning p-2 px-3 rounded"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php elseif($invoice->status == 5): ?>
                                            <span
                                                class="badge bg-danger p-2 px-3 roundedr"><?php echo e(__(\App\Models\Invoice::$status[$invoice->status])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->dateFormat($invoice->created_at)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($invoice->amount)); ?></span>
                                        </td>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Invoice')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="<?php echo e(route('invoice.show', $invoice->id)); ?>"
                                                   data-bs-toggle="tooltip"
                                                   data-original-title="<?php echo e(__('Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   title="<?php echo e(__('Invoice Details')); ?>">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Invoice')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('invoice.edit', $invoice->id)); ?>"
                                                   data-bs-toggle="tooltip"
                                                   data-original-title="<?php echo e(__('Edit')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   title="<?php echo e(__('Edit Invoice')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Invoice')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['invoice.destroy', $invoice->id]]); ?>

                                                <a href="#!"
                                                   class="mx-3 btn btn-sm   align-items-center text-white show_confirm"
                                                   data-bs-toggle="tooltip" title='Delete'>
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                                <?php echo Form::close(); ?>

                                            </div>
                                            <?php endif; ?>
                                        </td>
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
            url: '<?php echo e(route('quote.getaccount')); ?>',
            type: 'POST',
            data: {
                "opportunities_id": opportunities_id,
                "_token": "<?php echo e(csrf_token()); ?>",
            },
            success: function (data) {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/salesorder/edit.blade.php ENDPATH**/ ?>