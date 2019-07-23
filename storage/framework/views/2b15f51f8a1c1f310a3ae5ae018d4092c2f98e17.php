<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>FAQ</li>
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

                    <h1><u>FAQ</u></h1>
                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <div id="box1" class="tab-pane fade in active">
                            <div class="sf-services-area" id="sf-services-listing">
                                <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="panel sf-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#services-row-<?php echo e($model->id); ?>"
                                                data-parent="#sf-services-listing">
                                                <span class="exper-author"><?php echo e($model->question); ?></span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="services-row-<?php echo e($model->id); ?>" class="acod-body collapse">
                                        <div class="acod-content p-tb15">
                                            <p><?php echo e($model->answer); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
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