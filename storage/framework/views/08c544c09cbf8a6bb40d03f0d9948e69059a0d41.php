
<?php $__env->startSection('page-css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="breadcrumb">
    <h1><?php echo e(__('translate.Employee')); ?></h1>
    <ul>
        <li><a href="/employee_profile"><?php echo e(__('translate.Profile')); ?></a></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="card user-profile o-hidden mb-4" id="section_employee_Profile_list">
    <div class="header-cover"></div>
    <div class="user-info">
        <img class="profile-picture avatar-lg mb-2" src="<?php echo e(asset('assets/images/avatar/'.Auth::user()->avatar)); ?>"
            alt="">
        <p class="m-0 text-24">{{ user.username }}</p>
    </div>
    <div class="card-body">
        <form @submit.prevent="Update_Profile()" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <label for="FirstName" class="ul-form__label"><?php echo e(__('translate.FirstName')); ?> <span
                            class="field_required">*</span></label>
                    <input type="text" v-model="user.firstname" class="form-control" name="FirstName" id="FirstName"
                        placeholder="<?php echo e(__('translate.Enter_FirstName')); ?>">
                    <span class="error" v-if="errors && errors.firstname">
                        {{ errors.firstname[0] }}
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="lastname" class="ul-form__label"><?php echo e(__('translate.LastName')); ?> <span
                            class="field_required">*</span></label>
                    <input type="text" v-model="user.lastname" class="form-control" id="lastname" id="lastname"
                        placeholder="<?php echo e(__('translate.Enter_LastName')); ?>">
                    <span class="error" v-if="errors && errors.lastname">
                        {{ errors.lastname[0] }}
                    </span>
                </div>


                <div class="col-md-6">
                    <label for="Phone" class="ul-form__label"><?php echo e(__('translate.Phone')); ?></label>
                    <input type="text" v-model="user.phone" class="form-control" id="Phone"
                        placeholder="<?php echo e(__('translate.Enter_Phone')); ?>">

                </div>

                <div class="col-md-6">
                    <label for="country" class="ul-form__label"><?php echo e(__('translate.Country')); ?></label>
                    <input type="text" v-model="user.country" class="form-control" id="country"
                        placeholder="<?php echo e(__('translate.Enter_Country')); ?>">
                    <span class="error" v-if="errors && errors.country">
                        {{ errors.country[0] }}
                    </span>
                </div>


                <div class="col-md-6">
                    <label for="email" class="ul-form__label"><?php echo e(__('translate.Email')); ?> <span
                            class="field_required">*</span></label>
                    <input type="text" v-model="user.email" class="form-control" id="email"
                        placeholder="<?php echo e(__('translate.Enter_email_address')); ?>">
                    <span class="error" v-if="errors && errors.email">
                        {{ errors.email[0] }}
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="password" class="ul-form__label"><?php echo e(__('translate.Password')); ?> <span
                            class="field_required">*</span></label>
                    <input type="password" v-model="user.password" class="form-control" id="password"
                        placeholder="<?php echo e(__('translate.min_6_characters')); ?>">
                    <span class="error" v-if="errors && errors.password">
                        {{ errors.password[0] }}
                    </span>
                </div>

                <div class="col-md-6">
                    <label for="Avatar" class="ul-form__label"><?php echo e(__('translate.Avatar')); ?></label>
                    <input name="Avatar" @change="changeAvatar" type="file" class="form-control" id="Avatar">
                    <span class="error" v-if="errors && errors.avatar">
                        {{ errors.avatar[0] }}
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



<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>

<script>
    var app = new Vue({
        el: '#section_employee_Profile_list',
        data: {
            data: new FormData(),
            SubmitProcessing:false,
            errors:[],
            user: <?php echo json_encode($user, 15, 512) ?>,
        },
       
        methods: {


            changeAvatar(e){
                let file = e.target.files[0];
                this.user.avatar = file;
            },


           //----------------------- Update Profile ---------------------------\\
           Update_Profile() {
                var self = this;
                self.SubmitProcessing = true;
                self.data.append("firstname", self.user.firstname);
                self.data.append("lastname", self.user.lastname);
                self.data.append("country", self.user.country);
                self.data.append("email", self.user.email);
                self.data.append("password", self.user.password);
                self.data.append("phone", self.user.phone);
                self.data.append("avatar", self.user.avatar);
                self.data.append("_method", "put");

                axios
                    .post("/employee_profile/" + self.user.id, self.data)
                    .then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/employee_profile'; 
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
           
        },
        //-----------------------------Autoload function-------------------
        created() {
        }

    })

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/session_employee/employee_profile.blade.php ENDPATH**/ ?>