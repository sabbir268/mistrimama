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
    <div class="<?php if(checkRole(auth()->user()->id, 'special')): ?> col-md-6 <?php else: ?> col-md-12 mb-3 <?php endif; ?>">
        <section class="widget widget-simple-sm p-0 m-0" style="height: 132px;">
            <div class="widget-simple-sm-icon text-left p-2">
                <div class="row">
                    <div class="col-10">
                        <h5 class="p-0 m-0 font-weight-bold">
                            <?php if($activeOrders): ?>
                            Order No #<?php echo e($activeOrders->order_no); ?>

                            <?php else: ?>
                            Order Status
                            <?php endif; ?>
                        </h5>
                        <h6 class="text-uppercase <?php if($activeOrders): ?> text-success <?php else: ?> text-danger <?php endif; ?> p-0 m-0">
                            <?php if($activeOrders): ?>

                            <?php if($activeOrders->status == 0): ?>

                            <p>Your order has been place. Wait for confirmation.</p>
                            <?php endif; ?>
                            <?php if($activeOrders->status > 0): ?>
                            <?php if($activeOrders->serviceSystem->first()->comrade): ?>

                            <?php if($activeOrders->status == 1): ?>

                            <p>Your order has been accepted. <strong
                                    class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?>

                                    <span class="text-warning">Mama</span> </strong> is on your way.</p>
                            <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?>

                            </p>
                            <?php endif; ?>

                            <?php if($activeOrders->status == 2): ?>
                            <p class="p-0 m-0"> <strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?>

                                    <span class="text-warning">Mama</span> </strong> start your service/work.</p>
                            <p class="p-0 m-0">Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                            <?php endif; ?>
                            <?php if($activeOrders->status == 3): ?>

                            <p><strong class="text-success"><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?>

                                    <span class="text-warning">Mama</span> </strong> complete your work. <b>Waiting for
                                    payment.</b>
                            </p>
                            <p>Phone No: <?php echo e($activeOrders->serviceSystem->first()->comrade->c_phone_no); ?> </p>
                            <?php endif; ?>

                            <?php if($activeOrders->status == 4): ?>
                            
                            <strong>Thank you, your Digital Payment is accepted. <span class="text-mm">Wait for confirmation.</span></strong>
                            <?php endif; ?>
                            <?php else: ?>
                            <p>Order has been accepted , a comrade will allocated soon!</p>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <p>No Service is taken</p>
                            <?php endif; ?>
                        </h6>
                    </div>
                    <div class="col-2">
                        <a href="<?php if($activeOrders): ?>
                        <?php echo e(route('order-details')); ?>

                        <?php else: ?>
                        #
                        <?php endif; ?>" class="btn btn-sm float-right btn-mm 
                        <?php if($activeOrders): ?>
                        -
                        <?php else: ?>
                        btn-disable
                        <?php endif; ?>
                        ">View Details</a>
                    </div>
                </div>
            </div>
            
        </section>
        <!--.widget-simple-sm-->
    </div>
    <?php if(checkRole(auth()->user()->id, 'special')): ?>
    <div class="col-md-6  ">
        <section class="widget widget-simple-sm">
            <div class="widget-simple-sm-icon  p-3">
                
                <h4 class="p-0 m-0 font-weight-bold">Reward Point</h4>
                <h3 class="text-uppercase text-center font-weight-bold text-mm p-0 m-0" data-toggle="tooltip"
                    data-placement="bottom" title="Equivalent Amount: BDT <?php echo e($rp/20); ?>/-"><?php echo e($rp); ?></h3>
            </div>
            <div class="widget-simple-sm-bottom p-0">
                <div class="row">
                    <div style="<?php if($rp >= 4000): ?> cursor: pointer <?php else: ?> cursor: not-allowed <?php endif; ?>"
                        class="col-6 border-right p-3" data-toggle="tooltip" data-placement="bottom"
                        title="You can pay 50% of your total bill with Reward Point">Adjust Bill</div>
                    <div <?php if($rp>= 4000): ?>
                        data-toggle="modal"
                        data-target="#rp_withdraw"
                        <?php else: ?>
                        data-toggle="tooltip"
                        data-placement="bottom"
                        title="You need minimum 4000 Reward Point to withdrawal"
                        <?php endif; ?>
                        style="<?php if($rp >= 4000): ?> cursor: pointer <?php else: ?> cursor: not-allowed <?php endif; ?>"


                        class="col-6 border-left p-3">Cash Out
                    </div>
                </div>
            </div>
        </section>
        <!--.widget-simple-sm-->
    </div>
    <?php endif; ?>
</div>

<style>
    .dash-icon {
        cursor: pointer;
    }

    .icon-secondery {
        display: none;
    }

    .dash-icon:hover .icon-primary {
        display: none;
        /* transition: 1s; */
    }

    .dash-icon:hover .icon-secondery {
        display: inline-block;
        /* transition: 1s; */
    }

</style>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Place Order
            </div>
            <div class="card-body pt-0 pb-0 pl-3 pr-3">
                <div class="row ">
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href=" <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/1')); ?>

                        <?php endif; ?>
                         ">
                            <section class="widget widget-simple-sm m-0 rounded-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/electricity_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/electricity_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">Electrical Service</div>
                            </section>
                        </a>
                    </div>
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href="
                        <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/3')); ?>

                        <?php endif; ?>
                        ">
                            <section class="widget  widget-simple-sm m-0 rounded-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/plumbing_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/plumbing_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">Plumbing Service</div>
                            </section>
                        </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href="
                        <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/6')); ?>

                        <?php endif; ?>
                        ">
                            <section class="widget widget-simple-sm m-0 rounded-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/ac_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/ac_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">AC Service</div>
                            </section>
                        </a>
                    </div>
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href="
                        <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/5')); ?>

                        <?php endif; ?>
                        ">
                            <section class="widget widget-simple-sm m-0 rounded-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/genarator_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/genarator_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">Generator Service</div>
                            </section>
                        </a>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href="
                        <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/4')); ?>

                        <?php endif; ?>
                        ">
                            <section class="widget widget-simple-sm m-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/it_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/it_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">IT Service</div>
                            </section>
                        </a>
                    </div>
                    <div class="col-sm-6 p-0">
                        <a class="text-dark" href="
                        <?php if($activeOrders): ?>
                        #
                        <?php else: ?>
                        <?php echo e(asset('/create-order/2')); ?>}}
                        <?php endif; ?>
                        ">
                            <section class="widget widget-simple-sm m-0 dash-icon">
                                <div class="widget-simple-sm-icon">
                                    <img class="icon-primary" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/cctv_g.png')); ?>" alt="">
                                    <img class="icon-secondery" style="height:60px;width:60px"
                                        src="<?php echo e(asset('/dashboard/img/icons/cctv_y.png')); ?>" alt="">
                                </div>
                                <div class="widget-simple-sm-fill-caption pb-2">CCTV Service</div>
                            </section>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box-typical-body panel-body ">
            <img style="width:100%;    height: 383px;" class="img-responsive" src="<?php echo e(asset('/images/Product-Promo-Banner.png')); ?>" alt="">
        </div>
    </div>

</div>
<?php if($activeOrders): ?>
<?php if($activeOrders->status != 0): ?> 
<?php if($activeOrders->serviceSystem->first()->comrade): ?>
<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container-fluid p-0 m-0">
                <div class="box-typical box-typical-full-height">
                    <div class="add-customers-screen tbl">
                        <div class="add-customers-screen-in">
                            <div class="add-customers-screen-user">
                                <img src="<?php echo e($activeOrders->serviceSystem->first()->comrade->c_pic); ?>"
                                    style="height:80px;width:80px" alt="Image">
                            </div>
                            <h2>Your Work is finish!!</h2>
                            <p class="lead color-blue-grey-lighter">Hello, <?php echo e(auth()->user()->name); ?>,
                                <strong><?php echo e($activeOrders->serviceSystem->first()->comrade->c_name); ?></strong> Mama ,<br />
                                Just finish your work. And Waiting for your payment.</p>
                            <br>
                            <p>Total Charge:
                                <strong><?php echo e(($sumOrder->total_price + $sumOrder->extra_charge) - promocheck($sumOrder->user_id, $sumOrder->total_price)); ?>BDT</strong>
                            </p>
                            <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" name="status" value="4" hidden>
                                <input type="text" name="order_id" value="<?php echo e($activeOrders->id); ?>" hidden>
                                
                                <div class="col-md-6 offset-md-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend ">
                                            <label class="input-group-text border-mm" for="inputGroupSelect01">Payment
                                                Option</label>
                                        </div>
                                        <select name="pay_type" class="custom-select border-mm" id="inputGroupSelect01">
                                            <option selected>Choose...</option>
                                            <option value="1">Cash</option>
                                            <option value="3">Digital Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-mm">Add Payment</button>
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
<?php endif; ?>

<div class="modal fade" id="rp_withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reward Point Cash Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('withdraw.request')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="reward_point" class="col-sm-4 col-form-label">Enter Reward Point</label>
                        <div class="col-sm-10">
                            <input type="number" min="4000" name="reward_point" class="form-control" placeholder="4000"
                                required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="mfs_number" class="col-sm-4 col-form-label">MFS
                            Number(Bkash,Rocket,SureCash)</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="mfs_number" name="mfs_number"
                                placeholder="017XXXXXXXX" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
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
            }, 2000);
     });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>