
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">

<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Settings')); ?></h1>
    <ul>
        <li><a href="/settings/permissions"><?php echo e(__('translate.Permissions')); ?></a></li>
        <li><?php echo e(__('translate.Settings')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_Permissions_list">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header text-right bg-transparent">

                <a class="btn btn-primary btn-md m-1" href="<?php echo e(route('permissions.create')); ?>"><i
                        class="i-Add text-white mr-2"></i> <?php echo e(__('translate.Create')); ?></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="ul-contact-list" class="display table">
                        <thead>
                            <tr>
                                <th><?php echo e(__('translate.Role_Name')); ?></th>
                                <th><?php echo e(__('translate.Description')); ?></th>
                                <th><?php echo e(__('translate.Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($role->name); ?></td>
                                <td><?php echo e($role->description); ?></td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('group_permission')): ?>
                                <?php if($role->id === 1 || $role->id === 2 || $role->id === 3): ?>
                                <td><?php echo e(__('translate.Cannot_change_Default_Permissions')); ?></td>
                                <?php else: ?>
                                <td>
                                    <a href="/settings/permissions/<?php echo e($role->id); ?>/edit"
                                        class="ul-link-action text-success" data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a @click="Remove_role( <?php echo e($role->id); ?>)" class="ul-link-action text-danger mr-1"
                                        data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="i-Close-Window"></i>
                                    </a>
                                </td>
                                <?php endif; ?>
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

<?php $__env->startSection('page-js'); ?>

<script src="<?php echo e(asset('assets/js/vendor/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.script.js')); ?>"></script>


<script>
    var app = new Vue({
        el: '#section_Permissions_list',
        data: {
            SubmitProcessing:false,
            errors:[],
        },
       
        methods: {

             //--------------------------------- Remove Role ---------------------------\\
             Remove_role(id) {

                swal({
                    title: '<?php echo e(__('translate.Are_you_sure')); ?>',
                    text: '<?php echo e(__('translate.You_wont_be_able_to_revert_this')); ?>',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#0CC27E',
                    cancelButtonColor: '#FF586B',
                    confirmButtonText: '<?php echo e(__('translate.Yes_delete_it')); ?>',
                    cancelButtonText: '<?php echo e(__('translate.No_cancel')); ?>',
                    confirmButtonClass: 'btn btn-primary mr-5',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: false
                }).then(function () {
                        axios
                            .delete("/settings/permissions/" + id)
                            .then(() => {
                                window.location.href = '/settings/permissions'; 
                                toastr.success('<?php echo e(__('translate.Deleted_in_successfully')); ?>');

                            })
                            .catch(() => {
                                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                            });
                    });
                },





           
        },
        //-----------------------------Autoload function-------------------
        created() {
        }

    })

</script>

<script type="text/javascript">
    $(function () {
      "use strict";

        $('#ul-contact-list').DataTable( {
            "processing": true, // for show progress bar
            "responsive": true,
            dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'f><'col-sm-12 col-md-4'B>>rtip",
            buttons: [
                'csv', 'excel', 'pdf', 'print','colvis'
            ]
        });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/settings/permissions/permissions_list.blade.php ENDPATH**/ ?>