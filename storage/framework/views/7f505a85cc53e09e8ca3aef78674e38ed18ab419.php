<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:94px;"></div>
     <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>OUR SERVICES</li>
                <!-- <li><?php echo e($model->name); ?></li> -->
    </ul>
</div>
</div>
<!-- Breadcrumb  Templates End -->
<!-- contact area -->


<section class="section-full text-center " id="services" style="padding-top: 50px;background-color: #fff">

    <div class="container">

        <div class="section-head">

            
            
            <center><h1 class="text-mm" style="color: #fec00f;margin:0px 0px 7px 0px;text-transform: uppercase;"><?php echo e($model->pageAttribute->services_title); ?></h1></center>

            <div class="after-titile-line"><span class="title-line-left" style="background:"></span><span
                    class="title-line-right" style="background:"></span></div>

            

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

            .sf-categories-girds:hover .sf-categories-thum  {
                transform: scale(1.2, 1.2);
                transition: 1s;
                
            }

            .sf-categories-girds:hover  .sf-overlay-box {
               transition: 1s;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.08) 0%, rgba(0, 0, 0, 0.21) 100%);
            }

            .sf-overlay-box{
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.46) 0%, rgba(0, 0, 0, 0.82) 100%);
            }

            .sf-categories-content{
                top: 17%  !important;
            }

            .sf-categories-content .sf-categories-title {
                font-size: 20px;
                font-weight: 600;
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
                                    <img class="hover_icon_img" style="width:120px" src="<?php echo e($item->image_hover); ?>" alt="ICON">
                                    <img class="icon_img" style="width:120px" src="<?php echo e($item->icon_image); ?>" alt="ICON">
                                </div>
                                <div class="sf-categories-title">
                                    <br><?php echo e($item->name); ?></div>
                                <a href="<?php echo e(asset('/')); ?><?php echo e($item->slug); ?>" class="sf-category-link"></a>
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
<!-- contact area  END -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>