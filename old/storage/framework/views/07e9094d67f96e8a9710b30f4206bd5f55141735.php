<!DOCTYPE html>
<html>

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Mistri Mama || Door step service provider</title>
	<link rel="icon" href="<?php echo e(asset('images/favicon.ico')); ?>" type="image/ico" sizes="16x16">
	<?php echo csrf_field(); ?>
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


		/* width */
		::-webkit-scrollbar {
			width: 8px;
			height: 8px;
		}

		/* Track */
		::-webkit-scrollbar-track {
			background: #f1f1f1;
		}

		/* Handle */
		::-webkit-scrollbar-thumb {
			background: #888;
		}

		/* Handle on hover */
		::-webkit-scrollbar-thumb:hover {
			background: #555;
		}

		/* btn for mm */

		.btn-mm {
			border: 1px solid #f3b400 !important;
			background-color: #f3b400 !important;
			color: #fff !important;

		}

		.border-mm {
			border: 1px solid #f3b400 !important;
		}

		.btn-mm-border,
		.btn-mm-outline {
			border: 1px solid #f3b400 !important;
			background-color: transparent !important;
			font-size: 14px !important;
		}

		.btn-mm-border:hover,
		.btn-mm-outline:hover {
			border: 1px solid #f3b400 !important;
			background-color: #f3b400 !important;
			color: #fff !important;
		}

		.btn-mm:hover {
			background-color: #fff !important;
			color: #f3b400 !important;
			border: 1px solid #f3b400 !important;

		}

		.btn-mm:hover>a {
			color: #f3b400 !important;
		}

		.bg-mm {
			background-color: #f3b400 !important;
		}

		.bg-mm-light {
			background-color: #f3b4001c !important;
		}

		.bg-mm-light-force,
		th {
			background-color: #f3b40000 !important;
		}

		.text-mm {
			color: #f3b400 !important;
		}

		/* this only for the mm */
		.steps-icon-progress .active:before {
			background-color: #f3b400 !important;
		}

		.checkbox-detailed input:checked+label {
			background-color: #f3b40008 !important;
			border-color: #f3b400 !important;
		}

		.checkbox-detailed input:checked+label:before {
			border-color: #f3b400 !important;
			background-color: #f3b400 !important;
		}

		.bg-danger {
			background-color: #ed1c24 !important;
		}

		.btn.btn-danger {
			background-color: #ed1c24 !important;
			border-color: #ed1c24 !important;
		}

		.bootstrap-table .table td,
		.bootstrap-table .table th,
		.fixed-table-body .table td,
		.fixed-table-body .table th,
		.table td,
		.table th {

			border-top-color: #ebd084 !important;

		}

		.form-control {
			border: solid 1px rgb(243, 180, 0) !important;
		}

	</style>
	<?php echo $__env->yieldContent('styles'); ?>
</head>

<body onload="preload()" class="with-side-menu">
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.3">
	</script>

	<?php echo $__env->yieldContent('topbar'); ?>

	<div class="mobile-menu-left-overlay"></div>
	<?php echo $__env->yieldContent('sidebar'); ?>
	<div class="page-content">
		<div class="container-fluid p-0">
			<button id="bn-success" type="button" class="btn btn-success" hidden>Success</button>
			<button id="bn-warning" type="button" class="btn btn-warning" hidden>Warning</button>
			<button id="bn-danger" type="button" class="btn btn-danger" hidden>Error</button>
			<button id="bn-info" type="button" class="btn btn-info" hidden>Information</button>
			<button id="bn-white" type="button" class="btn btn-secondary" hidden>White</button>
			<button id="bn-grey" type="button" class="btn btn-secondary" hidden>Grey</button>
			<?php echo $__env->yieldContent('content'); ?>
		</div>

		<!-- this is flash message par area -->


		<!-- this is flash message par area end-->


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
	<script src="<?php echo e(asset('dashboard/js/lib/bootstrap-notify/bootstrap-notify.min.js')); ?>"></script>
	
	<script src="<?php echo e(asset('dashboard/js/plugins.js')); ?>"></script>

	<?php echo $__env->yieldContent('scripts'); ?>

	<script src="<?php echo e(asset('dashboard/js/app.js')); ?>"></script>

	<script>
		function preload() {
			//$('#preloader').fadeOut('slow', function () { $(this).remove(); $('.with-side-menu').show() });
			$('#preloader').hide();
        }

		$(document).ready(function() {
			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
			})
    	});

	</script>
	<script>
		window.page = "page";
			function SetUrl(url) {
				window.page.value = url;
		
			}
			  function openKCFinder(field) {
				window.page = field;
				window.open('<?php echo e(url("/laravel-filemanager?type=Images")); ?>', 'kcfinder_textbox',
						'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
						'resizable=1, scrollbars=0, width=800, height=600'
						);
			}
	</script>

	<script>
		$(document).ready(function(){
			<?php if(Session::has('msg')): ?>
				$('#bn-grey').click();
				$.notify({
					message:  '<strong> <?php echo e(Session::get("msg")); ?> </strong>'
				});

			<?php endif; ?>;

			<?php if(Session::has('success')): ?>
				$('#bn-success').click();
				$.notify({
					message: '<strong> <?php echo e(Session::get("success")); ?> </strong>',
				},{
					type: 'success'
				});
			<?php endif; ?>

			<?php if(Session::has('error')): ?>
				$('#bn-danger').click();
				$.notify({
					message: '<strong> <?php echo e(Session::get("error")); ?> </strong>',
					},{
						type: 'danger'
					});
			<?php endif; ?>

			<?php if(Session::has('info')): ?>
				$('#bn-info').click();
					$.notify({
						message: '<strong> <?php echo e(Session::get("error")); ?> </strong>',
					},{
						type: 'info'
					});
			<?php endif; ?>

			<?php if(Session::has('warning')): ?>
				$('#bn-warning').click();
					$.notify({
						message: '<strong> <?php echo e(Session::get("warning")); ?> </strong>',
					},{
						type: 'warning'
					});
			<?php endif; ?>
		});

	</script>
</body>



</html>