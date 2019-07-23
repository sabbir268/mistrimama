<?php if (Session::has('CustomMessage')): ?>
    <div class="success">
        
        <?php echo Session::get('CustomMessage') ?>
    </div>
<?php endif; ?>

<?php if (Session::has('success')): ?>
    <div class="success">
        <?php echo Session::get('success') ?>
    </div>
<?php endif; ?>
<?php  if (Session::has('error')): ?>
    <div class="errormsg">
        <?php  echo Session::get('error'); ?>
    </div>
<?php endif; ?>

<?php  if (Session::has('info')): ?>
    <div class="success alert-info ">
        <?php  echo Session::get('info'); ?>
    </div>
<?php endif; ?>

<?php  if (Session::has('warning')): ?>
    <div class="success  alert-warning ">
        <?php  echo Session::get('warning'); ?>
    </div>
<?php endif; ?>