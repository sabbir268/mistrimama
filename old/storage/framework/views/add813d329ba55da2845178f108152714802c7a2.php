<?php $__env->startSection('content'); ?>
<?php
if ($errors->any()) {
    $disabledStatus = false;
} else {
    $disabledStatus = "disabled";
}
?>
 
<!--header close-->
<div class="headershadow paddtb">
    <section class="genSection dashboardPage">
        <div class="container">
            <?php echo $__env->make('common.flashmessage', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="dashboardInner">
                <div class="dashboardLeft">
                    <?php echo $__env->make('web.users.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                </div>	
                <div class="dashboardRight">
                    <div class="accountPage">
                        <?php echo Form::model($users, ['method' => 'POST','route' => ['user-profile-update'] ]); ?>

                        <a class="refferBtn" href="#">Profile</a>
                        <?php if ($disabledStatus) { ?>
                            <a href="javascript:void(0);" class="editBtn">
                                <em class="fa fa-pencil"></em>Edit Info
                            </a>
                        <?php } ?>

                        <div class="personalInfo">
                            <h3>Profile</h3>
                            <div class="infoForm">
                                <div class="formRow">
                                    <label>Name</label>
                                    <div class="inputBox">
                                        <?php echo Form::text('name', null,[$disabledStatus,'maxlength'=>'190']); ?>

                                        <span class="error"><?= $errors->first('name'); ?></span>
                                    </div>
                                </div>
                                 
                                <div class="formRow">
                                    <label>Email Address</label>
                                    <div class="inputBox">
                                        <span><?php echo e($users->email); ?></span>
                                    </div>
                                </div>
                                   <div class="formRow">
                                    <label>Date of Birth</label>
                                    <div class="inputBox">
                                        <?php echo Form::text('date_of_birth', null,['id'=>'dob',$disabledStatus,'placeholder'=>'1970-12-30']); ?>

                                        <span class="error"><?= $errors->first('date_of_birth'); ?></span>
                                    </div>
                                </div>
                                <div class="formRow">
                                    <label>Phone</label>
                                    <div class="inputBox">
                                        <?php echo Form::text('phone_no', null,['maxlength'=>'18',$disabledStatus,'id'=>'phone_no']); ?>

                                        <span class="error"><?= $errors->first('phone'); ?></span>
                                    </div>
                                </div>
                                <div class="formRow">
                                    <label>Address</label>
                                    <div class="inputBox">
                                        <?php echo Form::text('address', null,['maxlength'=>'100',$disabledStatus]); ?>

                                        <span class="error"><?= $errors->first('address'); ?></span>
                                    </div>
                                </div>
                                 

                             
                            </div>
                        </div>
                        <input type="submit" class="updateBtn" value="Update" style="display: <?= $disabledStatus ? "none" : 'block' ?>">
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>


</div>



 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.14/jquery.mask.min.js"></script>
<script>

 

    $('#dob').mask('YYYY-AA-SS', {'translation': {
            A: {pattern: /[0-9]/},
            S: {pattern: /[0-9]/},
            Y: {pattern: /[0-9]/}
        }
    });
    $('#phone_no').mask('+8800000000000')
    $( document ).ready(function() {
   
       $('.accountPage .editBtn').click(function () {
            $(this).closest('.accountPage').find('input, select').removeAttr('disabled');
            $(this).hide();
            $('.accountPage .updateBtn').show();
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>