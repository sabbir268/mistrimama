<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey">
            <a href="<?php echo e(route('dashboard')); ?>">
                <i class="font-icon font-icon-dashboard"></i>
                <span class="lbl">Dashboard</span>
            </a>
        </li>
        <li class="grey with-sub">
            <a href="<?php echo e(route('book-self')); ?>">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span class="lbl">Place Order</span>
            </a>
        </li>
        <li class="grey">
            <a href="<?php echo e(route('promotion')); ?>">
                <i class="fa fa-ticket "></i>
                <span class="lbl">Promo Code</span>
            </a>
        </li>
        <li class="grey">
            <a href="<?php echo e(route('service-history')); ?>">
                <i class="font-icon font-icon-chart"></i>
                <span class="lbl">Service history </span>
            </a>
        </li>
        <li class="grey">
            <a href="#">
                <i class="fa fa-shopping-bag"></i>
                <span class="lbl">Ask for free service</span>
            </a>
        </li>
        <li class="grey">
            <a href="<?php echo e(route('offers')); ?>">
                <i class="fa fa-trophy"></i>
                <span class="lbl">Offers </span>
            </a>
        </li>
        <li class="grey with-sub">
            <span>
                <i class="font-icon font-icon-edit"></i>
                <span class="lbl">Settings</span>
            </span>
            <ul>
                <li class="with-sub">
                    <span>
                        <span class="lbl">Edit Profile</span>
                    </span>
                    <ul>
                        <li><a href="#"><span class="lbl">Add/ modify photo</span></a></li>
                        <li><a href="<?php echo e(route('edit-info')); ?>"><span class="lbl">Add/ modify user info</span></a></li>
                        
                    </ul>
                </li>
                <li><a href="#"><span class="lbl">Add shortcut address</span></a></li>
            </ul>
        </li>
        <li class="grey">
            <a href="#">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Call us</span>
            </a>
        </li>
    </ul>

</nav>
<!--.side-menu-->