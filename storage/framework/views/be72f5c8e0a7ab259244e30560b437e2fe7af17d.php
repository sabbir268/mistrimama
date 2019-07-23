<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Mistri Mama || Door step service provider</title>
	<link href="img/favicon.html" rel="icon" type="image/png">

	<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/font-awesome/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/bootstrap/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/main.css')); ?>">
	<style>
		#preloader {
			position: fixed;
			left: 0;
			top: 0;
			z-index: 999;
			width: 100%;
			height: 100%;
			overflow: visible;
			background: #fff;
		}

		#square {
			position: absolute;
			top: 50%;
			left: calc(50% - 50px);
			transform: translate(-50%, -50%);
			width: 50px;
			height: 50px;
			background: #ff0;
			border: 4px solid #262626;
			box-sizing: border-box;
			animation: animate 1s linear infinite;
		}

		@keyframes  animate {
			0% {
				transform-origin: bottom right;
				transform: translate(-50%, -50%) rotate(0deg) translateX(25px);
			}

			50% {
				transform-origin: bottom right;
				transform: translate(-50%, -50%) rotate(90deg);
			}

			100% {
				transform-origin: bottom right;
				transform: translate(-50%, -50%) rotate(90deg) translateY(25px);
			}
		}
	</style>

	<?php echo $__env->yieldContent('styles'); ?>
</head>

<body onload="preload()" class="with-side-menu">
	 <?php echo $__env->yieldContent('topbar'); ?>


	<div class="mobile-menu-left-overlay"></div>
	<?php echo $__env->yieldContent('sidebar'); ?>
	<div class="page-content">
		<div class="container-fluid p-0">
			<?php echo $__env->yieldContent('content'); ?>
		</div>
		<!--.container-fluid-->

		<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
			<?php echo e(csrf_field()); ?>

		</form>
	</div>
	<!--.page-content-->

	<script src="<?php echo e(asset('dashboard/js/lib/jquery/jquery-3.2.1.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/js/lib/popper/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/js/lib/tether/tether.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/js/lib/bootstrap/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dashboard/js/plugins.js')); ?>"></script>

	<?php echo $__env->yieldContent('scripts'); ?>

	<script src="<?php echo e(asset('dashboard/js/app.js')); ?>"></script>

	<script>
		function preload() {
			//$('#preloader').fadeOut('slow', function () { $(this).remove(); $('.with-side-menu').show() });
			$('#preloader').hide();
        }
	</script>

</body>

</html>