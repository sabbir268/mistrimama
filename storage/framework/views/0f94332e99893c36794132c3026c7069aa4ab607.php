<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">



<?php $__env->stopSection(); ?>

<?php if(Auth::check()): ?>
<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php if(Auth::check()): ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php $__env->startSection('content'); ?>
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
        
        <?php if(Auth::check()): ?>
        <form action="<?php echo e(route('add.order-confirm')); ?>" method="POST">
            <?php echo csrf_field(); ?>
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
                                
                            </label>
                        </div>
                        <div class="col-xl-8">
                            <div class="input-group">
                                <select name="area" id="sa" onchange="combomap(this.value)"
                                    class="form-control form-control m-0">
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
                <div class="form-group row ">
                    <div class="col-xl-4">
                        <label class="form-label ">
                            <i class="font-icon font-icon-answer"></i>Comments
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group date">
                            <textarea name="comments" class="form-control" id="comments" cols="100" rows="4"></textarea>
                            <?php if(Session::has('comments')): ?>
                            <span class="text-danger pl-2"><?php echo e(Session::get('comments')); ?></span>
                            <?php endif; ?>
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
                            <?php if(Session::has('msg')): ?>
                            <span class="text-danger pl-2"><?php echo e(Session::get('msg')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>

    </div>

    <button type="button" class="btn btn-rounded btn-mm float-left"><a href="<?php echo e(route('date.time')); ?>" class="text-white">
            ← Back </a></button>
    <button type="submit" class="btn btn-rounded float-right btn-mm">Finish <i class="fa fa-check"></i></button>
    </form>
    <?php else: ?>
    <form action="<?php echo e(route('user.do-register')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">

            <div class="checkbox-detailed text-left" id="others-checkbox">
                <input type="radio" name="type" id="type-others" value="self" checked />
                <label for="type-others">
                    <span class="checkbox-detailed-tbl">
                        <span class="checkbox-detailed-cell">
                            <span class="checkbox-detailed-title">Sign Up </span>
                            Sign Up and be a member
                        </span>
                    </span>
                </label>
            </div>

            <div class="checkbox-detailed text-left d-none" id="self-checkbox">
                <input type="radio" name="type" id="type-self" value="self" />
                <label for="type-self">
                    <span class="checkbox-detailed-tbl">
                        <span class="checkbox-detailed-cell">
                            <span class="checkbox-detailed-title">Guist</span>
                            Order as Guest
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
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control m-0">
                        </div>
                    </div>

                    <?php if($errors->has('name')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                    <?php endif; ?>

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
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="">+88</span>
                            </div>
                            <input type="text" name="phone_no" id="phone_no" placeholder="Others Phone"
                                class="form-control m-0">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xl-4">
                        <label class="form-label ">
                            <i class="font-icon font-icon-lock"></i>
                            Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group date">
                            <input type="password" id="password" name="password" class="form-control m-0">
                            <?php if(Session::has('msg')): ?>
                            <span class="text-danger pl-2"><?php echo e(Session::get('msg')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-xl-4 ">
                        <label class="form-label text-left">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i class="font-icon font-icon-map"></i>
                            Area
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group">
                            <select name="area" id="sa" onchange="combomap(this.value)"
                                class="form-control form-control m-0">
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

                <input type="text" name="user_type" value="user" hidden>
                <input type="text" name="reason" value="ok" hidden>

                <div class="form-group row">
                    <div class="col-xl-4">
                        <label class="form-label">
                            <i class="font-icon font-icon-map"></i>
                            Address <span class="invisible">Others</span>
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group">
                            <textarea name="address" id="address" class="form-control m-0"
                                placeholder="House No. 51 , Road No. 12 , Shekhertek , Mohammadpur" cols="30"
                                rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row refer">
                <div class="col-xl-4">
                    <label class="form-label ">
                        <i class="font-icon font-icon-answer"></i>
                        Referral Code &nbsp;&nbsp;<small> (optional)</small>
                    </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group date">
                        <input type="text" id="refrral" placeholder="34AVSD87" name="ref_code" class="form-control m-0">
                        <?php if(Session::has('msg')): ?>
                        <span class="text-danger pl-2"><?php echo e(Session::get('msg')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        </div>

        <button type="button" class="btn btn-rounded btn-mm float-left"><a href="<?php echo e(route('date.time')); ?>"
                class="text-white">
                ← Back </a></button>
        <button type="submit" class="btn btn-rounded float-right btn-mm">Finish <i class="fa fa-check"></i></button>
    </form>
    <?php endif; ?>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>

<script>
    $(document).ready(function(){
        $('.others-area').show();
        $('#others-checkbox').click(function() {
            if($('#type-others').is(':checked')) { 
                $('.others-area').show();
                $('.refer').hide();
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>