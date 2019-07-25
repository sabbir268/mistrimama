<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/others.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-6">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon text-left p-3">
                <div class="row">
                    <div class="col-10">
                        <h4 class="p-0 m-0 font-weight-bold">
                            <?php if($activeOrders): ?>
                            Order No #<?php echo e($activeOrders->order_no); ?>

                            <?php else: ?>
                            Order Staus
                            <?php endif; ?>
                        </h4>
                        <h5 class="text-uppercase text-danger p-0 m-0">No Service taken</h5>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-sm btn-info float-right" <?php if(!$activeOrders): ?> disabled="disabled" <?php endif; ?>>View Details</button>
                    </div>
                </div>
            </div>
            <div class="widget-simple-sm-bottom p-0">
                <div class="row">
                    <div style="<?php if($activeOrders): ?> cursor: pointer <?php else: ?> cursor: not-allowed <?php endif; ?>" class="col-6 border-right p-3">Add New Service</div>
                    <div style="cursor: pointer" class="col-6 border-left p-3">Make Payment</div>
                </div>
            </div>
        </section>
        <!--.widget-simple-sm-->
    </div>
    <div class="col-md-6  ">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon  p-3">
                
                <h4 class="p-0 m-0 font-weight-bold">Reward Point</h4>
                <h3 class="text-uppercase text-center font-weight-bold text-primary p-0 m-0">400</h3>
            </div>
            <div class="widget-simple-sm-bottom p-0">
                <div class="row">
                    <div style="cursor: pointer" class="col-6 border-right p-3">Adjust payment with RP</div>
                    <div style="cursor: pointer" class="col-6 border-left p-3">Ask for Cash out
                    </div>
                </div>
            </div>
        </section>
        <!--.widget-simple-sm-->
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Place new order
            </div>
            <div class="card-body pt-0 pb-0 pl-3 pr-3">
                <div class="row ">
                    <div class="col-sm-6 p-0">
                        <section class="widget widget-simple-sm m-0 rounded-0">
                            <div class="widget-simple-sm-icon">
                                <i class="fa fa-plug text-primary"></i>
                            </div>
                            <div class="widget-simple-sm-fill-caption pb-2">Electrical Service</div>
                        </section>
                    </div>
                    <div class="col-sm-6 p-0">
                        <section class="widget  widget-simple-sm m-0 rounded-0">
                            <div class="widget-simple-sm-icon">
                                <i class="fa fa-magic text-danger"></i>
                            </div>
                            <div class="widget-simple-sm-fill-caption pb-2">Plumbing Service</div>
                        </section>
                    </div>
                </div>
                <div class="row ">
                        <div class="col-sm-6 p-0">
                            <section class="widget widget-simple-sm m-0 rounded-0">
                                <div class="widget-simple-sm-icon">
                                    <i class="fa fa-list-alt text-success"></i>
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">Air Conditioner Service</div>
                            </section>
                        </div>
                        <div class="col-sm-6 p-0">
                            <section class="widget widget-simple-sm m-0 rounded-0">
                                <div class="widget-simple-sm-icon">
                                    <i class="fa fa-flash text-warning"></i>
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">Generator Service</div>
                            </section>
                        </div>
                    </div>
                    <div class="row ">
                            <div class="col-sm-6 p-0">
                                <section class="widget widget-simple-sm m-0 ">
                                    <div class="widget-simple-sm-icon">
                                        <i class="fa fa-laptop text-info"></i>
                                    </div>
                                    <div class="widget-simple-sm-fill-caption pb-2">IT Service</div>
                                </section>
                            </div>
                            <div class="col-sm-6 p-0">
                                <section class="widget widget-simple-sm m-0">
                                    <div class="widget-simple-sm-icon">
                                        <i class="fa fa-video-camera text-secondary"></i>
                                    </div>
                                    <div class="widget-simple-sm-fill-caption pb-2">CCTV Service</div>
                                </section>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
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

                    <?php if($activeOrders->status == 0): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img src="<?php echo e(asset('dashboard/img/newlogokom.png')); ?>" style="height:80px;width:80px" alt="Image">
                    </div>
                    <p>Your order has been place. Wait for confirmation.</p>
                    <?php endif; ?>

                    <?php if($activeOrders->status == 1): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">

                        <img class="rounded-circle"
                            src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                            style="height:80px;width:80px" alt="Image">
                    </div>
                    <p>Your order has been accepted. <br> <strong
                            class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span
                                class="text-warning">Mama</span> </strong> is in your way.</p>
                    <br>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?>

                    </p>
                    <?php endif; ?>

                    <?php if($activeOrders->status == 2): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle"
                            src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                            style="height:80px;width:80px" alt="Image">
                    </div>
                    <p> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span
                                class="text-warning">Mama</span> </strong> start your service/work.</p>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                    <?php endif; ?>
                    <?php if($activeOrders->status == 3): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle"
                            src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                            style="height:80px;width:80px" alt="Image">
                    </div>
                    <p><strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span
                                class="text-warning">Mama</span> </strong> finish your work. <b>Waiting for payment.</b>
                    </p>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                    <?php endif; ?>

                    <?php if($activeOrders->status == 4): ?>
                    <div style="height:100px" class="col-md-4 rounded-circle d-inline-block ">
                        <img class="rounded-circle"
                            src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                            style="height:80px;width:80px" alt="Image">
                    </div>
                    <p><strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?> <span
                                class="text-warning">Mama</span> </strong> finish your work. <b>Wait for payment
                            confirmation.</b></p>
                    <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                    <?php endif; ?>

                    <header class="box-typical-header panel-heading text-center">
                        <a href="<?php echo e(route('order-details')); ?>" class="btn btn-info">Order Details</a>
                    </header>

                    <?php else: ?>
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
                                <img src="<?php echo e(asset('uploads/SP')); ?>/<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                                    style="height:80px;width:80px" alt="Image">
                            </div>
                            <h2>Your Work is finish!!</h2>
                            <p class="lead color-blue-grey-lighter">Hello,
                                <strong><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></strong> Mama ,<br />
                                Just finish your work. And Waiting for your payment.</p>
                            <br>
                            <p>Total Charge: <strong><?php echo e($sumOrder->first()->total_price + $activeOrders->extra_charge); ?>

                                    BDT</strong> </p>
                            <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="status" value="4" hidden>
                                <input type="text" name="order_id" value="<?php echo e($activeOrders->id); ?>" hidden>
                                
                                <div class="col-md-6 offset-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Payment
                                                Option</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Sure Cash</option>
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
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>