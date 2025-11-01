<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Contact')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <h4 class="m-b-10"><?php echo e(__('Contact')); ?></h4>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Contact')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('contact.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip"
        title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Contact')): ?>
            <a href="#" data-url="<?php echo e(route('contact.create', ['contact', 0])); ?>" data-size="lg" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Contact')); ?>"title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
                <i class="ti ti-plus"></i>
            </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('filter'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header border-0 pb-0">
                    <div class="d-flex align-items-center">
                        
                    </div>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle"
                                data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="feather icon-more-vertical"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                    <?php if(Gate::check('Show Contact') || Gate::check('Create Contact') || Gate::check('Delete Contact')): ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Contact')): ?>
                                        <a href="<?php echo e(route('contact.edit', $contact->id)); ?>"data-size="md"  class="dropdown-item"
                                            data-bs-whatever="<?php echo e(__('Edit Contact')); ?>" data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Edit Contact')); ?>"><i class="ti ti-edit"></i>
                                            <?php echo e(__('Edit')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Contact')): ?>
                                        <a href="#" data-url="<?php echo e(route('contact.show', $contact->id)); ?>"
                                            data-ajax-popup="true" class="dropdown-item"
                                            data-size="md" data-bs-whatever="<?php echo e(__('Contact Details')); ?>"
                                            data-bs-toggle="tooltip"
                                            data-title="<?php echo e(__('Contact Details')); ?>"><i class="ti ti-eye"></i>
                                            <?php echo e(__('Details')); ?></a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Contact')): ?>
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['contact.destroy', $contact->id]]); ?>

                                        <a href="#!" class="dropdown-item  show_confirm" data-bs-toggle="tooltip" >
                                            <i class="ti ti-trash"></i><?php echo e(__('Delete')); ?>

                                        </a>
                                        <?php echo Form::close(); ?>

                                        
                                    <?php endif; ?>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">                                
                    <div class="row g-2 justify-content-between">
                        <div class="col-12">
                            <div class="text-center client-box">
                                <div class="avatar-parent-child">
                                    
                                    <img alt="user-image" class="img-fluid rounded-circle" <?php if(!empty($contact->avatar)): ?> src="<?php echo e(!empty($contact->avatar) ? asset(Storage::url('upload/profile/' . $contact->avatar)) : asset(url('./assets/img/clients/160x160/img-1.png'))); ?>" <?php else: ?>  avatar="<?php echo e($contact->name); ?>" <?php endif; ?>>
                                </div>
                                <h5 class="h6 mt-2 mb-1 text-primary"><?php echo e(ucfirst($contact->name)); ?></h5>
                                
                                <div class="mb-1"><a href="#" class="text-sm small text-muted"><?php echo e($contact->email); ?></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-3">
                    
        <a href="#" class="btn-addnew-project"  data-ajax-popup="true" data-size="lg" data-title="<?php echo e(__('Create New Contact')); ?>" data-url="<?php echo e(route('contact.create', ['contact', 0])); ?>">
            <div class="badge bg-primary proj-add-icon">
                <i class="ti ti-plus"></i>
            </div>
            <h6 class="mt-4 mb-2">New Contact</h6>
            <p class="text-muted text-center">Click here to add New Contact</p>
        </a>
     </div>
</div>



   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/contact/grid.blade.php ENDPATH**/ ?>