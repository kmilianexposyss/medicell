
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>


<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Edit_Permissions')); ?></h1>
    <ul>
        <li><a href="/settings/permissions"><?php echo e(__('translate.Permissions')); ?></a></li>
        <li><?php echo e(__('translate.Edit_Permissions')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<!-- begin::main-row -->
<div class="row" id="section_Permission_Edit">
    <div class="col-lg-12 mb-3">
        <div class="card">

            <!--begin::form-->
            <form @submit.prevent="Update_Permission()">
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6">
                            <label for="name" class="ul-form__label"><?php echo e(__('translate.Role_Name')); ?> <span
                                    class="field_required">*</span></label>
                            <input type="text" v-model="role.name" class="form-control" name="name" id="name"
                                placeholder="<?php echo e(__('translate.Enter_Role_Name')); ?>">
                            <span class="error" v-if="errors && errors.name">
                                {{ errors.name[0] }}
                            </span>
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="ul-form__label"><?php echo e(__('translate.Description')); ?></label>
                            <input type="text" v-model="role.description" class="form-control" name="description"
                                id="description" placeholder="<?php echo e(__('translate.Enter_Description')); ?>">
                        </div>
                    </div>



                    <div class="row">

                        <!--Employee -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Employee">
                                    <div class="card-header"><?php echo e(__('translate.Employee')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_details">
                                                    <span><?php echo e(__('translate.Details')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--User Managment -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_User">
                                    <div class="card-header"><?php echo e(__('translate.User_Managment')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="user_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="user_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="user_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="user_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Company -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Company">
                                    <div class="card-header"><?php echo e(__('translate.Company')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="company_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="company_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="company_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="company_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Department -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Department">
                                    <div class="card-header"><?php echo e(__('translate.Department')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="department_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="department_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="department_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="department_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Designation -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Designation">
                                    <div class="card-header"><?php echo e(__('translate.Designation')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="designation_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="designation_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="designation_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="designation_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Policy -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Policy">
                                    <div class="card-header"><?php echo e(__('translate.Policy')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="policy_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="policy_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="policy_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="policy_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Announcement -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Announcement">
                                    <div class="card-header"><?php echo e(__('translate.Announcement')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="announcement_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="announcement_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="announcement_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="announcement_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Office Shift -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Office_Shift">
                                    <div class="card-header"><?php echo e(__('translate.Office_Shift')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="office_shift_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="office_shift_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="office_shift_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="office_shift_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Event -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Events">
                                    <div class="card-header"><?php echo e(__('translate.Event')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="event_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="event_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="event_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="event_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Holiday -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Holiday">
                                    <div class="card-header"><?php echo e(__('translate.Holiday')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="holiday_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="holiday_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="holiday_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="holiday_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Award -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Award">
                                    <div class="card-header"><?php echo e(__('translate.Award')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="award_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="award_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="award_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="award_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="award_type">
                                                    <span><?php echo e(__('translate.Award_Type')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Complaint -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Complaint">
                                    <div class="card-header"><?php echo e(__('translate.Complaint')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="complaint_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="complaint_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="complaint_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="complaint_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Travel -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Travel">
                                    <div class="card-header"><?php echo e(__('translate.Travel')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="travel_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="travel_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="travel_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="travel_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="arrangement_type">
                                                    <span><?php echo e(__('translate.Arrangement_Type')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Attendance -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Attendance">
                                    <div class="card-header"><?php echo e(__('translate.Attendance')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="attendance_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="attendance_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="attendance_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="attendance_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Accounting -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Accounting">
                                    <div class="card-header"><?php echo e(__('translate.Accounting')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="account_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="account_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="account_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="account_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="payment_method">
                                                    <span><?php echo e(__('translate.Payment_Method')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Deposit -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Deposit">
                                    <div class="card-header"><?php echo e(__('translate.Deposit')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_category">
                                                    <span><?php echo e(__('translate.Deposit_Category')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Expense -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Expense">
                                    <div class="card-header"><?php echo e(__('translate.Expense')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_category">
                                                    <span><?php echo e(__('translate.Expense_Category')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Client -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Client">
                                    <div class="card-header"><?php echo e(__('translate.Client')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="client_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="client_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="client_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="client_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Project">
                                    <div class="card-header"><?php echo e(__('translate.Project')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_details">
                                                    <span><?php echo e(__('translate.Project_details')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Task -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Task">
                                    <div class="card-header"><?php echo e(__('translate.Task')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_details">
                                                    <span><?php echo e(__('translate.Task_details')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="kanban_task">
                                                    <span><?php echo e(__('translate.Kanban_View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Leave -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Leave">
                                    <div class="card-header"><?php echo e(__('translate.Leave')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="leave_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="leave_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="leave_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="leave_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="leave_type">
                                                    <span><?php echo e(__('translate.leave_type')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Training -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Training">
                                    <div class="card-header"><?php echo e(__('translate.Training')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="training_view">
                                                    <span><?php echo e(__('translate.View')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="training_add">
                                                    <span><?php echo e(__('translate.Create')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="training_edit">
                                                    <span><?php echo e(__('translate.Edit')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="training_delete">
                                                    <span><?php echo e(__('translate.Delete')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="trainer">
                                                    <span><?php echo e(__('translate.Trainer')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="training_skills">
                                                    <span><?php echo e(__('translate.Training_Skills')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Settings -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Settings">
                                    <div class="card-header"><?php echo e(__('translate.Settings')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="settings">
                                                    <span><?php echo e(__('translate.System_Settings')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="module_settings">
                                                    <span><?php echo e(__('translate.Module_settings')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="currency">
                                                    <span><?php echo e(__('translate.Currency')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions" value="backup">
                                                    <span><?php echo e(__('translate.Backup')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="group_permission">
                                                    <span><?php echo e(__('translate.Group_Permissions')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reports -->
                        <div class="col-md-4 mt-3">
                            <div class="card">
                                <div class="accordion" id="accordion_Reports">
                                    <div class="card-header"><?php echo e(__('translate.Reports')); ?></div>
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="attendance_report">
                                                    <span><?php echo e(__('translate.Attendance_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="employee_report">
                                                    <span><?php echo e(__('translate.Employee_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="project_report">
                                                    <span><?php echo e(__('translate.Project_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="task_report">
                                                    <span><?php echo e(__('translate.Task_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="expense_report">
                                                    <span><?php echo e(__('translate.Expense_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            
                                            <div class="col-md-12">
                                                <label class="checkbox checkbox-outline-primary">
                                                    <input type="checkbox" checked v-model="permissions"
                                                        value="deposit_report">
                                                    <span><?php echo e(__('translate.Deposit_Report')); ?></span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Module Inventory -->
                    <div class="col-md-8 mt-3" v-show="ModulesEnabled.includes('Inventory')">
                            <div class="card">
                                <div class="accordion" id="accordion_Inventory">
                                    <div class="card-header"><?php echo e(__('inventory::translate.Module_Inventory')); ?></div>
                                        <div class="card-body">
                                            <div class="row">

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="products_view">
                                                        <span><?php echo e(__('inventory::translate.view_products')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="products_add">
                                                        <span><?php echo e(__('inventory::translate.add_products')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="products_edit">
                                                        <span><?php echo e(__('inventory::translate.edit_products')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="products_delete">
                                                        <span><?php echo e(__('inventory::translate.delete_products')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                        value="barcode_view">
                                                        <span><?php echo e(__('inventory::translate.barcode')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                        value="category">
                                                        <span><?php echo e(__('inventory::translate.category')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                        value="brand">
                                                        <span><?php echo e(__('inventory::translate.brand')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                        value="unit">
                                                        <span><?php echo e(__('inventory::translate.unit')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                
                                                <div class="col-md-12">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                        value="warehouse">
                                                        <span><?php echo e(__('inventory::translate.warehouse')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                
                                                <hr>

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="adjustment_view">
                                                        <span><?php echo e(__('inventory::translate.adjustment_view')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                    <label class="checkbox checkbox-outline-primary">
                                                        <input type="checkbox" checked v-model="permissions"
                                                            value="adjustment_add">
                                                        <span><?php echo e(__('inventory::translate.adjustment_add')); ?></span>
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="adjustment_edit">
                                                            <span><?php echo e(__('inventory::translate.adjustment_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="adjustment_delete">
                                                            <span><?php echo e(__('inventory::translate.adjustment_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="transfer_view">
                                                            <span><?php echo e(__('inventory::translate.transfer_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="transfer_add">
                                                            <span><?php echo e(__('inventory::translate.transfer_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="transfer_edit">
                                                            <span><?php echo e(__('inventory::translate.transfer_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="transfer_delete">
                                                            <span><?php echo e(__('inventory::translate.transfer_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sales_view">
                                                            <span><?php echo e(__('inventory::translate.Sales_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sales_add">
                                                            <span><?php echo e(__('inventory::translate.Sales_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sales_edit">
                                                            <span><?php echo e(__('inventory::translate.Sales_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sales_delete">
                                                            <span><?php echo e(__('inventory::translate.Sales_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-12">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="shipment">
                                                            <span><?php echo e(__('inventory::translate.shipment')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchases_view">
                                                            <span><?php echo e(__('inventory::translate.Purchases_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchases_add">
                                                            <span><?php echo e(__('inventory::translate.Purchases_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchases_edit">
                                                            <span><?php echo e(__('inventory::translate.Purchases_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchases_delete">
                                                            <span><?php echo e(__('inventory::translate.Purchases_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>


                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="quotations_view">
                                                            <span><?php echo e(__('inventory::translate.Quotations_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>


                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="quotations_add">
                                                            <span><?php echo e(__('inventory::translate.Quotations_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>


                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="quotations_edit">
                                                            <span><?php echo e(__('inventory::translate.Quotations_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>


                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="quotations_delete">
                                                            <span><?php echo e(__('inventory::translate.Quotations_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>


                                                
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sale_returns_view">
                                                            <span><?php echo e(__('inventory::translate.Sale_Returns_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sale_returns_add">
                                                            <span><?php echo e(__('inventory::translate.Sale_Returns_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sale_returns_edit">
                                                            <span><?php echo e(__('inventory::translate.Sale_Returns_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sale_returns_delete">
                                                            <span><?php echo e(__('inventory::translate.Sale_Returns_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchase_returns_view">
                                                            <span><?php echo e(__('inventory::translate.Purchase_Returns_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchase_returns_add">
                                                            <span><?php echo e(__('inventory::translate.Purchase_Returns_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchase_returns_edit">
                                                            <span><?php echo e(__('inventory::translate.Purchase_Returns_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchase_returns_delete">
                                                            <span><?php echo e(__('inventory::translate.Purchase_Returns_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_sales_view">
                                                            <span><?php echo e(__('inventory::translate.payment_sales_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_sales_add">
                                                            <span><?php echo e(__('inventory::translate.payment_sales_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_sales_edit">
                                                            <span><?php echo e(__('inventory::translate.payment_sales_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_sales_delete">
                                                            <span><?php echo e(__('inventory::translate.payment_sales_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_purchases_view">
                                                            <span><?php echo e(__('inventory::translate.payment_purchases_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_purchases_add">
                                                            <span><?php echo e(__('inventory::translate.payment_purchases_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_purchases_edit">
                                                            <span><?php echo e(__('inventory::translate.payment_purchases_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                     
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_purchases_delete">
                                                            <span><?php echo e(__('inventory::translate.payment_purchases_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_returns_view">
                                                            <span><?php echo e(__('inventory::translate.payment_returns_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_returns_add">
                                                            <span><?php echo e(__('inventory::translate.payment_returns_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_returns_edit">
                                                            <span><?php echo e(__('inventory::translate.payment_returns_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_returns_delete">
                                                            <span><?php echo e(__('inventory::translate.payment_returns_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="suppliers_view">
                                                            <span><?php echo e(__('inventory::translate.Suppliers_view')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="suppliers_add">
                                                            <span><?php echo e(__('inventory::translate.Suppliers_add')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="suppliers_edit">
                                                            <span><?php echo e(__('inventory::translate.Suppliers_edit')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="suppliers_delete">
                                                            <span><?php echo e(__('inventory::translate.Suppliers_delete')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                    <hr>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="sale_reports">
                                                            <span><?php echo e(__('inventory::translate.sale_reports')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="purchase_reports">
                                                            <span><?php echo e(__('inventory::translate.purchase_reports')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                      
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_sale_reports">
                                                            <span><?php echo e(__('inventory::translate.payment_sale_reports')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                       
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_purchase_reports">
                                                            <span><?php echo e(__('inventory::translate.payment_purchase_reports')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                       
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="payment_return_reports">
                                                            <span><?php echo e(__('inventory::translate.payment_return_reports')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>

                                                       
                                                <div class="col-md-6">
                                                        <label class="checkbox checkbox-outline-primary">
                                                            <input type="checkbox" checked v-model="permissions"
                                                                value="top_products_report">
                                                            <span><?php echo e(__('inventory::translate.top_products_report')); ?></span>
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                                <?php echo e(__('translate.Submit')); ?>

                            </button>
                            <div v-once class="typo__p" v-if="SubmitProcessing">
                                <div class="spinner spinner-primary mt-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- end::form -->
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js'); ?>


<script>
    var app = new Vue({
    el: '#section_Permission_Edit',
    data: {
        SubmitProcessing:false,
        errors:[],
        permissions: <?php echo json_encode($permissions, 15, 512) ?>,
        role: <?php echo json_encode($role, 15, 512) ?>,
        ModulesEnabled: <?php echo json_encode($ModulesEnabled, 15, 512) ?>,
       
    },
   
   
    methods: {

        //------------------------ Update Permissions ---------------------------\\
        Update_Permission() {
            var self = this;
            self.SubmitProcessing = true;
            axios.put("/settings/permissions/" + self.role.id, {
                name: self.role.name,
                description: self.role.description,
                permissions: self.permissions,
               
            }).then(response => {
                    self.SubmitProcessing = false;
                    window.location.href = '/settings/permissions'; 
                    toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                    self.errors = {};
            })
            .catch(error => {
                self.SubmitProcessing = false;
                if (error.response.status == 422) {
                    self.errors = error.response.data.errors;
                }
                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
            });
        },

     

    },
    //-----------------------------Autoload function-------------------
    created () {
      
    },

})

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/settings/permissions/edit_permission.blade.php ENDPATH**/ ?>