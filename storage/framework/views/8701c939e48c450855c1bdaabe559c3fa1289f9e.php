<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<title>Service-Provider</title>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Bootstrap Stylesheet [ REQUIRED ]-->
<link href="<?php echo e(asset('assets/service_provider/css/bootstrap.min.css')); ?>" rel="stylesheet">
<!--Nifty Stylesheet [ REQUIRED ]-->
<link href="<?php echo e(asset('assets/service_provider/css/nifty.min.css')); ?>" rel="stylesheet">
<!--Nifty Premium Icon [ DEMONSTRATION ]-->
<link href="<?php echo e(asset('assets/service_provider/css/demo/nifty-demo-icons.min.css')); ?>" rel="stylesheet">
<!--=================================================-->
<!--Pace - Page Load Progress Par [OPTIONAL]-->
<link href="<?php echo e(asset('assets/service_provider/plugins/pace/pace.min.css')); ?>" rel="stylesheet">
<script src="<?php echo e(asset('assets/service_provider/plugins/pace/pace.min.js')); ?>"></script>
<!--DataTables [ OPTIONAL ]-->
<link href="<?php echo e(asset('assets/service_provider/plugins/datatables/media/css/dataTables.bootstrap.css')); ?>" rel="stylesheet">
<link href="<?php echo e(asset('assets/service_provider/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css')); ?>" rel="stylesheet">