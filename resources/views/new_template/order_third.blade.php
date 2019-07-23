@extends('new_layout.template')
@section('content')
<div class="page-content">
  <!-- inner page banner -->
  <!-- Breadcrumb  Templates Start -->

  <div class="breadcrumb-row">
    <div class="container">
      <ul class="list-inline">
        {{-- <li><a href="../index.html">
            Home </a></li>
        <li>Signup</li> --}}
      </ul>
    </div>
  </div>
  <!-- Breadcrumb  Templates End -->
  <!-- Left & right section start -->

  <div class="section-content profiles-content">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
          <div class="col-md-12">
            <h2>Date & Time </h2>
            <form action="{{route('add.date-time')}}" method="post" id="date-time">
              @csrf
              <div class="col-xl-6 offset-md-3 ">
                <div class="row imergency" style="display:none">
                  <div class="alert alert-warning alert-icon alert-close alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                    <i class="font-icon font-icon-warning"></i>
                    <strong>N.B.</strong>In this case we'll charge 500 tk extra for emergency.
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
                      <input type="date" name="order_date" id="order_date" class="form-control" placeholder="Chose Date"
                        required>
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
                      <select name="order_time" id="order_time" class="form-control">
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

          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="button" id="backToStepSecond" value="Previous" class="btn btn-block btn-primary">
            </div>
          </div>
          <div class="col-md-4 pull-right">
            <div class="form-group">
              <input type="submit" value="Next" class="btn btn-block btn-primary">
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="response_modal"></div>
@endsection

@section('script')
<script type='text/javascript' src='{{ asset("/new_theme/includes/js/raw.js")}}'></script>
<script>
  jQuery(document).ready(function() {
    jQuery("#date-time").submit(function(e) {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    // @if(Auth::check())
    // jQuery.ajax({
    //   type: "POST",
    //   url: url,
    //   data: form.serialize(), // serializes the form's elements.
    //   success: function(data) {

    //     }
    //   }
    // @else
    // jQuery("#register-modal").modal("show");
    // @endif

    alert(1);
    });
  });
</script>
@endsection