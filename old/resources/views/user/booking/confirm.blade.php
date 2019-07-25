@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/elements/steps.min.css')}}">

{{-- @if($type == 'others')
<style>
    .steps-icon-progress li {
        width: 20% !important;
    }
</style>
@endif --}}

@endsection

@section('topbar')
@include('user.topbar')
@endsection

@section('sidebar')
@include('user.sidebar')
@endsection

@section('content')
<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
            {{-- @if($type == 'others')
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption">Name & Phone </div>
                </li>
                @endif --}}
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Category</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-card"></i>
                </div>
                <div class="caption">Date & Time</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-check-bird"></i>
                </div>
                <div class="caption">Confirmation</div>
            </li>
        </ul>
    </div>

    <header class="steps-numeric-title">Confrimation</header>
    <div class="col-xl-6 offset-md-3 ">
        {{-- <p class="text-center">
                <strong>Your order has been place successfully.</strong> Please wait a momment for confirmation. <br>
                <a href="{{route('add.order-confirm')}}" class="btn btn-link">Confirm Order</a>
        </p> --}}
        <form action="{{route('add.order-confirm')}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="checkbox-detailed text-left" id="self-checkbox">
                    <input type="radio" name="type" id="type-self" value="self" checked />
                    <label for="type-self">
                        <span class="checkbox-detailed-tbl">
                            <span class="checkbox-detailed-cell">
                                <span class="checkbox-detailed-title">For Me</span>
                                Order for Yourself.
                            </span>
                        </span>
                    </label>
                </div>
                <div class="checkbox-detailed text-left" id="others-checkbox">
                    <input type="radio" name="type" id="type-others" value="others" />
                    <label for="type-others">
                        <span class="checkbox-detailed-tbl">
                            <span class="checkbox-detailed-cell">
                                <span class="checkbox-detailed-title">For Others</span>
                                Order for Others.
                            </span>
                        </span>
                    </label>
                </div>
                <div class="others-area" style="display:none">
                    <div class="form-group row">
                        <div class="col-xl-4">
                            <label class="form-label">
                                <i class="font-icon font-icon-user"></i>
                                Name <span class="invisible">Others &nbsp;&nbsp; </span>
                            </label>
                        </div>
                        <div class="col-xl-8">
                            <div class="input-group">
                                <input type="text" name="others_name" id="others_name" placeholder="Others Name"
                                    class="form-control m-0">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xl-4">
                            <label class="form-label">
                                <i class="font-icon font-icon-phone"></i>
                                Phone <span class="invisible">Number </span>
                            </label>
                        </div>
                        <div class="col-xl-8">
                            <div class="input-group">
                                <input type="text" name="others_phone" id="others_phone" placeholder="Others Phone"
                                    class="form-control m-0">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-4 ">
                            <label class="form-label text-left">
                                &nbsp;<i class="font-icon font-icon-map"></i>
                                Area
                                {{-- Area <span class="invisible">Others</span> --}}
                            </label>
                        </div>
                        <div class="col-xl-8">
                            <div class="input-group">
                                <select name="area" id="sa" onchange="combomap(this.value)" 
                                    class="form-control form-control m-0" >
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
                    </div>

                    <div class="form-group row">
                        <div class="col-xl-4">
                            <label class="form-label">
                                <i class="font-icon font-icon-map"></i>
                                Address <span class="invisible">Others</span>
                            </label>
                        </div>
                        <div class="col-xl-8">
                            <div class="input-group">
                                <textarea name="others_addr" id="others_addr" class="form-control m-0"
                                    placeholder="House No. 51 , Road No. 12 , Shekhertek , Mohammadpur" cols="30"
                                    rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-4">
                        <label class="form-label ">
                            <i class="font-icon font-icon-answer"></i>
                            Referral Code &nbsp;&nbsp;<small> (optional)</small>
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group date">
                            <input type="text" id="refrral" placeholder="34AVSD87" name="ref_code"
                                class="form-control m-0">
                            @if (Session::has('msg'))
                            <span class="text-danger pl-2">{{Session::get('msg')}}</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <button type="button" class="btn btn-rounded btn-mm float-left"><a href="{{route('date.time')}}" class="text-white"> ← Back </a></button>
    <button type="submit" class="btn btn-rounded float-right btn-mm">Finish <i class="fa fa-check"></i></button>
    </form>
</section>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.others-area').hide();
        $('#others-checkbox').click(function() {
            if($('#type-others').is(':checked')) { 
                $('.others-area').show();
                $('#others_name').attr('required','true');
                $('#others_phone').attr('required','true');
                $('#others_addr').attr('required','true');
            }
        });

        $('#self-checkbox').click(function() {
            if($('#type-self').is(':checked')) { 
                $('.others-area').hide();
                $('#others_name').removeAttr('required');
                $('#others_phone').removeAttr('required');
                $('#others_addr').removeAttr('required');
            }
        });
    });
</script>
@endsection