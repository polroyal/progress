 
<div class="col-md-12 col-sm-12 col-xs-12"
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Policy Direction <small>Please update policy direction, start & completion dates</small></h2>
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

                    <?php insert_strategy(); ?>

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

                      
                    <div class="form-group has feedback">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Policy Direction/Strategy <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="" name="strategy" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="1" placeholder='strategy details' name="description"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Performance Measure</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" rows="1" placeholder='Performance Measure' name="performance_measure"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Supervising Unit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" name="supervising_unit">
                            <option value="">-- Select responsible person --</option>
                      
                            <?php
                            $query = "SELECT * FROM users";
                            $results = pg_query($conn, $query);
                            while ($row = pg_fetch_array($results)) {
                                echo "<option value='$row[username]'>$row[fullname]</option>";
                            }
                            ?>

                          </select>
                        </div>
                      </div>











          
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dates (Start & Planned Completion) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <input class="form-control has-feedback-left" type="text" name="datefilter" id="datefilter" value="" />
                                            </td>
                                        </tr><tr>
                                            <td>
                                                <input class="form-control has-feedback-left" autocomplete="off" id="start_date" aria-describedby="inputSuccess2Status" type="hidden" name="start_date">
                                                <span class="sr-only" id="inputSuccess2Status">(success)</span>
                                            </td>
                                            <td>
                                                <input class="form-control has-feedback-left" autocomplete="off" id="end_date" aria-describedby="inputSuccess2Status4" type="hidden" name="end_date" >
                                                <span class="sr-only" id="inputSuccess2Status4">(success)</span></td>
                                        </tr>
                                  
                                    </tbody>
                                </table>
                      </div>
                    </div>
                      <!--div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dates (Start & Planned Completion) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control has-feedback-left" autocomplete="off" id="dates" aria-describedby="inputSuccess2Status" type="text" 
                        name="dates">
                        <div id="reportrange_right" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                      </div>
                    </div-->

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Completion Date <span class="required">*</span></label>
                          <!-- <div class="col-md-6 col-sm-6 col-xs-12"> -->
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="single_cal4" name="completion_date" aria-describedby="inputSuccess2Status4">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                              </div>
                          <!--   </div> -->
                          <!-- </div> -->
                    </div> 

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="submit">Update Strategy</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>