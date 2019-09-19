@if(count($newOrders) != 0)
<table class="table table-bordered">
    <thead>
        <tr>
            <th>
                <div>অর্ডার নং #</div>
            </th>
            <th>
                <div> সার্ভিস </div>
            </th>
            <th>
                <div>এলাকা </div>
            </th>
            <th>
                <div>সময় </div>
            </th>
            <th>
                <div> বিস্তারিত </div>
            </th>
            <th>
                <div> একশন </div>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($newOrders as $order)
        <tr>
            <td>{{$order->order_no}}</td>
            <td>{{$order->category->name}}</td>
            <td>{{$order->area}}</td>
            <td>{{$order->order_date}}/{{$order->order_time}}</td>
            <td> <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#view-{{$order->id}}"
                    data-item="{{ $order->id }}">বিস্তারিত</button>
            </td>
            <td>
                @if(auth()->user()->serviceProvider->first()->type == 0)
                    @if($order->status == '0')
                        <button class="btn btn-sm btn-mm" data-toggle="modal" data-target="#allocate-{{$order->id}}"
                            data-item="{{ $order->id }}">সহকারী</button> @else
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#allocate-{{$order->id}}"
                            data-item="{{ $order->id }}" disabled>এলোকেটেড</button> 
                    @endif
                @else 
                        {{-- sabbir --}}
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@else
<div class="card-body col-md-12 text-secodary text-center p-5  p-auto">No Order avaiable</div>
@endif

<!-- Modals section for allocate order and view details order -->
@if ($newOrders)
@foreach ($newOrders as $order)
<div class="modal fade" id="view-{{$order->id}}" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4>
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
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
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
                    data-item="{{ $order->id }}" class="btn btn-mm">Allocate</button>
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
                <h4 class="modal-title">সহকারী নির্বাচন করুন</h4>
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
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="comrade_id" required="required">
                                        <option value="">Select Comrade</option>
                                        @foreach ($comrades as $comrade)
                                        <option value="{{$comrade->id}}">{{$comrade->c_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label> <strong>
                                        {{ $order->user ? $order->user->name : $order->name }}
                                       </strong> 
                                    <input type="text" name="user_id"
                                        value="{{ $order->user ? $order->user->id : '-' }}" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-mm">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endforeach
@endif