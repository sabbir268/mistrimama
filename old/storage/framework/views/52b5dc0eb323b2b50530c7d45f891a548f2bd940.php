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
                    <i class="fa fa-cogs"></i>Withdraw Request
                </div>
                <a href="#" data-toggle="modal" data-target="#withdraw_import" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Mass Import</a>
                <a href="<?php echo e(route('admin.withdraw.export')); ?>" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Export CSV</a>
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
                                <form action="<?php echo e(route('admin.withdraw.approve')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="text" value="<?php echo e($withdraw->id); ?>" name="id" hidden>
                                    <input type="text" value="1" name="status" hidden>
                                    <button type="submit" class="btn btn-primery">Accept</button>
                                </form>
                                
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



<div class="modal fade" id="withdraw_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mass Import Recharge Request Data Cross macth</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.withdraw.import')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="status">Upload CSV File</label>
                        <input type="file" name="withdraw_file" class="form-control">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>