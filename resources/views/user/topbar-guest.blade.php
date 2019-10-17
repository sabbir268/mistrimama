<header class="site-header">
    <div class="container-fluid">
        <a href="{{asset('/')}}" class="site-logo">
            <img class="hidden-md-down" src="{{asset('dashboard/img/newlogokom.png')}}" alt="">
            <img class="hidden-lg-down" src="{{asset('dashboard/img/newlogokom.png')}}" alt="">
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                        <a href="{{url('/')}}" class="btn btn-mm-outline text-mm">Home</a>
                        <a href="{{url('/about')}}" class="btn btn-mm-outline text-mm">About Us</a>
                        <a href="{{url('/our-services')}}" class="btn btn-mm-outline text-mm">Our Services</a>
                        <a href="{{url('/contact')}}" class="btn btn-mm-outline text-mm">Contact US</a>
                        <a href="{{asset('login')}}" class="btn btn-mm">Login</a>
                        <a href="{{asset('register')}}" class="btn btn-mm">Sign Up</a>
                </div>
                <!--.site-header-shown-->
                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">

                </div>
                <!--.site-header-collapsed-->
            </div>
            <!--site-header-content-in-->
        </div>
        <!--.site-header-content-->
    </div>
    <!--.container-fluid-->
</header>