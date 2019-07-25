<?php $__env->startSection('body'); ?>



<style>
    span.err_msg {
        color: #f10000;
    }

    .progress {
        border-radius: 10px !important;
        background: #7171713b;
        height: 10px;
    }

    .progress-bar {
        background-color: #1894ff;
    }

    ul.list {
        width: 100% !important;
    }

    .col-md-6,
    .col-md-4,
    .col-md-12 {
        margin-bottom: 20px !important;
    }

    .nice-select,
    input.form-control {
        width: 100%;
        height: 46px;
        line-height: 46px;
        border-color: #ddd;
        padding: 0 0 0 10px;
        border: solid 1px #e8e8e8;
        box-sizing: border-box;
        clear: both;
        cursor: pointer
    }

    input[type="checkbox"] {
        width: 60px;
        padding: 10px;
        height: 20px;
    }


    #step2,
    #step1,
    #step4,
    #step5 {
        display: none;
    }


    @media (max-width: 720px) {

        .col-md-6,
        .col-md-4,
        .col-md-12 {
            margin-bottom: 50px !important;
        }

        thead {
            display: none;
        }
    }
</style>

<?php if(Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>


<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Add SPF </div>
            </div>

            <div class="portlet-body flip-scroll">
                <div id="first_step">
                    <div class="row">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                            <div class="text-center">
                                Progress: <span id="progress">0%</span>
                            </div>

                            <br>

                            <form id="spf_form" action="<?php echo e(url('add_esp')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div id="step1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Select a service type: <span class="type_err"></span></label>
                                                <select class="form-control error" name="type" id="type" required="true" aria-required="true" aria-invalid="true">
                                                    <option value="">Select a service type</option>
                                                    <option value="ESP">ESP</option>
                                                    <option value="FSP">FSP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-primary btn-block" id="toStep2">Next</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div id="step2">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Name: <span class="fullname_err"></label>
                                                <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Name">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">E-mail: <span class="email_err"></label>
                                                <input type="email" id="email" name="email" class="form-control" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Phone Number: <span class="phone_err"></label>
                                                <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Alternet Phone Number: <span class="altPhone_err"></label>
                                                <input type="number" name="alt-phone" id="alt-phone" class="form-control" placeholder="Alternet Phone Number">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Address: <span class="mailing_address_err"></label>
                                                <input type="text" id="mailing_address" name="mailing_address" class="form-control" placeholder="Address">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NID Smart Card Number: <span class="nid_number_err"></label>
                                                <input type="number" id="nid_number" name="nid_number" class="form-control" placeholder="NID Smart Card Number">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NID front"</label>
                                                <input name="front_id" type="file" class="form-control" placeholder="NID front">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">NID back</label>
                                                <input name="nid_back" type="file" class="form-control" placeholder="NID back">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Photograph</label>
                                                <input name="photograph" type="file" class="form-control" placeholder="Photograph">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">TIN Certificate or Trade License</label>
                                                <input name="tin" type="file" class="form-control" placeholder="TIN Certificate or Trade License">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div>
                                            <button type="button" class="btn btn-primary btn-block" id="toStep3">Next</button>
                                        </div>
                                    </div>
                                </div>

                                <div id="step3">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">CHOOSE A SERVICE CATEGORY: <span class="service_category_err"></label>

                                                <select class="form-control error" id="service_category" name="service_category" aria-invalid="true">
                                                    <option value="">Select a service type</option>
                                                    <option value="Starter">Starter</option>
                                                    <option value="Expert">Expert</option>
                                                    <option value="Professional">Professional</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for=""> CHOOSE A SERVICE TYPE: <span class="service_type_err"></label>
                                                <select name="service_type" id="service_type" class="form-control error">
                                                    <option value="">Select</option>
                                                    <option value="1">Electrical Services</option>
                                                    <option value="2">CCTV Services</option>
                                                    <option value="3">Plumbing Services</option>
                                                    <option value="4">IT Services</option>
                                                    <option value="5">Generator Services</option>
                                                    <option value="6">AC Services</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Division</label>
                                                <input name="division" type="text" class="form-control valid" value="Dhaka" readonly="" aria-invalid="false">
                                                <span class="material-input"></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Zone / Thana: <span class="cluster_err"></label>
                                                <select name="cluster" id="cluster" class="form-control cluster">
                                                    <option value="">--select--</option>
                                                    <?php $__currentLoopData = $clusters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($c->id); ?>"><?php echo e($c->id); ?> -<?php echo e($c->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Zone / Thana: <span class="zone_err"></label>
                                                <select name="zone" id="zone" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Service Days</th>
                                                            <th scope="col">Start Time</th>
                                                            <th scope="col">End Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id='selectBoxes'>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <button type="button" class="btn btn-primary btn-block" id="toStep4">Next</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="step4">
                                    <div class="form-group ">
                                        <label class="control-label">Bkash Number: <span class="account_number_err"></label>
                                        <input id="account_number" name="account_number" type="number" class="form-control" required="">

                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <button type="button" class="btn btn-primary btn-block" id="toStep5">Submit</button>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('footer'); ?>

    <script src="<?php echo e(asset('js/jquery.nice-select.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {


            // !!! ERROR Messages
            var errMsg = '<span class="err_msg">(**This field cannot be empty**)</span>';
            var errBkash = '<span class="err_msg">(**Please enter a valid Bkash number**)</span>';

            $("select").niceSelect();

            $(".xyz").on("click", function() {
                event();
            });




            $("#toStep2").click(function() {

                var type = $.trim($("#type").val());
                // TODO: validation
                if (type == '') {
                    $(".type_err").html(errMsg);
                } else {
                    $(".type_err").html('');

                    $("#step2").css('display', 'block');
                    $("#step1").css('display', 'none');
                    // for Progress bar
                    $("#progress").html('25%');
                    $(".progress-bar").css('width', '25%');
                }

            });

            $("#toStep3").click(function() {


                // TODO:: validation
                var fullname = $.trim($("#fullname").val());
                var email = $.trim($("#email").val());
                var phone = $.trim($("#phone").val());
                var altPhone = $.trim($("#alt-phone").val());
                var mailing_address = $.trim($("#mailing_address").val());
                var nid_number = $.trim($("#nid_number").val());

                if (fullname == '') {
                    // !show
                    $(".fullname_err").html(errMsg);

                } else if (email == '') {
                    // !hide
                    $(".fullname_err").html();
                    // !show
                    $(".email_err").html(errMsg);
                } else if (phone == '') {
                    // !hide
                    $(".email_err").html();
                    // !show
                    $(".phone_err").html(errMsg);
                } else if (altPhone == '') {
                    // !hide
                    $(".phone_err").html();
                    // !show
                    $(".altPhone_err").html(errMsg);
                } else if (mailing_address == '') {
                    // !hide
                    $(".altPhone_err").html();
                    // !show
                    $(".mailing_address_err").html(errMsg);
                } else if (nid_number == '') {
                    // !hide
                    $(".mailing_address_err").html();
                    // !show
                    $(".nid_number_err").html(errMsg);
                } else {
                    $("#step2").css('display', 'none');
                    $("#step3").css('display', 'block');

                    // for Progress bar
                    $("#progress").html('50%');
                    $(".progress-bar").css('width', '50%');
                }

            });

            $("#toStep4").click(function() {

                // TODO:: validation
                var service_category = $.trim($("#service_category").val());
                var service_type = $.trim($("#service_type").val());
                var cluster = $.trim($("#cluster").val());
                var zone = $.trim($("#zone").val());

                if (service_category == '') {
                    // !show
                    $(".service_category_err").html(errMsg);
                } else if (service_type == '') {
                    // !hide
                    $(".service_category_err").html();
                    // !show
                    $(".service_type_err").html(errMsg);
                } else if (cluster == '') {
                    // !hide
                    $(".service_type_err").hide();
                    // !show
                    $(".cluster_err").html(errMsg);
                } else if (zone == '') {
                    // !hide
                    $(".cluster_err").html();
                    // !show
                    $(".zone_err").html(errMsg);
                } else {
                    $("#step3").css('display', 'none');
                    $("#step4").css('display', 'block');
                    // for Progress bar
                    $("#progress").html('75%');
                    $(".progress-bar").css('width', '75%');
                }
            });

            $("#toStep5").click(function() {
                var account_number = $.trim($("#account_number").val());
                if (account_number == '') {
                    // !show
                    $(".account_number_err").html(errMsg);
                } else if (account_number.length < 10 || account_number.length > 12) {
                    // !show
                    $(".account_number_err").html(errBkash);
                } else {

                    // for Progress bar
                    $("#progress").html('100%');
                    $(".progress-bar").css('width', '100%');
                    setTimeout($('#spf_form').submit(), 3000);

                }

            })



            $('.cluster').on('change', function() {

                $.ajax({
                    type: "GET",
                    url: '/searchthana',
                    data: {
                        id: $(this).val()
                    },
                    success: function(data) {
                        $("#zone").html(data);
                        $('#zone').niceSelect('update');
                    }
                });




            });


            var times = ['8am', '9am', '10am', '11am', '12pm', '1pm', '2pm', '3pm', '4pm', '6pm', '7pm', '8pm'];
            var days = ['Friday', 'Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday']
            var output = '';

            for (d in days) {

                var options = '';
                for (t in times) {
                    options += '<option value="' + times[t] + '" > ' + times[t] + ' </option>';
                }

                output += '<tr> <td scope="row"> <div class="checkbox"> <label style="margin-top: 10px;"> <input class="days" type="checkbox" data-id=' + d + ' value="' + days[d] + '" name="days[]"> </label> </div></td><td> <div class="form-group" style="margin-top:20px;"> <h5>' + days[d] + '</h5> </div></td><td> <div class="form-group" style="margin-top: 15px;"> <select class="form-control day-start-time-' + d + ' start_time valid"  aria-invalid="false"> ' + options + ' </select> </td><td> <div class="form-group" style="margin-top: 15px;"> <select class="form-control day-end-time-' + d + ' end_time valid"  aria-invalid="false"> ' + options + ' </select> <span class="material-input"></span></div></td></tr>';
            }

            $("#selectBoxes").html(output);
            $('#selectBoxes').niceSelect('update');





            $(document).on('click', ".days", function() {
                var checkbox = $(this);
                var id = checkbox.data('id');

                if (checkbox.is(':checked')) {
                    $(".day-start-time-" + id).attr('name', 'start_time[]');
                    $(".day-end-time-" + id).attr('name', 'end_time[]');
                } else {
                    $(".day-start-time-" + id).attr('name', '');
                    $(".day-end-time-" + id).attr('name', '');

                }
            })

        });
    </script>


    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>