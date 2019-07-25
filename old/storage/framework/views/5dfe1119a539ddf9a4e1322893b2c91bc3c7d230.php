<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Service Provider
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Service Provider</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                 <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Service Provider Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php if(\Session::has('success')): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <li><?php echo \Session::get('success'); ?></li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <table id="example1" class="table table-bordered table-striped">
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
                            <?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($p->id); ?></td>
                                    <td><?php echo e($p->name); ?></td>
                                    <td><?php if($p->type==0): ?> ESP <?php else: ?> FSP <?php endif; ?></td>
                                    <td><?php echo e($p->phone_no); ?></td>
                                    <td><?php echo e($p->email); ?></td>
                                    <td>
                                        <?php if($p->user->status==2): ?>
                                            <a href="<?php echo e(url('activate/provider/'.$p->user->id)); ?>" data-toggle="tooltip" data-title="Click To Activate" class="btn btn-success">Activate </a>
                                        <?php else: ?>
                                            <a href="<?php echo e(url('deactivate/provider/'.$p->user->id)); ?>" data-toggle="tooltip" data-title="Click To De-Activate" class="btn btn-danger">De-Activate </a>
                                        <?php endif; ?>
                                    </td>
                                    <td><a href="<?php echo e(url('panel/provider/'.$p->id)); ?>" class="btn btn-info">Profile</a></td>

                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
</div>
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>