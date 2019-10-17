<?php $__env->startSection('body'); ?>

<h1 class="page-title">Booking
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading">
                <h3 class="panel-title pt-1"> Services History</h3>
            </header>
            <div class="table-responsive m-1">
                <table class="table table-bordered">
                    <tr>
                        <th>
                            <div>Sl.</div>
                        </th>
                        <th>
                            <div>Orders#</div>
                        </th>
                        <th>
                            <div>Services</div>
                        </th>
                        <th>
                            <div>Charge</div>
                        </th>
                        <th>
                            <div>Extra Charge</div>
                        </th>
                        <th>
                            <div>Total Amount</div>
                        </th>
                        <th>
                            <div>SP Amount</div>
                        </th>
                        <th>
                            <div>MM Commission</div>
                        </th>
                        <th>
                            <div>Date</div>
                        </th>
                        <th>
                            <div>Time</div>
                        </th>
                        <th>
                            <div>Area</div>
                        </th>
                        <th>
                            <div>Order Place Time </div>
                        </th>
                        <th>
                            <div>SP Accept Time </div>
                        </th>
                        <th>
                            <div>Service User</div>
                        </th>
                        <th>
                            <div>User Adress</div>
                        </th>
                        <th>
                            <div>User Phone</div>
                        </th>
                        <th>
                            <div>Service Provider</div>
                        </th>
                        <th>
                            <div>Provider Phone</div>
                        </th>
                        <th>
                            <div>Comrade</div>
                        </th>
                        <th>
                            <div>Comrade Phone</div>
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
                        <?php 
                            if($order->provider){
                                $tam = ($order->total_price + $order->extra_charge); 
                                $mmc = (($tam * $order->provider->service_category) / 100); 
                                $spam = $tam - $mmc;
                            }else {
                                $mmc = 0;
                                $spam = 0;
                            }
                            ?>

                        <td>
                            <div>BDT <?php echo e($order->provider ? $spam : 0); ?></div>
                        </td>

                        <td>
                            <div>BDT <?php echo e($order->provider ? $mmc : 0); ?></div>
                        </td>

                        <td>
                            <div><?php echo e(date('d-m-Y',strtotime($order->order_date))); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->order_time); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->area); ?></div>
                        </td>
                        <td>
                            <div>
                                <?php echo e(date('d-m-Y',strtotime(explode(' ',$order->orders_place_time)[0]))); ?>/<?php echo e(explode(' ',$order->orders_place_time)[1]); ?>

                            </div>
                        </td>
                        <td>
                            <div>
                                <?php echo e(date('d-m-Y',strtotime(explode(' ',$order->sp_accept_time)[0]))); ?>/<?php echo e(explode(' ',$order->sp_accept_time)[1]); ?>

                            </div>
                        </td>
                        <td>
                            <div><?php echo e($order->name); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->address); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->phone); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->provider ? $order->provider->name : '-'); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->provider ? $order->provider->phone_no : '-'); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->comrade ? $order->comrade->c_name :  '-'); ?></div>
                        </td>
                        <td>
                            <div><?php echo e($order->comrade ? $order->comrade->c_phone_no : '-'); ?></div>
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
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped p-0 m-0">
                        <thead>
                            <tr>
                                <td>Service</td>
                                <td>Quantity</td>
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
                                <td><?php echo e($service->quantity); ?></td>
                                <td><?php echo e($service->price); ?></td>
                                <td><?php echo e($service->quantity > 1 ? $service->aditional_price : 0); ?></td>
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

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>