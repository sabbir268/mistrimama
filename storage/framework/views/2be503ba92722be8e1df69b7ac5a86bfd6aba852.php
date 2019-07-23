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
            <h3 class="panel-title pt-1">পূর্বের কাজ সমূহ </h3>
        </header>
        <div class="box-typical-body m-1">
            <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>
                        <div>#</div>
                    </th>
                    <th>
                        <div>অর্ডার #</div>
                    </th>
                    <th>
                        <div>সার্ভিস</div>
                    </th>
                    <th>
                        <div>চার্জ </div>
                    </th>
                    <th>
                        <div>জরুরী মূল্য </div>
                    </th>
                    <th>
                        <div>মোট মূল্য </div>
                    </th>
                    <th>
                        <div>আয়</div>
                    </th>
                    <th>
                        <div>তারিখ</div>
                    </th>
                    <th>
                        <div>সময়</div>
                    </th>
                    <th>
                        <div>অর্ডারের সময় </div>
                    </th>
                    <th>
                        <div>কাস্টমার</div>
                    </th>
                    <th>
                        <div>সহকারী </div>
                    </th>
                </tr>
                <tr>

                </tr>
                <?php $i = 1 ?>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <div><?php echo e($i); ?> </div>
                    </td>
                    <td>
                        <div><?php echo e($order->orders_no); ?></div>
                    </td>
                    <td>
                        <div>
                            <button data-toggle="modal" data-target="#orderDetailsModal<?php echo e($order->id); ?>"
                                class="btn btn-success btn-sm">বিবরণ </button>
                        </div>
                    </td>
                    <td>
                        <div><?php echo e($order->total_price); ?></div>
                    </td>
                    <td>
                        <div><?php echo e($order->extra_charge); ?></div>
                    </td>
                    <td>
                        <div><?php echo e($order->total_price + $order->extra_charge); ?></div>
                    </td>
                    
                        <?php 
                                $tam = ($order->total_price + $order->extra_charge); 
                                $mmc = (($tam * $providers->service_category) / 100); 
                                $spam = $tam - $mmc;
                            ?>
                        
                    
                    <td>
                        <div><?php echo e($spam); ?></div>
                    </td>
                    
                    <td>
                        <div><?php echo e(date('d-m-Y',strtotime($order->order_date))); ?></div>
                    </td>
                    <td>
                        <div><?php echo e($order->order_time); ?></div>
                    </td>
                    <td>
                        <div>
                            <?php echo e(date('d-m-Y',strtotime(explode(' ',$order->orders_place_time)[0]))); ?>/<?php echo e(explode(' ',$order->orders_place_time)[1]); ?>

                        </div>
                    </td>
                    <td>
                        <div><?php echo e($order->user->name); ?></div>
                    </td>
            
                    <td>
                        <div><?php echo e($order->comrade ? $order->comrade->c_name : "self"); ?></div>
                    </td>
                    <?php $i++ ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
        </div>
            <?php echo e($orders->links()); ?>

        </div>
        <!--.box-typical-body-->
    </section>
    <!--.box-typical-dashboard-->
</div>

<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="orderDetailsModal<?php echo e($order->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সার্ভিসের বিবরণ </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped p-0 m-0">
                    <thead>
                        <tr>
                            <td>সার্ভিস </td>
                            <td>মূল্য </td>
                            <td>অতিরিক্ত মূল্য </td>
                            <td>মোট মূল্য </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $services = $order->bookings()->get() ?>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($service->service_name); ?> - <?php echo e($service->service_details_name); ?> </td>
                            <td><?php echo e($service->price); ?></td>
                            <td><?php echo e($service->aditional_price); ?></td>
                            <td><?php echo e($service->total_price); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">বাতিল </button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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