<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey {{Request::route()->getName() == 'job-history-esp' ? 'bg-mm' : '' }}"><a href="{{route('job-history-esp')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">পূর্বের কাজ</span></a></li>
        <li class="grey {{Request::route()->getName() == 'esp.behalf.order' ? 'bg-mm' : '' }}"><a href="{{route('esp.behalf.order')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">সার্ভিস অর্ডার</span></a></li>
        <li class="grey {{Request::route()->getName() == 'esp.refer' ? 'bg-mm' : '' }}">
            <a href="{{route('esp.refer')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">রেফার করুন</span>
            </a>
        </li>
        <li class="grey {{Request::route()->getName() == 'offer' ? 'bg-mm' : '' }}">
            <a href="{{route('offer')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">অফার দেখুন</span>
            </a>
        </li>
        {{-- <li class="grey with-sub">
            <span>
                    <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Settings</span>
            </span>
            <ul>
                <li class="with-sub">
                    <span>
                        <span class="lbl">Edit Profile</span>
                    </span>
                    <ul>
                        <li><a href="{{route('esp-dashboard')}}"><span class="lbl"> Add/Modify Photo</span></a></li>
                        <li><a href="{{route('esp-dashboard')}}"><span class="lbl"> Add/Modify User Info</span></a></li>
                        <li>
                            <a href="{{route('esp-dashboard')}}"></span><span class="lbl"> Add/Modify MFS
                                    number</span></a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><span class="lbl">Add shortcut address</span></a></li>
            </ul>
        </li> --}}
        <li class="grey {{Request::route()->getName() == 'recharge' ? 'bg-mm' : '' }}"><a href="{{route('recharge')}}">
            <span class="glyphicon glyphicon-th"></span>
            <span
                    class="lbl">রিচার্জ করুন</span></a></li>

        <li class="grey {{Request::route()->getName() == 'esp-faq' ? 'bg-mm' : '' }}"><a href="{{route('esp-faq')}}">
                <span class="glyphicon glyphicon-th"></span>
                    
                    <span class="lbl">জিজ্ঞাসা</span></a></li>

        <li class="grey "><a href="tel:+8809610222111">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">কাস্টমার কেয়ার </span></a></li>

    </ul>
</nav>
<!--.side-menu-->