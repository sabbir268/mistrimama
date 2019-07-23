
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mistri mama: User Dashboard || Order list </title>
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="icon52.png" />
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="icon144.png">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="icon114.png">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="icon72.png">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="icon52.png">
    <!-- Styles -->
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/unix.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.png" />

</head>

<body>

    <?php include("head.php"); ?>

    <p style="height: 40px;"></p>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome soloski123</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active"> Order List </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <div id="main-content">
                  
                    <div class="row">
                        <h3 class="text-left" style="padding-left: 14px;"> Order List </h3>
                       
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <h3 class="text-center">Haven't tried mistri mama yet ?</h3>
                                <p class="lead text-center">Our service proviced will will be ready to serve you lets make your first order. <br> <a href="#" class="btn btn-info btn-rounded btn-md"> View all service</a></p>
                                     
                                
                            </div>
                                 
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="#">
                                                        <img class="w-100" style="height: 120px" src="../images/page-home/electrician-service.png" alt="Electronical services">
                                                        <div class="caption">
                                                            <h5>Electrical Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="#">
                                                        <img class="w-100" style="height: 120px" src="assets/images/5bfbbde726b8b.png" alt="Plumbing services">
                                                        <div class="caption">
                                                            <h5>Plumbing Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>    
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="#">
                                                        <img class="w-100" style="height: 120px;" src="assets/images/professional-cctv-technician.png" alt="CCTV services" />
                                                        <div class="caption">
                                                            <h5>CCTV Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="#">
                                                        <img class="w-100"  style="height: 120px;" src="assets/images/technician-checking-air-conditioner.png" alt="AC  services">
                                                        <div class="caption">
                                                            <h5>Air Condition Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="#">
                                                        <img class="w-100" style="height: 120px;" src="assets/images/generator.png" alt="Generator services">
                                                        <div class="caption">
                                                            <h5>
                                                            Generator
                                                            Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                           <div class="thumbnail">
                                <a href="">
                                                        <img class="w-100" style="height: 120px;" src="assets/images/5bfbbc12967f4.png" alt="ICT services">
                                                        <div class="caption">
                                                            <h5>ICT Services </h5>
                                                        </div>
                                </a>
                            </div>
                        </div>
                    </div>


                    <?php include("footer.php");?>

                </div>
            </div>
        </div>
    </div>

    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>


        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <h3>Add location </h3>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="card alert">
                                
                                <div class="card-body">
                                    <div class="horizontal-form">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Address</label>
                                                <div class="col-sm-10">
                                                    <input type="text" id="search_term" class="form-control" placeholder="Enter Address" required="yes">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-info">Submit Address</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-danger  pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                </div>
              </div>
            </div>
        </div> 

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
    <script src="assets/js/lib/jquery.min.js"></script>
    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/chartist/chartist-init.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script src="assets/js/scripts.js"></script>
    
     <script type="text/javascript">
      function activateplace(){
       var input = document.getElementById("search_term");
       var autocomplete = new google.maps.places.Autocomplete(input); 
      }
    </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNY_fXAIwvCSusE-vEhL2zOdNS53Kzj2M&libraries=places&callback=activateplace"></script>

</body>

</html>