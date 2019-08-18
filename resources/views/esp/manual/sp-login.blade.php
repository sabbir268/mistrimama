@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection

@section('content')
<div class="row">
	<div class="col-md-11 ml-5 bg-white">
		<div class="row">
			<div class="col-md-12 text-center">
				<h3 class="m-auto p-2 pt-5">
					সার্ভিস পার্টনার লগ ইন
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%" src="{{asset('images/manuals/sp_login/1.png')}}"
					alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					প্রথমে আপনার মোবাইল থেকে “গুগল ক্রোম” ব্রাউজারটি সিলেক্ট করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%" src="{{asset('images/manuals/sp_login/2.png')}}"
					alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					“গুগল ক্রোম” ব্রাউজার ওপেন করে URL বক্স-এ mistrimama.com/sp লিখাটি টাইপ করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%" src="{{asset('images/manuals/sp_login/3.png')}}"
					alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					লগ ইন পোর্টালে নির্দিষ্ট জায়গায় আইডি এবং পাসওয়ার্ড টাইপ করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%" src="{{asset('images/manuals/sp_login/4.png')}}"
					alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					লগ ইন পোর্টাল থেকে “সার্ভিস পার্টনার” সিলেক্ট করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%" src="{{asset('images/manuals/sp_login/5.png')}}"
					alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					লগ ইন করার পর সার্ভিস পার্টনাররা এই ড্যাশবোর্ডটি দেখতে পারবেন
				</h4>
			</div>
		</div>
	</div>
</div>
<!--.row-->

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