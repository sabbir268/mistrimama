@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/pages/widgets.min.css')}}">
@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-header">
                Share Your Referral Code/Link
            </div>
            <div class="card-body">
                <div class="col-md-4 offset-md-4 bg-mm-light text-dark p-4 border rounded">
                    <span class="font-weight-bold">{{$refcode}}</span>
                </div>
                <div class="input-group mb-2 mt-3">
                    <input type="text" id="ref-link" class="form-control bg-mm-light text-dark"
                        value="{{asset('/order/refer/')}}/{{$refcode}}" aria-describedby="basic-addon2" readonly>
                    <div class="input-group-append">
                        <span class="btn btn-mm-border text-mm" id="copyReflink">Copy</span>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-10 offset-md-1">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{asset('/order/refer/')}}/{{$refcode}}"
                            target="_blank" style="border-radius: 15px !important;" class="btn btn-mm-border text-mm"><i
                                class="fa fa-facebook"></i> &nbsp;&nbsp; Share on
                            Facebook</a>
                        <a href="https://twitter.com/intent/tweet?text={{asset('/order/refer/')}}/{{$refcode}}"
                            target="_blank" style="border-radius: 15px !important;" class="btn btn-mm-border text-mm"><i
                                class="fa fa-twitter"></i> &nbsp;&nbsp; Share on
                            Twitter</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Top Referrer
            </div>
            <div class="card-body pt-5">
                <div class="p-2 text-center">
                    <div style="height:100px" class="col-md-4 border rounded d-inline-block ">
                        <img src="{{asset('dashboard/img/newlogokom.png')}}" style="height:80px;width:80px" alt="Image">
                    </div>
                    <br>
                    <h3 class="pb-1"> @if ($topRferer != null)
                        {{$topRferer->name}}
                        @else
                        No referar exist yet.
                        @endif
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!--.col-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Refer History
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="bg-mm-light">Date</th>
                            <th class="bg-mm-light">Details</th>
                            <th class="bg-mm-light">RP</th>
                            <th class="bg-mm-light">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($referHistory != null)
                        @foreach ($referHistory as $refhis)
                        <tr>
                            <td>{{$refhis->created_at}}</td>
                            <td>{{$refhis->details}}</td>
                            <td>{{$refhis->rp}}</td>
                            <td>{{$refhis->status}}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--.col-->
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