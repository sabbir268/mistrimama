@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/profile.min.css')}}">
@endsection

@section('topbar')
@include('comrade.topbar')
@endsection

@section('sidebar')
@include('comrade.sidebar')
@endsection


@section('content')
@if($allowcatedOrders)
<section class="box-typical box-typical-dashboard panel panel-default scrollable">
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">বন্টন কৃত সার্ভিস </h3>
    </header>
    @foreach ($allowcatedOrders as $allord)
    <div class="row">
        <div class="col-md-12">
            {{-- @if($allowcatedOrders) --}}
            {{-- <div class="row">
            </div> --}}
            <div class="row">
                <div class="col-lg-4 col-lg-pull-6 col-md-3 col-sm-6 pl-5 pt-3">
                    <section class="box-typical">
                        <div class="card-header text-center">
                            অর্ডার #{{$allord->order->order_no}}
                        </div>
                        <div class="profile-card">
                            <div class="profile-card-photo">
                                <img style="width: 100% !important;height: 100px;" src="
                                    @if($allord->type == 'self')
                                     {{$allord->user->photo != null ? $allord->user->photo : asset('/dashboard/img/avatar-1-256.png') }}
                                     @else 
                                     {{asset('/dashboard/img/avatar-1-256.png')}}
                                     @endif
                                     " alt="" />
                            </div>
                            <div class="profile-card-name"><strong><i class="fa fa-user text-secondary"></i></strong>
                                {{$allord->order->name}}</div>
                            {{-- <a href="tel:{{$allord->user->phone_no}}" class="text-secondary"><div
                                class="profile-card-status"><strong><i
                                        class="fa fa-phone text-secondary"></i></strong>{{substr($allord->user->phone_no, 3)}}
                            </div></a> --}}
                            <div class="profile-card-status "><strong><i class="fa fa-map text-secondary"></i></strong>
                                {{$allord->user->address}}</div>

                            {{-- <button type="button" class="btn btn-rounded"><i class="fa fa-phone"></i> Call</button> --}}
                        </div>
                        <!--.profile-card-->

                        <div class="profile-statistic tbl">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <b>0</b>
                                    সার্ভিস নিয়েছে
                                </div>
                                <div class="tbl-cell">
                                    <b>5 <i class="font-icon font-icon-star text-secondary"></i> </b>
                                    গড় রেটিং
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--.box-typical-->
                </div>
                <!--.col- -->
                <div class="col-md-8">
                    <section class="box-typical-section">
                        <div class="col-md-12 p-0 pb-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn btn-mm btn-sm col-md-12 d-none">নতুন সার্ভিস যোগ করুন </button>
                                </div>
                                <div class="col-md-6">                        
                                        <a href="{{route('comrade.cancel-order',$allord->order->id)}}" class="btn btn-danger col-md-12">অর্ডার বাতিল করুন</a>
                                </div>

                            </div>
                        </div>
                        <div class="card mb-3" style="height: 250px;overflow: auto;">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>সার্ভিস</th>
                                        <th>মূল্য</th>
                                        <th>অতিরিক্ত </th>
                                        <th>পরিমান </th>
                                        <th>মোট </th>
                                        <th class="text-center">একশন </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allord->order->bookings as $booking)
                                    <tr>
                                        <td class="text-left">
                                            {{$booking->service_name}}({{$booking->service_details_name}})</td>
                                        <td>{{$booking->price}}</td>
                                        <td>{{$booking->aditional_price}}</td>
                                        <td>{{$booking->quantity}}</td>
                                        <td>{{$booking->total_price}}</td>
                                        <td>
                                            @if($allord->order->status > 1)
                                            <button class="btn btn-rounded btn-sm
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

                                <tfoot>
                                </tfoot>
                            </table>

                        </div>
                        <div class="col-md-12 p-0 pb-2">
                            @if ($allord)
                            <form action="{{route('service-update-sts')}}" method="post">
                                @csrf
                                <!-- -->
                                <input type="text" value="{{$allord->order->id}}" name="order_id" hidden>
                                <input type="text" value="{{$allord->id}}" name="s_sys_id" hidden>
                                @switch($allord->order->status)
                                @case(1)
                                <input type="text" value="2" name="status" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">কাজ শুরু করুন
                                </button> @break
                                @case(2)
                                <input type="text" value="3" name="status" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">কাজ সম্পন্ন করুন
                                </button>
                                @break
                                @case(3)
                                @if($allord->type == 'self')
                                <button disabled="disabled" class="btn btn-warning" style="width:100%">পেমেন্ট এর জন্য
                                    অপেক্ষা করুন </button>

                                @else
                                <input type="text" value="5" name="status" hidden>
                                <input type="text"
                                    value="{{ (($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)  }}"
                                    name="amount" hidden>
                                <input type="text" value="{{$allord->service_provider_id}}" name="service_provider_id"
                                    hidden>
                                <input type="text" value="{{$allord->user_id}}" name="client_id" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন করুন
                                </button>
                                @endif
                                @break
                                @case(4)
                                <ul class="list-group mb-2">
                                    <li class="list-group-item p-0 m-0 border-0 ">কাস্টমার প্রদান করছেন : <span
                                            class="invisible">1232</span>
                                        <strong>{{ (($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)  }}
                                            টাকা </strong></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> কাস্টমারের ডিসকাউন্ট :
                                        <strong>{{$sumOrder->disc  }} টাকা</strong></li>
                                    <li class="list-group-item p-0 m-0"></li>
                                    <li class="list-group-item p-0 m-0 border-0 "> আপনার ইনকাম : <span
                                            class="invisible">123s2</span>
                                        <strong>{{(($sumOrder->total_price + $sumOrder->extra_price) ) }} টাকা</strong>
                                    </li>
                                </ul>
                                <input type="text" value="5" name="status" hidden>
                                <input type="text"
                                    value="{{ (($sumOrder->total_price + $sumOrder->extra_price) - $sumOrder->disc)  }}"
                                    name="amount" hidden>
                                <input type="text" value="{{$allord->service_provider_id}}" name="service_provider_id"
                                    hidden>
                                <input type="text" value="{{$allord->user_id}}" name="client_id" hidden>
                                <button type="submit" class="btn  btn-success" style="width:100%">পেমেন্ট গ্রহন করুন
                                </button>
                                @break
                                @default
                                <input type="text" value="" name="status" hidden> @endswitch
                            </form>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
@else
<section>
    <header class="box-typical-header panel-heading pt-2 pb-2 text-center">
        <h3 class="panel-header m-0">এই মূহুর্তে কোনো সার্ভিস বরাদ্দ নেই।</h3>
    </header>
</section>
@endif

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>


<script>
    $(document).ready(function() {

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

        // $('#cancel_order').submit(function(e){
        //     e.preventDefault();
        //     $confirm = confirm("Sure to cancel this order?")
            
        //     if($confirm){
        //         $('#cancel_order').submit();
        //     }else{
        //         location.reload();
        //     }

        // });

        
      });
</script>
@endsection