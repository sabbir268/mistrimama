<?php $__env->startSection('body'); ?>

    <h1 class="page-title">FAQ's
        <small></small>
        <a href="<?php echo e(route('faq.create')); ?>" class="btn btn-primary float-right"> Create </a>
    </h1>
    <div class="row">
        <div class="col-md-12">
             
            

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage How It Works </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Type</th>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Status</th>
                                <th class="align-center action-wraper">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <?php echo e(getFaqType($model->type)); ?>

                                </td>

                                <td><?php echo e($model->question); ?></td>
                                <td><?php echo e(str_limit($model->answer,100,"..")); ?></td>
                                <td><?= $model->status ? "<span class='label label-sm label-success'> Active </span>" : "<span class='label label-sm label-danger'> Inactive </span>" ?></td>
                                
                                <td  class="align-center">
                                    <div class="action-wraper">
                                    <a class="btn blue btn-xs" title="View" href="<?php echo e(route('faq.show',$model->id)); ?>">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-warning btn-xs" title="Edit" href="<?php echo e(route('faq.edit',$model->id)); ?>">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php echo Form::open(['method' => 'DELETE','route' => ['faq.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]); ?>

                                    <button type="submit" class="btn red btn-xs"><i class="fa fa-trash"></i></button>
                                    <?php echo Form::close(); ?>

                                    </div>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.faq.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>