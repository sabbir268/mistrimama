<nav class="side-menu">
        <ul class="side-menu-list">
            <li>
                <a href="index.php"><span><i class="font-icon font-icon-dashboard"></i><span class="lbl">FSP Dashboard</span></span></a>
            </li>
            <li><a href="job.php"><span class="font-icon glyphicon glyphicon-tasks"></span><span class="lbl">Job History</span></a></li>
            <li><a href="cashout.php"><span class="font-icon glyphicon glyphicon-credit-card"></span><span class="lbl">Cash out</span></a></li>
            <li><a href="offers.php"><span class="font-icon glyphicon glyphicon-th-list"></span><span class="lbl">Offers</span></a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a></li>
        </ul>
    </nav><!--.side-menu-->
