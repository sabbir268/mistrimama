<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/profile.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('comrade.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('comrade.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php if($allowcatedOrders): ?>
<section class="box-typical box-typical-dashboard panel panel-default scrollable">
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">Allocated Service</h3>
    </header>
    <?php $__currentLoopData = $allowcatedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row">
        <div class="col-md-12">
            
            
            <div class="row">
                <div class="col-lg-4 col-lg-pull-6 col-md-3 col-sm-6 pl-5 pt-3">
                    <section class="box-typical">
                        <div class="card-header text-center">
                            Order No #<?php echo e($allord->order->order_no); ?>

                        </div>
                        <div class="profile-card">
                            <div class="profile-card-photo">
                                <img style="width: 100% !important;height: 100px;"
                                    src="
                                    <?php if($allord->type == 'self'): ?>
                                     <?php echo e($allord->user->photo != null ? $allord->user->photo : asset('/dashboard/img/avatar-1-256.png')); ?>

                                     <?php else: ?> 
                                     <?php echo e(asset('/dashboard/img/avatar-1-256.png')); ?>

                                     <?php endif; ?>
                                     " alt="" />
                            </div>
                            <div class="profile-card-name"><strong><i class="fa fa-user text-secondary"></i></strong>
                                <?php echo e($allord->order->name); ?></div>
                            <a href="tel:<?php echo e($allord->user->phone_no); ?>" class="text-secondary"><div class="profile-card-status"><strong><i class="fa fa-phone text-secondary"></i></strong><?php echo e(substr($allord->user->phone_no, 3)); ?>

                                </div></a>
                            <div class="profile-card-status "><strong><i class="fa fa-map text-secondary"></i></strong>
                                <?php echo e($allord->user->address); ?></div>

                            
                        </div>
                        <!--.profile-card-->

                        <div class="profile-statistic tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <b>0</b>
                                    Service Taken
                                </div>
                                <div class="tbl-cell">
                                    <b>5 <i class="font-icon font-icon-star text-secondary"></i> </b>
                                    Avarage Ratings
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--.box-typical-->
                </div>
                <!--.col- -->
                <div class="col-md-8">
                    <section class="box-typical-section">
                        <div class="col-md-12 p-0 pb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-mm btn-sm col-md-12 d-none">Add New Service</button>
                                </div>
                                <div class="col-md-6">
                                    <form action="<?php echo e(route('cancel.order')); ?>" method="POST" id="cancel_order">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="id" value="<?php echo e($allord->order->id); ?>" hidden>
                                        <button class="btn btn-danger col-md-12">Cancel Order</button>
                                    </form>
                                <!-- <button class="btn btn-danger btn-sm col-md-12 ">Cancel Order</button> -->
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3" style="height: 250px;overflow: auto;">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Additional</th>
                                        <th>Quantity</th>
                                        <th>Total </th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allord->order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="text-left">
                                            <?php echo e($booking->service_name); ?>(<?php echo e($booking->service_details_name); ?>)</td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->aditional_price); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php echo e($booking->total_price); ?></td>
                                        <td><button class="btn btn-rounded btn-sm btn-success-outline finsih_sub"><i
                                                    class="fa fa-thumbs-up"></i> Finish</button></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                                <tfoot>
                                </tfoot>
                            </table>

                        </div>
                        <div class="col-md-12 p-0 pb-2">
                            <?php if($allord): ?>
                            <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <!-- -->
                                <input type="text" value="<?php echo e($allord->order->id); ?>" name="order_id" hidden>
                                <input type="text" value="<?php echo e($allord->id); ?>" name="s_sys_id" hidden>
                                <?php switch($allord->order->status):
                                case (1): ?>
                                <input type="text" value="2" name="status" hidden>
                                <button type="submit" class="btn  btn-primary" style="width:100%">Start
                                    Servicing</button> <?php break; ?>
                                <?php case (2): ?>
                                <input type="text" value="3" name="status" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">Mark as
                                    Complete</button>
                                <?php break; ?>
                                <?php case (3): ?>
                                <?php if($allord->type == 'self'): ?>
                                        <button disabled="disabled" class="btn btn-warning" style="width:100%">Waiting
                                            For
                                            Payment</button>

                                <?php else: ?> 
                                        <input type="text" value="5" name="status" hidden>
                                        <input type="text" value="<?php echo e((($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)); ?>"
                                            name="amount" hidden>
                                        <input type="text" value="<?php echo e($allord->service_provider_id); ?>"
                                            name="service_provider_id" hidden>
                                        <input type="text" value="<?php echo e($allord->user_id); ?>" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">Recive
                                            Payment</button>
                                 <?php endif; ?>
                                <?php break; ?>
                                <?php case (4): ?>
                                <ul class="list-group mb-2">
                                    <li class="list-group-item p-0 m-0 border-0 ">User Paid: <span
                                            class="invisible">1232</span>
                                        <strong><?php echo e((($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)); ?>

                                            BDT</strong></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> User Discount:
                                        <strong><?php echo e($sumOrder->disc); ?> BDT</strong></li>
                                    <li class="list-group-item p-0 m-0"></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> You Earn: <span
                                            class="invisible">123s2</span>
                                        <strong><?php echo e((($sumOrder->total_price + $sumOrder->extra_price) )); ?> BDT</strong>
                                    </li>
                                </ul>
                                <input type="text" value="5" name="status" hidden>
                                <input type="text"
                                    value="<?php echo e((($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)); ?>"
                                    name="amount" hidden>
                                <input type="text" value="<?php echo e($allord->service_provider_id); ?>" name="service_provider_id"
                                    hidden>
                                <input type="text" value="<?php echo e($allord->user_id); ?>" name="client_id" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">Accept
                                    Payment</button>
                                <?php break; ?>
                                <?php default: ?>
                                <input type="text" value="" name="status" hidden> <?php endswitch; ?>
                            </form>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</section>
<?php else: ?>
<section>
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">No Service Allowcated</h3>
    </header>
</section>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    $(document).ready(function() {

        $('.finsih_sub').click(function(){
            $(this).removeClass('btn-primary-outline');
            $(this).addClass('btn-success-outline');
            $(this).find('i.fa').toggleClass('fa-user fa-thumbs-up');
            // $(this).find('i').addClass('');
            $(this).text('Finished');
        });

        // $('#cancel_order').submit(function(e){
        //     e.preventDefault();
        //     $confirm = confirm("Sure to cancel this order?")
            
        //     if($confirm){
        //         $('#cancel_order').submit();
        //     }else{
        //         location.reload();
        //     }

        // });

        
      });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>