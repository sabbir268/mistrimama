 
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
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
        <header class="box-typical-header panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="panel-title pt-1">Services History</h3>
                </div>

                <div class="col-md-6">
                    <form class="site-header-search ">
                        <input type="text" placeholder="Search" />
                        <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                        <div class="overlay"></div>
                    </form>
                </div>
            </div>

        </header>
        <div class="box-typical-body panel-body">
            <table class="table">
                <tr>
                    <th>Order Number</th>
                    <th>Orderer</th>
                    <th>Service</th>
                    <th>Area</th>
                    <th>Service Date/Time</th>
                    <th>Comrade</th>
                    <th>Action</th>
                </tr>
                <?php $__currentLoopData = $allorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aloOrd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>#<?php echo e($aloOrd->order->order_no); ?></td>
                    <td><?php echo e($aloOrd->order->user->name); ?></td>
                    <td><?php echo e($aloOrd->order->category->name); ?></td>
                    <td><?php echo e($aloOrd->order->area); ?></td>
                    <td><?php echo e($aloOrd->order->order_date); ?>/<?php echo e($aloOrd->order->order_time); ?></td>
                    <td><?php echo e($aloOrd->comrade->c_name); ?></td>
                    <td>
                         <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-act-<?php echo e($aloOrd->id); ?>" data-item="<?php echo e($aloOrd->id); ?>">Details</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
        
    </section>
    <!--.box-typical-dashboard-->
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