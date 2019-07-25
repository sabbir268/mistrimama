<!doctype html>
<html lang="en" class="page-home01">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Mistri Mama || Door step service provider</title>


    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- Icon font 7 Stroke  -->

    <style type="text/css">
        .extra-info i {
            font-size: 32px;
            margin-top: 20px !important;
            margin-right: 20px;
            float: left;
        }
        .primary-menu_style-01 .menu li {
            padding: 10px 20px !important;
            margin-left: 0;

        }
        .startern-section {
            padding:  0;
        }
        footer{
            margin:0;
        }
        #primary-menu .menu {
            position: relative;
            height: 45px;

        }
        #primary-menu .menu a{
            text-decoration:none;
        }
        #dis{
            z-index:100 !important;
            background:white;
        }
        .phone
        {
            padding-left:50px;
            padding-top:0px;
        }



        .oki{
            background: #202332 url(images/page-home/home02-slide02.jpg)no-repeat center fixed;
            padding-right: 22px;
        }
        .hidden{
            display: none;
        }
        .panel-danger > .panel-heading {
            background-color: #607D8B;
            border-color: #607D8B;
        }

        .jconfirm{
            background-color: #607d8b;
            background-image: url(mbac.png);
        }
        .jconfirm-title{
            width: 100%;
            height: 50px;
        }
        .modal-header {
            background-color: #7c807c;
            color:white !important;
            font-size: 14px;
            height: 50px;
        }

        .modal-footer {
            background-color: #f9f9f9;
        }
        #button1{

        }
        #button2{
            background:#4CB1CF;
        }
        #button3{
            background:#F0433D;
        }
        #button4{
            background:#f0ad4e;
        }
        .rounded-ghost-btn:hover{
            background-color: #4a90e2;
            background-color: #FBD232;
            border-color:#FBD232;
            color: white;
        }
        .rounded-ghost-btn {
            font-family: Poppins,sans-serif;
            font-weight: 500;
            font-size: 14px;
            background-color: transparent;
            padding: 10px 32px;
            text-transform: uppercase;
            border: 1px solid #212540;
            border-radius: 24px;
            max-width: 100px;

            max-width: 100px;
            width: 95px;
            height: 32px;
            line-height: 20px;
            font-size: 14px;
            font-weight: 400;
            border: 1px solid #4a90e2;
            padding: 0!important;
            color: #4a90e2;
        }

        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 400px;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
        #target {
            width: 345px;
        }

        #primary-menu .menu {
            position: relative;
            height: 45px;
        }
        .primary-menu_style-01 .menu li {
            padding: 10px 20px;
            margin-left: 0;
        }

        .pac-container{
            z-index: 9999;
        }
    </style>

</head>
<body>



<div class="site">

    <div class="site-top style-01">
        <div class="container">
            <div class="row row-sm-center">

                <div class="col-sm-5 col-md-6">
                    <div style="color:rgba(255,255,255,.6);" class="site-top-left text-xs-center text-sm-left">
                        Your Trusted Service Partner
                    </div>
                </div>

                <div class="col-sm-7 col-md-6">
                    <div class="site-top-right text-xs-center text-sm-right">
                        <nav id="top-right-menu">
                            <ul class="menu">
                                <li class="menu-item"><a href="{{ url('serviceprovider') }}">Become a service partner</a></li>
                                <li class="menu-item"><a href="#get-earn">Earn Money</a></li>
                                <li class="menu-item"><a href="{{ url('login') }}">Login</a></li>
                                <li class="menu-item"><a onclick="bn()" href="#">বাংলা</a>
                                    <div style="display:none;" id="google_translate_element"></div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="site-top style-01">
        <div class="container">
            <div class="row row-sm-center">


                <div class="col-sm-7 col-md-6">
                    <div class="site-top-right text-xs-center text-sm-right">


                        <!-- Trigger the modal with a button -->

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog" style="display: none">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title site-top">Search Location</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Select a location.
                                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.site-top .style-01 -->

    <header class="site-header style-01">
        <div class="container">
            <div class="row row-xs-center">

                <div class="col-xs-10 col-lg-2 site-branding" style="padding:5px;">
                    <a href="index.php">

                        <img src="a.png" width="140"   alt="MISTRI MAMA">

                    </a>
                </div>

                <div class="col-xs-2 hidden-lg-up text-right">
                    <a id="menu-button" href="#primary-menu-mobile"><i id="open-left" class="fa fa-bars"></i></a>
                    <nav id="primary-menu-mobile">
                        <ul>
                            <li>
                                <a href="/">Home </a>

                            </li>
                            <li>
                                <a href="#about_us">About us </a>

                            </li>
                            <li>
                                <a href="#our_service">Our Service </a>

                            </li>
                            <li><a href="#book_now"> Book Now </a></li>

                            <li><a href="#contact_us">Contact</a>

                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- / Menu Mobile -->




                <div class="col-xs-12 col-sm-9 col-lg-8 extra-info">
                    <div class="row">
                        <div class="col-sm-5 col-md-6">
                            <i class="fa fa-phone"></i>
                            <div class="phone">
                                <h3>Call for Service</h3>
                                <h3<a style="color:#fff" href="tel:09610-222-111">09610-222-111</a></h3><br>
                                <a style="color:#fff " href="mailto:info@mistrimama.com">info@mistrimama.com</a>
                            </div>
                        </div>

                        <div class="col-sm-7 col-md-6">
                            <i class="fa fa-home"></i>
                            <div class="address">
                                <h3>Sky view ocean tower(1st floor)</h3>
                                <span>38 SegunBagicha,Dhaka,Bangladesh</span>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /.social-menu -->
                <div style="margin-top:65px;" class="social-menu social-menu_right-arrow hidden-md-down row">
                    <ul  class="menu">
                        <li class="menu-item"><a href="https://www.facebook.com/">facebook</a></li>
                        <li class="menu-item"><a href="https://www.twitter.com/">twitter</a></li>
                        <li class="menu-item"><a href="https://www.plus.google.com/">google+</a></li>

                        <li class="menu-item"><a href="https://www.youtube.com/">youtube</a></li>
                    </ul>
                </div>
            </div>
    </header>
    <!-- /.site-header .style-01 -->

    <nav id="primary-menu" class="primary-menu_style-01 hidden-md-down">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul style="height:50x;" class="menu">
                        <li class="menu-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="menu-item mega-menu">
                            <a href="#about-us">About us</a>

                        </li>
                        <li class="menu-item">
                            <a href="#"> Blog </a>
                        </li>
                        <li class="menu-item">
                            <a href="#our-service">Our Service</a>
                        </li>


                        </li>
                        <li class="menu-item">
                            <a href="#book-now">Book Now</a>
                        </li>
                        <li class="menu-item">
                            <a href="#contact-us">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- /.primary-menu -->

    <div class="">
        @yield("content")
    </div>

    <aside id="contact-us" class="ms-footbar ng-scope" id="footer_section">
        <div class="container py-0" >
            <div class="menu_hierarchy">


                <div class="menu_folder col-md-4"">
                <img src="a.png" width="140"   alt="MISTRI MAMA">


                <h2 class="menu_folder_control ng-binding">Mistri Mama Office</h2>
                <hr>
                <div class="menu_folder_items">
                    <ul class="list-unstyled">
                        <li><i class="fa fa-map-marker"></i><span class="space">--</span> Sky view ocean tower(1st floor)</li>
                        <p><span class="space">----</span>38 Segun Bagicha,Dhaka,Bangladesh.</p>

                        <li><i class="fa fa-phone"></i><span class="space">--</span>09610-222-111</li>
                        <li><i class="fa fa-envelope"></i><span class="space">--</span>info@mistrimama.com</li>
                        <li><i class="fa fa-clock-o"></i><span class="space">--</span>Sat - Thur: 10:00 am - 8:00 pm</li>
                    </ul>
                </div>
            </div>

            <div class="menu_folder col-md-2"">
            <h2 class="menu_folder_control  ng-binding">Services</h2>
            <div class="menu_folder_items">
                <ul class="list-unstyled">
                    <li><a href="{{url('/generator')}}" class="ng-binding">Generator</a></li>
                    <li><a href="{{url('/plumbing')}}" class="ng-binding">Plumbing Services</a></li>
                    <li><a href="{{url('/electrical')}}" class="ng-binding">Electrical</a></li>
                    <li><a href="{{url('/ict')}}" class="ng-binding">ICT</a></li>
                    <li><a href="{{url('/cctv')}}" class="ng-binding">CCTV</a></li>
                    <li><a href="{{url('/air-conditional')}}" class="ng-binding">Air Conditionar</a></li>

                </ul>
            </div>
        </div>

        <div class="menu_folder col-md-2"" >
        <h2 class="menu_folder_control ng-binding">Company</h2>
        <div class="menu_folder_items">
            <ul class="list-unstyled">
                <li><a href="{{url('/about')}}" class="ng-binding">About Us</a></li>
                <li><a href="{{url('/career')}}" class="ng-binding">Career</a></li>
                <li><a href="{{url('/community-guidelines')}}" class="ng-binding">Community Guidelines</a></li>

                <!--<li><a href="/terms" class="ng-binding">Terms &amp; Conditions</a></li>
                <li><a href="/contact" class="ng-binding">Contact Us</a></li>
                <li><a href="/privacy" class="ng-binding">Privacy Policy</a></li>-->

                <li><a href="https:/terms"  class="ng-binding">Terms &amp; Conditions</a></li>
                <li><a href="https:/contact"class="ng-binding">Contact Us</a></li>
                <li><a href="https:/privacy" class="ng-binding">Privacy Policy</a></li>
            </ul>
        </div>
</div>

<div class="menu_folder col-md-2">
    <h2 class="menu_folder_control ng-binding">Discover</h2>
    <div class="menu_folder_items">
        <ul class="list-unstyled">
            <li><a href="{{url('/how-it-works')}}" class="ng-binding">How it Works</a></li>
            <!--<li><a href="/shohokari-for-business" class="ng-binding">Shohokari for business</a></li> -->
            <li><a href="{{url('/shohokari')}}" class="ng-binding">Shohokari for business</a></li>
            <li><a href="{{url('/earn-money')}}" class="ng-binding">Earn Money</a></li>
            <li><a href="{{url('/faq')}}" target="_blank" class="ng-binding">FAQ</a></li>
            <br><br>
            <a style="padding-left:30px;" href="https://play.google.com/store/apps/details?id=com.mistrimama" target="_blank">
                <img  src="qrcode.png" alt="Google play">
            </a>

        </ul>

    </div>
</div>






</div>
<div class="footer_links" >
    <div class="app_stores_columns">


    </div>
</div>
</div>
<div class="container">

    <div class="col-md-2" style="float:right;">




    </div>

    <div class="col-md-8">




        <a href="https://www.facebook.com/mistrimama/" target="_blank" >
            <i class="fa fa-facebook mfa"></i>
        </a>
        <a href="https://www.twitter.com/mistrimama" target="_blank" >
            <i class="fa fa-twitter mfa"></i>
        </a>
        <a href="https://www.linkedin.com/company/mistrimama" target="_blank" >
            <i class="fa fa-linkedin mfa"></i>
        </a>
        <a href="" target="_blank" >
            <i class="fa fa-youtube-play mfa"></i>
        </a>
    </div>
</div>

</aside>


<footer class="ms-footer" style="height: 30px;padding-top: 5px;">
    <div class="container">
        <p style="color: white;" class="shohokari_company_details"><?php echo date('Y'); ?>© All rights are reserved by mistrimama.com</p>
    </div>
</footer>




<!-- /.footer -->

<!-- Modal request-->
<div id="book_A" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">

                <form>
                    <div id="first">

                        <div class="form-group">
                            <div class="input-group">
                <span class="input-group-addon" style="color: #555;">
                  <i class="glyphicon glyphicon-map-marker"></i>
                </span>
                                <select class="form-control" style="color: #555;">
                                    <option class="disabled" style="padding-right: 22px;" value=" "> SELECT YOUR AREA </option>

                                    <option value="XMLID_1655_">Azimpur</option>
                                    <option value="XMLID_1652_" >Badda</option>
                                    <option value="XMLID_1870_">Baridhara</option>
                                    <option value="XMLID_1752_">Dhanmondi</option>
                                    <option value="XMLID_1791_">Gulshan</option>
                                    <option value="XMLID_1646_">Khilkhet</option>
                                    <option value="XMLID_1665_">Khilgaon</option>
                                    <option value="XMLID_1746_">Mirpur</option>
                                    <option value="XMLID_1738_">Mohammadpur</option>
                                    <option value="XMLID_1658_">Motijheels</option>
                                    <option value="XMLID_1765_">New Market</option>
                                    <option value="XMLID_1749_">Old Dhaka</option>
                                    <option value="XMLID_1768_">Ramna</option>
                                    <option value="XMLID_1839_">Tejgaon</option>
                                    <option value="XMLID_1661_">Uttara</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                <span class="input-group-addon" style="background: inherit;">
                  <i class="glyphicon glyphicon-wrench"></i>
                </span>
                                <select class="form-control" style="background: inherit;">
                                    <option class="disabled"  style="padding-right: 22px;"  value=" "> SELECT YOUR SERVICE </option>
                                    <option value="1">Electrical service</option>
                                    <option value="2">Cctv service</option>
                                    <option value="3">Plumbing service</option>
                                    <option value="4">IT service</option>
                                    <option value="5">Generator servicing</option>
                                    <option value="6">Air conditioner</option>

                                </select>
                            </div>
                        </div>
                        <a href="book.php"  class="btn btn-info">Next</a>
                        <!-- <button type="submit"  class="btn btn-info">Book</button> -->
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>




<style type="text/css">
    .ms-footbar {
        background-color: #455a64;
        color: #eee;
        position: relative;
        background: rgba(17, 17, 17, 0.9);
    }
    .ms-footbar a{
        color: #b1bdc1;
    }
    .ms-footbar a:hover{
        color:white;
    }

    .menu_folder h2 {

        font-size: 18px;
    }

    .menu_folder h2:hover {
        color: #fff;
    }
    .ms-footer {
        padding: 12px 0;
        padding: 1.2rem 0;
        text-align: center;
        background-color: #3b4c55;
        color: #bdbdbd;
        /* box-shadow: inset 0 2px 2px 0 rgba(0,0,0,.14), inset 0 3px 1px -2px rgba(0,0,0,.2), inset 0 1px 5px 0 rgba(0,0,0,.12); */
    }
    .menu_folder_items li a {
        color: #b1bdc1;
        height: 24px;
        line-height: 24px;
        font-size: 12px;
        font-weight: 300;
    }
    .btn-circle.btn-circle-xs {
        width: 30px;
        height: 30px;
        line-height: 30px;
        font-size: 10px;
    }
    .footer_social_links a {
        background: #cad7dc;
        color: #4a4a4a;
        width: 26px;
        height: 26px;
        line-height: 27px !important;
        margin: 0 2px;
    }
    .app_stores_columns a {
        margin-right: 8px;
        display: inline-block;
    }
    .app_stores_columns img {
        height: 32px;
    }
    .footer_social_links a {
        background: #cad7dc;
        color: #4a4a4a;
        width: 26px;
        height: 26px;
        line-height: 27px !important;
        margin: 0 2px;
    }
    .ms-footbar a {
        color: #fff;
        transition: all ease .3s;
    }

    .ms-footer p:last-child {
        margin-bottom: 0;
    }
    .shohokari_company_details {
        font-size: 14px;
    }
    p {
        line-height: 20px !important;
    }
    p {
        margin: 10 10 10px;
    }


    .mfa {
        padding: 7px;
        font-size: 15px;
        width: 30px;
        height: 30px;
        text-align: center;
        text-decoration: none;
        margin: 4px 1px;
        border-radius: 20px 20px 20px 20px;
        background:#cad7dc;
        color: #4a4a4a;

    }

    .mfa:hover {
        opacity: 0.7;
    }
    .space{
        color: transparent;
    }
</style>

<style type="text/css">
    #top-right-menu a{
        color: white;
    }
    #fucker1{
        background-color:transparent;
    }
    #fucker2{
        background-color:transparent;
    }
    #fucker1:hover{
        background-color:#fff;
    }
    #fucker2:hover{
        background-color:#fff;
    }
    .btn-home-search {
        border: 2px solid #35C36F;
        background-color: #35C36F;
        padding: 16.95px 26px 17.05px;
        color: #fff;
        border-radius: 0 5px 5px 0;
        margin-left: 1px;
    }
    .defaultimg{
        filter: blur(8px);
        -webkit-filter: blur(8px);
    }

</style>

</body>

<link rel="stylesheet" href="{{ asset('assets/mistri/css/main.css') }}">
<!--style css-->


<script>








    // This example adds a search box to a map, using the Google Place Autocomplete
    // feature. People can enter geographical searches. The search box will return a
    // pick list containing a mix of places and predicted search terms.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initAutocomplete() {
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                $("#selected_location").html(place.name);
            });
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgHcQiZNFxG7Ez08uUjLpfXc5EZfqooLA&libraries=places&callback=initAutocomplete"></script>

</body>

</html>
