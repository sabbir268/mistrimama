@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">

<style>
    .steps-icon-progress li {
        width: 20% !important;
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
<div class="col-md-12">
<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
             <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption">Name & Phone </div>
                </li>
                <li class="">
                    <div class="icon">
                        <i class="font-icon font-icon-pin-2"></i>
                    </div>
                    <div class="caption">Area & Category</div>
                </li>
                <li class="">
                    <div class="icon">
                        <i class="font-icon font-icon-pin-2"></i>
                    </div>
                    <div class="caption">Services</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-card"></i>
                    </div>
                    <div class="caption">Date & Time</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-check-bird"></i>
                    </div>
                    <div class="caption">Confirmation</div>
                </li>
        </ul>
    </div>

    <header class="steps-numeric-title">Others information</header>
    <form action="{{ route('store-others-info') }}"  method="post" >
    {{csrf_field()}}
    <div class="col-xl-6 offset-md-3 ">
    <div class="form-group row">
        <div class="col-xl-4">
            <label class="form-label">
                <i class="font-icon font-icon-user"></i>
                Name
            </label>
        </div>
        <div class="col-xl-8">
            <div class="input-group">
                <input type="text" name="others_name" placeholder="Name" class="form-control" required>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xl-4">
            <label class="form-label">
                <i class="font-icon font-icon-phone"></i>
                Phone Number
            </label>
        </div>
        <div class="col-xl-8">
            <div class="input-group">
                <input type="text" name="others_phone" placeholder="Phone" class="form-control" required>
            </div>
        </div>
    </div>
</div>
    
    <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button>
    <button type="submit" class="btn btn-rounded float-right">Next →</button>
</form>
</section>
</div>
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
@endsection





