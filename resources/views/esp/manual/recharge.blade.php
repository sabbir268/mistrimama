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
						সার্ভিস পার্টনার একাউন্ট রিচার্জ
				</h3>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/1.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						আপনার নিকটস্থ বিকাশ এজেন্ট অথবা নিজস্ব বিকাশ নাম্বার থেকে মিস্ত্রি মামার বিকাশ মার্চেন্ট নাম্বার ০১৭২৭০৬৩৫৯৩ এ নির্দিষ্ট এমাউন্টটি রিচার্জ করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/2.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						রিচার্জ রিকোয়েস্ট করার জন্য আপনি আপনার ড্যাশবোর্ড এ প্রবেশ করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/3.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						ড্যাশবোর্ড এ প্রবেশ করে মেন্যু থেকে “রিচার্জ করুন” বাটন-টি ক্লিক করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/4.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						রিচার্জ রিকোয়েস্ট করার জন্য মাধ্যম অংশে বিকাশ সিলেক্ট করে, TXN ID ঘরে TXN ID  এবং টাকার পরিমান ঘরে রিচার্জ কৃত টাকার পরিমান টাইপ করে “নিশ্চিতকরণ” বাটনে ক্লিক করুন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/5.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						“নিশ্চিতকরণ” বাটন ক্লিক করার পর একটি নোটিফিকেশন আপনার স্ক্রীন এ দেখতে পারবেন
				</h4>
			</div>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-6 text-center">
				<img class="rounded mx-auto d-block" style="width:65%"
					src="{{asset('images/manuals/sp_account_recharge/6.png')}}" alt="">
			</div>
			<div class="col-md-6 text-center d-flex">
				<h4 class="m-auto">
						মিস্ত্রি মামা থেকে রিচার্জ রিকোয়েস্ট একসেপ্ট করার পর ৩৬ ঘন্টার মধ্যে আপনার মোবাইল-এ একটি কনফার্মেশন মেসেজে পৌঁছে যাবে
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