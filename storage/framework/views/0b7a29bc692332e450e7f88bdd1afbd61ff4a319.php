
<?php $__env->startSection('main-content'); ?>
<?php $__env->startSection('page-css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/datatables.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="breadcrumb">
    <h1><?php echo e(__('translate.Task_List')); ?></h1>
    <ul>
        <li><?php echo e(__('translate.Task')); ?></li>
        <li><?php echo e(__('translate.Task_Details')); ?></li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

<section class="ul-product-detail__tab" id="section_details_Task">
    <div class="row">
        <div class="col-lg-12 col-md-12 mt-4">
            <div class="card mt-2 mb-4 ">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <a class="nav-item nav-link active show" id="nav-discussions-tab" data-toggle="tab"
                                href="#nav-discussions" role="tab" aria-controls="nav-discussions"
                                aria-selected="false"><?php echo e(__('translate.Discussions')); ?></a>

                            <a class="nav-item nav-link" id="nav-documents-tab" data-toggle="tab" href="#nav-documents"
                                role="tab" aria-controls="nav-documents"
                                aria-selected="false"><?php echo e(__('translate.Documents')); ?></a>

                        </div>
                    </nav>
                    <div class="tab-content ul-tab__content p-3" id="nav-tabContent">

                        
                        <div class="tab-pane fade active show" id="nav-discussions" role="tabpanel"
                            aria-labelledby="nav-discussions-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="New_Discussion"><i
                                                    class="i-Add text-white mr-2"></i>
                                                <?php echo e(__('translate.Add_Discussion')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                               >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Created_by')); ?></th>
                                                        <th><?php echo e(__('translate.Message')); ?></th>
                                                        <th><?php echo e(__('translate.Date')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $discussions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discussion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($discussion->User->username); ?></td>
                                                        <td><?php echo e($discussion->message); ?></td>
                                                        <td><?php echo e($discussion->created_at); ?></td>
                                                        <td>
                                                            <a @click="Remove_Discussion( <?php echo e($discussion->id); ?>)"
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

                                    <!-- Modal Add  Discussion -->
                                    <div class="modal fade" id="Discussion_Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="Discussion_Modal" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form @submit.prevent="Create_Discussion()">
                                                        <div class="row">

                                                            <div class="col-md-12">
                                                                <label for="message"
                                                                    class="ul-form__label"><?php echo e(__('translate.Message')); ?>

                                                                    <span class="field_required">*</span></label>
                                                                <textarea type="text" v-model="discussion.message"
                                                                    class="form-control" name="message" id="message"
                                                                    placeholder="<?php echo e(__('translate.Enter_Message')); ?>"></textarea>

                                                                <span class="error"
                                                                    v-if="errors_Discussion && errors_Discussion.message">
                                                                    {{ errors_Discussion.message[0] }}
                                                                </span>
                                                            </div>

                                                        </div>


                                                        <div class="row mt-3">

                                                            <div class="col-md-6">
                                                                <button type="submit" class="btn btn-primary"
                                                                    :disabled="Submit_Processing_Discussion">
                                                                    <?php echo e(__('translate.Submit')); ?>

                                                                </button>
                                                                <div v-once class="typo__p"
                                                                    v-if="Submit_Processing_Discussion">
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



                        
                        <div class="tab-pane fade" id="nav-documents" role="tabpanel"
                            aria-labelledby="nav-documents-tab">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="text-left bg-transparent">
                                            <a class="btn btn-primary btn-md m-2" @click="New_Document"><i
                                                    class="i-Add text-white mr-2"></i>
                                                <?php echo e(__('translate.New_Document')); ?></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="ul-contact-list" class="display table data_datatable"
                                               >
                                                <thead>
                                                    <tr>
                                                        <th><?php echo e(__('translate.Title')); ?></th>
                                                        <th><?php echo e(__('translate.Description')); ?></th>
                                                        <th><?php echo e(__('translate.Attachment')); ?></th>
                                                        <th><?php echo e(__('translate.Created_At')); ?></th>
                                                        <th><?php echo e(__('translate.Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($document->title); ?></td>
                                                        <td><?php echo e($document->description); ?></td>
                                                        <td>
                                                            <?php if($document->attachment): ?>
                                                            <span><a href="<?php echo e(asset('assets/images/tasks/documents/'.$document->attachment)); ?>"
                                                                    target="_blank">
                                                                    <?php echo e($document->attachment); ?></a>
                                                            </span>
                                                            <?php else: ?>
                                                            <span>__</span>
                                                            <?php endif; ?>

                                                        </td>

                                                        <td><?php echo e($document->created_at); ?></td>
                                                        <td>
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

                                    <!-- Modal Add Document -->
                                    <div class="modal fade" id="Document_Modal" tabindex="-1" role="dialog"
                                        aria-labelledby="Document_Modal" aria-hidden="true">
                                        <div class="modal-dialog modal-md" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"><?php echo e(__('translate.Create')); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form @submit.prevent="Create_Document()">
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
                                                                <label for="description" class="ul-form__label">
                                                                    <?php echo e(__('translate.Please_provide_any_details')); ?>

                                                                </label>
                                                                <textarea type="text" v-model="document.description"
                                                                    class="form-control" name="description"
                                                                    id="description"
                                                                    placeholder="<?php echo e(__('translate.Please_provide_any_details')); ?>"></textarea>

                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="attachment"
                                                                    class="ul-form__label"><?php echo e(__('translate.Attachment')); ?></label>
                                                                <input name="attachment" @change="change_Document"
                                                                    type="file" class="form-control mb-3"
                                                                    id="attachment">
                                                                <span class="error"
                                                                    v-if="errors_document && errors_document.attachment">
                                                                    {{ errors_document.attachment[0] }}
                                                                </span>
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


                    </div>
                </div>
            </div>
        </div>
</section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-js'); ?>
<script src="<?php echo e(asset('assets/js/vendor/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatables.script.js')); ?>"></script>

<script>
    var app = new Vue({
    el: '#section_details_Task',
   
    data: {
        
        Submit_Processing_Discussion:false,
        errors_Discussion:[],

        document_data: new FormData(),
        Submit_Processing_document:false,
        errors_document:[],

        documents:<?php echo json_encode($documents, 15, 512) ?>,
        document: {
            title: "",
            description: "",
            attachment: "",
        }, 

        task:<?php echo json_encode($task, 15, 512) ?>,
        discussions:<?php echo json_encode($discussions, 15, 512) ?>,
        discussion: {
            message: "",
        }, 

    },
   
   
    methods: {



        //------------------------ Discussions ---------------------------------------------------------------------------------------------\\
       

            New_Discussion() {
                this.reset_Form_discussion();
                $('#Discussion_Modal').modal('show');
            },

            //----------------------------- reset_Form_discussion---------------------------\\
            reset_Form_discussion() {
            this.discussion = {
                id: "",
                message: "",
            };
            this.errors_Discussion = {};
        },

            //------------------------ Create Discussion ---------------------------\\
            Create_Discussion() {
                var self = this;
                self.Submit_Processing_Discussion = true;
                axios.post("/task_discussions", {
                    message: self.discussion.message,
                    task_id: self.task.id,
                }).then(response => {
                        self.Submit_Processing_Discussion = false;
                        window.location.href = '/tasks/'+ self.task.id; 
                        toastr.success('<?php echo e(__('translate.Created_in_successfully')); ?>');
                        self.errors_Discussion = {};
                })
                .catch(error => {
                    self.Submit_Processing_Discussion = false;
                    if (error.response.status == 422) {
                        self.errors_Discussion = error.response.data.errors;
                    }
                    toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                });
            },


             //--------------------------------- Remove Discussion ---------------------------\\
            Remove_Discussion(id) {

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
                            .delete("/task_discussions/" + id)
                            .then(() => {
                                location.reload();
                                toastr.success('<?php echo e(__('translate.Deleted_in_successfully')); ?>');

                            })
                            .catch(() => {
                                toastr.error('<?php echo e(__('translate.There_was_something_wronge')); ?>');
                            });
                    });
                },

         
                
//--------------------------------------------- Document-----------------------------------------------------------\\
       

       
            change_Document(e){
                let file = e.target.files[0];
                this.document.attachment = file;
            },

            //------------------------------ Show Modal (Create Document) -------------------------------\\
            New_Document() {
                this.Reset_Form_Document();
                $('#Document_Modal').modal('show');
            },

              //----------------------------- Reset_Form_Document---------------------------\\
              Reset_Form_Document() {
                this.document = {
                    id: "",
                    title: "",
                    description:"",
                    attachment:"",
                };
                this.errors_document = {};
            },

             //------------------------ Create Document ---------------------------\\
             Create_Document() {
                var self = this;
                self.Submit_Processing_document = true;
                self.document_data.append("task_id", self.task.id);
                self.document_data.append("title", self.document.title);
                self.document_data.append("description", self.document.description);
                self.document_data.append("attachment", self.document.attachment);
                axios
                    .post("/task_documents", self.document_data)
                    .then(response => {
                        self.Submit_Processing_document = false;
                        window.location.href = '/tasks/'+ self.task.id; 
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

         
             //--------------------------------- Remove Document ---------------------------\\
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
                        axios.delete("/task_documents/" + id)
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
            "processing": true, // for show progress bar
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/task/task_details.blade.php ENDPATH**/ ?>