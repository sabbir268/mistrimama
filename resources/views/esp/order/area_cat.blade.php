@extends('layouts.main-dash')

@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">
@endsection

@section('topbar')
@include('esp.topbar')
@endsection

@section('sidebar')
@include('esp.sidebar')
@endsection


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
            <li class="">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li class="">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Review</div>
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

    <header class="steps-numeric-title">Area & Services</header>
    <form action="{{ route('create.order') }}" method="post">
        {{csrf_field()}}
        <input type="text" hidden name="page" value="dashboard">
        <div class="col-xl-6 offset-md-3 ">
            {{-- <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        Select Area
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group">
                        <select name="area" id="sa" onchange="combomap(this.value)" style="text-transform:none;"
                            class="form-control" required>
                            <option value="" selected="false" class="locationDropdown">Select Area</option>
                            <option value="Adabor"> Adabor</option>
                            <option value="Azampur"> Azampur</option>
                            <option value="Badda"> Badda</option>
                            <option value="Darus Salam"> Darus Salam</option>
                            <option value="Dhanmondi"> Dhanmondi</option>
                            <option value="Gulshan"> Gulshan</option>
                            <option value="Kafrul"> Kafrul</option>
                            <option value="Kalabagan"> Kalabagan</option>
                            <option value="Khilgaon"> Khilgaon</option>
                            <option value="Khilkhet"> Khilkhet</option>
                            <option value="Mirpur">Mirpur</option>
                            <option value="Mohammadpur"> Mohammadpur</option>
                            <option value="Motijheel"> Motijheel</option>
                            <option value="New Market"> New Market</option>
                            <option value="Old Town"> Old Town</option>
                            <option value="Pallabi"> Pallabi</option>
                            <option value="Paltan"> Paltan</option>
                            <option value="Ramna"> Ramna</option>
                            <option value="Rampura"> Rampura</option>
                            <option value="Sabujbagh"> Sabujbagh</option>
                            <option value="Shahbagh"> Shahbagh</option>
                            <option value="Sher-e-Bangla_Nagar"> Sher-e-Bangla Nagar</option>
                            <option value="Tejgaon"> Tejgaon</option>
                            <option value="Uttar Khan"> Uttar Khan</option>
                            <option value="Uttara"> Uttara</option>
                            <option value="Vatara"> Vatara</option>
                        </select>
                    </div>
                </div>
            </div> --}}

            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-case-2"></i>
                        Select Service
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group">
                        <select name="category" id="ss" class="form-control" style="text-transform:none;" required>
                            <option selected="true" value="">Select Service</option>
                            @foreach($services_category as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        {{-- <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button> --}}
        <button type="submit" class="btn btn-rounded float-right  btn-mm">Next →</button>
    </form>
</section>
@endsection


@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
@endsection