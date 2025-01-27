 
<?php $__env->startSection('body'); ?>

<h1 class="page-title">Service Provider
    <small></small>

</h1>
<div class="row">
    <div class="col-md-12">



        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Service Provider </div>

            </div>


            <div class="portlet-body flip-scroll">






                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead>
                        <tr>
                            <th>Sr</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $ServiceProviders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($loop->iteration); ?></td>
                            <td><?php echo e($p->id); ?></td>
                            <td><?php echo e($p->name); ?></td>
                            <td><?php if($p->type==0): ?> ESP <?php else: ?> FSP <?php endif; ?></td>
                            <td><?php echo e($p->phone_no); ?></td>
                            <td><?php echo e($p->email); ?></td>
                            <td>
                                <?php if($p->u_id == null): ?>
                                <a href="<?php echo e(url('activate/provider/'.$p->id)); ?>" data-toggle="tooltip" data-title="Click To Activate" class="btn btn-success">Activate </a>                                <?php else: ?>
                                <a href="<?php echo e(url('deactivate/provider/'.$p->id)); ?>" data-toggle="tooltip" data-title="Click To De-Activate" class="btn btn-danger">De-Activate </a>                                <?php endif; ?>
                            </td>
                            <td><a href="<?php echo e(route('service-provider.show',$p->id)); ?>" class="btn btn-info">Profile</a></td>

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