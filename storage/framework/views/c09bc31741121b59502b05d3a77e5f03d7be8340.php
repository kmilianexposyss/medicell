<?php $setting = DB::table('settings')->where('deleted_at', '=', null)->first(); ?>

<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel=icon href=<?php echo e(asset('assets/images/logo.png')); ?>>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title> WorkTick- Ultimate HRM & Project Management</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <?php echo $__env->yieldContent('before-css'); ?>
    


    <?php if(Session::get('layout') == 'vertical'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/metisMenu.min.css')); ?>">

    <?php endif; ?>
    <link id="worktick-theme" rel="stylesheet" href="<?php echo e(asset('assets\fonts\iconsmind\iconsmind.css')); ?>">
    <link id="worktick-theme" rel="stylesheet" href="<?php echo e(asset('assets/styles/css/themes/lite-purple.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/vue-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/styles/vendor/sweetalert2.min.css')); ?>">

    
    <?php echo $__env->yieldContent('page-css'); ?>
</head>






<body class="text-left">
    <?php
    $layout = session('layout');
    ?>

    <!-- Pre Loader Strat  -->
    <div class='loadscreen' id="preloader">

        <div class="loader spinner-bubble spinner-bubble-primary">

        </div>
    </div>
    <!-- Pre Loader end  -->

    <!-- ============ Large SIdebar Layout start ============= -->
    <?php if($layout=="normal"): ?>


    <?php echo $__env->make('layouts.large-vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- ============ Large Sidebar Layout End ============= -->

    <?php else: ?>
    <!-- ============Deafult  Large SIdebar Layout start ============= -->

    <?php echo $__env->make('layouts.large-vertical-sidebar.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- ============ Large Sidebar Layout End ============= -->

    <?php endif; ?>

    <!-- ============ Customizer UI Start ============= -->
    <?php echo $__env->make('layouts.common.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- ============ Customizer UI Start ============= -->

    
    <script src="<?php echo e(asset('assets/js/vue.js')); ?>"></script>

    
    <script src="<?php echo e(asset('assets/js/axios.js')); ?>"></script>

    
    <script src="<?php echo e(asset('assets/js/vue-select.js')); ?>"></script>



    
    <script src="<?php echo e(asset('assets/js/vendor/sweetalert2.min.js')); ?>"></script>


    
    <script src="<?php echo e(asset('assets/js/common-bundle-script.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('page-js'); ?>

    <script src="<?php echo e(asset('assets/js/script.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/js/vendor/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/toastr.script.js')); ?>"></script>

    <?php if($layout == 'compact'): ?>
    <script src="<?php echo e(asset('assets/js/sidebar.compact.script.js')); ?>"></script>


    <?php elseif($layout=='normal'): ?>
    <script src="<?php echo e(asset('assets/js/sidebar.large.script.js')); ?>"></script>


    <?php else: ?>
    <script src="<?php echo e(asset('assets/js/sidebar.large.script.js')); ?>"></script>

    <?php endif; ?>


    <script src="<?php echo e(asset('assets/js/customizer.script.js')); ?>"></script>


    <?php echo $__env->yieldContent('bottom-js'); ?>

</body>

</html><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/layouts/master.blade.php ENDPATH**/ ?>