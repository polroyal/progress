 
<div class="col-md-12 col-sm-12 col-xs-12"
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Station <small>Please add your station</small></h2>
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

                    <?php insert_station(); ?>

                    <br />
                    <form id="frmLeaveForm" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" accept-charset="utf-8">

                      <div class="form-group">
                        <label for="station_code" class="control-label col-md-3 col-sm-3 col-xs-12">Station Code: <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input id="pj" class="form-control col-md-7 col-xs-12" type="text" name="station_code">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Station Name: <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="station_name" class="form-control col-md-7 col-xs-12" type="text" name="station_name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Admin Unit <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="unit_code" id="" class="form-control">
                            <option value=""> -- Select Admin Unit -- </option>
                            <?php
                            $query = "SELECT * FROM adminunits";
                            $results = pg_query($conn, $query);
                            while ($row = pg_fetch_array($results)) {
                                echo "<option value='$row[UnitCode]'>$row[AdminUnit]</option>";
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
                          <button type="submit" class="btn btn-success">Save Station</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>