
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">


<?php $__env->stopSection(); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Settings')); ?></h1>
    <ul>
        <li><?php echo e(__('translate.Currency')); ?></li>
        <li><?php echo e(__('translate.Settings')); ?></li>
    </ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row" id="section_Currency_list">
    <div class="col-md-12">
        <div class="card text-left">
            <div class="card-header text-right bg-transparent">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency')): ?>
                <a class="btn btn-primary btn-md m-1" @click="New_Currency"><i class="i-Add text-white mr-2"></i>
                    <?php echo e(__('translate.Create')); ?></a>
                <a v-if="selectedIds.length > 0" class="btn btn-danger btn-md m-1" @click="delete_selected()"><i
                        class="i-Close-Window text-white mr-2"></i> <?php echo e(__('translate.Delete')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="currency_list_table" class="display table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('translate.Currency_Code')); ?></th>
                                <th><?php echo e(__('translate.Currency_Name')); ?></th>
                                <th><?php echo e(__('translate.Symbol')); ?></th>
                                <th><?php echo e(__('translate.Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td @click="selected_row( <?php echo e($currency->id); ?>)"></td>
                                <td><?php echo e($currency->code); ?></td>
                                <td><?php echo e($currency->name); ?></td>
                                <td><?php echo e($currency->symbol); ?></td>
                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency')): ?>
                                    <a @click="Edit_Currency( <?php echo e($currency); ?>)" class="ul-link-action text-success"
                                        data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="i-Edit"></i>
                                    </a>
                                    <a @click="Remove_Currency( <?php echo e($currency->id); ?>)"
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

        <!-- Modal Add & Edit Currency -->
        <div class="modal fade" id="Currency_Modal" tabindex="-1" role="dialog" aria-labelledby="Currency_Modal"
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

                        <form @submit.prevent="editmode?Update_Currency():Create_Currency()">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="ul-form__label"><?php echo e(__('translate.Currency_Name')); ?> <span
                                            class="field_required">*</span></label>
                                    <input type="text" v-model="currency.name" class="form-control" name="name"
                                        id="name" placeholder="<?php echo e(__('translate.Enter_Currency_Name')); ?>">
                                    <span class="error" v-if="errors && errors.name">
                                        {{ errors.name[0] }}
                                    </span>
                                </div>

                                <div class="col-md-6">
                                    <label for="code" class="ul-form__label"><?php echo e(__('translate.Currency_Code')); ?> <span
                                            class="field_required">*</span></label>
                                    <input type="text" v-model="currency.code" class="form-control" id="code" id="code"
                                        placeholder="<?php echo e(__('translate.Enter_Currency_Code')); ?>">
                                    <span class="error" v-if="errors && errors.code">
                                        {{ errors.code[0] }}
                                    </span>
                                </div>


                                <div class="col-md-6">
                                    <label for="symbol" class="ul-form__label"><?php echo e(__('translate.Currency_Symbol')); ?>

                                        <span class="field_required">*</span></label>
                                    <input type="text" v-model="currency.symbol" class="form-control" id="symbol"
                                        placeholder="<?php echo e(__('translate.Enter_currency_symbol')); ?>">
                                    <span class="error" v-if="errors && errors.symbol">
                                        {{ errors.symbol[0] }}
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
    var app = new Vue({
        el: '#section_Currency_list',
        data: {
            selectedIds:[],
            data: new FormData(),
            editmode: false,
            SubmitProcessing:false,
            errors:[],
            currencies: {}, 
            currency: {
                name: "",
                code: "",
                symbol: "",
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

            //------------------------------ Show Modal (Create Currency) -------------------------------\\
            New_Currency() {
                this.reset_Form();
                this.editmode = false;
                $('#Currency_Modal').modal('show');
            },

            //------------------------------ Show Modal (Update currency) -------------------------------\\
            Edit_Currency(currency) {
                this.editmode = true;
                this.reset_Form();
                this.currency = currency;
                $('#Currency_Modal').modal('show');
            },

            //----------------------------- Reset Form ---------------------------\\
            reset_Form() {
                this.currency = {
                    id: "",
                    name: "",
                    code: "",
                    symbol: "",
                };
                this.errors = {};
            },
            
            //------------------------ Create currency ---------------------------\\
            Create_Currency() {
                var self = this;
                self.SubmitProcessing = true;
                axios.post("/settings/currency", {
                    name: self.currency.name,
                    code: self.currency.code,
                    symbol: self.currency.symbol
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/settings/currency'; 
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

           //----------------------- Update Currency ---------------------------\\
            Update_Currency() {
                var self = this;
                self.SubmitProcessing = true;
                axios.put("/settings/currency/" + self.currency.id, {
                    name: self.currency.name,
                    code: self.currency.code,
                    symbol: self.currency.symbol
                }).then(response => {
                        self.SubmitProcessing = false;
                        window.location.href = '/settings/currency'; 
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

             //--------------------------------- Remove Currency ---------------------------\\
            Remove_Currency(id) {

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
                            .delete("/settings/currency/" + id)
                            .then(() => {
                                window.location.href = '/settings/currency'; 
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
                        .post("/settings/currency/delete/by_selection", {
                            selectedIds: self.selectedIds
                        })
                            .then(() => {
                                window.location.href = '/settings/currency'; 
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

    $('#currency_list_table').DataTable( {
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/settings/currency/currency_list.blade.php ENDPATH**/ ?>