<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <!--====== USEFULL META ======-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Front" />
    <meta name="keywords" content="App" />

    <!--====== TITLE TAG ======-->
    <title>Mistri</title>

    <!--====== FAVICON ICON =======-->
    <link rel="shortcut icon" type="image/ico" href="{{ asset('favicon.png') }}" />

    <!--====== STYLESHEETS ======-->
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/modal-video.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/stellarnav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/newfront/css/slick.css') }}">
    <link href="{{ asset('assets/newfront/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/newfront/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/newfront/css/material-icons.css') }}" rel="stylesheet">
    <!-- Multiselect -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

    <!--====== MAIN STYLESHEETS ======-->
    <link href="{{ asset('assets/newfront/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/newfront/css/responsive.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('assets/newfront/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <link href="{{ asset('assets/register/wizard.css') }}" rel="stylesheet">

    <!-- Icon font 7 Stroke  -->
    <link rel="stylesheet" href="{{ asset('assets/mistri/fonts/icon-7/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/mistri/fonts/icon-7/css/helper.css') }}">

    <!-- Icon font Renovation -->
    <link rel="stylesheet" href="{{ asset('assets/mistri/fonts/renovation/icon-font-renovation.css') }}">

    <!-- Google font -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <!-- ico for font -->
    <link rel="stylesheet" href="{{ asset('assets/mistri/icofont/icofont.min.css') }}">
    <!-- Menu Mobile: mmenu -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/mistri/components/mmenu/jquery.mmenu.all.css') }}" />

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .welcome-area{
            color:black;
            font-family:Poppins;
        }
        .welcome-area>h1{
            font-size:24px;
        }
        .modal-dialog {
            max-width: 100%;
            width: auto !important;
            display: inline-block;
        }
        .modal{
            text-align: center;
        }
        *{
            font-family:Poppins,sans-serif;
        }
        .checkbox-inline+.checkbox-inline, .radio-inline+.radio-inline{
            margin-left:0px !important;
        }

        @media screen and (max-width: 480px) {
            .checkbox-inline, .radio-inline{
                padding-left:0px !important;
            }
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @-webkit-keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }

        @keyframes fade {
            from {opacity: .4}
            to {opacity: 1}
        }
        .home-two .qs-box:hover .qs-box-icon i {
            background: #ed1c24 none repeat scroll 0 0;
            border-color: #ed1c24;
        }
        .area-title .text-left
        {
            background:white;
        }
        .area-title>ol
        {
            padding-left:15px;
        }

        .area-title p, .area-title ol li, #mp{
            font-size: 17px;
            color: #444;
        }
        .forereal{
            padding-top: 30px;
            padding-bottom: 50px;
        }
        #features{
            padding-top: 80px;
            padding-bottom: 0px;
        }
        .area-title h2{
            font-weight:700;
        }
        .features1{
            margin-bottom: 50px!important;

        }
        .features1 li{
            list-style-type: square;
        }

        input[type="checkbox"]{
            width: 20px; /*Desired width*/
            height: 20px; /*Desired height*/
        }
        .checkbox-inline{
            color:#333;
            font-size: 19px;
        }
        #watalii{
            font-weight:700;
        }
        .espbox{
            display:none;
        }
        .form-group label{
            font-size: 13px;color:#555;
        }

        .overlaay:before {
            content: "";
            position: absolute;
            left: 0; right: 0;
            top: 0; bottom: 0;
            background: rgba(229,237,246,0.7);
        }

        @media only screen and (max-width: 600px) {


            .welcome-text p{
                color:white;
            }
            .menu_folder_control{
                color:white;
            }

            .social-menu_right-arrow{
                display:none;
            }
            .menu_folder, .ms-footbar .col-md-2, .ms-footbar .col-md-8{
                width:100%;
            }

        }

        @media only screen and (min-width: 600px) {

            .phone h3, .address h3{
                color:white;
            }
            .welcome-text p{
                color:white;
                font-size:30px;
            }
            .menu_folder_control{
                color:white;
            }
            .social-menu_right-arrow{
                margin-top:105px!important;
            }

            .extra-info {
                margin-top: 30px;
                margin-left:-12%;
            }

        }

    </style>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .top-container {
            background-color: #f1f1f1;
            padding: 30px;
            text-align: center;
        }

        /* .header {
             padding: 10px 16px;
             background: #555;
             color: #f1f1f1;
         }*/

        .content {
            padding: 16px;
        }

        .sticky {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: white;
        }

        .sticky + .content {
            padding-top: 102px;
        }
    </style>

    <!-- THEME STYLE -->
    <link rel="stylesheet" href="{{ asset('assets/mistri/css/main.css') }}">
    <!--style css-->
    <link rel="stylesheet" href="{{ asset('assets/mistri/assets/css/fucker.css') }}">
    <!--responsive css-->
    <link rel="stylesheet" href="{{ asset('assets/mistri/assets/css/responsive.css')}}">


</head>
<script type="text/javascript">function add_chatinline(){var hccid=49204009;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>
<body style="background-color: white;">
<div class="site">
@include('layouts.header')
<!--- PRELOADER -->
    <div class="preeloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--SCROLL TO TOP-->
    <a href="#home" class="scrolltotop"><i class="fa fa-long-arrow-up"></i></a>
    <section class="services services-style-01">
        <div class="service-heading" >
            <div class="container" style=" margin-top: -20px;margin-bottom: -40px;
">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title">Join Now</h2>

                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-md-offset-0 col-lg-offset-0 col-sm-8 col-xs-8">
                        <h2>Want To Make Your Business Transform?</h2>

                        <h4 >Join MistriMama Today
                            <span>
                                         <a href="#" data-toggle="modal" style="border-radius: 0px;" class="btn btn-success btn-lg" data-target="#exampleModal" >Register Now!</a>

                                    </span>
                        </h4>

                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Launch demo modal
                        </button>-->

                    </div>
                    <div class="col-md-6 col-lg-6 col-md-offset-0 col-lg-offset-0 col-sm-4 col-xs-4">



                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="#myCarousel" data-slide-to="1"></li>
                                <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ asset('assets/newfront/5.png') }}" class="img-responsive" alt="Los Angeles" style="height:300px;">
                                </div>

                                <div class="item">
                                    <img src="{{ asset('assets/newfront/7.png') }}" class="img-responsive" alt="Chicago" style="height:300px;">
                                </div>

                                <div class="item">
                                    <img src="{{ asset('assets/newfront/4.png') }}" class="img-responsive" alt="New york" style="height:300px;">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <!--FEATURES AREA-->
    <section class="services services-style-01">
        <div class="service-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title">Our Services</h2>
                            <p class="description">
                                The name “Mistri Mama” was chosen for the brand name for the online electrician service. Providing quality services with the best customer experience through developing and empowering local skilled workforce. Under this brand different type of Service Providers (SP) will be on-boarded.
                            </p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-content">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/generator-image.jpg') }}" alt="service-generator">
                            </div>
                            <a class="service-item_link" href="#">
                                <div class="service-item_icon"><i class="icofont-thunder-light"></i></div>
                                Generator
                            </a>
                        </div>
                    </div>

                    <!-- start electricial -->
                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/electrician-service.png') }}" alt="service-renovation">
                            </div>
                            <a class="service-item_link" href="#">
                                <div class="service-item_icon"><i class="rn-electrical"></i></div>
                                electrical
                            </a>
                        </div>
                    </div>
                    <!-- end electrician -->

                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/cctv.jpg') }}" alt="service-renovation">
                            </div>
                            <a class="service-item_link" href="#">
                                <div class="service-item_icon"><i class="icofont-ui-camera"></i></div>
                                CCTV
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/services-plum.jpg') }}" alt="service-renovation">
                            </div>
                            <a class="service-item_link" href="plumbing_services.php">
                                <div class="service-item_icon"><i class="rn-plumbing"></i></div>
                                plumbing
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/computer.jpg') }}" alt="service-renovation">
                            </div>
                            <a class="service-item_link" href="#">
                                <div class="service-item_icon"><i class="icofont-computer"></i></div>
                                IT
                            </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="service-item">
                            <div class="service-item_img">
                                <img src="{{ asset('assets/mistri/images/page-home/ac-repair.jpg') }}" alt="service-renovation">
                            </div>
                            <a class="service-item_link" href="#">
                                <div class="service-item_icon"><i class="icofont-celsius"></i></div>
                                Air Conditional
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- /.services-style-01 -->

    <section class="feature-style-2"  data-parallax="scroll" data-image-src="images/page-home/feature_style2_bg.jpg">
        <div class="service-heading" style=" margin-top: -60px;">
            <div class="container" style=" margin-top: -20px;margin-bottom: -30px;
">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title" style="color:white; " >MistriManma Service Provider Type</h2>
                            <p class="description">
                                These service provider can be an individual or it can be an organization that provide professional service.
                                There are three type of service provider under Mistri Mama service platform. </p>

                        </center>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row" >
                <div class="col-sm-4" style="margin-bottom:-50px;margin-top:-40px;">
                    <div class="feature-item">
                        <div class="feature-item_icon">
                            <i class="pe-7s-tools"></i>
                        </div>
                        <h3 class="feature-item_title">
                            Enterprise Service Provider (ESP)
                        </h3>
                        <p class="feature-item_description">
                            Represents a service providing organization.  </p>
                    </div>
                </div>
                <div class="col-sm-4" style="margin-bottom:-50px;margin-top:-40px;">
                    <div class="feature-item">
                        <div class="feature-item_icon">
                            <i class="pe-7s-tools"></i>
                        </div>
                        <h3 class="feature-item_title">
                            Freelance Service Provider (FSP)
                        </h3>
                        <p class="feature-item_description">
                            Means individual or self employed technician.  </p>
                    </div>
                </div>
                <div class="col-sm-4" style="margin-bottom:-50px;margin-top:-40px;">
                    <div class="feature-item">
                        <div class="feature-item_icon">
                            <i class="pe-7s-tools"></i>
                        </div>
                        <h3 class="feature-item_title">
                            Mistri Mama In-house Technician Team (MMTT)
                        </h3>
                        <p class="feature-item_description">
                            A team of Mistri Mama technicians.  </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /.feature-style-2 -->

    <section class="services services-style-01">
        <div class="service-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title">ENTERPRISE SERVICE PROVIDER <span>(ESP)</span></h2>
                            <p class="description">
                                ESP represents a company or service provider organization. They can provide different type of services under  same Mistri Mama service account.
                                They have different associates for their different type of service.</p>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="service-price">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h3 class="service-price_heading">Starter</h3>
                        <div class="service-price_content">
                            <ul class="service-price_text">
                                <li>Free account</li>
                                <li>20% commission</li>
                                <li>Single area</li>
                                <li>5 Associates (FSP)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <h3 class="service-price_heading">Expert </h3>
                        <div class="service-price_content">
                            <ul class="service-price_text">
                                <li>500/month</li>
                                <li>15% commission</li>
                                <li>5 area</li>
                                <li>10 Associates (FSP)</li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <h3 class="service-price_heading">Professional</h3>
                        <div class="service-price_content">
                            <ul class="service-price_text">
                                <li>1000/month</li>
                                <li>10% commission</li>
                                <li>Division area</li>
                                <li>15 or higher Associates (FSP)</li>
                            </ul>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>

    <!--FEATURES TOP AREA-->
    <section class="features-top-area padding-100-50 features1" id="features">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-12 col-xs-12  wow fadeInUp" data-wow-delay="0.2s">
                    <div class="area-title text-center wow fadeIn" style="margin-top: -100px;">
                        <h2>ENTERPRISE SERVICE PROVIDER (ESP) REQUIREMENTS</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12" style="margin-top: -50px;">
                        <h4>REQUIREMENTS OF ESP</h4>
                        <ol id="mp">
                            <li>Must have a valid organization or company.</li>
                            <li>5-15 work force needed.</li>
                            <li>Must have a physical outlet or office.</li>
                            <li>Good service record.</li>
                            <li>Enough tech knowledge and tools to maintain an ESP account.</li>
                            <li>Any technical certification will add advantage</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12  wow fadeInUp" style="margin-top: -50px;" data-wow-delay="0.2s">
                        <h4>DOCUMENTS & TOOLS REQUIRED</h4>
                        <ol id="mp">
                            <li>ESP account manager’s National ID card and passport size photograph.</li>
                            <li>Must have tin certificate/trade license.</li>
                            <li>Every associate needs to provide valid photocopy of National ID card and passport size photograph.</li>
                            <li>Every associate needs smartphone with internet connections.</li>
                            <li>Minimum Tools requirements.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--FEATURES TOP AREA-->
    <section class="features-top-area padding-100-50 features1" id="features">
        <div class="container">
            <div class="row" style="margin-top: -100px;">
                <div class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-12 col-xs-12">
                    <div class="area-title text-center wow fadeIn">
                        <h2>TOOLS REQUIREMENT FOR ELECTRICAL ESP</h2>
                    </div>
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">

                            <table class="table table-hover table-bordered" >
                                <thead >
                                <tr>
                                    <th width="10%">Serial</th>
                                    <th width="50%">Description Material</th>
                                    <th width="40%"> Service</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Digital Multimeter</td>
                                    <td>Electrical, AC, Generator</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Flat Screw Driver</td>
                                    <td>10% commissionElectrical, AC, Generator
                                <tr>
                                    <td>3</td>
                                    <td>Tester screw driver(Regular)</td>
                                    <td>Electrical, AC, Generator</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Phillips Screw Driver</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Adjustable Wrench</td>
                                    <td>Electrical, AC, Plumber</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Hack Saw Frame</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Nut Driver Set</td>
                                    <td>Electrical, AC, IT</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Nose Plier</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Cutting plier</td>
                                    <td>Electrical, AC, IT, CCTV</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Monkey plier</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>L-N Key Set(Hex key and star key)</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Tools Bag(big size)</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
    <section class="services services-style-01">
        <div class="service-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title">FREELANCE SERVICE PROVIDER (FSP)</h2>

                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row service-detail_content">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11 ">
                <p>FSP are basically ad hoc basis skilled technicians. They do not represent any organization.
                    They can be employee of different service providing organization.</p>
                <ul class="service-list_item-categories">
                    <li>FSP means Freelance Service Provider.</li>
                    <li>FSP works individually for Mistri Mama.</li>
                    <li>Freelance service provider are individual electrician, plumber, ac repair mechanic, etc.</li>
                    <li>Their Mistri Mama account do not have associate option.</li>
                    <li>One FSP can offer one type or multiple type of services. </li>
                    <li>FSP can work under ESP or individually.</li>
                </ul>
            </div>
        </div>


    </section>


    <!--FEATURES TOP AREA-->
    <section class="features-top-area padding-100-50 features1" id="features" >
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-12 col-xs-12  wow fadeInUp" data-wow-delay="0.2s">
                    <div class="area-title text-center wow fadeIn" style="margin-top: -100px;">
                        <h2>FREELANCE SERVICE PROVIDER (FSP) REQUIREMENTS</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12" style="margin-top: -50px;">
                        <h4>Requirements of FSP</h4>
                        <ol id="mp">
                            <li>Minimum 2 years of experience on related work</li>
                            <li>Must have a smart Phone with internet facilities</li>
                            <li>Any technical certification will add advantage</li>
                            <li>Valid Nationality (Bangladeshi)</li>
                            <li>Must have a valid organization or company.</li>
                            <li>Good service record</li>
                            <li>Enough tech knowledge and tools to maintain an FSP account.</li>
                            <li>Any technical certification will add advantage</li>
                        </ol>
                    </div>
                    <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12" style="margin-top: -50px;">
                        <h4>Documents & tools required</h4>
                        <ol id="mp">
                            <li>FSP account manager’s National ID card and passport size photograph.</li>
                            <li>Tin certificate/trade license (if available).</li>
                            <li>Minimum Tools requirements.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--FEATURES TOP AREA-->
    <section class="features-top-area padding-100-50 features1" id="features">
        <div class="container">
            <div class="row" style="margin-top: -100px;">
                <div  class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-12 col-xs-12  wow fadeInUp" data-wow-delay="0.2s">
                    <div class="area-title text-center wow fadeIn">
                        <h2>TOOLS REQUIREMENT FOR ELECTRICAL FSP</h2>
                    </div>
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 col-sm-12 col-xs-12">

                            <table class="table table-hover table-bordered" >
                                <thead >
                                <tr>
                                    <th style="width:10%">Serial</th>
                                    <th>Description Material/ Service</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody >
                                <tr>
                                    <td>1</td>
                                    <td>Digital Multimeter</td>
                                    <td>Electrical, AC, Generator</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Flat Screw Driver</td>
                                    <td>Electrical, AC, Generator
                                <tr>
                                    <td>3</td>
                                    <td>Tester screw driver(Regular)</td>
                                    <td>Electrical, AC, Generator</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Phillips Screw Driver</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Adjustable Wrench</td>
                                    <td>Electrical, AC, Plumber</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Hack Saw Frame</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Nut Driver Set</td>
                                    <td>Electrical, AC, IT</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Nose Plier</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>Cutting plier</td>
                                    <td>Electrical, AC, IT, CCTV</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Monkey plier</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>L-N Key Set(Hex key and star key)</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Tools Bag(big size)</td>
                                    <td>Electrical, AC,</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="services services-style-01">
        <div class="service-heading">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <h2 class="heading-title">MISTRI MAMA TECHNICIAN TEAM (MMTT)</h2>

                        </center>
                    </div>
                </div>
            </div>
        </div>
        <div class="row service-detail_content">
            <div class="col-sm-1">
            </div>
            <div class="col-sm-11 ">
                <p>
                    This is Mistri Mama’s own technician team, which will work along with ESP and FSP as a backup team.
                </p>
                <ul class="service-list_item-categories">
                    <li>MMTT is a group of highly skilled technician</li>
                    <li>They are capable of provide all six type of service.</li>
                    <li>They are the support team of ESP and FSP.</li>
                    <li>They will be used to provide free service on demand</li>
                </ul>
            </div>
        </div>


    </section>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 style="margin-bottom:-30px;"> Registration process</h2>

                    <button type="button" class="close "  data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">



                    <div class="container">
                        {{--      <div class="row">
                                  <div class="col-md-12 col-lg-12 col-md-offset-0 col-lg-offset-0 col-sm-12 col-xs-12">
                                      <div class="area-title text-center wow fadeIn" id="registernow">
                                      </div>
                                  </div>
                              </div>--}}
                        <div class="row">
                            <?php

                            $clusters=\DB::table('cluster')->get();

                            ?>

                            <div class="wizard">
                                <div class="panel panel-info" style="margin-bottom:-30px;margin-top:-25px;">
                                    <div class="panel-heading">

                                        <div class="wizard-inner" style="margin-bottom:-70px;margin-top:-20px;">
                                            <ul class="nav nav-tabs" role="tablist">

                                                <li role="presentation" class="active">
                                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="SERVICE PROVIDER TYPE">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-cog"></i>
                                    </span>
                                                    </a>
                                                </li>

                                                <li role="presentation" class="disabled">
                                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Information">
                                    <span class="round-tab">
                                        <i class="glyphicon  glyphicon-info-sign"></i>
                                    </span>
                                                    </a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Service price">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-credit-card"></i>
                                    </span>
                                                    </a>
                                                </li>

                                                <li role="presentation" class="disabled">
                                                    <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="panel-body">



                                        {!! Form::open(['method'=>'post','role'=>'form',  'style'=>'padding:2%;', 'class'=>'main-contact123', 'novalidate','files'=>true]) !!}
                                        <div class="tab-content">
                                            <div class="tab-pane active" role="tabpanel" id="step1">
                                                <div class="col-md-4">
                                                    <label class = "checkbox-inline label label-warning">
                                                        SELECT SERVICE PROVIDER TYPE
                                                    </label>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="col-md-4">

                                                        <label class = "checkbox-inline ">
                                                            <input type = "radio" style="height:20px; width:20px;" name = "choose" id="choose1" value = "ESP"> ESP
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <label class = "checkbox-inline ">
                                                            <input type = "radio" style="height:20px; width:20px;" checked name = "choose" id="choose2" value = "FSP">  FSP
                                                        </label>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <label class = "checkbox-inline ">
                                                            <input type = "radio" style="height:20px; width:20px;" name = "choose" id="choose2" value = "MMTT"> MMTT
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">

                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" style="border-radius: 0px;" class="btn btn-primary next-step1 btn-lg">Save and continue</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step2">
                                                <div class="col-sm-12 col-md-12 espbox">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">

                                                            <h3 id="selected">Enterprise Service Provider (ESP)</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-sm-12 col-md-12">

                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-heading">
                                                                            <h4 style="font-weight:700;">Basic Information</h4>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Owner Name<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" name="esp_ownername" class="form-control required-entry456" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Phone number<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input id="phn" type="text" name="esp_phoneno" class="form-control required-entry456 phonecon" value="+88" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Alternate phone number</label>
                                                                                    <div class="col-sm-8"><input  id="aphn" type="text" name="esp_altphoneno" class="form-control" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Email(if available)</label>
                                                                                    <div class="col-sm-8"><input type="email" name="esp_email" class="form-control" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Mailing address</label>
                                                                                    <div class="col-sm-8"><input type="text" name="esp_mailingaddress" class="form-control" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">NID/Smart card number<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="number" name="esp_smartcardno" class="form-control required-entry456" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4"> NID(Front )<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="file" name="esp_organisationownersnid" class="form-control required-entry456" /></div>
                                                                                </div>
                                                                            </div><br>

                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Passport<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="file" name="esp_organisationpassportsize" class="form-control required-entry456" /></div>
                                                                                </div>
                                                                            </div><br>

                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">TIN certificate or trade license<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="file" name="esp_tincertificate" class="form-control required-entry456" /></div>
                                                                                </div>
                                                                            </div><br>

                                                                        </div></div>

                                                                </div>

                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-heading">

                                                                            <h4 style="font-weight:700;">Business Information</h4>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <div class="row"><br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Service Category<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456 selectpicker" name="esp_cluster"  id="cluster" multiple data-live-search="true">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="1">Electrical Service</option>
                                                                                            <option value="2">CCTV Service</option>
                                                                                            <option value="3">Plumbng Service</option>
                                                                                            <option value="4">Generator Service</option>
                                                                                            <option value="5">IT Service</option>
                                                                                            <option value="6">Sir Conditoner Service</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Category<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control" name="esp_category">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="1">Starter (commission 20%)</option>
                                                                                            <option value="2">Expert (commission 15%)</option>
                                                                                            <option value="2">Professional (commission 10%)</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Service Days<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456 selectpicker" name="esp_cluster"  id="cluster" multiple data-live-search="true">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="">Firday</option>
                                                                                            <option value="">Saturday</option>
                                                                                            <option value="">Sunday</option>
                                                                                            <option value="">Monday</option>
                                                                                            <option value="">Tuesday</option>
                                                                                            <option value="">Wednesday</option>
                                                                                            <option value="">Thursday</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Service Time<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456 selectpicker" name="esp_cluster"  id="cluster" multiple data-live-search="true">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="">1am - 2am</option>
                                                                                            <option value="">2am - 3am</option>
                                                                                            <option value="">3am - 4am</option>
                                                                                            <option value="">4am - 5am</option>
                                                                                            <option value="">5am - 6am</option>
                                                                                            <option value="">6am - 7am</option>
                                                                                            <option value="">7am - 8am</option>
                                                                                            <option value="">8am - 9am</option>
                                                                                            <option value="">9am - 10am</option>
                                                                                            <option value="">10am - 11am</option>
                                                                                            <option value="">11am - 12pm</option>
                                                                                            <option value="">12pm - 1pm</option>
                                                                                            <option value="">1pm - 2pm</option>
                                                                                            <option value="">2pm - 3pm</option>
                                                                                            <option value="">3pm - 4pm</option>
                                                                                            <option value="">4pm - 5pm</option>
                                                                                            <option value="">5pm - 6pm</option>
                                                                                            <option value="">6pm - 7pm</option>
                                                                                            <option value="">7pm - 8pm</option>
                                                                                            <option value="">8pm - 9pm</option>
                                                                                            <option value="">9pm - 10pm</option>
                                                                                            <option value="">10pm - 11pm</option>
                                                                                            <option value="">11pm - 12am</option>
                                                                                            <option value="">12am - 1am</option>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row"><br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Cluster<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456 selectpicker cluster" name="esp_cluster"  id="cluster" multiple data-live-search="true">
                                                                                            <option value="#">--select--</option>
                                                                                            @foreach($clusters as $c)
                                                                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Zone/Thana<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control thanazone required-entry456 " name="esp_zone" multiple>
                                                                                            <option value="#">--select--</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Division<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456" name="esp_division">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="3" selected>Dhaka Division</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br><br><br>
                                                                            <div class="panel panel-info">
                                                                                <div class="panel-heading">

                                                                                    <h4 style="font-weight:700;">Payment Information</h4>
                                                                                </div>
                                                                                <div class="panel-body">

                                                                                    <div class="row">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-4">Mobile Banking<span style="color:red">*</span></label>
                                                                                            <div class="col-sm-8"><input type="radio" name="esp_mfspname" />Rocket
                                                                                                <input type="radio" name="esp_mfspname" />Share Cash
                                                                                                <input type="radio" name="esp_mfspname" />Bkash</div>
                                                                                        </div>
                                                                                    </div><br>
                                                                                    <div class="row">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-4">MFS account number<span style="color:red">*</span></label>
                                                                                            <div class="col-sm-8"><input type="text" value="+88" name="esp_mfsacn" class="form-control required-entry456 phonecon" required/></div>
                                                                                        </div>
                                                                                    </div><br>
                                                                                </div></div>
                                                                        </div></div>

                                                                </div>

                                                                <div class="col-md-12 col-sm-12 endpend">

                                                                    <h4 style="font-weight:700;" class="alert alert-info">Comrades
                                                                        <span style="margin-bottom:20px;"><button type="button" id="generatecomrade" class="btn btn-success pull-right">
                                                <i class="fa fa-plus"></i> Add Comrade</button></span></h4><hr/>

                                                                    <div class="col-sm-6 col-md-6">
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4"> Name<span style="color:red">*</span></label>
                                                                                <div class="col-sm-8"><input type="text" name="esp_comname[]" class="form-control required-entry456" /></div>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4">Phone number<span style="color:red">*</span></label>
                                                                                <div class="col-sm-8"><input  type="text" name="esp_comphone[]" class="form-control required-entry456" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4">Alternate phone number</label>
                                                                                <div class="col-sm-8"><input type="text" name="esp_comaltphoneno[]" class="form-control" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4">NID/Smart card number<span style="color:red">*</span></label>
                                                                                <div class="col-sm-8"><input type="text" name="esp_comsmartcardno[]" class="form-control required-entry456"/></div>
                                                                            </div>
                                                                        </div> <br>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4">NID or smart card photocopy of each comrades.<span style="color:red">*</span></label>
                                                                                <div class="col-sm-8"><input type="file" name="esp_nidofcomrade[]" class="form-control required-entry456"/></div>
                                                                            </div>
                                                                        </div><br>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                <label class="col-sm-4">1 copy passport size photograph of each comrades.<span style="color:red">*</span></label>
                                                                                <div class="col-sm-8"><input type="file" name="esp_passportoffcomrade[]" class="form-control required-entry456"/></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group">
                                                                                &nbsp;
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-12 col-md-12" style="margin-top: 20px;">

                                                                <div class="error-append"></div>

                                                                <ul class="list-inline pull-right">
                                                                    <li><button type="button"   class="btn btn-default prev-step" style="border-radius: 20px;" >Previous</button></li>
                                                                    <li><button type="button"   class="btn btn-primary next-step-esp" style="border-radius: 20px;">Save and continue</button></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <!--FSP-->
                                                <div class="col-sm-12 col-md-12 fspbox">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h3 id="selected">Freelance Service Provider (FSP)</h3>
                                                        </div><div class="panel-body">
                                                            <div class="col-sm-12 col-md-12">
                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-heading">
                                                                            <h4 style="font-weight:700;">Basic Information</h4></div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4"> Name <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" name="fsp_name" class="form-control required-entry123" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Phone number <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" name="fsp_phoneno" class="form-control required-entry123 phonecon" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" value="+88"  required /></div>

                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Alternate phone number</label>
                                                                                    <div class="col-sm-8"><input type="text" name="fsp_altphoneno" class="form-control" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Email(if available)</label>
                                                                                    <div class="col-sm-8"><input type="email" name="fsp_email" class="form-control" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Mailing address</label>
                                                                                    <div class="col-sm-8"><input type="text" name="fsp_mailingaddress" class="form-control" /></div>
                                                                                </div>
                                                                            </div><br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">NID/Smart card <br> number <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="text" name="fsp_smartcardno" class="form-control required-entry123" /></div>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">NID or smart card <br> photocopy <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="file" name="fsp_smartcardfile" class="form-control required-entry123" /></div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">1 copy passport size <br> photograph <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><input type="file" name="fsp_passportphoto" class="form-control required-entry123" /></div>
                                                                                </div>
                                                                            </div>
                                                                        </div></div>
                                                                </div>

                                                                <div class="col-md-6 col-sm-6">
                                                                    <div class="panel panel-info">
                                                                        <div class="panel-heading">
                                                                            <h4 style="font-weight:700;">Business Information</h4>
                                                                        </div>
                                                                        <div class="panel-body">
                                                                            <div class="row">
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Service providing <br>date and time <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8"><label class="radio-inline"><input type="radio" name="optradio" checked>Easier (9a.m.-8p.m)</label>
                                                                                        <label class="radio-inline"><input type="radio" name="optradio">Regular (8a.m-10p.m)</label>
                                                                                        <label class="radio-inline"><input type="radio" name="optradio">Advanced (emergency or 24//7)</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row"><br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Cluster <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control selectpicker" name="fsp_cluster" id="cluster"  multiple data-live-search="true">
                                                                                            <option value="#">--select--</option>
                                                                                            @foreach($clusters as $c)
                                                                                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Zone/Thana <span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control  thanazone " name="fsp_zone" multiple>
                                                                                            <option value="#">--select--</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <br>
                                                                                <div class="form-group">
                                                                                    <label class="col-sm-4">Division<span style="color:red">*</span></label>
                                                                                    <div class="col-sm-8">
                                                                                        <select class="form-control required-entry456" name="fsp_division">
                                                                                            <option value="#">--select--</option>
                                                                                            <option value="1">Barishal Division</option>
                                                                                            <option value="2">Chittagong Division</option>
                                                                                            <option value="3" selected>Dhaka Division</option>
                                                                                            <option value="3">Khulna Division</option>
                                                                                            <option value="5">Mymensingh Division</option>
                                                                                            <option value="6">Rajshahi Division</option>
                                                                                            <option value="7">Rangpur Division</option>
                                                                                            <option value="8">Sylhet Division</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <br><br><br>
                                                                            <div class="panel panel-info">
                                                                                <div class="panel-heading">

                                                                                    <h4 style="font-weight:700;">Payment Information</h4>
                                                                                </div><div class="panel-body">
                                                                                    <div class="row">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-4">MFS service provider name <span style="color:red">*</span></label>
                                                                                            <div class="col-sm-8"><input type="text" name="fsp_mfspname" class="form-control required-entry123"/></div>
                                                                                        </div>
                                                                                    </div><br>
                                                                                    <div class="row">
                                                                                        <div class="form-group">
                                                                                            <label class="col-sm-4">MFS account number. <span style="color:red">*</span></label>
                                                                                            <div class="col-sm-8"><input type="text" value="+88" name="fsp_mfsacn" class="form-control required-entry123"/></div>
                                                                                        </div>
                                                                                    </div><br>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!--End FSP-->
                                                            <div class="col-sm-12 col-md-12" style="margin-top: 20px;">

                                                                <div class="error-append"></div>

                                                                <ul class="list-inline pull-right">
                                                                    <li><button type="button" class="btn btn-default prev-step" style="border-radius: 20px;" >Previous</button></li>
                                                                    <li><button type="button" class="btn btn-primary next-step-fsp" style="border-radius: 20px;" >Save and continue</button></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="step3">
                                                <h3>Service price</h3>
                                                <table class="table table-bordered wow fadeInUp" data-wow-delay="0.2s">
                                                    <thead style="background:#ed1c24;color:white;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Service Name</th>
                                                        <th>Service Price</th>
                                                        <th>Service Provider Amount</th>
                                                        <th>Mistri Mama Commision</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody style="color:#333;background:#ed1c24;" class="jkl">
                                                    @foreach(\DB::table('services')->get() as $g)
                                                        <tr>
                                                            <td><input type="checkbox" class="chcker form-control" name="service_selected[]" value="{{ $g->id }}" />&nbsp</td>
                                                            <td>{{ $g->name }}</td>
                                                            <td><input type="text" value="{{ $g->service_price}}" class="chcker1 form-control" disabled name="price[]"/></td>
                                                            <td class="spamountt">{{ $g->sp_amount }}</td>
                                                            <td class="spcommisionn">{{ $g->desp_comission }}</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="6">
                                                            <button type="button" class="btn btn-sm btn-success addnewservice"><i class="fa fa-plus"></i> Add New Service</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                                    <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane" role="tabpanel" id="complete">
                                                <h3>Almost Complete .....</h3>
                                                <ul class="list-inline pull-right">
                                                    <li><button type="submit" class="btn btn-primary btn-info-full next-step submtbtn123">Confirm and submit</button></li>
                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>





                </div>

            </div>
        </div>
    </div>



    @include('layouts.footer')
</div>

<!--====== SCRIPTS JS ======-->
<script src="{{ asset('assets/newfront/js/vendor/jquery-1.12.4.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/vendor/bootstrap.min.js') }}"></script>
<!-- Mobile Menu -->
<script src="{{ asset('assets/mistri/components/mmenu/jquery.mmenu.min.all.js') }}"></script>

<!--====== PLUGINS JS ======-->
<script src="{{ asset('assets/newfront/js/vendor/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('assets/newfront/js/vendor/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/vendor/jquery.appear.js') }}"></script>
<script src="{{ asset('assets/newfront/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/stellar.js') }}"></script>
<script src="{{ asset('assets/newfront/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/jquery-modal-video.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/stellarnav.min.js') }}"></script>
<script src="{{ asset('assets/newfront/js/contact-form.js') }}"></script>
<script src="{{ asset('assets/newfront/js/jquery.ajaxchimp.js') }}"></script>
<script src="{{ asset('assets/newfront/js/jquery.sticky.js') }}"></script>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>


<!--===== ACTIVE JS=====-->
<script src="{{ asset('assets/newfront/js/main.js') }}"></script>
<!--<script src="{{ asset('assets/register/wizard.js') }}"></script>-->
<!--<script>

var str =document.getElementById("demo");;
var patt1 = /^(?:\+88|01)?(?:\d{11}|\d{13})$/;
var result = str.match(patt1);


</script>-->
<script>
    $(document).ready(function(){
        $("#dis").sticky({topSpacing:0});
    });
</script>
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 4000); // Change image every 2 seconds
    }
</script>


<script>

    $(document).on('submit','.main-contact123', function (e) {


        if (!e.isDefaultPrevented()) {

            $(".submtbtn123").attr('disabled', true).html('<i class="fa fa-refresh fa-spin" style="font-size:24px"></i> Saving please wait...').css('background', "#6D86C7");


            $('.error-append').html('<div class="alert alert-success fgy"><i class="fa fa-spinner fa-spin"></i> Saving...</p>.</div>');

            $.ajax({
                type: "POST",
                url: "{{ url('saveprovider') }}",
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (data) {

                    swal(data.message);

                    if(data.type ===1){

                    }else{

                        $('.main-contact123').trigger("reset");
                        window.location.reload();

                    }


                    $(".submtbtn123").attr('disabled', true).html('Confirm and Submit');
                    $(".submtbtn123").attr('disabled', false);

                }
            });

            return false;
        }

    });

</script>


<script>

    $(document).ready(function () {



        $(document).on("change", ".chcker",function(){
            if($(this).is(':checked')){
                $(this).parent().parent().find(".chcker1").removeAttr('disabled');
            }else{
                $(this).parent().parent().find(".chcker1").attr('disabled', true);
            }
        });

        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step1").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });

        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }


    $(document).ready(function () {

        $('#choose1').click(function () {
            if ($(this).is(':checked')) {
                $(".espbox").show();
                $(".fspbox").hide();
            }
        });

        $('#choose2').click(function () {
            if ($(this).is(':checked')) {
                $(".espbox").hide();
                $(".fspbox").show();
            }
        });
    });

    $(document).ready(function(){

        $(document).on("change",  ".cluster", function(){
alert($(this).val());
            $.ajax({
                type: "GET",
                url: '{{ url('searchthana') }}',
                data:{id:$(this).val()},
                success:function(data){

                    //    alert(data);
                    $('.thanazone').append(data);
                    //$('.thanazone').html(data);

                }
            });

        });

        $(document).on("click", ".remove123", function(){
            $(this).parent().parent().remove();
        });

        $(document).on('click', ".addnewservice", function(){

            var row='<tr><td></td><td><input type="text" class="form-control" name="servicename123[]"/></td><td><input type="text" class="form-control chcker1" name="serviceprice123[]"/></td><td></td><td></td><td><button class="btn btn-danger remove123">remove</button></td></tr>';
            $(".jkl").append(row);

        });

    });

    $(document).on("click", ".removeesp", function(){

        $(this).parent().parent().parent().remove();

    });

    $(document).ready(function(){

        $(document).on('keyup', ".chcker1", function(){
            if($(this).val()===""){

                $(this).parent().parent().find(".spamountt").html('');
                $(this).parent().parent().find(".spcommisionn").html('');

            }else{

                var amount=$(this).val();

                if (isNaN(amount)){

                    $(this).parent().parent().find(".spamountt").html('');
                    $(this).parent().parent().find(".spcommisionn").html('');
                    console.log(amount);

                }else{

                    $(this).parent().parent().find(".spamountt").html(10*amount/100);
                    $(this).parent().parent().find(".spcommisionn").html(20*amount/100);

                }
            }
        });

        $("#generatecomrade").click(function(){


            var html='<div class="col-sm-6 col-md-6"><div class="row"><div class="form-group"><label class="col-sm-4"> Name <span style="color:red">*</span></label><div class="col-sm-8"><input type="text" name="esp_comname[]" class="form-control required-entry456"  /></div> </div></div><br><div class="row"><div class="form-group"><label class="col-sm-4">Phone number<span style="color:red">*</span></label><div class="col-sm-8"><input type="text" name="esp_comphone[]" class="form-control required-entry456" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div></div> </div><br><div class="row"> <div class="form-group"><label class="col-sm-4">Alternate phone number</label><div class="col-sm-8"><input type="text" name="esp_comaltphoneno[]" class="form-control" pattern="^(?:\+88|01)?(?:\d{11}|\d{13})$" required /></div></div></div><br><div class="row"><div class="form-group"><label class="col-sm-4">NID/Smart card number<span style="color:red">*</span></label><div class="col-sm-8"><input type="text" name="esp_comsmartcardno[]" class="form-control required-entry456" /></div> </div> </div> <br><div class="row"><div class="form-group"><label class="col-sm-4">NID or smart card photocopy of each comrades.<span style="color:red">*</span></label><div class="col-sm-8"><input type="file" name="esp_nidofcomrade[]" class="form-control required-entry456" /></div></div> </div><br><div class="row"><div class="form-group">  <label class="col-sm-4">1 copy passport size photograph of each comrades<span style="color:red">*</span></label><div class="col-sm-8"><input type="file" name="esp_passportoffcomrade[]" class="form-control required-entry456" /></div> </div></div><div class="row"><div class="form-group"><button class="btn btn-danger btn-sm removeesp"><i class="fa fa-trash"></i> Remove</button></div></div><br> </div>';

            $(".endpend").append(html);

        });
        $('.phonecon').on('keyup ',function(){
            var input = $(this);

            if(input.val().length<4)
            {
                input.val('+88')
            }


            //   alert(input.val().length);
        });
        $(document).on("click",".next-step-fsp", function(){

            var reqlength = $('.required-entry123').length;
            console.log(reqlength);
            var value = $('.required-entry123').filter(function () {
                return this.value != '';
            });

            if (value.length>=0 && (value.length !== reqlength)) {
                $('.error-append').html('<div class="alert alert-danger fgy">Please fill out all required fields.</div>');
                $('.fgy').delay(3000).fadeOut();
            } else {
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
            }

        });

        $(document).on("click",".next-step-esp", function(){

            var reqlength = $('.required-entry456').length;
            console.log(reqlength);
            var value = $('.required-entry456').filter(function () {
                return this.value != '';
            });

            if (value.length>=0 && (value.length !== reqlength)) {
                $('.error-append').html('<div class="alert alert-danger fgy">Please fill out all required fields.</div>');
                $('.fgy').delay(3000).fadeOut();
            } else {
                var $active = $('.wizard .nav-tabs li.active');
                $active.next().removeClass('disabled');
                nextTab($active);
            }

        });

    });
</script>
<script src="{{ asset('assets/mistri/js/main.js') }}"></script>

</body>

</html>