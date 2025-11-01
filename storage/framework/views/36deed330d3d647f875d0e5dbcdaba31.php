<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Document Folders')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <h4 class="m-b-10"><?php echo e(__('Document Folders')); ?></h4>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Constant')); ?></li>
    <li class="breadcrumb-item"><?php echo e(__('Document Folders')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Create DocumentFolder')): ?>
        <div class="action-btn ms-2">
            <a href="#" data-size="md" data-url="<?php echo e(route('document_folder.create')); ?>" data-ajax-popup="true"
                data-bs-toggle="tooltip" data-title="<?php echo e(__('Create New Document Folders')); ?>" title="<?php echo e(__('Create')); ?>"
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
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Folder Name')); ?></th>
                                    <th scope="col" class="sort" data-sort="name"><?php echo e(__('Folder Name')); ?></th>

                                    <?php if(Gate::check('Edit DocumentFolder') || Gate::check('Delete DocumentFolder')): ?>
                                        <th class="text-end"><?php echo e(__('Action')); ?></th>
                                    <?php endif; ?>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $folders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="sortingx_1"><?php echo e($folder->name); ?></td>
                                        <td class="sortingx_1">
                                            <?php if(!$folder->children->isEmpty()): ?>
                                                <?php $__currentLoopData = $folder->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $folder1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($folder1->name); ?>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php echo e('parent Category'); ?>

                                            <?php endif; ?>
                                        </td>
                                        <?php if(Gate::check('Edit DocumentFolder') || Gate::check('Delete DocumentFolder')): ?>
                                            <td class="action text-end">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit DocumentFolder')): ?>
                                                    <div class="action-btn bg-info ms-2">
                                                        <a href="#" data-size="md"
                                                            data-url="<?php echo e(route('document_folder.edit', $folder->id)); ?>"
                                                            data-ajax-popup="true" data-bs-toggle="tooltip"
                                                            title="<?php echo e(__('Edit')); ?>" data-title="<?php echo e(__('Edit type')); ?>"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center text-white">
                                                            <i class="ti ti-edit"></i>
                                                        </a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Delete DocumentFolder')): ?>
                                                    <div class="action-btn bg-danger ms-2 float-end">
                                                        <?php echo Form::open(['method' => 'DELETE', 'route' => ['document_folder.destroy', $folder->id]]); ?>

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
<?php $__env->startPush('scrip-page'); ?>
    <script>
        $(document).delegate("li .li_title", "click", function(e) {
            $(this).closest("li").find("ul:first").slideToggle(300);
            $(this).closest("li").find(".location_picture_row:first").slideToggle(300);
            if ($(this).find("i").attr('class') == 'glyph-icon simple-icon-arrow-down') {
                $(this).find("i").removeClass("simple-icon-arrow-down").addClass("simple-icon-arrow-right");
            } else {
                $(this).find("i").removeClass("simple-icon-arrow-right").addClass("simple-icon-arrow-down");
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u766425373/domains/extraaaz.com/public_html/live/resources/views/document_folder/index.blade.php ENDPATH**/ ?>