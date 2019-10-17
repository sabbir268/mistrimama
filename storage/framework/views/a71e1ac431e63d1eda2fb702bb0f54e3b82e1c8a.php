<?php $__env->startSection('body'); ?>

<h1 class="page-title">Booking
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>New Booking (<?php echo e(count($newOrders)); ?>)</div>
            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Order No</th>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th class="align-center">View</th>
                            <th class="align-center">Action </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($newOrders): ?>
                        <?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->order_no); ?></td>
                            <td><?php echo e($order->user ? $order->user->name : '-'); ?></td>
                            <td><?php echo e($order->user ? $order->user->phone_no : '-'); ?></td>
                            <td><?php echo e($order->user ? $order->user->address : '-'); ?></td>
                            <td><?php echo e($order->area); ?></td>
                            <td><?php echo e($order->category->name); ?></td>
                            <td><?php echo e($order->order_date); ?></td>
                            <td><?php echo e($order->order_time); ?></td>
                            <td class="align-center">
                                
                            <a class="btn btn-primary" href="<?php echo e(asset('/admin/booking/'.$order->id)); ?>">
                                    View Details
                                </a>
                            </td>
                            <td class="align-center">
                                <?php if($order->status == '0'): ?>
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal-<?php echo e($order->id); ?>"
                                    data-item="<?php echo e($order->id); ?>" <?php if($order->status == '4'): ?>
                                    disabled="disabled"
                                    <?php endif; ?> >
                                    Allocate Service Provider
                                </a> <?php else: ?>
                                <a class="btn btn-primary" disabled="disabled">
                                    Allocated
                                </a> <?php endif; ?>
                            </td>
                            <td class="align-center">
                                <?php if($order->status != '5'): ?>
                                <button type="button" class="btn btn-warning" disabled="disabled">Not Complete </button>
                                <?php endif; ?> <?php if($order->status == '5'): ?>
                                <button type="button" class="btn btn-success" disabled="disabled">Job Completed
                                </button> <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                
                
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>



<div class="portlet box green">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>Ongoing Booking (<?php echo e(count($ongoingOrder)); ?>)</div>
    </div>


    <div class="portlet-body flip-scroll">
        <table class="table table-bordered table-striped table-condensed flip-content">
            <thead class="flip-content">
                <tr>
                    <th>Order No</th>
                    <th>Category</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Date/Time</th>
                    <th>Providers</th>
                    <th>Providers Phone</th>
                    <th>Comrade</th>
                    <th>Comrade Phone</th>
                    <th class="align-center">View</th>
                    <th class="align-center">Status </th>
                </tr>
            </thead>
            <tbody>
                <?php if($ongoingOrder): ?>
                <?php $__currentLoopData = $ongoingOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($actorder->order): ?>
                <tr>
                    <td><?php echo e($actorder->order ? $actorder->order->order_no : ''); ?></td>
                    <td><?php echo e($actorder->order ? $actorder->order->category->name : ''); ?></td>
                    <td><?php echo e($actorder->user ? $actorder->user->name : ''); ?></td>
                    <td><?php echo e($actorder->user ? $actorder->user->phone_no : ''); ?></td>
                    <td><?php echo e($actorder->order ? $actorder->order->order_date : ''); ?>/<?php echo e($actorder->order ? $actorder->order->order_time : ''); ?>

                    </td>
                    <td><?php echo e($actorder->provider ? $actorder->provider->name : ''); ?></td>
                    <td><?php echo e($actorder->provider ? $actorder->provider->phone_no : ''); ?></td>
                    <td><?php echo e($actorder->comrade ? $actorder->comrade->c_name : ''); ?></td>
                    <td><?php echo e($actorder->comrade ? $actorder->comrade->c_phone_no : ''); ?></td>
                    <td class="align-center">
                        
                        <a class="btn btn-primary" href="<?php echo e(asset('/admin/booking/'.$actorder->order_id)); ?>">
                            View Details
                        </a>
                    </td>
                    <td class="align-center">

                        <?php if($actorder->order->status == 1): ?>
                        <span class="text-warning">Comrade On The way</span>
                        <?php endif; ?>
                        <?php if($actorder->order->status == 2): ?>
                        <span class="text-danger">Comrade working on service.</span>
                        <?php endif; ?>
                        <?php if($actorder->order->status == 3): ?>
                        <span class="text-success">Comrade has finish his job. And witing for payment.</span>
                        <?php endif; ?>

                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
        

        <?php endif; ?>
    </div>
</div>
</div>
</div>


<?php if($newOrders): ?>
<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="myModal-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="service_provider_id" required="required">
                                        <option value="">Select provider</option>
                                        <?php $__currentLoopData = $service_providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label>
                                    <input type="hidden" class="form-control" name="user_id"
                                        value="<?php echo e($order->user ? $order->user->id : '-'); ?>">
                                    <input type="text" class="form-control" name="user_name"
                                        value="<?php echo e($order->user ? $order->user->name : '-'); ?>" readonly>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Additional Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity > 1 ? $booking->aditional_price : 0); ?></td>
                                        <td><?php echo e($booking->total_price); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Allocate</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>


<?php if($ongoingOrder): ?>
<?php $__currentLoopData = $ongoingOrder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($actOrder->order): ?>
<div class="modal fade" id="view-act-<?php echo e($actOrder->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Client Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->order->name ? $actOrder->order->name : "-"); ?></strong><br>
                                    Phone:
                                    <strong><?php echo e($actOrder->order->phone ? $actOrder->order->phone : "-"); ?></strong><br>
                                    Area:
                                    <strong><?php echo e($actOrder->order->area ? $actOrder->order->area : "-"); ?></strong><br>
                                    Address:
                                    <strong><?php echo e($actOrder->order->address ? $actOrder->order->address : "-"); ?></strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Provider Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->provider ? $actOrder->provider->name : ''); ?></strong><br>
                                    Phone:
                                    <strong><?php echo e($actOrder->provider ? $actOrder->provider->phone_no : ''); ?></strong>
                                    <br>
                                    <u><strong><span class="m-0 typical-header">Comrade Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->comrade ? $actOrder->comrade->c_name : ''); ?></strong><br>
                                    Phone:
                                    <strong><?php echo e($actOrder->comrade ?  $actOrder->comrade->c_phone_no : ''); ?></strong>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Additional Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $actOrder->order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity > 1 ? $booking->aditional_price : 0); ?></td>
                                        <td><?php echo e($booking->total_price); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>