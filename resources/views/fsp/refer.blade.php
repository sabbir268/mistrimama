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
                    <div class="tbl-cell pb-0">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="">
                                        <div class="title">ব্যালেন্স</div>
                                        <div class="amount-sm">উত্তোলনযোগ্য  ৳{{$balance > 500 ? $balance - 500 : 0}}/- </div>
                                    </div>
                                </div>
                                <div class="tbl-cell">
                                    <div class="col-md-4">
                                        <header> <strong>৳&nbsp;{{$balance}}/- </strong> </header>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" data-toggle="modal" data-target="@if($balance <= 1000) #amount_withdraw @else # @endif"
                            style="width:100%"
                            class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 @if($balance < 999) disabled @endif ">ক্যাশ আউট করুন </a>
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
                            class="btn btn-sm btn-inline btn-mm-outline text-mm mt-2 @if($rp < 3999 ) disabled @endif ">ক্যাশে পরিবর্তন করুন </a>
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
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                শেয়ার রেফারেল কোড / লিংক 
            </div>
            <div class="card-body">
                <div class="col-md-4 offset-md-4 bg-light text-success p-4 border rounded">
                    <span class="font-weight-bold">{{$refcode}}</span>
                </div>
                <div class="input-group mb-2 mt-3">
                    <input type="text" id="ref-link" style="color: #fff !important;"
                        class="form-control bg-secondary border-secondary text-white"
                        value="{{asset('/order/refer/')}}/{{$refcode}}" aria-describedby="basic-addon2" readonly>
                    <div class="input-group-append">
                        <span class="btn btn-secondary-outline" id="copyReflink">Copy</span>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-10 offset-md-1">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{asset('/order/refer/')}}/{{$refcode}}" target="_blank" class="btn btn-primary"><i class="fa fa-facebook"></i> Share on Facebook</a>
                        <a href="https://twitter.com/intent/tweet?text={{asset('/order/refer/')}}/{{$refcode}}" target="_blank"  class="btn btn-primary"><i class="fa fa-twitter"></i> Share on Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--.col-->
    <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    শীর্ষ রেফারার
                </div>
                <div class="card-body">
                    <div class="p-2 text-center">
                        <div style="height:100px" class="col-md-4 border rounded d-inline-block ">
                            <img src="{{asset('dashboard/img/newlogokom.png')}}" style="height:80px;width:80px" alt="Image">
                        </div>
                        <br>
                        <h3> @if ($topRferer != null)
                            {{$topRferer->name}}
                            @else
                            কোন রেফারার এখন বিদ্যমান নেই
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
    
            <div class="card">
                <div class="card-header">
                    পূর্বের রেফার সমূহ
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>তারিখ</th>
                                <th>বিস্তারিত</th>
                                <th>রিওয়ার্ড পয়েন্ট</th>
                                <th>অবস্থা</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($referHistory != null)
                                @foreach ($referHistory as $refhis)
                                <tr>
                                    <td>{{$refhis->created_at}}</td>
                                    <td>{{$refhis->details}}</td>
                                    <td>{{$refhis->rp}}</td>
                                    <td>{{$refhis->status}}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
    
        </div>
    <!--.col-->
</div>
<!--.row-->


@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).val()).select();
        document.execCommand("copy");
        $temp.remove();
    }

    $(document).ready(function() {
           $('#copyReflink').click(function(){
             copyToClipboard('#ref-link');
             $(this).text('Copied');
           });
    });

</script>
@endsection