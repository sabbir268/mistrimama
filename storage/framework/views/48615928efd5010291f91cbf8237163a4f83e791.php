 <?php $__env->startSection('content'); ?>

<section class="sf-rev-slider-wrap">
    <link href="http://fonts.googleapis.com/css?family=Poppins:500%7CRaleway:800%2C500%7CRoboto:500" rel="stylesheet" property="stylesheet" type="text/css" media="all">
    <div id="rev_slider_1_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.7.4 auto mode -->
        <div id="rev_slider_1_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7.4">
            <ul>
                <!-- SLIDE  -->
                <?php $count = 0; ?> <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $count += 1; ?>
                <li data-index="rs-<?php echo e($count); ?>" data-transition="crossfade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"  data-rotate="0" data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off" data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src='<?php echo e(url("slider-images/$item->picture")); ?>' alt="" title="<?php echo e($item->title); ?>" width="1919" height="646" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <script>
                var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
                var htmlDivCss = "#rev_slider_1_1[data-slideactive=\"rs-1\"] .zeus.tparrows{min-width:70px !important;min-height:70px !important;background:rgba(0,0,0,0.1) !important}#rev_slider_1_1[data-slideactive=\"rs-1\"] .zeus.tparrows:before{line-height:70px !important;color:rgb(255,255,255) !important;font-size:20px !important}";
                if (htmlDiv) {
                    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
                } else {
                    var htmlDiv = document.createElement("div");
                    htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                    document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
                }
            </script>
            <div class="tp-bannertimer" style="height: 7px; background: rgba(255,255,255,0.25);"></div>
        </div>
        <script>
            var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
            var htmlDivCss = ".tp-caption.NotGeneric-Title,.NotGeneric-Title{color:#ffffff;font-size:70px;line-height:70px;font-weight:800;font-style:normal;font-family:Raleway;text-decoration:none;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0 0 0 0px}.tp-caption.NotGeneric-SubTitle,.NotGeneric-SubTitle{color:#ffffff;font-size:13px;line-height:20px;font-weight:500;font-style:normal;font-family:Raleway;text-decoration:none;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0 0 0 0px;letter-spacing:4px}";
            if (htmlDiv) {
                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
            } else {
                var htmlDiv = document.createElement("div");
                htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
                document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
            }
        </script>
        <script type="text/javascript">
            if (setREVStartSize !== undefined) setREVStartSize({
                c: '#rev_slider_1_1',
                gridwidth: [1240],
                gridheight: [666],
                sliderLayout: 'auto'
            });

            var revapi1,
                tpj;
            (function() {
                if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
                else onLoad();

                function onLoad() {
                    if (tpj === undefined) {
                        tpj = jQuery;
                        if ("off" == "on") tpj.noConflict();
                    }
                    if (tpj("#rev_slider_1_1").revolution == undefined) {
                        revslider_showDoubleJqueryError("#rev_slider_1_1");
                    } else {
                        revapi1 = tpj("#rev_slider_1_1").show().revolution({
                            sliderType: "standard",
                            jsFileLocation: "//aonetheme.com/extend/wp-content/plugins/revslider/public/assets/js/",
                            sliderLayout: "auto",
                            dottedOverlay: "none",
                            delay: 9000,
                            navigation: {
                                keyboardNavigation: "off",
                                keyboard_direction: "horizontal",
                                mouseScrollNavigation: "off",
                                mouseScrollReverse: "default",
                                onHoverStop: "off",
                                touch: {
                                    touchenabled: "on",
                                    touchOnDesktop: "off",
                                    swipe_threshold: 75,
                                    swipe_min_touches: 1,
                                    swipe_direction: "horizontal",
                                    drag_block_vertical: false
                                },
                                arrows: {
                                    style: "zeus",
                                    enable: true,
                                    hide_onmobile: true,
                                    hide_under: 600,
                                    hide_onleave: true,
                                    hide_delay: 200,
                                    hide_delay_mobile: 1200,
                                    tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div> </div>',
                                    left: {
                                        h_align: "left",
                                        v_align: "center",
                                        h_offset: 30,
                                        v_offset: 0
                                    },
                                    right: {
                                        h_align: "right",
                                        v_align: "center",
                                        h_offset: 30,
                                        v_offset: 0
                                    }
                                }
                            },
                            viewPort: {
                                enable: true,
                                outof: "pause",
                                visible_area: "80%",
                                presize: false
                            },
                            visibilityLevels: [1240, 1024, 778, 480],
                            gridwidth: 1240,
                            gridheight: 666,
                            lazyType: "none",
                            shadow: 0,
                            spinner: "off",
                            stopLoop: "off",
                            stopAfterLoops: -1,
                            stopAtSlide: -1,
                            shuffle: "off",
                            autoHeight: "off",
                            hideThumbsOnMobile: "off",
                            hideSliderAtLimit: 0,
                            hideCaptionAtLimit: 0,
                            hideAllCaptionAtLilmit: 0,
                            debugMode: false,
                            fallbacks: {
                                simplifyAll: "off",
                                nextSlideOnWindowFocus: "off",
                                disableFocusListener: false,
                            }
                        });
                    }; /* END OF revapi call */

                }; /* END OF ON LOAD FUNCTION */
            }()); /* END OF WRAPPING FUNCTION */
        </script>
        <script>
            var htmlDivCss = unescape("%23rev_slider_1_1%20.zeus.tparrows%20%7B%0A%20%20cursor%3Apointer%3B%0A%20%20min-width%3A70px%3B%0A%20%20min-height%3A70px%3B%0A%20%20position%3Aabsolute%3B%0A%20%20display%3Ablock%3B%0A%20%20z-index%3A100%3B%0A%20%20border-radius%3A50%25%3B%20%20%20%0A%20%20overflow%3Ahidden%3B%0A%20%20background%3Argba%280%2C0%2C0%2C0.1%29%3B%0A%7D%0A%0A%23rev_slider_1_1%20.zeus.tparrows%3Abefore%20%7B%0A%20%20font-family%3A%20%22revicons%22%3B%0A%20%20font-size%3A20px%3B%0A%20%20color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%20%20display%3Ablock%3B%0A%20%20line-height%3A%2070px%3B%0A%20%20text-align%3A%20center%3B%20%20%20%20%0A%20%20z-index%3A2%3B%0A%20%20position%3Arelative%3B%0A%7D%0A%23rev_slider_1_1%20.zeus.tparrows.tp-leftarrow%3Abefore%20%7B%0A%20%20content%3A%20%22%5Ce824%22%3B%0A%7D%0A%23rev_slider_1_1%20.zeus.tparrows.tp-rightarrow%3Abefore%20%7B%0A%20%20content%3A%20%22%5Ce825%22%3B%0A%7D%0A%0A%23rev_slider_1_1%20.zeus%20.tp-title-wrap%20%7B%0A%20%20background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%20%20width%3A100%25%3B%0A%20%20height%3A100%25%3B%0A%20%20top%3A0px%3B%0A%20%20left%3A0px%3B%0A%20%20position%3Aabsolute%3B%0A%20%20opacity%3A0%3B%0A%20%20transform%3Ascale%280%29%3B%0A%20%20-webkit-transform%3Ascale%280%29%3B%0A%20%20%20transition%3A%20all%200.3s%3B%0A%20%20-webkit-transition%3Aall%200.3s%3B%0A%20%20-moz-transition%3Aall%200.3s%3B%0A%20%20%20border-radius%3A50%25%3B%0A%20%7D%0A%23rev_slider_1_1%20.zeus%20.tp-arr-imgholder%20%7B%0A%20%20width%3A100%25%3B%0A%20%20height%3A100%25%3B%0A%20%20position%3Aabsolute%3B%0A%20%20top%3A0px%3B%0A%20%20left%3A0px%3B%0A%20%20background-position%3Acenter%20center%3B%0A%20%20background-size%3Acover%3B%0A%20%20border-radius%3A50%25%3B%0A%20%20transform%3Atranslatex%28-100%25%29%3B%0A%20%20-webkit-transform%3Atranslatex%28-100%25%29%3B%0A%20%20%20transition%3A%20all%200.3s%3B%0A%20%20-webkit-transition%3Aall%200.3s%3B%0A%20%20-moz-transition%3Aall%200.3s%3B%0A%0A%20%7D%0A%23rev_slider_1_1%20.zeus.tp-rightarrow%20.tp-arr-imgholder%20%7B%0A%20%20%20%20transform%3Atranslatex%28100%25%29%3B%0A%20%20-webkit-transform%3Atranslatex%28100%25%29%3B%0A%20%20%20%20%20%20%7D%0A%23rev_slider_1_1%20.zeus.tparrows%3Ahover%20.tp-arr-imgholder%20%7B%0A%20%20transform%3Atranslatex%280%29%3B%0A%20%20-webkit-transform%3Atranslatex%280%29%3B%0A%20%20opacity%3A1%3B%0A%7D%0A%20%20%20%20%20%20%0A%23rev_slider_1_1%20.zeus.tparrows%3Ahover%20.tp-title-wrap%20%7B%0A%20%20transform%3Ascale%281%29%3B%0A%20%20-webkit-transform%3Ascale%281%29%3B%0A%20%20opacity%3A1%3B%0A%7D%0A%20%0A");
            var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
            if (htmlDiv) {
                htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
            } else {
                var htmlDiv = document.createElement('div');
                htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
                document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
            }
        </script>
    </div>
</section>

<!-- rawscripter -->

<div id="order-form">
    <div id="first_step">
        <div class="row">
            <div class="col-md-12">
                <form id="first_step_form" action="<?php echo e(route('create.order')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input type="text" hidden name="page" value="index">
                    <div class="form-group">
                        <label for="sa">Select Area</label>
                        <select name="area" id="sa" onchange="combomap(this.value)" style="text-transform:none;" class="form-control" required>
                            <option value="" selected="false" class="locationDropdown">Select Area</option>
                            <option value="XMLID_1655_">Azimpur</option>
                            <option value="XMLID_1652_">Badda</option>
                            <option value="XMLID_1870_">Baridhara</option>
                            <option value="XMLID_1752_">Dhanmondi</option>
                            <option value="XMLID_1791_">Gulshan</option>
                            <option value="XMLID_1646_">Khilkhet</option>
                            <option value="XMLID_1665_">Khilgaon</option>
                            <option value="XMLID_1746_">Mirpur</option>
                            <option value="XMLID_1738_">Mohammadpur</option>
                            <option value="XMLID_1658_">Motijheels</option>
                            <option value="XMLID_1765_">New Market</option>
                            <option value="XMLID_1749_">Old Dhaka</option>
                            <option value="XMLID_1768_">Ramna</option>
                            <option value="XMLID_1839_">Tejgaon</option>
                            <option value="XMLID_1661_">Uttara</option>
                        </select>
                    </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="sa">Select Service</label>
                    <select name="category" id="ss" class="form-control" style="text-transform:none;" required>
                        <option selected="true" value="">Select Service</option>
                        <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <input type="submit" value="Next" class="btn btn-block btn-primary">
            </div>
            </form>
        </div>
    </div>

    <div id="second_step" style="display:none">
        <div class="row">
            <div class="col-md-12">
                <h2>All Services</h2>
                <div class="form-group">
                    <section class="bg-white rounde  ">
                        <p>Total: <span class="grand_total" id="grand_total">0.00</span>৳</p>
                        <?php echo csrf_field(); ?>
                        <div class="card mb-1">
                            <div class="card-body ">
                                <input type="hidden" name="ID" value="1">
                                <div id="show_subCategories">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel39" aria-expanded="false" aria-controls="collapseExample">
                                                <h5 class="mb-0"> <span class=" rounded-circle "><i class="fa fa-chevron-down"></i></span> Hardware support</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center pt-2">
                                            <span style="cursor :pointer" class="btn btn-sm btn-primary rounded addRemove" data-id="39" id="addRemove39">ADD</span>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                    </section>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="button" id="backToStepOne" value="Previous" class="btn btn-block btn-primary">
                </div>
            </div>
            <div class="col-md-4 pull-right">
                <div class="form-group">
                    <input type="button" id="forwardToThird" value="Next" class="btn btn-block btn-primary">
                </div>
            </div>

        </div>

    </div>


    <div id="third_step" style="display:none">
        <div class="row">
            <div class="col-md-12">
                <h2>Date & Time </h2>
                <form action="<?php echo e(route('add.date-time')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="col-xl-6 offset-md-3 ">
                        <div class="row imergency" style="display:none">
                            <div class="alert alert-warning alert-icon alert-close alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="font-icon font-icon-warning"></i>
                                <strong>N.B.</strong>In this case we'll charge 500 tk extra for emergency.
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-4">
                                <label class="form-label">
                                    <i class="font-icon font-icon-calend"></i>
                                    Select Date
                                </label>
                            </div>
                            <div class="col-xl-8">
                                <div class="input-group date">
                                    <input type="date" name="order_date" id="order_date" class="form-control" placeholder="Chose Date" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-xl-4">
                                <label class="form-label">
                                    <i class="font-icon font-icon-speed"></i>
                                    Select Time
                                </label>
                            </div>
                            <div class="col-xl-8">
                                <div class="input-group">
                                    <select name="order_time" id="order_time" class="form-control">
                                        <option value="">Chose Time</option>
                                        <option value="12:00 AM">12:00 AM </option>
                                        <option value="1:00 AM">01:00 AM </option>
                                        <option value="2:00 AM">02:00 AM </option>
                                        <option value="3:00 AM">03:00 AM </option>
                                        <option value="4:00 AM">04:00 AM </option>
                                        <option value="5:00 AM">05:00 AM </option>
                                        <option value="6:00 AM">06:00 AM </option>
                                        <option value="7:00 AM">07:00 AM </option>
                                        <option value="8:00 AM">08:00 AM </option>
                                        <option value="9:00 AM">09:00 AM </option>
                                        <option value="10:00 AM">10:00 AM </option>
                                        <option value="11:00 AM">11:00 AM </option>
                                        <option value="12:00 PM">12:00 PM </option>
                                        <option value="1:00 PM">01:00 PM </option>
                                        <option value="2:00 PM">02:00 PM </option>
                                        <option value="3:00 PM">03:00 PM </option>
                                        <option value="4:00 PM">04:00 PM</option>
                                        <option value="5:00 PM">05:00 PM </option>
                                        <option value="6:00 PM">06:00 PM </option>
                                        <option value="7:00 PM">07:00 PM </option>
                                        <option value="8:00 PM">08:00 PM </option>
                                        <option value="9:00 PM">09:00 PM </option>
                                        <option value="10:00 PM">10:00 PM </option>
                                        <option value="11:00 PM">11:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="button" id="backToStepSecond" value="Previous" class="btn btn-block btn-primary">
                </div>
            </div>
            <div class="col-md-4 pull-right">
                <div class="form-group">
                    <input type="submit" value="Next" class="btn btn-block btn-primary">
                </div>
            </div>

        </div>

    </div>

</div>
</div>
</div>
<!-- From started here -->

<section class="section-full text-center bg-gray" id="services">

    <div class="container">

        <div class="section-head">

            <h2 style="color:"><?php echo e($model->pageAttribute->services_title); ?></h2>

            <div class="after-titile-line"><span class="title-line-left" style="background:"></span><span class="title-line-right" style="background:"></span></div>

            <p style="color:"><?php echo e($model->pageAttribute->services_description); ?></p>

        </div>
        <style>
            .icons img {
                width: 65px;
                transition: 1s;
            }

            .hover_icon_img {
                display: none;
                transition: 1s;
            }

            .icons .hover_icon_img {

                margin: 0 auto;
            }

            .sf-categories-girds:hover .icon_img {
                display: none;
                transition: 1s;
            }

            .sf-categories-girds:hover .hover_icon_img {
                display: block;
                transition: 1s;
            }
        </style>
        <div class="section-content">

            <div class="row">

                <div id="masonry" class="catlist sf-catlist-new">

                    <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-container col-md-4 col-sm-4 col-xs-6">

                        <div class="sf-categories-girds  ">

                            <div class="sf-categories-thum" style='background-image:url(<?php echo e($item->main_image); ?>)'>
                            </div>

                            <div class="sf-overlay-box"></div>

                            <div class="sf-categories-content text-center">

                                <!-- <span class="sf-categories-quantity"><img style="height:80px" src="<?php echo e($item->icon_image); ?>" alt=""></i></span> -->

                                <div class="icons">
                                    <img class="hover_icon_img" src="<?php echo e($item->image_hover); ?>" alt="ICON">
                                    <img class="icon_img" src="<?php echo e($item->icon_image); ?>" alt="ICON">

                                </div>
                                <div class="sf-categories-title">

                                    <br><?php echo e($item->name); ?></div>

                                <a href="providers-category/beauty-and-personal-care/index.html" class="sf-category-link"></a>

                            </div>

                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                
            </div>

        </div>

    </div>

    <div class="sf-overlay-main" style="opacity:0.8; background-color:#eff3f6"></div>

</section>
<section class="section-full text-center bg-white" id="about">
    <div class="container">

        <div class="section-head">
            <h2 style="color:"><?php echo e($model->pageAttribute->homesecondblocktitle); ?></h2>
            <div class="after-titile-line"><span class="title-line-left" style="background:"></span><span class="title-line-right" style="background:"></span></div>
            <p style="color:"><?php echo e($model->pageAttribute->home_second_block_description); ?></p>
        </div>

        <div class="section-content">
            <div class="row">

                <p>
                    <div class="col-md-3">
                        <div class="sf-how-work padding-lr-40 equal-col">
                            <div class="sf-icon-xl margin-b-20">
                                <img src='<?php echo e($model->pageAttribute->home_service_img1); ?>' width="139" height="140" alt="">
                            </div>
                            <h4 class="sf-tilte"><?php echo e($model->pageAttribute->home_second_block_service_one_title); ?></h4>
                            <p><?php echo e($model->pageAttribute->home_service_description1); ?></p>

                        </div>
                    </div>
                </p>

                <p>
                    <div class="col-md-3">
                        <div class="sf-how-work padding-lr-40 equal-col">
                            <div class="sf-icon-xl margin-b-20">
                                <img src='<?php echo e($model->pageAttribute->home_service_img3); ?>' width="139" height="140" alt="">
                            </div>
                            <h4 class="sf-tilte"><?php echo e($model->pageAttribute->home_second_block_service_two_title); ?></h4>
                            <p><?php echo e($model->pageAttribute->home_service_description2); ?></p>

                        </div>
                    </div>
                </p>

                <p>
                    <div class="col-md-3">
                        <div class="sf-how-work padding-lr-40 equal-col">
                            <div class="sf-icon-xl margin-b-20">
                                <img src='<?php echo e($model->pageAttribute->home_service_img3); ?>' width="139" height="140" alt="">
                            </div>
                            <h4 class="sf-tilte"><?php echo e($model->pageAttribute->home_second_block_service_three_title); ?></h4>
                            <p><?php echo e($model->pageAttribute->home_service_description3); ?></p>

                        </div>
                    </div>
                </p>

                <p>
                    <div class="col-md-3">
                        <div class="sf-how-work padding-lr-40 equal-col">
                            <div class="sf-icon-xl margin-b-20">
                                <img src='<?php echo e($model->pageAttribute->home_service_img4); ?>' width="139" height="140" alt="">
                            </div>
                            <h4 class="sf-tilte"><?php echo e($model->pageAttribute->home_second_block_service_four_title); ?></h4>
                            <p><?php echo e($model->pageAttribute->home_service_description4); ?></p>

                        </div>
                    </div>
                </p>

            </div>
        </div>

    </div>
</section>
<div class="section-full sf-overlay-wrapper text-center providers-follow" style="background:url(<?php echo e(asset(" / new_theme/uploads/2017/12/bg7.jpg ")); ?> center fixed no-repeat;">
    <div class="container">
        <div class="w-t-element"> <strong class="sf-title"><span><?php echo e($model->pageAttribute->home_about_us); ?></span></strong>
            <div class="sf-follow-text"><?php echo $model->pageAttribute->home_about_us_description; ?></div>
        </div>
    </div>
    <div class="sf-overlay-main" style="opacity:0.8; background-color:#000000">
    </div>
</div>

<section class="section-full sf-overlay-wrapper text-center " style="background-image:url(<?php echo e(asset(
                            " new_theme/uploads/2017/12/bg8.jpg ")); ?>;background-attachment: fixed ">
    <div class="container ">

        <div class="section-head w-t-element ">
            <h2 style="color: ">Why Choose us</h2>
            <div class="after-titile-line "><span class="title-line-left " style="background:
                            "></span><span class="title-line-right " style="background: "></span></div>
            <p style="color: ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#039;s standard dummy text ever since the when an unknown printer took.</p>
        </div>

        <div class="section-content ">
            <div class="row ">
                </p>
                <p>
                    <div class="col-md-4 ">
                        <div class="sf-why-choose w-t-element padding-lr-20 ">
                            <div class="sf-icon-xl margin-b-20 ">
                                <img src='<?php echo e(asset("/new_theme/uploads/2017/12/meet-new-customers-e1514632957561.png
                            ")); ?>' width="220 " height="200 " alt=" ">
                            </div>
                            <h4 class="sf-tilte margin-b-10 "><?php echo e($model->pageAttribute->aboutkey1); ?></h4>
                            <p><?php echo $model->pageAttribute->aboutkey1description; ?></p>

                        </div>
                    </div>
                </p>
                <p>
                    <div class="col-md-4 ">
                        <div class="sf-why-choose w-t-element padding-lr-20 ">
                            <div class="sf-icon-xl margin-b-20 ">
                                <img src='<?php echo e(asset("/new_theme/uploads/2017/12/grow-your-revenue-e1514632979208.png
                            ")); ?>' width="220 " height="200 " alt=" ">
                            </div>
                            <h4 class="sf-tilte margin-b-10 "><?php echo e($model->pageAttribute->aboutkey2); ?></h4>
                            <p><?php echo $model->pageAttribute->aboutkey2description; ?></p>

                        </div>
                    </div>
                </p>
                <p>
                    <div class="col-md-4 ">
                        <div class="sf-why-choose w-t-element padding-lr-20 ">
                            <div class="sf-icon-xl margin-b-20 ">
                                <img src='<?php echo e(asset("/new_theme/uploads/2017/12/build-your-online-e1514632762467.png
                            ")); ?>' width="220 " height="200 " alt=" ">
                            </div>
                            <h4 class="sf-tilte margin-b-10 "><?php echo e($model->pageAttribute->aboutkey3); ?></h4>
                            <p><?php echo $model->pageAttribute->aboutkey3description; ?></p>

                        </div>
                    </div>
                </p>
                <p>
            </div>
        </div>
    </div>
    <div class="sf-overlay-main " style="opacity:0.7; background-color:#000000 ">
</section>

<section class="piece-of-us">
    <div class="container">
        <div class="row row-xs-center">
            <div class="col-md-1">

            </div>
            <div class="col-md-8">

                <h2>
                    <?php echo e($model->pageAttribute->refer_and_earn); ?>

                </h2>
                <p>
                    <?php echo e($model->pageAttribute->refer_and_earn_description); ?>

                </p>
            </div>
            <div class="col-md-3">
                <button type="button" class="btn btn-info btn-lg" style="border-radius: 0px; margin-top:19%;" data-toggle="modal1" data-target="#book_A1">Become A Referrer </button>
            </div>
        </div>
    </div>
</section>


<div id="response_modal">

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>