<?php $__env->startSection('body'); ?>

<h1 class="page-title">Recharge Request
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>
                    All Recharge Request
                </div>
                
                <a href="#" data-toggle="modal" data-target="#recharge_import" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Mass Import</a>
                <a href="<?php echo e(route('admin.recharge.export')); ?>" style="margin-top: 3px;" class="btn btn-default float-right pt-2">Export CSV</a>
                
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>SP Name</th>
                            <th>SP Category</th>
                            <th>Media</th>
                            <th>Actual Amount</th>
                            <th>Media Charge</th>
                            <th>ESP Amount</th>
                            <th>TXN. NO</th>
                            <th class="align-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($requests): ?>
                        <?php
                        $i = 1;
                        ?>
                        <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?> <?php $i++ ?> </td>
                            <td><?php echo e($request->user ? $request->user->sp->name : ''); ?></td>
                            <td>
                                <?php if($request->user): ?>
                                <?php echo e($request->user->sp->service_category == 20 ? 'Starter' : (($request->user->sp->service_category == 15) ? 'Expert' : 'Professional')); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($request->mfs); ?></td>
                            <td><?php echo e($request->amount - ($request->amount * MfsCharge($request->mfs)/100)); ?></td>
                            <td><?php echo e(MfsCharge($request->mfs)); ?></td>
                            <td><?php echo e($request->amount); ?></td>
                            <td><?php echo e($request->trxn); ?></td>
                            <td class="align-center">
                                <div class="btn-group">
                                    <?php if($request->status == 0): ?>
                                    <form action="<?php echo e(route('admin.recharge.approve')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" value="<?php echo e($request->id); ?>" name="id" hidden>
                                        <input type="text" value="1" name="status" hidden>
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>

                                    <form action="<?php echo e(route('admin.recharge.approve')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" value="<?php echo e($request->id); ?>" name="id" hidden>
                                        <input type="text" value="3" name="status" hidden>
                                        <button type="submit" class="btn btn-danger">Decline</button>
                                    </form>
                                    <?php endif; ?>


                                    <?php if($request->status == 1): ?>
                                    <button type="submit" class="btn btn-success">Approved</button>
                                    <?php endif; ?>


                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($requests->links()); ?>


                <?php endif; ?>

            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="recharge_import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                <form action="<?php echo e(route('admin.recharge.import')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="status">Upload CSV File</label>
                        <input type="file" name="recharge_file" class="form-control">
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