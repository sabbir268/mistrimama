<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('service-provider.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php echo $__env->make('service-provider.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="boxed">
            <div id="content-container">
                <div id="page-head">
                    <div class="pad-all text-center">
                        <h3>Welcome back to the Service Provider Dashboard.</h3>
                    </div>
                </div>
            </div>
    <?php echo $__env->make('service-provider.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <?php echo $__env->make('service-provider.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php echo $__env->make('service-provider.common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>