@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/lobipanel/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/separate/vendor/lobipanel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/lib/jqueryui/jquery-ui.min.css')}}">
<link rel="stylesheet" href="{{asset('css/separate/pages/widgets.min.css')}}">
@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection


@section('content')
<div class="col-md-12">
    <section class="box-typical box-typical-dashboard panel panel-default scrollable">
        <header class="box-typical-header panel-heading">
            <h3 class="panel-title pt-1"> Services History</h3>
        </header>
        <div class="box-typical-body m-1">
            <table class="table table-bordered">
                <thead class="bg-mm-light">
                    <tr>
                        <th class="bg-mm-light">
                            <div>Sl.</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Orders#</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Services</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Charge</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Extra Charge</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Total Amount</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Date</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Time</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Order Place Time </div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Service Provider</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Comrade</div>
                        </th>
                        <th class="bg-mm-light">
                            <div>Status</div>
                        </th>
                    </tr>
                </thead>
                <tr>

                </tr>
                <?php $i = 1 ?>
                @foreach ($orders as $order )
                <tr>
                    <td>
                        <div>{{$i}} </div>
                    </td>
                    <td>
                        <div>{{$order->orders_no}}</div>
                    </td>
                    <td>
                        <div>
                            <button data-toggle="modal" data-target="#orderDetailsModal{{$order->id}}"
                                class="btn btn-success btn-sm">View Details</button>
                        </div>
                    </td>
                    <td>
                        <div>BDT {{$order->total_price}}</div>
                    </td>
                    <td>
                        <div>BDT {{$order->extra_charge}}</div>
                    </td>
                    <td>
                        <div>BDT {{$order->total_price + $order->extra_charge}}</div>
                    </td>
                    <td>
                        <div>{{date('d-m-Y',strtotime($order->order_date))}}</div>
                    </td>
                    <td>
                        <div>{{$order->order_time}}</div>
                    </td>
                    <td>
                        <div>
                            {{date('d-m-Y',strtotime(explode(' ',$order->orders_place_time)[0]))}}/{{explode(' ',$order->orders_place_time)[1]}}
                        </div>
                    </td>
                    <td>
                        <div>{{ $order->provider ? $order->provider->name : '-'}}</div>
                    </td>
                    <td>
                        <div>{{$order->comrade ? $order->comrade->c_name : '-'}}</div>
                    </td>
                    <td>
                        <div class="text-{{$order->status == 'cancel' ? 'danger': 'success'}}">
                            {{$order->status == 'cancel' ? 'Cancel': 'Success'}}</div>
                    </td>
                    <?php $i++ ?>
                </tr>
                @endforeach

            </table>
            {{ $orders->links() }}
        </div>
        <!--.box-typical-body-->
    </section>
    <!--.box-typical-dashboard-->
</div>

@foreach ($orders as $order )
<div class="modal fade" id="orderDetailsModal{{$order->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table p-0 m-0">
                    <thead class="bg-mm-light">
                        <tr>
                            <td>Service</td>
                            <td>Quantity</td>
                            <td>Price</td>
                            <td>Adition Price</td>
                            <td>Total Price</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $services = $order->bookings()->get() ?>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->service_name}} - {{$service->service_details_name}} </td>
                            <td>{{$service->quantity}}</td>
                            <td>{{$service->price}}</td>
                            <td>{{$service->quantity > 1 ? $service->aditional_price : 0}}</td>
                            <td>{{$service->total_price}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="http://www.gstatic.com/charts/loader.js"></script>

<script>
    $(document).ready(function() {
            $('.panel').each(function () {
                try {
                    $(this).lobiPanel({
                        sortable: true
                    }).on('dragged.lobiPanel', function(ev, lobiPanel){
                        $('.dahsboard-column').matchHeight();
                    });
                } catch (err) {}
            });
</script>
@endsection