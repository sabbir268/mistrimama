<?php $__env->startSection('body'); ?>








<h1 class="page-title">Pages
    <small></small>
<!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        
        <?php /* ?>
        <div class="row">
            <div class="col-md-12">

                <div class="portlet box purple ">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> Advance Search </div>
                        <div class="tools">
                            <a href="" class="<?= isset($_GET['advanceSearch']) ? "collapse" : "expand" ?>"><i class="icon-collapse"></i></a>
                        </div>
                    </div>
                    <div class="portlet-body form" style="display: <?= isset($_GET['advanceSearch']) ? "block" : "none" ?>">



                        {!! Form::open(['method'=>'GET','url'=>route('wieso.index'),'class'=>'form-horizontal','role'=>'search'])  !!}
                        {!! Form::hidden('pageSize', null, array('class' => 'pageSize')) !!}
                        <div class="form-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label" >Author Name</label>
                                    <div class="col-md-7">
                                        {!! Form::text('author_name', null, array('placeholder' => 'Author Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="Candidates_phone2">Testimonial</label>
                                    <div class="col-md-7">
                                        {!! Form::text('testimonial', null, array('placeholder' => 'Testimonial','class' => 'form-control')) !!}
                                    </div>
                                </div>


                            </div>
                            <div class="clearfix"></div>
                            <div class="form-actions" style="text-align: center">
                                <input class="btn green search_btn" type="submit" name="advanceSearch" value="Search">
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div><!-- search-form -->
                </div>
            </div>
        </div>
        <?php */ ?>


        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Pages </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>Title</th>

                            <th>Last Updated on</th>
                            <th class="align-center">Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td><?php echo e($model->title); ?></td>
                            <td><?php echo e($model->updated_at); ?></td>


                            <td  class="align-center">
                                <a class="btn btn-warning btn-xs" href="<?php echo e(route('cms.edit',$model->id)); ?>"><i class="fa fa-edit"></i></a>
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

<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>