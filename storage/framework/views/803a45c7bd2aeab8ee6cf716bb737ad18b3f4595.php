<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
	<div class="col-md-11 ml-5 bg-white">
		<div class="row">
			<div class="col-md-12 text-center">
				<h3 class="m-auto p-2 pt-5">
						সার্ভিস পার্টনার ক্যাশ আউট করার নিয়ম
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/sp_cashout/1.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						সার্ভিস পার্টনার ড্যাশবোর্ড-এর একদম শুরুতে “ক্যাশ আউট করুন” অপশনটি দেখতে পাবেন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/sp_cashout/2.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ক্যাশআউট করার জন্য এই স্ক্রিনটি দেখতে পাওয়া যাবে
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/sp_cashout/3.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ক্যাশ আউট এমাউন্ট এবং মোবাইল ব্যাংকিং নাম্বার-টি লিখুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/sp_cashout/4.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ক্যাশ আউট সফলভাবে সম্পন্ন হবার পর সার্ভিস পার্টনার ড্যাশবোর্ড-এ লেনদেন হিস্টোরি দেখতে পাওয়া যাবে এবং পক্রিয়া সম্পন্ন হবে
				</h4>
			</div>
		</div>
		


	</div>
</div>
<!--.row-->

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