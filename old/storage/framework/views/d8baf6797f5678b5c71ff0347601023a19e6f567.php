 
<?php $__env->startSection('body'); ?>

<h1 class="page-title">Withdraw Request
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
                        <i class="fa fa-cogs"></i>Withdraw Request</div>
                </div>
        
                <div class="portlet-body flip-scroll">
                    <table class="table table-bordered table-striped table-condensed flip-content">
                        <thead class="flip-content">
                            <tr>
                                <th>Name</th>
                                <th>User Type</th>
                                <th>Amount</th>
                                <th>MFS Number</th>
                                <th>Details</th>
                                <th class="align-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($WithDrawAll): ?>
                            <?php $__currentLoopData = $WithDrawAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($withdraw->user ? $withdraw->user->name : '-'); ?></td>
                                <td> <?php if($withdraw->type == 'rp' ): ?> User <?php else: ?> Service Provider <?php endif; ?></td>
                                <td><?php echo e($withdraw->amount); ?></td>
                                <td><?php echo e($withdraw->mfs_number); ?></td>
                                <td><?php echo e($withdraw->details); ?></td>
                                <td class="align-center">
                                    <button class="btn btn-primery">Accept</button>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <?php echo e($WithDrawAll->links()); ?>


                    <?php endif; ?>
                    
                </div>
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>