
<?php
        $division = "";
		$designation = "";
        $remarks = "";
		
		if (isset($_POST['delete'])){
			$delete_tid = $_POST['delete_tid'];
			$query = "SELECT * FROM transfers WHERE TransferID like '$delete_tid'";
			$results = mysqli_query($conn, $query);
			if ($row = mysqli_fetch_array($results)){
				$delete_pj = $row['PJ'];
				$query = "DROP TABLE IF EXISTS transferstemp";
				mysqli_query($conn, $query);
				$query = "CREATE TABLE transferstemp as SELECT * FROM transfers";
				mysqli_query($conn, $query);
				$query = "DELETE FROM transferstemp WHERE TransferID like '$delete_tid'";
				mysqli_query($conn, $query);
				$query = "UPDATE transferstemp SET DateOut = NULL WHERE PJ like '$delete_pj'";
				mysqli_query($conn, $query);
				$query = "SELECT * FROM transferstemp WHERE PJ like '$delete_pj'";
				//echo $query;
				$results = mysqli_query($conn, $query);
				$transfer_from = "";
				$from_division = "";
				$transfer_id = "";
				while ($row = mysqli_fetch_array($results)){
					if ($transfer_from == ""){
						//echo "EMPTY<br/>";
					} else {
						$query = "UPDATE transferstemp SET TransferFrom = '$transfer_from', FromDivision = '$from_division' WHERE TransferID like '$row[TransferID]'";
						//echo $query . "<br/>";
						mysqli_query($conn, $query);
						$query = "UPDATE transferstemp SET DateOut = '$row[DateIn]' WHERE TransferID like '$transfer_id'";
						//echo $query . "<br/>";
						mysqli_query($conn, $query);
						$query = "DELETE FROM transferstemp WHERE pj like '$delete_pj' AND TransferFrom = TransferTo AND FromDivision = ToDivision";
						mysqli_query($conn, $query);
					}
					if ($row['TransferTo'] == $transfer_from && $row['ToDivision'] == $from_division){
					} else {
						$transfer_id = $row['TransferID'];
					}
					$transfer_from = $row['TransferTo'];
					$from_division = $row['ToDivision'];
					//echo $transfer_from;
				}
				$query = "TRUNCATE transfers";
				mysqli_query($conn, $query);
				$query = "REPLACE INTO transfers SELECT * FROM transferstemp";
				mysqli_query($conn, $query);
			}
		}
		
		
if (isset($_POST['pj'])) {
    if (isset($_POST['submit_transfer'])){
        $transfer_from_id = $_POST['transfer_from_id'];
        $pj = $_POST['pj'];
        $date_transfered = $_POST['date_transfered'];
        $station = $_POST['station'];
        $division = $_POST['division'];
	$designation = $_POST['designation'];
        $remarks = $_POST['remarks'];
        $transfer_from_station = $_POST['transfer_from_station'];
        $transfer_from_division = $_POST['transfer_from_division'];
        $query = "UPDATE transfers SET TransferTo = '$station', ToDivision = '$division', designation = $designation, DateOut = '$date_transfered', "
                . "Remarks = '$remarks' WHERE TransferID like '$transfer_from_id'";
//        echo $query;
        mysqli_query($conn, $query);
        $query = "INSERT INTO transfers (PJ, DateIn, TransferFrom, FromDivision, TransferTo, ToDivision, designation) "
                . "VALUES ('$pj', '$date_transfered', '$transfer_from_station', '$transfer_from_division', "
                . "'$station', '$division', '$designation')";
        mysqli_query($conn, $query);
    }
    $query = "SELECT * FROM usersv WHERE pj like '$_POST[pj]'";
    $users = mysqli_query($conn, $query);
    if ($user = mysqli_fetch_array($users)) {
        ?>
        <!-- Page Heading -->

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">
                    <small>Add Users</small>
                      <!-- <small>Author</small> -->
                </h1>

                <div class="col-xs-6">
                    <?php // insert_user(); ?>

                    <form class="form-horizontal" action="index.php?p=transfers" method="post" accept-charset="utf-8" id="frmLeaveForm">
                        <div style="display:none">

                        </div>
                        <div class="form-group">
                            <label for="pj" class="col-sm-3 control-label">PJ Number:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="pj" name="pj" type="hidden" value="<?php echo $user['pj']; ?>" required>
                                <input class="form-control" id="pj" name="transfer_from_id" type="hidden" value="<?php echo $user['TransferID']; ?>" required>
                                <input class="form-control" id="pj" name="transfer_from_station" type="hidden" value="<?php echo $user['TransferTo']; ?>" required>
                                <input class="form-control" id="pj" name="transfer_from_division" type="hidden" value="<?php echo $user['ToDivision']; ?>" required>
                                <input class="form-control" id="pj" name="pj1" type="text" disabled="true" value="<?php echo $user['pj']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fullname" class="col-sm-3 control-label">Fullname:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="fullname" name="fullname" type="text" disabled="true" value="<?php echo $user['fullname']; ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="designation" class="col-sm-3 control-label">Designation:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="designation" name="designation" type="text" disabled="true" value="<?php echo $user['Designation']; ?>" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="email" name="email" type="text" value="<?php echo $user['email']; ?>" disabled="true" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth" class="col-sm-3 control-label">Current Station:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="date_of_birth" name="current_station" type="text" disabled="true" value="<?php echo $user['StationTo']; ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date_of_birth" class="col-sm-3 control-label">Period:</label>
                            <div class="col-sm-9">
                                <input class="form-control" id="date_of_birth" name="current_station" type="text" disabled="true" value="<?php echo $user['Period']; ?>" required>
                            </div>
                        </div>
                        <?php
                        if ($user['PeriodMonths'] < 0) {
                            ?>
                            <div class="alert alert-warning">
                                <p>The selected user is not eligible for transfer.</p>
                            </div>
                        <?php } else {
                            ?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Station:</label>
                                <div class="col-sm-9">
                                    <select name="station" id="" class="form-control">
                                        <option value="">Select Station</option>
                                        <?php
                                        $query = "SELECT * FROM stationsv";
                                        $results = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($results)) {
                                            echo "<option value='$row[StationCode]'>$row[StationName]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Division:</label>
                                <div class="col-sm-9">
                                    <select name="division" id="" class="form-control">
                                        <option value="">Select Division</option>
                                        <?php
                                        $query = "SELECT * FROM divisions";
                                        $results = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_array($results)) {
                                            echo "<option value='$row[Division]'>$row[Division]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                            </div>


			<div class="form-group">
                        <label for="designation" class="col-sm-3 control-label">Designation:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="designation" name="designation" type="text" value="<?php echo $designation; ?>" required>
                        </div>
                    </div>

	
                            <div class="form-group">
                                <label for="date_transfered" class="col-sm-3 control-label">Date Transfered:</label>
                                <div class="col-sm-9">
                                    <div class="col-md-11 xdisplay_inputx form-group has-feedback">
<input id="single_cal1" class="form-control has-feedback-left" placeholder="First Name" aria-describedby="inputSuccess2Status" type="text" name="date_transfered">
<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
<span id="inputSuccess2Status" class="sr-only">(success)</span>
</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="remarks" class="col-sm-3 control-label">Remarks:</label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="date_of_birth" name="remarks" type="text" value="" required>
                                </div>
                            </div>
                            <div class="form-group" align="center">
                                <button type="submit" class="btn btn-primary" name="submit_transfer"><i class="icon icon-ok icon-white"></i>&nbsp; Transfer</button>
                                &nbsp;
                                <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>
                            </div>
                        <?php } ?>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4>Previous Transfers</h4>
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>Date In</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Date out</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $query = "SELECT * from transfersv WHERE PJ like '$user[pj]' ORDER BY DateIn ";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['DateIn']; ?></td>
                                    <td><?php echo $row['StationFrom']; ?></td>
                                    <td><?php echo $row['StationTo']; ?></td>
                                    <td><?php echo $row['DateOut']; ?>
									<?php
									if (strtolower($_SESSION['leave_group']) == "admin"){ ?>
									<form name="delete" method="post" action="index.php?p=transfers">
										<input type="hidden" value="<?php echo $row['TransferID']; ?>" name="delete_tid"/>
										<input type="hidden" value="<?php echo $row['PJ']; ?>" name="pj"/>
										<input type="submit" name="delete" value="delete" class="btn btn-xs btn-danger"/>
									</form> <?php } ?></td>
                                </tr>
                                <?php
                            }
                            ?> 
                        </tbody>
                    </table> 

                </div>

            </div>
            <?php
        }
    } else {
        ?>
        <script type="text/javascript">
            top.location = 'index.php?p=users';
        </script>
        <?php
    }
    ?>
