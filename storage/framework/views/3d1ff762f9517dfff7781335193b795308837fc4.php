<?php $__env->startSection('content'); ?>

<!--header close-->
<div class="headershadow paddtb">
    <section class="genSection dashboardPage">
        <div class="container">
            <?php echo $__env->make('common.flashmessage', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="dashboardInner">
                <div class="dashboardLeft">
                    <?php  if (Auth::user()->user_type == 3) { ?>
                        <?php echo $__env->make('customer.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php }else{ ?>
                        <?php echo $__env->make('web.users.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php } ?>

                </div>	
                <div class="dashboardRight">
                    <div class="accountPage">



                        <?php echo Form::open(['method' => 'POST','route' => ['changePasswordPost'] ]); ?>

                        
                         

                        <div class="personalInfo">
                            <h3>Change Password</h3>
                            <div class="infoForm">
<!--                                <div class="formRow">
                                    <label>Current Password</label>
                                    <div class="inputBox">
                                        <?php echo Form::password('current_password', null); ?>

                                        <span class="error"><?= $errors->first('current_password'); ?></span>
                                    </div>
                                </div>-->
                                <div class="formRow">
                                    <label>Password</label>
                                    <div class="inputBox">
                                        <?php echo Form::password('password', null); ?>

                                        <span class="error"><?= $errors->first('password'); ?></span>
                                    </div>
                                </div>
                                <div class="formRow">
                                    <label>Retype Password</label>
                                    <div class="inputBox">
                                        <?php echo Form::password('re_password', null); ?>

                                        <span class="error"><?= $errors->first('re_password'); ?></span>
                                    </div>
                                </div>
                                 
                                 
                            </div>
                        </div>
                        <input type="submit" class="updateBtn" value="Change Password" >
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>




<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>