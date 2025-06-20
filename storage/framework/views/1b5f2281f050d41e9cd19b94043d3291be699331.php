
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/vue2-clock-picker/vue2-clock-picker.min.css')); ?>">


<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Office_Shift_List')); ?></h1>
    <ul>
        <li><a href="/hr/office_shift"><?php echo e(__('translate.Office_Shifts')); ?></a></li>
        <li><?php echo e(__('translate.Office_Shift_List')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_office_shift_list">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header text-right bg-transparent">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('office_shift_add')): ?>
                <a class="btn btn-primary btn-md m-1" @click="New_office_shift"><i
                        class="i-Add text-white mr-2"></i><?php echo e(__('translate.Create')); ?></a>
                <?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('office_shift_delete')): ?>
                <a v-if="selectedIds.length > 0" class="btn btn-danger btn-md m-1" @click="delete_selected()"><i
                        class="i-Close-Window text-white mr-2"></i> <?php echo e(__('translate.Delete')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="shift_list_table" class="display table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('translate.Name')); ?></th>
                                <th><?php echo e(__('translate.Company')); ?></th>
                                <th><?php echo e(__('translate.Monday')); ?></th>
                                <th><?php echo e(__('translate.Tuesday')); ?></th>
                                <th><?php echo e(__('translate.Wednesday')); ?></th>
                                <th><?php echo e(__('translate.Thursday')); ?></th>
                                <th><?php echo e(__('translate.Friday')); ?></th>
                                <th><?php echo e(__('translate.Saturday')); ?></th>
                                <th><?php echo e(__('translate.Sunday')); ?></th>
                                <th><?php echo e(__('translate.Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $office_shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $office_shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td @click="selected_row( <?php echo e($office_shift->id); ?>)"></td>
                                <td><?php echo e($office_shift->name); ?></td>
                                <td><?php echo e($office_shift->company->name); ?></td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->monday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong> :
                                            <?php echo e($office_shift->monday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->tuesday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong> :
                                            <?php echo e($office_shift->tuesday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->wednesday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong>
                                            :<?php echo e($office_shift->wednesday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->thursday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong>
                                            :<?php echo e($office_shift->thursday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->friday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong>
                                            :<?php echo e($office_shift->friday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->saturday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong>
                                            :<?php echo e($office_shift->saturday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <span><strong><?php echo e(__('translate.In')); ?></strong>
                                            :<?php echo e($office_shift->sunday_in); ?></span><br>
                                        <span><strong><?php echo e(__('translate.Out')); ?></strong>
                                            :<?php echo e($office_shift->sunday_out); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('office_shift_edit')): ?>
                                    <a @click="Edit_office_shift( <?php echo e($office_shift); ?>)"
                                        class="ul-link-action text-success" data-toggle="tooltip" data-placement="top"
                                        title="Edit">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('office_shift_delete')): ?>
                                    <a @click="Remove_office_shift( <?php echo e($office_shift->id); ?>)"
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

        <!-- Modal Add & Edit office_shift -->
        <div class="modal fade" id="office_shift_Modal" tabindex="-1" role="dialog" aria-labelledby="office_shift_Modal"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-if="editmode" class="modal-title"><?php echo e(__('translate.Edit')); ?></h5>
                        <h5 v-else class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form @submit.prevent="editmode?Update_office_shift():Create_office_shift()">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="ul-form__label"><?php echo e(__('translate.Company')); ?> <span
                                            class="field_required">*</span></label>
                                    <v-select @input="Selected_Company"
                                        placeholder="<?php echo e(__('translate.Choose_Company')); ?>"
                                        v-model="office_shift.company_id" :reduce="label => label.value"
                                        :options="companies.map(companies => ({label: companies.name, value: companies.id}))">
                                    </v-select>

                                    <span class="error" v-if="errors && errors.company_id">
                                        {{ errors.company_id[0] }}
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <label for="name" class="ul-form__label"><?php echo e(__('translate.Shift_Name')); ?> <span
                                            class="field_required">*</span></label>
                                    <input type="text" v-model="office_shift.name" class="form-control" name="name"
                                        id="name" placeholder="<?php echo e(__('translate.Enter_Shift_name')); ?>">
                                    <span class="error" v-if="errors && errors.name">
                                        {{ errors.name[0] }}
                                    </span>
                                </div>

                                <div class="col-md-3">
                                    <label for="monday_in" class="ul-form__label"><?php echo e(__('translate.Monday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.monday_in"
                                        placeholder="<?php echo e(__('translate.Monday_In')); ?>" name="monday_in" id="monday_in">
                                    </vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="monday_in" class="ul-form__label"><?php echo e(__('translate.Monday_Out')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.monday_out"
                                        placeholder="<?php echo e(__('translate.Monday_Out')); ?>" name="monday_out"
                                        id="monday_out"></vue-clock-picker>
                                </div>



                                <div class="col-md-3">
                                    <label for="tuesday_in"
                                        class="ul-form__label"><?php echo e(__('translate.Tuesday_In')); ?></label>

                                    <vue-clock-picker v-model="office_shift.tuesday_in"
                                        placeholder="<?php echo e(__('translate.Tuesday_In')); ?>" name="tuesday_in"
                                        id="tuesday_in"></vue-clock-picker>

                                </div>

                                <div class="col-md-3">
                                    <label for="tuesday_out" class="ul-form__label"><?php echo e(__('translate.Tuesday_Out')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.tuesday_out"
                                        placeholder="<?php echo e(__('translate.Tuesday_Out')); ?>" name="tuesday_out"
                                        id="tuesday_out"></vue-clock-picker>

                                </div>



                                <div class="col-md-3">
                                    <label for="wednesday_in" class="ul-form__label"><?php echo e(__('translate.Wednesday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.wednesday_in"
                                        placeholder="<?php echo e(__('translate.Wednesday_In')); ?>" name="wednesday_in"
                                        id="wednesday_in"></vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="wednesday_out"
                                        class="ul-form__label"><?php echo e(__('translate.Wednesday_Out')); ?> </label>

                                    <vue-clock-picker v-model="office_shift.wednesday_out"
                                        placeholder="<?php echo e(__('translate.Wednesday_Out')); ?>" name="wednesday_out"
                                        id="wednesday_out"></vue-clock-picker>
                                </div>


                                <div class="col-md-3">
                                    <label for="thursday_in" class="ul-form__label"><?php echo e(__('translate.Thursday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.thursday_in"
                                        placeholder="<?php echo e(__('translate.Thursday_In')); ?>" name="thursday_in"
                                        id="thursday_in"></vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="thursday_out" class="ul-form__label"><?php echo e(__('translate.Thursday_Out')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.thursday_out"
                                        placeholder="<?php echo e(__('translate.Thursday_Out')); ?>" name="thursday_out"
                                        id="thursday_out"></vue-clock-picker>
                                </div>


                                <div class="col-md-3">
                                    <label for="friday_in" class="ul-form__label"><?php echo e(__('translate.Friday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.friday_in"
                                        placeholder="<?php echo e(__('translate.Friday_In')); ?>" name="friday_in" id="friday_in">
                                    </vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="friday_out" class="ul-form__label"><?php echo e(__('translate.Friday_Out')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.friday_out"
                                        placeholder="<?php echo e(__('translate.Friday_Out')); ?>" name="friday_out"
                                        id="friday_out"></vue-clock-picker>
                                </div>


                                <div class="col-md-3">
                                    <label for="saturday_in" class="ul-form__label"><?php echo e(__('translate.Saturday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.saturday_in"
                                        placeholder="<?php echo e(__('translate.Saturday_In')); ?>" name="saturday_in"
                                        id="saturday_in"></vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="saturday_out" class="ul-form__label"><?php echo e(__('translate.Saturday_Out')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.saturday_out"
                                        placeholder="<?php echo e(__('translate.Saturday_Out')); ?>" name="saturday_out"
                                        id="saturday_out"></vue-clock-picker>
                                </div>


                                <div class="col-md-3">
                                    <label for="sunday_in" class="ul-form__label"><?php echo e(__('translate.Sunday_In')); ?>

                                    </label>

                                    <vue-clock-picker v-model="office_shift.sunday_in"
                                        placeholder="<?php echo e(__('translate.Sunday_In')); ?>" name="sunday_in" id="sunday_in">
                                    </vue-clock-picker>
                                </div>

                                <div class="col-md-3">
                                    <label for="sunday_out"
                                        class="ul-form__label"><?php echo e(__('translate.Sunday_Out')); ?></label>

                                    <vue-clock-picker v-model="office_shift.sunday_out"
                                        placeholder="<?php echo e(__('translate.Sunday_Out')); ?>" name="sunday_out"
                                        id="sunday_out"></vue-clock-picker>
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
<script src="<?php echo e(asset('assets/js/vendor/vue2-clock-picker/vue2-clock-picker.plugin.js')); ?>"></script>


<script>
    Vue.use(VueClockPickerPlugin)

        Vue.component('v-select', VueSelect.VueSelect)

        var app = new Vue({
        el: '#section_office_shift_list',
        data: {
            selectedIds:[],
            editmode: false,
            SubmitProcessing:false,
            errors:[],
            companies:[],
            office_shifts: {}, 
            office_shift: {
                name: "",
                company_id:"",
                monday_in:"",
                monday_out:"",
                tuesday_in:"",
                tuesday_out:"",
                wednesday_in:"",
                wednesday_out:"",
                thursday_in:"",
                thursday_out:"",
                friday_in:"",
                friday_out:"",
                saturday_in:"",
                saturday_out:"",
                sunday_in:"",
                sunday_out:"",
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


            //------------------------------ Show Modal (Create office_shift) -------------------------------\\
            New_office_shift() {
                this.reset_Form();
                this.editmode = false;
                this.Get_Data_Create();
                $('#office_shift_Modal').modal('show');
            },

            //------------------------------ Show Modal (Update office_shift) -------------------------------\\
            Edit_office_shift(office_shift) {
                this.editmode = true;
                this.reset_Form();
                this.Get_Data_Edit(office_shift.id);
                this.office_shift = office_shift;
                $('#office_shift_Modal').modal('show');
            },

            //---------------------- Get_Data_Create  ------------------------------\\
            Get_Data_Create() {
                axios
                    .get("/hr/office_shift/create")
                    .then(response => {
                        this.companies   = response.data.companies;
                    })
                    .catch(error => {
                       
                    });
            },

            //---------------------- Get_Data_Edit  ------------------------------\\
            Get_Data_Edit(id) {
                axios
                    .get("/hr/office_shift/"+id+"/edit")
                    .then(response => {
                        this.companies   = response.data.companies;
                    })
                    .catch(error => {
                       
                    });
            },

            Selected_Company(value) {
                if (value === null) {
                    this.office_shift.company_id = "";
                }
            },


            //----------------------------- Reset Form ---------------------------\\
            reset_Form() {
                this.office_shift = {
                    id: "",
                    name: "",
                    company_id:"",
                    monday_in:"",
                    monday_out:"",
                    tuesday_in:"",
                    tuesday_out:"",
                    wednesday_in:"",
                    wednesday_out:"",
                    thursday_in:"",
                    thursday_out:"",
                    friday_in:"",
                    friday_out:"",
                    saturday_in:"",
                    saturday_out:"",
                    sunday_in:"",
                    sunday_out:"",
                };
                this.errors = {};
            },

            //------------------------ Create office_shift ---------------------------\\
            Create_office_shift() {
                var self = this;
                self.SubmitProcessing = true;
                axios.post("/hr/office_shift", {
                    name: self.office_shift.name,
                    company_id: self.office_shift.company_id,
                    monday_in: self.office_shift.monday_in,
                    monday_out: self.office_shift.monday_out,
                    tuesday_in: self.office_shift.tuesday_in,
                    tuesday_out: self.office_shift.tuesday_out,
                    wednesday_in: self.office_shift.wednesday_in,
                    wednesday_out: self.office_shift.wednesday_out,
                    thursday_in: self.office_shift.thursday_in,
                    thursday_out: self.office_shift.thursday_out,
                    friday_in: self.office_shift.friday_in,
                    friday_out: self.office_shift.friday_out,
                    saturday_in: self.office_shift.saturday_in,
                    saturday_out: self.office_shift.saturday_out,
                    sunday_in: self.office_shift.sunday_in,
                    sunday_out: self.office_shift.sunday_out,
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/hr/office_shift'; 
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

           //----------------------- Update office_shift ---------------------------\\
            Update_office_shift() {
                var self = this;
                self.SubmitProcessing = true;
                axios.put("/hr/office_shift/" + self.office_shift.id, {
                    name: self.office_shift.name,
                    company_id: self.office_shift.company_id,
                    monday_in: self.office_shift.monday_in,
                    monday_out: self.office_shift.monday_out,
                    tuesday_in: self.office_shift.tuesday_in,
                    tuesday_out: self.office_shift.tuesday_out,
                    wednesday_in: self.office_shift.wednesday_in,
                    wednesday_out: self.office_shift.wednesday_out,
                    thursday_in: self.office_shift.thursday_in,
                    thursday_out: self.office_shift.thursday_out,
                    friday_in: self.office_shift.friday_in,
                    friday_out: self.office_shift.friday_out,
                    saturday_in: self.office_shift.saturday_in,
                    saturday_out: self.office_shift.saturday_out,
                    sunday_in: self.office_shift.sunday_in,
                    sunday_out: self.office_shift.sunday_out,
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/hr/office_shift'; 
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

             //--------------------------------- Remove office_shift ---------------------------\\
            Remove_office_shift(id) {

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
                            .delete("/hr/office_shift/" + id)
                            .then(() => {
                                window.location.href = '/hr/office_shift'; 
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
                        .post("/hr/office_shift/delete/by_selection", {
                            selectedIds: self.selectedIds
                        })
                            .then(() => {
                                window.location.href = '/hr/office_shift'; 
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

        $('#shift_list_table').DataTable( {
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/hr/office_shift/office_shift_list.blade.php ENDPATH**/ ?>