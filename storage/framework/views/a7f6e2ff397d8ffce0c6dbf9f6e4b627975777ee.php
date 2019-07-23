<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
        <header class="box-typical-header panel-heading">
            <h3 class="panel-title pt-1"> Services History</h3>
        </header>
        <div class="box-typical-body m-1">
            <table class="table table-bordered">
                <thead class="bg-mm-light">
                    <tr>
                        <th class="bg-mm-light">
                            <div>Sl.</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Orders#</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Services</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Charge</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Extra Charge</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Total Amount</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Date</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Time</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Order Place Time </div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Service Provider</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Comrade</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Status</div>
                        </th>
                    </tr>
                </thead>
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
                                class="btn btn-success btn-sm">View Details</button>
                        </div>
                    </td>
                    <td>
                        <div>BDT <?php echo e($order->total_price); ?></div>
                    </td>
                    <td>
                        <div>BDT <?php echo e($order->extra_charge); ?></div>
                    </td>
                    <td>
                        <div>BDT <?php echo e($order->total_price + $order->extra_charge); ?></div>
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
                        <div><?php echo e($order->provider ? $order->provider->name : '-'); ?></div>
                    </td>
                    <td>
                        <div><?php echo e($order->comrade ? $order->comrade->c_name : '-'); ?></div>
                    </td>
                    <td>
                        <div class="text-<?php echo e($order->status == 'cancel' ? 'danger': 'success'); ?>"><?php echo e($order->status == 'cancel' ? 'Cancel': 'Success'); ?></div>
                    </td>
                    <?php $i++ ?>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </table>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table p-0 m-0">
                    <thead class="bg-mm-light">
                        <tr>
                            <td>Service</td>
                            <td>Price</td>
                            <td>Adition Price</td>
                            <td>Total Price</td>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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