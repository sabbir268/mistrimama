<?php $__env->startSection('body'); ?>

<h1 class="page-title">General Setting
    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">

        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage General Setting </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>name</th>
                            <th>Value</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($model->setting_name); ?></td>
                            <td><?= $model->setting_value ?></td>

                            <td  class="align-center">
                                <a class="btn blue btn-xs" href="<?php echo e(route('general-setting.edit',$model->id)); ?>">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php echo $models->appends(Input::except('page'))->render(); ?>

            </div>
        </div>
    </div>
</div>
<style>
    .table tbody tr td{        
        word-break: break-all;
        padding: 10px;
    }
    .table tbody tr:first-child td{
        width: 200px;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.general-setting.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>