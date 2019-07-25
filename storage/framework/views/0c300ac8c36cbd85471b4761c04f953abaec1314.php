<?php $__env->startSection('body'); ?>

<h1 class="page-title">
    <small></small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="row">
    <div class="col-md-12">
        <?php $__currentLoopData = ['danger', 'warning', 'success', 'info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has('alert-' . $msg)): ?>
        <p class="alert alert-<?php echo e($msg); ?>"><?php echo e(Session::get('alert-' . $msg)); ?></p>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <button class="btn btn-primary" data-target="#newHeading" data-toggle="modal">New Heading </button>
        <br>
        <br>

        <div class="portlet box green ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>All Heading</div>
            </div>

            <div class="portlet-body flip-scroll">
                <table class="table table-bordered table-striped table-condensed flip-content">
                    <thead class="flip-content">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>type</th>
                            <th class="align-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($headings): ?>
                        <?php
                        $i = 1;
                        ?>
                        <?php $__currentLoopData = $headings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $heading): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?> <?php $i++ ?> </td>
                            <td><?php echo e($heading->title); ?></td>
                            <td><?php echo e($heading->type); ?></td>
                            <td class="align-center">
                                <a href="<?php echo e(route('admin.accounts.heading.edit',$heading->id)); ?>" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
                                <a href="<?php echo e(route('admin.accounts.heading.delete',$heading->id)); ?>" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php echo e($headings->links()); ?>


                <?php endif; ?>

            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="newHeading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('admin.accounts.heading.insert')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="status">Title </label>
                        <input type="text" name="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" class="form-control">
                            <option value="revenue">Revenue</option>
                            <option value="expense">Expense</option>
                        </select>
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