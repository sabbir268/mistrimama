@extends('layouts.main-dash') 
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
@endsection
 
@section('topbar') 
@extends('comrade.topbar')
@endsection
 
@section('sidebar') 
@extends('comrade.sidebar')
@endsection


@section('content') 
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
        <header class="box-typical-header panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="panel-title pt-1">Services History</h3>
                </div>

                <div class="col-md-6">
                    <form class="site-header-search ">
                        <input type="text" placeholder="Search" />
                        <button type="submit">
                                <span class="font-icon-search"></span>
                            </button>
                        <div class="overlay"></div>
                    </form>
                </div>
            </div>

        </header>
        <div class="box-typical-body panel-body">
            <table class="table">
                <tr>
                    <th>Order Number</th>
                    <th>Orderer</th>
                    <th>Service</th>
                    <th>Area</th>
                    <th>Service Date/Time</th>
                    <th>Comrade</th>
                    <th>Action</th>
                </tr>
                @foreach ($prevOrder as $aloOrd)
                <tr>
                    <td>#{{$aloOrd->order->order_no}}</td>
                    <td>{{$aloOrd->order->user->name}}</td>
                    <td>{{$aloOrd->order->category->name}}</td>
                    <td>{{$aloOrd->order->area}}</td>
                    <td>{{$aloOrd->order->order_date}}/{{$aloOrd->order->order_time}}</td>
                    <td>{{$aloOrd->comrade->c_name}}</td>
                    <td>
                         <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-act-{{$aloOrd->id}}" data-item="{{ $aloOrd->id }}">Details</button>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>
        {{-- <!--.box-typical-body-->
        <header class="box-typical-header panel-heading">
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                              <span class="sr-only">Next</span>
                                            </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </header> --}}
    </section>
    <!--.box-typical-dashboard-->
</div>
@endsection
 
@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>
@endsection