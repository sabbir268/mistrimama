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

        <div class="row sr-only">
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

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                        <tr>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>TXN ID</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(date("d-m-Y", strtotime($statement->created_at))); ?></td>
                            <td><?php echo e($statement->details); ?>(<?php echo e($statement->type); ?>)</td>
                            <td><?php echo e($statement->trxno); ?></td>
                            <td class="text-center"> <span> <?php if($statement->status == 'credit'): ?> <span
                                        class="label rounded-circle label-success" data-toggle="tooltip"
                                        data-placement="top" title="Credited"><i class="fa fa-plus"></i></span>
                                    <?php elseif($statement->status == 'income'): ?> <span
                                        class="label rounded-circle label-warning" data-toggle="tooltip"
                                        data-placement="top" title="Earned">(e)</span> <?php else: ?> <span
                                        class="label rounded-circle label-danger" data-toggle="tooltip"
                                        data-placement="top" title="Debited"><i class="fa fa-minus"></i></span> <?php endif; ?>
                                </span> <span
                                    class="<?php if($statement->status == 'credit'): ?> text-success  <?php elseif($statement->status == 'income'): ?> text-warning <?php else: ?> text-danger <?php endif; ?>"><?php echo e($statement->amount); ?>/-</span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
        </table>

        <?php echo e($statements->links()); ?>

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