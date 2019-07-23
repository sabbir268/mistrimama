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
                                        <h4>চলমান কাজ</h4>
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
                                        <h4>কাজের তালিকা</h4>
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
                                        <h4>মোট কাজ</h4>
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


<div class="col-md-12 alert alert-danger" id="get_order_alert" >দয়া করে আপনার একাউন্টটি রিচার্জ করে কাজ অব্যাহত রাখুন। </div>

<section class="tabs-section" id="jobs_get">
    <div class="tabs-section-nav tabs-section-nav-icons">
        <div class="tbl">
            <ul class="nav" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-mm" href="#tabs-1-tab-1" role="tab" data-toggle="tab" aria-selected="true">
                        <span class="nav-link-in text-mm">
                            <i class="font-icon font-icon-wallet text-mm"></i>
                            নতুন মিস্ত্রি মামা থেকে অর্ডার অনুরোধ
                        </span>
                    </a>
                </li>
                <li class="nav-item text-center">
                    <a class="nav-link active show text-mm" href="#tabs-1-tab-2" role="tab" data-toggle="tab"
                        aria-selected="false">
                        <span class="nav-link-in text-mm">
                            <span class="font-icon font-icon-player-subtitres text-mm"></span>
                            <span class="invisible">Request fr</span>চলতি কাজ ও সূচি <span
                                class="invisible">Request fr</span>
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
                                    <div>বর্ননা </div>
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
                                        data-target="#view-{{$order->id}}" data-item="{{ $order->id }}">বর্ননা </button>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-success" data-toggle="modal"
                                            data-target="#allocate-{{$order->id}}" data-item="{{ $order->id }}"><i
                                                data-toggle="tooltip" data-placement="top" title="Accept & Allowcate"
                                                class="fa fa-check"></i></button>
                                        <button class="btn btn-sm btn-danger" data-item="{{ $order->id }}"> <i
                                                data-toggle="tooltip" data-placement="top" title="Reject"
                                                class="fa fa-times"></i> </button>
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
                                    <div> অর্ডারকারী  </div>
                                </th>
                                <th>
                                    <div>সহকারী </div>
                                </th>
                                <th>
                                    <div>বর্ননা </div>
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
                            @foreach ($activeOrders as $actord)
                            <tr>
                                <td>{{$actord->orders_no}}</td>
                                <td>{{$actord->category->name}}</td>
                                <td>{{$actord->name}}</td>
                                <td>{{$actord->comrade ? $actord->comrade->c_name : 'No Comrade assign yet.'}}</td>
                                <td> <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#view-act-{{$actord->id}}"
                                        data-item="{{ $actord->id }}">বর্ননা </button>
                                </td>
                                <td>
                                    @if($actord->comrade)
                                    @if($actord->status == 1)
                                    <span class="text-warning">সহকারী যাচ্ছে </span>
                                    @endif
                                    @if($actord->status == 2)
                                    <span class="text-danger">সহকারী কাজ করছে</span>
                                    @endif
                                    @if($actord->status == 3)
                                    <span class="text-success">সফল ভাবে কাজ শেষ হয়েছে এবং পেমেন্টের জন্য অপেক্ষামান</span>
                                    @endif
                                    @if($actord->status == 4)
                                    <span class="text-success"> সহকারী পেমেন্ট গ্রহন করেছে </span>
                                    @endif
                                    @else
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#allocate-{{$actord->id}}"
                                        data-item="{{ $actord->id }}">Allocate</button>
                                    @endif
                                </td>

                                <td>
                                    <form action="{{route('service-update-sts')}}" method="post">
                                        @csrf
                                        <!-- -->
                                        <input type="text" value="{{$actord->id}}" name="order_id" hidden>
                                        <input type="text" value="{{$actord->serviceSystem->id}}" name="s_sys_id" hidden>
                                        @switch($actord->status)
                                        @case(1)
                                        <input type="text" value="2" name="status" hidden>
                                        <button type="submit" class="btn  btn-primary" style="width:100%">কাজ শুরু  </button> @break
                                        @case(2)
                                        <input type="text" value="3" name="status" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%"> কাজ শেষ </button>
                                        @break
                                        @case(3)
                                        @if($actord->type == 'self')
                                            <button disabled="disabled" class="btn btn-warning" style="width:100%">পেমেন্ট এর জন্য অপেক্ষামান </button>

                                        @else 
                                            <input type="text" value="5" name="status" hidden>
                                            <input type="text" value="{{ (($actord->total_price + $actord->extra_price) - $actord->disc)  }}" name="amount" hidden>
                                            <input type="text" value="{{$actord->sp_id}}"  name="service_provider_id" hidden>
                                            <input type="text" value="{{$actord->user_id}}" name="client_id" hidden>
                                            <button type="submit" class="btn  btn-success" style="width:100%"> পেমেন্ট সংগ্রহ  </button>
                                        @endif

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
                                        {{-- <input type="text"
                                            value="{{ (($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)  }}"
                                            name="amount" hidden> --}}
                                        <input type="text" value="{{$actord->sp_id}}"
                                            name="service_provider_id" hidden>
                                        <input type="text" value="{{$actord->user_id}}" name="client_id" hidden>
                                        <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন করুন</button>
                                        @break
                                        @default
                                        <input type="text" value="" name="status" hidden> @endswitch
                                    </form>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#allocate-{{$actord->id}}" data-item="{{ $actord->id }}">সহকারী পরিবর্তন</button>
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
                <h4 class="modal-title">অর্ডারের বর্ননা </h4>
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
                                        <th>সার্ভিস ফি </th>
                                        <th>পরিমান </th>
                                        <th>টোটাল ফি </th>
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
                    data-item="{{ $order->id }}" class="btn btn-primary">Allocate</button>
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
                    <button type="submit" class="btn btn-primary">এলোকেট </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endforeach
@endif

@if ($newOrdersRequests)
@foreach ($newOrdersRequests as $order)
<div class="modal fade" id="view-{{$order->order->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">অর্ডার এর বর্ননা</h4>
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
                                        <th>সার্ভিস ফি </th>
                                        <th>পরিমান </th>
                                        <th>মোট ফি </th>
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
                    data-item="{{ $order->order->id }}" class="btn btn-primary">এলোকেট </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল</button>
            </div>
        </div>

    </div>
</div>
<!-- View Details Modal end -->

{{-- <br> --}}

<!-- View Details Modal end -->
<div class="modal fade" id="allocate-{{$order->order->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল </button>
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
                <h4 class="modal-title">অর্ডারের বর্ননা</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">কাস্টমার এর বর্ননা </span></strong></u><br>
                                    নাম :<strong>{{$actOrder->name}}</strong><br> ফোন:
                                    <strong>{{$actOrder->phone}}</strong><br>
                                    এলাকা : <strong>{{$actOrder->area}}</strong><br>
                                    ঠিকানা: <strong>{{$actOrder->address}}</strong>
                                </div>
                                <div class="card-header col-md-6">
                                    <u><strong><span class="m-0 typical-header">সহকারী </span></strong></u><br>
                                    নাম :<strong>{{$actOrder->comrade ? $actOrder->comrade->c_name : 'No comrade allowcated'}}</strong><br>
                                    ফোন :
                                    <strong>{{$actOrder->comrade ? $actOrder->comrade->c_phone_no : '-'}}</strong>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>সার্ভিস </th>
                                        <th>সার্ভিস ফি </th>
                                        <th>পরিমান </th>
                                        <th>মোট ফি </th>
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
                <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল </button>
            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="allocate-{{$actord->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">সহকারী নির্বাচন করুন </h4>
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
                    <button type="submit" class="btn btn-primary">এলোকেট </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">বাতিল </button>
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

<script>
    $(document).ready(function() {
           
    });

</script>
@endsection