<div class="main-header">
    <div class="logo">
        <a href="/"><img src="<?php echo e(asset('assets/images/'.$setting->logo)); ?>" alt=""></a>
    </div>

    <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div class="margin_auto"></div>

    <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>
        <!-- Grid menu Dropdown -->
        <div class="dropdown widget_dropdown">
            <i class="i-Globe text-muted header-icon" role="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"></i>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <div class="menu-icon-grid">
                    <a href="<?php echo e(route('language.switch','en')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/gb.svg')); ?>">English
                    </a>
                    <a href="<?php echo e(route('language.switch','fr')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/fr.svg')); ?>">Frensh
                    </a>
                    <a href="<?php echo e(route('language.switch','ar')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/sa.svg')); ?>">Arabic
                    </a>
                    <a href="<?php echo e(route('language.switch','tr')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/tr.svg')); ?>">Turkish
                    </a>
                    <a href="<?php echo e(route('language.switch','th')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/th.svg')); ?>">Thaï
                    </a>
                    <a href="<?php echo e(route('language.switch','hn')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/in.svg')); ?>">Hindi
                    </a>
                    <a href="<?php echo e(route('language.switch','es')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/es.svg')); ?>">Spanish
                    </a>
                    <a href="<?php echo e(route('language.switch','it')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/it.svg')); ?>">Italien
                    </a>
                    <a href="<?php echo e(route('language.switch','id')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/id.svg')); ?>">Indonesian
                    </a>
                    <a href="<?php echo e(route('language.switch','vn')); ?>">
                        <img class="flag-icon" src="<?php echo e(asset('assets/flags/vn.svg')); ?>">Vietnamese
                    </a>
                </div>
            </div>
        </div>
     
        <!-- User avatar dropdown -->
        <div class="dropdown">
            <div class="user col align-self-end">
                <img src="<?php echo e(asset('assets/images/avatar/'.Auth::user()->avatar)); ?>" id="userDropdown" alt="" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-header">
                        <i class="i-Lock-User mr-1"></i> <?php echo e(Auth::user()->username); ?>

                    </div>
                    <?php if(auth()->user()->role_users_id == 1): ?>
                    <a class="dropdown-item" href="<?php echo e(route('profile.index')); ?>"><?php echo e(__('translate.Profile')); ?></a>
                    <?php elseif(auth()->user()->role_users_id == 3): ?>
                    <a class="dropdown-item" href="<?php echo e(route('client_profile')); ?>"><?php echo e(__('translate.Profile')); ?></a>
                    <?php else: ?>
                    <a class="dropdown-item" href="<?php echo e(route('employee_profile')); ?>"><?php echo e(__('translate.Profile')); ?></a>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings')): ?>
                        <a class="dropdown-item" href="<?php echo e(route('system_settings.index')); ?>"><?php echo e(__('translate.System_Settings')); ?></a>
                    <?php endif; ?>
                   
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <?php echo e(__('Logout')); ?>

                    </a>

                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- header top menu end --><?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/layouts/large-vertical-sidebar/header.blade.php ENDPATH**/ ?>