<div class="col-md-12 col-sm-12 col-xs-12">


                        <?php
                      insert_activity();
                      $pj = "";
                      $fullname = "";
                      $designation = "";
                      $email = "";
                      // $user_group = "";
                      // $date_of_birth = "";
                      // $division = "";
                      $station = "";
                      // $date_transfered = "";
                      if (isset($_GET['e'])) {
                          $query = "SELECT * FROM users WHERE pj like '$_GET[e]'";
                          $results = pg_query($conn, $query);
                          if ($row = pg_fetch_array($results)) {
                              $pj = $row['pj'];
                              $fullname = $row['fullname'];
                              $designation = $row['Designation'];
                              $email = $row['email'];
                              // $user_group = $row['user_group'];
                              // $date_of_birth = $row['DateOfBirth'];
                              // $division = $row['Division'];
                              $station = $row['Station'];
                              // $date_transfered = $row['DateTransfered'];
                          }
                      }

                      ?>


                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update activities <small>Please update all your activities with the form below</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Policy Direction/Strategy <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <select class="select2_group form-control">
                            <option value="">-- Select policy direction --</option>
                            <optgroup label="Alaskan/Hawaiian Time Zone">
                              <option value="AK">Alaska</option>
                              <option value="HI">Hawaii</option>
                            </optgroup>
                            <optgroup label="Pacific Time Zone">
                              <option value="CA">California</option>
                              <option value="NV">Nevada</option>
                         
                            </optgroup>
                            <optgroup label="Mountain Time Zone">
                              <option value="AZ">Arizona</option>
                              <option value="CO">Colorado</option>
                      
                            </optgroup>
                            <optgroup label="Central Time Zone">
                              <option value="AL">Alabama</option>
                              <option value="AR">Arkansas</option>
                              <option value="IL">Illinois</option>
              
                            </optgroup>
                            <optgroup label="Eastern Time Zone">
                              <option value="CT">Connecticut</option>
                              <option value="DE">Delaware</option>
                   
                            </optgroup>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Activity <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="1" placeholder='Please Detail the actual activity here'></textarea> 
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Performance Measure/Indicator</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="1" placeholder='Performance Measure'></textarea>
                        </div>
                      </div>


                     <!--  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="female"> Female
                            </label>
                          </div>
                        </div>
                      </div> -->

                <!--       <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" id="inputSuccess4" placeholder="Email">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                      </div> -->

                      <div class="form-group has feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Baseline <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>



                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Target <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>





                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <textarea class="form-control" rows="1" placeholder='Status update/Achievements'></textarea>
                            <!-- <select name="station" id="" class="form-control" required="required">
                                <option value="">--Select Station--</option>
                                <?php
                                $query = "SELECT * FROM stationsv";
                                $results = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($results)) {
                                    echo "<option value='$row[StationCode]' " . (strtolower($row['StationCode']) == strtolower($station) ? 'selected="selected"' : '') . ">$row[StationName]</option>";
                                }
                                ?>
                            </select> -->
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Responsibility <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select class="select2_single form-control" tabindex="-1">
                            <option value="">-- Select responsible person --</option>
                      
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                           
                          </select>
                        </div>
                      </div>



                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Activity Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          <select class="select2_single form-control" tabindex="-1">
                            <option value="">-- Activity Status --</option>
                      
                            <option value="AK">Alaska</option>
                            <option value="HI">Hawaii</option>
                            <option value="CA">California</option>
                           
                          </select>
                        </div>
                      </div>


                      

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dates (Start & Completion) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <div id="reportrange_right" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                      </div>
                    </div>





                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">update activity</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>