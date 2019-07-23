<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<style>
    .btn-group.special {
        display: flex;
    }

    .special .btn {
        flex: 1
    }

</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<header class="page-content-header widgets-header mb-3">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">Balance</div>
                                    <div class="amount-sm">Available for withdraw</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong>৳&nbsp;<?php echo e($balance); ?>/- </strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target="<?php if($balance <= 1000): ?> #amount_withdraw <?php else: ?> # <?php endif; ?>"
                        style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 <?php if($balance < 999): ?> disabled <?php endif; ?> ">Ask
                        for Cash out</a>
                </div>
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">Reward Point</div>
                                    <div class="amount-sm">Money equivalent ৳<?php echo e($rp/20); ?>/-</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong><?php echo e($rp); ?></strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target=" <?php if($rp < 4000): ?> #rp_withdraw <?php endif; ?> "
                        style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 <?php if($rp < 3999 ): ?> disabled <?php endif; ?> ">Convert
                        to
                        Cash</a>
                </div>
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">No. Of Comrade</div>
                                    <div class="amount-sm">Active - <?php echo e(count($comrades)); ?> / Not Active -
                                        <?php echo e(count($totalcomrades) - count($comrades)); ?></div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong><?php echo e(count($totalcomrades)); ?></strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo e(route('esp.comrade')); ?>" style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2">Comrade
                        details</a>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Your Rating</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress pie_progress"
                                    role="progressbar" data-goal="75" data-barcolor="#929faa" data-barsize="10"
                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="75">
                                    <span class="pie_progress__number text-secondary"><?php echo e($ratings); ?> <i
                                            class="fa fa-star "></i> </span>
                                    <div class="pie_progress__svg"><svg version="1.1"
                                            preserveAspectRatio="xMinYMin meet" viewBox="0 0 160 160">
                                            <ellipse rx="75" ry="75" cx="80" cy="80" stroke="#f2f2f2" fill="none"
                                                stroke-width="10"></ellipse>
                                            <path fill="none" stroke-width="10" stroke="#929faa"
                                                d="M80,5 A75,75 0 1 1 5,80.00000000000001"
                                                style="stroke-dasharray: 353.479, 353.479; stroke-dashoffset: 0;">
                                            </path>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="row">
    

    <div class="col-md-6 pr-2">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-3">
            <div class="card-header">Mini Statement</div>
            <div class="box-typical-body panel-body ">
                <?php if(count($miniStatements) !== 0): ?>
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Subject</th>
                            <th>TXN ID</th>
                            <th class="text-center">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $miniStatements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $statement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(date("d-m-Y", strtotime($statement->created_at))); ?></td>
                            <td><?php echo e($statement->details); ?>(<?php echo e($statement->type); ?>)</td>
                            <td><?php echo e($statement->trxno); ?></td>
                            <td class="text-center"> <span> <?php if($statement->status == 'credit'): ?> <span
                                        class="label rounded-circle label-success" data-toggle="tooltip"
                                        data-placement="top" title="Credited"><i class="fa fa-plus"></i></span>
                                    <?php elseif($statement->status == 'income'): ?> <span
                                        class="label rounded-circle label-warning" data-toggle="tooltip"
                                        data-placement="top" title="Earned">(e)</span> <?php else: ?> <span
                                        class="label rounded-circle label-danger" data-toggle="tooltip"
                                        data-placement="top" title="Debited"><i class="fa fa-minus"></i></span> <?php endif; ?>
                                </span> <span
                                    class="<?php if($statement->status == 'credit'): ?> text-success  <?php elseif($statement->status == 'income'): ?> text-warning <?php else: ?> text-danger <?php endif; ?>"><?php echo e($statement->amount); ?>/-</span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="card-body col-md-12 text-secodary text-center p-5  p-auto">No Data avaiable</div>
                <?php endif; ?>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>

    <div class="col-md-6 pl-2">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-3">
            <div class="card-header">New Available Order</div>
            <div class="box-typical-body panel-body" id="avail_able_order">
                <?php if(count($newOrders) != 0): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div>Order No #</div>
                            </th>
                            <th>
                                <div>Service</div>
                            </th>
                            <th>
                                <div>Area</div>
                            </th>
                            <th>
                                <div>Time</div>
                            </th>
                            <th>
                                <div>Details</div>
                            </th>
                            <th>
                                <div>Action</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->order_no); ?></td>
                            <td><?php echo e($order->category->name); ?></td>
                            <td><?php echo e($order->area); ?></td>
                            <td><?php echo e($order->order_date); ?>/<?php echo e($order->order_time); ?></td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#view-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">Details</button>
                            </td>
                            <td>
                                <?php if($order->status == '0'): ?>
                                <button class="btn btn-sm btn-info" data-toggle="modal"
                                    data-target="#allocate-<?php echo e($order->id); ?>"
                                    data-item="<?php echo e($order->id); ?>">Allocate</button> <?php else: ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>"
                                    disabled>Allocated</button> <?php endif; ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <?php else: ?>
                <div class="card-body col-md-12 text-secodary text-center p-5  p-auto">No Order avaiable</div>
                <?php endif; ?>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>

    <!--.col-->
</div>
<!--.row-->
<div class="row">
    
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-0">

        <div class="card-header">
            Your Registered Services
        </div>
        <div class="card-body">
            <?php if($services): ?>
            <div class="btn-group special" role="group" aria-label="">

                <button type="button"
                    class="btn <?php if(in_array(1,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?> ">Electrical</button>
                <button type="button"
                    class="btn <?php if(in_array(3,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?>">Plumbing</button>
                <button type="button"
                    class="btn <?php if(in_array(6,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?> ">AC</button>
                <button type="button"
                    class="btn <?php if(in_array(5,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?> ">Generator</button>
                <button type="button"
                    class="btn <?php if(in_array(4,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?> ">IT</button>
                <button type="button"
                    class="btn <?php if(in_array(2,$services)): ?> btn-mm  <?php else: ?> btn-mm-outline  text-mm <?php endif; ?> ">CCTV</button>

            </div>
            <?php endif; ?>
        </div>
    </section>
</div>

</div>



<!-- Modals section for allocate order and view details order -->
<?php if($newOrders): ?>
<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php if($booking->quantity >= 1): ?> <?php echo e($booking->price + ($booking->aditional_price*($booking->quantity
                                            - 1))); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>"
                    data-item="<?php echo e($order->id); ?>" class="btn btn-primary">Allocate</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- View Details Modal end -->



<!-- View Details Modal end -->
<div class="modal fade" id="allocate-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">Select Comrade</option>
                                        <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comrade->id); ?>"><?php echo e($comrade->c_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        <?php echo e($order->user ? $order->user->name : '-'); ?></strong>
                                    <input type="text" name="user_id"
                                        value="<?php echo e($order->user ? $order->user->id : '-'); ?>" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($activeOrders): ?>
<?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actOrder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-act-<?php echo e($actOrder->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Client Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->order->user->name); ?></strong><br> Phone:
                                    <strong><?php echo e($actOrder->order->user->phone_no); ?></strong><br>
                                    Area: <strong><?php echo e($actOrder->order->area); ?></strong><br>
                                    Address: <strong><?php echo e($actOrder->order->user->address); ?></strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Comrade Info</span></strong></u><br>
                                    Name:<strong><?php echo e($actOrder->comrade ? $actOrder->comrade->c_name : '-'); ?></strong><br>
                                    Phone:
                                    <strong><?php echo e($actOrder->comrade ? $actOrder->comrade->c_phone_no : '-'); ?></strong>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $actOrder->order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php if($booking->quantity >= 1): ?> <?php echo e($booking->price + ($booking->aditional_price*($booking->quantity
                                                - 1))); ?> <?php endif; ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>




<div class="modal fade" id="amount_withdraw" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash Withdraw Request </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('withdraw.request')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="amount" class="col-sm-4 col-form-label">Enter Amount</label>
                        <div class="col-sm-10">
                            <input type="number" min="500" name="amount" class="form-control" placeholder="500"
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


<?php if($activeOrders): ?>
<?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="allocate-<?php echo e($actord->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($actord->order_id); ?>" />
                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">Select Comrade</option>
                                        <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comrade->id); ?>"><?php echo e($comrade->c_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        <?php echo e($actord->user ? $actord->user->name : '-'); ?></strong>
                                    <input type="text" name="user_id"
                                        value="<?php echo e($actord->user ? $actord->user->id : '-'); ?>" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>


<script>
    // 
$(document).ready(function() {
            function newAvailableOrder(){
                $.ajax({
                    type: "get",
                    url: "<?php echo e(route('new.available.order')); ?>",
                    dataType: "html",
                    success: function (response) {
                        $data = response;
                        return $data;
                    }
                });
                    
            }

            // function newAvailableOrderCount(){
            //     $.ajax({
            //         type: "get",
            //         url: "<?php echo e(route('new.available.order.count')); ?>",
            //         dataType: "html",
            //         success: function (response) {
            //             var data = response;
            //         }
            //     });
                    
            // }
// interval for check new order.


<?php if($newOrders): ?>
    <?php if(count($newOrders) != 0): ?>
        // setInterval(function(){
        // //$value = JSON.parse();

        // // $.each($value, function(i, item) {
        // // console.log(item[i].id);
        // // })
        // $data = newAvailableOrder();
        //     $('#avail_able_order').html($data);
        // }, 2000);
        // $('#avail_able_order').mouseover(function(){
        //     // $data = newAvailableOrder();
        //     // $('#avail_able_order').html($data);
        // });
        // $ndata = newAvailableOrderCount();
        $edata = <?php echo count($newOrders); ?>;
        setInterval(function(){
             $.ajax({
                    type: "get",
                    url: "<?php echo e(route('new.available.order.count')); ?>",
                    dataType: "html",
                    success: function (response) {
                        if(response != $edata ){
                            // var data = newAvailableOrder();
                            $edata = response;
                            $.ajax({
                                type: "get",
                                url: "<?php echo e(route('new.available.order')); ?>",
                                dataType: "html",
                                success: function (response) {
                                    $('#avail_able_order').html(response);

                                    
                                }
                            });
                            
                        }
                    }
                });
            }, 2000);
        // console.log($ndata);
        // $edata = <?php echo count($newOrders); ?>;
        // if($ndata == $edata ){
        //     var data = newAvailableOrder();
        //     $('#avail_able_order').html(data);
        // }

    <?php endif; ?>
<?php endif; ?>
});
</script>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>