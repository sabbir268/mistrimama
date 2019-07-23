<html lang="<?php echo e(app()->getLocale()); ?>">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Mistri Mama || Door step servicing</title>
    <link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/ico" >
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('admin/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('admin/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo e(asset('admin/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo e(asset('admin/global/css/components.min.css')); ?>" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="<?php echo e(asset('admin/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo e(asset('admin/pages/css/login.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    
    <style>
        .logo {
            margin: 0 !important;
        }

        .content {
            background-color: #fff;
            border-radius: 7px;
            width: 400px;
            margin: 0px auto 10px !important;
            padding: 7px 30px 30px;
            overflow: hidden;
            position: relative;
        }

    </style>
</head>
<!-- END HEAD -->

<body class=" login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="<?php echo e(url('/')); ?>">
            <img style="width: 250px;" src="<?php echo e(asset('admin/pages/img/logo.png')); ?>" alt="" /> </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <div class="col-md-12">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" method="POST" action="<?php echo e(route('user.do-login')); ?>">
                <?php echo e(csrf_field()); ?>

                <h3 class="form-title font-green">Log In</h3>
                <?php if($errors->has('message')): ?>
                <div class="from-group row ">
                    <div class="col-md-12">
                        <span style="    color: red;padding: 0px 50px;" class="" role="alert">
                            <strong><?php echo e($errors->first('message')); ?></strong>
                        </span>
                    </div>
                </div>
                <?php endif; ?>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Phone Number</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
                        placeholder="Phone Number" name="phone_no" value="<?php echo e(old('phone_no')); ?>" required autofocus />
                    <?php if($errors->has('phone_no')): ?>
                    <span class="required"><?php echo e($errors->first('phone_no')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off"
                        placeholder="Password" name="password" />
                    <?php if($errors->has('password')): ?>
                    <span class="required"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">User Type</label>
                    <select class="form-control" name="user_type" placeholder="Choose User Type" id="user_type"
                        required>
                        <option value="esp">ESP</option>
                        <option value="comrade">Comrade</option>
                    </select>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Login</button>
                    <label class="rememberme check mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="remember" value="1" />Remember
                        <span></span>
                    </label>
                    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                </div>

            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="index.html" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email"
                        name="email" /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
    </div>
    <div class="copyright"> <?php echo e(date("Y",strtotime('now'))); ?> ©MistriMama</div>
    <script src="<?php echo e(asset('admin/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('admin/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>


</body>

</html>