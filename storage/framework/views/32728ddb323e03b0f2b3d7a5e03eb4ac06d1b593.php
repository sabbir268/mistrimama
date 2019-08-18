<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('comrade.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('comrade.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">

    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($faq->id); ?>" aria-expanded="true"
                    aria-controls="collapse<?php echo e($faq->id); ?>">
                    <?php echo e($faq->question); ?>

                    <i class="font-icon font-icon-arrow-down"></i>
                </a>
            </div>
            <div id="collapse<?php echo e($faq->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-collapse-in"> 
                    <div class="user-card-row">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <ul class="list-group">
                                    <?php echo $faq->answer; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<!--.widget-accordion-->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>