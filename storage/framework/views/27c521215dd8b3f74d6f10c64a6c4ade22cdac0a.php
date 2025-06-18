
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/dragula.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/drag.min.css')); ?>">

<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Kanban_View')); ?></h1>
    <ul>
        <li><a href="/tasks"><?php echo e(__('translate.Tasks')); ?></a></li>
        <li><?php echo e(__('translate.Kanban_View')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>
<div class='parent'>
    <div class="board-container">
        <div class="row">
            <div class="container-fluid">
                <div class='wrapper'>
                    
                    <div class="drag-area completed">
                        <div class="drag-area-card card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo e(__('translate.Completed')); ?>

                                </div>
                            </div>
                            <div class="drag-task card-body" data-column-id="completed" id="completed"
                                data-perfect-scrollbar data-suppress-scroll-x="true">
                                
                                <?php $__currentLoopData = $tasks_completed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_completed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box card  mb-4" data-id="<?php echo e($task_completed->id); ?>"
                                    id="<?php echo e($task_completed->id); ?>">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6><a href="/tasks/<?php echo e($task_completed->id); ?>">#<?php echo e($task_completed->id); ?>.
                                                        <?php echo e($task_completed->title); ?></a></h6>
                                                <p class="ul-task-manager__paragraph"><?php echo e($task_completed->summary); ?></p>
                                                <span class="badge badge-danger"><?php echo e(__('translate.Due')); ?>: <span
                                                        class="font-weight-semibold"><?php echo e($task_completed->end_date); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="drag-area in_progress">
                        <div class="drag-area-card card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo e(__('translate.In_Progress')); ?>

                                </div>
                            </div>
                            <div class="drag-task card-body" data-perfect-scrollbar data-suppress-scroll-x="true"
                                id="progress" data-column-id="progress">

                                
                                <?php $__currentLoopData = $tasks_in_progress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_in_progress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box card mb-4" data-id="<?php echo e($task_in_progress->id); ?>"
                                    id="<?php echo e($task_in_progress->id); ?>">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6><a href="/tasks/<?php echo e($task_in_progress->id); ?>">#<?php echo e($task_in_progress->id); ?>.
                                                        <?php echo e($task_in_progress->title); ?></a></h6>
                                                <p class="ul-task-manager__paragraph"><?php echo e($task_in_progress->summary); ?></p>
                                                <span class="badge badge-danger"><?php echo e(__('translate.Due')); ?>: <span
                                                        class="font-weight-semibold"><?php echo e($task_in_progress->end_date); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="drag-area not_started">
                        <div class="drag-area-card card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo e(__('translate.Not_Started')); ?>

                                </div>
                            </div>
                            <div class="drag-task card-body" data-perfect-scrollbar data-suppress-scroll-x="true"
                                id="not_started" data-column-id="not_started">
                                
                                <?php $__currentLoopData = $tasks_not_started; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_not_started): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box card mb-4" data-id="<?php echo e($task_not_started->id); ?>"
                                    id="<?php echo e($task_not_started->id); ?>">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6><a href="/tasks/<?php echo e($task_not_started->id); ?>">#<?php echo e($task_not_started->id); ?>.
                                                        <?php echo e($task_not_started->title); ?></a></h6>
                                                <p class="ul-task-manager__paragraph"><?php echo e($task_not_started->summary); ?></p>
                                                <span class="badge badge-danger"><?php echo e(__('translate.Due')); ?>: <span
                                                        class="font-weight-semibold"><?php echo e($task_not_started->end_date); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="drag-area cancelled">
                        <div class="drag-area-card card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo e(__('translate.Cancelled')); ?>

                                </div>
                            </div>
                            <div class="drag-task card-body" data-perfect-scrollbar data-suppress-scroll-x="true"
                                id="cancelled" data-column-id="cancelled">
                                
                                <?php $__currentLoopData = $tasks_cancelled; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_cancelled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box card mb-4" data-id="<?php echo e($task_cancelled->id); ?>"
                                    id="<?php echo e($task_cancelled->id); ?>">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6><a href="/tasks/<?php echo e($task_cancelled->id); ?>">#<?php echo e($task_cancelled->id); ?>.
                                                        <?php echo e($task_cancelled->title); ?></a></h6>
                                                <p class="ul-task-manager__paragraph"><?php echo e($task_cancelled->summary); ?></p>
                                                <span class="badge badge-danger"><?php echo e(__('translate.Due')); ?>: <span
                                                        class="font-weight-semibold"><?php echo e($task_cancelled->end_date); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>
                        </div>
                    </div>
                    

                    
                    <div class="drag-area hold">
                        <div class="drag-area-card card">
                            <div class="card-header">
                                <div class="card-title">
                                    <?php echo e(__('translate.On_Hold')); ?>

                                </div>
                            </div>
                            <div class="drag-task card-body" data-perfect-scrollbar data-suppress-scroll-x="true"
                                id="hold" data-column-id="hold">
                                
                                <?php $__currentLoopData = $tasks_hold; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task_hold): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="box card mb-4" data-id="<?php echo e($task_hold->id); ?>" id="<?php echo e($task_hold->id); ?>">
                                    <div class="card-body">
                                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                            <div>
                                                <h6><a href="/tasks/<?php echo e($task_hold->id); ?>">#<?php echo e($task_hold->id); ?>.
                                                        <?php echo e($task_hold->title); ?></a></h6>
                                                <p class="ul-task-manager__paragraph"><?php echo e($task_hold->summary); ?></p>
                                                <span class="badge badge-danger"><?php echo e(__('translate.Due')); ?>: <span
                                                        class="font-weight-semibold"><?php echo e($task_hold->end_date); ?></span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                

                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<script src="<?php echo e(asset('assets/js/dragula.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/drag.min.js')); ?>"></script>


<!-- Drag and Drop Plugin -->
<script type="text/javascript">
    $(function () {
      "use strict";

    var containers = [
        document.querySelector('#completed'),
        document.querySelector('#progress'),
        document.querySelector('#not_started'),
        document.querySelector('#cancelled'),
        document.querySelector('#hold')
    ];
    var drake = dragula({
            containers: containers,
            moves: function(el, source, handle, sibling) {
                if (el.classList.contains('move-disable')) {
                    return false;
                }

                return true; // elements are always draggable by default
            },
        })
        .on('drag', function(el) {
            el.className = el.className.replace('ex-moved', '');
        }).on('drop', function(el) {
            el.className += ' ex-moved';
        }).on('over', function(el, container) {
            container.className += ' ex-over';
        }).on('out', function(el, container) {
            container.className = container.className.replace('ex-over', '');
        });
    });

</script>

<script type="text/javascript">
    $(function () {
      "use strict";
      
    drake.on('drop', function(element, target, source, sibling) {
            $children = $("#"+target.id).children();
            var from_Column = $("#"+source.id).data('column-id');
            var new_status = $("#"+target.id).data('column-id');
            var task_id = $("#"+element.id).data('id');
            let _token = $('input[name="_token"]').val();
            $.ajax({
                url: "<?php echo e(route('task_change_status')); ?>",
                type:"POST",
                data:{
                    task_id:task_id,
                    status:new_status,
                    _token: _token
                },
                success:function(response){
                    if(response) {
                        toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                    }
                },
                error: function(error) {
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                }
            });
        });
    });
                
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/task/kanban_task.blade.php ENDPATH**/ ?>