<!-- Footer Start -->
<div class="flex-grow-1"></div>
<div class="app-footer">
    <div class="row">
        <div class="col-md-9">
            <p><strong><?php echo e($setting->footer); ?></strong></p>
            <div class="footer-bottom border-top pt-3 d-flex flex-column flex-sm-row align-items-center">
                <img class="logo" src="<?php echo e(asset('assets/images/'.$setting->logo)); ?>" alt="">
                <div>
                    <p class="m-0">&copy; <?php echo date ('Y'); ?>  <?php echo e($setting->developed_by); ?> v1.3</p>
                    <p class="m-0">All rights reserved</p>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- fotter end --><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/layouts/common/footer.blade.php ENDPATH**/ ?>