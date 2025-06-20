
<?php $__env->startSection('main-content'); ?>


<div class="breadcrumb">
    <h1><?php echo e(__('translate.Settings')); ?></h1>
    <ul>
        <li><a href="/settings/system_settings"><?php echo e(__('translate.Module_settings')); ?></a></li>
        <li><?php echo e(__('translate.Settings')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<section id="section_module_Settings">
    
    <div class="row">
        <div class="col-lg-12">
            <validation-observer ref="ref_Upload_Module">
                <form @submit.prevent="Submit_Upload_Module" enctype="multipart/form-data">
                    <div class="row border rounded p-3 mt-3">
                         <div class="col-lg-12">
                            <validation-provider name="Upload Module" ref="Upload_Module" rules="mimes:zip" v-slot="{ valid, errors }">
                                <div class="form-group">
                                    <label for="upload_module" class="ul-form__label"><?php echo e(__('translate.Install_Upload_Module')); ?> <span class="field_required">*</span></label>
                                    <input 
                                    :state="errors[0] ? false : (valid ? true : null)"
                                    label="Upload_Module"
                                    @change="onFileSelected"
                                    type="file"
                                    :class="{'is-invalid': !!errors.length}">
                                    <span class="error">{{ errors[0] }}</span>
                                </div>
                                </validation-provider>
                                
                                <span><?php echo e(__('translate.The_module_must_be_uploaded_as_zip_file')); ?></span>
                        </div>

                        <div class="col-lg-12 text-center mt-3">
                            <button  type="submit" :disabled="SubmitProcessing" class="btn btn-primary">
                                   <?php echo e(__('translate.Upload_Module')); ?>

                            </button>
                            <div v-once class="typo__p" v-if="SubmitProcessing">
                                <div class="spinner spinner-primary mt-3"></div>
                            </div>
                        </div>
                      
                    </div>
                </form>
            </validation-observer>
        </div>
    </div>
      
      
           <div class="row mt-5">
                <div class="col-lg-12">
               <h4 v-show="modules_info.length >0"><?php echo e(__('translate.All_Modules_Installed')); ?></h4>
            </div>
           <div class="col-md-6" v-for="module_item in modules_info" :key="module_item">
             <div class="row border rounded p-3 mt-3">
               <div class="col-md-12">
                 <span class="module_name">{{module_item.module_name}}</span>
               </div>
               <div class="col-md-12 mt-3">
                 <span><strong><?php echo e(__('translate.Current_Version')); ?></strong> : {{module_item.current_version}}</span>
               </div>
              <div class="col-md-12 mt-3">
                  <label class="switch switch-primary mr-3">
                      <input @change="update_status_module(module_item)" v-model="module_item.status"  type="checkbox">
                      <span class="slider"></span>
                    </label>
               </div>
             </div>
           </div> 
    </div>



</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/js/vee-validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vee-validate-rules.min.js')); ?>"></script>

<script>
    Vue.component('validation-provider', VeeValidate.ValidationProvider);
   Vue.component('validation-observer', VeeValidate.ValidationObserver);

    var app = new Vue({
        el: '#section_module_Settings',
        data: {
            SubmitProcessing:false,
            modules_info: <?php echo json_encode($ModulesInstalled, 15, 512) ?>,
            module_zip:'',
            data: new FormData(),
        },
       
        methods: {


             //------------------------------ Event Upload Module -------------------------------\\
            async onFileSelected(e) {
                const { valid } = await this.$refs.Upload_Module.validate(e);
                if (valid) {
                    this.module_zip = e.target.files[0];
                } else {
                    this.module_zip = "";
                }
            },
    
            update_status_module(module_info) {
                axios
                    .post("/update_status_module/", {
                    status: module_info.status,
                    name: module_info.module_name,
                    })
                    .then(response => {
                        window.location.href = '/module_settings';
                    if (module_info.status) {
                        toastr.success('<?php echo e(__('translate.Module_enabled_success')); ?>');
                    }else{
                        toastr.error('<?php echo e(__('translate.Module_Disabled_success')); ?>');
                    }

                    })
                    .catch(error => {
                        toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                    });
            },
   
       
            //------------- Submit Validation 
            Submit_Upload_Module() {
                this.$refs.ref_Upload_Module.validate().then(success => {
                    if (!success) {
                        toastr.error('<?php echo e(__('translate.Please_Upload_the_Correct_Module')); ?>');
                    } else {
                        this.Upload_Module();
                    }
                });
            },

            //---------------------------------------- Upload_Module -----------------\\
            Upload_Module() {
            var self = this;
            self.SubmitProcessing = true;
            self.data.append("module_zip", self.module_zip);
            axios
                .post("/upload_module", self.data)
                .then(response => {
                self.SubmitProcessing = false;
                window.location.href = '/module_settings';
                toastr.success('<?php echo e(__('translate.Uploaded_Success')); ?>');
                })
                .catch(error => {
                self.SubmitProcessing = false;
                toastr.error('<?php echo e(__('translate.Please_Upload_the_Correct_Module')); ?>');
                });
            },

        },
        //-----------------------------Autoload function-------------------
        created() {
        }

    })

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/settings/module_settings/module.blade.php ENDPATH**/ ?>