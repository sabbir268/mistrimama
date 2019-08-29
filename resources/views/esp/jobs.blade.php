@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">

<style>
    .tabs-section-nav .nav-link.active .nav-link-in {
        border-top-color: #f3b400;
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
                                                {{-- @if($ongonigOrder) --}}
                                                {{count($ongonigOrder)}}
                                                {{-- @else 0 @endif  --}}
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
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm">@if($activeOrders)
                                                {{count($activeOrders)}} @else 0 @endif </strong></h2>
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
    @if($balance >= 500)
    #jobs_get{
        display: block;
    }
    
    #get_order_alert{
        display: none;
    }
    
    @else 
    #jobs_get{
        display: none;
    }
    
    #get_order_alert{
        display: block;
    }
    @endif

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
                            @if ($newOrdersRequests)
                            @foreach ($newOrdersRequests as $order)
                            <tr>
                                <td>{{$order->order->order_no}}</td>
                                <td>{{$order->order->category->name}}</td>
                                <td>{{$order->order->area}}</td>
                                <td>{{date('d-m-Y',strtotime($order->order->order_date))}}/{{$order->order->order_time}}
                                </td>
                                <td> <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#view-{{$order->id}}" data-item="{{ $order->id }}">বিস্তারিত
                                    </button>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <!-- <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#allocate-{{$order->id}}" data-item="{{ $order->id }}"><i
                                                data-toggle="tooltip" data-placement="top" title="Accept & Allowcate"
                                                class="fa fa-check"></i></button> -->
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#allocate-{{$order->id}}" data-item="{{ $order->id }}">গ্রহন ও
                                            বন্ঠন</button>

                                        <!-- <button class="btn btn-sm btn-danger" data-item="{{ $order->id }}"> <i
                                                data-toggle="tooltip" data-placement="top" title="Reject"
                                                class="fa fa-times"></i> </button> -->
                                        <a href="{{route('esp.cancel-request',$order->id)}}"
                                            class="btn btn-sm btn-danger">বাতিল</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
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
                                <th>
                                    <div>নতুন সার্ভিস যোগ </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activeOrders as $actord)
                            <tr>
                                <td>{{$actord->orders_no}}</td>
                                <td>{{$actord->category->name}}</td>
                                <td>{{$actord->name}}</td>
                                <td>{{$actord->comrade ? $actord->comrade->c_name : 'No Comrade assign yet.'}}</td>
                                <td> <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#view-act-{{$actord->id}}" data-item="{{ $actord->id }}">বিস্তারিত
                                    </button>
                                </td>
                                <td>
                                    @if($actord->comrade)
                                    @if($actord->status == 1)
                                    <span class="text-dark">সহকারী যাচ্ছে </span>
                                    @endif
                                    @if($actord->status == 2)
                                    <span class="text-danger">সহকারী কাজ করছে</span>
                                    @endif
                                    @if($actord->status == 3)
                                    <span class="text-success">সফল ভাবে কাজ শেষ হয়েছে এবং পেমেন্টের জন্য
                                        অপেক্ষামান</span>
                                    @endif
                                    @if($actord->status == 4)
                                    <span class="text-success"> সহকারী পেমেন্ট গ্রহন করেছে </span>
                                    @endif
                                    @else
                                    <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#allocate-{{$actord->id}}"
                                        data-item="{{ $actord->id }}">বন্টন</button>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{route('service-update-sts')}}" method="post">
                                        @csrf
                                        <!-- -->
                                        <input type="text" value="{{$actord->id}}" name="order_id" hidden>
                                        <input type="text" value="{{$actord->serviceSystem->id}}" name="s_sys_id"
                                            hidden>
                                        @switch($actord->status)
                                        @case(1)
                                        <input type="text" value="2" name="status" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">কাজ শুরু
                                        </button> @break
                                        @case(2)
                                        <input type="text" value="3" name="status" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%"> কাজ শেষ
                                        </button>
                                        @break
                                        @case(3)
                                        <input type="text" value="5" name="status" hidden>
                                        <input type="text"
                                            value="{{ (($actord->total_price + $actord->extra_price) - $actord->disc)  }}"
                                            name="amount" hidden>
                                        <input type="text" value="{{$actord->sp_id}}" name="service_provider_id" hidden>
                                        <input type="text" value="{{$actord->user_id}}" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%"> পেমেন্ট
                                            সংগ্রহ </button>
                                        @break
                                        @case(4)
                                        {{-- <ul class="list-group mb-2">
                                            <li class="list-group-item p-0 m-0 border-0 ">User Paid: <span
                                                    class="invisible">1232</span>
                                                <strong>{{ (($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)  }}
                                        টাকা</strong></li>
                                        <li class="list-group-item p-0 m-0 border-0 "> ডিসকাউন্ট :
                                            <strong>{{$sumOrder->disc  }} টাকা</strong></li>
                                        <li class="list-group-item p-0 m-0"></li>
                                        <li class="list-group-item p-0 m-0 border-0 "> ইনকাম : <span
                                                class="invisible">123s2</span>
                                            <strong>{{(($sumOrder->total_price + $sumOrder->extra_price) ) }}
                                                টাকা</strong>
                                        </li>
                                        </ul> --}}
                                        <input type="text" value="5" name="status" hidden>
                                        <input type="text"
                                            value="{{ (($actord->total_price + $actord->extra_price) - $actord->disc)  }}"
                                            name="amount" hidden>
                                        <input type="text" value="{{$actord->sp_id}}" name="service_provider_id" hidden>
                                        <input type="text" value="{{$actord->user_id}}" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন
                                            করুন</button>
                                        @break
                                        @default
                                        <input type="text" value="" name="status" hidden> @endswitch
                                    </form>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-mm" data-toggle="modal"
                                        data-target="#allocate-{{$actord->id}}" data-item="{{ $actord->id }}">সহকারী
                                        পরিবর্তন</button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-mm" id="new_service" data-order_id="{{$actord->id}}"
                                        data-category_id="{{$actord->category_id}}"> <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
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
@if ($newOrders)
@foreach ($newOrders as $order)
<div class="modal fade" id="view-{{$order->id}}" role="dialog">
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
                                {{-- <u><strong><span class="m-0 typical-header">Client Info</span></strong></u><br>
                                নাম:<strong>{{$actOrder->order->user->name}}</strong><br> Phone:
                                <strong>{{$actOrder->order->user->phone_no}}</strong><br>
                                এলাকা: <strong>{{$actOrder->order->area}}</strong><br>
                                ঠিকানা : <strong>{{$actOrder->order->user->address}}</strong> --}}
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
                                    @foreach ($order->bookings as $booking)
                                    <tr>
                                        <td>{{$booking->service_name}}({{$booking->service_details_name}})</td>
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
                    data-item="{{ $order->id }}" class="btn btn-primary">বন্টন</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$order->id}}" />
                <input type="hidden" name="service_provider_id" value="{{$providers->first()->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন করুন </option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        {{ $order->user ? $order->user->name : '-' }}</strong>
                                    <input type="text" name="user_id"
                                        value="{{ $order->user ? $order->user->id : '-' }}" hidden>
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

@endforeach
@endif

@if ($newOrdersRequests)
@foreach ($newOrdersRequests as $order)
<div class="modal fade" id="view-{{$order->id}}" role="dialog">
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
                <button type="button" data-toggle="modal" data-target="#allocate-{{$order->order->id}}"
                    data-item="{{ $order->order->id }}" class="btn btn-primary">বন্টন</button>
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
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$order->order->id}}" />
                <input type="hidden" name="service_provider_id" value="{{$providers->first()->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন</option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        {{ $order->user ? $order->user->name : '-' }}</strong>
                                    <input type="text" name="user_id"
                                        value="{{ $order->user ? $order->user->id : '-' }}" hidden>
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

@endforeach
@endif

@if ($activeOrders)
@foreach ($activeOrders as $actOrder)
<div class="modal fade" id="view-act-{{$actOrder->id}}" role="dialog">
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
                                    নাম :<strong>{{$actOrder->name}}</strong><br> ফোন:
                                    <strong>{{$actOrder->phone}}</strong><br>
                                    এলাকা : <strong>{{$actOrder->area}}</strong><br>
                                    ঠিকানা: <strong>{{$actOrder->address}}</strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">সহকারী </span></strong></u><br>
                                    নাম
                                    :<strong>{{$actOrder->comrade ? $actOrder->comrade->c_name : 'No comrade allowcated'}}</strong><br>
                                    ফোন :
                                    <strong>{{$actOrder->comrade ? $actOrder->comrade->c_phone_no : '-'}}</strong>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>সার্ভিস </th>
                                        <th>সার্ভিস মূল্য </th>
                                        <th>পরিমান </th>
                                        <th>মোট মূল্য </th>
                                        <th>একশন </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($actOrder->bookings as $booking)
                                    <tr>
                                        <td>{{$booking->service_name}}({{$booking->service_details_name}})</td>
                                        <td>{{$booking->price}}</td>
                                        <td>{{$booking->quantity}}</td>
                                        <td>@if ($booking->quantity >= 1) {{$booking->price + ($booking->aditional_price*($booking->quantity
                                                - 1)) }} @endif</td>
                                        <td>
                                            @if($actOrder->status > 1)
                                            <button class="btn btn-rounded btn-success-outline btn-sm
                                                @if($booking->status == 0)
                                                     btn-success-outline
                                                @endif
                                                   finsih_sub" data-id="{{$booking->id}}"
                                                id="finsih_sub{{$booking->id}}"><i class="fa fa-thumbs-up"></i>
                                                @if($booking->status == 0)
                                                শেষ
                                                @else
                                                কাজ শেষ
                                                @endif

                                            </button>
                                            @else
                                            -
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল </button>
            </div> --}}
        </div>

    </div>
</div>


<div class="modal fade" id="allocate-{{$actOrder->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$actord->id}}" />

                <input type="hidden" name="service_provider_id" value="{{$providers->first()->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">সহকারীর তালিকা :</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">নির্বাচন করুন </option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>কাস্টমার :</label> <strong>
                                        {{ $actord->user ? $actord->user->name : '-' }}</strong>
                                    <input type="text" name="user_id"
                                        value="{{ $actord->user ? $actord->user->id : '-' }}" hidden>
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
@endforeach
@endif

<div id="showModal"></div>
<div id="showModal2"></div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>

<script>
    $('.finsih_sub').click(function(){
            $id = $(this).data('id');
            // console.log($id);
            // console.log("{{asset('/order-bit-done/')}}/"+$id);
            $.ajax({
                    type: "get",
                    url: "{{asset('/order-bit-done/')}}/"+$id,
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


        $('#new_service').click(function(){
            $category_id = $(this).data('category_id');
            $order_id = $(this).data('order_id');
            $.ajax({
                    type: "get",
                    url: "{{asset('/new_service/')}}/"+$category_id+"/"+$order_id,
                    dataType: "html",
                    success: function (response) {
                        $('#showModal').html(response);
                        $('#all_services').modal({
                            show: true,
                            backdrop: 'static',
                            keyboard: false
                        });
                    }
                });
        })


        
</script>
@endsection