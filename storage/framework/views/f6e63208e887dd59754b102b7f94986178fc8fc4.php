<?php $__env->startSection('content'); ?>
    <section class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Services</h2>
                </div>
            </div>
        </div>
    </section>
    <!-- /.big-title -->


    <div class="container">
        <div class="row service-detail_heading">
            <div class="col-xs-12" style="text-align:justify">
                <h2 class="heading-title"> <?= $model[0]->name ?> </h2>
                <?php echo $model[0]->description ?>
            </div>
        </div>
        <div class="row service-detail_content">
            <div class="container">
                <div class="row">

                    <div class="col-sm-4">
                        <h2 class="service-categories_title" >Unique Benefits</h2>
                        <div class="service-list_item-categories">
                            <?= $model[0]->unique_benefits ?>
                            
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <h2 class="service-categories_title" style="padding-left:25px;">Service Category</h2>
                        <div class="col-sm-12 service-list_item-categories service-category-hasib">
                             
                                 <?= $model[0]->service_category ?>
                               

                         
                        </div>
                         
                    </div>

                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>