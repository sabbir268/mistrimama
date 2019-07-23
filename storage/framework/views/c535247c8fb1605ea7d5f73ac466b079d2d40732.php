 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?> 
<!--row-->

<div class="row">
    <div class="col-xl-6">
        <div class="chart-statistic-box">
            <div class="chart-txt">
                <div class="chart-txt-top">
                    <p><span class="unit">৳</span><span class="number">1540</span></p>
                    <p class="caption">Last 10 Service History </p>
                </div>
                <table class="tbl-data">
                    <tr>
                        <td class="price color-purple">120৳</td>
                        <td>Orders</td>
                    </tr>
                    <tr>
                        <td class="price color-yellow">15৳</td>
                        <td>Investments</td>
                    </tr>
                    <tr>
                        <td class="price color-lime">55৳</td>
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
    <div class="col-xl-6">
        <div class="row">
            <div class="col-sm-6">
                <article class="statistic-box red">
                    <div>
                        <div class="number">৳260</div>
                        <div class="caption">
                            <div>Online balance</div>
                        </div>
                        <div class="percent">
                            <div class="arrow up"></div>
                            <p>40%</p>
                        </div>
                    </div>
                </article>
            </div>
            <!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box purple">
                    <div>
                        <div class="number">12</div>
                        <div class="caption">
                            <div>Comrade Status</div>
                        </div>
                        <div class="percent">
                            <div class="arrow down"></div>
                            <p>11%</p>
                        </div>
                    </div>
                </article>
            </div>
            <!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box yellow">
                    <div>
                        <div class="number">104</div>
                        <div class="caption">
                            <div>No of Services Available</div>
                        </div>
                    </div>
                </article>
            </div>
            <!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box green">
                    <div>
                        <div class="caption">
                            <div>Want to cash out?</div>
                        </div>
                        <div style="margin-top:20px;"><a href="#">Click here</a></div>
                    </div>
                </article>
            </div>
            <!--.col-->
        </div>
        <!--.row-->
    </div>
    <!--.col-->
</div>
<!--.row-->

<section class="box-typical box-typical-dashboard panel panel-default scrollable">
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">Allowcated Service Status</h3>
    </header>
    <div class="box-typical-body panel-body ">
        <table class="tbl-typical">
            <thead>
                <tr>
                    <th>
                        <div>Order No #</div>
                    </th>
                    <th>
                        <div>Orderer</div>
                    </th>
                    <th>
                        <div>Phone No.</div>
                    </th>
                    <th>
                        <div>Service</div>
                    </th>
                    <th>
                        <div>Area</div>
                    </th>
                    <th>
                        <div>Address</div>
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
                <?php $__currentLoopData = $allowcatedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($allord->order->order_no); ?></td>
                    <td><?php echo e($allord->user->name); ?></td>
                    <td><?php echo e($allord->user->phone_no); ?></td>
                    <td><?php echo e($allord->order->category->name); ?></td>
                    <td><?php echo e($allord->order->area); ?></td>
                    <td><?php echo e($allord->user->address); ?></td>
                    <td><?php echo e($allord->order->order_date); ?> <?php echo e($allord->order->order_time); ?></td>
                    <td> <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#view-<?php echo e($allord->order->id); ?>" data-item="<?php echo e($allord->order->id); ?>">Details</button>
                    </td>
                    <td>
                        <form action="<?php echo e(route('service-update-sts')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <!-- -->
                            <input type="text" value="<?php echo e($allord->order->id); ?>" name="order_id" hidden>
                            <input type="text" value="<?php echo e($allord->id); ?>" name="s_sys_id" hidden> <?php switch($allord->order->status):
                            case (1): ?>
                            <input type="text" value="2" name="status" hidden>
                            <button type="submit" class="btn btn-sm btn-primary">Start Servicing</button> <?php break; ?> <?php case (2): ?>
                            <input type="text" value="3" name="status" hidden>
                            <button type="submit" class="btn btn-sm btn-success"> Servicing Done</button> <?php break; ?> <?php case (3): ?>
                            <button disabled="disabled" class="btn btn-sm btn-warning">Waiting For Payment</button> <?php break; ?>
                            <?php default: ?>
                            <input type="text" value="" name="status" hidden> <?php endswitch; ?>
                        </form>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <!--.box-typical-body-->

    <?php $__currentLoopData = $allowcatedOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allord): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
    <div class="modal fade" id="view-<?php echo e($allord->order->id); ?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $allord->order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($booking->sub_category->first()->name); ?></td>
                                            <td><?php echo e($booking->sub_category->first()->price); ?></td>
                                            <td><?php echo e($booking->quantity); ?></td>
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
</section>
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
                    ['MON', 130, ' '],
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
            $('.panel').each(function () {
                try {
                    $(this).lobiPanel({
                        sortable: true
                    }).on('dragged.lobiPanel', function(ev, lobiPanel){
                        $('.dahsboard-column').matchHeight();
                    });
                } catch (err) {}
            });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('comrade.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('comrade.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>