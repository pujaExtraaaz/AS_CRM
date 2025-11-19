<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Report')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
        <?php echo e(__('Report')); ?> <?php echo e('('. $report->name .')'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item"><a href="<?php echo e(route('report.index')); ?>"><?php echo e(__('Report')); ?></a></li>
    <li class="breadcrumb-item"><?php echo e(__('Show')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('action-btn'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Edit Report')): ?>
    <div class="action-btn ms-2">
        <a href="<?php echo e(route('report.edit',$report->id)); ?>" class="btn btn-sm btn-info btn-icon m-1" data-title="<?php echo e(__('Report Edit')); ?>"data-bs-toggle="tooltip" title="<?php echo e(__('Edit')); ?>"><i class="ti ti-edit"></i>
        </a>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="cardcard-body">
                    <div class="collapse show float-end" id="collapseExample" style="">
                        <?php echo e(Form::open(array('route' => array('report.show',$report->id),'method'=>'get'))); ?>

                        <div class="row filter-css">
                            <div class="col-auto">
                                <?php echo e(Form::date('start_date',isset($_GET['start_date'])?$_GET['start_date']:'',array('class'=>'form-control datepicker'))); ?>

                            </div>
                            <div class="col-auto">
                                <?php echo e(Form::date('end_date',isset($_GET['end_date'])?$_GET['end_date']:'',array('class'=>'form-control datepicker'))); ?>

                            </div>
                            <div class="action-btn bg-primary ms-2">
                            <div class="col-auto">
                                <button type="submit" class="mx-3 btn btn-sm align-items-center text-white" data-bs-toggle="tooltip" data-title="<?php echo e(__('Apply')); ?>" title="<?php echo e(__('Apply')); ?>"><i class="ti ti-search"></i></button>
                            </div>
                            </div>
                            <div class="action-btn bg-danger ms-2">
                            <div class="col-auto">
                                <a href="<?php echo e(route('report.show',$report->id)); ?>" data-bs-toggle="tooltip" data-title="<?php echo e(__('Reset')); ?>" title="<?php echo e(__('Reset')); ?>" class="mx-3 btn btn-sm align-items-center text-white"><i class="ti ti-trash-off"></i></a>
                            </div>
                            </div>
                            <div class="action-btn bg-primary ms-2">
                            <div class="col-auto ">
                                <a href="#" onclick="saveAsPDF();" class="mx-3 btn btn-sm align-items-center text-white" data-bs-toggle="tooltip" data-title="<?php echo e(__('Download')); ?>"title="<?php echo e(__('Download')); ?>" id="download-buttons">
                                    <i class="ti ti-download"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="printableArea">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <dl class="row">

                            <?php if(!empty($report['startDateRange']) || $report['endDateRange']): ?>
                                <input type="hidden" value="<?php echo e($report['name'].' '.__('Report of').' '.$report['startDateRange'].' to '.$report['endDateRange']); ?>" id="filesname">
                            <?php else: ?>
                                <input type="hidden" value="<?php echo e($report['name'].' '.__('Report')); ?>" id="filesname">
                            <?php endif; ?>
                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Name')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e($report->name); ?></span></dd>

                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Entity Type')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e(ucfirst($report->entity_type)); ?></span></dd>

                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Assigned User')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e(!empty($report->assign_user)?$report->assign_user->name:''); ?></span></dd>


                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Group By')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm">

                        <td>
                             <span class="badge bg-success p-2 px-3 rounded">
                            <?php if($report->entity_type == 'users'): ?>
                                     <?php echo e(__(\App\Models\Report::$users[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'quotes'): ?>
                                     <?php echo e(__(\App\Models\Report::$quotes[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'accounts'): ?>
                                     <?php echo e(__(\App\Models\Report::$accounts[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'contacts'): ?>
                                     <?php echo e(__(\App\Models\Report::$contacts[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'leads'): ?>
                                     <?php echo e(__(\App\Models\Report::$leads[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'opportunities'): ?>
                                     <?php echo e(__(\App\Models\Report::$opportunities[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'invoices'): ?>
                                     <?php echo e(__(\App\Models\Report::$invoices[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'cases'): ?>
                                     <?php echo e(__(\App\Models\Report::$cases[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'products'): ?>
                                     <?php echo e(__(\App\Models\Report::$products[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'tasks'): ?>
                                     <?php echo e(__(\App\Models\Report::$tasks[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'calls'): ?>
                                     <?php echo e(__(\App\Models\Report::$calls[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'campaigns'): ?>
                                     <?php echo e(__(\App\Models\Report::$campaigns[$report->group_by])); ?>

                                 <?php elseif($report->entity_type == 'sales_orders'): ?>
                                     <?php echo e(__(\App\Models\Report::$sales_orders[$report->group_by])); ?>

                                 <?php else: ?>
                                     <?php echo e(__(\App\Models\Report::$users[$report->group_by])); ?>

                                 <?php endif; ?>
                            </span>
                        </td></span></dd>

                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Chart Type')); ?></span></dt>
                            <dd class="col-sm-3">
                            <span class="text-sm">
                            <?php if($report->chart_type == 0): ?>
                                    <span><?php echo e(__(\App\Models\Report::$chart_type[$report->chart_type])); ?></span>
                                <?php endif; ?>
                            </span>
                            </dd>

                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Created')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e(\Auth::user()->dateFormat($report->created_at)); ?></span></dd>

                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Report')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e(ucfirst($entity_type).' '.__('Summary')); ?></span></dd>
                            <?php if(!empty($report['startDateRange'] || $report['endDateRange'] )): ?>
                            <dt class="col-sm-1"><span class="h6 text-sm mb-0"><?php echo e(__('Duration')); ?></span></dt>
                            <dd class="col-sm-3"><span class="text-sm"><?php echo e($report['startDateRange'] .' '. 'to' . ' '.  $report['endDateRange']); ?></span></dd>
                            <?php endif; ?>
                        </dl>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">
                    <div class="float-end">
                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Refferals"><i
                                class="ti ti-info-circle"></i></a>
                    </div>
                    <h5><?php echo e(__('Chart')); ?></h5>
                </div>
                <div class="card-body" style="<?php if($report->chart_type == 'pie'): ?> align-self: center;<?php endif; ?>">

                    <div id="report-chart" data-color="primary" ></div>
                    <?php if($report->chart_type == 'pie'): ?>
                    <div class="col-6 ">
                        <div class="row mt-3">
                                
                        </div>

                    <?php endif; ?>
                </div>
                </div>
            </div>
        </div>



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div>
                        <button class="btn btn-light-primary btn-sm csv">Export CSV</button>
                        
                        <button class="btn btn-light-primary btn-sm txt">Export TXT</button>

                    </div>
                    <div class="table-responsive mt-3">
                        <table class="table" id="pc-dt-export">
                            <thead>
                                <tr>
                                    <th scope="col" class="sort" data-sort="name">#</th>
                                    <th scope="col" class="sort" data-sort="budget"><?php echo e(__('Total')); ?></th>
                                </tr>
                            </thead>
                            <tbody>


                               <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <?php if($entity_type == 'users'): ?>
                                        <?php ( $groupBy = $group_by . '_name'); ?>
                                        <td>
                                            
                                            <?php echo e($result[$groupBy]); ?>

                                        </td>
                                        <?php else: ?>
                                        <?php ( $user = \App\Models\User::getIdByUser($result['user_id'])); ?>
                                        <td>

                                            <?php echo e(($user)?$user->name:'--'); ?>

                                            
                                        </td>
                                        <?php endif; ?>
                                        <td class="">
                                            <?php echo e($result['count']); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


<?php $__env->stopSection(); ?>
<?php $__env->startPush('script-page'); ?>





<script src="<?php echo e(asset('assets/js/plugins/simple-datatables.js')); ?>"></script>
<script>
    const table = new simpleDatatables.DataTable("#pc-dt-export");
    document.querySelector("button.csv").addEventListener("click", () => {
        table.export({
            type: "csv",
            download: true,
            lineDelimiter: "\n\n",
            columnDelimiter: ";"
        })
    })
    document.querySelector("button.txt").addEventListener("click", () => {
        table.export({
            type: "txt",
            download: true,
        })
    })
    document.querySelector("button.sql").addEventListener("click", () => {
        table.export({
            type: "sql",
            download: true,
            tableName: "export_table"
        })
    })

    document.querySelector("button.json").addEventListener("click", () => {
        table.export({
            type: "json",
            download: true,
            escapeHTML: true,
            space: 3
        })
    })
    document.querySelector("button.excel").addEventListener("click", () => {
        table.export({
            type: "excel",
            download: true,

        })
    })
        document.querySelector("button.pdf").addEventListener("click", () => {
        table.export({
            type: "pdf",
            download: true,


        })
    })
</script>

    <script type="text/javascript" src="<?php echo e(asset('js/html2pdf.bundle.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/jszip.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            var filename = $('#filename').val();
            setTimeout(function () {
                $('#reportTable').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'excelHtml5',
                            title: filename
                        }, {
                            extend: 'csvHtml5',
                            title: filename
                        }, {
                            extend: 'pdfHtml5',
                            title: filename
                        },
                    ],

                });
            }, 500);

        });
    </script>



    <script>
        var filename = $('#filesname').val();

        function saveAsPDF() {
            var element = document.getElementById('printableArea');
            var opt = {
                margin: 0.3,
                filename: filename,
                image: {type: 'jpeg', quality: 1},
                html2canvas: {scale: 4, dpi: 72, letterRendering: true},
                jsPDF: {unit: 'in', format: 'A2'}
            };
            html2pdf().set(opt).from(element).save();

        }
    </script>

    <script>
        var chart_type = '<?php echo e($report->chart_type); ?>';
        if (chart_type == 'bar_vertical' || chart_type == 'bar_horizontal') {
            if (chart_type == 'bar_vertical') {
                chart_type = 'bar';
                var types = false;
                    (function () {
                    var options = {
                    chart: {
                        height: 150,
                        type: 'bar',
                        toolbar: {
                            show: false
                        }
                    },
                    plotOptions: {
                        bar: {
                            columnWidth: '30%',
                            borderRadius: 10,
                            dataLabels: {
                                position: 'top',
                            },
                        }
                    },
                    colors: ["#51459d"],
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 1,
                        colors: ['#fff']
                    },
                    grid: {
                        strokeDashArray: 4,
                    },
                    series: [{
                            name: '<?php echo $entity_type; ?>',
                            data: <?php echo json_encode($record); ?>,
                        }],
                    xaxis: {
                        categories:  <?php echo json_encode($label); ?>,
                    },
                    title: {
                                text: '<?php echo ucfirst(str_replace('_', ' ', $group_by)); ?>'
                            },
                    };
                    var chart = new ApexCharts(document.querySelector("#report-chart"), options);
                    chart.render();
                    })();
            } else {
                chart_type = 'bar';
                var types = true;

                (function () {
        var options = {
            chart: {
                height: 300,
                type: 'bar',
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    borderRadius: 10,
                    dataLabels: {
                        position: 'top',
                    },
                }
            },
            colors: ["#3ec9d6"],
            dataLabels: {
                enabled: true,
                offsetX: -6,
                style: {
                    fontSize: '12px',
                    colors: ['#fff']
                }
            },
            stroke: {
                show: true,
                width: 1,
                colors: ['#fff']
            },
            grid: {
                strokeDashArray: 4,
            },
            series: [{
                            name: '<?php echo $entity_type; ?>',
                            data: <?php echo json_encode($record); ?>,
                        }],
            xaxis: {
                categories: <?php echo json_encode($label); ?>,
            },
            title: {
                                text: '<?php echo ucfirst(str_replace('_', ' ', $group_by)); ?>'
                            },
        };
        var chart = new ApexCharts(document.querySelector("#report-chart"), options);
        chart.render();
    })();

  }

            var WorkedHoursChart = (function () {
                var $chart = $('#report-chart');

                function init($this) {
                    var options = {
                        chart: {
                            width: '100%',
                            type: chart_type,
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                            shadow: {
                                enabled: false,
                            },
                        },
                        plotOptions: {
                            bar: {
                                horizontal: types,
                                columnWidth: '30%',
                                endingShape: 'rounded'
                            },
                        },
                        stroke: {
                            show: true,
                            width: 2,
                            colors: ['transparent']
                        },
                        series: [{
                            name: '<?php echo $entity_type; ?>',
                            data: <?php echo json_encode($record); ?>,
                        }],
                        xaxis: {
                            labels: {

                                style: {
                                    colors: PurposeStyle.colors.gray[600],
                                    fontSize: '14px',
                                    fontFamily: PurposeStyle.fonts.base,
                                    cssClass: 'apexcharts-xaxis-label',
                                },
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: true,
                                borderType: 'solid',
                                color: PurposeStyle.colors.gray[300],
                                height: 6,
                                offsetX: 0,
                                offsetY: 0
                            },
                            title: {
                                text: '<?php echo ucfirst(str_replace('_', ' ', $group_by)); ?>'
                            },
                            categories: <?php echo json_encode($label); ?>,
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    color: PurposeStyle.colors.gray[600],
                                    fontSize: '12px',
                                    fontFamily: PurposeStyle.fonts.base,
                                },
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: true,
                                borderType: 'solid',
                                color: PurposeStyle.colors.gray[300],
                                height: 6,
                                offsetX: 0,
                                offsetY: 0
                            }
                        },
                        fill: {
                            type: 'solid'
                        },
                        markers: {
                            size: 4,
                            opacity: 0.7,
                            strokeColor: "#fff",
                            strokeWidth: 3,
                            hover: {
                                size: 7,
                            }
                        },
                        grid: {
                            borderColor: PurposeStyle.colors.gray[300],
                            strokeDashArray: 5,
                        },
                        dataLabels: {
                            enabled: false
                        }
                    }
                    // Get data from data attributes
                    var dataset = $this.data().dataset,
                        labels = $this.data().labels,
                        color = $this.data().color,
                        height = $this.data().height,
                        type = $this.data().type;
                    // Inject synamic properties
                    options.colors = [
                        PurposeStyle.colors.theme[color]
                    ];
                    options.markers.colors = [
                        PurposeStyle.colors.theme[color]
                    ];
                    options.chart.height = height ? height : 350;
                    // Init chart
                    var chart = new ApexCharts($this[0], options);
                    // Draw chart
                    setTimeout(function () {
                        chart.render();
                    }, 300);
                }

                // Events
                if ($chart.length) {
                    $chart.each(function () {
                        init($(this));
                    });
                }
            })();
        }
        else if (chart_type == 'line') {
             var e = $("#report-chart");
            // !function (e) {
            //     var t = {
            //         chart: {width: "100%", zoom: {enabled: !1}, toolbar: {show: !1}, shadow: {enabled: !1}},
            //         stroke: {width: 6, curve: "smooth"},
            //         series: [{
            //             name: "<?php echo e(__('Order')); ?>",
            //             data: <?php echo json_encode($record); ?>}],
            //         xaxis: {labels: {format: "MMM", style: {colors: PurposeStyle.colors.gray[600], fontSize: "14px", fontFamily: PurposeStyle.fonts.base, cssClass: "apexcharts-xaxis-label"}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}, type: "text", categories:<?php echo json_encode($label); ?>},
            //         yaxis: {labels: {style: {color: PurposeStyle.colors.gray[600], fontSize: "12px", fontFamily: PurposeStyle.fonts.base}}, axisBorder: {show: !1}, axisTicks: {show: !0, borderType: "solid", color: PurposeStyle.colors.gray[300], height: 6, offsetX: 0, offsetY: 0}},
            //         fill: {type: "solid"},
            //         markers: {size: 4, opacity: .7, strokeColor: "#fff", strokeWidth: 3, hover: {size: 7}},
            //         grid: {borderColor: PurposeStyle.colors.gray[300], strokeDashArray: 5},
            //         dataLabels: {enabled: !1}
            //     }, a = (e.data().dataset, e.data().labels, e.data().color), n = e.data().height, o = e.data().type;
            //     t.colors = [PurposeStyle.colors.theme[a]], t.markers.colors = [PurposeStyle.colors.theme[a]], t.chart.height = n || 350, t.chart.type = o || "line";
            //     var i = new ApexCharts(e[0], t);
            //     setTimeout(function () {
            //         i.render()
            //     }, 300)
            // }($("#report-chart"));

            (function () {
        var options = {
            chart: {
                height: 350,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 2,
                curve: 'smooth'
            },
            series: [{
                name:"<?php echo e(__('Order')); ?>",
                data: <?php echo json_encode($record); ?>

            }],
            xaxis: {
                categories: ['Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
            },
            colors: ['#453b85'],

            grid: {
                strokeDashArray: 4,
            },
            legend: {
                show: false,
            },
            markers: {
                size: 4,
                colors: ['#453b85'],
                opacity: 0.9,
                strokeWidth: 2,
                hover: {
                    size: 7,
                }
            },
            yaxis: {
                tickAmount: 3,
                min: 10,
                max: 70,
            }
        };
        var chart = new ApexCharts(document.querySelector("#report-chart"), options);
        chart.render();
    })();





        }
        else {
            // var options = {
            //     series: <?php echo json_encode($record); ?>,
            //     chart: {
            //         width: 600,
            //         type: 'pie',
            //     },
            //     labels:<?php echo json_encode($label); ?>,
            //     responsive: [{
            //         breakpoint: 480,
            //         options: {
            //             chart: {
            //                 width: 200
            //             },
            //             legend: {
            //                 position: 'bottom',
            //             }
            //         }
            //     }]
            // };

            // var chart = new ApexCharts(document.querySelector("#report-chart"), options);
            // chart.render();


            (function () {
                var options = {
                    chart: {
                        height: 340,
                        width: 600,
                        type: 'donut',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '70%',
                            }
                        }
                    },
                    series:<?php echo json_encode($record); ?>,
                    colors: ["#CECECE", '#ffa21d', '#FF3A6E', '#3ec9d6', '#FF3A6E'],
                    labels:<?php echo json_encode($label); ?>,
                    legend: {
                        show: true
                    }
                };
                var chart = new ApexCharts(document.querySelector("#report-chart"), options);
                chart.render();
            })();
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\CRM\resources\views/report/view.blade.php ENDPATH**/ ?>