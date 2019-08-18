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
						সহকারী (কমরেড) যোগ  বাতিল করা
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/1.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						সহকারী যোগ / বাতিল করার জন্য প্রথমে সার্ভিস পার্টনার ড্যাশবোর্ড-এ লগ ইন করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/2.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ড্যাশবোর্ড-এ উপরের ডান প্রান্তে মেন্যু থেকে “সহকর্মী” বাটন-টি ক্লিক করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/3.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						"সহকর্মী" বাটন ক্লিক করার পর "নতুন যোগ করুন” বাটন-টি সিলেক্ট করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/4.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						নতুন সহকর্মী যোগ করার জন্য প্রয়োজনীয় তথ্য গুলো পূরণ করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/5.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						প্রয়োজনীয় তথ্য গুলোর সাথে সহকারীর নিজস্ব ছবি এবং NID এর ছবি (উভয় পাশের) আপলোড করে  "যোগ করুন” বাটন-টি সিলেক্ট করে কাজ সম্পন্ন করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="<?php echo e(asset('images/manuals/comrade_add_del/6.png')); ?>" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						পূর্বের সহকর্মী বাদ দেবার জন্য ড্যাশবোর্ড-এ উপরের ডান প্রান্তে মেন্যু দেখতে পাওয়া যাবে যেখান থেকে "সহকর্মী" বাটন-টি ক্লিক করুন
					</h4>
			</div>
		</div>
		<hr>
		<div class="row">
				<div class="col-md-6 text-center">
					<img class="rounded mx-auto d-block" style="width:65%"
						src="<?php echo e(asset('images/manuals/comrade_add_del/7.png')); ?>" alt="">
				</div>
				<div class="col-md-6 text-center d-flex">
					<h4 class="m-auto">
							উপরোক্ত স্ক্রিন-এর ডান পাশের কমলা বাটনটি দিয়ে আপনি আপনার সহকারীর তথ্য আপডেট করতে পারবেন এবং লাল বাটনটি দিয়ে সহকারী কে সক্রিয় অথবা নিষ্ক্রিয় করতে পারবেন
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