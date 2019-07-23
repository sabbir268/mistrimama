<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="admin">
  <meta name="keywords" content="admin" />
  <title>Admin</title>

  <link href="{{asset('assets/newadmin/css/root.css') }}" rel="stylesheet">
  <link rel="shortcut icon" href="favicon.png" />
  <!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/jquery.min.js') }}"></script>

  </head>
  <body>
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <!-- START TOP -->
  <div id="top" class="clearfix">

    <!-- Start App Logo -->
    <div class="applogo">
      <a href="{{ url('admin') }}" class="logo">Mistri</a>
    </div>
    <!-- End App Logo -->

    <!-- Start Sidebar Show Hide Button -->
    <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
    <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
    <!-- End Sidebar Show Hide Button -->




    <!-- Start Top Right -->
    <ul class="top-right">


    <li class="dropdown link">
      <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><img src="{{asset('assets/newadmin/default.png') }}" alt="img"><b>Welcome, {!! Auth::guard('admin')->user()->name !!} </b><span class="caret"></span></a>
        <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
          <li role="presentation" class="dropdown-header">Profile</li>
          <li><a href="{{ url('admin-change-password') }}"><i class="fa falist fa-cogs"></i> Change Password</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('admin-logout') }}"><i class="fa falist fa-power-off"></i> Logout</a></li>
        </ul>
    </li>

    </ul>
    <!-- End Top Right -->

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 


<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEBAR -->
<div class="sidebar clearfix">

<ul class="sidebar-panel nav">
  <li class="sidetitle">MAIN</li>
  <li><a href="{{ url('admin') }}"><span class="icon color5"><i class="fa fa-home"></i></span>Dashboard</a></li>
  <li><a href="{{ url('providers') }}"><span class="icon color6"><i class="fa fa-users"></i></span>FSP & MMTT Providers</a></li>
  <li><a href="{{ url('esp-providers') }}"><span class="icon color6"><i class="fa fa-users"></i></span>ESP Providers</a></li>
  <li><a href="{{ url('services-list') }}"><span class="icon color6"><i class="fa fa-cogs"></i></span>Services &amp; Prices</a></li>
  
</ul>

</div>
<!-- END SIDEBAR -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Dashboard</h1>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="{{ url('admin') }}" class="btn btn-light">Dashboard</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-widget" style="min-height:700px;">

@yield('content')
 


</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- Start Footer -->
<div class="row footer">
  <div class="col-md-6 text-left">
  Copyright © 2018 All rights reserved.
  </div>
</div>
<!-- End Footer -->


</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 



  </div>

</div>
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 



<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="{{asset('assets/newadmin/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/plugins.js') }}"></script>

<!-- ================================================
Bootstrap Select
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/bootstrap-select/bootstrap-select.js') }}"></script>

<!-- ================================================
Bootstrap Toggle
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>

<!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
<!-- main file -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js') }}"></script>
<!-- bootstrap file -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>

<!-- ================================================
Summernote
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/summernote/summernote.min.js') }}"></script>


<!-- ================================================
Data Tables
================================================ -->
<script src="{{asset('assets/newadmin/js/datatables/datatables.min.js') }}"></script>

<!-- ================================================
Sweet Alert
================================================ -->
<script src="{{asset('assets/newadmin/js/sweet-alert/sweet-alert.min.js') }}"></script>


<!-- ================================================
jQuery UI
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- ================================================
Moment.js
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/moment/moment.min.js') }}"></script>

<!-- ================================================
Full Calendar
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/full-calendar/fullcalendar.js') }}"></script>

<!-- ================================================
Bootstrap Date Range Picker
================================================ -->
<script type="text/javascript" src="{{asset('assets/newadmin/js/date-range-picker/daterangepicker.js') }}"></script>

<!-- ================================================
Below codes are only for index widgets
================================================ -->
<script>
$(document).ready(function() {
    $('#example0').DataTable();
    
    
    $(document).on("click",".confirma", function(e){
        e.preventDefault();
        
        if(confirm("Are you sure to proceed and delete?")){
            window.location.href=$(this).attr('href');
        }
    })
} );
</script>



</body>

</html>