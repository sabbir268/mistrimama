@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/profile.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection

@section('content')
<div class="col-md-12 bg-white box-typical">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
    <div class="row">
        @if ($activeOrders)
        <div class="col-lg-4 col-lg-pull-6 col-md-3 col-sm-6 pt-3">
            <section class="box-typical">

                @if ($activeOrders->status == 0)
                <p class="p-5">Your order has been place. Wait for confirmation.</p>
                @endif

                @if ($activeOrders->status > 0)
                @if($activeOrders->serviceSystem->first()->comrade)
                @if ($activeOrders->status >= 1)
                <div class="profile-card">
                    <div class="profile-card-photo">
                        <img style="width: 100% !important;height: 100px;"
                            src="{{asset('uploads/SP')}}/{{$activeOrders->serviceSystem->first()->comrade->c_pic}}"
                            alt="" />
                    </div>
                    <div class="profile-card-name">{{$activeOrders->serviceSystem->first()->comrade->c_name}}</div>
                    <div class="profile-card-status">{{$activeOrders->serviceSystem->first()->comrade->c_phone_no}}
                    </div>

                    <button type="button" class="btn btn-rounded btn-mm"><i class="fa fa-phone"></i> Call</button>
                </div>
                <!--.profile-card-->

                <div class="profile-statistic tbl">
                    <div class="tbl-row">
                        <div class="tbl-cell">
                            <b>0</b>
                            Job Complete
                        </div>
                        <div class="tbl-cell">
                            <b>5 <i class="font-icon font-icon-star text-secondary"></i> </b>
                            Avarage Ratings
                        </div>
                    </div>
                </div>
                @endif

                @else
                <p class="p-5">ORDER HAS BEEN ACCEPTED , A COMRADE WILL ALLOCATED SOON!</p>
                @endif
                @endif

            </section>
            <!--.box-typical-->

            @if ($activeOrders->status == '0' || $activeOrders->status == '1')
            <form action="{{route('order.cancel')}}" method="POST">
                @csrf
                <input type="text" name="id" value="{{$activeOrders->id}}" hidden>
                <button class="btn btn-danger col-md-12">Cancel Order</button>
            </form>
            @endif
        </div>
        <!--.col- -->
        <div class="col-md-8">
            <section class="box-typical-section">
                @if ($activeOrders->status == 0)
                <div class="alert alert-success alert-fill alert-border-left show" role="alert">
                    Your order has been place. Wait for confirmation.
                </div>
                @endif
                @if ($activeOrders->status > 0)
                @if($activeOrders->serviceSystem->first()->comrade)
                @if ($activeOrders->status == 1)
                <div class="alert alert-purple alert-fill alert-border-left show" role="alert">
                    <strong>Bingoo!</strong> Your order has been accepted. And Comrade on the way.
                </div>
                @endif

                @if ($activeOrders->status == 2)
                <div class="alert alert-warning alert-fill alert-border-left show" role="alert">
                    <strong>{{$activeOrders->serviceSystem->first()->comrade->c_name}}</strong> start your service/work.
                </div>
                @endif

                @if ($activeOrders->status == 3)
                <div class="alert alert-info alert-fill alert-border-left show" role="alert">
                    <strong>{{$activeOrders->serviceSystem->first()->comrade->c_name}}</strong> finish your work.
                    <b>Waiting for payment.</b>
                </div>
                @endif

                @else
                <div class="alert alert-success alert-fill alert-border-left show" role="alert">
                    ORDER HAS BEEN ACCEPTED , A COMRADE WILL ALLOCATED SOON!
                </div>
                @endif
                @endif


                <div class="card">
                    <table class="table  text-center">
                        <thead class="bg-mm-light">
                            <tr>
                                <th class="bg-mm-light-force">Service</th>
                                <th class="bg-mm-light-force">Price</th>
                                <th class="bg-mm-light-force">Quantity</th>
                                <th class="bg-mm-light-force">Total </th>
                                <th class="text-center bg-mm-light-force">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($activeOrders->bookings as $booking)
                            <tr>
                                <td class="text-left">{{$booking->service_name}}-{{$booking->service_details_name}}</td>
                                <td>{{$booking->price}}</td>
                                <td class="text-center">{{$booking->quantity}}</td>
                                <td class="text-right">{{$booking->total_price}}</td>
                                <td class="text-center">
                                    @if(count($activeOrders->bookings) > 1)
                                    <a href="{{url('user/remove-sub')}}/{{$booking->id}}"
                                        class="btn btn-sm btn-danger "><i class="fa fa-times"></i></a>
                                    @else
                                    -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            <tr class="bg-mm-light">
                                <td colspan="2" class="text-right">Total Quantity/Price</td>
                                <td>{{$sumOrder->first()->total_quantity}}</td>
                                <td colspan="1" class="text-right">{{$sumOrder->first()->total_price}}</td>
                                <td colspan="" class="text-left"></td>
                            </tr>
                            <tr class="bg-mm-light">
                                <td colspan="2" class="text-right">Extra Charge</td>
                                <td colspan="2" class="text-right">{{$activeOrders->extra_charge}} </td>
                                <td colspan="" class="text-left"></td>
                            </tr>
                            <tr class="bg-mm-light">
                                <td colspan="2" class="text-right">Total Amount</td>
                                <td colspan="2" class="text-right">
                                    <strong>{{ $sumOrder->first()->total_price + $activeOrders->extra_charge}}</strong>
                                </td>
                                <td colspan="" class="text-left"></td>
                            </tr>
                            @if(promocheck(auth()->user()->id , $sumOrder->first()->total_price) > 0 )
                            <tr class="bg-mm-light">
                                <td colspan="2" class="text-right">Discount (promo)</td>
                                <td colspan="2" class="text-right">
                                    {{promocheck(auth()->user()->id , $sumOrder->first()->total_price)}}</td>
                                <td colspan="" class="text-left"></td>
                            </tr>
                            @endif
                            <tr class="bg-mm-light">
                                <td colspan="2" class="text-right"> <strong> Net Payable</strong></td>
                                <td colspan="2" class="text-right">
                                    <strong>{{ (($sumOrder->first()->total_price + $activeOrders->extra_charge) - promocheck(auth()->user()->id , $sumOrder->first()->total_price)) }}</strong>
                                </td>
                                <td colspan="" class="text-left"></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </section>
        </div>
    </div>
</div>

{{-- modals --}}
{{-- 
<div class="modal fade" id="addNew" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="{{ route('service_provider_allocate') }}">
{{csrf_field()}}
<input type="hidden" name="order_id" value="{{$activeOrders->id}}" />
<div class="modal-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="email">Sub Services:</label>
                    <select class="form-control" name="sub_service_id" required="required">
                        <option value="">Select Service</option>
                        @foreach ($subServices as $service)
                        <option value="{{$service->id}}">{{$service->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Quantity:</label>
                    <input type="text" class="form-control" name="qty">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-primary">Add</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</form>
</div>

</div>
</div> --}}
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script>
    $('#date_of_birth').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});

</script>
@endsection