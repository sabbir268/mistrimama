 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/others.min.css')); ?>">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-8">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title pt-1">Search Services</h3>
                    </div>

                    <div class="col-md-6">
                        <form class="site-header-search ">
                            <input type="text" placeholder="Search" />
                            <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                            <div class="overlay"></div>
                        </form>
                    </div>
                </div>

            </header>
            <div class="box-typical-body panel-body">
                <table class="tbl-typical">
                    <tr>
                        <th>
                            <div>Category</div>
                        </th>
                        <th>
                            <div>Service</div>
                        </th>
                        <th align="center">
                            <div>Price</div>
                        </th>
                        <th align="center">
                            <div>Unit Remarks</div>
                        </th>
                        <th align="center">
                            <div>Order</div>
                        </th>
                    </tr>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($service->category->name); ?></td>
                        <td><?php echo e($service->name); ?></td>
                        <td align="center"><?php echo e($service->price); ?></td>
                        <td align="center"><?php echo e($service->unit_remark); ?></td>
                        <td align="center"><span class="label label-success">Book Now</span></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
                <?php echo e($services->links()); ?>

            </div>
            <!--.box-typical-body-->
        </section>
        <!--.box-typical-dashboard-->
    </div>
    <div class="col-md-4">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading text-center">
                <h6 class="text-center m-0 p-0">
                    <strong> 
                        <?php if($activeOrders): ?>
                            Order No #<?php echo e($activeOrders->order_no); ?>     
                        <?php else: ?>
                            Order Staus
                        <?php endif; ?>
                    </strong>
                </h6>
            </header>
            <div class="box-typical-body panel-body ">
                <div class="p-2 text-center">
                    <?php if($activeOrders): ?>
                    <?php if($activeOrders->status != '1'): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img src="<?php echo e(asset('dashboard/img/newlogokom.png')); ?>" style="height:80px;width:80px" alt="Image">
                    </div>
                    <p>Your order has been place. Wait for confirmation.</p>
                     <?php switch($activeOrders->status): case (1): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">

                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p>Your order has been accepted. <br> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        is in your way.</p>
                    <br>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?>

                    </p>
                    <?php break; ?> <?php case (2): ?>

                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        start your service/work.</p>
                    <p>Phone No: {$activeOrders->serviceSystem->first()->comrade->c_phone_no}} </p>
                    <?php break; ?> <?php case (3): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle" src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>" style="height:80px;width:80px"
                            alt="Image">
                    </div>
                    <p><strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span class="text-warning">Mama</span>  </strong>                        finish your work. <b>Waiting for payment.</b></p>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                    <?php break; ?> <?php default: ?>
                    
                    <?php endswitch; ?> <?php endif; ?> <?php else: ?>
                    <div class="box-typical">
                        <div class="add-customers-screen">
                            <div class="add-customers-screen-in pb-5">
                                <header class="panel-heading text-center">
                                    <h3 class="mb-0">You have no active order.</h3>
                                </header>
                                <a href="<?php echo e(route('book-self')); ?>" class="btn">New Order</a>
                            </div>
                        </div>
                    </div>
                    <!--.box-typical-->
                    <?php endif; ?>

                    </p>
                </div>
            </div>
            <!--.box-typical-body-->
        </section>
        <!--.box-typical-dashboard-->
    </div>

</div>
<?php if($activeOrders): ?>
<?php if($activeOrders->status != 0): ?> 
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid p-0 m-0">
                <div class="box-typical box-typical-full-height">
                    <div class="add-customers-screen tbl">
                        <div class="add-customers-screen-in">
                            <div class="add-customers-screen-user">
                                <img src="<?php echo e(asset('uploads/SP')); ?>/" style="height:80px;width:80px"
                                    alt="Image">
                            </div>
                            <h2>Your Work is finish!!</h2>
                            <p class="lead color-blue-grey-lighter">Hello, <strong><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></strong> Mama ,<br/>                                Just finish your work. And Waiting for your payment.</p>
                            <br>
                            <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="status" value="4" hidden>
                                <input type="text" name="order_id" value="<?php echo e($activeOrders->id); ?>" hidden>
                                <div class="col-md-6 offset-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Payment Option</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        <option value="1">Hand Cash</option>
                                        <option value="2">Bkash</option>
                                        <option value="3">Credit Card</option>
                                    </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn">Add Payment</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!--.box-typical-->
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>

<script>
    $(document).ready(function() {
    <?php if($activeOrders): ?>
        $url = '<?php echo e(url('check-status')); ?>/<?php echo e($activeOrders->id); ?>';
        <?php endif; ?>
           setInterval(function(){ 
               $.ajax({
                   type: "get",
                   url: $url,
                   dataType: "html",
                   success: function (response) {
                       if(response == 3){
                           $('#payModal').modal({backdrop: 'static', keyboard: false});
                       }
                   }
               });
            }, 1000);
     });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>