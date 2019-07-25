<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey"><a href="<?php echo e(route('job-history-esp')); ?>"><span
                    class="font-icon glyphicon glyphicon-tasks"></span><span class="lbl">Job Historys</span></a></li>
        <li class="grey"><a href="#"><span class="font-icon glyphicon glyphicon-user"></span><span class="lbl">Order for
                    other</span></a></li>
        <li class="grey"><a href="#"><span class="font-icon glyphicon glyphicon-user"></span><span class="lbl">Refer and
                    earn</span></a></li>
        <li class="grey"><a href="#"><span class="font-icon glyphicon glyphicon-user"></span><span class="lbl">Refer
                    history</span></a></li>
        <li class="grey"><a href="#"><span class="font-icon glyphicon glyphicon-user"></span><span class="lbl">Top
                    Referrer</span></a></li>
        <li class="grey"><a href="<?php echo e(route('offer')); ?>"><span class="font-icon glyphicon glyphicon-th-list"></span><span
                    class="lbl">Offers</span></a></li>
        <li class="grey with-sub">
            <span>
                <i class="font-icon font-icon-cogwheel"></i>
                <span class="lbl">Settings</span>
            </span>
            <ul>
                <li class="with-sub">
                    <span>
                        <span class="lbl">Edit Profile</span>
                    </span>
                    <ul>
                        <li><a href="<?php echo e(route('esp-dashboard')); ?>"><span class="lbl"> Add/Modify Photo</span></a></li>
                        <li><a href="<?php echo e(route('esp-dashboard')); ?>"><span class="lbl"> Add/Modify User Info</span></a></li>
                        <li>
                            <a href="<?php echo e(route('esp-dashboard')); ?>"></span><span class="lbl"> Add/Modify MFS
                                    number</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><span class="lbl">Add shortcut address</span></a></li>
            </ul>
        </li>
        <li class="grey"><a href="<?php echo e(route('recharge')); ?>"><span class="font-icon glyphicon glyphicon-usd"></span><span class="lbl">Recharge Account</span></a></li>

        <li class="grey"><a href="<?php echo e(route('esp-faq')); ?>"><span class="font-icon glyphicon glyphicon-question-sign"></span><span class="lbl">FAQs</span></a></li>

        <li class="grey"><a href="<?php echo e(route('esp-call-us')); ?>"><span
            class="font-icon glyphicon glyphicon-phone-alt"></span><span class="lbl">Call us</span></a></li>
        
        <li class="grey"><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span
                    class="font-icon glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
</nav>
<!--.side-menu-->