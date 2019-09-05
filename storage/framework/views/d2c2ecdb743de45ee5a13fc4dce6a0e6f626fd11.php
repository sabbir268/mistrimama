<?php $__env->startSection('body'); ?>

<h1 class="page-title">Service Provider
    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Service Provider Account</div>
            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Phone</th>
                            <th>Total Balance</th>
                            <th>Available for Cashout</th> 
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $ServiceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($p->id); ?></td>
                            <td><?php echo e($p->name ? $p->name : 0); ?></td>
                            <td><?php if($p->type==0): ?> ESP <?php else: ?> FSP <?php endif; ?></td>
                            <td><?php echo e($p->phone_no); ?></td>
                            <td><?php echo e(totalBalance($p->u_id) ? totalBalance($p->u_id) : 0); ?></td>
                            <td><?php echo e(totalBalance($p->u_id) > 500 ? totalBalance($p->u_id) - 500 : 0); ?></td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>

<?php echo e($ServiceProviders->links()); ?>




            </div>
        </div>
    </div>
</div>

<?php $__currentLoopData = $ServiceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="addAmountMdl<?php echo e($p->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add MM Starting Balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('add.mmfirstbalance')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <label for="amount">Amounts</label>
                        <input type="text" name="user_id" value="<?php echo e($p->u_id); ?>" hidden>
                        <input type="number" class="form-control" id="amount" name="amount" 
                            placeholder="Enter amount" required>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<style>
    .portlet-body table .logoWrap {
        width: 80px;
        height: 80px;
        vertical-align: middle;
    }

    .portlet-body table .logoWrap img {
        width: 100%;
    }


    #sortable {
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 60%;
    }

    #sortable li {
        margin: 0 3px 3px 3px;
        padding: 0.4em;
        padding-left: 1.5em;
        font-size: 1.4em;
        height: 18px;
    }

    #sortable li span {
        position: absolute;
        margin-left: -1.3em;
    }

</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.home.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>