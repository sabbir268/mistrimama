@extends('new_layout.template')
@section('content')
<style>
    .main-bar {
        background-color: #fff !important;
    }

</style>

<div class="page-content">
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->
    <div style="height:94px;"></div>
    <!-- inner page banner END -->
    <!-- Breadcrumb  Templates Start -->

    <div class="breadcrumb-row">
        <div class="container">
            <ul class="list-inline">
                <li><a href="#">Career</a></li>
                <li>{{ $model->title }}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb  Templates End -->
    <!-- contact area -->
    <div class="container">
        <div class="section-content">
            <div class="col-md-12">
                    {!! $model->description !!}
            </div>

            <div class="col-md-12" style="margin: 0px auto;padding-top:10px">
                <?php if (Session::has('success')): ?>
                <div class="alert alert-success">
                    <?php echo Session::get('success') ?>
                </div>
                <?php endif; ?>
                <h4 class="heading-title text-center" style="text-align:justify;text-align:center">Check
                    Opportunity & Apply</h4>
                <form action="{{route('career-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-user"></i></span>
                                    <input name="name" type="text" class="form-control" placeholder="Full Name">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-envelope"></i></span>
                                    <input name="email" type="text" class="form-control" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-briefcase"></i></span>
                                    <input name="phone_number" type="text" class="form-control" placeholder="Phone">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i
                                                    class="fa fa-briefcase"></i></span>
                                            <input name="year_of_exp" type="text" class="form-control"
                                                placeholder="Year Of Experience">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon"><i
                                                    class="fa fa-money"></i></span>
                                            <input name="salary_expectation" type="text" class="form-control"
                                                placeholder="Salary Expectation">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-upload"></i></span>
                                    <input name="cv" type="file" class="form-control" placeholder="Upload your cv">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-external-link-square"></i></span>
                                    <input name="link" type="text" class="form-control"
                                        placeholder="Website/LinkedIn/Portfolio link">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group"> <span class="input-group-addon"><i
                                            class="fa fa-comment"></i></span>
                                    <textarea name="tell_us" class="form-control" id="" cols="30" placeholder="
                                    Tell us why you want to work for mistrimama" rows="5"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="captchaouter" id="recaptcha_contactus" data-theme="light"
                                    data-sitekey="6Le3PyEUAAAAAMJcnb8C66tqaRM7TTUpxmPCI2Aa"></div>
                            </div>
                        </div>
                    </div> --}}
                        <div class="col-md-12">
                            <input name="submit" style="background-color: #f3b400;" type="submit" value="Submit"
                                class="btn btn-primary margin-r-10">
                            <input name="Resat" style="background-color: #f3b400;" type="reset" value="Reset"
                                class="btn btn-custom">
                        </div>
                    </div>
                </form>
            </div>
            <!-- .message -->
        </div>
    </div>
</div>
</div>
</div>
<!-- contact area  END -->
</div>
@endsection