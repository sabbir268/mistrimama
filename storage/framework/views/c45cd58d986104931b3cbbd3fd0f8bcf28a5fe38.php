 
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
<header class="page-content-header widgets-header">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell">
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
                                    <header> <strong>1000/- </strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Work Done</div>
                                <div class="amount">24</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress pie_progress" role="progressbar" data-goal="100" data-barcolor="#929faa"
                                    data-barsize="10" aria-valuemin="0" aria-valuemax="100" aria-valuenow="100">
                                    <span class="pie_progress__number">100%</span>
                                    <div class="pie_progress__svg"><svg version="1.1" preserveAspectRatio="xMinYMin meet" viewBox="0 0 160 160"><ellipse rx="75" ry="75" cx="80" cy="80" stroke="#f2f2f2" fill="none" stroke-width="10"></ellipse><path fill="none" stroke-width="10" stroke="#929faa" d="M80,5 A75,75 0 1 1 5,80.00000000000001" style="stroke-dasharray: 353.479, 353.479; stroke-dashoffset: 0;"></path></svg></div>
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
                                    <div class="title">Comrade</div>
                                    <div class="amount-sm">Active - 21</div>
                                    <div class="amount-sm">Not Active - 9</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong>30</strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">Your Rating</div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress pie_progress" role="progressbar" data-goal="75" data-barcolor="#929faa"
                                    data-barsize="10" aria-valuemin="0" aria-valuemax="100" aria-valuenow="75">
                                    <span class="pie_progress__number">87%</span>
                                    <div class="pie_progress__svg"><svg version="1.1" preserveAspectRatio="xMinYMin meet" viewBox="0 0 160 160"><ellipse rx="75" ry="75" cx="80" cy="80" stroke="#f2f2f2" fill="none" stroke-width="10"></ellipse><path fill="none" stroke-width="10" stroke="#929faa" d="M80,5 A75,75 0 1 1 5,80.00000000000001" style="stroke-dasharray: 353.479, 353.479; stroke-dashoffset: 0;"></path></svg></div>
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
    <div class="col-xl-6">
        <div class="row">
            <div class="col-sm-6">
                <article class="statistic-box red">
                    <div>
                        <div class="number"> ৳ 260</div>
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
                        <div class="number"><a href="#" class="text-white"><?php echo e(count($newOrders)); ?></a></div>
                        <div class="caption">
                            <a class="text-white">
                                <div>No of Services Available</div>
                            </a>
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
                            <td><?php echo e($order->user->name); ?></td>
                            <td><?php echo e($order->user->phone_no); ?></td>
                            <td><?php echo e($order->category->name); ?></td>
                            <td><?php echo e($order->area); ?></td>
                            <td><?php echo e($order->order_date); ?> <?php echo e($order->order_time); ?></td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">Details</button>
                            </td>
                            <td>
                                <?php if($order->status == '0'): ?>
                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>">Allocate</button>                        <?php else: ?>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>"
                                    disabled>Allocated</button> <?php endif; ?>
        
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <!--.box-typical-body-->
        </section>
    </div>
    <div class="col-md-6"></div>
</div>



<!-- Modals section for allocate order and view details order -->
<?php $__currentLoopData = $newOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="view-<?php echo e($order->id); ?>" role="dialog">
    <div class="modal-dialog">
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
                                    <?php $__currentLoopData = $order->bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                <button type="button" data-toggle="modal" data-target="#allocate-<?php echo e($order->id); ?>" data-item="<?php echo e($order->id); ?>" class="btn btn-primary">Allocate</button>
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
                                    <label>Client:</label>
                                    <select class="form-control" name="user_id">
                                            <option value="<?php echo e($order->user ? $order->user->id : '-'); ?>"><?php echo e($order->user ? $order->user->name : '-'); ?></option>
                                        </select>
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
            // $('.panel').each(function () {
            //     try {
            //         $(this).lobiPanel({
            //             sortable: true
            //         }).on('dragged.lobiPanel', function(ev, lobiPanel){
            //             $('.dahsboard-column').matchHeight();
            //         });
            //     } catch (err) {}
            // });

            // $('#testAjax').click(function(){
            //     $.ajax({
            //         type: "get",
            //         url: "<?php echo e(route('ajaxt')); ?>",
            //         data: '',
            //         dataType: "html",
            //         success: function (response) {
            //             $var =  response;
            //             console.log(response);
            //             $('#testCont').html(response);
            //         }
            //     });
            // });
    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>