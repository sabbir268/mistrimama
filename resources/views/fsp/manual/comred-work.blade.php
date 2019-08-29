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
					সহকারী (কমরেড) লগ ইন
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/1.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					পসহকারী (কমরেড) কোন অর্ডার পেলে তার নিবন্ধিত নাম্বার-এ উপরোক্ত মেসেজটি দেখা যাবে যেখানে অর্ডারকারীর
					নাম, ফোন নাম্বার এবং ঠিকানা থাকবে

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/2.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সহকারী (কমরেড) মিস্ত্রি মামা একাউন্ট-এ লগ ইন করলে উপরোক্ত স্ক্রিনটি দেখতে পারবেন

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/3.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					স্ক্রিন-এ সার্ভিস-এর বিস্তারিত মূল্য সহ দেখতে পাওয়া যাবে যেখানে “কাজ শুরু করুন” বাটন ক্লিক করে কাজ
					শুরু করুন

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/4.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					স্ক্রিন-এ কাজ শেষ করার পর “কাজ সম্পন্ন করুন” বাটন ক্লিক করে কাজ শেষ করুন

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/5.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					স্ক্রিন-এ কাজ সম্পন্ন করুন বাটন ক্লিক করার পর অর্ডারকারীর টাকা গ্রহণ করে “পেমেন্ট গ্রহণ করুন” বাটন
					সিলেক্ট করুন

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/comrade_order_get_end/6.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						সকল কাজ শেষ হয়ে গেলে সহকারী (কমরেড) তার ড্যাশবোর্ডটি খালি অবস্থায় দেখতে পাবেন
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