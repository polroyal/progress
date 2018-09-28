<div class="col-md-12 col-sm-12 col-xs-12">


                        <?php
                      insert_user();
                      $pj = "";
                      $fullname = "";
                      $username = "";
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
                              $username = $row['username'];
                              $designation = $row['designation'];
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
                    <h2>Add user <small>This would be for admins</small></h2>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fullname <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="fullname" required="required" name="fullname" class="form-control col-md-7 col-xs-12" value="<?php echo $fullname; ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="designation" name="designation" required="required" class="form-control col-md-7 col-xs-12" values="<?php echo $designation; ?> ">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Username</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="username" class="form-control col-md-7 col-xs-12" type="text" name="username" placeholder="Please write your prefered username" value="<?php echo $username; ?> ">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="email" class="form-control has-feedback-left form-control col-md-7 col-xs-12" required="required" type="text" name="email" placeholder="Email" 
                          value="<?php echo $email; ?>">
                          <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>

                        </div>
                      </div>



                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Pj <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="edit_pj" class="date-picker form-control col-md-7 col-xs-12" required="required" type="hidden" name"edit_pj" 
                          value="<?php echo isset($_GET['e']) ? $_GET['e'] : ''; ?>">
                          <input id="pj" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name"pj" value="<?php echo $pj; ?>" >
                        </div>
                      </div>





                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> Station <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="station" id="" class="form-control" required="required">
                                <option value="">--Select Station--</option>
                                <?php
                                $query = "SELECT * FROM stations";
                                $results = pg_query($conn, $query);
                                while ($row = pg_fetch_array($results)) {
                                    echo "<option value='$row[station_code]' " . (strtolower($row['station_code']) == strtolower($station) ? 'selected="selected"' : '') . ">$row[station_name]
                                    </option>";
                                }
                                ?>
                            </select>
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <!-- <button class="btn btn-primary" type="button">Cancel</button> -->
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="submit">Save user</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>