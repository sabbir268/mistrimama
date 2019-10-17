<header class="site-header">
    <div class="container-fluid">
        <a href="<?php echo e(asset('/')); ?>" class="site-logo">
            <img class="hidden-md-down" src="<?php echo e(asset('dashboard/img/newlogokom.png')); ?>" alt="">
            <img class="hidden-lg-down" src="<?php echo e(asset('dashboard/img/newlogokom.png')); ?>" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    

                    

                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="<?php echo e(auth()->user()->photo != null ? auth()->user()->photo : asset('dashboard/img/avatar-2-64.png')); ?>"
                                alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="<?php echo e(route('user.edit-info')); ?>"><span
                                    class="font-icon glyphicon glyphicon-user"></span>Profile</a>
                            <a class="dropdown-item" href="<?php echo e(route('user.edit-info')); ?>"><span
                                    class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                            <a class="dropdown-item" href="#"><span
                                    class="font-icon glyphicon glyphicon-question-sign"></span>Help</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><span
                                    class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div>
                <!--.site-header-shown-->
                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        
                        <?php if(checkRole(auth()->user()->id, 'special')): ?>
                        <div class="dropdown dropdown-typical">
                            <button class="btn btn-mm">Refer Code is: <b><?php echo e(auth()->user()->ref_code); ?></button>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                    <!--.site-header-collapsed-in-->
                </div>
                <!--.site-header-collapsed-->
            </div>
            <!--site-header-content-in-->
        </div>
        <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
</header>