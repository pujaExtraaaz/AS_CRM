<?php $__env->startSection('page-title'); ?>
<?php echo e(__('User')); ?>

<?php $__env->stopSection(); ?>
<?php if(\Auth::user()->type == 'super admin'): ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Manage Companies')); ?>

<?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection('title'); ?>
<?php echo e(__('Users')); ?>

<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if(\Auth::user()->type == 'super admin'): ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Companies')); ?></li>
<?php $__env->stopSection(); ?>
<?php else: ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('User')); ?></li>
<?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('action-btn'); ?>
<?php if(\Auth::user()->type == 'owner' || \Auth::user()->type == 'Manager' || \Auth::user()->type == 'super admin'): ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage User')): ?>
<a href="<?php echo e(route('user.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
   data-bs-toggle="tooltip"title="<?php echo e(__('Grid View')); ?>">
    <i class="ti ti-layout-grid text-white"></i>
</a>
<?php endif; ?>
<?php endif; ?>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create User')): ?>
<a href="#" data-url="<?php echo e(route('user.create')); ?>" data-size="lg" data-ajax-popup="true" data-bs-toggle="tooltip"
   title="<?php echo e(__('Create')); ?>"data-title="<?php echo e(__('Create New User')); ?>" class="btn btn-sm btn-primary btn-icon">
    <i class="ti ti-plus"></i>
</a>
<?php endif; ?>
<?php if(\Auth::user()->type == 'owner'): ?>
<a href="<?php echo e(route('userlog.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1"
   data-bs-toggle="tooltip"title="<?php echo e(__('User Log')); ?>">
    <i class="ti ti-user-check"></i>
</a>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body table-border-style">
                <div class="table-responsive overflow_hidden">
                    <table id="datatable" class="table align-items-center datatable">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="username"><?php echo e(__('Avatar')); ?></th>
                                <th scope="col" class="sort" data-sort="username"><?php echo e(__('User Name')); ?></th>
                                <th scope="col" class="sort" data-sort="name"><?php echo e(__('Name')); ?></th>
                                <th scope="col" class="sort" data-sort="email"><?php echo e(__('Email')); ?></th>
                                <?php if(\Auth::user()->type != 'super admin'): ?>
                                <th scope="col" class="sort" data-sort="title"><?php echo e(__('Type')); ?></th>
                                <th scope="col" class="sort" data-sort="isactive"><?php echo e(__('Status')); ?></th>
                                <?php endif; ?>
                                <?php if(Gate::check('Edit User') || Gate::check('Delete User')): ?>
                                <th class="text-end" scope="col"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $profile = \App\Models\Utility::get_file('upload/profile/');
                            ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <span class="avatar">
                                        <a href="<?php echo e($profile); ?><?php echo e(!empty($user->avatar) ? $user->avatar : 'avatar.png'); ?>" target="_blank">
                                            <img src="<?php echo e(($user->avatar)? ($profile . $user->avatar):($profile . 'avatar.png')); ?>" class="rounded-circle" width="25%" alt="<?php echo e($profile); ?>">
                                        </a>
                                    </span>
                                </td>
                                <td class="budget">
                                    <a href="#" data-size="md" data-url="<?php echo e(route('user.show', $user->id)); ?>"
                                       data-ajax-popup="true" data-title="<?php echo e(__('User Details')); ?>"
                                       class="action-item text-primary">
                                        <?php echo e(ucfirst($user->username)); ?>

                                    </a>
                                </td>
                                <td>
                                     <a href="javascript:void(0);" data-size="md" data-url="<?php echo e(route('user.show', $user->id)); ?>"
                                       data-ajax-popup="true" data-title="<?php echo e(__('User Details')); ?>"
                                       class="action-item text-primary">
                                        <?php echo e(ucfirst($user->name)); ?>

                                    </a>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e($user->email); ?></span>
                                </td>
                                <?php if(\Auth::user()->type != 'super admin'): ?>
                                <td>
                                    <?php echo e(ucfirst($user->type)); ?>

                                </td>
                                <td>
                                    <?php if($user->is_active == 1): ?>
                                    <span
                                        class="badge bg-success p-2 px-3 rounded"><?php echo e(__('Active')); ?></span>
                                    <?php else: ?>
                                    <span
                                        class="badge bg-danger p-2 px-3 rounded"><?php echo e(__('In Active')); ?></span>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <?php if(Gate::check('Edit User') || Gate::check('Delete User')): ?>
                                <td class="text-end">
                                    <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <div class="action-btn bg-secondary ms-2">
                                        <a href="<?php echo e(route('login.with.company', $user->id)); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                           data-ajax-popup="true" data-bs-toggle="tooltip"
                                           data-title="<?php echo e(__('Login As Company')); ?>"
                                           title="<?php echo e(__('Login As Company')); ?>"> <span
                                                class="text-white"><i class="ti ti-replace"></i></a>
                                    </div>
                                    <div class="action-btn bg-primary ms-2">
                                        <a data-url="<?php echo e(route('company.info', $user->id)); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                           data-ajax-popup="true" data-size="lg" data-bs-toggle="tooltip"
                                           data-title="<?php echo e(__('Company Info')); ?>"
                                           title="<?php echo e(__('Company Info')); ?>"> <span class="text-white"><i
                                                    class="ti ti-atom"></i></a>
                                    </div>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Manage Plan')): ?>
                                    <div class="action-btn bg-secondary ms-2">
                                        <a href="#"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-size="md"
                                           data-url="<?php echo e(route('plan.upgrade', $user->id)); ?>"
                                           data-ajax-popup="true" data-bs-toggle="tooltip"
                                           data-title="<?php echo e(__('Upgrade Plan')); ?>"
                                           title="<?php echo e(__('Upgrade Plan')); ?>">
                                            <i class="ti ti-trophy"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($user->is_disable == 0): ?>
                                    <div class="text-center">
                                        <i class="ti ti-lock"></i>
                                    </div>
                                    <?php else: ?>
                                    <div class="action-btn bg-success ms-2">
                                        <a href="#"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-size="md"
                                           data-url="<?php echo e(route('user.reset', \Crypt::encrypt($user->id))); ?>"
                                           data-ajax-popup="true" title="<?php echo e(__('Reset Password')); ?>"
                                           data-bs-toggle="tooltip"
                                           data-title="<?php echo e(__('Reset Password')); ?>">
                                            <i class="ti ti-key"></i>
                                        </a>
                                    </div>
                                    <?php if($user->is_enable_login == 1): ?>
                                    <div class="action-btn bg-danger ms-2">
                                        <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                           data-bs-toggle="tooltip"
                                           data-bs-original-title="<?php echo e(__('Login Disable')); ?>"> <span
                                                class="text-white"><i class="ti ti-road-sign"></i></a>
                                    </div>
                                    <?php elseif($user->is_enable_login == 0 && $user->password == null): ?>
                                    <div class="action-btn bg-secondary ms-2">
                                        <a href="#"
                                           data-url="<?php echo e(route('users.reset', \Crypt::encrypt($user->id))); ?>"
                                           data-ajax-popup="true" data-size="md"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center login_enable"
                                           data-title="<?php echo e(__('New Password')); ?>"
                                           data-bs-toggle="tooltip"
                                           data-bs-original-title="<?php echo e(__('New Password')); ?>"> <span
                                                class="text-white"><i class="ti ti-road-sign"></i></a>
                                    </div>
                                    <?php else: ?>
                                    <div class="action-btn bg-success ms-2">
                                        <a href="<?php echo e(route('users.login', \Crypt::encrypt($user->id))); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center login_enable"
                                           data-bs-toggle="tooltip"
                                           data-bs-original-title="<?php echo e(__('Login Enable')); ?>"> <span
                                                class="text-white"> <i class="ti ti-road-sign"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show User')): ?>
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="#" data-size="md"
                                           data-url="<?php echo e(route('user.show', $user->id)); ?>"
                                           data-bs-toggle="tooltip" title="<?php echo e(__('Details')); ?>"
                                           data-ajax-popup="true" data-title="<?php echo e(__('User Details')); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit User')): ?>
                                    <div class="action-btn bg-info ms-2">
                                        <a href="<?php echo e(route('user.edit', $user->id)); ?>"
                                           class="mx-3 btn btn-sm d-inline-flex align-items-center text-white"
                                           data-bs-toggle="tooltip"
                                           title="<?php echo e(__('Edit')); ?>"data-title="<?php echo e(__('Edit User')); ?>"><i
                                                class="ti ti-edit"></i></a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete User')): ?>
                                    <div class="action-btn bg-danger ms-2">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]); ?>

                                        <a href="#!"
                                           class="mx-3 btn btn-sm align-items-center text-white show_confirm"
                                           data-bs-toggle="tooltip" title='Delete'>
                                            <i class="ti ti-trash"></i>
                                        </a>
                                        <?php echo Form::close(); ?>

                                    </div>
                                    <?php endif; ?>
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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/user/index.blade.php ENDPATH**/ ?>