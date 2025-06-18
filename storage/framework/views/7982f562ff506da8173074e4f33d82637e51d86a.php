
<?php $__env->startSection('main-content'); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Dashboard')); ?></h1>

</div>

<div class="separator-breadcrumb border-top"></div>

<div id="section_Dashboard_employee">

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <!-- ICON BG -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card o-hidden mb-4">
                        <div class="card-header  border-0">
                            <?php if(!$punch_in): ?>
                            <span class="float-left card-title m-0"><?php echo e(__('translate.No_Shift_Today')); ?></span>
                            <?php else: ?>
                            <span class="clock_in float-left card-title m-0"><?php echo e($punch_in); ?> - <?php echo e($punch_out); ?></span>
                            <?php endif; ?>

                            <form method="post" action="<?php echo e(route('attendance_by_employee.post',$employee->id)); ?>"
                                accept-charset="utf-8">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($punch_in); ?>" id="punch_in" name="office_punch_in">
                                <input type="hidden" value="<?php echo e($punch_out); ?>" id="punch_out" name="office_punch_out">
                                <input type="hidden" value="" id="in_out" name="in_out_value">
                                <?php if(!$employee_attendance || $employee_attendance->clock_in_out == 0): ?>
                                <button type="submit"
                                    class="btn btn-primary btn-rounded btn-md m-1 text-right float-right"><i
                                        class="i-Arrow-UpinCircle text-white mr-2"></i>
                                    <?php echo e(__('translate.Punch_In')); ?></button>
                                <?php else: ?>
                                <button type="submit"
                                    class="btn btn-danger btn-rounded btn-md m-1 text-right float-right"><i
                                        class="i-Arrow-DowninCircle text-white mr-2"></i>
                                    <?php echo e(__('translate.Punch_Out')); ?></button>
                                <?php endif; ?>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Dropbox"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo e(__('translate.Projects')); ?></p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($count_projects); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Check"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo e(__('translate.Tasks')); ?></p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($count_tasks); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Gift-Box"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo e(__('translate.Awards')); ?></p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($count_awards); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4">
                        <div class="card-body text-center">
                            <i class="i-Letter-Open"></i>
                            <div class="content">
                                <p class="text-muted mt-2 mb-0"><?php echo e(__('translate.Announcements')); ?></p>
                                <p class="text-primary text-24 line-height-1 mb-2"><?php echo e($count_announcement); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"><?php echo e(__('translate.Leave_taken_vs_remaining')); ?></div>
                    <div id="echart_leave"></div>
                </div>
            </div>
        </div>


    </div>


    <div class="row">

        <div class="col-lg-6 col-sm-12">
            <div class="card o-hidden mb-4">
                <div class="card-header d-flex align-items-center border-0">
                    <h3 class="float-left card-title m-0"><?php echo e(__('translate.Latest_Assigned_Projects')); ?></h3>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="user_table" class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('translate.Project')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Client')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Status')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Progress')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $latest_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($latest_project->title); ?></td>
                                    <td><?php echo e($latest_project->client->username); ?></td>
                                    <td>
                                        <?php if($latest_project->status == 'completed'): ?>
                                        <span class="badge badge-success m-2"><?php echo e(__('translate.Completed')); ?></span>
                                        <?php elseif($latest_project->status == 'not_started'): ?>
                                        <span class="badge badge-warning m-2"><?php echo e(__('translate.Not_Started')); ?></span>
                                        <?php elseif($latest_project->status == 'progress'): ?>
                                        <span class="badge badge-primary m-2"><?php echo e(__('translate.In_Progress')); ?></span>
                                        <?php elseif($latest_project->status == 'cancelled'): ?>
                                        <span class="badge badge-danger m-2"><?php echo e(__('translate.Cancelled')); ?></span>
                                        <?php elseif($latest_project->status == 'hold'): ?>
                                        <span class="badge badge-secondary m-2"><?php echo e(__('translate.On_Hold')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($latest_project->project_progress); ?> %</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-sm-12">
            <div class="card o-hidden mb-4">
                <div class="card-header d-flex align-items-center border-0">
                    <h3 class="float-left card-title m-0"><?php echo e(__('translate.Latest_Tasks')); ?></h3>
                </div>

                <div class="">
                    <div class="table-responsive">
                        <table id="user_table" class="table  text-center">
                            <thead>
                                <tr>
                                    <th scope="col"><?php echo e(__('translate.Task')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Project')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Status')); ?></th>
                                    <th scope="col"><?php echo e(__('translate.Progress')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $latest_tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($latest_task->title); ?></td>
                                    <td><?php echo e($latest_task->project->title); ?></td>
                                    <td>
                                        <?php if($latest_task->status == 'completed'): ?>
                                        <span class="badge badge-success m-2"><?php echo e(__('translate.Completed')); ?></span>
                                        <?php elseif($latest_task->status == 'not_started'): ?>
                                        <span class="badge badge-warning m-2"><?php echo e(__('translate.Not_Started')); ?></span>
                                        <?php elseif($latest_task->status == 'progress'): ?>
                                        <span class="badge badge-primary m-2"><?php echo e(__('translate.In_Progress')); ?></span>
                                        <?php elseif($latest_task->status == 'cancelled'): ?>
                                        <span class="badge badge-danger m-2"><?php echo e(__('translate.Cancelled')); ?></span>
                                        <?php elseif($latest_task->status == 'hold'): ?>
                                        <span class="badge badge-secondary m-2"><?php echo e(__('translate.On_Hold')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($latest_task->task_progress); ?> %</td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/js/vendor/echarts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/echart.options.min.js')); ?>"></script>

<script>
    let echartElemleave = document.getElementById('echart_leave');
        if (echartElemleave) {
            let echart_leave = echarts.init(echartElemleave);
            echart_leave.setOption({
                ...echartOptions.defaultOptions,
                ... {
                    legend: {
                        show: true,
                        bottom: 0,
                    },
                    series: [{
                        type: 'pie',
                        ...echartOptions.pieRing,
        
                        label: echartOptions.pieLabelCenterHover,
                        data: [{
                            name: 'Taken',
                            value: <?php echo json_encode($total_leave_taken, 15, 512) ?>,
                            itemStyle: {
                                color: '#663399',
                            }
                        }, {
                            name: 'remaining',
                            value: <?php echo json_encode($total_leave_remaining, 15, 512) ?>,
                            itemStyle: {
                                color: '#ced4da',
                            }
                        }]
                    }]
                }
            });
            $(window).on('resize', function() {
                setTimeout(() => {
                    echart_leave.resize();
                }, 500);
            });
        }
        
        
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.employee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/dashboard/dashboard_employee.blade.php ENDPATH**/ ?>