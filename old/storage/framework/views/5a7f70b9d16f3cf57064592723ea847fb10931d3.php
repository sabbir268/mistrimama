<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/separate/pages/widgets.min.css')); ?>">    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
            <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading">
                    <h3 class="panel-title pt-1"> Services History</h3>
            </header>
            <div class="box-typical-body m-1">
                <table class="table table-bordered">
                    <tr>
                        <th rowspan="2"><div>Sl.</div></th>
                        <th rowspan="2"><div>Orders#</div></th>
                        <th rowspan="1"><div>Services</div></th>
                        <th rowspan="2"><div>Date</div></th>
                        <th rowspan="2"><div>Time</div></th>
                        <th rowspan="2"><div>Status</div></th>
                    </tr>
                    <tr>

                    </tr>
                    <?php $i = 1 ?>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><div><?php echo e($i); ?> </div></th>
                            <th><div><?php echo e($order->order_no); ?></div></th>
                            <th>
                                <div>
                                    <?php $services = $order->bookings()->get()?>
                                     <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <li><a href="#" class="btn-link"><?php echo e($service->sub_category->first()->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </th>
                            <th><div><?php echo e($order->order_date); ?></div></th>
                            <th><div><?php echo e($order->order_time); ?></div></th>
                            <th><div>Done</div></th>
                            <?php $i++ ?>
                        </tr> 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </table>
            </div><!--.box-typical-body-->
            <?php echo e($orders->links()); ?>

        </section><!--.box-typical-dashboard-->
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


<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>