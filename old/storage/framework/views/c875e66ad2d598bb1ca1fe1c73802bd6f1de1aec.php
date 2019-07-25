<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<header class="page-content-header widgets-header">
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
                    <a href="<?php echo e(route('cashout')); ?>" style="width:100%"
                        class="btn btn-sm btn-inline btn-success-outline mt-2 <?php if($balance < 1000): ?> disabled <?php endif; ?> ">Ask
                        for Cash out</a>
                </div>
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">Reward Point</div>
                                    <div class="amount-sm">Money equivalent ৳<?php echo e($rp/100); ?>/-</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong><?php echo e($rp); ?></strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button style="width:100%" class="btn btn-sm btn-inline btn-success-outline mt-2">Convert to
                        Cash</button>
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
                    <button style="width:100%" class="btn btn-sm btn-inline btn-success-outline mt-2">Comrade
                        details</button>
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
    <div class="col-xl-6">
        <div class="chart-statistic-box">
            <div class="chart-txt">
                <div class="chart-txt-top">
                    <p><span class="unit"> ৳ </span><span class="number">1540</span></p>
                    <p class="caption">Last 10 Service History </p>
                </div>
                <table class="tbl-data">
                    <tr>
                        <td class="price color-purple">120 ৳ </td>
                        <td>Orders</td>
                    </tr>
                    <tr>
                        <td class="price color-yellow">15 ৳ </td>
                        <td>Investments</td>
                    </tr>
                    <tr>
                        <td class="price color-lime">55 ৳ </td>
                        <td>Others</td>
                    </tr>
                </table>
            </div>
            <div class="chart-container">
                <div class="chart-container-in">
                    <div id="chart_div"></div>
                    <header class="chart-container-title">Income</header>
                    <div class="chart-container-x">
                        <div class="item"></div>
                        <div class="item">tue</div>
                        <div class="item">wed</div>
                        <div class="item">thu</div>
                        <div class="item">fri</div>
                        <div class="item">sat</div>
                        <div class="item">sun</div>
                        <div class="item">mon</div>
                        <div class="item"></div>
                    </div>
                    <div class="chart-container-y">
                        <div class="item">300</div>
                        <div class="item"></div>
                        <div class="item">250</div>
                        <div class="item"></div>
                        <div class="item">200</div>
                        <div class="item"></div>
                        <div class="item">150</div>
                        <div class="item"></div>
                        <div class="item">100</div>
                        <div class="item"></div>
                        <div class="item">50</div>
                        <div class="item"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--.chart-statistic-box-->
    </div>
    <!--.col-->
    <div class="col-md-6">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <div class="card-header">Mini Statement</div>
            <div class="box-typical-body panel-body ">
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
                            <td ><?php echo e($statement->trxno); ?></td>
                            <td class="text-center"> <span> <?php if($statement->status == 'debit'): ?> + <?php else: ?> - <?php endif; ?> </span> <span class="<?php if($statement->status == 'debit'): ?> text-success <?php else: ?> text-danger <?php endif; ?>"><?php echo e($statement->amount); ?></span></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>
    <!--.col-->
</div>
<!--.row-->
<div class="row">
    <div class="col-md-6">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading pt-2 pb-2">
                <h3 class="panel-header m-0">New Available Order</h3>
            </header>
            <div class="box-typical-body panel-body ">
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
                        <?php if($newOrders): ?>
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
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>
    <div class="col-md-6">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable">
            <header class="box-typical-header panel-heading pt-2 pb-2">
                <h3 class="panel-header m-0">Active Order</h3>
            </header>
            <div class="box-typical-body panel-body ">
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
                                <div>Orderer</div>
                            </th>
                            <th>
                                <div>Comrade</div>
                            </th>
                            <th>
                                <div>Details</div>
                            </th>
                            <th>
                                <div>Status</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $activeOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($actord->order->order_no); ?></td>
                            <td><?php echo e($actord->order->category->name); ?></td>
                            <td><?php echo e($actord->user->name); ?></td>
                            <td><?php echo e($actord->provider->name); ?></td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#view-act-<?php echo e($actord->id); ?>"
                                    data-item="<?php echo e($actord->id); ?>">Details</button>
                            </td>
                            <td>
                                <?php if($actord->order->status == 1): ?>
                                <span class="text-warning">Comrade On The way</span>
                                <?php endif; ?>
                                <?php if($actord->order->status == 2): ?>
                                <span class="text-danger">Comrade working on service.</span>
                                <?php endif; ?>
                                <?php if($actord->order->status == 3): ?>
                                <span class="text-success">Comrade has finish his job. And witing for payment.</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
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
                                    Name:<strong><?php echo e($actOrder->comrade->c_name); ?></strong><br> Phone:
                                    <strong><?php echo e($actOrder->comrade->c_phone_no); ?></strong>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/lobipanel/lobipanel.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')); ?>"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    $(document).ready(function() {
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var dataTable = new google.visualization.DataTable();
                dataTable.addColumn('string', 'Day');
                dataTable.addColumn('number', 'Values');
                // A column for custom tooltip content
                dataTable.addColumn({
                    type: 'string',
                    role: 'tooltip',
                    'p': {
                        'html': true
                    }
                });
                dataTable.addRows([
                    ['MON', 180, '100'],
                    ['TUE', 130, '130'],
                    ['WED', 180, '180'],
                    ['THU', 175, '175'],
                    ['FRI', 200, '200'],
                    ['SAT', 170, '170'],
                    ['SUN', 250, '250'],
                    ['MON', 220, '220'],
                    ['TUE', 220, ' ']
                ]);

                var options = {
                    height: 314,
                    legend: 'none',
                    areaOpacity: 0.18,
                    axisTitlesPosition: 'out',
                    hAxis: {
                        title: '',
                        textStyle: {
                            color: '#fff',
                            fontName: 'Proxima Nova',
                            fontSize: 11,
                            bold: true,
                            italic: false
                        },
                        textPosition: 'out'
                    },
                    vAxis: {
                        minValue: 0,
                        textPosition: 'out',
                        textStyle: {
                            color: '#fff',
                            fontName: 'Proxima Nova',
                            fontSize: 11,
                            bold: true,
                            italic: false
                        },
                        baselineColor: '#16b4fc',
                        ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                        gridlines: {
                            color: '#1ba0fc',
                            count: 15
                        }
                    },
                    lineWidth: 2,
                    colors: ['#fff'],
                    curveType: 'function',
                    pointSize: 5,
                    pointShapeType: 'circle',
                    pointFillColor: '#f00',
                    backgroundColor: {
                        fill: '#008ffb',
                        strokeWidth: 0,
                    },
                    chartArea: {
                        left: 0,
                        top: 0,
                        width: '100%',
                        height: '100%'
                    },
                    fontSize: 11,
                    fontName: 'Proxima Nova',
                    tooltip: {
                        trigger: 'selection',
                        isHtml: true
                    }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(dataTable, options);
            }
            $(window).resize(function() {
                drawChart();
                setTimeout(function() {}, 1000);
            });
        });

</script>

<script>
    $(document).ready(function() {
           
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>