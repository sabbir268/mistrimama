<?php if(count($newOrders) != 0): ?>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <div>অর্ডার নং #</div>
            </th>
            <th>
                <div> সার্ভিস </div>
            </th>
            <th>
                <div>এলাকা </div>
            </th>
            <th>
                <div>সময় </div>
            </th>
            <th>
                <div> বিস্তারিত </div>
            </th>
            <th>
                <div> একশন </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->order_no); ?></td>
            <td><?php echo e($order->category->name); ?></td>
            <td><?php echo e($order->area); ?></td>
            <td><?php echo e($order->order_date); ?>/<?php echo e($order->order_time); ?></td>
            <td> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-<?php echo e($order->id); ?>"
                    data-item="<?php echo e($order->id); ?>">বিস্তারিত</button>
            </td>
            <td>
                <?php if(auth()->user()->serviceProvider->first()->type == 0): ?>
                    <?php if($order->status == '0'): ?>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>"
                            data-item="<?php echo e($order->id); ?>">সহকারী</button> <?php else: ?>
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>"
                            data-item="<?php echo e($order->id); ?>" disabled>এলোকেটেড</button> 
                    <?php endif; ?>
                <?php else: ?> 
                        
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>
</table>
<?php else: ?>
<div class="card-body col-md-12 text-secodary text-center p-5  p-auto">No Order avaiable</div>
<?php endif; ?>

<!-- Modals section for allocate order and view details order -->
<?php if($newOrders): ?>
<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php if($booking->quantity >= 1): ?> <?php echo e($booking->price + ($booking->aditional_price*($booking->quantity
                                            - 1))); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>"
                    data-item="<?php echo e($order->id); ?>" class="btn btn-mm">Allocate</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- View Details Modal end -->



<!-- View Details Modal end -->
<div class="modal fade" id="allocate-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">Select Comrade</option>
                                        <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comrade->id); ?>"><?php echo e($comrade->c_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        <?php echo e($order->user ? $order->user->name : '-'); ?></strong>
                                    <input type="text" name="user_id"
                                        value="<?php echo e($order->user ? $order->user->id : '-'); ?>" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-mm">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>