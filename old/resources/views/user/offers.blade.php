@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">

<style>
    .card-header {
        border-bottom-color: #fac11d;
    }

    .card {
        border-color: #fac11d;
    }

</style>
@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection

@section('content')
<div class="col-md-12 bg-white box-typical">
    <div class="row p-3">
        @foreach ($offers as $offer)
        <div class="card col-md-12">
            <div class="card-header">
                {{$offer->header}}
            </div>
            <div class="card-body">
                <p>
                    {{$offer->details}}
                </p>
            </div>
        </div>
        @endforeach
    </div>
</div>
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