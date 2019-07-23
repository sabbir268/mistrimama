<div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
        <a href="<?php echo e(route('admin.dashboard')); ?>">
            <img style='width: 60px;' src="<?php echo e(asset('/admin/img/newlogokom.png')); ?>" alt="<?php echo e(env('APP_NAME')); ?>" class="logo-default" />
        </a>
        <div class="menu-toggler sidebar-toggler">
            <span></span>
        </div>
    </div                                                            >
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        <span></span>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
        <ul class="nav navbar-nav pull-right">
            
            
<!--            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                    <span class="badge badge-default"> 7 </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                        <h3>
                            <span class="bold">12 pending</span> notifications</h3>
                        <a href=" ">view all</a>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                            <li>
                                <a href="javascript:;">
                                    <span class="time">just now</span>
                                    <span class="details">
                                        <span class="label label-sm label-icon label-success">
                                            <i class="fa fa-plus"></i>
                                        </span> New user registered. </span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="time">3 mins</span>
                                    <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                            <i class="fa fa-bolt"></i>
                                        </span> Server #12 overloaded. </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:;">
                                    <span class="time">9 days</span>
                                    <span class="details">
                                        <span class="label label-sm label-icon label-danger">
                                            <i class="fa fa-bolt"></i>
                                        </span> Storage server failed. </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>-->
            
            
            <!-- END NOTIFICATION DROPDOWN -->
            <!-- BEGIN INBOX DROPDOWN -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->


            <li class="dropdown dropdown-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="<?php echo e(asset('/admin/img/avatar3_small.jpg')); ?>" />
                    <span class="username username-hide-on-mobile"> <?php echo e(Auth::user()->name); ?> </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-default">
                    <li>
                        <a href="<?php echo e(route('profile')); ?>">
                            <i class="fa fa-user"></i>Profile</a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('adminchangepassword')); ?>">
                            <i class="fa fa-user"></i>Change Password </a>
                    </li>

                    <li>
                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Log Out 
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
            <li class="dropdown dropdown-quick-sidebar-toggler">
                <a  href="<?php echo e(route('logout')); ?>" class="dropdown-toggle" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
            <!-- END QUICK SIDEBAR TOGGLER -->
        </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
</div>