<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Campaign Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Edit Campaign')); ?> <?php echo e('(' . $campaign->name . ')'); ?>

<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('campaign.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
        <a href="<?php echo e(route('campaign.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
<li class="breadcrumb-item"><a href="<?php echo e(route('campaign.index')); ?>"><?php echo e(__('Campaign')); ?></a></li>
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
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Opportunities')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                        <a href="#useradd-3"
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Lead')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($campaign, ['route' => ['campaign.update', $campaign->id], 'method' => 'PUT'])); ?>

                    <div class="card-header">
                        <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary"
                               data-ajax-popup-over="true" data-size="md"
                               data-title="<?php echo e(__('Generate content with AI')); ?>"
                               data-url="<?php echo e(route('generate', ['campaign'])); ?>" data-toggle="tooltip"
                               title="<?php echo e(__('Generate')); ?>">
                                <i class="fas fa-robot"></span><span
                                        class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit about your campaign information')); ?></small>
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
                                        <?php echo e(Form::label('status', __('Status'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('status', $status, null, ['class' => 'form-control ']); ?>

                                    </div>
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('start_date', __('Start Date'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::date('start_date', date('Y-m-d'), ['class' => 'form-control datepicker', 'required' => 'required']); ?>

                                    </div>
                                    <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-start_date" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('end_date', __('End Date'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::date('end_date', date('Y-m-d'), ['class' => 'form-control datepicker', 'required' => 'required']); ?>

                                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-end_date" role="alert">
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
                                        <?php echo e(Form::label('type', __('Type'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('type', $type, null, ['class' => 'form-control ']); ?>

                                    </div>
                                    <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-type" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>                                    
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('budget', __('Budget'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::number('budget', null, ['class' => 'form-control', 'placeholder' => __('Enter Name')])); ?>

                                    </div>
                                    <?php $__errorArgs = ['budget'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-budget" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>                                    
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('target_list', __('Target Lists'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('target_list', $target_list, null, ['class' => 'form-control ']); ?>

                                    </div>
                                    <?php $__errorArgs = ['target_list'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-target_list" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('excludingtarget_list', __('Excluding Target Lists'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('excludingtarget_list', $target_list, null, [
                                        'class' => 'form-control ',
                                        'required' => 'required',
                                        ]); ?>

                                    </div>
                                    <?php $__errorArgs = ['excludingtarget_list'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-excludingtarget_list" role="alert">
                                        <strong class="text-danger"><?php echo e($message); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('description', __('Description'), ['class' => 'form-label'])); ?>

                                        <?php echo e(Form::textarea('description', null, ['class' => 'form-control', 'rows' => 2, 'placeholder' => __('Enter Description')])); ?>

                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-description" role="alert">
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
                                        <?php echo e(Form::label('user', __('Assigned User'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('user', $user, $campaign->user_id, ['class' => 'form-control ']); ?>

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
                                <h5><?php echo e(__('Opportunities')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assign opportunities for this campaign')); ?></small>
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('opportunities.create', ['campaign', $campaign->id])); ?>"
                                       data-bs-toggle="tooltip" data-ajax-popup="true"
                                       data-title="<?php echo e(__('Create New Opportunities')); ?>"
                                       title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon-only">
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
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Stage')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Amount')); ?>

                                        </th>
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
                                                <?php echo e(ucfirst($opportunities->name)); ?>

                                            </a>
                                        </td>
                                        <td>
                                            <span class="budget">
                                                <?php echo e(ucfirst(!empty($opportunities->stages) ? $opportunities->stages->name : '-')); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(\Auth::user()->priceFormat($opportunities->amount)); ?></span>
                                        </td>
                                        <td>
                                            <span
                                                class="budget"><?php echo e(ucfirst(!empty($opportunities->assign_user) ? $opportunities->assign_user->name : '-')); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Opportunities') || Gate::check('Edit Opportunities') || Gate::check('Delete Opportunities')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Opportunities')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('opportunities.show', $opportunities->id)); ?>"
                                                   data-bs-toggle="tooltip"title="<?php echo e(__('Quick View')); ?>"
                                                   data-ajax-popup="true"
                                                   data-title="<?php echo e(__('opportunities Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Opportunities')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('opportunities.edit', $opportunities->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white "
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Opportunities Edit')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Opportunities')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['opportunities.destroy', $opportunities->id]]); ?>

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

                <div id="useradd-3" class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5><?php echo e(__('Leads')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assign lead for this campaign')); ?></small>
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('lead.create', ['campaign', $campaign->id])); ?>"
                                       data-ajax-popup="true" data-title="<?php echo e(__('Create New Lead')); ?>"
                                       data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       class="btn btn-sm btn-primary btn-icon-only">
                                        <i class="ti ti-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="datatable1">
                                <thead>
                                    <tr>
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Email')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Phone')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('City')); ?></th>
                                        <?php if(Gate::check('Show Lead') || Gate::check('Edit Lead') || Gate::check('Delete Lead')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('lead.edit', $lead->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Lead Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($lead->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($lead->email); ?>

                                        </td>
                                        <td>
                                            <span class="budget">
                                                <?php echo e($lead->phone); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e($lead->lead_city); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Lead') || Gate::check('Edit Lead') || Gate::check('Delete Lead')): ?>
                                        <td class="text-end">

                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Lead')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('lead.show', $lead->id)); ?>"
                                                   data-bs-toggle="tooltip" data-ajax-popup="true"
                                                   data-title="<?php echo e(__('Lead Details')); ?>"
                                                   title="<?php echo e(__('Quick View')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Lead')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('lead.edit', $lead->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip"
                                                   data-title="<?php echo e(__('Edit Lead')); ?>"
                                                   title="<?php echo e(__('Details')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Lead')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.destroy', $lead->id]]); ?>

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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/campaign/edit.blade.php ENDPATH**/ ?>