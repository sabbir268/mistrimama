<?php $__env->startSection('content'); ?>
<section class="big-title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2><?= $model->title ?></h2>
            </div>
        </div>
    </div>
</section>
<div class="container cms-page">
    <?= $model->description ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>