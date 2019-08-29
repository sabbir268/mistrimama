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
                        <div class="caption color-purple text-mm ">উত্তোলনযোগ্য
                            ৳{{$balance > 500 ? $balance - 500 : 0}}/-</div>
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
                        <div class="caption color-purple btn-link text-mm " data-toggle="modal"
                            data-target="#lastServiceModal" style="cursor:pointer">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>সর্বশেষ সার্ভিস মূল্য </strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>

            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা {{$lastCashOut ? $lastCashOut->amount : 0}} /-</div>
                        <div class="caption color-purple btn-link text-mm" data-toggle="modal"
                            data-target="#lastCashOutModal" style="cursor:pointer">View Details</div>
                    </div>
                    <div class="widget-simple-sm-bottom statistic">
                        <strong>শেষ ক্যাশ আউটের পরিমাণ</strong></div>
                </section>
                <!--.widget-simple-sm-->
            </div>
            <div class="col-xl-3">
                <section class="widget widget-simple-sm">
                    <div class="widget-simple-sm-statistic">
                        <div class="number">টাকা {{ $lastRecharge ? $lastRecharge->amount : 0}}/-</div>
                        <div class="caption color-purple btn-link text-mm" data-toggle="modal"
                            data-target="#lastRechargeModal" style="cursor:pointer">View Details</div>
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
                    <th>বিস্তারিত </th>
                    <th>TXN ID</th>
                    <th class="text-center">পরিমান </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($statements as $statement)
                <tr>
                    <td>{{date("d-m-Y", strtotime($statement->created_at))}}</td>
                    <td>{{$statement->details}}({{$statement->type}})</td>
                    <td>{{$statement->trxno}}</td>
                    <td class="text-center"> <span> @if ($statement->status == 'credit') <span
                                class="label rounded-circle label-success" data-toggle="tooltip" data-placement="top"
                                title="Credited"><i class="fa fa-plus"></i></span>
                            @elseif($statement->status == 'income') <span class="label rounded-circle label-warning"
                                data-toggle="tooltip" data-placement="top" title="Earned">(e)</span> @else <span
                                class="label rounded-circle label-danger" data-toggle="tooltip" data-placement="top"
                                title="Debited"><i class="fa fa-minus"></i></span> @endif
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


<!-- Modal -->
<div class="modal fade" id="lastCashOutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ উত্তোলনের বিস্তারিত </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>তারিখ</th>
                                    <th>বিস্তারিত</th>
                                    <th>TXNID </th>
                                    <th>মূল্য</th>
                                    <th>পরিমাণ</th>
                                </tr>

                            </thead>

                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lastServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ সার্ভিস ডিটেইলস </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="p-0 mt-2 m-0 border-bottom">কাস্টমারের বিস্তারিত :</h5>
                        <h6 class="p-0 m-0 ">নাম : {{$lastServiceAmount ? $lastServiceAmount->name : 0}} </h5>
                            <h6 class="p-0 m-0">ঠিকানা: {{$lastServiceAmount ?  $lastServiceAmount->address : 0}} </h5>
                    </div>
                    <div class="col-md-6">
                        <h5 class="p-0 mt-2 m-0 border-bottom">সহকারীর বিস্তারিত :</h5>
                        <h6 class="p-0 m-0 ">নাম :
                            @if ($lastServiceAmount) {{$lastServiceAmount->comrade ? $lastServiceAmount->comrade->c_name : ''}} @endif </h5>
                            <h6 class="p-0 m-0">ঠিকানা :
                                 @if ($lastServiceAmount) {{$lastServiceAmount->comrade ? $lastServiceAmount->comrade->c_phone_no : ''}} @endif </h5>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>সার্ভিস</th>
                                    <th>সার্ভিস বিট</th>
                                    <th>পরিমান </th>
                                    <th>মূল্য</th>
                                    <th>অতিরিক্ত মূল্য</th>
                                    <th>মোট মূল্য </th>
                                </tr>

                            </thead>

                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @if($lasServiceDetails)
                                @foreach($lasServiceDetails as $lastService )
                                <tr>
                                    <td> {{$i}} </td>
                                    <td> {{$lastService->service_name}} </td>
                                    <td> {{$lastService->service_details_name}} </td>
                                    <td> {{$lastService->quantity}} </td>
                                    <td> {{$lastService->price}} </td>
                                    <td> {{$lastService->aditional_price}} </td>
                                    <td> {{$lastService->total_price}} </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


{{-- modal --}}
<div class="modal fade" id="lastRechargeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">সর্বশেষ রিচার্জ-এর ডিটেইলস </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>তারিখ</th>
                                    <th>বিস্তারিত</th>
                                    <th>TXN ID</th>
                                    <th class="text-center">পরিমান </th>
                                </tr>

                            </thead>
{{-- 
                            <tbody>
                                @if($lastCashOut)
                                @foreach($lastCashOut as $lastCash )
                                <tr>
                                    <td>{{date("d-m-Y", strtotime($lastCash->created_at))}}</td>
                                    <td>{{$lastCash->details}}({{$lastCash->type}})</td>
                                    <td>{{$lastCash->trxno}}</td>
                                    <td class="text-center"> <span> @if ($lastCash->status == 'credit') <span
                                                class="label rounded-circle label-success" data-toggle="tooltip"
                                                data-placement="top" title="Credited"><i class="fa fa-plus"></i></span>
                                            @elseif($lastCash->status == 'income') <span
                                                class="label rounded-circle label-warning" data-toggle="tooltip"
                                                data-placement="top" title="Earned">(e)</span> @else <span
                                                class="label rounded-circle label-danger" data-toggle="tooltip"
                                                data-placement="top" title="Debited"><i class="fa fa-minus"></i></span>
                                            @endif
                                        </span> <span
                                            class="@if ($lastCash->status == 'credit') text-success  @elseif ($lastCash->status == 'income') text-warning @else text-danger @endif">{{$lastCash->amount}}/-</span>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4"> No data found</td>
                                </tr>
                                @endif

                            </tbody> --}}
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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