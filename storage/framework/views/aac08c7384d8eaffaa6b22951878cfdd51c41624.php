
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Employee')); ?></h1>
    <ul>
        <li><a href="/employee/overview"><?php echo e(__('translate.Overview')); ?></a></li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<!-- content goes here -->

<section class="ul-product-detail__tab" id="section_details_employee">
    <div class="row">

        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"><?php echo e(__('translate.Leave_taken_vs_remaining')); ?></div>
                    <div id="echart_leave"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"><?php echo e(__('translate.Projects_by_Status')); ?></div>
                    <div id="echart_Project"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-sm-12">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="card-title"><?php echo e(__('translate.Tasks_by_Status')); ?></div>
                    <div id="echart_employee_Task"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mt-4">
            <div class="card mt-2 mb-4 ">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active show" id="nav-basic-tab" data-toggle="tab"
                                href="#nav-basic" role="tab" aria-controls="nav-home"
                                aria-selected="true"><?php echo e(__('translate.Basic_Information')); ?></a>

                            <a class="nav-item nav-link" id="nav-document-tab" data-toggle="tab" href="#nav-document"
                                role="tab" aria-controls="nav-document"
                                aria-selected="false"><?php echo e(__('translate.Document')); ?></a>

                            <a class="nav-item nav-link" id="nav-social-tab" data-toggle="tab" href="#nav-social"
                                role="tab" aria-controls="nav-social"
                                aria-selected="false"><?php echo e(__('translate.Social_Media')); ?></a>
                            <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab"
                                href="#nav-experience" role="tab" aria-controls="nav-experience"
                                aria-selected="false"><?php echo e(__('translate.Experience')); ?></a>
                            <a class="nav-item nav-link" id="nav-bank-tab" data-toggle="tab" href="#nav-bank" role="tab"
                                aria-controls="nav-bank" aria-selected="false"><?php echo e(__('translate.Bank_Account')); ?></a>
                            <a class="nav-item nav-link" id="nav-leave-tab" data-toggle="tab" href="#nav-leave"
                                role="tab" aria-controls="nav-leave"
                                aria-selected="false"><?php echo e(__('translate.Leave')); ?></a>
                            <a class="nav-item nav-link" id="nav-award-tab" data-toggle="tab" href="#nav-award"
                                role="tab" aria-controls="nav-award"
                                aria-selected="false"><?php echo e(__('translate.Award')); ?></a>
                            <a class="nav-item nav-link" id="nav-complaint-tab" data-toggle="tab" href="#nav-complaint"
                                role="tab" aria-controls="nav-complaint"
                                aria-selected="false"><?php echo e(__('translate.Complaint')); ?></a>
                            <a class="nav-item nav-link" id="nav-travel-tab" data-toggle="tab" href="#nav-travel"
                                role="tab" aria-controls="nav-travel"
                                aria-selected="false"><?php echo e(__('translate.Travel')); ?></a>
                            <a class="nav-item nav-link" id="nav-training-tab" data-toggle="tab" href="#nav-training"
                                role="tab" aria-controls="nav-training"
                                aria-selected="false"><?php echo e(__('translate.Training')); ?> </a>
                            <a class="nav-item nav-link" id="nav-projects-tab" data-toggle="tab" href="#nav-projects"
                                role="tab" aria-controls="nav-projects"
                                aria-selected="false"><?php echo e(__('translate.Projects')); ?></a>
                            <a class="nav-item nav-link" id="nav-tasks-tab" data-toggle="tab" href="#nav-tasks"
                                role="tab" aria-controls="nav-tasks"
                                aria-selected="false"><?php echo e(__('translate.Tasks')); ?></a>
                        </div>
                    </nav>
                    <div class="tab-content ul-tab__content p-3" id="nav-tabContent">
                        
                        <div class="tab-pane fade active show" id="nav-basic" role="tabpanel"
                            aria-labelledby="nav-basic-tab">

                            <div class="row">
                                <!--begin::form-->
                                <form @submit.prevent="Update_Employee_Basic_Info()">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="FirstName"
                                                class="ul-form__label"><?php echo e(__('translate.FirstName')); ?> <span
                                                    class="field_required">*</span></label>
                                            <input type="text" class="form-control" id="FirstName"
                                                placeholder="<?php echo e(__('translate.Enter_FirstName')); ?>"
                                                v-model="employee.firstname">
                                            <span class="error" v-if="errors && errors.firstname">
                                                {{ errors.firstname[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="LastName" class="ul-form__label"><?php echo e(__('translate.LastName')); ?>

                                                <span class="field_required">*</span></label>
                                            <input type="text" class="form-control" id="LastName"
                                                placeholder="<?php echo e(__('translate.Enter_LastName')); ?>"
                                                v-model="employee.lastname">
                                            <span class="error" v-if="errors && errors.lastname">
                                                {{ errors.lastname[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="ul-form__label"><?php echo e(__('translate.Gender')); ?> <span
                                                    class="field_required">*</span></label>
                                            <v-select @input="Selected_Gender"
                                                placeholder="<?php echo e(__('translate.Choose_Gender')); ?>"
                                                v-model="employee.gender" :reduce="(option) => option.value" :options="
                                                                    [
                                                                        {label: 'Male', value: 'male'},
                                                                        {label: 'Female', value: 'female'},
                                                                    ]">
                                            </v-select>

                                            <span class="error" v-if="errors && errors.gender">
                                                {{ errors.gender[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="ul-form__label"><?php echo e(__('translate.Family_status')); ?> </label>
                                            <v-select @input="Selected_Family_status"
                                                placeholder="<?php echo e(__('translate.Choose_status')); ?>"
                                                v-model="employee.marital_status" :reduce="(option) => option.value"
                                                :options="
                                                    [
                                                        {label: 'Married', value: 'married'},
                                                        {label: 'Single', value: 'single'},
                                                        {label: 'Divorced', value: 'divorced'},
                                                    ]">
                                            </v-select>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label class="ul-form__label"
                                                for="picker3"><?php echo e(__('translate.Birth_date')); ?></label>

                                            <vuejs-datepicker id="birth_date" name="birth_date"
                                                placeholder="<?php echo e(__('translate.Enter_Birth_date')); ?>"
                                                v-model="employee.birth_date" input-class="form-control"
                                                format="yyyy-MM-dd"
                                                @closed="employee.birth_date=formatDate(employee.birth_date)">
                                            </vuejs-datepicker>

                                        </div>



                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4"
                                                class="ul-form__label"><?php echo e(__('translate.Email_Address')); ?> <span
                                                    class="field_required">*</span></label>
                                            <input type="email" class="form-control" id="inputtext4"
                                                placeholder="<?php echo e(__('translate.Enter_email_address')); ?>"
                                                v-model="employee.email">
                                            <span class="error" v-if="errors && errors.email">
                                                {{ errors.email[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="country" class="ul-form__label"><?php echo e(__('translate.Country')); ?>

                                                <span class="field_required">*</span></label>
                                            <input type="text" class="form-control" id="country"
                                                placeholder="<?php echo e(__('translate.Enter_Country')); ?>"
                                                v-model="employee.country">
                                            <span class="error" v-if="errors && errors.country">
                                                {{ errors.country[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="city" class="ul-form__label"><?php echo e(__('translate.City')); ?> </label>
                                            <input type="text" class="form-control" id="city"
                                                placeholder="<?php echo e(__('translate.Enter_City')); ?>" v-model="employee.city">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="province" class="ul-form__label"><?php echo e(__('translate.Province')); ?>

                                            </label>
                                            <input type="text" class="form-control" id="province"
                                                placeholder="<?php echo e(__('translate.Enter_Province')); ?>"
                                                v-model="employee.province">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="address"
                                                class="ul-form__label"><?php echo e(__('translate.Address')); ?></label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="<?php echo e(__('translate.Enter_Address')); ?>"
                                                v-model="employee.address">
                                            <span class="error" v-if="errors && errors.address">
                                                {{ errors.address[0] }}
                                            </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="zipcode"
                                                class="ul-form__label"><?php echo e(__('translate.Zip_code')); ?></label>
                                            <input type="text" class="form-control" id="zipcode"
                                                placeholder="<?php echo e(__('translate.Enter_zip_code')); ?>"
                                                v-model="employee.zipcode">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="phone"
                                                class="ul-form__label"><?php echo e(__('translate.Phone_Number')); ?><span
                                                    class="field_required">*</span></label>
                                            <input type="text" class="form-control" id="phone"
                                                placeholder="<?php echo e(__('translate.Enter_Phone_Number')); ?>"
                                                v-model="employee.phone">
                                            <span class="error" v-if="errors && errors.phone">
                                                {{ errors.phone[0] }}
                                            </span>
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
                                </form>
                                <!-- end::form -->
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-document" role="tabpanel" aria-labelledby="nav-document-tab">

                            <div class="row" id="section_document_list">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="New_Document"><i
                                                    class="i-Add text-white mr-2"></i>
                                                <?php echo e(__('translate.Add_Document')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Title')); ?></th>
                                                        <th><?php echo e(__('translate.Attachment')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($document->title); ?></td>
                                                        <td>
                                                            <a href="<?php echo e(asset('assets/employee/documents/'.$document->attachment)); ?>"
                                                                target="_blank">
                                                                <?php echo e($document->attachment); ?>

                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a @click="Edit_Document( <?php echo e($document); ?>)"
                                                                class="ul-link-action text-success"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                            <a @click="Remove_Document( <?php echo e($document->id); ?>)"
                                                                class="ul-link-action text-danger mr-1"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="i-Close-Window"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- Modal Add & Edit document -->
                                    <div class="modal fade" id="document_Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="document_Modal" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-if="edit_mode_document" class="modal-title">
                                                        <?php echo e(__('translate.Edit')); ?>

                                                    </h5>
                                                    <h5 v-else class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form
                                                        @submit.prevent="edit_mode_document?Update_document():Create_document()">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label for="title"
                                                                    class="ul-form__label"><?php echo e(__('translate.Title')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="document.title"
                                                                    class="form-control" name="title" id="title"
                                                                    placeholder="<?php echo e(__('translate.Enter_title')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_document && errors_document.title">
                                                                    {{ errors_document.title[0] }}
                                                                </span>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <label for="attachment"
                                                                    class="ul-form__label"><?php echo e(__('translate.Attachment')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input name="attachment" @change="change_Document"
                                                                    type="file" class="form-control" id="attachment">
                                                                <span class="error" v-if="errors && errors.attachment">
                                                                    {{ errors.attachment[0] }}
                                                                </span>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <label for="Description"
                                                                    class="ul-form__label"><?php echo e(__('translate.Description')); ?></label>
                                                                <textarea type="text" v-model="document.description"
                                                                    class="form-control" name="Description"
                                                                    id="Description"
                                                                    placeholder="<?php echo e(__('translate.Enter_Description')); ?>"></textarea>
                                                            </div>

                                                        </div>




                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    :disabled="Submit_Processing_document">
                                                                    <?php echo e(__('translate.Submit')); ?>

                                                                </button>
                                                                <div v-once class="typo__p"
                                                                    v-if="Submit_Processing_document">
                                                                    <div class="spinner spinner-primary mt-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-social" role="tabpanel" aria-labelledby="nav-social-tab">

                            <div class="row">
                                <!--begin::form-->
                                <form @submit.prevent="Update_Employee_social()">
                                    <div class="form-row ">
                                        <div class="form-group col-md-4">
                                            <label for="skype"
                                                class="ul-form__label"><?php echo e(__('translate.Skype')); ?></label>
                                            <input type="text" class="form-control" id="skype"
                                                placeholder="<?php echo e(__('translate.Enter_Skype')); ?>"
                                                v-model="employee.skype">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="Facebook" class="ul-form__label"><?php echo e(__('translate.Facebook')); ?>

                                            </label>
                                            <input type="text" class="form-control" id="Facebook"
                                                placeholder="<?php echo e(__('translate.Enter_Facebook')); ?>"
                                                v-model="employee.facebook">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="WhatsApp" class="ul-form__label"><?php echo e(__('translate.WhatsApp')); ?>

                                            </label>
                                            <input type="text" class="form-control" id="WhatsApp"
                                                placeholder="<?php echo e(__('translate.Enter_WhatsApp')); ?>"
                                                v-model="employee.whatsapp">

                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="LinkedIn" class="ul-form__label"><?php echo e(__('translate.LinkedIn')); ?>

                                            </label>
                                            <input type="text" class="form-control" id="LinkedIn"
                                                placeholder="<?php echo e(__('translate.Enter_LinkedIn')); ?>"
                                                v-model="employee.linkedin">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="Twitter" class="ul-form__label"><?php echo e(__('translate.Twitter')); ?>

                                            </label>
                                            <input type="text" class="form-control" id="Twitter"
                                                placeholder="<?php echo e(__('translate.Enter_Twitter')); ?>"
                                                v-model="employee.twitter">
                                        </div>

                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-primary"
                                                :disabled="Submit_Processing_social">
                                                <?php echo e(__('translate.Submit')); ?>

                                            </button>
                                            <div v-once class="typo__p" v-if="Submit_Processing_social">
                                                <div class="spinner spinner-primary mt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- end::form -->
                            </div>

                        </div>

                        
                        <div class="tab-pane fade" id="nav-experience" role="tabpanel"
                            aria-labelledby="nav-experience-tab">

                            <div class="row" id="section_Experience_list">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="New_Experience"><i
                                                    class="i-Add text-white mr-2"></i><?php echo e(__('translate.Add_Experience')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Title')); ?></th>
                                                        <th><?php echo e(__('translate.Company')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($experience->title); ?></td>
                                                        <td><?php echo e($experience->company_name); ?></td>
                                                        <td><?php echo e($experience->start_date); ?></td>
                                                        <td><?php echo e($experience->end_date); ?></td>
                                                        <td>
                                                            <a @click="Edit_Experience( <?php echo e($experience); ?>)"
                                                                class="ul-link-action text-success"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                            <a @click="Remove_Experience( <?php echo e($experience->id); ?>)"
                                                                class="ul-link-action text-danger mr-1"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="i-Close-Window"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- Modal Add & Edit Experience -->
                                    <div class="modal fade" id="Experience_Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="Experience_Modal" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-if="edit_mode_experience" class="modal-title">
                                                        <?php echo e(__('translate.Edit')); ?>

                                                    </h5>
                                                    <h5 v-else class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form
                                                        @submit.prevent="edit_mode_experience?Update_Experience():Create_Experience()">
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <label for="title"
                                                                    class="ul-form__label"><?php echo e(__('translate.Title')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="experience.title"
                                                                    class="form-control" name="title" id="title"
                                                                    placeholder="<?php echo e(__('translate.Enter_title')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_experience && errors_experience.title">
                                                                    {{ errors_experience.title[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label
                                                                    class="ul-form__label"><?php echo e(__('translate.Employment_type')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <v-select @input="Selected_Employment_type"
                                                                    placeholder="<?php echo e(__('translate.Select_Employment_type')); ?>"
                                                                    v-model="experience.employment_type"
                                                                    :reduce="label => label.value" :options="
                                                                    [
                                                                        {label: 'Full-time', value: 'full_time'},
                                                                        {label: 'Part-time', value: 'part_time'},
                                                                        {label: 'Self-employed', value: 'self_employed'},
                                                                        {label: 'Freelance', value: 'freelance'},
                                                                        {label: 'Contract', value: 'contract'},
                                                                        {label: 'Internship', value: 'internship'},
                                                                        {label: 'Apprenticeship', value: 'apprenticeship'},
                                                                        {label: 'Seasonal', value: 'seasonal'},
                                                                    ]">
                                                                </v-select>

                                                                <span class="error"
                                                                    v-if="errors_experience && errors_experience.employment_type">
                                                                    {{ errors_experience.employment_type[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="company_name"
                                                                    class="ul-form__label"><?php echo e(__('translate.Company_Name')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="experience.company_name"
                                                                    class="form-control" name="company_name"
                                                                    id="company_name"
                                                                    placeholder="<?php echo e(__('translate.Enter_Company_name')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_experience && errors_experience.company_name">
                                                                    {{ errors_experience.company_name[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="location"
                                                                    class="ul-form__label"><?php echo e(__('translate.Location')); ?></label>
                                                                <input type="text" v-model="experience.location"
                                                                    class="form-control" name="location" id="location"
                                                                    placeholder="<?php echo e(__('translate.Enter_Location')); ?>">

                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="start_date"
                                                                    class="ul-form__label"><?php echo e(__('translate.Start_Date')); ?>

                                                                    <span class="field_required">*</span></label>

                                                                <vuejs-datepicker id="start_date" name="start_date"
                                                                    placeholder="<?php echo e(__('translate.Enter_Start_date')); ?>"
                                                                    v-model="experience.start_date"
                                                                    input-class="form-control" format="yyyy-MM-dd"
                                                                    @closed="experience.start_date=formatDate(experience.start_date)">
                                                                </vuejs-datepicker>

                                                                <span class="error"
                                                                    v-if="errors_experience && errors_experience.start_date">
                                                                    {{ errors_experience.start_date[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label for="end_date"
                                                                    class="ul-form__label"><?php echo e(__('translate.Finish_Date')); ?>

                                                                    <span class="field_required">*</span></label>

                                                                <vuejs-datepicker id="end_date" name="end_date"
                                                                    placeholder="<?php echo e(__('translate.Enter_Finish_date')); ?>"
                                                                    v-model="experience.end_date"
                                                                    input-class="form-control" format="yyyy-MM-dd"
                                                                    @closed="experience.end_date=formatDate(experience.end_date)">
                                                                </vuejs-datepicker>

                                                                <span class="error"
                                                                    v-if="errors_experience && errors_experience.end_date">
                                                                    {{ errors_experience.end_date[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="Description"
                                                                    class="ul-form__label"><?php echo e(__('translate.Description')); ?></label>
                                                                <textarea type="text" v-model="experience.description"
                                                                    class="form-control" name="Description"
                                                                    id="Description"
                                                                    placeholder="<?php echo e(__('translate.Enter_description')); ?>"></textarea>
                                                            </div>

                                                        </div>


                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    :disabled="Submit_Processing_Experience">
                                                                    <?php echo e(__('translate.Submit')); ?>

                                                                </button>
                                                                <div v-once class="typo__p"
                                                                    v-if="Submit_Processing_Experience">
                                                                    <div class="spinner spinner-primary mt-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="New_Account"><i
                                                    class="i-Add text-white mr-2"></i><?php echo e(__('translate.Add_Account')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Bank_Name')); ?></th>
                                                        <th><?php echo e(__('translate.Bank_Branch')); ?></th>
                                                        <th><?php echo e(__('translate.Bank_No')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $accounts_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account_bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($account_bank->bank_name); ?></td>
                                                        <td><?php echo e($account_bank->bank_branch); ?></td>
                                                        <td><?php echo e($account_bank->account_no); ?></td>
                                                        <td>
                                                            <a @click="Edit_Account( <?php echo e($account_bank); ?>)"
                                                                class="ul-link-action text-success"
                                                                data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                            <a @click="Remove_Account( <?php echo e($account_bank->id); ?>)"
                                                                class="ul-link-action text-danger mr-1"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Delete">
                                                                <i class="i-Close-Window"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>

                                    <!-- Modal Add & Edit Account -->
                                    <div class="modal fade" id="Account_Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="Account_Modal" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 v-if="edit_mode_account" class="modal-title">
                                                        <?php echo e(__('translate.Edit')); ?></h5>
                                                    <h5 v-else class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form
                                                        @submit.prevent="edit_mode_account?Update_Account():Create_Account()">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label for="bank_name"
                                                                    class="ul-form__label"><?php echo e(__('translate.Bank_Name')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="account_bank.bank_name"
                                                                    class="form-control" name="bank_name" id="bank_name"
                                                                    placeholder="<?php echo e(__('translate.Enter_Bank_Name')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_bank && errors_bank.bank_name">
                                                                    {{ errors_bank.bank_name[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="bank_branch"
                                                                    class="ul-form__label"><?php echo e(__('translate.Bank_Branch')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="account_bank.bank_branch"
                                                                    class="form-control" name="bank_branch"
                                                                    id="bank_branch"
                                                                    placeholder="<?php echo e(__('translate.Enter_Bank_Branch')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_bank && errors_bank.bank_branch">
                                                                    {{ errors_bank.bank_branch[0] }}
                                                                </span>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="account_no"
                                                                    class="ul-form__label"><?php echo e(__('translate.Bank_Number')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <input type="text" v-model="account_bank.account_no"
                                                                    class="form-control" name="account_no"
                                                                    id="account_no"
                                                                    placeholder="<?php echo e(__('translate.Enter_Bank_Number')); ?>">
                                                                <span class="error"
                                                                    v-if="errors_bank && errors_bank.account_no">
                                                                    {{ errors_bank.account_no[0] }}
                                                                </span>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <label for="note"
                                                                    class="ul-form__label"><?php echo e(__('translate.Please_provide_any_details')); ?></label>
                                                                <textarea type="text" v-model="account_bank.note"
                                                                    class="form-control" name="note" id="note"
                                                                    placeholder="<?php echo e(__('translate.Please_provide_any_details')); ?>"></textarea>
                                                            </div>

                                                        </div>


                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    :disabled="Submit_Processing_Bank">
                                                                    <?php echo e(__('translate.Submit')); ?>

                                                                </button>
                                                                <div v-once class="typo__p"
                                                                    v-if="Submit_Processing_Bank">
                                                                    <div class="spinner spinner-primary mt-3"></div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        
                        <div class="tab-pane fade" id="nav-leave" role="tabpanel" aria-labelledby="nav-leave-tab">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="Request_Leave"><i
                                                    class="i-Add text-white mr-2"></i><?php echo e(__('translate.Request_Leave')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Leave_Type')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Days')); ?></th>
                                                        <th><?php echo e(__('translate.Status')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $leaves; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leave): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($leave->leave_type_title); ?></td>
                                                        <td><?php echo e($leave->start_date); ?></td>
                                                        <td><?php echo e($leave->end_date); ?></td>
                                                        <td><?php echo e($leave->days); ?></td>
                                                        <td><?php echo e($leave->status); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal Request_Leave -->
                                <div class="modal fade" id="Leave_Modal" tabindex="-1" role="dialog"
                                    aria-labelledby="Leave_Modal" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"><?php echo e(__('translate.Request_Leave')); ?></h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form @submit.prevent="Create_Leave()" enctype="multipart/form-data">

                                                    <div class="row">

                                                        <div class="form-group col-md-6">
                                                            <label
                                                                class="ul-form__label"><?php echo e(__('translate.leave_type')); ?>

                                                                <span class="field_required">*</span></label>
                                                            <v-select @input="Selected_Leave_Type"
                                                                placeholder="<?php echo e(__('translate.Choose_type')); ?>"
                                                                v-model="leave.leave_type_id"
                                                                :reduce="label => label.value"
                                                                :options="leave_types.map(leave_types => ({label: leave_types.title, value: leave_types.id}))">

                                                            </v-select>
                                                            <span class="error"
                                                                v-if="errors_leave && errors_leave.leave_type_id">
                                                                {{ errors_leave.leave_type_id[0] }}
                                                            </span>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="start_date"
                                                                class="ul-form__label"><?php echo e(__('translate.Start_Date')); ?>

                                                                <span class="field_required">*</span></label>

                                                            <vuejs-datepicker id="start_date" name="start_date"
                                                                placeholder="<?php echo e(__('translate.Enter_Start_date')); ?>"
                                                                v-model="leave.start_date" input-class="form-control"
                                                                format="yyyy-MM-dd"
                                                                @closed="leave.start_date=formatDate(leave.start_date)">
                                                            </vuejs-datepicker>

                                                            <span class="error"
                                                                v-if="errors_leave && errors_leave.start_date">
                                                                {{ errors_leave.start_date[0] }}
                                                            </span>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label for="end_date"
                                                                class="ul-form__label"><?php echo e(__('translate.Finish_Date')); ?>

                                                                <span class="field_required">*</span></label>

                                                            <vuejs-datepicker id="end_date" name="end_date"
                                                                placeholder="<?php echo e(__('translate.Enter_Finish_date')); ?>"
                                                                v-model="leave.end_date" input-class="form-control"
                                                                format="yyyy-MM-dd"
                                                                @closed="leave.end_date=formatDate(leave.end_date)">
                                                            </vuejs-datepicker>

                                                            <span class="error"
                                                                v-if="errors_leave && errors_leave.end_date">
                                                                {{ errors_leave.end_date[0] }}
                                                            </span>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="attachment"
                                                                class="ul-form__label"><?php echo e(__('translate.Attachment')); ?></label>
                                                            <input name="attachment" @change="change_Attachement_leave"
                                                                type="file" class="form-control" id="attachment">
                                                            <span class="error"
                                                                v-if="errors_leave && errors_leave.attachment">
                                                                {{ errors_leave.attachment[0] }}
                                                            </span>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="switch switch-primary mt-3">
                                                                <span><?php echo e(__('translate.half_day')); ?></span>
                                                                <input v-model="leave.half_day" type="checkbox"
                                                                    checked="">
                                                                <span class="slider"></span>
                                                            </label>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label for="reason"
                                                                class="ul-form__label"><?php echo e(__('translate.Leave_Reason')); ?>

                                                            </label>
                                                            <textarea type="text" v-model="leave.reason"
                                                                class="form-control" name="reason" id="reason"
                                                                placeholder="<?php echo e(__('translate.Enter_Reason_Leave')); ?>"></textarea>
                                                        </div>

                                                    </div>

                                                    <div class="row mt-3">

                                                        <div class="col-md-6">
                                                            <button type="submit" class="btn btn-primary"
                                                                :disabled="Submit_Processing_leave">
                                                                <?php echo e(__('translate.Submit')); ?>

                                                            </button>
                                                            <div v-once class="typo__p" v-if="Submit_Processing_leave">
                                                                <div class="spinner spinner-primary mt-3"></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </form>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-award" role="tabpanel" aria-labelledby="nav-award-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Award_Type')); ?></th>
                                                        <th><?php echo e(__('translate.Award_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Award_Gift')); ?></th>
                                                        <th><?php echo e(__('translate.Award_Cash')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($award->award_type_title); ?></td>
                                                        <td><?php echo e($award->date); ?></td>
                                                        <td><?php echo e($award->gift); ?></td>
                                                        <td><?php echo e($award->cash); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-complaint" role="tabpanel"
                            aria-labelledby="nav-complaint-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Complaint')); ?></th>
                                                        <th><?php echo e(__('translate.Company')); ?></th>
                                                        <th><?php echo e(__('translate.From_Employee')); ?></th>
                                                        <th><?php echo e(__('translate.Employee_against')); ?></th>
                                                        <th><?php echo e(__('translate.Date')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $complaints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $complaint): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($complaint->title); ?></td>
                                                        <td><?php echo e($complaint->company->name); ?></td>
                                                        <td><?php echo e($complaint->EmployeeFrom->username); ?></td>
                                                        <td><?php echo e($complaint->EmployeeAgainst->username); ?></td>
                                                        <td><?php echo e($complaint->date); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-travel" role="tabpanel" aria-labelledby="nav-travel-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Type')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Purpose_of_visit')); ?></th>
                                                        <th><?php echo e(__('translate.Expected_Budget')); ?></th>
                                                        <th><?php echo e(__('translate.Actual_Budget')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $travels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $travel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($travel->arrangement_type->title); ?></td>
                                                        <td><?php echo e($travel->start_date); ?></td>
                                                        <td><?php echo e($travel->end_date); ?></td>
                                                        <td><?php echo e($travel->visit_purpose); ?></td>
                                                        <td><?php echo e($travel->expected_budget); ?></td>
                                                        <td><?php echo e($travel->actual_budget); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-training" role="tabpanel" aria-labelledby="nav-training-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Trainer')); ?></th>
                                                        <th><?php echo e(__('translate.Training_Skill')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Training_Cost')); ?></th>
                                                        <th><?php echo e(__('translate.Status')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($training->trainer->name); ?></td>
                                                        <td><?php echo e($training->TrainingSkill->training_skill); ?></td>
                                                        <td><?php echo e($training->start_date); ?></td>
                                                        <td><?php echo e($training->end_date); ?></td>
                                                        <td><?php echo e($training->training_cost); ?></td>
                                                        <td>
                                                            <?php if($training->status): ?>
                                                            <span
                                                                class="badge badge-success m-2"><?php echo e(__('translate.Active')); ?></span>
                                                            <?php else: ?>
                                                            <span
                                                                class="badge badge-danger m-2"><?php echo e(__('translate.Inactive')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-projects" role="tabpanel" aria-labelledby="nav-projects-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Project')); ?></th>
                                                        <th><?php echo e(__('translate.Client')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Status')); ?></th>
                                                        <th><?php echo e(__('translate.Priority')); ?></th>
                                                        <th><?php echo e(__('translate.Progress')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($project->title); ?></td>
                                                        <td><?php echo e($project->client->username); ?></td>
                                                        <td><?php echo e($project->start_date); ?></td>
                                                        <td><?php echo e($project->end_date); ?></td>
                                                        <td>
                                                            <?php if($project->status == 'completed'): ?>
                                                            <span
                                                                class="badge badge-success m-2"><?php echo e(__('translate.Completed')); ?></span>
                                                            <?php elseif($project->status == 'not_started'): ?>
                                                            <span
                                                                class="badge badge-warning m-2"><?php echo e(__('translate.Not_Started')); ?></span>
                                                            <?php elseif($project->status == 'progress'): ?>
                                                            <span
                                                                class="badge badge-primary m-2"><?php echo e(__('translate.In_Progress')); ?></span>
                                                            <?php elseif($project->status == 'cancelled'): ?>
                                                            <span
                                                                class="badge badge-danger m-2"><?php echo e(__('translate.Cancelled')); ?></span>
                                                            <?php elseif($project->status == 'hold'): ?>
                                                            <span
                                                                class="badge badge-secondary m-2"><?php echo e(__('translate.On_Hold')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($project->priority); ?></td>
                                                        <td><?php echo e($project->project_progress); ?> %</td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="tab-pane fade" id="nav-tasks" role="tabpanel" aria-labelledby="nav-tasks-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                                >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Task')); ?></th>
                                                        <th><?php echo e(__('translate.Task')); ?></th>
                                                        <th><?php echo e(__('translate.Start_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Finish_Date')); ?></th>
                                                        <th><?php echo e(__('translate.Status')); ?></th>
                                                        <th><?php echo e(__('translate.Priority')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($task->title); ?></td>
                                                        <td><?php echo e($task->project->title); ?></td>
                                                        <td><?php echo e($task->start_date); ?></td>
                                                        <td><?php echo e($task->end_date); ?></td>
                                                        <td>
                                                            <?php if($task->status == 'completed'): ?>
                                                            <span
                                                                class="badge badge-success m-2"><?php echo e(__('translate.Completed')); ?></span>
                                                            <?php elseif($task->status == 'not_started'): ?>
                                                            <span
                                                                class="badge badge-warning m-2"><?php echo e(__('translate.Not_Started')); ?></span>
                                                            <?php elseif($task->status == 'progress'): ?>
                                                            <span
                                                                class="badge badge-primary m-2"><?php echo e(__('translate.In_Progress')); ?></span>
                                                            <?php elseif($task->status == 'cancelled'): ?>
                                                            <span
                                                                class="badge badge-danger m-2"><?php echo e(__('translate.Cancelled')); ?></span>
                                                            <?php elseif($task->status == 'hold'): ?>
                                                            <span
                                                                class="badge badge-secondary m-2"><?php echo e(__('translate.On_Hold')); ?></span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td><?php echo e($task->priority); ?></td>

                                                        <td>
                                                            <a @click="Change_status_task( <?php echo e($task); ?>)"
                                                                class="ul-link-action text-success"
                                                                data-toggle="tooltip" data-placement="top"
                                                                title="Change Status">
                                                                <i class="i-Edit"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                     <!-- Modal Change status task -->
                                     <div class="modal fade" id="task_status_Modal" tabindex="-1" role="dialog"
                                     aria-labelledby="task_status_Modal" aria-hidden="true">
                                     <div class="modal-dialog modal-md" role="document">
                                         <div class="modal-content">
                                             <div class="modal-header">
                                                 <h5 class="modal-title">
                                                     <?php echo e(__('translate.Edit')); ?>

                                                 </h5>
                                                 <button type="button" class="close" data-dismiss="modal"
                                                     aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                 </button>
                                             </div>
                                             <div class="modal-body">

                                                 <form @submit.prevent="Update_Task_status()">
                                                     <div class="row">
                                                         <div class="col-md-12">
                                                             <label
                                                                 class="ul-form__label"><?php echo e(__('translate.Status')); ?>

                                                                 <span class="field_required">*</span></label>
                                                             <v-select @input="Selected_Status"
                                                                 placeholder="<?php echo e(__('translate.Select_status')); ?>"
                                                                 v-model="task.status"
                                                                 :reduce="(option) => option.value" :options="
                                                                 [
                                                                     {label: 'Not Started', value: 'not_started'},
                                                                     {label: 'In Progress', value: 'progress'},
                                                                     {label: 'Cancelled', value: 'cancelled'},
                                                                     {label: 'On Hold', value: 'hold'},
                                                                     {label: 'Completed', value: 'completed'},
                                                                 ]">
                                                             </v-select>

                                                             <span class="error"
                                                                 v-if="errors_task && errors_task.status">
                                                                 {{ errors_task.status[0] }}
                                                             </span>
                                                         </div>
                                                     </div>

                                                     <div class="row mt-3">

                                                         <div class="col-md-6">
                                                             <button type="submit" class="btn btn-primary"
                                                                 :disabled="Submit_Processing_status_task">
                                                                 <?php echo e(__('translate.Submit')); ?>

                                                             </button>
                                                             <div v-once class="typo__p"
                                                                 v-if="Submit_Processing_status_task">
                                                                 <div class="spinner spinner-primary mt-3"></div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </form>

                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/js/vendor/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.script.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor/vuejs-datepicker/vuejs-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor/echarts.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/echart.options.min.js')); ?>"></script>
<script>
    Vue.component('v-select', VueSelect.VueSelect)
    var app = new Vue({
    el: '#section_details_employee',
    components: {
        vuejsDatepicker
    },
    data: {
        data: new FormData(),
        SubmitProcessing:false,
        editmode: false,
        errors:[],

        Submit_Processing_Bank:false,
        edit_mode_account:false,
        errors_bank:[],

        Submit_Processing_Experience:false,
        edit_mode_experience:false,
        errors_experience:[],

        Submit_Processing_social:false,
        errors_social:[],

        Submit_Processing_document:false,
        edit_mode_document: false,
        errors_document:[],


        Submit_Processing_leave:false,
        errors_leave:[],
        leave_types :[],

        Submit_Processing_status_task:false,
        errors_task:[],

        documents :<?php echo json_encode($documents, 15, 512) ?>,
        experiences :<?php echo json_encode($experiences, 15, 512) ?>,
        leaves :<?php echo json_encode($leaves, 15, 512) ?>,
        awards :<?php echo json_encode($awards, 15, 512) ?>,
        complaints :<?php echo json_encode($complaints, 15, 512) ?>,
        travels :<?php echo json_encode($travels, 15, 512) ?>,
        trainings :<?php echo json_encode($trainings, 15, 512) ?>,
        projects :<?php echo json_encode($projects, 15, 512) ?>,
        tasks :<?php echo json_encode($tasks, 15, 512) ?>,
        accounts_bank :<?php echo json_encode($accounts_bank, 15, 512) ?>,
        employee: <?php echo json_encode($employee, 15, 512) ?>,

        experience: {
            title: "",
            company_name:"",
            employment_type:"",
            location:"",
            start_date:"",
            end_date:"",
            description:"",
        }, 

        task: {
            status: "",
        },

        account_bank: {
            bank_name: "",
            bank_branch:"",
            account_no:"",
            note:"",
        }, 

        document: {
            title: "",
            description:"",
            attachment:"",
        },

        leave: {
            leave_type_id :"",
            start_date:"",
            end_date:"",
            days:"",
            reason:"",
            attachment:"",
            half_day:"",
        }, 
    },
   
   
    methods: {

        Selected_Status(value) {
            if (value === null) {
                this.task.status = "";
            }
        },

        Change_status_task(task) {
            this.task = task;
            $('#task_status_Modal').modal('show');
        },

          //------------------------ Update Task Status---------------------------\\
          Update_Task_status() {
            var self = this;
            self.Submit_Processing_status_task = true;
            axios.put("/session_employee/update_task_status/" + self.task.id, {
                status: self.task.status,
            }).then(response => {
                    self.Submit_Processing_status_task = false;
                    window.location.href = '/employee/overview'; 
                    toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                    self.errors_task = {};
            })
            .catch(error => {
                self.Submit_Processing_status_task = false;
                if (error.response.status == 422) {
                    self.errors_task = error.response.data.errors;
                }
                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
            });
        },

        Request_Leave() {
            this.reset_Form_leave();
            this.Get_leave_types();
            $('#Leave_Modal').modal('show');
        },

         //---------------------- Get_leave_types  ------------------------------\\
         Get_leave_types() {
            axios
                .get("/session_employee/Get_leave_types")
                .then(response => {
                    this.leave_types = response.data;
                })
                .catch(error => {
                    
                });
        },

        //----------------------------- Reset Form ---------------------------\\
        reset_Form_leave() {
                this.leave = {
                    id: "",
                    leave_type_id :"",
                    start_date:"",
                    end_date:"",
                    days:"",
                    reason:"",
                    attachment:"",
                    half_day:"",
                };
                this.errors_leave = {};
            },

            change_Attachement_leave(e){
                let file = e.target.files[0];
                this.leave.attachment = file;
            },

            Selected_Leave_Type(value) {
                if (value === null) {
                    this.leave.leave_type_id = "";
                }
            },

            //------------------------ Create Leave ---------------------------\\
            Create_Leave() {
                var self = this;
                self.Submit_Processing_leave = true;
                self.data.append("leave_type_id", self.leave.leave_type_id);
                self.data.append("start_date", self.leave.start_date);
                self.data.append("end_date", self.leave.end_date);
                self.data.append("reason", self.leave.reason);
                self.data.append("attachment", self.leave.attachment);
                self.data.append("half_day", self.leave.half_day?1:0);

                axios
                    .post("/session_employee/requestleave", self.data)
                    .then(response => {
                        if(response.data.isvalid == false){
                            self.Submit_Processing_leave = false;
                            self.errors_leave = {};
                            toastr.error('<?php echo e(__('translate.remaining_leaves_are_insufficient')); ?>');
                        }
                        else{
                            self.Submit_Processing_leave = false;
                            window.location.href = '/employee/overview'; 
                            toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                            self.errors_leave = {};
                        }
                })
                .catch(error => {
                    self.Submit_Processing_leave = false;
                    if (error.response.status == 422) {
                        self.errors_leave = error.response.data.errors;
                    }
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                });
            },




        //------------------------ Basic Information ---------------------------------------------------------------------------------------------\\

        formatDate(d){
            var m1 = d.getMonth()+1;
            var m2 = m1 < 10 ? '0' + m1 : m1;
            var d1 = d.getDate();
            var d2 = d1 < 10 ? '0' + d1 : d1;
            return [d.getFullYear(), m2, d2].join('-');
        },

        Selected_Gender(value) {
            if (value === null) {
                this.employee.gender = "";
            }
        },

        Selected_Family_status(value) {
            if (value === null) {
                this.employee.marital_status = "";
            }
        },


        //------------------------ Update Employee ---------------------------\\
        Update_Employee_Basic_Info() {
            var self = this;
            self.SubmitProcessing = true;
            axios.put("/session_employee/basic/info/" + self.employee.id, {
                firstname: self.employee.firstname,
                lastname: self.employee.lastname,
                country: self.employee.country,
                email: self.employee.email,
                gender: self.employee.gender,
                phone: self.employee.phone,
                birth_date: self.employee.birth_date,
                marital_status: self.employee.marital_status,
                city: self.employee.city,
                province: self.employee.province,
                address: self.employee.address,
                zipcode: self.employee.zipcode,
            }).then(response => {
                    self.SubmitProcessing = false;
                    window.location.href = '/employee/overview'; 
                    toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
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


        //------------------------ Nav Document ---------------------------------------------------------------------------------------------\\


        New_Document() {
                this.reset_Form_Document();
                this.edit_mode_document = false;
                $('#document_Modal').modal('show');
            },

            //------------------------------ Show Modal (Edit document) -------------------------------\\
            Edit_Document(document) {
                this.edit_mode_document = true;
                this.reset_Form_Document();
                this.document = document;
                $('#document_Modal').modal('show');
            },

              //----------------------------- reset_Form_Document---------------------------\\
              reset_Form_Document() {
                this.document = {
                    id: "",
                    title: "",
                    attachment:"",
                    description:"",
                };
                this.errors_document = {};
            },



            change_Document(e){
                let file = e.target.files[0];
                this.document.attachment = file;
            },

              //----------------------- Update document---------------------------\\
              Create_document() {
                var self = this;
                self.Submit_Processing_document = true;

                if (self.document.attachment) {
                    self.data.append("attachment", self.document.attachment);
                }
                self.data.append("employee_id", self.employee.id);
                self.data.append("title", self.document.title);
                self.data.append("description", self.document.description);

                axios
                    .post("/employee_document", self.data)
                    .then(response => {
                        self.Submit_Processing_document = false;
                        window.location.href = '/employees/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                        self.errors_document = {};
                    })
                    .catch(error => {
                        self.Submit_Processing_document = false;
                        if (error.response.status == 422) {
                            self.errors_document = error.response.data.errors;
                        }
                        toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                    });
            },

              //----------------------- Update document---------------------------\\
              Update_document(id) {
                var self = this;
                self.Submit_Processing_document = true;

                if (self.document.attachment) {
                    self.data.append("attachment", self.document.attachment);
                }
                self.data.append("employee_id", self.employee.id);
                self.data.append("title", self.document.title);
                self.data.append("description", self.document.description);
                self.data.append("_method", "put");

                axios
                    .post("/employee_document/" + self.document.id, self.data)
                    .then(response => {
                        self.Submit_Processing_document = false;
                        window.location.href = '/employees/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                        self.errors_document = {};
                    })
                    .catch(error => {
                        self.Submit_Processing_document = false;
                        if (error.response.status == 422) {
                            self.errors_document = error.response.data.errors;
                        }
                        toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                    });
            },


               //--------------------------------- Remove_Document ---------------------------\\
               Remove_Document(id) {

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
                            .delete("/employee_document/" + id)
                            .then(() => {
                                location.reload();
                                toastr.success('<?php echo e(__('translate.Deleted_in_successfully')); ?>');

                            })
                            .catch(() => {
                                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                            });
                    });
                },

        //------------------------ Work Experience ---------------------------------------------------------------------------------------------\\
       

            //------------------------------ Show Modal (Create Experience) -------------------------------\\
            New_Experience() {
                this.reset_Form_experience();
                this.edit_mode_experience = false;
                $('#Experience_Modal').modal('show');
            },

            //------------------------------ Show Modal (Edit Experience) -------------------------------\\
            Edit_Experience(experience) {
                this.edit_mode_experience = true;
                this.reset_Form_experience();
                this.experience = experience;
                $('#Experience_Modal').modal('show');
            },

            Selected_Employment_type (value) {
                if (value === null) {
                    this.experience.employment_type = "";
                }
            },

              //----------------------------- Reset_Form_experience---------------------------\\
              reset_Form_experience() {
                this.experience = {
                    id: "",
                    title: "",
                    company_name:"",
                    employment_type:"",
                    location:"",
                    start_date:"",
                    end_date:"",
                    description:"",
                };
                this.errors_experience = {};
            },

            //------------------------ Create Experience ---------------------------\\
            Create_Experience() {
                var self = this;
                self.Submit_Processing_Experience = true;
                axios.post("/session_employee/storeExperiance", {
                    title: self.experience.title,
                    company_name: self.experience.company_name,
                    location: self.experience.location,
                    employment_type: self.experience.employment_type,
                    start_date: self.experience.start_date,
                    end_date: self.experience.end_date,
                    description: self.experience.description,
                }).then(response => {
                        self.Submit_Processing_Experience = false;
                        window.location.href = '/employee/overview/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                        self.errors_experience = {};
                })
                .catch(error => {
                    self.Submit_Processing_Experience = false;
                    if (error.response.status == 422) {
                        self.errors_experience = error.response.data.errors;
                    }
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                });
            },

           //----------------------- Update Experience ---------------------------\\
            Update_Experience() {
                var self = this;
                self.Submit_Processing_Experience = true;
                axios.put("/session_employee/storeExperiance/" + self.experience.id, {
                    title: self.experience.title,
                    company_name: self.experience.company_name,
                    location: self.experience.location,
                    employment_type: self.experience.employment_type,
                    start_date: self.experience.start_date,
                    end_date: self.experience.end_date,
                    description: self.experience.description,
                }).then(response => {
                        self.Submit_Processing_Experience = false;
                        window.location.href = '/employee/overview/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                        self.errors_experience = {};
                    })
                    .catch(error => {
                        self.Submit_Processing_Experience = false;
                        if (error.response.status == 422) {
                            self.errors_experience = error.response.data.errors;
                        }
                        toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                    });
            },

             //--------------------------------- Remove Experience ---------------------------\\
            Remove_Experience(id) {

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
                            .delete("/session_employee/destroyExperiance/" + id)
                            .then(() => {
                                location.reload();
                                toastr.success('<?php echo e(__('translate.Deleted_in_successfully')); ?>');

                            })
                            .catch(() => {
                                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                            });
                    });
                },


//------------------------ ---------------------Social Profile ----------------------------------------------\\

            //------------------------ Update Social Profile ---------------------------\\
            Update_Employee_social() {
                var self = this;
                self.Submit_Processing_social = true;
                axios.put("/session_employee/social/" + self.employee.id, {
                    facebook: self.employee.facebook,
                    skype: self.employee.skype,
                    whatsapp: self.employee.whatsapp,
                    twitter: self.employee.twitter,
                    linkedin: self.employee.linkedin,
                  
                }).then(response => {
                        self.Submit_Processing_social = false;
                        window.location.href = '/employee/overview/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                        self.errors_social = {};
                })
                .catch(error => {
                    self.Submit_Processing_social = false;
                    if (error.response.status == 422) {
                        self.errors_social = error.response.data.errors;
                    }
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                });
            },



//--------------------------------------------- Bank Account -----------------------------------------------------------\\
       

            //------------------------------ Show Modal (Create Bank Account) -------------------------------\\
            New_Account() {
                this.reset_Form_bank_account();
                this.edit_mode_account = false;
                $('#Account_Modal').modal('show');
            },

            //------------------------------ Show Modal (Edit Bank Account) -------------------------------\\
            Edit_Account(account_bank) {
                this.edit_mode_account = true;
                this.reset_Form_bank_account();
                this.account_bank = account_bank;
                $('#Account_Modal').modal('show');
            },


              //----------------------------- Reset_Form_Bank Account---------------------------\\
              reset_Form_bank_account() {
                this.account_bank = {
                    id: "",
                    bank_name: "",
                    bank_branch:"",
                    account_no:"",
                    note:"",
                };
                this.errors_bank = {};
            },

            //------------------------ Create Bank Account ---------------------------\\
            Create_Account() {
                var self = this;
                self.Submit_Processing_Bank = true;
                axios.post("/session_employee/storeAccount", {
                    employee_id: self.employee.id,
                    bank_name: self.account_bank.bank_name,
                    bank_branch: self.account_bank.bank_branch,
                    account_no: self.account_bank.account_no,
                    note: self.account_bank.note,
                  
                }).then(response => {
                        self.Submit_Processing_Bank = false;
                        window.location.href = '/employee/overview/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                        self.errors_bank = {};
                })
                .catch(error => {
                    self.Submit_Processing_Bank = false;
                    if (error.response.status == 422) {
                        self.errors_bank = error.response.data.errors;
                    }
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                });
            },

           //----------------------- Update Bank Account ---------------------------\\
            Update_Account() {
                var self = this;
                self.Submit_Processing_Bank = true;
                axios.put("/session_employee/updateAccount/" + self.account_bank.id, {
                    employee_id: self.employee.id,
                    bank_name: self.account_bank.bank_name,
                    bank_branch: self.account_bank.bank_branch,
                    account_no: self.account_bank.account_no,
                    note: self.account_bank.note,
          
                }).then(response => {
                        self.Submit_Processing_Bank = false;
                        window.location.href = '/employee/overview/'+ self.employee.id; 
                        toastr.success('<?php echo e(__('translate.Updated_in_successfully')); ?>');
                        self.errors_bank = {};
                    })
                    .catch(error => {
                        self.Submit_Processing_Bank = false;
                        if (error.response.status == 422) {
                            self.errors_bank = error.response.data.errors;
                        }
                        toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                    });
            },

             //--------------------------------- Remove Bank Account ---------------------------\\
             Remove_Account(id) {

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
                        axios.delete("/session_employee/destroyAccount/" + id)
                            .then(() => {
                                toastr.success('Deleted in successfully');
                                location.reload();

                            })
                            .catch(() => {
                                toastr.danger('There was something wronge');
                            });
                    });
                },



    },
    //-----------------------------Autoload function-------------------
    created () {
        
    },

})

</script>

<script type="text/javascript">
    $(function () {
      "use strict";

        $('.data_datatable').DataTable( {
            "processing": true,
           
            dom: "<'row'<'col-sm-12 col-md-7'lB><'col-sm-12 col-md-5 p-0'f>>rtip",
            oLanguage:
                { 
                sLengthMenu: "_MENU_", 
                sSearch: '',
                sSearchPlaceholder: "Search..."
            },
            buttons: [
                {
                    extend: 'collection',
                    text: 'EXPORT',
                    buttons: [
                        'csv','excel', 'pdf', 'print'
                    ]
            }]
        });

    });
</script>


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


 // Chart Project by status
 let echartElemProject = document.getElementById('echart_Project');
    if (echartElemProject) {
        let echartProject = echarts.init(echartElemProject);
        echartProject.setOption({
            color: ["#003f5c", "#58508d", "#bc5090", "#ff6361", "#ffa600"],

            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },

            series: [{
                    type: 'pie',
                    radius: '60%',
                    center: ['50%', '50%'],
                    data:[
                        <?php $__currentLoopData = $employee_project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                            value:<?php echo json_encode($value, 15, 512) ?> , name:<?php echo json_encode($key, 15, 512) ?>,
                        },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }

            ]
        });
        $(window).on('resize', function() {
            setTimeout(() => {
                echartProject.resize();
            }, 500);
        });
    }

    // Chart Task by status
 let echartElemTask = document.getElementById('echart_employee_Task');
    if (echartElemTask) {
        let echartTask = echarts.init(echartElemTask);
        echartTask.setOption({
            color: ["#003f5c", "#58508d", "#bc5090", "#ff6361", "#ffa600"],

            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },

            series: [{
                    type: 'pie',
                    radius: '60%',
                    center: ['50%', '50%'],
                    data:[
                        <?php $__currentLoopData = $employee_task; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                            value:<?php echo json_encode($value, 15, 512) ?> , name:<?php echo json_encode($key, 15, 512) ?>,
                        },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                    ],
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                    }
                }

            ]
        });
        $(window).on('resize', function() {
            setTimeout(() => {
                echartTask.resize();
            }, 500);
        });
    }




</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/session_employee/employee_details.blade.php ENDPATH**/ ?>