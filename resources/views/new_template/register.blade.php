@extends('new_layout.template')
@section('content')
<style>
    .main-bar {
        /* background-color: #ffffff !important; */
    }

    .promotion {
        min-height: 78vh;
        background-color: #00000080;
        border-radius: 1%;
    }

    .new-signup {
        background-image: url("{{asset('slider-images/plumbing.webp')}}");
        background-repeat: no-repeat;
        background-origin: content-box;
        background-position: center;
        background-size: cover;
        margin-top: 0px !important;
    }

    .signup {
        background-color: #00000080;
         !important;
    }

    .customer-bx>div {
        padding-bottom: 20px;
    }

    .socila-box{
        font-size: 26px;
    }

</style>
<div class="page-content" style="padding-bottom:0px">
    <!-- inner page banner -->
    <!-- Breadcrumb  Templates Start -->

    {{-- <div class="breadcrumb-row" style="background-color: transparent;"> --}}
    <!--<div class="container">-->
    <!--  <ul class="list-inline">-->
    <!--    <li><a href="../index.html">-->
    <!--        Home </a></li>-->
    <!--    <li>Signup</li>-->
    <!--  </ul>-->
    <!--</div>-->
    {{-- </div> --}}
    <!-- Breadcrumb  Templates End -->
    <!-- Left & right section start -->

    <div class="section-content profiles-content new-signup">
        <div class="container">
            <div class="row" style="margin-top:100px">
                <div class="col-md-8 promotion ">

                </div>
                <!-- Left part start -->
                <div class="col-md-4 ">
                    <!-- Signup Template -->
                    <!-- Content -->
                    <!-- Left & right section start -->
                    <div class="padding-20 margin-b-30  bg-white sf-rouned-box sf-register-page signup">
                        <div id="customertab" class="tab-pane fade in active">
                            <form class="customer_registration_page" method="post"
                                action="{{route('user.do-register')}}">
                                {{csrf_field()}}
                                <div class="customer-bx clearfix row">

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-user"></i>
                                            <input id="name" type="text"
                                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                                name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                            @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-phone"></i>
                                            <span class="input-group-addon"
                                                style=" border-right: 0px;padding: 7px;">+88</span>
                                            <input style="border-left: 0px;padding-left: 2px;" id="phone_no" type="text"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="phone_no" value="{{ old('phone_no') }}" minLength="11"
                                                maxLength="11" placeholder="Mobile Number" required>

                                            @if ($errors->has('phone_no'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone_no') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-envelope"></i>
                                            <input id="email" type="email"
                                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                name="email" placeholder="Email" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-lock"></i>
                                            <input id="password" type="password"
                                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                name="password" placeholder="Password" required>

                                            @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <i class="input-group-addon fa fa-map-marker"></i>
                                            <textarea name="address" rows="2" class="form-control" placeholder="Address"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <input type="text" name="reason" value="false" hidden>
                                    <input type="text" name="user_type" value="user" hidden>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block btn-mm"
                                            name="user-register" value="Sign up" />
                                    </div>

                                    <div class="form-group row mb-0" style="padding-bottom:0px;margin-bottom:0px">
                                        <div class="col-md-12">
                                            <div class="col-md-6 pull-left ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label text-white" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-6  text-right">
                                                <span class="text-white">Need Help?</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="wp-social-login-widget">
                                <ul class="socila-box list-inline ">
                                    <li> <a href="#">Connect With:</a></li>
                                    <li><a href="https://www.facebook.com/MistriMama" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.instagram.com/mistrimama" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                    <li><a href="https://twitter.com/MistriMama" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/mistrimama" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>


                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>
@endsection