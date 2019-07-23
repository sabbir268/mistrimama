<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:50px;"></div>
    
<!-- Breadcrumb  Templates End -->
<!-- contact area -->


<section class="section-full text-center bg-gray" id="services">

    <div class="container">

        <div class="section-head">

            
            <h2 style="color: #f3b400;text-transform: uppercase;"><?php echo e($model->pageAttribute->services_title); ?></h2>

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

            .sf-categories-girds:hover .sf-categories-thum {
                transform: scale(1.2, 1.2);
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