<nav class="side-menu">
    <ul class="side-menu-list">
        <li class="grey">
            <a href="{{route('dashboard')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Dashboard</span>
            </a>
        </li>
        <li class="grey with-sub">
            {{-- <a href=" @if($activeOrders) {{route('order-details')}} @else {{route('book-self')}} @endif"> --}}
            <a href=" {{route('book-self')}} ">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Order</span>
            </a>
        </li>
        <li class="grey">
            <a href="{{route('service-history')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Order history </span>
            </a>
        </li>
        <li class="grey">
            <a href="{{route('promotion')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Promo Code</span>
            </a>
        </li>
        <li class="grey">
            <a href="{{route('user.refer')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Refer</span>
            </a>
        </li>
        <li class="grey">
            <a href="{{route('offers')}}">
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
                <li><a href="{{route('user.edit-info')}}"><span class="lbl">Add/ modify user info</span></a>
                </li>
                {{-- <li><a href="#"><span class="lbl">Add shortcut address</span></a></li> --}}
            </ul>
        </li> -->
        

        <li class="grey">
            <a href="{{asset('/contact')}}">
                <span class="glyphicon glyphicon-th"></span>
                <span class="lbl">Contact Us</span>
            </a>
        </li>
    </ul>

</nav>
<!--.side-menu-->