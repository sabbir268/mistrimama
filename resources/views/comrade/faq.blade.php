@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">

@endsection

@section('topbar')
@include('comrade.topbar')
@endsection

@section('sidebar')
@include('comrade.sidebar')
@endsection


@section('content')
<section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">

    @foreach ($faqs as $faq)
        <article class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$faq->id}}" aria-expanded="true"
                    aria-controls="collapse{{$faq->id}}">
                    {{$faq->question}}
                    <i class="font-icon font-icon-arrow-down"></i>
                </a>
            </div>
            <div id="collapse{{$faq->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-collapse-in"> 
                    <div class="user-card-row">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <ul class="list-group">
                                    {!! $faq->answer !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    @endforeach
</section>
<!--.widget-accordion-->
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


@endsection