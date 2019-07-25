<nav class="side-menu">
        <ul class="side-menu-list">
            <li>
                <a href="index.php"><span><i class="font-icon font-icon-dashboard"></i><span class="lbl">Comrade Dashboard</span></span></a>
            </li>
            <li><a href="job.php"><span class="font-icon glyphicon glyphicon-tasks"></span><span class="lbl">Job History</span></a></li>
    
            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </nav><!--.side-menu-->
