<style>
    .btn-mm {
        border: 1px solid #f3b400;
        background-color: #f3b400;
        color: #fff !important;

    }

    .btn-mm-border {
        border: 1px solid #f3b400;
        background-color: transparent;
        font-size: 14px;
    }

    .btn-mm-border:hover {
        border: 1px solid #f3b400;
        background-color: #f3b400;
        color: #fff !important;
    }

    .btn-mm:hover {
        background-color: #fff !important;
        color: #f3b400 !important;
        border: 1px solid #f3b400 !important;;
    }

    .rawstyle {
        margin-left: 50px !important;
        margin: 0px
    }

    @media  only screen and (max-width: 600px) {
        .rawstyle {
            margin-left: 0px !important;
            margin: 0px
        }
    }

</style>
<div class="main-bar clearfix " style="    background: #ffffff96;">
    <div class="container">
        <div class="logo-header mostion rawstyle" style="">
            <div class="logo-header-inr"><a href="<?php echo e(asset('/')); ?>"> <img style="    max-width: 100%;height: 23%;"
                        src='<?php echo e(asset('/photos/1/a.png')); ?>' alt="MISTRI MAMA" title="MISTRI MAMA"> </a>
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
                    <a href="<?php echo e(asset('login')); ?>" class="btn btn-border btn-sm btn-mm-border" >
                        <i class="fa fa-user"></i>
                        <b>Login</b>
                    </a>
                </div>
                <div class="extra-cell">
                    <a href="<?php echo e(asset('register')); ?>" class="btn btn-border btn-sm btn-mm-border"><i class="fa fa-user-plus"></i>
                        <b>Sign up</b>
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
                
                <li id="menu-item-2697" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-home menu-item-2697">
                    <a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="<?php echo e(url('/about')); ?>">About Us</a>
                </li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="<?php echo e(url('/our-services')); ?>">Our Services</a>
                </li>
                <li id="menu-item-2275"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2275">
                    <a href="#">Book Now</a>
                    <ul class="sub-menu">
                        <li id="menu-item-2276"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2276">
                            <a href="">Book Now</a>
                            <ul class="sub-menu">
                                <li><a href="<?php echo e(url('/create-order/6')); ?>">AC Services</a></li>
                                <li><a href="<?php echo e(url('/create-order/1')); ?>">Electrical Services</a></li>
                                <li><a href="<?php echo e(url('/create-order/3')); ?>">Plumbing Services</a></li>
                                <li><a href="<?php echo e(url('/create-order/4')); ?>">IT Services</a></li>
                                <li><a href="<?php echo e(url('/create-order/5')); ?>">Generator Services</a></li>
                                <li><a href="<?php echo e(url('/create-order/2')); ?>">CCTV Services</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-2277"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2277">
                            <a href="<?php echo e(asset('Book_for_Corporate.pdf')); ?>">Book For Corporate</a>
                        </li>
                    </ul>
                </li>
                <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18">
                    <a href="<?php echo e(url('/contact')); ?>">Contact US</a>
                </li>
            </ul>
        </div>
        <div class="body-overlay" style="display: none;"></div>
    </div>
</div>

<script>
    var navbar = document.querySelector('.main-bar')

    window.addEventListener('scroll', function(e) {
    var lastPosition = window.scrollY
    if (lastPosition > 500 ) {
        navbar.style.backgroundColor = "#fff";
    } else {
         navbar.style.backgroundColor = "#ffffff96";
        // navbar.style.backgroundColor = "#ffffff00";
    }
    })
</script>