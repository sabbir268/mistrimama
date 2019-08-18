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
                    <div class="tbl-cell pb-0">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="">
                                        <div class="title">ব্যালেন্স</div>
                                        <div class="amount-sm">উত্তোলনযোগ্য  ৳<?php echo e($balance > 500 ? $balance - 500 : 0); ?>/- </div>
                                    </div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="col-md-4">
                                        <header> <strong>৳&nbsp;<?php echo e($balance); ?>/- </strong> </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="<?php if($balance <= 1000): ?> #amount_withdraw <?php else: ?> # <?php endif; ?>"
                            style="width:100%"
                            class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 <?php if($balance < 999): ?> disabled <?php endif; ?> ">ক্যাশ আউট করুন </a>
                    </div>
                    
                    <div class="tbl-cell pb-0">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="">
                                        <div class="title">সহকারীর সংখ্যা</div>
                                        <div class="amount-sm">এক্টিভ - <?php echo e(count($comrades)); ?> / এক্টিভ নয় -
                                            <?php echo e(count($totalcomrades) - count($comrades)); ?></div>
                                    </div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="col-md-4">
                                        <header> <strong><?php echo e(count($totalcomrades)); ?></strong> </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo e(route('esp.comrade')); ?>" style="width:100%"
                            class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2">সহকারীর বিস্তারিত </a>
                    </div>
                    <div class="tbl-cell">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="title">রেটিং </div>
                                </div>
                                <div class="tbl-cell tbl-cell-progress">
                                    <div class="circle-progress-bar-typical size-56 pieProgress pie_progress"
                                        role="progressbar" data-goal="75" data-barcolor="#929faa" data-barsize="10"
                                        aria-valuemin="0" aria-valuemax="100" aria-valuenow="75">
                                        <span class="pie_progress__number text-secondary"><?php echo e($ratings); ?> <i
                                                class="fa fa-star "></i> </span>
                                        <div class="pie_progress__svg"><svg version="1.1"
                                                preserveAspectRatio="xMinYMin meet" viewBox="0 0 160 160">
                                                <ellipse rx="75" ry="75" cx="80" cy="80" stroke="#f2f2f2" fill="none"
                                                    stroke-width="10"></ellipse>
                                                <path fill="none" stroke-width="10" stroke="#929faa"
                                                    d="M80,5 A75,75 0 1 1 5,80.00000000000001"
                                                    style="stroke-dasharray: 353.479, 353.479; stroke-dashoffset: 0;">
                                                </path>
                                            </svg></div>
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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                শেয়ার রেফারেল কোড / লিংক 
            </div>
            <div class="card-body">
                <div class="col-md-4 offset-md-4 bg-light text-success p-4 border rounded">
                    <span class="font-weight-bold"><?php echo e($refcode); ?></span>
                </div>
                <div class="input-group mb-2 mt-3">
                    <input type="text" id="ref-link" style="color: #fff !important;"
                        class="form-control bg-secondary border-secondary text-white"
                        value="<?php echo e(asset('/order/refer/')); ?>/<?php echo e($refcode); ?>" aria-describedby="basic-addon2" readonly>
                    <div class="input-group-append">
                        <span class="btn btn-secondary-outline" id="copyReflink">Copy</span>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-10 offset-md-1">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(asset('/order/refer/')); ?>/<?php echo e($refcode); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-facebook"></i> Share on Facebook</a>
                        <a href="https://twitter.com/intent/tweet?text=<?php echo e(asset('/order/refer/')); ?>/<?php echo e($refcode); ?>" target="_blank"  class="btn btn-primary"><i class="fa fa-twitter"></i> Share on Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--.col-->
    <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    শীর্ষ রেফারার
                </div>
                <div class="card-body">
                    <div class="p-2 text-center">
                        <div style="height:100px" class="col-md-4 border rounded d-inline-block ">
                            <img src="<?php echo e(asset('dashboard/img/newlogokom.png')); ?>" style="height:80px;width:80px" alt="Image">
                        </div>
                        <br>
                        <h3> <?php if($topRferer != null): ?>
                            <?php echo e($topRferer->name); ?>

                            <?php else: ?>
                            কোন রেফারার এখন বিদ্যমান নেই
                            <?php endif; ?>
                        </h3>
                    </div>
                </div>
            </div>
    
            <div class="card">
                <div class="card-header">
                    পূর্বের রেফার সমূহ
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>তারিখ</th>
                                <th>বিস্তারিত</th>
                                <th>রিওয়ার্ড পয়েন্ট</th>
                                <th>অবস্থা</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($referHistory != null): ?>
                                <?php $__currentLoopData = $referHistory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refhis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($refhis->created_at); ?></td>
                                    <td><?php echo e($refhis->details); ?></td>
                                    <td><?php echo e($refhis->rp); ?></td>
                                    <td><?php echo e($refhis->status); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
    <!--.col-->
</div>
<!--.row-->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $(document).ready(function() {
           $('#copyReflink').click(function(){
             copyToClipboard('#ref-link');
             $(this).text('Copied');
           });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>