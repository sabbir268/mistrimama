<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        
        <li class="nav-item start  <?php echo e(menuActiveClass(['admin.dashboard'],false)); ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link nav-toggle">
                <i class="fa fa-dashboard"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>

            </a>
        </li>
        <?php if(checkRole(auth()->user()->id, 'admin') || checkRole(auth()->user()->id, 'accountant')): ?>
        <li class="nav-item start <?php echo e(menuActiveClass(['accounts'],true)); ?> ">
            <a href="#" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Cash Book</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accounts')); ?>" class="nav-link ">
                        <span class="title">New Entry</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.accounts.headings')); ?>" class="nav-link ">
                        <span class="title">New Headings</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item ">
            <a href="<?php echo e(route('admin.recharge.request')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Recharge Request</span>
                <span class="arrow "></span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="<?php echo e(route('admin.withdraw')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Cashout Request</span>
                <span class="arrow "></span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="<?php echo e(route('admin.service_provider.accounts')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Service Providers Accounts</span>
                <span class="arrow "></span>
            </a>
        </li>
        <?php endif; ?>

        <?php if(checkRole(auth()->user()->id, 'admin') || checkRole(auth()->user()->id, 'editor') ): ?>

        
        <li class="nav-item  <?php echo e(menuActiveClass(['service-provider'],true)); ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Service Provider</span>
                <span class="arrow <?php echo e(menuActiveClass(['service-provider'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['service-provider'],true)); ?> ">
                    <a href="<?php echo e(asset('/admin/service-provider')); ?>" class="nav-link ">
                        <span class="title">Manage Service Provider</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  <?php echo e(menuActiveClass(['booking'],true)); ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Booking</span>
                <span class="arrow <?php echo e(menuActiveClass(['booking'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['booking'],true)); ?> ">
                    <a href="<?php echo e(route('booking.index')); ?>" class="nav-link ">
                        <span class="title">Manage Booking</span>
                    </a>
                </li>

                <li class="nav-item <?php echo e(menuActiveClass(['booking'],true)); ?> ">
                    <a href="<?php echo e(route('booking.history')); ?>" class="nav-link ">
                        <span class="title">Booking History</span>
                    </a>
                </li>
            </ul>
        </li>

        

        <li class="nav-item">
            <a href="<?php echo e(route('register-users')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Registered Users</span>
                <span class="arrow <?php echo e(menuActiveClass(['booking'],false)); ?>"></span>
            </a>
        </li>


        <li class="nav-item">
            <a href="<?php echo e(url('admin/spf')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Add Service Partners</span>
                <span class="arrow <?php echo e(menuActiveClass(['booking'],false)); ?>"></span>
            </a>
        </li>

        <li class="nav-item">
            <a href="<?php echo e(route('admin.special-user')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Add Special User</span>
                <span class="arrow <?php echo e(menuActiveClass(['booking'],false)); ?>"></span>
            </a>
        </li>

        <li class="nav-item  <?php echo e(menuActiveClass(['cms'],true)); ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Pages</span>
                <span class="arrow <?php echo e(menuActiveClass(['cms'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['cms'],true)); ?> ">
                    <a href="<?php echo e(route('cms.index')); ?>" class="nav-link ">
                        <span class="title">Manage Page</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Sliders</span>
                <span class="arrow <?php echo e(menuActiveClass(['cms'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['cms'],true)); ?> ">
                    <a href="<?php echo e(url('admin/slider/big')); ?>" class="nav-link ">
                        <span class="title">Big Slider</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(menuActiveClass(['cms'],true)); ?> ">
                    <a href="<?php echo e(url('admin/slider/small')); ?>" class="nav-link ">
                        <span class="title">Small Slider</span>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-item  <?php echo e(menuActiveClass(['service-category','service-sub-category'],true)); ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Service Category</span>
                <span class="arrow <?php echo e(menuActiveClass(['service-category'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['service-category'],true)); ?> ">
                    <a href="<?php echo e(route('service-category.index')); ?>" class="nav-link ">
                        <span class="title">Manage Service Category</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(menuActiveClass(['service-sub-category'],true)); ?> ">
                    <a href="<?php echo e(route('service-sub-category.index')); ?>" class="nav-link ">
                        <span class="title">Manage Service Sub Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="<?php echo e(url('admin/career-show')); ?>" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Career</span>
                <span class="arrow <?php echo e(menuActiveClass(['booking'],false)); ?>"></span>
            </a>
        </li>
        <li class="nav-item  <?php echo e(menuActiveClass(['blogs','blog-category'],true)); ?> ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Blogs</span>
                <span class="arrow <?php echo e(menuActiveClass(['blog-category','blogs'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item <?php echo e(menuActiveClass(['blogs'],true)); ?> ">
                    <a href="<?php echo e(route('blogs.index')); ?>" class="nav-link ">
                        <span class="title">Manage Blogs</span>
                    </a>
                </li>
                <li class="nav-item <?php echo e(menuActiveClass(['blog-category'],true)); ?> ">
                    <a href="<?php echo e(route('blog-category.index')); ?>" class="nav-link ">
                        <span class="title">Manage Blog Category</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  <?php echo e(menuActiveClass(['faq','role','email-template','general-setting'],true)); ?>">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Settings</span>
                <span class="arrow <?php echo e(menuActiveClass(['role','email-template','general-setting'],true)); ?>"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item  <?php echo e(menuActiveClass(['general-setting'],true)); ?>">
                    <a href="<?php echo e(route('general-setting.index')); ?>" class="nav-link ">
                        <span class="title">General Setting</span>
                    </a>
                </li>

                <li class="nav-item  <?php echo e(menuActiveClass(['faq'],true)); ?>">
                    <a href="<?php echo e(route('faq.index')); ?>" class="nav-link ">
                        <span class="title">FAQ</span>
                    </a>
                </li>
            </ul>
        </li>

        <?php endif; ?>


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>