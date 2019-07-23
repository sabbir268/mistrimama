@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">

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
                                    <div class="title  font-weight-bold">
                                        <h4>সার্ভিস </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong
                                                class="rounded border p-2 bg-mm-light text-mm">{{count($services)}}</strong>
                                        </h2>
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
                                    <div class="title  ">
                                        <h4>সাব সার্ভিস </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2><strong class="rounded border p-2 bg-mm-light text-mm">
                                                {{count($subService)}} </strong></h2>
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
                                    <div class="title  ">
                                        <h4>একাউন্টের ধরন </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="tbl-cell">
                                <div class="col-md-4  text-success">
                                    <header>
                                        <h2 class="text-center text-mm">
                                            @if ($providers->first()->service_category == 20)
                                            স্টার্টার (20%)
                                            @endif

                                            @if ($providers->first()->service_category == 15)
                                            এক্সপার্ট (15%)
                                            @endif

                                            @if ($providers->first()->service_category == 10)
                                            প্রফেশনাল (10%)
                                            @endif

                                        </h2>
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">সকল সার্ভিস সমূহ </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th rowspan="2">ক্যাটেগরি</th>
                                <th rowspan="2">সাব ক্যাটেগরি</th>
                                <th rowspan="2">কাজের ধরন </th>
                                <th colspan="3" class="text-center">মূল ফি</th>
                                <th colspan="3" class="text-center">অতিরিক্ত ফি</th>
                            </tr>
                            <tr>
                                <th>সার্ভিস ফি </th>
                                <th>সেবা দান কারীর ফি </th>
                                <th>মিস্ত্রিমামার ফি </th>
                                <th>অতিরিক্ত ইউনিট ফি </th>
                                <th>সেবা দান কারীর ফি </th>
                                <th>মিস্ত্রিমামার ফি</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp

                            @foreach ($subServiceDetails as $service )
                            <tr>
                                <td>{{$i}} @php $i++ @endphp </td>
                                <td>{{$service->sub_category->first()->category->name}}</td>
                                <td>{{$service->sub_category->first()->name}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->price}}</td>
                                @php
                                $mmam = ($service->price * $providers->first()->service_category)/100;
                                $spam = ($service->price - $mmam );
                                @endphp
                                <td>{{$spam}}</td>
                                <td>{{$mmam}}</td>
                                @php
                                $ammam = ($service->additional_price * $providers->first()->service_category)/100;
                                $aspam = ($service->additional_price - $ammam );
                                @endphp
                                <td>{{$service->additional_price}}</td>
                                <td>{{$aspam}}</td>
                                <td>{{$ammam}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$subServiceDetails->links()}}
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
@endsection