<div class="page-sidebar navbar-collapse collapse">
    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
        data-slide-speed="200" style="padding-top: 20px">
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <li class="sidebar-toggler-wrapper hide">
            <div class="sidebar-toggler">
                <span></span>
            </div>
        </li>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
        {{-- if(auth()->user->role->) --}}
        <li class="nav-item start  {{ menuActiveClass(['admin.dashboard'],false) }}">
            <a href="{{ route('admin.dashboard') }}" class="nav-link nav-toggle">
                <i class="fa fa-dashboard"></i>
                <span class="title">Dashboard</span>
                <span class="selected"></span>

            </a>
        </li>
        @if(checkRole(auth()->user()->id, 'admin') || checkRole(auth()->user()->id, 'accountant'))
        <li class="nav-item start {{ menuActiveClass(['accounts'],true) }} ">
            <a href="#" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Cash Book</span>
                <span class="arrow "></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item">
                    <a href="{{route('admin.accounts')}}" class="nav-link ">
                        <span class="title">New Entry</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.accounts.headings')}}" class="nav-link ">
                        <span class="title">New Headings</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.recharge.request')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Recharge Request</span>
                <span class="arrow "></span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.withdraw')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Cashout Request</span>
                <span class="arrow "></span>
            </a>
        </li>

        <li class="nav-item ">
            <a href="{{route('admin.service_provider.accounts')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Service Providers Accounts</span>
                <span class="arrow "></span>
            </a>
        </li>
        @endif

        @if(checkRole(auth()->user()->id, 'admin') || checkRole(auth()->user()->id, 'editor') )
        <li class="nav-item  {{ menuActiveClass(['faq','role','email-template','general-setting'],true) }}">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Settings</span>
                <span class="arrow {{ menuActiveClass(['role','email-template','general-setting'],true) }}"></span>
            </a>
            <ul class="sub-menu">

                <li class="nav-item  {{ menuActiveClass(['general-setting'],true) }}">
                    <a href="{{ route('general-setting.index') }}" class="nav-link ">
                        <span class="title">General Setting</span>
                    </a>
                </li>

                <li class="nav-item  {{ menuActiveClass(['faq'],true) }}">
                    <a href="{{ route('faq.index') }}" class="nav-link ">
                        <span class="title">FAQ</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  {{ menuActiveClass(['cms'],true) }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Pages</span>
                <span class="arrow {{ menuActiveClass(['cms'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['cms'],true) }} ">
                    <a href="{{ route('cms.index') }}" class="nav-link ">
                        <span class="title">Manage Page</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Sliders</span>
                <span class="arrow {{ menuActiveClass(['cms'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['cms'],true) }} ">
                    <a href="{{ url('admin/slider/big')}}" class="nav-link ">
                        <span class="title">Big Slider</span>
                    </a>
                </li>
                <li class="nav-item {{ menuActiveClass(['cms'],true) }} ">
                    <a href="{{ url('admin/slider/small') }}" class="nav-link ">
                        <span class="title">Small Slider</span>
                    </a>
                </li>
            </ul>
        </li>



        <li class="nav-item  {{ menuActiveClass(['service-category','service-sub-category'],true) }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Service Category</span>
                <span class="arrow {{ menuActiveClass(['service-category'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['service-category'],true) }} ">
                    <a href="{{ route('service-category.index') }}" class="nav-link ">
                        <span class="title">Manage Service Category</span>
                    </a>
                </li>
                <li class="nav-item {{ menuActiveClass(['service-sub-category'],true) }} ">
                    <a href="{{ route('service-sub-category.index') }}" class="nav-link ">
                        <span class="title">Manage Service Sub Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{ menuActiveClass(['service-provider'],true) }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Service Provider</span>
                <span class="arrow {{ menuActiveClass(['service-provider'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['service-provider'],true) }} ">
                    <a href="{{ asset('/admin/service-provider') }}" class="nav-link ">
                        <span class="title">Manage Service Provider</span>
                    </a>
                </li>
            </ul>
        </li>







        <li class="nav-item  {{ menuActiveClass(['blogs','blog-category'],true) }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Blogs</span>
                <span class="arrow {{ menuActiveClass(['blog-category','blogs'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['blogs'],true) }} ">
                    <a href="{{ route('blogs.index') }}" class="nav-link ">
                        <span class="title">Manage Blogs</span>
                    </a>
                </li>
                <li class="nav-item {{ menuActiveClass(['blog-category'],true) }} ">
                    <a href="{{ route('blog-category.index') }}" class="nav-link ">
                        <span class="title">Manage Blog Category</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{ menuActiveClass(['booking'],true) }} ">
            <a href="javascript:;" class="nav-link nav-toggle">
                <i class="fa fa-gear"></i>
                <span class="title">Booking</span>
                <span class="arrow {{ menuActiveClass(['booking'],true) }}"></span>
            </a>
            <ul class="sub-menu">
                <li class="nav-item {{ menuActiveClass(['booking'],true) }} ">
                    <a href="{{ route('booking.index') }}" class="nav-link ">
                        <span class="title">Manage Booking</span>
                    </a>
                </li>

                <li class="nav-item {{ menuActiveClass(['booking'],true) }} ">
                    <a href="{{ route('booking.history') }}" class="nav-link ">
                        <span class="title">Booking History</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/career-show')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Career</span>
                <span class="arrow {{ menuActiveClass(['booking'],false) }}"></span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{url('admin/become-partner-show')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Become partners</span>
                <span class="arrow {{ menuActiveClass(['booking'],false) }}"></span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('register-users')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Registered Users</span>
                <span class="arrow {{ menuActiveClass(['booking'],false) }}"></span>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{url('admin/spf')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Add Service Partners</span>
                <span class="arrow {{ menuActiveClass(['booking'],false) }}"></span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('admin.special-user')}}" class="nav-link">
                <i class="fa fa-gear"></i>
                <span class="title">Add Special User</span>
                <span class="arrow {{ menuActiveClass(['booking'],false) }}"></span>
            </a>
        </li>

        @endif


    </ul>
    <!-- END SIDEBAR MENU -->
    <!-- END SIDEBAR MENU -->
</div>