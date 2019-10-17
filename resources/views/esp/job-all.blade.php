@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">
@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection


@section('content')
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default">
        <header class="box-typical-header panel-heading">
            <div class="row">
                <h3 class="panel-title p-2 col-md-6">পূর্বের কাজ সমূহ </h3>
                <div class="input-group float-right col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text">From</span>
                    </div>
                    <input type="text" name="orderFrom" value="slef" hidden>
                    <input type="text" class="form-control" placeholder="Select Date From" id="dateFrom">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >To</span>
                    </div>
                    <input type="text" class="form-control" placeholder="Select Date To" id="dateTo">
                    <button id="filterDate" class="input-group-append btn btn-success">Go</button>
                </div>

            </div>
        </header>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div>অর্ডার #</div>
                        </th>
                        <th>
                            <div>সার্ভিস</div>
                        </th>
                        <th>
                            <div>চার্জ </div>
                        </th>
                        <th>
                            <div>জরুরী মূল্য </div>
                        </th>
                        <th>
                            <div>মোট মূল্য </div>
                        </th>
                        <th>
                            <div>আয়</div>
                        </th>
                        <th>
                            <div>তারিখ</div>
                        </th>
                        <th>
                            <div>সময়</div>
                        </th>
                        <th>
                            <div>অর্ডারের সময় </div>
                        </th>
                        <th>
                            <div>কাস্টমার</div>
                        </th>
                        <th>
                            <div>সহকারী </div>
                        </th>
                    </tr>
                    <tr>

                    </tr>
                    <?php $i = 1 ?>
                    @foreach ($orders as $order )
                    <tr>
                        <td>
                            <div>{{$i}} </div>
                        </td>
                        <td>
                            <div>{{$order->orders_no}}</div>
                        </td>
                        <td>
                            <div>
                                <button data-toggle="modal" data-target="#orderDetailsModal{{$order->id}}"
                                    class="btn btn-success btn-sm">বিস্তারিত </button>
                            </div>
                        </td>
                        <td>
                            <div>{{$order->total_price}}</div>
                        </td>
                        <td>
                            <div>{{$order->extra_charge}}</div>
                        </td>
                        <td>
                            <div>{{$order->total_price + $order->extra_charge}}</div>
                        </td>

                        <?php 
                                $tam = ($order->total_price + $order->extra_charge); 
                                $mmc = (($tam * $providers->service_category) / 100); 
                                $spam = $tam - $mmc;
                            ?>


                        <td>
                            <div>{{$spam}}</div>
                        </td>

                        <td>
                            <div>{{date('d-m-Y',strtotime($order->order_date))}}</div>
                        </td>
                        <td>
                            <div>{{$order->order_time}}</div>
                        </td>
                        <td>
                            <div>
                                {{date('d-m-Y',strtotime(explode(' ',$order->orders_place_time)[0]))}}/{{explode(' ',$order->orders_place_time)[1]}}
                            </div>
                        </td>
                        <td>
                            <div>{{$order->name}}</div>
                        </td>

                        <td>
                            <div>{{$order->comrade ? $order->comrade->c_name : "self"}}</div>
                        </td>
                        <?php $i++ ?>
                    </tr>
                    @endforeach

                </table>
            </div>
            {{ $orders->links() }}
        </div>
        <!--.box-typical-body-->
    </section>
    <!--.box-typical-dashboard-->
</div>

@foreach ($orders as $order )
<div class="modal fade" id="orderDetailsModal{{$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সার্ভিসের বিস্তারিত </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped p-0 m-0">
                    <thead>
                        <tr>
                            <td>সার্ভিস </td>
                            <td>মূল্য </td>
                            <td>অতিরিক্ত মূল্য </td>
                            <td>মোট মূল্য </td>
                            <td>অবস্থা </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $services = $order->bookings()->get() ?>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->service_name}} - {{$service->service_details_name}} </td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->aditional_price}}</td>
                            <td>{{$service->total_price}}</td>
                            <td><span
                                    class={{$service->status == 1 ? "text-success " : "text-danger "}}}>{{$service->status == 1 ? "কাজ করা হয়েছে " : "কাজ করা হয় নি "}}
                                </span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>

<script>
    $('#dateFrom').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
	});

    $('#dateTo').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
        locale: {
            format: 'YYYY-MM-DD'
        }
	});

    $('#filterDate').click(function(){
        $df = $('#dateFrom').val();
        $dt = $('#dateTo').val();
       
        window.location.href = "{{asset('/')}}esp/income-statement/{{$orderFrom}}/"+$df+"/"+$dt;
    });
</script>
@endsection