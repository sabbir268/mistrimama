<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/elements/steps.min.css')); ?>">



<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

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
        
        <form action="<?php echo e(route('add.order-confirm')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                
                
                
                <div class="others-area" style="display:block">
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
                                    class="form-control m-0" required>
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
                                    class="form-control m-0" required>
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
                                    class="form-control form-control m-0" required>
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

                <div class="form-group row">
                    <div class="col-xl-4 ">
                        <label class="form-label text-left">
                            &nbsp;<i class="font-icon font-icon-map"></i>
                            Comrades
                            
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group">
                            <select name="comrade_id" id="comrade" onchange="combomap(this.value)" 
                                class="form-control form-control m-0" required>
                                <option value="">Select Comrade</option>
                                <?php $__currentLoopData = $comrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($comrade->id); ?>"><?php echo e($comrade->c_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="text" name="type" id="others" value="others" hidden  />
                <input type="text" name="service_provider_id" value="<?php echo e($providers->id); ?>" hidden>
                <input type="text" name="order_id" value="<?php echo e($order_id); ?>" hidden>
                <input type="text" name="user_id" value="<?php echo e(auth()->user()->id); ?>" hidden>

                
            </div>

    </div>

    <button type="button" class="btn btn-rounded btn-mm float-left">← Back</button>
    <button type="submit" class="btn btn-rounded float-right btn-mm">Finish <i class="fa fa-check"></i></button>
    </form>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>