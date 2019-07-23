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
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">BDT <?php echo e($balance ? $balance : 0); ?>/-</div>
                        <div class="caption color-purple text-mm">(Till Today)</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>Current Account Balance</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <?php 
                            if($lastServiceAmount){
                                $tam = ($lastServiceAmount->total_price + $lastServiceAmount->extra_charge); 
                                $mmc = (($tam * $providers->service_category) / 100); 
                                $spam = $tam - $mmc;
                            }else{
                                $spam = 0;
                            }
                        ?>
                        <div class="number">BDT <?php echo e($spam); ?>/-
                        </div>
                        <div class="caption color-purple btn-link text-mm ">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>Last Service Amount</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">BDT <?php echo e($lastCashOut ? $lastCashOut->amount : 0); ?> /-</div>
                        <div class="caption color-purple btn-link text-mm">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>Last Cash Out Amount</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">BDT <?php echo e($lastRecharge ? $lastRecharge->amount : 0); ?>/-</div>
                        <div class="caption color-purple btn-link text-mm">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>Last Recharge Amount</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic text-left">
                        <div class="number pt-2 pb-2"> <span class="text-mm">Todays Income:</span>
                            BDT<?php echo e($todaysincome ? $todaysincome->amount : 0); ?>/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Yesterdays Income:</span>
                            BDT<?php echo e($yesterdaysincome ? $yesterdaysincome->amount : 0); ?>/-</div>
                    </div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number pt-2 pb-2"> <span class="text-mm">This Week income (till date):</span>
                            BDT<?php echo e($thisWeekIncome ? $thisWeekIncome->amount : 0); ?>/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Last Week Income:</span>
                            BDT 0/-</div>
                    </div>

                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number pt-2 pb-2"> <span class="text-mm">This Month income (till date):</span>
                            BDT 0/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Last Month Income:</span>
                            BDT 0/-</div>
                    </div>
                </section>
                <!--.widget-simple-sm-->
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