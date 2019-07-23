<link href="<?php echo e(asset('css/profile.css')); ?>" rel="stylesheet" type="text/css">
<div class="userPro">
    <div class="userThumb">
        <figure>
            <span style="display: none" class="loader"></span>
            <img id="profilepic" src='<?php echo e(asset("images/profile/".Auth::user()->profile_pic)); ?>' alt="">
        </figure>
        <div class="hover">
            <form action="" id="profile_image_upload">
                <?php echo e(csrf_field()); ?>


                <div class="uploadImg">
                    <span>Upload Profile Image</span>
                    <label>
                        <input name="profile_image" type="file" id='profilePicture'>
                        browse
                    </label>
                </div>
            </form>
        </div>
    </div>
        <h2><?php echo e(Auth::user()->name); ?></h2>
</div>
<div class="dashboardMenu">
    <ul>
        
        <!--<li class="<?= menuActiveClass('cart'); ?>">-->
        <!--    <a href="<?php echo e(url('user/my-cart')); ?>"><em class="fa fa-user" aria-hidden="true"></em>Cart</a>-->
        <!--</li>-->


        <li class="<?= menuActiveClass('dashboard'); ?>">
            <a href="<?php echo e(route('dashboard')); ?>"><em class="fa fa-user" aria-hidden="true"></em>Profile</a>
        </li>
         <li class="<?= menuActiveClass('my-order'); ?>">
            <a href="<?php echo e(route('my-order')); ?>"><em class="fa fa-hand-o-up" aria-hidden="true"></em>My Order</a>
        </li>
        <li class="<?= menuActiveClass('changepassword'); ?>">
            <a href="<?php echo e(route('changepassword')); ?>">
                <em class="fa fa-pencil" aria-hidden="true"></em>Change Password
            </a>
        </li>
        <li class="<?= menuActiveClass('user-transaction'); ?>">
            <a href="<?php echo e(route('user-transaction')); ?>">
                <em class="fa fa-money" aria-hidden="true"></em>My Transaction
            </a>
        </li>
        <li class="<?= menuActiveClass('user-referral'); ?>">
            <a href="<?php echo e(route('user-referral')); ?>">
                <em class="fa fa-share" aria-hidden="true"></em>My Referral
            </a>
        </li>


        <li>

            <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form-menu').submit();">
                <em class="fa fa-sign-out" aria-hidden="true"></em>Logout
            </a>
             

            <form id="logout-form-menu" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                <?php echo e(csrf_field()); ?>

            </form>
        </li>

    </ul>
</div>
<script>
    jQuery("#profilePicture").change(function () {
        jQuery(".loader").show();
        jQuery("#profilepic").hide();
        
        var formData = new FormData($("#profile_image_upload")[0]);
        $.ajax({
            url: '<?php echo e(route("profile-picture")); ?>',
            type: "POST",
            data: formData,
            async: true,
            dataType: 'json',
            beforeSend: function( xhr ) {
                    jQuery(".loader").show();
                    jQuery("#profilepic").hide();
              },
            success: function (msg) {
                if (msg.status == 1) {
                    jQuery(".loader").hide();
                    jQuery("#profilepic").show();
                    jQuery("#profilepic").attr('src', msg.image);

                } else {
                    jQuery(".loader").hide();
                    jQuery("#profilepic").show();
                    alert(msg.error);
                }
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });
</script>
