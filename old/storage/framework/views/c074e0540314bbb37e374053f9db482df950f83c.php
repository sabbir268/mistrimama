<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner -->
    <div class="banner-contact-row sf-overlay-wrapper"
        style="background-image:url(http://aonetheme.com/extend/wp-content/uploads/2016/08/dreamstime_xl_40096659.jpg)">
        <div class="container text-white">
            <h1>
                Contact Us</h1>
        </div>
        <div class="sf-overlay-main" style="opacity:0.3; background-color:#000000;"></div>
    </div>
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="http://aonetheme.com/extend/">
                        Home </a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Contact Info Start -->

                    <div class="padding-30 bg-white text-center margin-b-30 clearfix sf-rouned-box">
                        <div class="col-md-4 col-sm-6">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx"> <i class="fa fa-phone"></i> </div>
                                <h6>
                                    Phone </h6>
                                <p><?php echo e(getConfigValue('contact_phone')); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx"> <i class="fa fa-envelope"></i> </div>
                                <h6>
                                    Email </h6>
                                <p><?php echo e(getConfigValue('contact_email')); ?></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <div class="sf-element-bx padding-lr-30">
                                <div class="icon-bx-md rounded-bx"> <i class="fa fa-map-marker"></i> </div>
                                <h6>
                                    Address </h6>
                                <p><?php echo e(getConfigValue('contact_address')); ?></p>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info Start -->
                </div>
                <div class="col-md-6">
                    <!-- Contact form Start -->
                    <h4>
                        Contact Us</h4>
                    <div class="padding-30 bg-white clearfix margin-b-30 sf-rouned-box">
                        <form method="post" class="contactform" action="<?php echo e(route('contact-us')); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i
                                                    class="fa fa-user"></i></span>
                                            <input name="name" type="text" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i
                                                    class="fa fa-envelope"></i></span>
                                            <input name="email" type="text" class="form-control" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i
                                                    class="fa fa-phone"></i></span>
                                            <input name="phone" type="text" class="form-control" placeholder="Phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon v-align-t"><i
                                                    class="fa fa-pencil"></i></span>
                                            <textarea name="message" rows="4" class="form-control"
                                                placeholder="Comments"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="captchaouter" id="recaptcha_contactus" data-theme="light"
                                                data-sitekey="6Le3PyEUAAAAAMJcnb8C66tqaRM7TTUpxmPCI2Aa"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input name="submit" type="submit" value="Submit"
                                        class="btn btn-primary margin-r-10">
                                    <input name="Resat" type="reset" value="Reset" class="btn btn-custom">
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form end -->
                </div>
                <!-- Location map -->
                <div class="col-md-6">
                    <h4>
                        Our Location</h4>
                    <div class="padding-10 bg-white sf-rouned-box">
                        <div class='gmap-outer contact-area-bx'>
                            <!-- Google Map -->
                            <div id="gmap_wrapper" data-post_id="661" data-cur_lat="0" data-cur_long="0"
                                style="height:350px">
                                <span id="isgooglemap" data-isgooglemap="1"></span>

                                <div id="gmap-controls-wrapper">
                                    <div id="gmapzoomplus"><i class="fa fa-plus"></i></div>
                                    <div id="gmapzoomminus"><i class="fa fa-minus"></i></div>
                                    <div id="gmap-full"><i class="fa fa-arrows-alt"></i></div>
                                </div>
                                <div id="googleMap" style="height:350px">
                                </div>
                                <div class="tooltip"> click to enable zoom</div>
                                <div id="gmap-loading">
                                    <div class="loader-inner ball-pulse" id="listing_loader_maps">
                                        <div class="double-bounce1"></div>
                                        <div class="double-bounce2"></div>
                                    </div>
                                </div>

                            </div>
                            <!-- END Google Map -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>