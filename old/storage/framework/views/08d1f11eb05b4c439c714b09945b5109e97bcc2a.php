 
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/clockpicker/bootstrap-clockpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('topbar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('sidebar'); ?> 

<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('content'); ?>

<section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
        <ul style="margin-left: -11.7656px; margin-right: -11.7656px;">
            <li class="active">
                <div class="icon">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Area & Category</div>
            </li>
            <li class="active">
                <div class="icon">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li class="active">
                <div class="icon">
                    <i class="font-icon font-icon-calend"></i>
                </div>
                <div class="caption">Date & Time</div>
            </li>
            <li>
                <div class="icon">
                    <i class="font-icon font-icon-check-bird"></i>
                </div>
                <div class="caption">Confirmation</div>
            </li>
        </ul>
    </div>

    <header class="steps-numeric-title">Customer information</header>
    <form action="<?php echo e(route('store-date-time')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <!-- <div class="row">
          <div class="form-group col-xs-6 calanderDiv">
              <input id="datepicker" class="datepicker" name="date" placeholder="Choose a Date"/>
          </div>
          <div class="form-group col-xs-6 calanderDiv">
              <input id="timepicker" class="timepicker" name="time" placeholder="Choose a Time"/>
          </div>
  </div>-->

        <div class="col-xl-6 offset-md-3 ">
            <div class="form-group row">
                <div class="col-xl-4">
                    <label class="form-label">
                    <i class="font-icon font-icon-calend"></i>
                    Select Date
                </label>
                </div>
                <div class="col-xl-8">
                    <div class="input-group date">
                        <input type="text" name="date" id="booking_date" class="form-control" placeholder="Chose Date" required>
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
                        
                        <select name="time" id="booking_time" class="form-control">
                            <option value="">Chose Time</option>
                            <option value="12:00 AM">12:00 AM </option>
                            <option value="1:00 AM">01:00 AM </option>
                            <option value="2:00 AM">02:00 AM  </option>
                            <option value="3:00 AM">03:00 AM </option>
                            <option value="4:00 AM">04:00 AM </option>
                            <option value="5:00 AM">05:00 AM  </option>
                            <option value="6:00 AM">06:00 AM  </option>
                            <option value="7:00 AM">07:00 AM  </option>     
                            <option value="8:00 AM">08:00 AM </option>
                            <option value="9:00 AM">09:00 AM   </option>
                            <option value="10:00 AM">10:00 AM  </option>
                            <option value="11:00 AM">11:00 AM   </option>
                            <option value="12:00 PM">12:00 PM  </option>
                            <option value="1:00 PM">01:00 PM   </option>
                            <option value="2:00 PM">02:00 PM  </option>
                            <option value="3:00 PM">03:00 PM   </option>
                            <option value="4:00 PM">04:00 PM</option>
                            <option value="5:00 PM">05:00 PM  </option>
                            <option value="6:00 PM">06:00 PM  </option>
                            <option value="7:00 PM">07:00 PM </option>
                            <option value="8:00 PM">08:00 PM   </option>
                            <option value="9:00 PM">09:00 PM   </option>
                            <option value="10:00 PM">10:00 PM  </option>
                            <option value="11:00 PM">11:00 PM</option> 
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-rounded btn-grey float-left"> <a href="<?php echo e(route('show-booking-services')); ?>">← Back</a></button>
        <button type="submit" class="btn btn-rounded float-right">Submit</button>
    </form>
</section>
<?php $__env->stopSection(); ?>
 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/clockpicker/bootstrap-clockpicker-init.js')); ?>"></script>
<script>
    $('#booking_date').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>