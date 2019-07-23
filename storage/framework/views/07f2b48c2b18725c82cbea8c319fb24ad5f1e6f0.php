<?php if (Session::has('CustomMessage')): ?>
    <div class="alert alert-success alert-dismissible fade in mt10">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php echo Session::get('CustomMessage') ?>
    </div>
<?php endif; ?>

<?php if (Session::has('success')): ?>
    <div class="alert alert-success alert-dismissible fade in mt10">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php echo Session::get('success') ?>
    </div>
<?php endif; ?>
<?php  if (Session::has('error')): ?>
    <div class="alert alert-danger alert-dismissible fade in mt10">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php  echo Session::get('error'); ?>
    </div>
<?php endif; ?>

<?php  if (Session::has('info')): ?>
    <div class="alert alert-info alert-dismissible fade in mt10">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php  echo Session::get('info'); ?>
    </div>
<?php endif; ?>

<?php  if (Session::has('warning')): ?>
    <div class="alert alert-warning alert-dismissible fade in mt10">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <?php  echo Session::get('warning'); ?>
    </div>
<?php endif; ?>