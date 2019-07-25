<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<header class="page-content-header widgets-header mb-3">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  font-weight-bold">
                                        <h4>সার্ভিস </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong
                                                class="rounded border p-2 bg-mm-light text-mm"><?php echo e(count($services)); ?></strong>
                                        </h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  ">
                                        <h4>সাব সার্ভিস </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm">
                                                <?php echo e(count($subService)); ?> </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  ">
                                        <h4>একাউন্টের ধরন </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2 class="text-center text-mm">
                                            <?php if($providers->first()->service_category == 20): ?>
                                            স্টার্টার (20%)
                                            <?php endif; ?>

                                            <?php if($providers->first()->service_category == 15): ?>
                                            এক্সপার্ট (15%)
                                            <?php endif; ?>

                                            <?php if($providers->first()->service_category == 10): ?>
                                            প্রফেশনাল (10%)
                                            <?php endif; ?>

                                        </h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">সকল সার্ভিস সমূহ </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">ক্যাটেগরি</th>
                                <th rowspan="2">সাব ক্যাটেগরি</th>
                                <th rowspan="2">কাজের ধরন </th>
                                <th colspan="3" class="text-center">মূল কাজের মূল্য </th>
                                <th colspan="3" class="text-center">অতিরিক্ত কাজের মূল্য</th>
                            </tr>
                            <tr>
                                <th>সার্ভিস মূল্য</th>
                                <th>পার্টনারের আয়</th>
                                <th>মিস্ত্রিমামা কমিশন </th>
                                <th>অতিরিক্ত ইউনিট মূল্য</th>
                                <th>পার্টনারের আয়</th>
                                <th>মিস্ত্রিমামা কমিশন </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>

                            <?php $__currentLoopData = $subServiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i); ?> <?php $i++ ?> </td>
                                <td><?php echo e($service->sub_category->first()->category->name); ?></td>
                                <td><?php echo e($service->sub_category->first()->name); ?></td>
                                <td><?php echo e($service->name); ?></td>
                                <td><?php echo e($service->price); ?></td>
                                <?php
                                $mmam = ($service->price * $providers->first()->service_category)/100;
                                $spam = ($service->price - $mmam );
                                ?>
                                <td><?php echo e($spam); ?></td>
                                <td><?php echo e($mmam); ?></td>
                                <?php
                                $ammam = ($service->additional_price * $providers->first()->service_category)/100;
                                $aspam = ($service->additional_price - $ammam );
                                ?>
                                <td><?php echo e($service->additional_price); ?></td>
                                <td><?php echo e($aspam); ?></td>
                                <td><?php echo e($ammam); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($subServiceDetails->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>