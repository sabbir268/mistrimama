<!doctype html>
<html lang="en" class="page-home01">

<head>
  <title>Mistri Mama || Door step service provider</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>
  <script src="/js/login-register.js" type="text/javascript"></script>
  @include('layouts.head')

</head>

<body style="background-color: white;">
  <div class="site">
  @include('layouts.header')
  @include('newhome.index')
  @include('layouts.footer')
  </div>
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
                                        <option value="XMLID_1658_">Motijheel</option>
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
                    <option value="2">Plumbing Services</option>
                    <option value="3">Air Conditioner Services</option>
                    <option value="4">Generator Services</option>
                    <option value="5">IT Services</option>
                    <option value="6">CCTV Services</option>
                  </select>
                </div>
              </div>
              <a href="book.php" class="btn btn-info">Next</a>
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
  @include('layouts.scripts')

</body>

</html>