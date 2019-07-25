<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">   

<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">
            <section class="tabs-section">
                    <div class="tabs-section-nav tabs-section-nav-icons">
                        <div class="tbl">
                            <ul class="nav" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" href="#tabs-1-tab-1" role="tab" data-toggle="tab" aria-selected="true">
                                        <span class="nav-link-in">
                                            <i class="font-icon font-icon-wallet"></i>
                                            Bkash Payment
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#tabs-1-tab-2" role="tab" data-toggle="tab" aria-selected="false">
                                        <span class="nav-link-in">
                                            <span class="font-icon font-icon-player-subtitres"></span>
                                            Card Payment
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!--.tabs-section-nav-->
    
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active show" id="tabs-1-tab-1">
                            <div class="col-md-6 offset-md-3 mt-3">
                            <form action="">
                                <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default">Transaction Id</span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                    </div>   
                                    <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                        </div>  
                                    
                                    
                                        <button class="btn btn-success col-md-12" type="submit">Confirm</button>            
                                     
                            </form>
                        </div>
                        </div><!--.tab-pane-->
                        <div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2">
                                <div class="col-md-6 offset-md-3 mt-3">
                                        <form action="">
                                            <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Card Number</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                </div>  
                                                <div class="row">
                                                    <div class="col-md-7">
                                                            <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">EXP Date</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                            </div> 
                                                    </div>

                                                    <div class="col-md-5">
                                                            <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="inputGroup-sizing-default">CVV</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                                            </div> 
                                                    </div>
                                                     
                                                 </div> 
                                                
                                                    <button class="btn btn-success col-md-12" type="submit">Confirm</button>            
                                                 
                                        </form>
                                    </div>    
                        </div><!--.tab-pane-->
                    </div><!--.tab-content-->
                </section>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>

<script>    
    $(document).ready(function() {
            $('.panel').each(function () {
                try {
                    $(this).lobiPanel({
                        sortable: true
                    }).on('dragged.lobiPanel', function(ev, lobiPanel){
                        $('.dahsboard-column').matchHeight();
                    });
                } catch (err) {}
            });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>