<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Account Industry')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <h4 class="m-b-10"><?php echo e(__('Account Industry')); ?></h4>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Constant')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Account Industry')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create AccountIndustry')): ?>
        <div class="action-btn ms-2">
            <a href="#" data-size="md" data-url="<?php echo e(route('account_industry.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Account Industry')); ?>" title="<?php echo e(__('Create')); ?>"
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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive overflow_hidden">
                        <table id="datatable" class="table datatable align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('industry')); ?></th>
                                    <?php if(Gate::check('Edit AccountIndustry') || Gate::check('Delete AccountIndustry')): ?>
                                        <th class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $industrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $industry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="sorting_1"><?php echo e($industry->name); ?></td>
                                        <?php if(Gate::check('Edit AccountIndustry') || Gate::check('Delete AccountIndustry')): ?>
                                            <td class="action text-end">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit AccountIndustry')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('account_industry.edit', $industry->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            data-title="<?php echo e(__('Edit Industry')); ?>" title="<?php echo e(__('Edit')); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                            <i class="ti ti-edit"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete AccountIndustry')): ?>
                                                    <div class="action-btn bg-danger ms-2 float-end">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['account_industry.destroy', $industry->id]]); ?>

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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/account_industry/index.blade.php ENDPATH**/ ?>