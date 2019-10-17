@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">
@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection

@section('content')

<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Category</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Review</div>
            </li>
            <li>
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-card"></i>
                </div>
                <div class="caption">Date & Time</div>
            </li>
            <li>
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-check-bird"></i>
                </div>
                <div class="caption">Confirmation</div>
            </li>
        </ul>
    </div>

    {{-- <header class="steps-numeric-title">Services Review</header> --}}
    <section class="bg-white rounde  ">
        <header class="col-md-10 offset-md-1 card-header bg-light">
            <div class="row">
                <div class="col-md-6">
                    <span class="float-left"><b>Selected Services</b></span>
                </div>
                <div class="col-md-6">
                    <span class="float-right">Total: <span class="grand_total"
                            id="grand_total">{{$totalPrice}}</span>৳</span>
                </div>
            </div>
        </header>
        <div class="col-md-10 offset-md-1 p-1 border" style="height:280px;overflow-y: scroll;">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th>সার্ভিস</th>
                        <th>ইউনিট চার্জ</th>
                        <th>অতিঃ ইউনিট চার্জ</th>
                        <th>পরিমান</th>
                        <th>মোট</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($addedService as $booking)
                    <tr>
                        <td class="text-left">
                            {{$booking->service_name}}({{$booking->service_details_name}})</td>
                        <td>
                            {{-- <input data-id="{{$booking->id}}" type="text" style="width:80%"
                                class="text-center form-control form-control-sm qty_price" value="{{$booking->price}}"
                                id=""> --}}

                                {{$booking->price}}
                        </td>
                        <td>
                            {{-- <input data-id="{{$booking->id}}" type="text" style="width:60%"
                                class="text-center form-control form-control-sm qty_price"
                                value="{{ $booking->quantity > 1 ? $booking->aditional_price : 0}}" id=""> --}}
                                {{ $booking->quantity > 1 ? $booking->aditional_price : 0}}
                        </td>
                        <td>
                            {{-- <input type="text" style="width:50%" class="text-center form-control form-control-sm"
                                value="{{$booking->quantity}}" id=""> --}}
                                {{$booking->quantity}}
                        </td>
                        <td>
                            <input min="30" data-id="{{$booking->id}}" type="text" style="width:90%"
                                class="text-center form-control form-control-sm total_price"
                                value="{{$booking->total_price}}" id="">
                                <span style="display:none" class="text-danger alert-{{$booking->id}}">Minimum price shoulbe BDT 30/-</span>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                </tfoot>
            </table>
        </div>
    </section>

    {{-- <button type="button" class="btn btn-rounded float-left btn-mm "> <a href="{{route('book-self')}}"
    class="text-white">←
    Back</a></button> --}}
    <button type="button" id="dateTime" class="btn btn-rounded float-right btn-mm"> <a href="#" class="text-white"> Next
            →</a></button>

</section>


<div id="showModal">

</div>
@endsection





@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>

<script>
    $('.total_price').keyup(function(){
        $id  = $(this).data('id');
        $price = $(this).val();
        if($price < 30){
            $('.alert-'+$id).show();
        }else{
            $('.alert-'+$id).hide();
        }
        $.ajax({
            url: "{{route('service.price.change')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $id,
                "price": $price
            },
            dataType: 'html',
            success: function(response) {
              console.log(response);
            }
        });
    }); 

    $('#dateTime').click(function() {
        if($('#grand_total').html() == '0.00' || $('#grand_total').html() == '' || $('#grand_total').html() == '0'){
            alert('Select service first!');
        }else{
            window.location.href = "{{route('date.time')}}";
        }
    });

    

    // window.onbeforeunload = function(event)
    // {
    //     return confirm("Confirm refresh");
    // }
</script>
@endsection