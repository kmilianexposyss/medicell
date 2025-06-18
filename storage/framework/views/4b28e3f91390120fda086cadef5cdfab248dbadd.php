
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/vue-slider-component.css')); ?>">

<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Create_Project')); ?></h1>
    <ul>
        <li><a href="/projects"><?php echo e(__('translate.Projects')); ?></a></li>
        <li><?php echo e(__('translate.Create_Project')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<!-- begin::main-row -->
<div class="row" id="section_Project_Create">
    <div class="col-lg-12 mb-3">
        <div class="card">

            <!--begin::form-->
            <form @submit.prevent="Create_Project()">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="title" class="ul-form__label"><?php echo e(__('translate.Project_Title')); ?> <span
                                    class="field_required">*</span></label>
                            <input type="text" v-model="project.title" class="form-control" name="title" id="title"
                                placeholder="<?php echo e(__('translate.Enter_Project_Title')); ?>">
                            <span class="error" v-if="errors && errors.title">
                                {{ errors.title[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label for="start_date" class="ul-form__label"><?php echo e(__('translate.Start_Date')); ?> <span
                                    class="field_required">*</span></label>

                            <vuejs-datepicker id="start_date" name="start_date"
                                placeholder="<?php echo e(__('translate.Enter_Start_date')); ?>" v-model="project.start_date"
                                input-class="form-control" format="yyyy-MM-dd"
                                @closed="project.start_date=formatDate(project.start_date)">
                            </vuejs-datepicker>

                            <span class="error" v-if="errors && errors.start_date">
                                {{ errors.start_date[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label for="end_date" class="ul-form__label"><?php echo e(__('translate.Finish_Date')); ?> <span
                                    class="field_required">*</span></label>

                            <vuejs-datepicker id="end_date" name="end_date"
                                placeholder="<?php echo e(__('translate.Enter_Finish_date')); ?>" v-model="project.end_date"
                                input-class="form-control" format="yyyy-MM-dd"
                                @closed="project.end_date=formatDate(project.end_date)">
                            </vuejs-datepicker>

                            <span class="error" v-if="errors && errors.end_date">
                                {{ errors.end_date[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Client')); ?> <span
                                    class="field_required">*</span></label>
                            <v-select @input="Selected_Client" placeholder="<?php echo e(__('translate.Choose_Client')); ?>"
                                v-model="project.client_id" :reduce="label => label.value"
                                :options="clients.map(clients => ({label: clients.username, value: clients.id}))">
                            </v-select>
                            <span class="error" v-if="errors && errors.client">
                                {{ errors.client[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Company')); ?> <span
                                    class="field_required">*</span></label>
                            <v-select @input="Selected_Company" placeholder="<?php echo e(__('translate.Choose_Company')); ?>"
                                v-model="project.company_id" :reduce="label => label.value"
                                :options="companies.map(companies => ({label: companies.name, value: companies.id}))">
                            </v-select>

                            <span class="error" v-if="errors && errors.company_id">
                                {{ errors.company_id[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Assigned_Employees')); ?> <span
                                    class="field_required">*</span></label>
                            <v-select multiple @input="Selected_Team" placeholder="<?php echo e(__('translate.Choose_Team')); ?>"
                                v-model="project.assigned_to" :reduce="label => label.value"
                                :options="employees.map(employees => ({label: employees.username, value: employees.id}))">
                            </v-select>
                            <span class="error" v-if="errors && errors.assigned_to">
                                {{ errors.assigned_to[0] }}
                            </span>
                        </div>


                        <div class="col-md-4">
                            <label for="summary" class="ul-form__label"><?php echo e(__('translate.Summary')); ?> <span
                                    class="field_required">*</span></label>
                            <input type="text" v-model="project.summary" class="form-control" name="summary"
                                id="summary" placeholder="<?php echo e(__('translate.Enter_Project_Summary')); ?>">
                            <span class="error" v-if="errors && errors.summary">
                                {{ errors.summary[0] }}
                            </span>
                        </div>


                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Priority')); ?> <span
                                    class="field_required">*</span></label>
                            <v-select @input="Selected_Priority" placeholder="<?php echo e(__('translate.Select_priority')); ?>"
                                v-model="project.priority" :reduce="(option) => option.value" :options="
                                        [
                                            {label: 'Urgent', value: 'urgent'},
                                            {label: 'High', value: 'high'},
                                            {label: 'Medium', value: 'medium'},
                                            {label: 'Low', value: 'low'},
                                        ]">
                            </v-select>

                            <span class="error" v-if="errors && errors.priority">
                                {{ errors.priority[0] }}
                            </span>
                        </div>

                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Status')); ?> <span
                                    class="field_required">*</span></label>
                            <v-select @input="Selected_Status" placeholder="<?php echo e(__('translate.Select_status')); ?>"
                                v-model="project.status" :reduce="(option) => option.value" :options="
                                            [
                                                {label: 'Not Started', value: 'not_started'},
                                                {label: 'In Progress', value: 'progress'},
                                                {label: 'Cancelled', value: 'cancelled'},
                                                {label: 'On Hold', value: 'hold'},
                                                {label: 'Completed', value: 'completed'},
                                            ]">
                            </v-select>

                            <span class="error" v-if="errors && errors.status">
                                {{ errors.status[0] }}
                            </span>
                        </div>


                        <div class="col-md-4">
                            <label class="ul-form__label"><?php echo e(__('translate.Progress')); ?> </label>
                            <vue-slider v-model="project.project_progress" />
                        </div>

                        <div class="col-md-12">
                            <label for="description" class="ul-form__label"><?php echo e(__('translate.Description')); ?></label>
                            <textarea type="text" v-model="project.description" class="form-control" name="description"
                                id="description" placeholder="<?php echo e(__('translate.Enter_description')); ?>"></textarea>
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

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('page-js'); ?>

<script src="<?php echo e(asset('assets/js/vendor/vuejs-datepicker/vuejs-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vue-slider-component.min.js')); ?>"></script>

<script>
    Vue.component('v-select', VueSelect.VueSelect)
    var app = new Vue({
    el: '#section_Project_Create',
    components: {
        vuejsDatepicker,
        VueSlider: window['vue-slider-component']
    },
    data: {
        SubmitProcessing:false,
        errors:[],
        clients: <?php echo json_encode($clients, 15, 512) ?>,
        companies:<?php echo json_encode($companies, 15, 512) ?>,
        employees:[],
        tooltip:'right',
        project: {
            title: "",
            description:"",
            summary:"",
            client_id:"",
            company_id:"",
            assigned_to:[],
            start_date:"",
            end_date:"",
            priority:"",
            status:"",
            project_progress:0,
        }, 
    },
   
   
    methods: {


        formatDate(d){
                var m1 = d.getMonth()+1;
                var m2 = m1 < 10 ? '0' + m1 : m1;
                var d1 = d.getDate();
                var d2 = d1 < 10 ? '0' + d1 : d1;
                return [d.getFullYear(), m2, d2].join('-');
            },
            
        Selected_Client(value) {
            if (value === null) {
                this.project.client_id = "";
            }
        }, 

        Selected_Priority(value) {
            if (value === null) {
                this.project.priority = "";
            }
        },

        Selected_Team(value) {
            if (value === null) {
                this.project.assigned_to = [];
            }
        },

        Selected_Status(value) {
            if (value === null) {
                this.project.status = "";
            }
        },

        Selected_Company(value) {
                if (value === null) {
                    this.project.company_id = "";
                }
                this.employees = [];
                this.project.assigned_to = [];
                this.Get_employees_by_company(value);
            },

           //---------------------- Get_employees_by_company ------------------------------\\
            
           Get_employees_by_company(value) {
                axios
                .get("/Get_employees_by_company?id=" + value)
                .then(({ data }) => (this.employees = data));
            },

        
        //------------------------ Create Project ---------------------------\\
        Create_Project() {
            var self = this;
            self.SubmitProcessing = true;
            axios.post("/projects", {
                title: self.project.title,
                description: self.project.description,
                summary: self.project.summary,
                company_id: self.project.company_id,
                client: self.project.client_id,
                assigned_to: self.project.assigned_to,
                start_date: self.project.start_date,
                end_date: self.project.end_date,
                priority: self.project.priority,
                status: self.project.status,
                project_progress: self.project.project_progress,
            }).then(response => {
                    self.SubmitProcessing = false;
                    window.location.href = '/projects'; 
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/project/create_project.blade.php ENDPATH**/ ?>