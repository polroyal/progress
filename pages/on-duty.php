

<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Add event</small>
              <!-- <small>Author</small> -->
        </h1>

        <div class="col-xs-12">
            <?php
            insert_event();
            $fullname = "";
            $event = "";
            $location = "";
            $start_date = "";
            $end_date = "";
            // $date_of_birth = "";
            // $division = "";
            // $station = "";
            // $date_transfered = "";
            if (isset($_GET['a'])) {
                $query = "SELECT * FROM events WHERE fullname like '$_GET[a]'";
                $results = mysqli_query($conn, $query);
                if ($row = mysqli_fetch_array($results)) {
                    $fullname = $row['fullname'];
                    $event = $row['event'];
                    $location = $row['location'];
                    $start_date = $row['start_date'];
                    $end_date = $row['end_date'];
                    // $date_of_birth = $row['DateOfBirth'];
                    // $division = $row['Division'];
                    // $station = $row['Station'];
                    // $date_transfered = $row['DateTransfered'];
                }
            }
            ?>
            <form class="form-horizontal" action="index.php?p=on-duty" method="post" accept-charset="utf-8" id="frmLeaveForm">
                <div style="display:none">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fullname" class="col-sm-3 control-label">Fullname:</label>
                        <div class="col-sm-9">
                            <!-- <input class="form-control" id="edit_pj" name="edit_pj" type="hidden" value="<?php echo isset($_GET['e']) ? $_GET['e'] : ''; ?>"> -->
						<input class="form-control" id="fullname" name="fullname" type="hidden" value="<?php echo $_SESSION['leave_fullname']; ?>" required>
                        <input class="form-control" disabled="true" type="text" value="<?php echo $_SESSION['leave_fullname']; ?>" required>
                        </div>
                    </div>

                      <div class="form-group">
                        <label class="col-sm-3 control-label">Event:</label>
                        <div class="col-sm-9">
                            <select name="event" id="" class="form-control" required="required">
			        <option value="event"></option> 
                                <option value="Service Week">Service Week</option>
                                <option value="Training">Training</option>
                                <option value="Bench">Bench</option>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="location" class="col-sm-3 control-label">Location:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="location" name="location" type="text" value="<?php echo $location; ?>" required>
                        </div>
                    </div>
		    </div>

                    
	          <div class="col-md-6">
		  <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Start Date:</label>
                        <div class="col-sm-9">
                             <div class="col-md-11 xdisplay_inputx form-group has-feedback">

                            <input class="form-control has-feedback-left"  name="start_date" id="single_cal1" placeholder="Start Date" aria-describedby="inputSuccess2Status2"type="text">

                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                           <span id="inputSuccess2Status2" class="sr-only">(success)</span>
                         </div
                        </div>
                    </div>	        



	
	        <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">End Date:</label>
                        <div class="col-sm-9">
                           <div class="col-md-11 xdisplay_inputx form-group has-feedback">
<input id="single_cal4" name="end_date" class="form-control has-feedback-left" placeholder="End Date" aria-describedby="inputSuccess2Status3" type="text">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
<span id="inputSuccess2Status3" class="sr-only">(success)</span>
</div>
                        </div>
                    </div>	        


		</div>                    
                
                <div class="col-md-6">
                   <!--  <div class="form-group">
                        <label class="col-sm-3 control-label">User Group:</label>
                        <div class="col-sm-9">
                            <select name="user_group" id="" class="form-control" required="required">
                                <option value="Admin">Admin</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>

                    </div> -->
             <!--        <div class="form-group">
                        <label class="col-sm-3 control-label">Station:</label>
                        <div class="col-sm-9">
                            <select name="station" id="" class="form-control" required="required">
                                <option value="">Select Station</option>
                                <?php
                                // $query = "SELECT * FROM stationsv";
                                // $results = mysqli_query($conn, $query);
                                // while ($row = mysqli_fetch_array($results)) {
                                //     echo "<option value='$row[StationCode]' " . (strtolower($row['StationCode']) == strtolower($station) ? 'selected="selected"' : '') . ">$row[StationName]</option>";
                                // }
                                ?>
                            </select>
                        </div>

                    </div> -->
               <!--      <div class="form-group">
                        <label class="col-sm-3 control-label">Division:</label>
                        <div class="col-sm-9">
                            <select name="division" id="" class="form-control" required="required">
                                <option value="">Select Division</option>
                                <?php
                                // $query = "SELECT * FROM divisions";
                                // $results = mysqli_query($conn, $query);
                                // while ($row = mysqli_fetch_array($results)) {
                                //     echo "<option value='$row[Division]' " . (strtolower($row['Division']) == strtolower($division) ? 'selected="selected"' : '') . ">$row[Division]</option>";
                                // }
                                ?>
                            </select>
                        </div>
                    </div> -->
                 <!--    <div class="form-group">
                        <label for="date_transfered" class="col-sm-3 control-label">Date Transfered:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="date_transfered" name="date_transfered" type="text" value="<?php echo $date_transfered; ?>" required>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <div class="col-md-offset-7" >
                            <button type="submit" class="btn btn-primary" name="submit"><i class="icon-ok icon-white"></i>&nbsp; Save event</button>
                            &nbsp;
                            <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>
                        </div> 
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="col-lg-12">

   <table id="datatable-buttons" class="table table-striped table-bordered">


            <thead>
                <tr>
		    
                    <th>Fullname</th>
                    <th>Event</th>
                    <th>Location</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <!-- <th>Station</th>
                    <th>Eligibility</th> -->
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * from events";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['fullname']; ?></td>s
                        <td><?php echo $row['event']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['start_date']; ?></td>
                        <td><?php echo $row['end_date']; ?></td>
                        <td><?php if (strtolower($_SESSION['leave_group']) == "admin") { ?>
                       <form name="event" method="post" action="index.php?p=on-duty"> 
                           <input type="hidden" value="<?php echo $row['fullname']; ?>" name="fullname" /> 
                           <input type="submit" value="activity" name="submit" class="btn btn-info btn-xs" />
                      </form><?php } else { ?> &nbsp; <?php } ?>  <a href="index.php?p=on-duty&a=<?php echo $row['fullname']; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a></td> 
                    </tr>
                    <?php
                }
                ?> 
            </tbody>
        </table> 

    </div>

