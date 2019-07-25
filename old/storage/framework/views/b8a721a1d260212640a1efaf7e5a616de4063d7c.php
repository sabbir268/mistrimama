<div class="main-bar clearfix ">
    <div class="container">
        <div class="logo-header mostion">
            <div class="logo-header-inr"><a href="index.html"> <img src='<?php echo e(getConfigValue("home_logo")); ?>'
                        alt="MISTRI MAMA" title="MISTRI MAMA"> </a>
            </div>
        </div>
        <button data-target=".header-nav" data-toggle="collapse" type="button"
            class="navbar-toggle collapsed nav-top-slide-btn">
            <span class="sr-only">
                Toggle navigation </span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> </button>
        <button type="button" class="navbar-toggle nav-left-slide-btn">
            <span class="sr-only">
                Toggle navigation </span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> </button>
        <div class="header-nav navbar-collapse collapse ">

            <?php if(!Auth::check()): ?>
            <div class="extra-nav">
                <div class="extra-cell">
                    <a href="javascript:void(0);" class="btn btn-border btn-sm" data-redirect="yes" data-action="login"
                        data-toggle="modal" data-target="#login-Modal"><i class="fa fa-user"></i>
                        Login
                    </a>
                </div>
                <div class="extra-cell">
                    <a href="javascript:void(0);" class="btn btn-border btn-sm" data-toggle="modal" data-action="signup"
                        data-target="#login-Modal"><i class="fa fa-plus"></i>
                        Sign up
                    </a>
                </div>
            </div>
            <?php else: ?>
            <ul id="primary-menu" class="nav navbar-nav">
                <li id="menu-item-20"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20">
                    <a><?php echo e(Auth::user()->name); ?></a>
                    <ul class="sub-menu">
                        <li id="menu-item-1673"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1673">
                            <a href="<?php echo e(route('dashboard')); ?>">My Account</a>
                        </li>
                        <li id="menu-item-1668"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1668">
                            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </ul>
                </li>
            </ul>
            <?php endif; ?>


            <ul id="primary-menu" class="nav navbar-nav">
                <li id="menu-item-2697"
                    class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2697">
                    <a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="<?php echo e(url('/')); ?>#about">About Us</a>
                </li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="<?php echo e(url('/')); ?>#services">Our Service</a>
                </li>
                <li id="menu-item-2275"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2275">
                    <a href="#">Book Now</a>
                    <ul class="sub-menu">
                        <li id="menu-item-2276"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2276">
                            <a href="">Book Now</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(url('/electrical')); ?>">Electrical</a></li>
                                <li><a href="<?php echo e(url('/plumbing')); ?>">Plumbing Services</a></li>
                                <li><a href="<?php echo e(url('/generator')); ?>">Generator</a></li>
                                <li><a href="<?php echo e(url('/ict')); ?>">ICT</a></li>
                                <li><a href="<?php echo e(url('/cctv')); ?>">CCTV</a></li>
                                <li><a href="<?php echo e(url('/air-conditional')); ?>">Air Conditionar</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-2277"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2277">
                            <a href="<?php echo e(asset('assets/Grow_with_us_(B2B).pdf')); ?>">Book For Corporate</a>
                        </li>
                    </ul>
                </li>
                <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18">
                    <a href="<?php echo e(url('/contact')); ?>">Contact US</a>
                </li>
                <li id="menu-item-2696" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2696">
                    <a href="jobs/index.html">Jobs</a></li>
            </ul>
        </div>
        <div class="body-overlay" style="display: none;"></div>
    </div>
</div>