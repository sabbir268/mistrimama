 
<?php $__env->startSection('body'); ?>
<h1 class="page-title">Career
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Manage Career </div>

            </div>


            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Years of Experience</th>
                            <th>Salary Expectation</th>
                            <th>Download CV</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=1;?>
                        <?php $__currentLoopData = $career_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($id++); ?></td>
                            <td><?php echo e($data->first_name); ?></td>
                            <td><?php echo e($data->last_name); ?></td>
                            <td><?php echo e($data->phone_number); ?></td>
                            <td><?php echo e($data->email); ?></td>
                            <td><?php echo e($data->year_of_experience); ?></td>
                            <td><?php echo e($data->salary_expectation); ?></td>
                            <td>
                                <a href="<?php echo e(url('career_uploads')); ?>/<?php echo e($data->cv); ?>">download</a>
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