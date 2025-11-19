<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Document Edit')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Edit Document')); ?> <?php echo e('(' . $document->name . ')'); ?>

<?php $__env->stopSection(); ?>
<?php
$plansettings = App\Models\Utility::plansettings();
?>
<?php $__env->startSection('action-btn'); ?>
<div class="btn-group" role="group">
    <?php if(!empty($previous)): ?>
    <div class="action-btn  ms-2">
        <a href="<?php echo e(route('document.edit', $previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
        <a href="<?php echo e(route('document.edit', $next)); ?>" class="btn btn-sm btn-primary btn-icon m-1"
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
<li class="breadcrumb-item"><a href="<?php echo e(route('document.index')); ?>"><?php echo e(__('Document')); ?></a></li>
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
                           class="list-group-item list-group-item-action border-0"><?php echo e(__('Account')); ?> <div
                                class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($document, ['route' => ['document.update', $document->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                    <div class="card-header">
                        <?php if(isset($plansettings['enable_chatgpt']) && $plansettings['enable_chatgpt'] == 'on'): ?>
                        <div class="float-end">
                            <a href="#" data-size="md" class="btn btn-sm btn-primary"
                               data-ajax-popup-over="true" data-size="md"
                               data-title="<?php echo e(__('Generate content with AI')); ?>"
                               data-url="<?php echo e(route('generate', ['document'])); ?>" data-toggle="tooltip"
                               title="<?php echo e(__('Generate')); ?>">
                                <i class="fas fa-robot"></span><span
                                        class="robot"><?php echo e(__('Generate With AI')); ?></span></i>
                            </a>
                        </div>
                        <?php endif; ?>
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit about your document information')); ?></small>
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
                                        <?php echo e(Form::label('user', __('Assigned User'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('user', $user, $document->user_id, ['class' => 'form-control ','required'=>'required']); ?>

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
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('folder', __('Folder'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('folder', $folders, null, ['class' => 'form-control ', 'required' => 'required']); ?>

                                        <?php $__errorArgs = ['folder'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-folder" role="alert">
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

                                        <?php echo Form::select('type', $type, null, ['class' => 'form-control ', 'required' => 'required']); ?>

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
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <?php echo e(Form::label('account', __('Account'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('account', $account_name, null, ['class' => 'form-control ']); ?>

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
                                        <?php echo e(Form::label('opportunities', __('Opportunities'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::select('opportunities', $opportunities, null, ['class' => 'form-control ']); ?>

                                        <?php $__errorArgs = ['opportunities'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-opportunities" role="alert">
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
                                        <?php echo e(Form::label('publish_date', __('Publish Date'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::date('publish_date', date('Y-m-d'), ['class' => 'form-control datepicker']); ?>

                                        <?php $__errorArgs = ['publish_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-publish_date" role="alert">
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
                                        <?php echo e(Form::label('expiration_date', __('Expiration Date'), ['class' => 'form-label'])); ?>

                                        <?php echo Form::date('expiration_date', date('Y-m-d'), [
                                        'class' => 'form-control datepicker',
                                        'required' => 'required',
                                        ]); ?>

                                        <?php $__errorArgs = ['expiration_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-expiration_date" role="alert">
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

                                <div class="col-6 mb-3 field" data-name="attachments">
                                    <div class="attachment-upload">
                                        <div class="attachment-button">
                                            <div class="pull-left">
                                                <div class="form-group">
                                                    <?php echo e(Form::label('attachment', __('Attachment'), ['class' => 'form-label'])); ?>

                                                    
                                                    <input type="file"name="attachment" class="form-control mb-3"
                                                           onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah"
                                                         src="<?php echo e(!empty($document->attachment) ? \App\Models\Utility::get_file('upload/profile' . '/' . $document->attachment) : \App\Models\Utility::get_file('upload/profile/avatar.png')); ?>"
                                                         width="20%" height="20%" />
                                                </div>
                                            </div>
                                        </div>
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
                                <h5><?php echo e(__('Account')); ?></h5>
                                <small class="text-muted"><?php echo e(__('Assigned account for this document')); ?></small>
                            </div>
                            <div class="col">
                                <div class="float-end">
                                    <a href="#" data-size="lg"
                                       data-url="<?php echo e(route('account.create', ['document', $document->id])); ?>"
                                       data-ajax-popup="true" data-bs-toggle="tooltip" title="<?php echo e(__('Create')); ?>"
                                       data-title="<?php echo e(__('Create New Account')); ?>"
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
                                        <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Website')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="status"><?php echo e(__('Type')); ?>

                                        </th>
                                        <th scope="col" class="sort" data-sort="completion">
                                            <?php echo e(__('Country')); ?></th>
                                        <?php if(Gate::check('Show Account') || Gate::check('Edit Account') || Gate::check('Delete Account')): ?>
                                        <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <a href="<?php echo e(route('account.edit', $account->id)); ?>" data-size="md"
                                               data-title="<?php echo e(__('Account Details')); ?>"
                                               class="action-item text-primary">
                                                <?php echo e($account->name); ?>

                                            </a>
                                        </td>
                                        <td class="budget">
                                            <?php echo e($account->website); ?>

                                        </td>
                                        <td>
                                            <span class="budget">
                                                <?php echo e(!empty($account->AccountType) ? $account->AccountType->name : ''); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="budget"><?php echo e($account->shipping_city); ?></span>
                                        </td>
                                        <?php if(Gate::check('Show Account') || Gate::check('Edit Account') || Gate::check('Delete Account')): ?>
                                        <td class="text-end">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Account')): ?>
                                            <div class="action-btn bg-warning ms-2">
                                                <a href="#" data-size="md"
                                                   data-url="<?php echo e(route('account.show', $account->id)); ?>"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>"
                                                   data-ajax-popup="true"
                                                   data-title="<?php echo e(__('Account Details')); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                    <i class="ti ti-eye"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Account')): ?>
                                            <div class="action-btn bg-info ms-2">
                                                <a href="<?php echo e(route('account.edit', $account->id)); ?>"
                                                   class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                                   data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                                   data-title="<?php echo e(__('Edit Account')); ?>"><i
                                                        class="ti ti-edit"></i></a>
                                            </div>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Account')): ?>
                                            <div class="action-btn bg-danger ms-2">
                                                <?php echo Form::open(['method' => 'DELETE', 'route' => ['account.destroy', $account->id]]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/document/edit.blade.php ENDPATH**/ ?>