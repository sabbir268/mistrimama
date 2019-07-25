<body class="with-side-menu">

    <?php 

	include("header.php");   

	include("sidenav.php");  ?>

        <div class="page-content">
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-9">
                        <marquee scrollamount="7" onmouseover="stop()" onmouseout="start()">
                        <h1>Current Services Status</h1>
                        <a href="#">Captain faisal/ faisal mama</a> is on his way
                        <a>
                            <div class="color-blue-grey-lighter">See details</div>
                        </a></marquee>
                    </div>

                </div>
                <!--row-->
                
                <div class="row">
                    <div class="col-xl-6">
                        <div class="chart-statistic-box">
                            <div class="chart-txt">
                                <div class="chart-txt-top">
                                    <p><span class="unit">$</span><span class="number">1540</span></p>
                                    <p class="caption">Last 10 Service History </p>
                                </div>
                                <table class="tbl-data">
                                    <tr>
                                        <td class="price color-purple">120$</td>
                                        <td>Orders</td>
                                    </tr>
                                    <tr>
                                        <td class="price color-yellow">15$</td>
                                        <td>Investments</td>
                                    </tr>
                                    <tr>
                                        <td class="price color-lime">55$</td>
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
                                        <div class="number">$260</div>
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
                            <div class="col-sm-12">
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

            </div>
            <!--container-fluid-->

        </div>
        <!--.page-content-->

        <div class="control-panel-container">
        </div>

        <script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
        <script src="js/lib/popper/popper.min.js"></script>
        <script src="js/lib/tether/tether.min.js"></script>
        <script src="js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>

        <script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
        <script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
        <script>
            $(document).ready(function() {
                $('.panel').each(function() {
                    try {
                        $(this).lobiPanel({
                            sortable: true
                        }).on('dragged.lobiPanel', function(ev, lobiPanel) {
                            $('.dahsboard-column').matchHeight();
                        });
                    } catch (err) {}
                });

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
        <script src="js/app.js"></script>
</body>

<!-- Mirrored from themesanytime.com/startui/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 May 2018 09:43:14 GMT -->

</html>