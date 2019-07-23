 
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
                        <i class="fa fa-cogs"></i>Service History</div>
                </div>
        
        
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Order No</th>
                                <th>Category</th>
                                <th>Client Name</th>
                                <th>Date/Time</th>
                                <th>Providers</th>
                                <th>Comrade</th>
                                <th class="align-center">View</th>
                                <th class="align-center">Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($allorders): ?>
                            <?php $__currentLoopData = $allorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($actorder->order->order_no); ?></td>
                                <td><?php echo e($actorder->order->category->name); ?></td>
                                <td><?php echo e($actorder->user->name); ?></td>
                                <td><?php echo e($actorder->order->order_date); ?>/<?php echo e($actorder->order->order_time); ?></td>
                                <td><?php echo e($actorder->provider->name); ?></td>
                                <td><?php echo e($actorder->comrade->c_name); ?></td>
                                <td class="align-center"><a class="btn btn-primary" data-toggle="modal" data-target="#view-act-<?php echo e($actorder->id); ?>" data-item="<?php echo e($actorder->id); ?>">
                                            View Details
                                        </a>
                                </td>
                                <td class="align-center">
                                        <?php if($actorder->order->status == 1): ?>
                                        <span class="text-warning">Comrade On The way</span>
                                        <?php endif; ?>  
                                        <?php if($actorder->order->status == 2): ?>
                                                <span class="text-danger">Comrade working on service.</span>
                                        <?php endif; ?>
                                        <?php if($actorder->order->status == 3): ?>
                                                <span class="text-success">Comrade has finish his job. And witing for payment.</span>
                                        <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($allorders->links()); ?>

                    
                    <?php endif; ?>
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>