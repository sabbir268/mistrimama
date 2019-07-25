<?php $__env->startSection('body'); ?>

    <h1 class="page-title">Blog Category
        <small></small>
        
        <a href="<?php echo e(route('blog-category.create')); ?>" class="btn btn-primary float-right"> Create </a>
    </h1>
    <div class="row">
        <div class="col-md-12">
             
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-search"></i> Search </div>
                            <div class="tools">
                                <a href="" class="<?= isset($_GET['advanceSearch']) ? "collapse" : "expand" ?>"><i class="icon-collapse"></i></a>
                            </div>
                        </div>
                        <div class="portlet-body form" style="display: <?= isset($_GET['advanceSearch']) ? "block" : "none" ?>">



                            <?php echo Form::open(['method'=>'GET','url'=>route('blog-category.index'),'class'=>'form-horizontal','role'=>'search']); ?>


                            <div class="form-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label" >Name</label>                    
                                        <div class="col-md-7">
                                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                                        </div>
                                    </div>

                                     

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label" for="Candidates_phone2">Display Name</label>                    
                                        <div class="col-md-7">
                                            <?php echo Form::text('display_name', null, array('placeholder' => 'Display Name','class' => 'form-control')); ?>

                                        </div>
                                    </div>

                                     


                                </div>
                                <div class="clearfix"></div>
                                <div class="form-actions" style="text-align: center">
                                    <input class="btn green" type="submit" name="advanceSearch" value="Search">            
                                </div>

                            </div>
                            <?php echo Form::close(); ?>

                        </div><!-- search-form -->
                    </div>
                </div>
            </div>

            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-cogs"></i>Manage Blog Category </div>

                </div>


                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Url</th>
                                <th class="align-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($model->title); ?></td>
                                <td><img width="150px" src='<?php echo e(asset("images/blog-category/".$model->image)); ?>'></td>
                                <td><?php echo e($model->url); ?></td>
                                <td  class="align-center">
                                    <a class="btn btn-info" href="<?php echo e(route('blog-category.show',$model->id)); ?>">Show</a>
                                    <a class="btn btn-primary" href="<?php echo e(route('blog-category.edit',$model->id)); ?>">Edit</a>
                                    <?php echo Form::open(['method' => 'DELETE','route' => ['blog-category.destroy', $model->id],'style'=>'display:inline', 'onsubmit'=>"return confirm('Are you sure?')"  ]); ?>

                                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger']); ?>

                                    <?php echo Form::close(); ?>

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

<?php echo $__env->make('admin.blog-category.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>