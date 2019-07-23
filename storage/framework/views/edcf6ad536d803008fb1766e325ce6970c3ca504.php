
<div class="modal fade login" id="loginModal">
    <div class="modal-dialog login animated">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Log in to your account</h4>
            </div>
            <div class="modal-body">
                <div class="box">
                    <div class="content">
                        <div class="social">
                            <a id="linkedin" class="circle linkedin" href="<?php echo e(route('social-login', 'linkedin')); ?>">
                                <i class="fa fa-linkedin fa-fw"></i>
                            </a>
                            <a id="facebook_login" class="circle facebook" href="<?php echo e(route('social-login', 'facebook')); ?>">
                                <i class="fa fa-facebook fa-fw"></i>
                            </a>
                        </div>

                        <div class="error"></div>
                        <div class="form loginBox">
                            <form method="post" action="<?php echo e(route('user.do-login')); ?>" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <?php echo e(csrf_field()); ?>

                                <input class="btn btn-default btn-login" type="submit" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <form method="post" action="<?php echo e(route('user.do-register')); ?>" html="{:multipart=>true}" data-remote="true" accept-charset="UTF-8">
                                <input id="name" class="form-control" type="text" placeholder="Full Name" name="name">
                                <input id="email" class="form-control" type="email" placeholder="Email" name="email">
                                <input id="phone_no" class="form-control" type="text" placeholder="Mobile Number" name="phone_no">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <textarea id="address" rows="3" class="form-control" placeholder="Address" name="address"></textarea>
                                <?php echo e(csrf_field()); ?>

                                <input class="btn btn-default btn-register" type="submit" value="Create account" name="commit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                </div>
                <div class="forgot register-footer" style="display:none">
                    <span>Already have an account?</span>
                    <a href="javascript: showLoginForm();">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>