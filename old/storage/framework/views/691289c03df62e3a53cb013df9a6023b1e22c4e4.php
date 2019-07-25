<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>Mistrimama admin</title>
    <!-- Styles -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/favicon.png')); ?>">

    <link href="<?php echo e(asset('/css/nice-select.css')); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset('/admin/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/css/custom.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!--        <link href="<?php echo e(asset('/admin/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css" />-->
    <link href="<?php echo e(asset('/admin/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />

    <!--        <link href="<?php echo e(asset('/admin/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css" />-->
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo e(asset('/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/plugins/morris/morris.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/plugins/fullcalendar/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!--        <link href="<?php echo e(asset('/admin/global/plugins/jqvmap/jqvmap/jqvmap.css')); ?>" rel="stylesheet" type="text/css" />-->
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo e(asset('/admin/global/css/components.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!--        <link href="<?php echo e(asset('/admin/css/select2.css')); ?>" rel="stylesheet" />-->

    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo e(asset('/admin/css/layout.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/css/darkblue.min.css')); ?>" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?php echo e(asset('/admin/css/custom.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('/admin/global/plugins/sweet-alert/css/sweetalert.css')); ?>" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT STYLES -->
    <!-- CORE CSS TEMPLATE - END -->
    <?php echo $__env->yieldContent('pagestyle'); ?>
</head>







<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <?php echo $__env->yieldContent('top_menu'); ?>

            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <?php echo $__env->yieldContent('sidebar_menu'); ?>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <?php echo $__env->make('admin.common.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                    <?php echo $__env->make('admin.common.flashmessage', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                    <!-- BEGIN PAGE BAR -->

                    <!-- BEGIN CONTENT BODY -->
                    <?php echo $__env->yieldContent('body'); ?>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->


        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <?php echo $__env->yieldContent('footer'); ?>
        </div>
        <!-- END FOOTER -->
    </div>


    <!-- BEGIN CORE PLUGINS -->

    <script src="<?php echo e(asset('/admin/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/moment.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/counterup/jquery.waypoints.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/counterup/jquery.counterup.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/flot/jquery.flot.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/flot/jquery.flot.resize.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/flot/jquery.flot.categories.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/global/plugins/sweet-alert/js/sweetalert.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('/admin/js/app.min.js')); ?>" type="text/javascript"></script>


    <script src="<?php echo e(asset('/admin/js/jscolor.js')); ?>" type="text/javascript"></script>

    <!--        <script src="<?php echo e(asset('/admin/js/select2.js')); ?>" type="text/javascript"></script>-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    <!-- <script src="<?php echo e(asset('js/custom.js')); ?>"></script> -->

    <script src="<?php echo e(asset('/admin/js/layout.js')); ?>" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->
    <?php echo $__env->yieldContent('pagescript'); ?>

    <style>
        .action-wraper {
            min-width: 100px;
        }
    </style>
</body>

</html>