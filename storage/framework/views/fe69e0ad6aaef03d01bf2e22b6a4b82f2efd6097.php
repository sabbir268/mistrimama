 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
<div class="col-md-12 bg-white box-typical">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <section class="box-typical-section">
                <?php if($activeOrders): ?>
                <div class="card-header">
                    <?php if($activeOrders->status == 0): ?>
                    <p>Your order has been place. Wait for confirmation.</p>
                    <?php endif; ?> 
                    
                    <?php if($activeOrders->status == 1): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">

                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p>Your order has been accepted. <br> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        is in your way.</p>
                    <br>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?>

                    </p>
                    <?php endif; ?>
                    
                    <?php if($activeOrders->status == 2): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        start your service/work.</p>
                    <p>Phone No: {$activeOrders->serviceSystem->first()->comrade->c_phone_no}} </p>
                    <?php endif; ?> <?php if($activeOrders->status == 3): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p><strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        finish your work. <b>Waiting for payment.</b></p>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                    <?php endif; ?>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $activeOrders->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($booking->service_name); ?></td>
                            <td><?php echo e($booking->price); ?></td>
                            <td><?php echo e($booking->quantity); ?></td>
                            <td><?php if($booking->quantity >= 1): ?> <?php echo e($booking->price + ($booking->aditional_price*($booking->quantity
                                - 1))); ?> <?php endif; ?></td>
                            <td> <a href="<?php echo e(url('user/remove-sub')); ?>/<?php echo e($booking->id); ?>" class="btn btn-danger btn-sm">Remove</a> </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <button class="btn btn-success" data-target="#addNew" data-toggle="modal" >Add New Service</button>
                <?php endif; ?>
            </section>
        </div>
    </div>
</div>



<div class="modal fade" id="addNew" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Service Provider</h4>
                </div>
                <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="order_id" value="<?php echo e($activeOrders->id); ?>" />
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Sub Services:</label>
                                        <select class="form-control" name="sub_service_id" required="required">
                                                <option value="">Select Service</option>
                                                <?php $__currentLoopData = $subServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity:</label>
                                        <input type="text" class="form-control" name="qty">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
    
        </div>
    </div>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<script>
    $('#date_of_birth').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>