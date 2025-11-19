<?php $__env->startSection('page-title'); ?>
<?php echo e(__('Lead')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
<div class="page-header-title">
    <?php echo e(__('Lead')); ?>

</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('Lead')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
<!-- <a href="<?php echo e(route('lead.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Kanban View')); ?>">
    <i class="ti ti-layout-kanban"></i>
</a> -->

<!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create Lead')): ?>
    <a href="#" data-url="<?php echo e(route('lead.create',['lead',0])); ?>" data-size="lg" data-ajax-popup="true" data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Lead')); ?>"title="<?php echo e(__('Create')); ?>" class="btn btn-sm btn-primary btn-icon m-1">
        <i class="ti ti-plus"></i>
    </a>
<?php endif; ?> -->
<a href="<?php echo e(route('lead.export')); ?>" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-original-title="<?php echo e(__('Export')); ?>"  >
    <i class="ti ti-file-export text-white"></i>
</a>

<a href="#" class="btn btn-sm btn-primary btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo e(__('Import')); ?>" data-size="md" data-ajax-popup="true" data-title="<?php echo e(__('Import client CSV file')); ?>" data-url="<?php echo e(route('lead.file.import')); ?>">
    <i class="ti ti-file-import text-white"></i>
</a>
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
                                <th scope="col" class="sort" data-sort="name"><?php echo e(__('Year')); ?></th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Make')); ?></th> 
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Model')); ?></th> 
                                <th scope="col" class="sort" data-sort="cust_name"><?php echo e(__('Customer Name')); ?></th>
                                <th scope="col" class="sort" data-sort="contact"><?php echo e(__('Contact')); ?></th>
                                <th scope="col" class="sort" data-sort="completion"><?php echo e(__('Disposition')); ?></th>
                                <!-- <th scope="col" class="sort" data-sort="lead_type"><?php echo e(__('Lead Type')); ?></th> -->
                                <!-- <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Email')); ?></th> -->
                                <!-- <th scope="col" class="sort" data-sort="status"><?php echo e(__('Phone')); ?></th> -->
                                <!-- <th scope="col" class="sort" data-sort="status"><?php echo e(__('Product')); ?></th> -->
                                <!-- <th scope="col" class="sort" data-sort="status"><?php echo e(__('Disposition')); ?></th> -->
                                <!-- <th scope="col" class="sort" data-sort="status"><?php echo e(__('Assign user')); ?></th> -->
                                <?php if(Gate::check('Show Lead') ||  Gate::check('Delete Lead')): ?>
                                <th scope="col" class="text-end"><?php echo e(__('Action')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
<!--                                 <td>
                                    <a href="<?php echo e(route('lead.edit',$lead->id)); ?>" data-size="md" data-title="<?php echo e(__('Lead Details')); ?>" class="action-item text-primary">
                                        <?php echo e(ucfirst($lead->name)); ?>

                                    </a>
                                </td> -->
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($lead->product->year ?: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($lead->product->make ?: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($lead->product->model ?: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($lead->cust_name ?: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e(ucfirst($lead->contact ?: '--')); ?></span>
                                </td>
                                <td>
                                    <span class="col-sm-12"><span class="text-sm"><?php echo e(ucfirst($lead->product->disposition ?$status[$lead->product->disposition]: '--')); ?></span></span>
                                </td>
                                <!-- <td>
                                    <span class="budget"><?php echo e(ucfirst(!empty($lead->accounts)?$lead->accounts->name:'--')); ?></span>
                                </td> -->
                                <!-- <td>
                                    <span class="budget"><?php echo e(!empty($lead->leadType)?$lead->leadType->name:'--'); ?></span>
                                </td>
                                <td>
                                    <span class="budget"><?php echo e($lead->email ?: '--'); ?></span>
                                </td> -->
                                <!-- <td>
                                    <span class="budget">
                                        <?php echo e($lead->phone ?: '--'); ?>

                                    </span>
                                </td> -->
                                <!-- <td>
                                    <span class="col-sm-12"><span class="text-sm"><?php echo e(ucfirst(!empty($lead->product_id)?$lead->product->name:'--')); ?></span></span>
                                </td> -->
                                
                                <!-- <td>
                                    <span class="col-sm-12"><span class="text-sm"><?php echo e(ucfirst(!empty($lead->assign_user)?$lead->assign_user->name:'--')); ?></span></span>
                                </td> -->
                                <?php if(Gate::check('Show Lead') || Gate::check('Edit Lead') || Gate::check('Delete Lead')): ?>
                                <td class="text-end">   
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Show Lead')): ?>
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="#" data-size="md" data-url="<?php echo e(route('lead.status.logs',$lead->id)); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Status Logs')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Status Logs')); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                            <i class="ti ti-history"></i>
                                        </a>
                                    </div>
                                    <div class="action-btn bg-warning ms-2">
                                        <a href="#" data-size="md" data-url="<?php echo e(route('lead.show',$lead->id)); ?>" data-bs-toggle="tooltip" title="<?php echo e(__('Quick View')); ?>" data-ajax-popup="true" data-title="<?php echo e(__('Lead Details')); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white ">
                                            <i class="ti ti-eye"></i>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Lead')): ?>
                                    <div class="action-btn bg-info ms-2">
                                        <a href="<?php echo e(route('lead.edit',$lead->id)); ?>" class="mx-3 btn btn-sm d-inline-flex align-items-center text-white " data-bs-toggle="tooltip"title="<?php echo e(__('Details')); ?>" data-title="<?php echo e(__('Edit Lead')); ?>"><i class="ti ti-edit"></i></a>
                                    </div>
                                    <?php endif; ?> 
                                    <?php if(\Auth::user()->type == 'super admin'): ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete Lead')): ?>
                                    <div class="action-btn bg-danger ms-2">
                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['lead.destroy', $lead->id]]); ?>

                                        <a href="#!" class="mx-3 btn btn-sm  align-items-center text-white show_confirm" data-bs-toggle="tooltip" title='Delete'>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp2\htdocs\AS_CRM\resources\views/lead/index.blade.php ENDPATH**/ ?>