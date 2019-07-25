 
<?php $__env->startSection('body'); ?>

<h1 class="page-title">Booking
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Booking <?php echo e(count($models)); ?></div> 

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>User</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Created At</th>
                            <th class="align-center">Action </th>
                            <th>Job Status</th>
                        </tr>
                    </thead>
                    <tbody>
                     <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($model->users ? $model->users->name : '-'); ?></td>
                            <td><?php echo e($model->category->name); ?></td>
                            <td><?php echo e($model->booking_date); ?></td>
                            <td><?php echo e($model->booking_time); ?></td>
                            <td><?php echo e($model->created_at); ?></td>
                            <td class="align-center">
                                <?php if($model->isAllocated() == false): ?>
                            <a class="btn btn-primary" data-toggle="modal"
                               data-target="#myModal-<?php echo e($model->id); ?>"
                               data-item="<?php echo e($model->id); ?>"
                               <?php if($model->category->job_done == true): ?>
                                disabled="disabled"
                                    <?php endif; ?> >
                                    Allocate Service Provider
                                </a>
                                    <?php else: ?>
                                    <a class="btn btn-primary" disabled="disabled">
                                        Allocated
                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($model->category->job_done == false): ?>
                                    <button type="button" class="btn btn-warning"  disabled="disabled">Not Complete</button>
                                <?php endif; ?>
                                <?php if($model->category->job_done == true): ?>
                                    <button type="button" class="btn btn-success" disabled="disabled">Job Completed</button>
                                <?php endif; ?>
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
<?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="myModal-<?php echo e($model->id); ?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Service Provider</h4>
            </div>
            <form method="post" action="<?php echo e(route('service_provider_allocate')); ?>">
                <input type="hidden" name="booking_id" value="<?php echo e($model->id); ?>" />
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Services Provider List:</label>
                                    <select class="form-control" name="service_provider_id" required="required">
                                        <option value="">Select provider</option>
                                        <?php $__currentLoopData = $service_providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Client:</label>
                                    <select class="form-control" name="user_id">
                                        <option value="<?php echo e($model->users ? $model->users->id : '-'); ?>"><?php echo e($model->users ? $model->users->name : '-'); ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Service:</label>
                                    <select class="form-control" name="category_id">
                                        <option value="<?php echo e($model->category->id); ?>"><?php echo e($model->category->name); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Allocate</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>