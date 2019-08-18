<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">

<style>
    .tabs-section-nav .nav-link.active .nav-link-in {
        border-top-color: #f3b400;
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
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  font-weight-bold p-4">
                                        <h4>চলতি কাজের সংখ্যা<span class="invisible">সংখ্যা</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm">
                                                
                                                <?php echo e(count($ongonigOrder)); ?>

                                                
                                            </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title  font-weight-bold p-4">
                                        <h4>অপেক্ষামান কাজের সংখ্যা</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm"> 0 </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell pt-2">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell ">
                                <div class="">
                                    <div class="title font-weight-bold p-4">
                                        <h4>মোট কাজ<span class="invisible">চলতি কাজের সংখ্</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm"><?php if($activeOrders): ?>
                                                <?php echo e(count($activeOrders)); ?> <?php else: ?> 0 <?php endif; ?> </strong></h2>
                                    </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<style>
<?php if($balance >= 500): ?>
#jobs_get{
    display: block;
}

#get_order_alert{
    display: none;
}

<?php else: ?> 
#jobs_get{
    display: none;
}

#get_order_alert{
    display: block;
}
<?php endif; ?>

</style> 


<div class="col-md-12 alert alert-danger" id="get_order_alert">দয়া করে আপনার একাউন্টটি রিচার্জ করে কাজ অব্যাহত রাখুন।
</div>

<section class="tabs-section" id="jobs_get">
    <div class="tabs-section-nav tabs-section-nav-icons">
        <div class="tbl">
            <ul class="nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-mm" href="#tabs-1-tab-1" role="tab" data-toggle="tab" aria-selected="true">
                        <span class="nav-link-in text-mm">
                            <i class="font-icon font-icon-wallet text-mm"></i>
                            <span class="invisible">আস্শদাস</span> ফোন অর্ডার <span class="invisible">আস্কজদাস</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link active show text-mm" href="#tabs-1-tab-2" role="tab" data-toggle="tab"
                        aria-selected="false">
                        <span class="nav-link-in text-mm">
                            <span class="font-icon font-icon-player-subtitres text-mm"></span>
                            <span class="invisible">Request fr</span>চলতি কাজ <span class="invisible">Request fr</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--.tabs-section-nav-->


    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade " id="tabs-1-tab-1">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="text-center">
                            <tr>
                                <th>
                                    অর্ডার #
                                </th>
                                <th>
                                    <div>সার্ভিস </div>
                                </th>
                                <th>
                                    <div>এলাকা </div>
                                </th>
                                <th>
                                    <div>সময় </div>
                                </th>
                                <th>
                                    <div>বিস্তারিত </div>
                                </th>
                                <th>
                                    <div>একশন </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($newOrdersRequests): ?>
                            <?php $__currentLoopData = $newOrdersRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($order->order->order_no); ?></td>
                                <td><?php echo e($order->order->category->name); ?></td>
                                <td><?php echo e($order->order->area); ?></td>
                                <td><?php echo e(date('d-m-Y',strtotime($order->order->order_date))); ?>/<?php echo e($order->order->order_time); ?>

                                </td>
                                <td> <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#view-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">বিস্তারিত
                                    </button>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>"><i
                                                data-toggle="tooltip" data-placement="top" title="Accept & Allowcate"
                                                class="fa fa-check"></i></button> -->
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">গ্রহন ও
                                            বন্ঠন</button>

                                        <!-- <button class="btn btn-sm btn-danger" data-item="<?php echo e($order->id); ?>"> <i
                                                data-toggle="tooltip" data-placement="top" title="Reject"
                                                class="fa fa-times"></i> </button> -->
                                        <a href="<?php echo e(route('esp.cancel-request',$order->id)); ?>" class="btn btn-sm btn-danger">বাতিল</a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--.tab-pane-->
        <div role="tabpanel" class="tab-pane fade in active show" id="tabs-1-tab-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>
                                    <div>অর্ডার #</div>
                                </th>
                                <th>
                                    <div>সার্ভিস </div>
                                </th>
                                <th>
                                    <div> অর্ডারকারী </div>
                                </th>
                                <th>
                                    <div>সহকারী </div>
                                </th>
                                <th>
                                    <div>বিস্তারিত </div>
                                </th>
                                <th>
                                    <div>অবস্থা </div>
                                </th>
                                <th>
                                    <div>একশন</div>
                                </th>
                                <th>
                                    <div>সহকারী পরিবর্তন </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($actord->orders_no); ?></td>
                                <td><?php echo e($actord->category->name); ?></td>
                                <td><?php echo e($actord->name); ?></td>
                                <td><?php echo e($actord->comrade ? $actord->comrade->c_name : 'No Comrade assign yet.'); ?></td>
                                <td> <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#view-act-<?php echo e($actord->id); ?>" data-item="<?php echo e($actord->id); ?>">বিস্তারিত
                                    </button>
                                </td>
                                <td>
                                    <?php if($actord->comrade): ?>
                                    <?php if($actord->status == 1): ?>
                                    <span class="text-dark">সহকারী যাচ্ছে </span>
                                    <?php endif; ?>
                                    <?php if($actord->status == 2): ?>
                                    <span class="text-danger">সহকারী কাজ করছে</span>
                                    <?php endif; ?>
                                    <?php if($actord->status == 3): ?>
                                    <span class="text-success">সফল ভাবে কাজ শেষ হয়েছে এবং পেমেন্টের জন্য
                                        অপেক্ষামান</span>
                                    <?php endif; ?>
                                    <?php if($actord->status == 4): ?>
                                    <span class="text-success"> সহকারী পেমেন্ট গ্রহন করেছে </span>
                                    <?php endif; ?>
                                    <?php else: ?>
                                    <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#allocate-<?php echo e($actord->id); ?>"
                                        data-item="<?php echo e($actord->id); ?>">বন্টন</button>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <!-- -->
                                        <input type="text" value="<?php echo e($actord->id); ?>" name="order_id" hidden>
                                        <input type="text" value="<?php echo e($actord->serviceSystem->id); ?>" name="s_sys_id"
                                            hidden>
                                        <?php switch($actord->status):
                                        case (1): ?>
                                        <input type="text" value="2" name="status" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">কাজ শুরু
                                        </button> <?php break; ?>
                                        <?php case (2): ?>
                                        <input type="text" value="3" name="status" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%"> কাজ শেষ
                                        </button>
                                        <?php break; ?>
                                        <?php case (3): ?>
                                        <input type="text" value="5" name="status" hidden>
                                        <input type="text"
                                            value="<?php echo e((($actord->total_price + $actord->extra_price) - $actord->disc)); ?>"
                                            name="amount" hidden>
                                        <input type="text" value="<?php echo e($actord->sp_id); ?>" name="service_provider_id" hidden>
                                        <input type="text" value="<?php echo e($actord->user_id); ?>" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%"> পেমেন্ট
                                            সংগ্রহ </button>
                                        <?php break; ?>
                                        <?php case (4): ?>
                                        
                                        <input type="text" value="5" name="status" hidden>
                                        
                                        <input type="text" value="<?php echo e($actord->sp_id); ?>" name="service_provider_id" hidden>
                                        <input type="text" value="<?php echo e($actord->user_id); ?>" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন
                                            করুন</button>
                                        <?php break; ?>
                                        <?php default: ?>
                                        <input type="text" value="" name="status" hidden> <?php endswitch; ?>
                                    </form>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#allocate-<?php echo e($actord->id); ?>" data-item="<?php echo e($actord->id); ?>">সহকারী
                                        পরিবর্তন</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--.tab-pane-->
    </div>
    <!--.tab-content-->
</section>


<!-- Modals section for allocate order and view details order -->
<?php if($newOrders): ?>
<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">অর্ডারের বিস্তারিত </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                                        <th>সার্ভিস </th>
                                        <th>সার্ভিস মূল্য </th>
                                        <th>পরিমান </th>
                                        <th>টোটাল মূল্য </th>
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
                    data-item="<?php echo e($order->id); ?>" class="btn btn-primary">বন্টন</button>
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
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>" />
                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন করুন </option>
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
                    <button type="submit" class="btn btn-primary">বন্টন </button>

                </div>
            </form>
        </div>

    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if($newOrdersRequests): ?>
<?php $__currentLoopData = $newOrdersRequests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">অর্ডার এর বিস্তারিত</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                                        <th>সার্ভিস </th>
                                        <th>সার্ভিস মূল্য </th>
                                        <th>পরিমান </th>
                                        <th>মোট মূল্য </th>
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
                <button type="button" data-toggle="modal" data-target="#allocate-<?php echo e($order->order->id); ?>"
                    data-item="<?php echo e($order->order->id); ?>" class="btn btn-primary">বন্টন</button>
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
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($order->order->id); ?>" />
                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন</option>
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
                    <button type="submit" class="btn btn-primary">এলোকেট</button>

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
                <h4 class="modal-title">অর্ডারের বিস্তারিত</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">কাস্টমার এর বিস্তারিত
                                            </span></strong></u><br>
                                    নাম :<strong><?php echo e($actOrder->name); ?></strong><br> ফোন:
                                    <strong><?php echo e($actOrder->phone); ?></strong><br>
                                    এলাকা : <strong><?php echo e($actOrder->area); ?></strong><br>
                                    ঠিকানা: <strong><?php echo e($actOrder->address); ?></strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">সহকারী </span></strong></u><br>
                                    নাম
                                    :<strong><?php echo e($actOrder->comrade ? $actOrder->comrade->c_name : 'No comrade allowcated'); ?></strong><br>
                                    ফোন :
                                    <strong><?php echo e($actOrder->comrade ? $actOrder->comrade->c_phone_no : '-'); ?></strong>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>সার্ভিস </th>
                                        <th>সার্ভিস মূল্য </th>
                                        <th>পরিমান </th>
                                        <th>মোট মূল্য </th>
                                        <th>একশন  </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $actOrder->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($booking->service_name); ?></td>
                                        <td><?php echo e($booking->price); ?></td>
                                        <td><?php echo e($booking->quantity); ?></td>
                                        <td><?php if($booking->quantity >= 1): ?> <?php echo e($booking->price + ($booking->aditional_price*($booking->quantity
                                                - 1))); ?> <?php endif; ?></td>
                                        <td>
                                            <?php if($actOrder->status > 1): ?>
                                            <button class="btn btn-rounded btn-success-outline btn-sm
                                                <?php if($booking->status == 0): ?>
                                                     btn-success-outline
                                                <?php endif; ?>
                                                   finsih_sub" data-id="<?php echo e($booking->id); ?>"
                                                id="finsih_sub<?php echo e($booking->id); ?>"><i class="fa fa-thumbs-up"></i>
                                                <?php if($booking->status == 0): ?>
                                                 শেষ
                                                <?php else: ?>
                                                কাজ শেষ
                                                <?php endif; ?>

                                            </button>
                                            <?php else: ?>
                                            -
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>


<div class="modal fade" id="allocate-<?php echo e($actOrder->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="order_id" value="<?php echo e($actord->id); ?>" />

                <input type="hidden" name="service_provider_id" value="<?php echo e($providers->first()->id); ?>" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন করুন </option>
                                        <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($comrade->id); ?>"><?php echo e($comrade->c_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>কাস্টমার :</label> <strong>
                                        <?php echo e($actord->user ? $actord->user->name : '-'); ?></strong>
                                    <input type="text" name="user_id"
                                        value="<?php echo e($actord->user ? $actord->user->id : '-'); ?>" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">বন্টন </button>
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
   $('.finsih_sub').click(function(){
            $id = $(this).data('id');
            // console.log($id);
            // console.log("<?php echo e(asset('/order-bit-done/')); ?>/"+$id);
            $.ajax({
                    type: "get",
                    url: "<?php echo e(asset('/order-bit-done/')); ?>/"+$id,
                    dataType: "html",
                    success: function (response) {
                        if(response == 1){
                            $("#finsih_sub"+$id).removeClass('btn-primary-outline');
                            $("#finsih_sub"+$id).addClass('btn-success-outline');
                            $("#finsih_sub"+$id).find('i.fa').toggleClass('fa-user fa-thumbs-up');
                            $("#finsih_sub"+$id).text('কাজ শেষ');
                        }
                    }
                });
            
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>