<?php $__env->startSection('content'); ?>


<!-- THEME STYLE -->
<link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
<style>
    section.big-title {
        display: none;
    }

    * {
        font-family: Poppins !important;
    }
</style>
<section class="big-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>career</h2>
            </div>
        </div>
    </div>
</section>
<!-- /.big-title -->

<style>
    @media(max-width: 767px) {
        .col-sm-6 {
            margin: 0px !important;
            padding: 0px !important;
        }

        .checkOne {
            margin: 10px !important;
            font-size: 10px !important;
            margin-left: auto !important;
            padding-top: 17px !important;
            padding-bottom: 10px !important;
            padding-left: 10px !important;
            max-width: 40% !important;
            margin-left: 23px !important;
        }

        .checkOne label a {
            margin: 0px !important;
            padding: 0px !important;
        }

        .FormOne {
            margin-right: 5px !important;
            margin-left: 5px !important;
        }

    }
</style>


<div id="map-canvas" class="thememove-gmaps" data-address="40.7590615,-73.969231" data-height="480" data-width="100%" data-zoom_enable="" data-zoom="16" data-map_type="roadmap" data-map_style="style1"></div>

<div class="container">
    <div class="row">
        <div class="col-md-7 col-lg-7 message" style="margin: 0px auto;">
            <?php if (Session::has('success')) : ?>
                <div class="success">
                    <?php echo Session::get('success') ?>
                </div>
            <?php endif; ?>
            <h4 class="heading-title text-center" style="text-align:justify;text-align:center">Check Opportunity &amp; Apply</h4>
            <?php echo Form::open(array('url' => 'career-store', 'method'=>'POST','files' => 'true','enctype'=>'multipart/form-data')); ?>

            <div class="row">

                <div class="col-sm-6 FormOne">
                    <h4 style="text-transform: uppercase;">Register Here :</h4>
                    <?php echo Form::text('first_name', null, array('placeholder' => 'First Name','required'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('first_name'); ?></span>
                </div>

                <div class="col-sm-6 FormOne">
                    <h4 style="text-transform: uppercase;">Your Details :</h4>
                    <?php echo Form::text('last_name', null, array('placeholder' => 'Last Name','required'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('last_name'); ?></span>

                </div>

                <div class="col-sm-6 FormOne">

                    <?php echo Form::email('email', null, array('placeholder' => 'Email','required'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('email'); ?></span>
                </div>

                <div class="col-sm-6 FormOne">
                    <?php echo Form::text('phone_number', null, array('placeholder' => 'Phone Number','Last Name'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('phone_number'); ?></span>

                </div>

                <div class="col-sm-6 FormOne">
                    <?php echo Form::text('con-password', null, array('placeholder' => 'Years of Experience','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>

                <div class="col-sm-6 FormOne">
                    <?php echo Form::text('con-password', null, array('placeholder' => 'Years of Experience','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>

                <div class="col-sm-6 FormOne">
                    <?php echo Form::text('con-password', null, array('placeholder' => 'Salary Expectation','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>

                <div class="col-sm-6 FormOne">
                    <?php echo Form::file('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>


                <!--This is Start of the Checkbox code -->
                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 24px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';">Electrical Services </a></label>
                </div>

                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 48px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';">Plumber Services </a></label>
                </div>


                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 24px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';">Generator Services</a></label>
                </div>

                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 48px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';">Air Conditioner Services</a></label>
                </div>

                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 24px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';"> IT Services</a></label>
                </div>

                <div class="col-sm-6 checkOne" style="background-color: #0d306b;max-width: 43%;margin-left: 48px;margin-bottom: 10px;padding: 15px;padding-top: 22px;">
                    <?php echo Form::checkbox('Cv', null, array('placeholder' => '','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                    <label><a href="" style="color: white;font-family: inherit;" onmouseover="this.style.color='white';">CCTV Services</a></label>
                </div>

                <!--This is Close of the Checkbox code -->

                <div class="col-sm-12">
                    <?php echo Form::textarea('con-password', null, array('placeholder' => 'Tell us why you want to work for WebAble','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>


                <div class="col-sm-12">
                    <?php echo Form::text('con-password', null, array('placeholder' => 'Website/Portfolio/Linkedin','phone_number'=>"required",'class' => 'form-wrap')); ?>

                    <span class="error"><?= $errors->first('year_of_exp'); ?></span>
                </div>






                <script>
                    function other(u) {
                        if (u == '7') {
                            $('#otherservice').css('display', 'block');
                            $('#otherservice').append('<input id="others" required  type="text" name="otherservice" value="" size="40" aria-required="true" aria-invalid="false" placeholder="* Specify Your Service">');

                        } else {
                            $('#others').remove();
                            $('#otherservice').css('display', 'none');

                        }

                    }
                </script>

                <div style="display:none;" class="col-sm-6" id="otherservice">

                </div>


                <div class="col-sm-12">
                    <input type="submit" class="contact-form-btn btn col-xs-6" value="Submit" style="border-radius: 0px;margin-bottom: 30px;">
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
        <!-- .message -->


    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>