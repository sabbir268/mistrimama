 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>"> <?php if($type == 'others'): ?>
<style>
    .steps-icon-progress li {
        width: 20% !important;
    }
</style>
<?php endif; ?>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
    <section class="box-typical steps-icon-block">
        <div class="steps-icon-progress">
            <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
                <?php if($type == 'others'): ?>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption">Name & Phone </div>
                </li>
                <?php endif; ?>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-pin-2"></i>
                    </div>
                    <div class="caption">Area & Category</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-pin-2"></i>
                    </div>
                    <div class="caption">Services</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-card"></i>
                    </div>
                    <div class="caption">Date & Time</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-check-bird"></i>
                    </div>
                    <div class="caption">Confirmation</div>
                </li>
            </ul>
        </div>

        <header class="steps-numeric-title">Confrimation</header>
        <div class="col-xl-6 offset-md-3 ">
            <p class="text-center">
                <strong>Your order has been place successfully.</strong> Please wait a momment for confirmation. <br>
                <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-link">Return To Dashboard</a>
            </p>
        </div>
</div>

<button type="button" class="btn btn-rounded btn-grey float-left">← Back</button>
<button type="submit" class="btn btn-rounded float-right">Next →</button>
</section>
</div>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>