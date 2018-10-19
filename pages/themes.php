 
<div class="col-md-12 col-sm-12 col-xs-12"
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Update Theme <small>Please update theme, start & completion dates</small></h2>
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

                    <?php insert_theme(); ?>

                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Policy Direction <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_group form-control">
                            <option value="">-- Select Strategy --</option>
                          <?php
                            $query = "SELECT * FROM strategy";
                            $results = pg_query($conn, $query);
                            while ($row = pg_fetch_array($results)) {
                                echo "<option value='$row[strategy_id]'>$row[strategy]</option>";
                            }
                            ?>
                          
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Theme <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>


         <!--            <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Start Date</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class='input-group date' id='datetimepicker7'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    </div> -->

          
<!-- 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Champion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div> -->

           
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Dates (Start & Planned Completion) <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input class="form-control has-feedback-left" autocomplete="off" id="dates" aria-describedby="inputSuccess2Status" type="hidden" 
                        name="dates">
                        <div id="reportrange_right" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                          <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                          <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                      </div>
                    </div>



                   <!-- <fieldset> -->
                      <div class="form-group">
                             <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Completion Date </label>
                             <!-- <div class="col-md-3 col-sm-6 col-xs-12"> -->
                               <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control has-feedback-left" id="single_cal2" placeholder="" aria-describedby="inputSuccess2Status2" 
                                name="completion_date">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                              </div>
                            <!-- </div> -->
                        </div>
                   <!--      </fieldset> -->



                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Responsibility</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1">
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



                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success" name="submit">Update Theme</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>