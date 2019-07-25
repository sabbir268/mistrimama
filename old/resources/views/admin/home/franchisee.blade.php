@extends('admin.home.template')

@section('body')

<!-- END PAGE BAR -->
<!-- BEGIN PAGE TITLE-->
<h1 class="page-title">Dashboard
    <small></small>
</h1>
<!-- END PAGE TITLE-->
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->
<div class="row">
    <?php if (isFranchisor()) { ?>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                    <i class="fa fa-comments"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{ $franchiseeCount }}">0</span>
                    </div>
                    <div class="desc"> Franchisee </div>
                </div>
            </a>
        </div>
    <?php } ?>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $driverCount }}">0</span> 
                </div>
                <div class="desc"> Driver</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{ $vehicles }}">0</span>
                </div>
                <div class="desc">Vehicles</div>
            </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> 
                    <span data-counter="counterup" data-value="{{ $bookingCount }}"></span> </div>
                <div class="desc">Booking</div>
            </div>
        </a>
    </div>
</div>
<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->
<div class="row">
    @include ("admin.home.graph")
</div>
<div class="clearfix"></div>













<div class="row">
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cab"></i>Vehicles 60 days of Insurance Renewal Date </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Model</th>
                            <th>Company</th>
                            <th>vehicles_number</th>
                            <th>Street</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($getInsuranceRenewalDate as $insurance) { ?>
                            <tr>
                                <td>{{ $insurance->vehicles_model }}</td>
                                <td>{{ $insurance->vehicles_company }}</td>
                                <td>{{ $insurance->vehicles_number}}</td>
                                <td>{{ $insurance->insurance_date}}</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>Drivers </div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Exp date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($driverDetails as $driver){ ?>
                            <tr>
                                <td>{{ $driver->user->fullName }}</td>
                                <td>{{ $driver->user->email }}</td>
                                <td>{{ $driver->user->phone }}</td>
                                <td>{{ $driver->licence_expiry_date }}</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
</div>



































<script>
    $(document).ready(function () {
        $('#clickmewow').click(function () {
            $('#radio1003').attr('checked', 'checked');
        })
    });
</script>
@endsection
