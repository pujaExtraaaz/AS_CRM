<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>

    <?php echo e(__('Edit Report')); ?>  <?php echo e('('. $report->name .')'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <div class="btn-group" role="group">
        <?php if(!empty($previous)): ?>
        <div class="action-btn  ms-2">
            <a href="<?php echo e(route('report.edit',$previous)); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
                <i class="ti ti-chevron-left"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="action-btn  ms-2">
            <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="<?php echo e(__('Previous')); ?>">
                <i class="ti ti-chevron-left"></i>
            </a>
        </div>
        <?php endif; ?>
        <?php if(!empty($next)): ?>
        <div class="action-btn  ms-2">
            <a href="<?php echo e(route('report.edit',$next)); ?>" class="btn btn-sm btn-primary btn-icon m-1" data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
        <?php else: ?>
        <div class="action-btn  ms-2">
            <a href="#" class="btn btn-sm btn-primary btn-icon m-1 disabled" data-bs-toggle="tooltip" title="<?php echo e(__('Next')); ?>">
                <i class="ti ti-chevron-right"></i>
            </a>
        </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('report.index')); ?>"><?php echo e(__('Report')); ?></a></li>
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
                        <a href="#useradd-1" class="list-group-item list-group-item-action"><?php echo e(__('Overview')); ?> <div class="float-end"><i class="ti ti-chevron-right"></i></div></a>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div id="useradd-1" class="card">
                    <?php echo e(Form::model($report,array('route' => array('report.update', $report->id), 'method' => 'PUT'))); ?>

                    <div class="card-header">
                        <h5><?php echo e(__('Overview')); ?></h5>
                        <small class="text-muted"><?php echo e(__('Edit about your Report information')); ?></small>
                    </div>
        
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('name',__('Name'),['class'=>'form-label'])); ?>

                                        <?php echo e(Form::text('name',null,array('class'=>'form-control','placeholder'=>__('Enter Name'),'required'=>'required'))); ?>

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
                                <div class="col-12">
                                    <div class="form-group">
                                        <?php echo e(Form::label('chart_type',__('Chart Type'),['class'=>'form-label'])); ?>

                                        <?php echo Form::select('chart_type', $chart_type,null,array('class' => 'form-control ','required'=>'required')); ?>

                                        <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-amount" role="alert">
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
                                        <?php echo e(Form::label('Assign User',__('Assign User'),['class'=>'form-label'])); ?>

                                        <?php echo Form::select('user', $user, null,array('class' => 'form-control ','required'=>'required')); ?>

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
                                    <?php echo e(Form::submit(__('Update'),array('class'=>'btn-submit btn btn-primary'))); ?>

                                </div>

                                
                            </div>
                        </form>
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

        $(document).on('change', 'select[name=parent]', function () {
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
                    "parent": bid, "_token": "<?php echo e(csrf_token()); ?>",
                },
                success: function (data) {
                    console.log(data);
                    $('#parent_id').empty();
                    

                    $.each(data, function (key, value) {
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/report/edit.blade.php ENDPATH**/ ?>