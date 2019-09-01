@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">
@endsection

@if(Auth::check())
@section('topbar')
@include('user.topbar')
@endsection
@endif

@if(Auth::check())
@section('sidebar')
@include('user.sidebar')
@endsection
@endif


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

    <header class="steps-numeric-title">All Services</header>
    <section class="bg-white rounde  ">
        <header class="col-md-10 offset-md-1 card-header bg-light">Total: <span class="grand_total" id="grand_total">0.00</span>৳</header>
        <div class="col-md-10 offset-md-1 p-1 border" style="height:280px;overflow-y: scroll;">
            @foreach($Sub_categories as $data)

            @csrf
            <div class="card mb-1 pl-3">
                <div class="card-body ">
                    <input type="hidden" name="ID" value="{{$data->id}}">
                    <div class="row">
                        <div class="col-md-8">
                            <div style="cursor:pointer" class="row pt-0 pm-0" data-toggle="collapse" data-target="#collapsePanel{{$data->id}}" aria-expanded="false" aria-controls="collapseExample">
                                <h5 class="mb-0"> <span class="rounded-circle  text-mm  "><i class="fa fa-cube"></i></span> {{$data->name}}</h5>
                            </div>
                        </div>
                        <div class="col-md-4 text-center pt-2">
                            <span style="cursor :pointer" class="bg-mm pl-3 pr-3 pt-1 pb-1 text-white ml-3 rounded addRemove" data-id="{{$data->id}}" id="addRemove{{$data->id}}">ADD</span>
                        </div>
                    </div>
                    <div class="row collapse mb-0 text-left" id="collapsePanel{{$data->id}}">
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </section>

    <button type="button" class="btn btn-rounded float-left btn-mm "> <a href="{{route('book.first')}}" class="text-white">←
    Back</a></button> 
    <button type="button" id="dateTime" class="btn btn-rounded float-right btn-mm"> <a href="#" class="text-white"> Next →</a></button>

</section>
<div id="showModal">

</div>
@endsection





@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>

<script>
    $('.addRemove').click(function() {
        $id = $(this).data('id');
        $.ajax({
            url: "{{route('add.sub-service-details')}}",
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "id": $id
            },
            dataType: 'html',
            success: function(response) {
                $('#showModal').html(response);
                $('#exampleModal').modal({
                    show: true,
                    backdrop: 'static',
                    keyboard: false
                    });
                
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