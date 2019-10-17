<?php $__env->startSection('body'); ?>

<h1 class="page-title">Users


    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Users</div>
            </div>
            <div class="portlet-body flip-scroll">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo e($users->links()); ?>

                        <button style="margin: 10px;" class="btn btn-primary pull-right">Total: <?php echo e($usersCount); ?>

                        </button>
                    </div>
                </div>
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($u->id); ?></td>
                            <td> <img style="height:80px;width:80px" src="<?php echo e($u->photo); ?>" alt=""> </td>
                            <td><?php echo e($u->name); ?></td>
                            <td><?php echo e($u->email); ?></td>
                            <td><?php echo e($u->phone_no); ?></td>
                            <td><?php echo e($u->address); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>


















            </div>
        </div>
    </div>
</div>


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