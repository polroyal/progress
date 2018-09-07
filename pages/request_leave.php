<div id="wrapper">
    <?php
    if (isset($_POST['request_leave'])) {

        $user_id = $_POST['pj'];
        $leave_type = $_POST['leave_type'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        $start_period = $_POST['start_period'];
        $end_period = $_POST['end_period'];
        $replacement = $_POST['replacement'];
        $request_date = date('Y-m-d');
	$description = $_POST['description'];


        $qry = "SELECT * FROM request_v WHERE status NOT like 'Rejected' AND (
            (start_date <= STR_TO_DATE('{$start_date}','%Y-%m-%d') AND 
                end_date >= STR_TO_DATE('{$start_date}','%Y-%m-%d')) OR 
                (start_date <= STR_TO_DATE('{$end_date}','%Y-%m-%d') AND 
                    end_date >= STR_TO_DATE('{$end_date}','%Y-%m-%d'))
                ) AND (user_id like '$_SESSION[leave_pj]' OR replacement_pj like '$_SESSION[leave_pj]'
                OR user_id like '{$replacement}' OR replacement_pj like '{$replacement}')";

	
        $results = mysqli_query($conn, $qry);
        if ($row = mysqli_fetch_assoc($results)){
            echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\">
  		   <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    		   <span aria-hidden=\"true\">&times;</span></button>





	    <strong>Leave for $_SESSION[leave_fullname] between $start_date and $end_date cannot be requested because of the following already existing leave request</strong><br/>";
            echo "<table class='table' id='#datatable-buttons'>
		    <tr><th>User:</th><td>$row[user_id] - $row[fullname]</td></tr>
                    <tr><th>Leave_Type: </th><td>$row[leave_type]</td></tr>
                    <tr><th>start date: </th><td>$row[start_date]</td></tr>
                    <tr><th>end date: </th><td>$row[end_date]</td></tr>
                    <tr><th>replacement_pj: </th><td>$row[replacement_pj] - $row[replacement_fullname]</td></tr>
		 </table><br/></div>";

        } else {

            $query = " INSERT INTO leave_request (user_id, leave_type, start_date, end_date, start_period,
            end_period, request_date, replacement_pj, description) ";

            $query .= " SELECT '{$user_id}' as user_id, '{$leave_type}' as leave_type, STR_TO_DATE('{$start_date}','%Y-%m-%d') as start_date,
             STR_TO_DATE('{$end_date}','%Y-%m-%d') as end_date, '{$start_period}' as start_period, '{$end_period}' as end_period, '{$request_date}' as request_date, '{$replacement}' as replacement, '$description' as description ";

            $request_leave_query = mysqli_query($conn, $query);
            echo "Leave request successfull";
        }

    }
    ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Submit Leave Request
                    </h1>
                    <div class="col-xs-5">
                        <form action="index.php?p=request_leave" method="post" accept-charset="utf-8" id="frmLeaveForm"><div style="display:none">
                            </div>
                            <div class="well">
                                <div class="row">
                                    <div class="form-group">
                                        <label for="inputPassword" class="col-sm-3 control-label">Fullname:</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" id="disabledInput" name="fullname" type="text" value="<?php echo $_SESSION['leave_fullname']; ?>" disabled>
                                            <input class="form-control" id="hide" name="pj" type="hidden" value="<?php echo $_SESSION['leave_pj']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Leave Type:</label>
                                        <div class="col-sm-9">
                                            <select name="leave_type" id="" class="form-control">

                                                <?php
                                                $query = " SELECT * FROM leave_types ";

                                                $select_leave_types = mysqli_query($conn, $query);

                                                confirm($select_leave_types);


                                                while ($row = mysqli_fetch_assoc($select_leave_types)) {

                                                    $leave_type = $row['leave_type'];

                                                    echo "<option value='$row[leave_type]'>{$leave_type}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Replacement:</label>
                                        <div class="col-sm-9">
                                            <select name="replacement" id="" class="form-control">

                                                <?php
                                                $query = " SELECT * FROM users WHERE pj not like '$_SESSION[leave_pj]'";

                                                $select_leave_types = mysqli_query($conn, $query);

                                                confirm($select_leave_types);


                                                while ($row = mysqli_fetch_assoc($select_leave_types)) {

                                                    $pj = $row['pj'];
                                                    $fullname = $row['fullname'];

                                                    echo "<option value='$row[pj]'>{$fullname}</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
									<div class="form-group">
										<label class="col-sm-3 control-label">Description:</label>
										<div class="col-sm-9">
											<input type="text" name="description" id="" class="form-control"/>
										</div>
									</div>
								</div>
                                <table id="" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                Start date
                                            </th>
                                            <th>
                                                End date
                                            </th>
                                        </tr>
                                    </thead>
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
                                        <tr>
                                            <td>
                                                <select name="start_period" id="start_period" class="form-control">
                                                    <option value="Morning" selected>Morning</option>
                                                    <option value="Afternoon">Afternoon</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="end_period" id="end_period" class="form-control">
                                                    <option value="Morning" selected>Morning</option>
                                                    <option value="Afternoon">Afternoon</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-primary" name="request_leave"><i class="icon-ok icon-white"></i>&nbsp; Request leave</button>
                                &nbsp;
                                <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>
                        </form>
                    </div>
                </div>
				<div  class="col-xs-7">
				
					<table id="datatable-fixed-header" class="table table-striped table-bordered">
					   <thead>
						<tr>
							<th>Pj</th>
							<th>Request Date</th>
							<th>Leave Type</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Approved By</th>
						</tr>
					    </thead>
					    <tbody>
						<?php
						$query = "SELECT * FROM request_v WHERE user_id like '$_SESSION[leave_pj]'";
	//echo $query;
						$result = mysqli_query($GLOBALS['conn'], $query);
						while ($row = mysqli_fetch_assoc($result)) {
							?>

						     
							<tr>
								<td><?php echo $row['user_id']; ?></td>
								<td><?php echo $row['request_date']; ?></td>
								<td><?php echo $row['leave_type']; ?></td>
								<td><?php echo $row['start_date']; ?></td>
								<td><?php echo $row['end_date']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['approved_by']; ?></td>
							</tr>
							<?php
						}
						?>
					   </tbody>
					</table>
				</div>
            </div>
        </div>
    </div>
</div>
</div>

