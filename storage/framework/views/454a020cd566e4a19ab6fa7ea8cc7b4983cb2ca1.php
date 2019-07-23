<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
<div style="height:50px;"></div>
    
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- Contact Info Start -->

                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <h2><?php echo e($model[0]->name); ?></h2>
                        <?php echo $model[0]->description; ?>

                        <div class="col-md-4 col-sm-4 service-list_item-categories">
                            <h4>Unique Benefits</h4>
                            <?php echo $model[0]->unique_benefits; ?>

                        </div>

                        <div class="col-md-8 col-sm-8 service-category-hasib">
                            <h4>Service Category</h4>
                            <?php echo $model[0]->service_category; ?>

                        </div>
                    </div>
                    <!-- Contact Info Start -->
                </div>
            </div>
        </div>
    </div>
    <!-- contact area  END -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>