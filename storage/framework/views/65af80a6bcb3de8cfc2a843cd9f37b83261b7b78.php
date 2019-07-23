<?php if (Session::has('CustomMessage')): ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong><?php echo e(Session::get('CustomMessage')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php endif; ?>



<?php if (Session::has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong><?php echo e(Session::get('success')); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php  if (Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo e(Session::get('error')); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php endif; ?>

<?php  if (Session::has('info')): ?>
    <div class="success alert-info ">
        <?php  echo Session::get('info'); ?>
    </div>
<?php endif; ?>

<?php  if (Session::has('warning')): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?php echo e(Session::get('warning')); ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>