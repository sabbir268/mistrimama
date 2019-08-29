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
					সার্ভিস পার্টনার নিজের কাজ অর্ডার করার নিয়ম
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/1.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সার্ভিস পার্টনার ড্যাশবোর্ড-এ গিয়ে বাম পাশের মেন্যু অপশন থেকে সার্ভিস অর্ডার সিলেক্ট করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/2.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সার্ভিস অর্ডার সিলেক্ট করার পর উপরোক্ত স্ক্রিন-টি দেখতে পারবেন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/3.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সিলেক্ট সার্ভিস অপশন থেকে আপনার নিবন্ধিত সার্ভিস ক্যাটাগরি সিলেক্ট করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/4.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সার্ভিস ক্যাটাগরি সিলেক্ট করার পর সাব সার্ভিস গুলো দেখতে পারবেন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/5.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সাব সার্ভিস গুলোর পরিমান গুলো এখান থেকে বাড়িয়ে অথবা কমিয়ে নিতে পারবেন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/6.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সার্ভিস সিলেক্ট এর পর এখন "NEXT“ বাটনে ক্লিক করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/7.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					এখান থেকে সার্ভিস প্রদানের তারিখ এবং সময় সিলেক্ট করে “NEXT” বাটনে ক্লিক করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/8.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					উপরোক্ত স্ক্রিনে কাস্টমারের নাম, ফোন নাম্বার এবং ঠিকানা লিখুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_self_order/9.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সবশেষে সহকর্মী যোগ করে এবং প্রয়োজনীয় তথ্য পূরণ করে “Finish” বাটনে ক্লিক করে অর্ডার সম্পন্ন করুন
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