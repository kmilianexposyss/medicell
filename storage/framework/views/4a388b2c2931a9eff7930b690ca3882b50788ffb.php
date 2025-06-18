<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WorkTick | Setup</title>
    <link rel=icon href=<?php echo e(asset('/assets/images/logo.png')); ?>>
    <link rel="stylesheet" href="<?php echo e(asset('/assets_setup/css/bootstrap.css')); ?>">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('/assets_setup/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets_setup/css/fontawesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets_setup/css/font-awesome-animation.css')); ?>">

</head>
<body class="background">
<div>
    <div class="container-progress container">
        <div class="row text-center section-setup">
            <div class="col-12">
                <h1>WorkTick Setup</h1>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>


<script src="<?php echo e(asset('/assets_setup/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets_setup/js/tippy.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets_setup/js/scripts.js')); ?>"></script>

</body>
</html>
<?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/setup/main.blade.php ENDPATH**/ ?>