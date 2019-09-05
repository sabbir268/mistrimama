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
                        <div class="number">টাকা <?php echo e($balance ? $balance : 0); ?>/-</div>
                        <div class="caption color-purple text-mm ">উত্তোলনযোগ্য
                            ৳<?php echo e($balance > 500 ? $balance - 500 : 0); ?>/-</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>বর্তমান একাউন্ট ব্যালেন্স</strong></div>
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
                        <div class="number">টাকা <?php echo e($spam); ?>/-
                        </div>
                        <div class="caption color-purple btn-link text-mm " data-toggle="modal"
                            data-target="#lastServiceModal" style="cursor:pointer">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>সর্বশেষ সার্ভিস মূল্য </strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা <?php echo e($lastCashOut ? $lastCashOut->amount : 0); ?> /-</div>
                        <div class="caption color-purple btn-link text-mm" data-toggle="modal"
                            data-target="#lastCashOutModal" style="cursor:pointer">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>শেষ ক্যাশ আউটের পরিমাণ</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা <?php echo e($lastRecharge ? $lastRecharge->amount : 0); ?>/-</div>
                        <div class="caption color-purple btn-link text-mm" data-toggle="modal"
                            data-target="#lastRechargeModal" style="cursor:pointer">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>শেষ রিচার্জ-এর পরিমাণ</strong></div>
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
                    <th>তারিখ </th>
                    <th>বিস্তারিত </th>
                    <th>TXN ID</th>
                    <th class="text-center">পরিমান </th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $statements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(date("d-m-Y", strtotime($statement->created_at))); ?></td>
                    <td><?php echo e($statement->details); ?>(<?php echo e($statement->type); ?>)</td>
                    <td><?php echo e($statement->trxno); ?></td>
                    <td class="text-center"> <span> <?php if($statement->status == 'credit'): ?> <span
                                class="label rounded-circle label-success" data-toggle="tooltip" data-placement="top"
                                title="Credited"><i class="fa fa-plus"></i></span>
                            <?php elseif($statement->status == 'income'): ?> <span class="label rounded-circle label-warning"
                                data-toggle="tooltip" data-placement="top" title="Earned">(e)</span> <?php else: ?> <span
                                class="label rounded-circle label-danger" data-toggle="tooltip" data-placement="top"
                                title="Debited"><i class="fa fa-minus"></i></span> <?php endif; ?>
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


<!-- Modal -->
<div class="modal fade" id="lastCashOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ উত্তোলনের বিস্তারিত </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>তারিখ</th>
                                    <th>বিস্তারিত</th>
                                    <th>TXNID </th>
                                    <th>মূল্য</th>
                                    <th>পরিমাণ</th>
                                </tr>

                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lastServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ সার্ভিস ডিটেইলস </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="p-0 mt-2 m-0 border-bottom">কাস্টমারের বিস্তারিত :</h5>
                        <h6 class="p-0 m-0 ">নাম : <?php echo e($lastServiceAmount ? $lastServiceAmount->name : 0); ?> </h5>
                            <h6 class="p-0 m-0">ঠিকানা: <?php echo e($lastServiceAmount ?  $lastServiceAmount->address : 0); ?> </h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="p-0 mt-2 m-0 border-bottom">সহকারীর বিস্তারিত :</h5>
                        <h6 class="p-0 m-0 ">নাম :
                            <?php if($lastServiceAmount): ?> <?php echo e($lastServiceAmount->comrade ? $lastServiceAmount->comrade->c_name : ''); ?> <?php endif; ?> </h5>
                            <h6 class="p-0 m-0">ঠিকানা :
                                 <?php if($lastServiceAmount): ?> <?php echo e($lastServiceAmount->comrade ? $lastServiceAmount->comrade->c_phone_no : ''); ?> <?php endif; ?> </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>সার্ভিস</th>
                                    <th>সার্ভিস বিট</th>
                                    <th>পরিমান </th>
                                    <th>মূল্য</th>
                                    <th>অতিরিক্ত মূল্য</th>
                                    <th>মোট মূল্য </th>
                                </tr>

                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                ?>
                                <?php if($lasServiceDetails): ?>
                                <?php $__currentLoopData = $lasServiceDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lastService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td> <?php echo e($i); ?> </td>
                                    <td> <?php echo e($lastService->service_name); ?> </td>
                                    <td> <?php echo e($lastService->service_details_name); ?> </td>
                                    <td> <?php echo e($lastService->quantity); ?> </td>
                                    <td> <?php echo e($lastService->price); ?> </td>
                                    <td> <?php echo e($lastService->aditional_price); ?> </td>
                                    <td> <?php echo e($lastService->total_price); ?> </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="lastRechargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ রিচার্জ-এর ডিটেইলস </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>বিস্তারিত</th>
                                    <th>TXN ID</th>
                                    <th class="text-center">পরিমান </th>
                                </tr>

                            </thead>

                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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