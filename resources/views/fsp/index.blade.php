@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
<style>
    .btn-group.special {
        display: flex;
    }

    .special .btn {
        flex: 1
    }

</style>
@endsection

@section('topbar')
@include('esp.topbar')
@endsection


@section('sidebar')
@include('esp.sidebar')
@endsection


@section('content')
<header class="page-content-header widgets-header mb-3">
    <div class="container-fluid">
        <div class="tbl tbl-outer">
            <div class="tbl-row">
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">ব্যালেন্স</div>
                                    <div class="amount-sm">উত্তোলনযোগ্য ৳{{$balance > 500 ? $balance - 500 : 0}}/-
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong>৳&nbsp;{{$balance}}/- </strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target="@if($balance > 599) #amount_withdraw @else # @endif"
                        style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 @if($balance < 599) disabled @endif ">ক্যাশ
                        আউট করুন </a>
                </div>
                {{-- <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">রিওয়ার্ড পয়েন্ট</div>
                                    <div class="amount-sm">টাকা ৳{{$rp/20}}/-</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong>{{$rp}}</strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" data-toggle="modal" data-target=" @if($rp < 4000) #rp_withdraw @endif "
                        style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 @if($rp < 3999 ) disabled @endif ">ক্যাশে
                        পরিবর্তন করুন </a>
                </div> --}}
                <div class="tbl-cell pb-0">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="">
                                    <div class="title">সহকারীর সংখ্যা</div>
                                    <div class="amount-sm">এক্টিভ - {{count($comrades)}} / এক্টিভ নয় -
                                        {{count($totalcomrades) - count($comrades)}}</div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4">
                                    <header> <strong>{{count($totalcomrades)}}</strong> </header>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('esp.comrade')}}" style="width:100%"
                        class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2">সহকারীর বিস্তারিত </a>
                </div>
                <div class="tbl-cell">
                    <div class="tbl tbl-item">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <div class="title">রেটিং </div>
                            </div>
                            <div class="tbl-cell tbl-cell-progress">
                                <div class="circle-progress-bar-typical size-56 pieProgress pie_progress"
                                    role="progressbar" data-goal="75" data-barcolor="#929faa" data-barsize="10"
                                    aria-valuemin="0" aria-valuemax="100" aria-valuenow="75">
                                    <span class="pie_progress__number text-secondary">{{$ratings}} <i
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
    {{-- <div class="col-xl-6">
        <div class="chart-statistic-box">
            <div class="chart-txt">
                <div class="chart-txt-top">
                    <p><span class="unit"> ৳ </span><span class="number">1540</span></p>
                    <p class="caption">Last 07 Service History </p>
                </div>
                <table class="tbl-data">
                    <tr>
                        <td class="price color-yellow">120 ৳ </td>
                        <td>Orders</td>
                    </tr>
                    <tr>
                        <td class="price color-yellow">15 ৳ </td>
                        <td>Investments</td>
                    </tr>
                    <tr>
                        <td class="price color-yellow">55 ৳ </td>
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
    </div> --}}

    <div class="col-md-6 pr-2">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-3">
            <div class="card-header">
                লেনদেন
            </div>
            <div class="box-typical-body panel-body ">
                @if(count($miniStatements) !== 0)
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>তারিখ </th>
                            <th>বিস্তারিত </th>
                            <th>TXN ID</th>
                            <th class="text-center">পরিমান </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($miniStatements as $statement)
                        <tr>
                            <td>{{date("d-m-Y", strtotime($statement->created_at))}}</td>
                            <td>{{$statement->details}}({{$statement->type}})</td>
                            <td>{{$statement->trxno}}</td>
                            <td class="text-center"> <span> @if ($statement->status == 'credit') <span
                                        class="label rounded-circle label-success" data-toggle="tooltip"
                                        data-placement="top" title="Credited"><i class="fa fa-plus"></i></span>
                                    @elseif($statement->status == 'income') <span
                                        class="label rounded-circle label-warning" data-toggle="tooltip"
                                        data-placement="top" title="Earned">(e)</span> @else <span
                                        class="label rounded-circle label-danger" data-toggle="tooltip"
                                        data-placement="top" title="Debited"><i class="fa fa-minus"></i></span> @endif
                                </span> <span
                                    class="@if ($statement->status == 'credit') text-success  @elseif ($statement->status == 'income') text-warning @else text-danger @endif">{{$statement->amount}}/-</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="card-body col-md-12 text-secodary text-center p-5  p-auto"> এই মূহুর্তে কোনো লেনদেন নেই
                </div>
                @endif
            </div>
            <!--.box-typical-body-->
        </section>
    </div>

    <div class="col-md-6 pl-2">
        <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-3">
            <div class="card-header">নতুন কাজ </div>
            <div class="box-typical-body panel-body" id="avail_able_order">
                @if($balance >= 500)
                @if(count($newOrders) != 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                                <div>অর্ডার নং #</div>
                            </th>
                            <th>
                                <div> সার্ভিস </div>
                            </th>
                            <th>
                                <div>এলাকা </div>
                            </th>
                            <th>
                                <div>সময় </div>
                            </th>
                            <th>
                                <div> বিস্তারিত </div>
                            </th>
                            <th>
                                <div> একশন </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($newOrders as $order)
                        <tr>
                            <td>{{$order->order_no}}</td>
                            <td>{{$order->category->name}}</td>
                            <td>{{$order->area}}</td>
                            <td>{{$order->order_date}}/{{$order->order_time}}</td>
                            <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                    data-target="#view-{{$order->id}}" data-item="{{ $order->id }}">বিস্তারিত </button>
                            </td>
                            <td>
                                @if($order->status == '0')
                                <button class="btn btn-sm btn-mm" data-toggle="modal"
                                    data-target="#allocate-{{$order->id}}"
                                    data-item="{{ $order->id }}">সহকারী</button> @else
                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#allocate-{{$order->id}}" data-item="{{ $order->id }}" disabled>
                                    এলোকেটেড </button> @endif

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                @else
                <div class="card-body col-md-12 text-secodary text-center p-5  p-auto"> দুঃখিত, এই মূহুর্তে কোনো কাজ নাই
                    ।</div>
                @endif
                @else
                <div class="card-body col-md-12 text-danger text-center p-5  p-auto"> দয়া করে আপনার একাউন্টটি রিচার্জ
                    করে কাজ অব্যাহত রাখুন। </div>
                @endif

            </div>
            <!--.box-typical-body-->
        </section>
    </div>

    <!--.col-->
</div>
<!--.row-->
<div class="row">
    {{-- <div class="col-md-12">
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
                            <th>
                                <div>Change Comrade</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($activeOrders)
                        @foreach ($activeOrders as $actord)
                        <tr>
                            <td>{{$actord->order->order_no}}</td>
    <td>{{$actord->order->category->name}}</td>
    <td>{{$actord->user->name}}</td>
    <td>{{$actord->provider->name}}</td>
    <td> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-act-{{$actord->id}}"
            data-item="{{ $actord->id }}">Details</button>
    </td>
    <td>
        @if($actord->order->status == 1)
        <span class="text-warning">Comrade On The way</span>
        @endif
        @if($actord->order->status == 2)
        <span class="text-danger">Comrade working on service.</span>
        @endif
        @if($actord->order->status == 3)
        <span class="text-success">Comrade has finish his job. And witing for payment.</span>
        @endif
    </td>
    <td>
        <button class="btn btn-sm btn-mm" data-toggle="modal" data-target="#allocate-{{$actord->id}}"
            data-item="{{ $actord->id }}">Chnage
            Comrade</button>
    </td>
    </tr>
    @endforeach
    @endif
    </tbody>
    </table>
</div>
<!--.box-typical-body-->
</section>
</div> --}}
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable mb-0">

        <div class="card-header">
            আপনার সার্ভিস সমূহ
        </div>
        <div class="card-body">
            @if($services)
            <div class="btn-group special" role="group" aria-label="">

                <button type="button"
                    class="btn @if(in_array(1,$services)) btn-mm  @else btn-mm-outline  text-mm @endif "> ইলেকট্রিকাল
                </button>
                <button type="button"
                    class="btn @if(in_array(3,$services)) btn-mm  @else btn-mm-outline  text-mm @endif"> প্লাম্বিং
                </button>
                <button type="button"
                    class="btn @if(in_array(6,$services)) btn-mm  @else btn-mm-outline  text-mm @endif "> এসি </button>
                <button type="button"
                    class="btn @if(in_array(5,$services)) btn-mm  @else btn-mm-outline  text-mm @endif ">জেনারেটর
                </button>
                <button type="button"
                    class="btn @if(in_array(4,$services)) btn-mm  @else btn-mm-outline  text-mm @endif ">আই টি </button>
                <button type="button"
                    class="btn @if(in_array(2,$services)) btn-mm  @else btn-mm-outline  text-mm @endif ">সিসিটিভি
                </button>

            </div>
            @endif
        </div>
    </section>
</div>

</div>



<!-- Modals section for allocate order and view details order -->
@if ($newOrders)
@foreach ($newOrders as $order)
<div class="modal fade" id="view-{{$order->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">অর্ডারের বিস্তারিত </h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header">
                                {{-- <u><strong><span class="m-0 typical-header">Client Info</span></strong></u><br>
                                Name:<strong>{{$actOrder->order->user->name}}</strong><br> Phone:
                                <strong>{{$actOrder->order->user->phone_no}}</strong><br>
                                Area: <strong>{{$actOrder->order->area}}</strong><br>
                                Address: <strong>{{$actOrder->order->user->address}}</strong> --}}
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
                                    @foreach ($order->bookings as $booking)
                                    <tr>
                                        <td>{{$booking->service_name}}</td>
                                        <td>{{$booking->price}}</td>
                                        <td>{{$booking->quantity}}</td>
                                        <td>@if ($booking->quantity >= 1) {{$booking->price + ($booking->aditional_price*($booking->quantity
                                            - 1)) }} @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-target="#allocate-{{$order->id}}"
                    data-item="{{ $order->id }}" class="btn btn-primary">সহকারী</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
            </div>
        </div>

    </div>
</div>
<!-- View Details Modal end -->

{{-- <br> --}}

<!-- View Details Modal end -->
<div class="modal fade" id="allocate-{{$order->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> সহকারী নির্বাচন করুন </h4>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$order->id}}" />
                <input type="hidden" name="service_provider_id" value="{{$providers->first()->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারী নির্বাচন করুন :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন করুন </option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>কাস্টমার :</label> <strong>
                                        {{ $order->user ? $order->user->name : '-' }}</strong>
                                    <input type="text" name="user_id"
                                        value="{{ $order->user ? $order->user->id : '-' }}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Ok</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endforeach
@endif

@if ($activeOrders)
@foreach ($activeOrders as $actOrder)
<div class="modal fade" id="view-act-{{$actOrder->id}}" role="dialog">
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
                                    Name:<strong>{{$actOrder->name}}</strong><br> Phone:
                                    <strong>{{$actOrder->phone}}</strong><br>
                                    Area: <strong>{{$actOrder->area}}</strong><br>
                                    Address: <strong>{{$actOrder->address}}</strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">Comrade Info</span></strong></u><br>
                                    Name:<strong>{{$actOrder->comrade ? $actOrder->comrade->c_name : '-'}}</strong><br>
                                    Phone:
                                    <strong>{{$actOrder->comrade ? $actOrder->comrade->c_phone_no : '-'}}</strong>
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
                                    @foreach ($actOrder->bookings as $booking)
                                    <tr>
                                        <td>{{$booking->service_name}}</td>
                                        <td>{{$booking->price}}</td>
                                        <td>{{$booking->quantity}}</td>
                                        <td>@if ($booking->quantity >= 1) {{$booking->price + ($booking->aditional_price*($booking->quantity
                                                - 1)) }} @endif</td>
                                    </tr>
                                    @endforeach
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
@endforeach
@endif



{{--  amount withdraw modal --}}
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
                <form action="{{route('withdraw.request')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="amount" class="col-sm-4 col-form-label">Enter Amount</label>
                        <div class="col-sm-12">
                            <input type="number" min="100" max="{{$balance > 500 ? $balance - 500 : 0}}" name="amount"
                                class="form-control" placeholder="500" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount" class="col-sm-4 col-form-label">Enter Amount</label>
                        <div class="col-sm-12">
                            <select name="type" id="type" class="form-control">
                                <option value="bkash">Bkash</option>
                                <option value="surecash">SureCash</option>
                                <option value="rocket">Rocket</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="mfs_number" class="col-sm-12 col-form-label">MFS
                            Number(Bkash,Rocket,SureCash)</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="mfs_number" name="mfs_number"
                                placeholder="017XXXXXXXX" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="mfs_number" class="col-sm-12 col-form-label">To Conferm Enter your password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="mfs_number" name="mfs_number"
                                 required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
              
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
                <form action="{{route('withdraw.request')}}" method="POST">
                    @csrf
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


@if ($activeOrders)
@foreach ($activeOrders as $actord)
<div class="modal fade" id="allocate-{{$actord->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$actord->order_id}}" />
                <input type="hidden" name="service_provider_id" value="{{$providers->first()->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">Select Comrade</option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        {{ $actord->user ? $actord->user->name : '-' }}</strong>
                                    <input type="text" name="user_id"
                                        value="{{ $actord->user ? $actord->user->id : '-' }}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endforeach
@endif
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
{{-- <script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script> --}}

<script>
    // 
$(document).ready(function() {
            function newAvailableOrder(){
                $.ajax({
                    type: "get",
                    url: "{{route('new.available.order')}}",
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
            //         url: "{{route('new.available.order.count')}}",
            //         dataType: "html",
            //         success: function (response) {
            //             var data = response;
            //         }
            //     });
                    
            // }
// interval for check new order.


@if($newOrders)
    @if(count($newOrders) != 0)
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
        $edata = {!! count($newOrders) !!};
        setInterval(function(){
             $.ajax({
                    type: "get",
                    url: "{{route('new.available.order.count')}}",
                    dataType: "html",
                    success: function (response) {
                        if(response != $edata ){
                            // var data = newAvailableOrder();
                            $edata = response;
                            $.ajax({
                                type: "get",
                                url: "{{route('new.available.order')}}",
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
        // $edata = {!! count($newOrders) !!};
        // if($ndata == $edata ){
        //     var data = newAvailableOrder();
        //     $('#avail_able_order').html(data);
        // }

    @endif
@endif
});
</script>


{{-- <script>
if(typeof(EventSource) !== "undefined") {
  var source = new EventSource("demo_sse.php");
  source.onmessage = function(event) {
    document.getElementById("result").innerHTML += event.data + "<br>";
  };
}
</script> --}}

@endsection