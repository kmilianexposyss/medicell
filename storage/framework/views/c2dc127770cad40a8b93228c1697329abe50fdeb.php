
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">


<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Designation_List')); ?></h1>
    <ul>
        <li><a href="/core/designations"><?php echo e(__('translate.Designations')); ?></a></li>
        <li><?php echo e(__('translate.Designation_List')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_Designation_list">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header text-right bg-transparent">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('designation_add')): ?>
                <a class="btn btn-primary btn-md m-1" @click="New_Designation"><i class="i-Add text-white mr-2"></i>
                    <?php echo e(__('translate.Create')); ?></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('designation_delete')): ?>
                <a v-if="selectedIds.length > 0" class="btn btn-danger btn-md m-1" @click="delete_selected()"><i
                        class="i-Close-Window text-white mr-2"></i> <?php echo e(__('translate.Delete')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="designation_list_table" class="display table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('translate.Designation')); ?></th>
                                <th><?php echo e(__('translate.Company')); ?></th>
                                <th><?php echo e(__('translate.Department')); ?></th>
                                <th><?php echo e(__('translate.Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $designations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $designation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td @click="selected_row( <?php echo e($designation->id); ?>)"></td>
                                <td><?php echo e($designation->designation); ?></td>
                                <td><?php echo e($designation->company->name); ?></td>
                                <td><?php echo e($designation->department->department); ?></td>

                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('designation_edit')): ?>
                                    <a @click="Edit_Designation( <?php echo e($designation); ?>)" class="ul-link-action text-success"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('designation_delete')): ?>
                                    <a @click="Remove_Designation( <?php echo e($designation->id); ?>)"
                                        class="ul-link-action text-danger mr-1" data-toggle="tooltip"
                                        data-placement="top" title="Delete">
                                        <i class="i-Close-Window"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Add & Edit designation -->
        <div class="modal fade" id="Designation_Modal" tabindex="-1" role="dialog" aria-labelledby="Designation_Modal"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="editmode" class="modal-title"><?php echo e(__('translate.Edit')); ?></h5>
                        <h5 v-else class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form @submit.prevent="editmode?Update_Designation():Create_Designation()">
                            <div class="row">

                                <div class="col-md-12">
                                    <label class="ul-form__label"><?php echo e(__('translate.Company')); ?> <span
                                            class="field_required">*</span></label>
                                    <v-select @input="Selected_Company"
                                        placeholder="<?php echo e(__('translate.Choose_Company')); ?>"
                                        v-model="designation.company_id" :reduce="label => label.value"
                                        :options="companies.map(companies => ({label: companies.name, value: companies.id}))">
                                    </v-select>

                                    <span class="error" v-if="errors && errors.company_id">
                                        {{ errors.company_id[0] }}
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <label class="ul-form__label"><?php echo e(__('translate.Department')); ?> <span
                                            class="field_required">*</span></label>
                                    <v-select @input="Selected_Department"
                                        placeholder="<?php echo e(__('translate.Choose_Department')); ?>"
                                        v-model="designation.department_id" :reduce="label => label.value"
                                        :options="departments.map(departments => ({label: departments.department, value: departments.id}))">

                                    </v-select>

                                    <span class="error" v-if="errors && errors.department">
                                        {{ errors.department[0] }}
                                    </span>
                                </div>

                                <div class="col-md-12">
                                    <label for="designation" class="ul-form__label"><?php echo e(__('translate.Designation')); ?>

                                        <span class="field_required">*</span></label>
                                    <input type="text" v-model="designation.designation" class="form-control"
                                        name="designation" id="designation"
                                        placeholder="<?php echo e(__('translate.Enter_Designation')); ?>">
                                    <span class="error" v-if="errors && errors.designation">
                                        {{ errors.designation[0] }}
                                    </span>
                                </div>


                            </div>

                            <div class="row mt-3">

                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary" :disabled="SubmitProcessing">
                                        <?php echo e(__('translate.Submit')); ?>

                                    </button>
                                    <div v-once class="typo__p" v-if="SubmitProcessing">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<script src="<?php echo e(asset('assets/js/vendor/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.script.js')); ?>"></script>



<script>
    Vue.component('v-select', VueSelect.VueSelect)
        var app = new Vue({
        el: '#section_Designation_list',
        data: {
            selectedIds:[],
            editmode: false,
            SubmitProcessing:false,
            departments: [],
            errors:[],
            designations: [], 
            companies :[],
            designation: {
                designation: "",
                company_id: "",
                department_id: "",
            }, 
        },
       
        methods: {

              //---- Event selected_row
              selected_row(id) {
                //in here you can check what ever condition  before append to array.
                if(this.selectedIds.includes(id)){
                    const index = this.selectedIds.indexOf(id);
                    this.selectedIds.splice(index, 1);
                }else{
                    this.selectedIds.push(id)
                }
            },

            Selected_Department(value) {
                if (value === null) {
                    this.designation.department_id = "";
                }
            },


            Selected_Company(value) {
                if (value === null) {
                    this.designation.company_id = "";
                    this.designation.department_id = "";
                }
                this.departments = [];
                this.designation.department_id = "";
                this.Get_departments_by_company(value);
            },


             
             //---------------------- Get_Data_Create ------------------------------\\
             Get_Data_Create() {
                axios
                    .get("/core/designations/create")
                    .then(response => {
                        this.companies   = response.data.companies;
                    })
                    .catch(error => {
                       
                    });
            },

              
             //---------------------- Get_Data_Edit ------------------------------\\
             Get_Data_Edit(id) {
                axios
                    .get("/core/designations/"+id+"/edit")
                    .then(response => {
                        this.companies   = response.data.companies;
                    })
                    .catch(error => {
                       
                    });
            },


            //---------------------- Get_departments_by_company ------------------------------\\
            Get_departments_by_company(value) {
                axios
                    .get("/core/Get_departments_by_company?id=" + value)
                    .then(({ data }) => (this.departments = data));
            },

            //------------------------------ Show Modal (Create designation) -------------------------------\\
            New_Designation() {
                this.reset_Form();
                this.editmode = false;
                this.Get_Data_Create();
                $('#Designation_Modal').modal('show');
            },

            //------------------------------ Show Modal (Update designation) -------------------------------\\
            Edit_Designation(designation) {
                this.editmode = true;
                this.reset_Form();
                this.Get_Data_Edit(designation.id);
                this.Get_departments_by_company(designation.company_id);
                this.designation = designation;
                $('#Designation_Modal').modal('show');
            },

            //----------------------------- Reset Form ---------------------------\\
            reset_Form() {
                this.designation = {
                    id: "",
                    designation: "",
                    company_id:"",
                    department_id: "",
                };
                this.errors = {};
            },

             //---------------------- Get all departments ------------------------------\\
            //  Get_all_departments() {
            //     axios
            //         .get("/core/Get_all_departments")
            //         .then(({ data }) => (this.departments = data));
            // },
            
            //------------------------ Create designation ---------------------------\\
            Create_Designation() {
                var self = this;
                self.SubmitProcessing = true;
                axios.post("/core/designations", {
                    designation: self.designation.designation,
                    company_id: self.designation.company_id,
                    department: self.designation.department_id,
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/core/designations'; 
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

           //----------------------- Update designation ---------------------------\\
            Update_Designation() {
                var self = this;
                self.SubmitProcessing = true;
                axios.put("/core/designations/" + self.designation.id, {
                    designation: self.designation.designation,
                    company_id: self.designation.company_id,
                    department: self.designation.department_id,
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/core/designations'; 
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

             //--------------------------------- Remove designation ---------------------------\\
            Remove_Designation(id) {

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
                            .delete("/core/designations/" + id)
                            .then(() => {
                                window.location.href = '/core/designations'; 
                                toastr.success('<?php echo e(__('translate.Deleted_in_successfully')); ?>');

                            })
                            .catch(() => {
                                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                            });
                    });
                },

                  //--------------------------------- delete_selected ---------------------------\\
            delete_selected() {
                var self = this;
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
                        .post("/core/designations/delete/by_selection", {
                            selectedIds: self.selectedIds
                        })
                            .then(() => {
                                window.location.href = '/core/designations'; 
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

        $('#designation_list_table').DataTable( {
            "processing": true, // for show progress bar
            select: {
                style: 'multi',
                selector: '.select-checkbox',
                items: 'row',
            },
            columnDefs: [
                {
                    targets: 0,
                    className: 'select-checkbox'
                },
                {
                    targets: [0],
                    orderable: false
                }
            ],
        
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/core_company/designation/designation_list.blade.php ENDPATH**/ ?>