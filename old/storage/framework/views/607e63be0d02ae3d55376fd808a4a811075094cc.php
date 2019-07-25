<?php $__env->startSection('css'); ?>
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="big-title">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Service Provider</h2>
                </div>
            </div>
        </div>
    </section>
    <div class="container overlays">

        <h2>Want to become Service Provider</h2>
       <p>Fill out the form to become service provider</p>
        <?php if(\Session::has('success')): ?>
        <?php $alert  =  true ?>
            <div class="alert alert-danger">
                <ul>
                    <li><?php echo \Session::get('success'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
        
        <?php  if (Session::has('error')): ?>
            <div class="alert alert-danger alert-dismissible fade in mt10">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php  echo Session::get('error'); ?>
            </div>
        <?php endif; ?>
        <?php  if ($errors->has('l_email')): ?>
            <div class="alert alert-danger alert-dismissible fade in mt10">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <?php  echo $errors->first('l_email'); ?>
            </div>
        <?php endif; ?>
        <?php  echo $errors->first('l_email'); ?>
        
           <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Include SmartWizard CSS -->
    <link href="<?php echo e(url('Flexible-Bootstrap-form/dist/css/smart_wizard.css')); ?>" rel="stylesheet" type="text/css" />
    <!-- Optional SmartWizard theme -->
    <link href="<?php echo e(url('Flexible-Bootstrap-form/dist/css/smart_wizard_theme_circles.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(url('Flexible-Bootstrap-form/dist/css/smart_wizard_theme_arrows.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(url('Flexible-Bootstrap-form/dist/css/smart_wizard_theme_dots.css')); ?>" rel="stylesheet" type="text/css"/>

    <div class="container">
        <!-- External toolbar sample -->
        <div class="row d-flex align-items-center p-3 my-3 text-white-50">
        </div>
        <!-- SmartWizard html -->
         <!-- SmartWizard html -->
         <form method="post" action="#haiderform">
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1" style="text-transform: uppercase;">Service Provider Type</a></li>
                <li><a href="#step-2" style="text-transform: uppercase;">personal Info</a></li>
                <li><a href="#step-3" style="text-transform: uppercase;">business Info</a></li>
                <li><a href="#step-4" style="text-transform: uppercase;">Payment Details</a></li>
                <li><a href="#step-5" style="text-transform: uppercase;">Comrade info</a></li>
                <li><a href="#step-6" style="text-transform: uppercase;">Login Info</a></li>
            </ul>

            <div>

                <div id="step-1">
                     <div class="row">
                    <div class="col-md-12">
                        <select class="form-control">
                            <option>Select A servies Type </option>
                            <option>ESP</option>
                            <option>FSP</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                         <p style="margin-top: 4%;"><strong>ESP</strong> represents a service providing organization </p>
                        <p><strong>FSP</strong> means individual or self employed technicians </p>
                    </div>
                </div>
            </div>



                <div id="step-2">
                   <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Name">Name</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Name" required="true">
                            </div>

                            <div class="form-group">
                                <label for="Name">Attemate Phone</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Attemate Phone">
                            </div>

                            <div class="form-group">
                                <label for="Name">Mailin address</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Mailin address">
                            </div>

                            <div class="form-group">
                                <label for="Name">NID (font)</label>
                                <input type="file" name="" id="Name" class="form-control" placeholder="NID (font)">
                            </div>

                            <div class="form-group">
                                <label for="Name">photograph</label>
                                <input type="file" name="" id="Name" class="form-control" placeholder="photograph">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Phone">Phone</label>
                                <input type="text" name="" id="Phone" class="form-control" placeholder="+88">
                            </div>

                            <div class="form-group">
                                <label for="Phone">Email</label>
                                <input type="text" name="" id="Phone" class="form-control" placeholder="Email">
                            </div>

                            <div class="form-group">
                                <label for="Phone">NID Smart Card Number</label>
                                <input type="text" name="" id="Phone" class="form-control" placeholder="NID Smart Card Number">
                            </div>


                            <div class="form-group">
                                <label for="Phone">NID (Back)</label>
                                <input type="text" name="" id="Phone" class="form-control" placeholder="NID (Back)">
                            </div>


                            <div class="form-group">
                                <label for="Phone">Tin Certificate or Trade License</label>
                                <input type="text" name="" id="Phone" class="form-control" placeholder="Tin Certificate or Trade License">
                            </div>

                        </div>


                   </div>
                </div>




                <div id="step-3" class="">
                    <div class="row">

                                        
                                            <div class="col-md-12">
                                                <br>
                                                <h5 style="text-align:center">CHOOSE A SERVICE TYPE</h5>
                                                <select class="form-control" name="service_type">
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                                    <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                </select>
                                            </div>
                                            

                                            <div class="col-md-12 col-sm-12" style="margin-top:10px">
                                              <div class="panel panel-info">
                                                  <div class="panel-body subservice-category">
                                                      <table class="table table-striped">
                                                          <thead>
                                                              <tr>
                                                              <th col="scope">#</th>
                                                              <th col="scope">Service Name</th>
                                                              <th col="scope">Service Price</th>
                                                              <th col="scope">Service Amount</th>
                                                              <th col="scope">MM Commission</th>
                                                              <th col="scope">Action</th>
                                                          </tr>
                                                          </thead>
                                                          <tbody  id="tbody">

                                                          </tbody>
                                                      </table>
                                                  </div>
                                             </div>
                                             </div>


                                        <div class="col-md-4">
                                  
                                                <div class="form-group">

                                                      <label class="control-label"><span style="font-size: 8px;">Division</span></label>
                                                      <input name="division" type="text" class="form-control" value="Dhaka" readonly>
                                                </div> 
                                        </div>

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Zone / Thana</label>
                                                <select class=" cluster form-control" name="cluster">
                                                   <option>--select--</option>
                                                               <?php $__currentLoopData = $cluster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                                              <option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Zone / Thana</label>
                                                <select class=" form-control cluster-thana" name="cluster">
                                                   <option>--select--</option>
                                                            
                                                </select>
                                        </div>
                                    </div>
                                    
                                    
                                         
                                        
                                    <!--This is Start of the Table of the Facilities -->
                                    <div class="col-sm-12">
                                              <table class="table table-striped">
                                                  <thead>
                                                      <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Service Days</th>
                                                        <th scope="col">Start Time</th>
                                                        <th scope="col">End Time</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <tr>
                                                          <td scope="row">
                                                              <div class="checkbox">
                                                                  <label style="margin-top: 10px;">
                                                                      <input type="checkbox" value="Friday" name="days[]">
                                                                  </label>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top:20px;">
                                                                  <h5>Friday</h5>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                 <select class="form-control" name="start_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                 <select class="form-control" name="end_time[]">
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                      <option>
                                                                          9PM
                                                                      </option>
                                                                      <option>
                                                                          10PM
                                                                      </option>
                                                                      <option>
                                                                          11PM
                                                                      </option>
                                                                      <option>
                                                                          12PM
                                                                      </option>
                                                                      <option>
                                                                          1AM
                                                                      </option>
                                                                      <option>
                                                                          2AM
                                                                      </option>
                                                                      <option>
                                                                          3AM
                                                                      </option>
                                                                      <option>
                                                                          4AM
                                                                      </option>
                                                                      <option>
                                                                          5AM
                                                                      </option>
                                                                      <option>
                                                                          6AM
                                                                      </option>
                                                                      <option>
                                                                          7AM
                                                                      </option>
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                 </select>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">
                                                              <div class="checkbox">
                                                                  <label style="margin-top: 10px;">
                                                                      <input type="checkbox" value="Saturday" name="days[]">
                                                                  </label>
                                                              </div>
                                                          </th>
                                                          <td>
                                                              <div class="form-group" style="margin-top:20px;">
                                                                  <h5>Saturday</h5>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                  <select class="form-control" name="start_time[]">
                                                                          <option>
                                                                              8AM
                                                                          </option>
                                                                          <option>
                                                                              9AM
                                                                          </option>
                                                                          <option>
                                                                              10AM
                                                                          </option>
                                                                          <option>
                                                                              11AM
                                                                          </option>
                                                                          <option>
                                                                              12AM
                                                                          </option>
                                                                          <option>
                                                                              1PM
                                                                          </option>
                                                                          <option>
                                                                              2PM
                                                                          </option>
                                                                          <option>
                                                                              3PM
                                                                          </option>
                                                                          <option>
                                                                              4PM
                                                                          </option>
                                                                          <option>
                                                                              5PM
                                                                          </option>
                                                                          <option>
                                                                              6PM
                                                                          </option>
                                                                          <option>
                                                                              7PM
                                                                          </option>
                                                                          <option>
                                                                              8PM
                                                                          </option>
                                                                     </select>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                  <select class="form-control" name="end_time[]">
                                                                          <option>
                                                                              8AM
                                                                          </option>
                                                                          <option>
                                                                              9AM
                                                                          </option>
                                                                          <option>
                                                                              10AM
                                                                          </option>
                                                                          <option>
                                                                              11AM
                                                                          </option>
                                                                          <option>
                                                                              12AM
                                                                          </option>
                                                                          <option>
                                                                              1PM
                                                                          </option>
                                                                          <option>
                                                                              2PM
                                                                          </option>
                                                                          <option>
                                                                              3PM
                                                                          </option>
                                                                          <option>
                                                                              4PM
                                                                          </option>
                                                                          <option>
                                                                              5PM
                                                                          </option>
                                                                          <option>
                                                                              6PM
                                                                          </option>
                                                                          <option>
                                                                              7PM
                                                                          </option>
                                                                          <option>
                                                                              8PM
                                                                          </option>
                                                                  </select>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                          <div class="checkbox">
                                                              <label style="margin-top: 10px;">
                                                                  <input type="checkbox" value="Sunday" name="days[]">
                                                              </label>
                                                          </div>
                                                          </th>
                                                        <td><div class="form-group" style="margin-top:20px;">
                                                          <h5>Sunday</h5>
                                                        </div></td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="start_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="end_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                          <div class="checkbox">
                                                              <label style="margin-top: 10px;">
                                                                  <input type="checkbox" value="Monday" name="days[]">
                                                              </label>
                                                          </div>
                                                          </th>
                                                        <td><div class="form-group" style="margin-top:20px;">
                                                          <h5>Monday</h5>
                                                        </div></td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="start_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="end_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                          <div class="checkbox">
                                                              <label style="margin-top: 10px;">
                                                                  <input type="checkbox" value="Tuesday" name="days[]">
                                                              </label>
                                                          </div>
                                                          </th>
                                                        <td><div class="form-group" style="margin-top:20px;">
                                                          <h5>Tuesday</h5>
                                                        </div></td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="start_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="end_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">
                                                          <div class="checkbox">
                                                              <label style="margin-top: 10px;">
                                                                  <input type="checkbox" value="Wednesday" name="days[]">
                                                              </label>
                                                          </div>
                                                          </th>
                                                        <td><div class="form-group" style="margin-top:20px;">
                                                          <h5>Wednesday</h5>
                                                        </div></td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="start_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                        <td>
                                                          <div class="form-group" style="margin-top: 15px;">
                                                              <select class="form-control" name="end_time[]">
                                                                      <option>
                                                                          8AM
                                                                      </option>
                                                                      <option>
                                                                          9AM
                                                                      </option>
                                                                      <option>
                                                                          10AM
                                                                      </option>
                                                                      <option>
                                                                          11AM
                                                                      </option>
                                                                      <option>
                                                                          12AM
                                                                      </option>
                                                                      <option>
                                                                          1PM
                                                                      </option>
                                                                      <option>
                                                                          2PM
                                                                      </option>
                                                                      <option>
                                                                          3PM
                                                                      </option>
                                                                      <option>
                                                                          4PM
                                                                      </option>
                                                                      <option>
                                                                          5PM
                                                                      </option>
                                                                      <option>
                                                                          6PM
                                                                      </option>
                                                                      <option>
                                                                          7PM
                                                                      </option>
                                                                      <option>
                                                                          8PM
                                                                      </option>
                                                                 </select>
                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                          <th scope="row">
                                                              <div class="checkbox">
                                                                  <label style="margin-top: 10px;">
                                                                      <input type="checkbox" value="Thursday" name="days[]">
                                                                  </label>
                                                              </div>
                                                          </th>
                                                          <td>
                                                              <div class="form-group" style="margin-top:20px;">
                                                                  <h5>Thursday</h5>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                  <select class="form-control" name="start_time[]">
                                                                          <option>
                                                                              8AM
                                                                          </option>
                                                                          <option>
                                                                              9AM
                                                                          </option>
                                                                          <option>
                                                                              10AM
                                                                          </option>
                                                                          <option>
                                                                              11AM
                                                                          </option>
                                                                          <option>
                                                                              12AM
                                                                          </option>
                                                                          <option>
                                                                              1PM
                                                                          </option>
                                                                          <option>
                                                                              2PM
                                                                          </option>
                                                                          <option>
                                                                              3PM
                                                                          </option>
                                                                          <option>
                                                                              4PM
                                                                          </option>
                                                                          <option>
                                                                              5PM
                                                                          </option>
                                                                          <option>
                                                                              6PM
                                                                          </option>
                                                                          <option>
                                                                              7PM
                                                                          </option>
                                                                          <option>
                                                                              8PM
                                                                          </option>
                                                                     </select>
                                                              </div>
                                                          </td>
                                                          <td>
                                                              <div class="form-group" style="margin-top: 15px;">
                                                                  <select class="form-control" name="end_time[]">
                                                                          <option>
                                                                              8AM
                                                                          </option>
                                                                          <option>
                                                                              9AM
                                                                          </option>
                                                                          <option>
                                                                              10AM
                                                                          </option>
                                                                          <option>
                                                                              11AM
                                                                          </option>
                                                                          <option>
                                                                              12AM
                                                                          </option>
                                                                          <option>
                                                                              1PM
                                                                          </option>
                                                                          <option>
                                                                              2PM
                                                                          </option>
                                                                          <option>
                                                                              3PM
                                                                          </option>
                                                                          <option>
                                                                              4PM
                                                                          </option>
                                                                          <option>
                                                                              5PM
                                                                          </option>
                                                                          <option>
                                                                              6PM
                                                                          </option>
                                                                          <option>
                                                                              7PM
                                                                          </option>
                                                                          <option>
                                                                              8PM
                                                                          </option>
                                                                     </select>
                                                              </div>
                                                          </td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                          </div>
                                    
                </div>
                </div>

                <div id="step-4" class="">
                    <h3 class="border-bottom border-gray pb-2">Step 4 Content</h3>
                        <div class="col-md-12">
                            <label for="MFS">MFS Account Number</label>
                            <input type="number" name="" id="MFS" class="form-control">
                        </div>
                </div>


                <div id="step-5">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Name">Your Name</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Your Name">
                            </div>

                            <div class="form-group">
                                <label for="Name">Atternate Phone</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Atternate Phone">
                            </div>

                            <div class="form-group">
                                <label for="Name">NID (Front)</label>
                                <input type="file" name="" id="Name" class="form-control" placeholder="NID (Front)">
                            </div>
                                            
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Name">Phone</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="Phone">
                            </div>

                            <div class="form-group">
                                <label for="Name">1 copy of photograph of each</label>
                                <input type="text" name="" id="Name" class="form-control" placeholder="1 copy of photograph of each">
                            </div>

                            <div class="form-group">
                                <label for="Name">NID (back)</label>
                                <input type="file" name="" id="Name" class="form-control" placeholder="NID (back)">
                            </div>

                        </div>

                            <div class="col-md-4">
                                <label for="Email">Email</label>
                                <input type="email" name="" placeholder="Email" class="form-control">
                            </div>

                            <div class="col-md-4">
                                <label for="password">password</label>
                                <input type="password" name="" id="password" class="form-control" placeholder="password">
                            </div>

                            <div class="col-md-4">
                                <label for="confirm">confirm password</label>
                                <input type="password" name="" class="form-control" placeholder="confirm password">
                            </div>


                    </div><!--This is Close of the Row Div -->
                </div>



                <div id="step-6">
                    <div class="row">
                        <h5 class="info-text" style="margin-left: 1%;"> LOGIN INFORMATION </h5>
                                            
                        <div class="form-group col-md-10">
                            <label for="Email">Email</label>
                            <input type="email" name="" class="form-control" id="Email">
                        </div>

                        <div class="form-group col-md-10">
                            <label for="Email">Password</label>
                            <input type="password" name="" class="form-control" id="Email">
                        </div>

                        <div class="form-group col-md-10">
                            <label for="Email">Confirm Password</label>
                            <input type="password" name="" class="form-control" id="Email">
                        </div>

                    </div>
                </div>



</form>
        </div>
</div>
    </div>
 <br>
    <!-- Include jQuery -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Include SmartWizard JavaScript source -->
    <script type="text/javascript" src="<?php echo e(url('Flexible-Bootstrap-form/dist/js/jquery.smartWizard.min.js')); ?>"></script>

       <script src="<?php echo e(url('jquery.loading.block.js')); ?>"></script>

<script type="text/javascript">
   $(function(){
       $('.cluster').on('change',function(){
            var Id=$(this).val();
            var url="SpfCluster-Response/"+Id;
            $.ajax({
                url:url,
                type:'get',
                dataType:'html',
                  beforeSend: function() {
                    $.loadingBlockShow();
                  },
                success:function(response){
                     $('.cluster-thana').html(response);
                                $.loadingBlockHide();
                }
            });
            
            return false;
       });
   });
</script>



    <script type="text/javascript">
        $(document).ready(function(){

            // Step show event
            $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
               //alert("You are on step "+stepNumber+" now");
               if(stepPosition === 'first'){
                   $("#prev-btn").addClass('disabled');
               }else if(stepPosition === 'final'){
                   $("#next-btn").addClass('disabled');
               }else{
                   $("#prev-btn").removeClass('disabled');
                   $("#next-btn").removeClass('disabled');
               }
            });

            // Toolbar extra buttons
            var btnFinish = $('<button></button>').text('Finish')
                                             .addClass('btn btn-info')
                                             .on('click', function(){ alert('Finish Clicked'); });
            var btnCancel = $('<button></button>').text('Cancel')
                                             .addClass('btn btn-danger')
                                             .on('click', function(){ $('#smartwizard').smartWizard("reset"); });


            // Smart Wizard
            $('#smartwizard').smartWizard({
                    selected: 0,
                    theme: 'arrows',
                    transitionEffect:'fade',
                    showStepURLhash: true,
                    toolbarSettings: {toolbarPosition: 'both',
                                      toolbarButtonPosition: 'end',
                                      toolbarExtraButtons: [btnFinish, btnCancel]
                                    }
            });


            // External Button Events
            $("#reset-btn").on("click", function() {
                // Reset wizard
                $('#smartwizard').smartWizard("reset");
                return true;
            });

            $("#prev-btn").on("click", function() {
                // Navigate previous
                $('#smartwizard').smartWizard("prev");
                return true;
            });

            $("#next-btn").on("click", function() {
                // Navigate next
                $('#smartwizard').smartWizard("next");
                return true;
            });

            $("#theme_selector").on("change", function() {
                // Change theme
                $('#smartwizard').smartWizard("theme", arrows);
                return true;
            });

            // Set selected theme on page refresh
            $("#theme_selector").change();
        });
    </script>




            
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>