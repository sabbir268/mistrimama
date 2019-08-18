<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/lobipanel/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/vendor/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/lib/jqueryui/jquery-ui.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('dashboard/css/separate/pages/widgets.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('topbar'); ?>
<?php echo $__env->make('esp.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('esp.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php 
    $disabledStatus = null;
?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb bg-white mb-1">
            <li><a href="<?php echo e(route('esp-dashboard')); ?>">ড্যাশবোর্ড </a></li>
            <li><a href="#">সহকারী</a></li>
        </ol>
    </div>
</div>
<div class="container bg-light">
    <div class="row">
        <div class="col-md-12">
            <?php echo Form::model($comrades, ['method' => 'POST','files' => true,'route' => ['esp.comrade.update'] ]); ?>


            <input type="text" value="<?php echo e($comrades->id); ?>" name="id" hidden>
            <div class="form-group row pt-5">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-user"></i>
                        Name
                    </label>
                </div>
                <div class="col-xl-8">
                    <?php echo Form::text('c_name', null,[$disabledStatus,'maxlength'=>'190','class'=>'form-control']); ?>

                    <span class="error"><?php echo e($errors->first('c_name')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Phone No.
                    </label>
                </div>
                <div class="col-xl-8">
                    <?php echo Form::text('c_phone_no',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'c_phone_no','class'=>'form-control']); ?>

                    <span class="error"><?php echo e($errors->first('c_phone_no')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Alt. Phone No.
                    </label>
                </div>
                <div class="col-xl-8">
                    <?php echo Form::text('c_alt_phone_no',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'c_alt_phone_no','class'=>'form-control']); ?>

                    <span class="error"><?php echo e($errors->first('c_alt_phone_no')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-event"></i>
                        Email
                    </label>
                </div>
                <div class="col-xl-8">
                    <?php echo Form::email('email',
                    null,['maxlength'=>'13',$disabledStatus,'id'=>'email','class'=>'form-control']); ?>

                    <span class="error"><?php echo e($errors->first('email')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID No.
                    </label>
                </div>
                <div class="col-xl-5">
                    <?php echo Form::text('c_nid',null,['class'=>'form-control']); ?>

                    <span class="error"><?php echo e($errors->first('c_nid')); ?></span>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        Comrade Image
                    </label>
                </div>
                <div class="col-xl-5">
                    <?php echo Form::text('c_pic',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']); ?>

                    <span class="error"><?php echo e($errors->first('c_pic')); ?></span>
                </div>
                <div class="col-xs-4 ">
                    <img height="120" width="120" src="<?php echo e($comrades->c_pic ? $comrades->c_nic_front : 'http://'); ?> "
                        alt="" class="img-responsive rounded">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID Front
                    </label>
                </div>
                <div class="col-xl-5">
                    <?php echo Form::text('c_nic_front',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']); ?>

                    <span class="error"><?php echo e($errors->first('c_nic_front')); ?></span>
                </div>
                <div class="col-xs-4 ">
                    <img height="120" width="120"
                        src="<?php echo e($comrades->c_nic_front ? $comrades->c_nic_front : 'http://'); ?> " alt=""
                        class="img-responsive rounded">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-xl-3">
                    <label class="form-label">
                        <i class="font-icon font-icon-pin-2"></i>
                        NID Back
                    </label>
                </div>
                <div class="col-xl-5">
                    <?php echo Form::text('c_nic_back',null,['class'=>'form-control',"onclick" =>
                    "openKCFinder(this)","readonly",'placeholder'=>'Choosefile']); ?>

                    <span class="error"><?php echo e($errors->first('c_nic_back')); ?></span>
                </div>
                <div class="col-xl-4 p-0">
                    <img height="120" width="120" src="<?php echo e($comrades->c_nic_back ? $comrades->c_nic_back : 'http://'); ?> "
                        alt="" class="img-responsive rounded">
                </div>

            </div>

            <div class="form-group row">
                <div class="col-xl-12">
                    <button type="submit"  class="form-control btn-mm">
                        তথ্য আপডেট 
                    </button>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main-dash', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>