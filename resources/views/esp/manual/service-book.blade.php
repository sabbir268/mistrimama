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
					নতুন কাজ পাওয়া এবং বন্টন করা
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/1.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					কোন নতুন কাজ আসার পর আপনি আপনার স্ক্রিন-এ "বিবরণ“ বাটন-টি ক্লিক করে কাজের বিস্তারিত দেখতে পাবেন।

				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/2.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					নতুন কাজের বিস্তারিত দেখার পর আপনি সহকারী বাটন টিতে ক্লিক করে কাজের জন্য সহকারী নির্বাচন করুন।
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/3.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					"সহকারী” বাটন-টি ক্লিক করার পর সহকারী নির্বাচন করার স্ক্রিন-টি দেখতে পাবেন।
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/4.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					এখান থেকে উপযুক্ত সহকর্মীকে কাজ করার জন্য নির্বাচন করুন।
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/5.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সহকারী নির্বাচন হয়ে গেলে “OK” বাটন-টি ক্লিক করুন।
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/new_work_allowcate/6.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
					সহকারী কে সফলভাবে কাজ বন্টন করা হয়ে গেলে পুনরায় আপনার ড্যাশবোর্ডের মেন্যুটি চলে আসবে।
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