@extends('admin.cms.template') 
@section('body')

<h1 class="page-title">Booking
    <small></small>
    <!--    <a href="{{ route('cms.create') }}" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg) @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
        @endif @endforeach

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>New Booking ({{ count($newOrders) }})</div>
            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Order No</th>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th class="align-center">View</th>
                            <th class="align-center">Action </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($newOrders)
                        @foreach ($newOrders as $order)
                        <tr>
                            <td>{{ $order->order_no }}</td>
                            <td>{{ $order->user ? $order->user->name : '-' }}</td>
                            <td>{{ $order->user ? $order->user->phone_no : '-' }}</td>
                            <td>{{ $order->user ? $order->user->address : '-' }}</td>
                            <td>{{ $order->area }}</td>
                            <td>{{ $order->category->name }}</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->order_time }}</td>
                            <td class="align-center"><a class="btn btn-primary" data-toggle="modal" data-target="#view-{{$order->id}}" data-item="{{ $order->id }}">
                                        View Details
                                    </a>
                            </td>
                            <td class="align-center">
                                @if ($order->status == '0')
                                <a class="btn btn-primary" data-toggle="modal" data-target="#myModal-{{$order->id}}" data-item="{{ $order->id }}" @if ($order->status == '4')
                                disabled="disabled"
                                    @endif >
                                    Allocate Service Provider
                                </a> @else
                                <a class="btn btn-primary" disabled="disabled">
                                        Allocated
                                    </a> @endif
                            </td>
                            <td class="align-center">
                                @if ($order->status != '5')
                                <button type="button" class="btn btn-warning" disabled="disabled">Not Complete </button>                                @endif @if ($order->status == '5')
                                <button type="button" class="btn btn-success" disabled="disabled">Job Completed </button>                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                {{-- {!! $newOrders->appends(Input::except('page'))->render() !!} --}}
                {{-- {{$newOrders->links()}} --}}
                @endif
            </div>
        </div>
    </div>
</div>



<div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cogs"></i>Ongoing Booking ({{ count($ongoingOrder) }})</div>
        </div>


        <div class="portlet-body flip-scroll">
            <table class="table table-bordered table-striped table-condensed flip-content">
                <thead class="flip-content">
                    <tr>
                        <th>Order No</th>
                        <th>Category</th>
                        <th>Client Name</th>
                        <th>Client Phone</th>
                        <th>Date/Time</th>
                        <th>Providers</th>
                        <th>Providers Phone</th>
                        <th>Comrade</th>
                        <th>Comrade Phone</th>
                        <th class="align-center">View</th>
                        <th class="align-center">Status </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($ongoingOrder)
                    @foreach ($ongoingOrder as $actorder)
                    @if($actorder->order)
                    <tr>
                        <td>{{$actorder->order ? $actorder->order->order_no : '' }}</td>
                        <td>{{$actorder->order ? $actorder->order->category->name : '' }}</td>
                        <td>{{$actorder->user ? $actorder->user->name : '' }}</td>
                        <td>{{$actorder->user ? $actorder->user->phone_no : '' }}</td>
                        <td>{{$actorder->order ? $actorder->order->order_date : '' }}/{{ $actorder->order ? $actorder->order->order_time : '' }}</td>
                        <td>{{$actorder->provider ? $actorder->provider->name : '' }}</td>
                        <td>{{$actorder->provider ? $actorder->provider->phone_no : '' }}</td>
                        <td>{{ $actorder->comrade ? $actorder->comrade->c_name : '' }}</td>
                        <td>{{ $actorder->comrade ? $actorder->comrade->c_phone_no : '' }}</td>
                        <td class="align-center"><a class="btn btn-primary" data-toggle="modal" data-target="#view-act-{{$actorder->id}}" data-item="{{ $actorder->id }}">
                                    View Details
                                </a>
                        </td>
                        <td class="align-center">
                                
                                @if($actorder->order->status == 1)
                                <span class="text-warning">Comrade On The way</span>
                                @endif  
                                @if($actorder->order->status == 2)
                                        <span class="text-danger">Comrade working on service.</span>
                                @endif
                                @if($actorder->order->status == 3)
                                        <span class="text-success">Comrade has finish his job. And witing for payment.</span>
                                @endif
                                
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $actorder->appends(Input::except('page'))->render() !!} --}}
            {{-- {{$actorder->links()}} --}}
            
            @endif
        </div>
    </div>
</div>
</div>


@if ($newOrders)
@foreach ($newOrders as $order)
<div class="modal fade" id="myModal-{{$order->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
                {{csrf_field()}}
                <input type="hidden" name="order_id" value="{{$order->id}}" />
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="service_provider_id" required="required">
                                        <option value="">Select provider</option>
                                        @foreach ($service_providers as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label>
                                    <input type="hidden" class="form-control" name="user_id" value="{{ $order->user ? $order->user->id : '-' }}"  >
                                    <input type="text" class="form-control" name="user_name" value="{{ $order->user ? $order->user->name : '-' }}" readonly >
                                    {{-- <select class="form-control" name="user_id" readonly>
                                        <option value=""></option>
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" >Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
@endforeach

 {{-- -------------- --}}

@foreach ($newOrders as $order)
<div class="modal fade" id="view-{{$order->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
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
                <button type="submit" class="btn btn-primary">Allocate</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
@endforeach
@endif


@if ($ongoingOrder)
@foreach ($ongoingOrder as $actOrder)
@if($actOrder->order)
<div class="modal fade" id="view-act-{{$actOrder->id}}" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Order Details</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="card-header col-md-6">
                                            <u><strong><span class="m-0 typical-header">Client Info</span></strong></u><br>
                                        Name:<strong>{{$actOrder->order->name ? $actOrder->order->name : "-"}}</strong><br> Phone:
                                        <strong>{{$actOrder->order->phone ? $actOrder->order->phone : "-"}}</strong><br>
                                        Area: <strong>{{$actOrder->order->area ? $actOrder->order->area : "-" }}</strong><br>
                                        Address: <strong>{{$actOrder->order->address ? $actOrder->order->address : "-"}}</strong>
                                    </div>
                                    <div class="card-header col-md-6">
                                            <u><strong><span class="m-0 typical-header">Provider Info</span></strong></u><br>
                                            Name:<strong>{{$actOrder->provider ? $actOrder->provider->name : ''}}</strong><br> Phone:
                                            <strong>{{$actOrder->provider ? $actOrder->provider->phone_no : ''}}</strong>
                                            <br>
                                            <u><strong><span class="m-0 typical-header">Comrade Info</span></strong></u><br>
                                            Name:<strong>{{ $actOrder->comrade ? $actOrder->comrade->c_name : ''}}</strong><br> Phone:
                                            <strong>{{ $actOrder->comrade ?  $actOrder->comrade->c_phone_no : ''}}</strong>
                                        </div>
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($actOrder->order->bookings as $booking)
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
    
        </div>
    </div>
    @endif
@endforeach
@endif
@endsection