<?php $__env->startSection('content'); ?>
<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Home</a></li>
                <li>Blog</li>
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

                    <h1><u>Blog</u></h1>
                    <div class="padding-30 bg-white margin-b-30 clearfix sf-rouned-box">
                        <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h2><?php echo e($data->title); ?></h2>
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($model->category_id == $data->id): ?>
                        <div id="box1" class="tab-pane fade in active">
                            <div class="sf-services-area" id="sf-services-listing">
                                <div class="panel sf-panel">
                                    <div class="acod-head">
                                        <h6 class="acod-title text-uppercase">
                                            <a data-toggle="collapse" href="#services-row-<?php echo e($model->id); ?>"
                                                data-parent="#sf-services-listing">
                                                <span class="exper-author"> Building Maintenance</span>
                                            </a>
                                        </h6>
                                    </div>
                                    <div id="services-row-<?php echo e($model->id); ?>" class="acod-body collapse in">
                                        <div class="acod-content p-tb15">
                                            <div class="icon-bx-md rounded-bx">
                                                <img style="width: 100%; height:230px;"
                                                    src="<?php echo e(url('images/blogs/thumbnail')); ?>/<?php echo e($model->image); ?>">
                                            </div>
                                            <h4><?php echo e($model->title); ?></h4>
                                            <p><?php echo e(substr($model->content, 0,250)); ?></p>
                                            <a href="<?php echo e(url('showOneBlog/')); ?>/<?php echo e($model->id); ?>">Learn more ...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <hr style="width: 100%; color: black; height: 1px;" />
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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