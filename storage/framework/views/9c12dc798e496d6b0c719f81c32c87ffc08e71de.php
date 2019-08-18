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
					ফোন থেকে মিস্ত্রি মামার কাজ বিতরণ
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/1.jpg')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ড্যাশবোর্ড-এ উপরের ডান প্রান্তে মেন্যু থেকে “সকল কাজ” মেনুতে, ক্লিক করুন

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/2.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						মিস্ত্রি মামা থেকে কোন কাজ বিতরণ করা হলে তা ড্যাশবোর্ড-এ “সকল কাজ” মেনুর ফোন অর্ডার-এ পাওয়া যাবে। এখানে "বিবরণ" বাটন-টি ক্লিক করলে অর্ডার-এর বিস্তারিত দেখতে পাওয়া যাবে
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/3.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						বিস্তারিত দেখার পর "গ্রহন ও বন্টন” বাটন-টি ক্লিক করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/4.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						এখান থেকে সহকারী নির্বাচন করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/5.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						সহকারীদের মধ্য থেকে উপযুক্ত সহকারীকে নির্বাচন করে “OK” বাটন-টি ক্লিক করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/phone_distribution/6.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						সহকারীকে কাজ বন্টন করে দেবার পর কাজটি “ফোন অর্ডার” থেকে “চলতি কাজ” এ চলে যাবে যার বিস্তারিত এখান থেকে দেখা যাবে
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