<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <li class="">
                <div class="icon">
                    <i class="fa fa-list-ul"></i>
                </div>
                <div class="caption">Services</div>
            </li>
            <li>
                <div class="icon">
                    <i class="font-icon font-icon-card"></i>
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

    <header class="steps-numeric-title">Area & Services</header>
    <form action="<?php echo e(route('create.order')); ?>"  method="post" >
    <?php echo e(csrf_field()); ?>

    <div class="col-xl-6 offset-md-3 ">
    <div class="form-group row">
        <div class="col-xl-4">
            <label class="form-label">
                <i class="font-icon font-icon-pin-2"></i>
                Select Area
            </label>
        </div>
        <div class="col-xl-8">
            <div class="input-group">
                <select name="area" id="sa" onchange="combomap(this.value)" style="text-transform:none;" class="form-control" required>
                    <option value=""  selected="false" class="locationDropdown">Select Area</option>
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
        </div>
    </div>

    <div class="form-group row">
        <div class="col-xl-4">
            <label class="form-label">
                <i class="font-icon font-icon-case-2"></i>
                Select Service
            </label>
        </div>
        <div class="col-xl-8">
            <div class="input-group">
                <select name="category" id="ss"  class="form-control" style="text-transform:none;" required>
                    <option  selected="true" value="">Select Service</option>
                    <?php $__currentLoopData = $services_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>
</div>
    
    <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button>
    <button type="submit" class="btn btn-rounded float-right">Next →</button>
</form>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>