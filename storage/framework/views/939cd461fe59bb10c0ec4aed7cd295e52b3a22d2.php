<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/profile.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="col-md-12 bg-white box-typical">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        <?php if($activeOrders): ?>
        <div class="col-lg-4 col-lg-pull-6 col-md-3 col-sm-6 pt-3">
            <section class="box-typical">
                <?php if($activeOrders->status == 0): ?>
                <p class="p-5">Your order has been place. Wait for confirmation.</p>
                <?php endif; ?>

                <?php if($activeOrders->status >= 1): ?>
                <div class="profile-card">
                    <div class="profile-card-photo">
                        <img style="width: 100% !important;height: 100px;"
                            src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                            alt="" />
                    </div>
                    <div class="profile-card-name"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></div>
                    <div class="profile-card-status"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?>

                    </div>

                    <button type="button" class="btn btn-rounded"><i class="fa fa-phone"></i> Call</button>
                </div>
                <!--.profile-card-->

                <div class="profile-statistic tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <b>200</b>
                            Job Complete
                        </div>
                        <div class="tbl-cell">
                            <b>5 <i class="font-icon font-icon-star text-secondary"></i> </b>
                            Avarage Ratings
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </section>
            <!--.box-typical-->
            <form action="<?php echo e(route('cancel.order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="text" name="id" value="<?php echo e($activeOrders->id); ?>" hidden>
                <button class="btn btn-danger col-md-12">Cancel Order</button>
            </form>
        </div>
        <!--.col- -->
        <div class="col-md-8">
            <section class="box-typical-section">
                <?php if($activeOrders->status == 0): ?>
                <div class="alert alert-success alert-fill alert-border-left show" role="alert">
                    <strong>Heads Up!</strong> Your order has been place. Wait for confirmation.
                </div>
                <?php endif; ?>

                <?php if($activeOrders->status == 1): ?>
                <div class="alert alert-purple alert-fill alert-border-left show" role="alert">
                    <strong>Bingoo!</strong> Your order has been accepted. And Comrade on the way.
                </div>
                <?php endif; ?>

                <?php if($activeOrders->status == 2): ?>
                <div class="alert alert-warning alert-fill alert-border-left show" role="alert">
                    <strong><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></strong> start your service/work.
                </div>
                <?php endif; ?>

                <?php if($activeOrders->status == 3): ?>
                <div class="alert alert-info alert-fill alert-border-left show" role="alert">
                    <strong><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></strong> finish your work.
                    <b>Waiting for payment.</b>
                </div>
                <?php endif; ?>

                <div class="card">
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total </th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $activeOrders->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-left"><?php echo e($booking->service_name); ?></td>
                                <td><?php echo e($booking->price); ?></td>
                                <td class="text-center"><?php echo e($booking->quantity); ?></td>
                                <td><?php echo e($booking->total_price); ?></td>
                                <td class="text-center"> <a href="<?php echo e(url('user/remove-sub')); ?>/<?php echo e($booking->id); ?>"
                                        class="btn btn-sm btn-danger "><i class="font-icon font-icon-del"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="bg-light">
                                <td colspan="2" class="text-right">Toal Quantity/Price</td>
                                <td ><?php echo e($sumOrder->first()->total_quantity); ?></td>
                                <td colspan="2"><?php echo e($sumOrder->first()->total_price); ?></td>
                            </tr>
                            <tr class="bg-light">
                                <td colspan="3">Extra Charge</td>
                                <td colspan="2"><?php echo e($activeOrders->extra_charge); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <?php endif; ?>
                </div>
            </section>
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
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>