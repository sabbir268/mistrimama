<style>
    .btn-mm {
        border: 1px solid #f3b400;
        background-color: #f3b400;
        color: #fff !important;

    }

    .btn-mm-border {
        border: 1px solid #f3b400;
        background-color: transparent;
        font-size: 14px;
    }

    .btn-mm-border:hover {
        border: 1px solid #f3b400;
        background-color: #f3b400;
        color: #fff !important;
    }

    .btn-mm:hover {
        background-color: #fff !important;
        color: #f3b400 !important;
        border: 1px solid #f3b400 !important;;
    }

    .rawstyle {
        margin-left: 50px !important;
        margin: 0px
    }

    @media only screen and (max-width: 600px) {
        .rawstyle {
            margin-left: 0px !important;
            margin: 0px
        }
    }

</style>
<div class="main-bar clearfix " style="    background: #ffffff96;">
    <div class="container">
        <div class="logo-header mostion rawstyle" style="">
            <div class="logo-header-inr"><a href="{{asset('/')}}"> <img style="    max-width: 100%;height: 23%;"
                        src='{{ getConfigValue("home_logo") }}' alt="MISTRI MAMA" title="MISTRI MAMA"> </a>
            </div>
        </div>
        <button data-target=".header-nav" data-toggle="collapse" type="button"
            class="navbar-toggle collapsed nav-top-slide-btn">
            <span class="sr-only">
                Toggle navigation </span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> </button>
        <button type="button" class="navbar-toggle nav-left-slide-btn">
            <span class="sr-only">
                Toggle navigation </span> <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span> </button>
        <div class="header-nav navbar-collapse collapse ">

            @if(!Auth::check())
            <div class="extra-nav">
                <div class="extra-cell">
                    <a href="{{asset('login')}}" class="btn btn-border btn-sm btn-mm-border" >
                        <i class="fa fa-user"></i>
                        <b>Login</b>
                    </a>
                </div>
                <div class="extra-cell">
                    <a href="{{asset('register')}}" class="btn btn-border btn-sm btn-mm-border"><i class="fa fa-user-plus"></i>
                        <b>Sign up</b>
                    </a>
                </div>
            </div>
            @else
            <ul id="primary-menu" class="nav navbar-nav">
                <li id="menu-item-20"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-20">
                    <a>{{ Auth::user()->name }}</a>
                    <ul class="sub-menu">
                        <li id="menu-item-1673"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1673">
                            <a href="{{ route('dashboard') }}">My Account</a>
                        </li>
                        <li id="menu-item-1668"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1668">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </ul>
                </li>
            </ul>
            @endif


            <ul id="primary-menu" class="nav navbar-nav">
                {{-- <li id="menu-item-2697" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-2697"> --}}
                <li id="menu-item-2697" class="menu-item menu-item-type-custom menu-item-object-custom  menu-item-home menu-item-2697">
                    <a href="{{url('/')}}">Home</a></li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="{{url('/about')}}">About Us</a>
                </li>
                <li id="menu-item-2695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2695">
                    <a href="{{url('/our-services')}}">Our Services</a>
                </li>
                <li id="menu-item-2275"
                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2275">
                    <a href="#">Book Now</a>
                    <ul class="sub-menu">
                        <li id="menu-item-2276"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2276">
                            <a href="">Book Now</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('/create-order/6')}}">AC Services</a></li>
                                <li><a href="{{url('/create-order/1')}}">Electrical Services</a></li>
                                <li><a href="{{url('/create-order/3')}}">Plumbing Services</a></li>
                                <li><a href="{{url('/create-order/4')}}">IT Services</a></li>
                                <li><a href="{{url('/create-order/5')}}">Generator Services</a></li>
                                <li><a href="{{url('/create-order/2')}}">CCTV Services</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-2277"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2277">
                            <a href="{{ asset('Book_for_Corporate.pdf') }}">Book For Corporate</a>
                        </li>
                    </ul>
                </li>
                <li id="menu-item-18" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-18">
                    <a href="{{url('/contact')}}">Contact US</a>
                </li>
            </ul>
        </div>
        <div class="body-overlay" style="display: none;"></div>
    </div>
</div>

<script>
    var navbar = document.querySelector('.main-bar')

    window.addEventListener('scroll', function(e) {
    var lastPosition = window.scrollY
    if (lastPosition > 500 ) {
        navbar.style.backgroundColor = "#fff";
    } else {
         navbar.style.backgroundColor = "#ffffff96";
        // navbar.style.backgroundColor = "#ffffff00";
    }
    })
</script>