<?php $__env->startSection('content'); ?>
<style>
    .main-bar {
        /* background-color: #ffffff !important; */
    }

    .promotion {
        height: 78vh;
        background-color: #00000080;
        border-radius: 10px 10px;
    }

    .new-signup {
        background-image: url("<?php echo e(asset('slider-images/plumbing.webp')); ?>");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        margin-top: 0px !important;
    }

    .signup {
        background-color: #00000080;
         !important;
        height: 78vh;
    }

    .page-content {
        padding-bottom: 0px !important;
    }

    .socila-box{
        font-size: 16px;
        padding: 0% 14%;
    }
    .socila-box>li>a{
        color:#fff;
        opacity: 0.7;
    }

    .socila-box>li:hover>a{
        color: #f3b400;
        opacity: 1;
    }



    /* Base for label styling */
    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
    }

    [type="checkbox"]:not(:checked)+label,
    [type="checkbox"]:checked+label {
        position: relative;
        padding-left: 1.6em;
        cursor: pointer;
    }

    /* checkbox aspect */
    [type="checkbox"]:not(:checked)+label:before,
    [type="checkbox"]:checked+label:before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 1.32em;
        height: 1.2em;
        border: 2px solid #ccc;
        background: #fff;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, .1);
    }

    /* checked mark aspect */
    [type="checkbox"]:not(:checked)+label:after,
    [type="checkbox"]:checked+label:after {
        content: '\2713\0020';
        position: absolute;
        top: .15em;
        left: .22em;
        font-size: 1.3em;
        line-height: 0.8;
        color: #555555;
        transition: all .2s;
    }

    /* checked mark aspect changes */
    [type="checkbox"]:not(:checked)+label:after {
        opacity: 0;
        transform: scale(0);
    }

    [type="checkbox"]:checked+label:after {
        opacity: 1;
        transform: scale(1);
    }

    /* disabled checkbox */
    [type="checkbox"]:disabled:not(:checked)+label:before,
    [type="checkbox"]:disabled:checked+label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
    }

    [type="checkbox"]:disabled:checked+label:after {
        color: #999;
    }

    [type="checkbox"]:disabled+label {
        color: #aaa;
    }

    /* accessibility */
    .dropdown-toggle{
        margin: -1px 1px !important;
        border: 1px solid #f3b400 !important;
        border-left: 0px !important;

    }


    .mmtopforce{
        margin-top: 118px;
    }

    @media  only screen and (max-width: 768px) {
        .promotion {
            height: 34vh;
            margin: 17px;
        }

        .mmtopforce {
            margin-top: 90px;
        }
    }


</style>
<div class="page-content">
    <!-- inner page banner -->
    <!-- Breadcrumb  Templates Start -->

    
    <!--<div class="container">-->
    <!--  <ul class="list-inline">-->
    <!--    <li><a href="../index.html">-->
    <!--        Home </a></li>-->
    <!--    <li>Signup</li>-->
    <!--  </ul>-->
    <!--</div>-->
    
    <!-- Breadcrumb  Templates End -->
    <!-- Left & right section start -->

    <div class="section-content profiles-content new-signup">
        <div class="container">
            <div class="row mmtopforce" >
                <div class="col-md-8 promotion " style="    padding: 0px;">
                    <img style="padding: 9% 5%;opacity: 1;border-radius: 9px !important;"
                        src="<?php echo e(asset('uploads/promoimage/promo_image.png')); ?>" alt="" class="img-responsive">
                </div>
                <!-- Left part start -->
                <div class="col-md-4 ">
                    <!-- Signup Template -->
                    <!-- Content -->
                    <!-- Left & right section start -->
                    <div class="padding-20 margin-b-30  bg-white sf-rouned-box sf-register-page signup">
                        <div class="loginform_dx row" style="padding: 20% 0%;">
                            <?php if($errors->has('message')): ?>
                            <div class="from-group row ">
                                <div class="col-md-12">
                                    <span style="    color: red;padding: 0px 50px;" class="" role="alert">
                                        <strong><?php echo e($errors->first('message')); ?></strong>
                                    </span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <form class="loginform_page" method="post" action="<?php echo e(route('user.do-login')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-md-12" style="padding-top:10px">
                                    <div class="form-group">
                                        <div class="input-group"> <i class="input-group-addon fa fa-phone"></i>
                                            <span class="input-group-addon"
                                                style=" border-right: 0px !important;padding: 7px;">+88</span>
                                            <input style="border-left: 0px !important;padding-left: 2px;"  id="phone_no"
                                                type="phone"
                                                class="form-control<?php echo e($errors->has('phone_no') ? ' is-invalid' : ''); ?>"
                                                name="phone_no" value="<?php echo e(old('phone_no')); ?>" type=""
                                                placeholder="Phone Number" required autofocus>
                                            <?php if($errors->has('phone_no')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group"> <i class="input-group-addon fa fa-lock"></i>
                                            <input id="password" type="password"
                                                class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                name="password" placeholder="Password" style="padding-left: 20px !important;" required>

                                            <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12" style="padding-bottom: 30px;">
                                    <div class="input-group ">
                                        <i class="input-group-addon fa fa-user"></i>
                                        
                                        <select class="form-control" name="user_type" placeholder="Choose User Type"
                                            id="user_type" required>
                                            <option value="user">User</option>
                                            <option value="esp">ESP</option>
                                            <option value="fsp">FSP</option>
                                            <option value="comrade">Comrade</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block btn-mm" name="user-login"
                                            value="Login" />
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12">
                                        <div class="col-md-6 pull-left">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                                <label style="text-transform: capitalize;"
                                                    class="form-check-label text-white" for="remember">
                                                    <?php echo e(__('Remember Me')); ?>

                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-md-6 pull-right ">
                                            <?php if(Route::has('password.request')): ?>
                                            <a class=" btn-link text-white" href="<?php echo e(route('password.request')); ?>">
                                                <?php echo e(__('Forgot Your Password?')); ?>

                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="wp-social-login-widget">
                                <ul class="socila-box list-inline ">
                                    <li> <a href="#">Connect With:</a></li>
                                    <li><a href="https://www.facebook.com/MistriMama" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/mistrimama" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://twitter.com/MistriMama" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/mistrimama" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>