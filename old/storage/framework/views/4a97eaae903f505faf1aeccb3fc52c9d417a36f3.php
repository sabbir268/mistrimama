<?php $__env->startSection('body'); ?>
<h1 class="page-title"> User
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update  User</div>

            </div>
             
            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>


            <div class="portlet-body form">
                <?php echo Form::model($users, ['method' => 'PATCH','files' => true , 'route' => ['profile-update', $users->id], 'class'=>'form-horizontal']); ?>

                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <?php echo Form::text('email', null, array('placeholder' => 'email','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('email'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">DOB</label>
                        <div class="col-md-9">
                            <?php echo Form::text('dob', null, array('data-date-format'=>"yyyy-mm-dd",'placeholder' => 'Date Of Birth','class' => 'form-control date-picker')); ?>

                            <span class="bg-danger"><?= $errors->first('dob'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Phone</label>
                        <div class="col-md-9">
                            <?php echo Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('phone'); ?></span>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label">Street</label>
                        <div class="col-md-9">
                            <?php echo Form::text('street', null, array('placeholder' => 'Street','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('street'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Locality</label>
                        <div class="col-md-9">
                            <?php echo Form::text('locality', null, array('placeholder' => 'Locality','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('locality'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Town</label>
                        <div class="col-md-9">
                            <?php echo Form::text('town', null, array('placeholder' => 'Town','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('town'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Postcode</label>
                        <div class="col-md-9">
                            <?php echo Form::text('postcode', null, array('placeholder' => 'Postcode','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('postcode'); ?></span>
                        </div>
                    </div>




                </div>
                <div class="form-actions right1">
                    <button type="submit" class="btn green">Submit</button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>





<?php $__env->stopSection(); ?>
<?php $__env->startSection('pagescript'); ?>

<script src="<?php echo e(asset('admin/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>

<link href="<?php echo e(asset('admin/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>" rel="stylesheet" type="text/css" />

<script>
    $('.date-picker').datepicker({
        // dateFormat: 'YY-mm-dd'
        autoclose: true
    });
//    $('.date-picker').datepicker({
//            orientation: "left",
//    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>