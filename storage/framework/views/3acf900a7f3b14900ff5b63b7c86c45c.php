<?php
    $profile=asset(Storage::url('uploads/avatar'));
?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/frappe-gantt.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script>
        const month_names = {
            "en": [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
            "en": [
                'January',
                'February',
                'March',
                'April',
                'May',
                'June',
                'July',
                'August',
                'September',
                'October',
                'November',
                'December'
            ],
        };
    </script>
    <script src="<?php echo e(asset('js/frappe-gantt.js')); ?>"></script>
    <script>

        var tasks = JSON.parse('<?php echo addslashes(json_encode($ganttTasks)); ?>');

        var gantt = new Gantt('#gantt', tasks, {

            custom_popup_html: function (task) {
                var status_class = 'success';
                if (task.custom_class == 'medium') {
                    status_class = 'info'
                } else if (task.custom_class == 'high') {
                    status_class = 'danger'
                }
                return `<div class="details-container">
                                <div class="title">${task.name} <span class="badge badge-${status_class} float-right">${task.extra.priority}</span></div>
                                <div class="subtitle">

                                    <b><?php echo e(__('Stage')); ?> : </b> ${task.extra.stage}<br>
                                    <b><?php echo e(__('Duration')); ?> : </b> ${task.extra.duration}<br>
                                    <b><?php echo e(__('Description')); ?> : </b> ${task.extra.description}

                                </div>
                            </div>
                          `;
            },
            on_click: function (task) {
            },
            on_date_change: function (task, start, end) {
                task_id = task.id;
                start = moment(start);
                end = moment(end);
                $.ajax({
                    url: "<?php echo e(route('task.gantt.chart.post')); ?>",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        start: start.format('YYYY-MM-DD HH:mm:ss'),
                        end: end.format('YYYY-MM-DD HH:mm:ss'),
                        task_id: task_id,
                    },
                    type: 'POST',
                    success: function (data) {

                    },
                    error: function (data) {
                        show_toastr('Error', '<?php echo e(__("Some Thing Is Wrong!")); ?>', 'error');
                    }
                });
            },
        });
        gantt.change_view_mode('<?php echo e($duration); ?>');
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Task Gantt Chart')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="page-header-title">
        <h4 class="m-b-10"><?php echo e(__('Task Gantt Chart')); ?></h4>
    </div>
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
        <li class="breadcrumb-item "><a href="<?php echo e(route('task.index')); ?>"><?php echo e(__('Task')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Gantt Chart')); ?></li>
    </ul>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-btn'); ?>
    <a href="<?php echo e(route('task.index')); ?>" class="btn btn-sm btn-primary btn-icon m-1" title="<?php echo e(__('List View')); ?>">
        <i class="ti ti-list text-white"></i>
    </a>
    <a href="<?php echo e(route('task.grid')); ?>" class="btn btn-sm btn-primary btn-icon m-1" title="<?php echo e(__('Grid View')); ?>">
        <i class="ti ti-layout-grid text-white"></i>
    </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden ">
                <div class="card-header actions-toolbar">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <h6 class="d-inline-block mb-0"><?php echo e(__('Gantt Chart')); ?></h6>
                        </div>
                        <div class="col-sm-6 text-end">
                            <a href="<?php echo e(route('task.gantt.chart','Quarter Day')); ?>" class="btn btn-xs btn-primary gantt-chart-mode  <?php if($duration == 'Quarter Day'): ?>active <?php endif; ?>" data-value="Quarter Day"><?php echo e(__('Quarter Day')); ?></a>
                            <a href="<?php echo e(route('task.gantt.chart','Half Day')); ?>" class="btn btn-xs btn-primary gantt-chart-mode <?php if($duration == 'Half Day'): ?>active <?php endif; ?>" data-value="Half Day"><?php echo e(__('Half Day')); ?></a>
                            <a href="<?php echo e(route('task.gantt.chart','Day')); ?>" class="btn btn-xs btn-primary gantt-chart-mode <?php if($duration == 'Day'): ?>active <?php endif; ?>" data-value="Day"><?php echo e(__('Day')); ?></a>
                            <a href="<?php echo e(route('task.gantt.chart','Week')); ?>" class="btn btn-xs btn-primary gantt-chart-mode <?php if($duration == 'Week'): ?>active <?php endif; ?>" data-value="Week"><?php echo e(__('Week')); ?></a>
                            <a href="<?php echo e(route('task.gantt.chart','Month')); ?>" class="btn btn-xs btn-primary gantt-chart-mode <?php if($duration == 'Month'): ?>active <?php endif; ?>" data-value="Month"><?php echo e(__('Month')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <svg id="gantt"></svg>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/task/ganttChart.blade.php ENDPATH**/ ?>