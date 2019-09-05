 
<?php $__env->startSection('body'); ?>
<h1 class="page-title">Become partner
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage become partner </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Company</th>
                            <th>Service</th>
                            <th>Message</th>
                             <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;?>
                        <?php $__currentLoopData = $become_partnerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($id++); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->email); ?></td>
                            <td><?php echo e($data->phone); ?></td>
                            <td><?php echo e($data->company); ?></td>
                            <td><?php echo e($data->serviceName); ?></td>
                            <td><?php echo e($data->message); ?></td>
                            <td>
                                <a href="<?php echo e(url('admin/become-partner-delete')); ?>/<?php echo e($data->id); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                       </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>