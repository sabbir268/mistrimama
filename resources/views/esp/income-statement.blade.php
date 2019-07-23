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
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা {{$balance ? $balance : 0}}/-</div>
                        <div class="caption color-purple text-mm">(Till Today)</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>বর্তমান একাউন্ট ব্যালেন্স</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <?php 
                            if($lastServiceAmount){
                                $tam = ($lastServiceAmount->total_price + $lastServiceAmount->extra_charge); 
                                $mmc = (($tam * $providers->service_category) / 100); 
                                $spam = $tam - $mmc;
                            }else{
                                $spam = 0;
                            }
                        ?>
                        <div class="number">টাকা {{$spam}}/-
                        </div>
                        <div class="caption color-purple btn-link text-mm ">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>সর্বশেষ সার্ভিস ফি </strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা  {{$lastCashOut ? $lastCashOut->amount : 0}} /-</div>
                        <div class="caption color-purple btn-link text-mm">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>শেষ নগদ উত্তোলনের পরিমাণ</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা {{ $lastRecharge ? $lastRecharge->amount : 0}}/-</div>
                        <div class="caption color-purple btn-link text-mm">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>শেষ রিচার্জ-এর পরিমাণ</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
        </div>

        <div class="row sr-only">
            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic text-left">
                        <div class="number pt-2 pb-2"> <span class="text-mm">Todays Income:</span>
                            BDT{{$todaysincome ? $todaysincome->amount : 0}}/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Yesterdays Income:</span>
                            BDT{{$yesterdaysincome ? $yesterdaysincome->amount : 0}}/-</div>
                    </div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number pt-2 pb-2"> <span class="text-mm">This Week income (till date):</span>
                            BDT{{$thisWeekIncome ? $thisWeekIncome->amount : 0}}/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Last Week Income:</span>
                            BDT 0/-</div>
                    </div>

                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-4">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number pt-2 pb-2"> <span class="text-mm">This Month income (till date):</span>
                            BDT 0/-</div>
                        <div class="number pt-2 pb-2"> <span class="text-mm">Last Month Income:</span>
                            BDT 0/-</div>
                    </div>
                </section>
                <!--.widget-simple-sm-->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                        <tr>
                            <th>তারিখ </th>
                            <th>বর্ননা </th>
                            <th>TXN ID</th>
                            <th class="text-center">ফি</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($statements as $statement)
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

        {{$statements->links()}}
    </div>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
@endsection