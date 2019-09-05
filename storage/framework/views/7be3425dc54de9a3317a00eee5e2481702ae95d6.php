<?php $__env->startSection('body'); ?>
<?php if(Session::has('message')): ?>
<p class="alert <?php echo e(Session::get('alert-class', 'alert-info')); ?>"><?php echo e(Session::get('message')); ?></p>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Add New Service Partners </div>
            </div>

            <div class="portlet-body flip-scroll">
                <div id="first_step">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <form id="spf_form" method="post" action="<?php echo e(route('add.user.special')); ?>" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <div class="form-group">
                                    <label for="">Full Name: <span class="type_err"></span></label>
                                    <input id="name" type="text"
                                        class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name"
                                        value="<?php echo e(old('name')); ?>" placeholder="Name" required autofocus>

                                    <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Phone No: <span class="type_err"></span></label>
                                    <input id="phone_no" type="text"
                                        class="form-control<?php echo e($errors->has('phone_no') ? ' is-invalid' : ''); ?>"
                                        name="phone_no" value="<?php echo e(old('phone_no')); ?>" minLength="11" maxLength="11"
                                        placeholder="Mobile Number" required>

                                    <?php if($errors->has('phone_no')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('phone_no')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label for="">Email: <span class="type_err"></span></label>
                                    <input id="email" type="email"
                                        class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                        name="email" placeholder="Email" value="<?php echo e(old('email')); ?>">

                                    <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Password: <span class="type_err"></span></label>
                                    <input id="password" type="text"
                                        class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                        name="password" placeholder="Password" required>

                                    <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label for="">Area: <span class="type_err"></span></label>
                                    <select name="area" id="sa" style="text-transform:none;" class="form-control"
                                        required>
                                        <option value="">Select Area</option>
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
                                        <option value="Sher-e-Bangla Nagar"> Sher-e-Bangla Nagar</option>
                                        <option value="Tejgaon"> Tejgaon</option>
                                        <option value="Uttar Khan"> Uttar Khan</option>
                                        <option value="Uttara"> Uttara</option>
                                        <option value="Vatara"> Vatara</option>
                                    </select>
                                    <?php if($errors->has('area')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('area')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Address: <span class="type_err"></span></label>
                                    <textarea name="address" rows="2" class="form-control" placeholder="Address"
                                        required></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">MFS Type: <span class="type_err"></span></label>
                                    <select name="mfs_type" id="mfs_type" style="text-transform:none;"
                                        class="form-control" required>
                                        <option value="bkash">bKash</option>
                                        <option value="rocket">Rocket</option>
                                        <option value="sure_cash">Sure Cash</option>
                                    </select>

                                    <?php if($errors->has('mfs_type')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('mfs_type')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">MFS Number: <span class="type_err"></span></label>
                                    <input type="text" class="form-control" name="mfs_number" id="mfs_number">

                                    <?php if($errors->has('mfs_number')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('mfs_number')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="">Profile Picture: <span class="type_err"></span></label>
                                    <input type="file" class="form-control" name="profile_picture" id="profile_picture">
                                    <?php if($errors->has('profile_picture')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('profile_picture')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>

                                <input type="text" name="reason" value="special_user" hidden>
                                <input type="text" name="user_type" value="user" hidden>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Add</button>
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



<script>
    $(document).ready(function() {


            // !!! ERROR Messages
            var errMsg = '<span class="err_msg">(**This field cannot be empty**)</span>';
            var errBkash = '<span class="err_msg">(**Please enter a valid Bkash number**)</span>';
            var errPhn = '<span class="err_msg">(**Please enter a valid phone number**)</span>';

            // $("select").niceSelect();

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
                } else if ( phone.length > 11 || phone.length < 11) {
                    // !hide
                    $(".phone_err").html();
                    $(".email_err").html();
                    // !show
                    $(".phone_err").html(errPhn);
                } else if (mailing_address == '') {
                    // !hide
                    $(".phone_err").html();
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