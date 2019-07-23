<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
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
                <div class="caption">Area & Service</div>
            </li>
            <li class="">
                <div class="icon">
                    <i class="font-icon font-icon-pin-2"></i>
                </div>
                <div class="caption">Delivery</div>
            </li>
            <li>
                <div class="icon">
                    <i class="font-icon font-icon-card"></i>
                </div>
                <div class="caption">Payment</div>
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
    <div class="form-group">
        <input type="text" class="form-control" placeholder="E-Mail">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" placeholder="Repeat password">
    </div>
    <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button>
    <button type="button" class="btn btn-rounded float-right">Next →</button>
</section>

<div class="col-md-12 bg-white box-typical">
    <form action="<?php echo e(url('bookingfrm-show-category')); ?>"  method="post" >
        <?php echo e(csrf_field()); ?>

        <div class="select-item">
            <select name="area" id="sa" onchange="combomap(this.value)" style="text-transform:none;" class="form-control">
                <option value="0"  selected="false" class="locationDropdown">Select Area</option>
                <option value="XMLID_1655_">Azimpur</option>
                <option value="XMLID_1652_">Badda</option>
                <option value="XMLID_1870_">Baridhara</option>
                <option value="XMLID_1752_">Dhanmondi</option>
                <option value="XMLID_1791_">Gulshan</option>
                <option value="XMLID_1646_">Khilkhet</option>
                <option value="XMLID_1665_">Khilgaon</option>
                <option value="XMLID_1746_">Mirpur</option>
                <option value="XMLID_1738_">Mohammadpur</option>
                <option value="XMLID_1658_">Motijheels</option>
                <option value="XMLID_1765_">New Market</option>
                <option value="XMLID_1749_">Old Dhaka</option>
                <option value="XMLID_1768_">Ramna</option>
                <option value="XMLID_1839_">Tejgaon</option>
                <option value="XMLID_1661_">Uttara</option>
            </select>
        </div>
        <div class="select-item">
            <select name="category" id="ss"  class="servicesDropdown" style="text-transform:none;">
                <option  selected="true" value="0">Select Service</option>
                <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="select-item" style="margin-left: -4px;">
        <button type="button" id="show-model" data-toggle="modal"
                            data-target="#loginModal" style="display:none"></button>
            <button type="submit" class="btn bookingBtn"    style="width: 100%;height: 33px; padding-top: 7px; border-radius: 0px;">BOOK NOW</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>