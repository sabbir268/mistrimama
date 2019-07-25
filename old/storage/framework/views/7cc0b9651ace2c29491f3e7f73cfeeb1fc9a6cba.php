<?php $__env->startSection('body'); ?>
<link href="<?php echo e(asset('/admin/global/plugins/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
<script src="<?php echo e(asset('/admin/global/plugins/icheck/icheck.min.js')); ?>" type="text/javascript"></script>

<h1 class="page-title">General Setting
    <small></small>
</h1>
<div class="row">

    <div class="col-md-12 ">
        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-gift"></i> Update General Setting</div>
            </div>

            <div class="portlet-body form">
                <?php echo Form::model($model, ['method' => 'PATCH','files' => true , 'route' => ['general-setting.update', $model->id], 'class'=>'form-horizontal']); ?>

                <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>


                <div class="form-body">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Name</label>
                        <div class="col-md-9">
                            <?php echo Form::text('setting_name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                            <span class="bg-danger"><?= $errors->first('setting_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Value</label>
                        <div class="col-md-9">


                            <?php if ($model->field_type == 2) { ?>
                                <img src="<?php echo e($model->setting_value); ?>" id="preview" width="150px">
                                <?php echo Form::text('setting_value', null, array('placeholder' => 'Value','class' => 'form-control', 'id'=>"thumbnail" ,"onclick"=>"openKCFinder(this)" )); ?>

                            <?php } else if ($model->field_type == 3) { ?>
                                <a target="_blank" href="<?php echo e($model->setting_value); ?>" >Download</a>
                                <?php echo Form::text('setting_value', null, array('placeholder' => 'Value','class' => 'form-control', 'id'=>"thumbnail" ,"onclick"=>"openKCFinderFile(this)" )); ?>

                            <?php } else if ($model->field_type == 4) { ?>

                                <?php echo Form::textarea('setting_value', null, array('placeholder' => 'Value','class' => 'form-control')); ?>

                            <?php } else { ?>
                                <?php echo Form::text('setting_value', null, array('placeholder' => 'Value','class' => 'form-control')); ?>

                            <?php } ?>

                            <span class="bg-danger"><?= $errors->first('setting_value'); ?></span>
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
    <!-- END SAMPLE TABLE PORTLET-->

</div>


<script type="text/javascript">



    function SetUrl(url){
    $('#thumbnail').val(url);
    $('#preview').attr('src', url);
    }


    function openKCFinder(field) {
    ///alert('asd')
//    window.KCFinder = {
//        callBack: function(url) {
//            alert("asd");
//            field.value = url;
//            window.KCFinder = null;
//        }
//    };

    window.open('<?php echo e(url("/laravel-filemanager?type=Images")); ?>', 'kcfinder_textbox',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
            'resizable=1, scrollbars=0, width=800, height=600'
            );
    }

    function openKCFinderFile(field){
    window.open('<?php echo e(url("/laravel-filemanager?type=files")); ?>', 'kcfinder_textbox',
            'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
            'resizable=1, scrollbars=0, width=800, height=600'
            );
    }
</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.general-setting.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>