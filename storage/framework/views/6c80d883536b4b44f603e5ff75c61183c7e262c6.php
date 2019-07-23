
<?php $__env->startSection('content'); ?>
    <section class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>contact</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- /.big-title -->


    <div id="map-canvas" class="thememove-gmaps" data-address="40.7590615,-73.969231" data-height="480" data-width="100%" data-zoom_enable="" data-zoom="16" data-map_type="roadmap" data-map_style="style1"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-7 message">
                 <?php if (Session::has('success')): ?>
                    <div class="success">
                        <?php echo Session::get('success') ?>
                    </div>
                <?php endif; ?>
                <h2 class="heading-title">Send Us A Message</h2>
                <?php echo Form::open(array('route' => 'contact-us', 'method'=>'POST')); ?>

                    <div class="row">
                        <div class="col-sm-6" style="padding-right: 5px">

                            <?php echo Form::text('name', null, array('placeholder' => 'Your Name','class' => 'form-wrap')); ?>

                            <span  class="error"><?= $errors->first('name'); ?></span>
                        </div>
                        <div class="col-sm-6" style="padding-left: 5px">
                            <?php echo Form::text('phone', null, array('placeholder' => 'Your phone','class' => 'form-wrap')); ?>

                            <span id="subject_error" class="error"><?= $errors->first('phone'); ?></span>
                        </div>
                        <div class="col-sm-12">
                            <?php echo Form::text('email', null, array('placeholder' => 'Your Email','class' => 'form-wrap')); ?>

                            <span id="subject_error" class="error"><?= $errors->first('email'); ?></span>
                        </div>
                        <div class="col-sm-12">
                            <?php echo Form::textArea('message', null, array('placeholder' => 'Your Message','class' => 'form-wrap',  'cols'=>"40", 'rows'=>"10" )); ?>

                            <span id="subject_error" class="error"><?= $errors->first('message'); ?></span>
                        </div>
                        <div class="col-sm-12">
                            <input type="submit" value="Send Message" class="btn">
                        </div>
                    </div>
                 <?php echo Form::close(); ?>

            </div>
            <!-- .message -->

            <div class="col-sm-8 col-md-5 col-lg-4 col-lg-offset-1">
                <div class="call-us">
                    <h3>Call us today for some special offers!</h3>
                    <div class="call-us_phone row">
                        <div class="col-xs-2 col-sm-2">
                            <div class="call-us_icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="col-xs-10 col-sm-10">
                            <div class="phone">
                                <h4><?php echo e(getConfigValue('contact_phone')); ?></h4>
                                <p><?php echo e(getConfigValue('contact_email')); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="call-us_address row">
                        <div class="col-xs-2 col-sm-2">
                            <div class="call-us_icon">
                                <i class="fa fa-home"></i>
                            </div>
                        </div>
                        <div class="col-xs-10 col-sm-10">
                            <div class="address">
                                <p><?= getConfigValue('contact_address') ?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .call-us -->
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>