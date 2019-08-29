@extends('layouts.main-dash')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/css/lib/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/flatpickr.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('dashboard/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}">
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
            <li class="active">
                <div class="icon bg-mm">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li class="active">
                <div class="icon bg-mm">
                    <i class="font-icon font-icon-calend"></i>
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

    <header class="steps-numeric-title">Date & Time </header>
    <form action="{{route('add.date-time')}}" method="post">
        @csrf
        <div class="col-xl-6 offset-md-3 ">
            <div class="row imergency" style="display:none">
                <div class="alert alert-warning alert-icon alert-close alert-dismissible fade show" role="alert">
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button> --}}
                    <i class="font-icon font-icon-warning"></i>
                    <strong>N.B.</strong>For emergency service hour (8:00 pm to 8:00 am) an additional BDT 500 will be added.
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-calend"></i>
                        Select Date
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group date">
                        <input type="text" name="order_date" id="order_date" class="form-control"
                            placeholder="Chose Date" required>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                        <i class="font-icon font-icon-speed"></i>
                        Select Time
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group">
                        <select name="order_time" id="order_time" class="form-control" required>
                            <option value="">Chose Time</option>
                            <option value="12:00 AM">12:00 AM </option>
                            <option value="1:00 AM">01:00 AM </option>
                            <option value="2:00 AM">02:00 AM </option>
                            <option value="3:00 AM">03:00 AM </option>
                            <option value="4:00 AM">04:00 AM </option>
                            <option value="5:00 AM">05:00 AM </option>
                            <option value="6:00 AM">06:00 AM </option>
                            <option value="7:00 AM">07:00 AM </option>
                            <option value="8:00 AM">08:00 AM </option>
                            <option value="9:00 AM">09:00 AM </option>
                            <option value="10:00 AM">10:00 AM </option>
                            <option value="11:00 AM">11:00 AM </option>
                            <option value="12:00 PM">12:00 PM </option>
                            <option value="1:00 PM">01:00 PM </option>
                            <option value="2:00 PM">02:00 PM </option>
                            <option value="3:00 PM">03:00 PM </option>
                            <option value="4:00 PM">04:00 PM</option>
                            <option value="5:00 PM">05:00 PM </option>
                            <option value="6:00 PM">06:00 PM </option>
                            <option value="7:00 PM">07:00 PM </option>
                            <option value="8:00 PM">08:00 PM </option>
                            <option value="9:00 PM">09:00 PM </option>
                            <option value="10:00 PM">10:00 PM </option>
                            <option value="11:00 PM">11:00 PM</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-rounded btn-mm float-left"> <a class="text-white" href="{{route('show.services')}}">←
                Back</a></button>
        <button type="submit" class="btn btn-rounded float-right btn-mm">Next →</button>
    </form>
</section>
@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('dashboard/js/lib/moment/moment-with-locales.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard/js/lib/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
<script>
    var today = new Date(); 
    var dd = today.getDate(); 
    var dds = today.getDate()+7; 
    var mm = today.getMonth()+1; //January is 0! 
    var yyyy = today.getFullYear(); 
    if(dd<10){ dd='0'+dd } 
    if(mm<10){ mm='0'+mm } 
    // console.log(dd);
    var today = dd+'/'+mm+'/'+yyyy; 
    var weeklet = dds+'/'+mm+'/'+yyyy; 
     
    $('#order_date').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true,
        // maxDate: weeklet,
        minDate: today,
        locale: {
            format: 'DD-MM-YYYY'
        }
	});

    $('#order_time').change(function(){
            $time = $('#order_time').val();
            $time = $time.split(" ");
            $num = parseInt($time[0]);
            $met = $time[1];
            console.log($num);
            console.log($met);
            
            if(($num > 8  && $met == 'PM') || ($num < 8 && $met == 'AM')){
                //alert("In this case we'll charge 500 tk extra for emergency ");
                $('.imergency').show();
                if($num == 12  && $met == 'PM'){
                    $('.imergency').hide();
                }
            }else{
                $('.imergency').hide();   
            }

            

        })
    

</script>
@endsection