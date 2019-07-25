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
<header class="page-content-header widgets-header">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  font-weight-bold">
                                        <h4>Ongoing &nbsp;&nbsp;&nbsp; Job</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-light"><?php if($ongonigOrder): ?> <?php echo e(count($ongonigOrder)); ?> <?php else: ?> 0 <?php endif; ?>  </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  ">
                                        <h4>Schedule Job</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-light"> 0 </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  ">
                                        <h4>Total Job</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-light"><?php if($activeOrders): ?> <?php echo e(count($activeOrders)); ?> <?php else: ?> 0 <?php endif; ?> </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell ">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <button style="width:100%"
                                    class="btn btn-sm btn-inline btn-success-outline m-0 mb-1">View Current Job
                                </button>
                            </div>
                        </div>
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <button style="width:100%" class="btn btn-sm btn-inline btn-success-outline m-0">View
                                    Job History
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--.row-->
<div class="row">
    <div class="col-md-6">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading pt-2 pb-2">
                <h3 class="panel-header m-0">New Available Order</h3>
            </header>
            <div class="box-typical-body panel-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div>Order No #</div>
                            </th>
                            <th>
                                <div>Service</div>
                            </th>
                            <th>
                                <div>Area</div>
                            </th>
                            <th>
                                <div>Time</div>
                            </th>
                            <th>
                                <div>Details</div>
                            </th>
                            <th>
                                <div>Action</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($newOrders): ?>
                        <?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->order_no); ?></td>
                            <td><?php echo e($order->category->name); ?></td>
                            <td><?php echo e($order->area); ?></td>
                            <td><?php echo e($order->order_date); ?>/<?php echo e($order->order_time); ?></td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#view-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">Details</button>
                            </td>
                            <td>
                                <?php if($order->status == '0'): ?>
                                <button class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#allocate-<?php echo e($order->id); ?>"
                                    data-item="<?php echo e($order->id); ?>">Allocate</button> <?php else: ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>"
                                    disabled>Allocated</button> <?php endif; ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>
    <div class="col-md-6">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading pt-2 pb-2">
                <h3 class="panel-header m-0">Active Order</h3>
            </header>
            <div class="box-typical-body panel-body ">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div>Order No #</div>
                            </th>
                            <th>
                                <div>Service</div>
                            </th>
                            <th>
                                <div>Orderer</div>
                            </th>
                            <th>
                                <div>Comrade</div>
                            </th>
                            <th>
                                <div>Details</div>
                            </th>
                            <th>
                                <div>Status</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($actord->order->order_no); ?></td>
                            <td><?php echo e($actord->order->category->name); ?></td>
                            <td><?php echo e($actord->user->name); ?></td>
                            <td><?php echo e($actord->provider->name); ?></td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#view-act-<?php echo e($actord->id); ?>"
                                    data-item="<?php echo e($actord->id); ?>">Details</button>
                            </td>
                            <td>
                                <?php if($actord->order->status == 1): ?>
                                <span class="text-warning">Comrade On The way</span>
                                <?php endif; ?>
                                <?php if($actord->order->status == 2): ?>
                                <span class="text-danger">Comrade working on service.</span>
                                <?php endif; ?>
                                <?php if($actord->order->status == 3): ?>
                                <span class="text-success">Comrade has finish his job. And witing for payment.</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>
</div>

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
                    data-item="<?php echo e($order->id); ?>" class="btn btn-primary">Allocate</button>
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
                    <button type="submit" class="btn btn-primary">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($activeOrders): ?>
<?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                    Name:<strong><?php echo e($actOrder->order->user->name); ?></strong><br> Phone:
                                    <strong><?php echo e($actOrder->order->user->phone_no); ?></strong><br>
                                    Area: <strong><?php echo e($actOrder->order->area); ?></strong><br>
                                    Address: <strong><?php echo e($actOrder->order->user->address); ?></strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Comrade Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->comrade->c_name); ?></strong><br> Phone:
                                    <strong><?php echo e($actOrder->comrade->c_phone_no); ?></strong>
                                </div>
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
                                    <?php $__currentLoopData = $actOrder->order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>

<script>
    $(document).ready(function() {
           
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>