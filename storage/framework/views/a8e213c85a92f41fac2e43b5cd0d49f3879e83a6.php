<?php $__env->startSection('body'); ?>
<h1 class="page-title">User
    <small></small>
</h1>
<div class="row">
    <div class="col-md-12">

        <!-- BEGIN SAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>User Details</div>

            </div>
            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <tbody>

                        <tr>
                            <th>Name </th>
                            <td><?php echo e($users->name); ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo e($users->email); ?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?= $users->phone ?></td>
                        </tr>

                        <tr>
                            <th>DOB</th>
                            <td><?php echo e($users->dob); ?></td>
                        </tr>
                        <tr>
                            <th>Street</th>
                            <td><?php echo e($users->street); ?></td>
                        </tr><tr>
                            <th>Locality</th>
                            <td><?php echo e($users->locality); ?></td>
                        </tr>
                        <tr>
                            <th>Town</th>
                            <td><?php echo e($users->town); ?></td>
                        </tr>
                        <tr>
                            <th>Postcode</th>
                            <td><?php echo e($users->postcode); ?></td>
                        </tr>
                    </tbody>
                </table>



                <div class="form-actions right">
                    <a class="btn green" href="<?php echo e(route('editprofile',$users->id)); ?>">Edit</a>
                </div>
            </div>

        </div>

        <!-- END SAMPLE TABLE PORTLET-->

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.users.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>