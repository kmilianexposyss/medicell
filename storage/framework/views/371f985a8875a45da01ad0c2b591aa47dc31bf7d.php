<?php $plugins = \Nwidart\Modules\Facades\Module::allEnabled(); ?>
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <?php if(auth()->user()->role_users_id == 1): ?>
                <li class="nav-item <?php echo e(request()->is('dashboard/admin') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/dashboard/admin">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('translate.Dashboard')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php elseif(auth()->user()->role_users_id == 3): ?>
                <li class="nav-item <?php echo e(request()->is('dashboard/client') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/dashboard/client">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('translate.Dashboard')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php else: ?>
                <li class="nav-item <?php echo e(request()->is('dashboard/employee') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/dashboard/employee">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('translate.Dashboard')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->role_users_id != 1 && auth()->user()->role_users_id != 3): ?>
                <li class="nav-item <?php echo e(request()->is('employee/overview') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/employee/overview">
                        <i class="nav-icon i-Bar-Chart"></i>
                        <span class="nav-text"><?php echo e(__('translate.Overview')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->role_users_id == 3): ?>
                <li class="nav-item <?php echo e(request()->is('client_projects') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/client_projects">
                        <i class="nav-icon i-Dropbox"></i>
                        <span class="nav-text"><?php echo e(__('translate.Projects')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>

                <li class="nav-item <?php echo e(request()->is('client_tasks') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/client_tasks">
                        <i class="nav-icon i-Check"></i>
                        <span class="nav-text"><?php echo e(__('translate.Tasks')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_view')): ?>
                <li class="nav-item <?php echo e(request()->is('projects') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/projects">
                        <i class="nav-icon i-Dropbox"></i>
                        <span class="nav-text"><?php echo e(__('translate.Projects')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_view')): ?>
                <li class="nav-item <?php echo e(request()->is('tasks') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/tasks">
                        <i class="nav-icon i-Check"></i>
                        <span class="nav-text"><?php echo e(__('translate.Tasks')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('office_shift_view') ||
    auth()->user()->can('event_view') ||
    auth()->user()->can('holiday_view') ||
    auth()->user()->can('award_view') ||
    auth()->user()->can('complaint_view') ||
    auth()->user()->can('travel_view')): ?>
                <li class="nav-item <?php echo e(request()->is('hr/*') ? 'active' : ''); ?>" data-item="hr">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Library"></i>
                        <span class="nav-text"><?php echo e(__('translate.Hr_Management')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(View::exists(strtolower($item) . '::layouts.large-vertical-sidebar.sidebar')): ?>
                    <?php echo $__env->make(strtolower($item) . '::layouts.large-vertical-sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <?php if(auth()->user()->can('company_view') ||
    auth()->user()->can('department_view') ||
    auth()->user()->can('designation_view') ||
    auth()->user()->can('policy_view') ||
    auth()->user()->can('announcement_view')): ?>
                <li class="nav-item <?php echo e(request()->is('core/*') ? 'active' : ''); ?>" data-item="core">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Management"></i>
                        <span class="nav-text"><?php echo e(__('translate.Company_Management')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_view')): ?>
                <li class="nav-item <?php echo e(request()->is('/users') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/users">
                        <i class="nav-icon i-Business-Mens"></i>
                        <span class="nav-text"><?php echo e(__('translate.User_Controller')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('employee_view') ||
    auth()->user()->can('employee_add')): ?>
                <li class="nav-item <?php echo e(request()->is('employees') || request()->is('employees/*') ? 'active' : ''); ?>"
                    data-item="employees">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Engineering"></i>
                        <span class="nav-text"><?php echo e(__('translate.Employees')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>




            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('client_view')): ?>
                <li class="nav-item <?php echo e(request()->is('clients') ? 'active' : ''); ?>">
                    <a class="nav-item-hold" href="/clients">
                        <i class="nav-icon i-Boy"></i>
                        <span class="nav-text"><?php echo e(__('translate.Clients')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>





            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance_view')): ?>
                <li class="nav-item <?php echo e(request()->is('daily_attendance') || request()->is('attendances/*') ? 'active' : ''); ?>"
                    data-item="attendances">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Clock"></i>
                        <span class="nav-text"><?php echo e(__('translate.Attendance')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('account_view') ||
    auth()->user()->can('deposit_view') ||
    auth()->user()->can('expense_view') ||
    auth()->user()->can('expense_category') ||
    auth()->user()->can('deposit_category') ||
    auth()->user()->can('payment_method')): ?>
                <li class="nav-item <?php echo e(request()->is('accounting') || request()->is('accounting/*') ? 'active' : ''); ?>"
                    data-item="accounting">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Financial"></i>
                        <span class="nav-text"><?php echo e(__('translate.Accounting')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('leave_view') ||
    auth()->user()->can('leave_type')): ?>
                <li class="nav-item <?php echo e(request()->is('leave') || request()->is('leave_type') ? 'active' : ''); ?>"
                    data-item="leave">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Calendar"></i>
                        <span class="nav-text"><?php echo e(__('translate.Leave_Request')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('training_view') ||
    auth()->user()->can('trainer') ||
    auth()->user()->can('training_skills')): ?>
                <li class="nav-item <?php echo e(request()->is('trainings') || request()->is('trainers') || request()->is('training_skills') ? 'active' : ''); ?>"
                    data-item="training">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Windows-Microsoft"></i>
                        <span class="nav-text"><?php echo e(__('translate.Training')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>


            <?php if(auth()->user()->can('settings') ||
    auth()->user()->can('group_permission') ||
    auth()->user()->can('currency') ||
    auth()->user()->can('backup') ||
    auth()->user()->can('module_settings')): ?>
                <li class="nav-item <?php echo e(request()->is('settings/*') ? 'active' : ''); ?>" data-item="settings">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Data-Settings"></i>
                        <span class="nav-text"><?php echo e(__('translate.Settings')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('attendance_report') ||
    auth()->user()->can('employee_report') ||
    auth()->user()->can('project_report') ||
    auth()->user()->can('task_report') ||
    auth()->user()->can('expense_report') ||
    auth()->user()->can('deposit_report')): ?>
                <li class="nav-item <?php echo e(request()->is('report/*') ? 'active' : ''); ?>" data-item="report">
                    <a class="nav-item-hold" href="#">
                        <i class="nav-icon i-Line-Chart"></i>
                        <span class="nav-text"><?php echo e(__('translate.Reports')); ?></span>
                    </a>
                    <div class="triangle"></div>
                </li>
            <?php endif; ?>





        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar data-suppress-scroll-x="true">
        <?php echo $__env->yieldContent('childNav'); ?>
        <!-- Submenu Employee -->
        <ul class="childNav" data-parent="employees">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_add')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'employees.create' ? 'open' : ''); ?>"
                        href="<?php echo e(route('employees.create')); ?>">
                        <i class="nav-icon i-Add-User"></i>
                        <span class="item-name"><?php echo e(__('translate.Create_Employee')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('employees.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'employees.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Business-Mens"></i>
                        <span class="item-name"><?php echo e(__('translate.Employee_List')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

        </ul>



        <!-- Submenu Attendance -->
        <ul class="childNav" data-parent="attendances">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'daily_attendance' ? 'open' : ''); ?>"
                        href="<?php echo e(route('daily_attendance')); ?>">
                        <i class="nav-icon i-Clock"></i>
                        <span class="item-name"><?php echo e(__('translate.Daily_Attendance')); ?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('attendances.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'attendances.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Clock-4"></i>
                        <span class="item-name"><?php echo e(__('translate.Attendances')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>


        <!-- Submenu Hr Management -->
        <ul class="childNav" data-parent="core">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('company_view')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'company.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('company.index')); ?>">
                        <i class="nav-icon i-Management"></i>
                        <span class="item-name"><?php echo e(__('translate.Company')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('department_view')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'departments.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('departments.index')); ?>">
                        <i class="nav-icon i-Shop"></i>
                        <span class="item-name"><?php echo e(__('translate.Departments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('designation_view')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'designations.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('designations.index')); ?>">
                        <i class="nav-icon i-Shutter"></i>
                        <span class="item-name"><?php echo e(__('translate.Designations')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('policy_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('policies.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'policies.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Danger"></i>
                        <span class="item-name"><?php echo e(__('translate.Policies')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('announcement_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'announcements.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('announcements.index')); ?>">
                        <i class="nav-icon i-Letter-Open"></i>
                        <span class="item-name"><?php echo e(__('translate.Announcements')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Submenu accounting -->
        <ul class="childNav" data-parent="accounting">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('account_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('account.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'account.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Financial"></i>
                        <span class="item-name"><?php echo e(__('translate.Account')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deposit_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('deposit.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'deposit.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Money-2"></i>
                        <span class="item-name"><?php echo e(__('translate.Deposit')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('expense.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'expense.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Money-Bag"></i>
                        <span class="item-name"><?php echo e(__('translate.Expense')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('expense_category') ||
    auth()->user()->can('deposit_category') ||
    auth()->user()->can('payment_method')): ?>
                <li class="nav-item dropdown-sidemenu">
                    <a>
                        <i class="nav-icon i-Gear"></i>
                        <span class="item-name"><?php echo e(__('translate.Account_Settings')); ?></span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_category')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'expense_category.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('expense_category.index')); ?>"><?php echo e(__('translate.Expense_Category')); ?></a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deposit_category')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'deposit_category.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('deposit_category.index')); ?>"><?php echo e(__('translate.Deposit_Category')); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment_method')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'payment_methods.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('payment_methods.index')); ?>"><?php echo e(__('translate.Payment_Methods')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>

        <!-- Submenu Request Leave -->
        <ul class="childNav" data-parent="leave">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leave_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'leave.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('leave.index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Request_leave')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('leave_type')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'leave_type.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('leave_type.index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Leave_Type')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Submenu Training -->
        <ul class="childNav" data-parent="training">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('training_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'trainings.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('trainings.index')); ?>">
                        <i class="nav-icon i-Windows-Microsoft"></i>
                        <span class="item-name"><?php echo e(__('translate.Training_List')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('trainer')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'trainers.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('trainers.index')); ?>">
                        <i class="nav-icon i-Business-Mens"></i>
                        <span class="item-name"><?php echo e(__('translate.Trainers')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('training_skills')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'training_skills.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('training_skills.index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Training_Skills')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <!-- Submenu HR -->
        <ul class="childNav" data-parent="hr">

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('office_shift_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('office_shift.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'office_shift.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Clock"></i>
                        <span class="item-name"><?php echo e(__('translate.Office_Shift')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('event_view')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('event.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'event.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Clock-4"></i>
                        <span class="item-name"><?php echo e(__('translate.Events')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('holiday_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'holiday.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('holiday.index')); ?>">
                        <i class="nav-icon i-Christmas-Bell"></i>
                        <span class="item-name"><?php echo e(__('translate.Holidays')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('award_view') ||
    auth()->user()->can('award_type')): ?>
                <li class="nav-item dropdown-sidemenu">
                    <a>
                        <i class="nav-icon i-Gift-Box"></i>
                        <span class="item-name"><?php echo e(__('translate.Awards')); ?></span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('award_view')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'award.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('award.index')); ?>"><?php echo e(__('translate.Award_List')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('award_type')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'award_type.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('award_type.index')); ?>"><?php echo e(__('translate.Award_Type')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('complaint_view')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'complaint.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('complaint.index')); ?>">
                        <i class="nav-icon i-Danger"></i>
                        <span class="item-name"><?php echo e(__('translate.Complaints')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if(auth()->user()->can('travel_view') ||
    auth()->user()->can('arrangement_type')): ?>
                <li class="nav-item dropdown-sidemenu">
                    <a>
                        <i class="nav-icon i-Map-Marker"></i>
                        <span class="item-name"><?php echo e(__('translate.Travels')); ?></span>
                        <i class="dd-arrow i-Arrow-Down"></i>
                    </a>
                    <ul class="submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('travel_view')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'travel.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('travel.index')); ?>"><?php echo e(__('translate.Travel_List')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('arrangement_type')): ?>
                            <li><a class="<?php echo e(Route::currentRouteName() == 'arrangement_type.index' ? 'open' : ''); ?>"
                                    href="<?php echo e(route('arrangement_type.index')); ?>"><?php echo e(__('translate.Arrangement_Type')); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

        </ul>


       

        <!-- Submenu settings -->
        <ul class="childNav" data-parent="settings">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'system_settings.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('system_settings.index')); ?>">
                        <i class="nav-icon i-Gear"></i>
                        <span class="item-name"><?php echo e(__('translate.System_Settings')); ?></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'update_settings.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('update_settings.index')); ?>">
                        <i class="nav-icon i-Data"></i>
                        <span class="item-name"><?php echo e(__('translate.Update_Log')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('module_settings')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName()=='module_settings.index' ? 'open' : ''); ?>"
                href="<?php echo e(route('module_settings.index')); ?>">
                <i class="nav-icon i-Clock-3"></i>
                <span class="item-name"><?php echo e(__('translate.Module_settings')); ?></span>
                </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('group_permission')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('permissions.index')); ?>"
                        class="<?php echo e(Route::currentRouteName() == 'permissions.index' ? 'open' : ''); ?>">
                        <i class="nav-icon i-Lock-2"></i>
                        <span class="item-name"><?php echo e(__('translate.Permissions')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'currency.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('currency.index')); ?>">
                        <i class="nav-icon i-Dollar-Sign"></i>
                        <span class="item-name"><?php echo e(__('translate.Currency')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backup')): ?>
                <li class="nav-item">
                    <a class="<?php echo e(Route::currentRouteName() == 'backup.index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('backup.index')); ?>">
                        <i class="nav-icon i-Download"></i>
                        <span class="item-name"><?php echo e(__('translate.Backup')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>


        <!-- Submenu Reports -->
        <ul class="childNav" data-parent="report">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attendance_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'attendance_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('attendance_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Attendance_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('employee_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'employee_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('employee_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Employee_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('project_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'project_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('project_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Project_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'task_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('task_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Task_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expense_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'expense_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('expense_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Expense_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('deposit_report')): ?>
                <li class="nav-item ">
                    <a class="<?php echo e(Route::currentRouteName() == 'deposit_report_index' ? 'open' : ''); ?>"
                        href="<?php echo e(route('deposit_report_index')); ?>">
                        <i class="nav-icon i-Wallet"></i>
                        <span class="item-name"><?php echo e(__('translate.Deposit_Report')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>




        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
<!--=============== Left side End ================-->
<?php /**PATH /var/www/vhosts/exposyss.com/medicell.exposyss.com/resources/views/layouts/large-vertical-sidebar/sidebar.blade.php ENDPATH**/ ?>