<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey">
            <a href="<?php echo e(route('dashboard')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Dashboard</span>
            </a>
        </li>
        <li class="grey with-sub">
            
            <a href=" <?php echo e(route('book-self')); ?> ">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Order</span>
            </a>
        </li>
        <li class="grey">
            <a href="<?php echo e(route('service-history')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Order history </span>
            </a>
        </li>
        <li class="grey">
            <a href="<?php echo e(route('promotion')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Promo Code</span>
            </a>
        </li>
        <?php if(checkRole(auth()->user()->id, 'special')): ?>
        <li class="grey">
            <a href="<?php echo e(route('user.refer')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Refer</span>
            </a>
        </li>
        <?php endif; ?>
        <li class="grey">
            <a href="<?php echo e(route('offers')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Offers </span>
            </a>
        </li>
        <!-- <li class="grey with-sub">
            <span>
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Settings</span>
            </span>
            <ul>
                <li><a href="<?php echo e(route('user.edit-info')); ?>"><span class="lbl">Add/ modify user info</span></a>
                </li>
                
            </ul>
        </li> -->
        

        <li class="grey">
            <a href="<?php echo e(asset('/contact')); ?>">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Contact Us</span>
            </a>
        </li>
    </ul>

</nav>
<!--.side-menu-->