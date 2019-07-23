
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>


<?php $chartReportDataYear = chartReportYear(); ?>
<?php if(count($chartReportDataYear['labels'])){ ?>

    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 12 Month Sale</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_content" style="" class="">
                    <canvas id="year_sale" style="height:100px;" ></canvas>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>






<script>
    var ctx = document.getElementById("year_sale");
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($chartReportDataYear['labels']) ?>,
            datasets: <?= json_encode($chartReportDataYear['data']) ?>,
        },
        options: {
            legend: {
                display: false
            },
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function (tooltipItems, data) {
                        return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
</script>
<?php } ?>


<?php $chartReportData = chartReport(); ?>
<?php if(count($chartReportData['labels'])){ ?>


    <div class="col-lg-6 col-xs-12 col-sm-12">
        <!-- BEGIN PORTLET-->
        <div class="portlet light bordered" style="">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bar-chart font-dark hide"></i>
                    <span class="caption-subject font-dark bold uppercase">Last 30 days Sale</span>
                    <span class="caption-helper"></span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="site_statistics_content" style="" class="">
                    <canvas id="barChart" style="height:100px;" ></canvas>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>


<script>
    var ctx = document.getElementById("barChart");
    var barChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($chartReportData['labels']) ?>,
            datasets: <?= json_encode($chartReportData['data']) ?>,
        },
        options: {
            
            legend: {
                display: false
            },
            tooltips: {
                enabled: true,
                mode: 'single',
                callbacks: {
                    label: function (tooltipItems, data) {
                        return ' {{ env('CURRENCY_SYM') }}' + tooltipItems.yLabel;
                    }
                }
            },
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            
                        }
                    }]
            }
        }
    });
</script>
<?php } ?>
 