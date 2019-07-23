@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
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
        <div class="col-md-8 offset-md-2">
            <section class="box-typical-section">
                @include('common.flashmessage')
                <form action="{{route('promotion-add')}}"  method="post">
                    @csrf
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text  btn-mm " id="">Enter The Promocode</span>
                        </div>
                        <input type="text" placeholder="xxxxx" minlength="5" maxlength="5" name="promocode" class="form-control">
                        <input type="submit" class="btn btn-mm-border text-mm rounded-0" value="Check">
                        </div>
                </form>
            </section>
        </div>
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

