<!--header open-->
<?php $logo = getConfigValue('home_logo', true); ?>
<header class="sections header_wrap">
    <div class="container clear">
        <div class="logoArea">
            <h1>
                <a href="{{ route('home') }}">
                    <img src="<?= $logo->value ?>" alt="<?= $logo->alt_text ?>">
                </a>
            </h1>
        </div>

        <div class="headerNav">
            <div class="bodyOverlay"></div>
            <div class="topNav clear">
                

                @guest 
                <?php if(!menuActiveClass(['pre-register','signup'],true)){ ?>
                <a href="{{ route('provider-signup') }}" class="startBtn"> <i class="fa fa-angle-double-right"></i>Start Free Trial</a>
                <?php } ?>
                <a class="loginBtn" href="{{ route('login') }}">Login</a>                           
                @else
                <a href="{{ route('dashboard') }}" class="startBtn"> <i class="fa fa-user"></i>My Account</a>
                <a class="loginBtn "  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>


                @endguest
            </div>
            <a href="javascript:void(0);" class="menuOpen"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <div class="bottomNav">
                
                <a class="menuClose">		
                      <span class="bar">
                         <em></em>
                         <em></em>
                     </span>
                </a>
                <nav>
                    <ul>
                        <li class="<?= menuActiveClass('home'); ?>">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="<?= menuActiveClass('howitworks'); ?>" >
                            <a href="{{ route('howitworks') }}">How it works</a>
                        </li>
                        <li class="<?= menuActiveClass('about-us'); ?>" >
                            <a href="{{ route('about-us') }}">About us</a>
<!--                            <ul>
                                <li><a href="#">Sed do eiuod tempor</a></li>
                                <li><a href="#">Sed do eiuod tempor</a></li>
                                <li><a href="#">Sed do eiuod tempor</a></li>

                            </ul>-->
                        </li>
                        <?php if((isThereActiveBlog())){ ?>
                        <li class="<?= menuActiveClass('blogs'); ?>"><a href="{{ route('blogs') }}">Blogs</a></li>
                        <?php } ?>
                        <li class="<?= menuActiveClass('contact-us'); ?>"><a href="{{ route('contact-us')  }}">Contact us</a></li>
                    </ul>
                </nav>

            </div>

        </div>
    </div>
</header>
<!--header close-->
