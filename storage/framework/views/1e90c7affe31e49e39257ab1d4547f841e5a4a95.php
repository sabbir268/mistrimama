<?php $__env->startSection('body'); ?>

<h1 class="page-title">
    <small>Edit Heading</small>
    <!--    <a href="<?php echo e(route('cms.create')); ?>" class="btn btn-primary float-right"> Create </a>-->
</h1>
<div class="portlet box green ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-cogs"></i>All Heading</div>
    </div>

    <div class="portlet-body ">
        <div class="flip-content">
            <div class="col-md-6 col-md-offset-3" style="display: contents;">
                <form action="<?php echo e(route('admin.accounts.heading.update')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($heading->id); ?>" name="id">

                    <div class="form-group">
                        <label for="status">Title </label>
                        <input type="text" name="title" value="<?php echo e($heading->title); ?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="status">Type</label>
                        <select name="type" class="form-control">
                            <option value="revenue" <?php echo e($heading->type == 'revenue' ? 'selected' : ''); ?>>Revenue
                            </option>
                            <option value="expense" <?php echo e($heading->type == 'expense' ? 'selected' : ''); ?>>Expense
                            </option>
                        </select>
                    </div>

                    <input type="submit" value="Save Change" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.template', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>