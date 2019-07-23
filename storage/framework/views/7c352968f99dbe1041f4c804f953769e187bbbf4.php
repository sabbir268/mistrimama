<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/flatpickr/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/flatpickr.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/bootstrap-daterangepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>

<?php $__env->stopSection(); ?>

<?php 
    $disabledStatus = null;
?>
<?php $__env->startSection('content'); ?>
<div class="col-md-12 bg-white box-typical">
    <div class="row">
        <div class="col-md-5">
                <section class="box-typical-section">
                <header class="box-typical-header panel-heading btn">
                        <h3 class="panel-title">Modify Image</h3>
                </header>
                <div class="col-xs-6 offset-xs-2 col-md-6 offset-md-2 pt-5">
                    <div class="uploading-container-left text-center">
                            <div class="drop-zone">
                                <i class="font-icon font-icon-cloud-upload-2"></i>
                                <div class="drop-zone-caption">Drag file to upload</div>
                                <span class="btn btn-rounded btn-file">
                                    <span>Choose file</span>
                                    <input type="file" name="files[]" multiple="">
                                </span>
                            </div>
                        </div>
                </div>
            </section>
                
        </div>
        <div class="col-md-7">
            <section class="box-typical-section">
                <header class="box-typical-header panel-heading btn">
                        <h3 class="panel-title">Modify Info</h3>
                </header>
                <?php echo Form::model($users, ['method' => 'POST','route' => ['user-profile-update'] ]); ?>

                
                <div class="form-group row pt-5">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-user"></i>
                            Name
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <?php echo Form::text('name', null,[$disabledStatus,'maxlength'=>'190','class'=>'form-control']); ?>

                        <span class="error"><?php echo e($errors->first('name')); ?></span>
                    </div> 
                </div>
                
                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-event"></i>
                            Birth Date
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <div class="input-group date">
                                <?php echo Form::text('date_of_birth', null,['id'=>'date_of_birth',$disabledStatus,'placeholder'=>'1970-12-30','class'=>'form-control']); ?>

                                <span class="input-group-append">
                                    <span class="input-group-text"><i class="font-icon font-icon-calend"></i></span>
                                </span>
                        </div>
                        <span class="error"><?php echo e($errors->first('date_of_birth')); ?>  </span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-phone"></i>
                            Phone
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <?php echo Form::text('phone_no', null,['maxlength'=>'18',$disabledStatus,'id'=>'phone_no','class'=>'form-control']); ?>

                        <span class="error"><?php echo e($errors->first('phone')); ?></span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xl-3">
                        <label class="form-label">
                            <i class="font-icon font-icon-pin-2"></i>
                            Address
                        </label>
                    </div>
                    <div class="col-xl-8">
                        <?php echo Form::textarea('address', null,['placeholder'=>'House # 00 , Road # 00 , Place , Area ....','maxlength'=>'200',$disabledStatus,'class'=>'form-control', 'cols'=>'10', 'rows'=>'2']); ?>

                        <span class="error"><?php echo e($errors->first('address')); ?></span>
                    </div>
                </div>
            
                <div class="form-group row">
                    <div class="col-xl-12">
                        <button  type="submit" style="color:#fff !important" class="form-control btn-success">
                            Update Info
                        </button>
                    </div>
                </div>
                <?php echo Form::close(); ?> 
            </section>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/moment/moment-with-locales.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('dashboard/js/lib/flatpickr/flatpickr.min.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/js/lib/daterangepicker/daterangepicker.js')); ?>"></script>
<script>
    $('#date_of_birth').daterangepicker({
		singleDatePicker: true,
		showDropdowns: true
	});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('web.user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.user.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>