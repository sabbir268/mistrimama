
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
                                <?php echo e(csrf_field()); ?>

                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control mb-2" type="password" placeholder="Password" name="password">
                                <select style="background-color: #e8f0fe;color: #000;" name="user_type" class="form-control" id="" required>
                                    <option value="">Chose User Type...</option>
                                    <option value="user">Client</option>
                                    <option value="esp">ESP</option>
                                    <option value="fsp">FSP</option>
                                    <option value="comrade">Comrade</option>
                                </select>

                                <input type="text" name="reason" id="reason" value="false" hidden>
                                <input class="btn btn-default btn-login mt-2" type="submit" value="Login">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="content registerBox" style="display:none;">
                        <div class="form">
                            <form method="post" action="<?php echo e(route('user.do-register')); ?>" html="{:multipart=>true}" data-remote="true" accept-charset="UTF-8">
                                <?php echo e(csrf_field()); ?>

                                <input id="name" class="form-control" type="text" placeholder="Full Name" name="name">
                                <input id="email" class="form-control" type="email" placeholder="Email" name="email">
                                <input id="phone_no" class="form-control" type="text" placeholder="Mobile Number" name="phone_no">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <textarea id="address" rows="3" class="form-control" placeholder="Address" name="address"></textarea>
                                <input type="text" name="user_type" value="user" hidden>


                                <input type="text" name="reason" id="reason" value="false" hidden>
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