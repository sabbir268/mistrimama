<?php $__env->startSection('content'); ?>
<style>
    .main-bar {
        /* background-color: #ffffff !important; */
    }

    .promotion {
        min-height: 86.8vh;
        background-color: #00000080;
        border-radius: 1%;
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
    }

    .customer-bx>div {
        padding-bottom: 20px;
    }

    .socila-box {
        font-size: 16px;
        padding: 3% 14%;
    }

    .socila-box>li>a {
        color: #fff;
        opacity: 0.7;
    }

    .socila-box>li:hover>a {
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

    .dropdown-toggle {
        margin: -1px 1px !important;
        border: 1px solid #f3b400 !important;
        border-left: 0px !important;

    }

</style>
<div class="page-content" style="padding-bottom:0px">
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
            <div class="row" style="margin-top: 120px;">
                <div class="col-md-8 promotion ">
                    <img style="    padding: 14% 5%;opacity: 0.9;" src="<?php echo e(asset('uploads/promoimage/promo_image.png')); ?>"
                        alt="" class="img-responsive">
                </div>
                <!-- Left part start -->
                <div class="col-md-4 ">
                    <!-- Signup Template -->
                    <!-- Content -->
                    <!-- Left & right section start -->
                    <div class="padding-20 margin-b-30  bg-white sf-rouned-box sf-register-page signup">
                        <div id="customertab" class="tab-pane fade in active">
                            <form class="customer_registration_page" method="post"
                                action="<?php echo e(route('user.do-register')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="customer-bx clearfix row">

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-user"></i>
                                            <input id="name" type="text"
                                                class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>"
                                                name="name" value="<?php echo e(old('name')); ?>" placeholder="Name" required
                                                autofocus>

                                            <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-phone"></i>
                                            <span class="input-group-addon"
                                                style=" border-right: 0px !important;padding: 7px;">+88</span>
                                            <input style="border-left: 0px !important;padding-left: 2px;" id="phone_no"
                                                type="text"
                                                class="form-control<?php echo e($errors->has('phone_no') ? ' is-invalid' : ''); ?>"
                                                name="phone_no" value="<?php echo e(old('phone_no')); ?>" minLength="11"
                                                maxLength="11" placeholder="Mobile Number" required>

                                            <?php if($errors->has('phone_no')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-envelope"></i>
                                            <input id="email" type="email"
                                                class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                                name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>

                                            <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-lock"></i>
                                            <input id="password" type="password"
                                                class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                                name="password" placeholder="Password" required>

                                            <?php if($errors->has('password')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-map-marker"></i>
                                            <select name="area" id="sa" onchange="combomap(this.value)"
                                                style="text-transform:none;" class="form-control" required>
                                                <option value="">Select Area</option>
                                                <option value="Adabor"> Adabor</option>
                                                <option value="Azampur"> Azampur</option>
                                                <option value="Badda"> Badda</option>
                                                <option value="Darus Salam"> Darus Salam</option>
                                                <option value="Dhanmondi"> Dhanmondi</option>
                                                <option value="Gulshan"> Gulshan</option>
                                                <option value="Kafrul"> Kafrul</option>
                                                <option value="Kalabagan"> Kalabagan</option>
                                                <option value="Khilgaon"> Khilgaon</option>
                                                <option value="Khilkhet"> Khilkhet</option>
                                                <option value="Mirpur">Mirpur</option>
                                                <option value="Mohammadpur"> Mohammadpur</option>
                                                <option value="Motijheel"> Motijheel</option>
                                                <option value="New Market"> New Market</option>
                                                <option value="Old Town"> Old Town</option>
                                                <option value="Pallabi"> Pallabi</option>
                                                <option value="Paltan"> Paltan</option>
                                                <option value="Ramna"> Ramna</option>
                                                <option value="Rampura"> Rampura</option>
                                                <option value="Sabujbagh"> Sabujbagh</option>
                                                <option value="Shahbagh"> Shahbagh</option>
                                                <option value="Sher-e-Bangla Nagar"> Sher-e-Bangla Nagar</option>
                                                <option value="Tejgaon"> Tejgaon</option>
                                                <option value="Uttar Khan"> Uttar Khan</option>
                                                <option value="Uttara"> Uttara</option>
                                                <option value="Vatara"> Vatara</option>
                                            </select>
                                            <?php if($errors->has('area')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('area')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-map"></i>
                                            <textarea name="address" rows="2" class="form-control" placeholder="Address"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <input type="text" name="reason" value="ture" hidden>
                                    <input type="text" name="user_type" value="user" hidden>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-mm"
                                            name="user-register" value="Sign up" />
                                    </div>

                                    <div class="form-group row mb-0" style="padding-bottom:0px;margin-bottom:0px">
                                        <div class="col-md-12">
                                            <div class="col-md-6 pull-left ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                                    <label style="text-transform: capitalize;"
                                                        class="form-check-label text-white" for="remember">
                                                        <?php echo e(__('Remember Me')); ?>

                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6  text-right">
                                                <span class="text-white">Need Help?</span>
                                            </div>
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