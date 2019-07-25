<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('service-provider.common.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php echo $__env->make('service-provider.common.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="boxed">
            <div id="content-container">
                <div id="page-head">
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Bookings</h1>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/service-provider-dashboard')); ?>"><i class="demo-pli-home"></i></a></li>
                        <li><a href="<?php echo e(url('/service-provider-dashboard/bookings')); ?>">Bookings</a></li>
                        <li class="active">Manage Bookings</li>
                    </ol>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
                        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
                        <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div id="page-content">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Bookings</h3>
                        </div>
                        <div class="panel-body">
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                        <th>Job Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($value->id); ?></td>
                                        <td><?php echo e($value->name); ?></td>
                                        <td>

                                            <button class="btn btn-purple" type="button" data-toggle="modal" data-target="#myModal-<?php echo e($value->id); ?>" <?php if($value->job_done == true): ?>
                                                disabled="disabled"
                                            <?php endif; ?>>Allocate Service Provider Comrad
                                            </button>
                                        </td>
                                        <td>
                                            <?php if($value->job_done == true): ?>
                                            <button type="button" class="btn btn-success">Completed</button> <?php endif; ?> <?php if($value->job_done
                                            == false): ?>
                                            <button type="button" class="btn btn-warning">Not-Completed</button> <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <?php echo $__env->make('service-provider.common.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php echo $__env->make('service-provider.common.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="modal fade" id="myModal-<?php echo e($value->id); ?>" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Service Provider Comrad</h4>
                </div>
                <form method="post" action="<?php echo e(route('bookings.update', $value->id)); ?>">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="_method" value="PUT">
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="email">Services Provider Comrad List:</label>
                                        <select class="form-control" name="service_provider_comrad_id" required="required">
                                            <option value="">Select provider comrad</option>
                                            <?php $__currentLoopData = $service_providers_comrads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->c_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Service:</label>
                                        <select class="form-control" name="category_id">
                                            <option value="<?php echo e($value-> id); ?>"><?php echo e($value->name); ?></option>
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
    <?php echo $__env->make('service-provider.common.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>