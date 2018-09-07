

<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Add Users</small>
              <!-- <small>Author</small> -->
        </h1>

        <div class="col-xs-12">
            <?php
            insert_user();
            $pj = "";
            $fullname = "";
            $designation = "";
            $email = "";
            $user_group = "";
            $date_of_birth = "";
            $division = "";
            $station = "";
            $date_transfered = "";
            if (isset($_GET['e'])) {
                $query = "SELECT * FROM users WHERE pj like '$_GET[e]'";
                $results = mysqli_query($conn, $query);
                if ($row = mysqli_fetch_array($results)) {
                    $pj = $row['pj'];
                    $fullname = $row['fullname'];
                    $designation = $row['Designation'];
                    $email = $row['email'];
                    $user_group = $row['user_group'];
                    $date_of_birth = $row['DateOfBirth'];
                    $division = $row['Division'];
                    $station = $row['Station'];
                    $date_transfered = $row['DateTransfered'];
                }
            }
            ?>
            <form class="form-horizontal" action="index.php?p=users" method="post" accept-charset="utf-8" id="frmLeaveForm">
                <div style="display:none">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pj" class="col-sm-3 control-label">PJ Number:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="edit_pj" name="edit_pj" type="hidden" value="<?php echo isset($_GET['e']) ? $_GET['e'] : ''; ?>">
                            <input class="form-control" id="pj" name="pj" type="text" value="<?php echo $pj; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fullname" class="col-sm-3 control-label">Fullname:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="fullname" name="fullname" type="text" value="<?php echo $fullname; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="designation" class="col-sm-3 control-label">Designation:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="designation" name="designation" type="text" value="<?php echo $designation; ?>" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-sm-3 control-label">Email:</label>
                        <div class="col-sm-9">
                            <input class="form-control" id="email" name="email" type="text" value="<?php echo $email; ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_of_birth" class="col-sm-3 control-label">Date Of Birth:</label>
                   <div class="container">
  <div class="row">
    Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
  </div>
  <br />
    
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
    
    </div>
</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">User Group:</label>
                        <div class="col-sm-9">
                            <select name="user_group" id="" class="form-control" required="required">
                                <option value="Admin">Judge</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Station:</label>
                        <div class="col-sm-9">
                            <select name="station" id="" class="form-control" required="required">
                                <option value="">Select Station</option>
                                <?php
                                $query = "SELECT * FROM stationsv";
                                $results = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($results)) {
                                    echo "<option value='$row[StationCode]' " . (strtolower($row['StationCode']) == strtolower($station) ? 'selected="selected"' : '') . ">$row[StationName]</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Division:</label>
                        <div class="col-sm-9">
                            <select name="division" id="" class="form-control" required="required">
                                <option value="">Select Division</option>
                                <?php
                                $query = "SELECT * FROM divisions";
                                $results = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($results)) {
                                    echo "<option value='$row[Division]' " . (strtolower($row['Division']) == strtolower($division) ? 'selected="selected"' : '') . ">$row[Division]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    



         	<div class="form-group">
                        <label for="date_of_birth" class="col-sm-3 control-label">Date Of Transfered:</label>
                    <div class="row">
    Date formats: yyyy-mm-dd, yyyymmdd, dd-mm-yyyy, dd/mm/yyyy, ddmmyyyyy
  </div>
  <br />
    
        <div class='col-sm-3'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
    
    </div>
                    </div>
        	    


                    <div class="form-group">
                        <div class="col-md-offset-4" >
                            <button type="submit" class="btn btn-primary" name="submit"><i class="icon-ok icon-white"></i>&nbsp; Save User</button>
                            &nbsp;
                            <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>
                        </div> 
                    </div>
                </div>

            </form>
        </div>
    </div>

    <div class="col-lg-12">

    <table id="datatable-fixed-header" class="table table-striped table-bordered">

            <thead>
                <tr>
                    <!--<th>PJ</th> -->
                    <th>Fullname</th>
                    <!--<th>Email</th> -->
                    <th>Designation</th>
                    <th>Station</th>
                    <th>Eligibility</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * from usersv";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <!--<td><?php echo $row['pj']; ?></td>-->
                        <td><?php echo $row['fullname']; ?></td>
                        <!--<td><?php echo $row['email']; ?></td>-->
                        <td><?php echo $row['Designation']; ?></td>
                        <td><?php echo $row['StationTo']; ?></td>
                        <td><?php echo $row['Eligibility']; ?></td>
                        <td><?php if (strtolower($_SESSION['leave_group']) == "admin") { ?>
                                <form name="transfer" method="post" action="index.php?p=transfers">
                                    <input type="hidden" value="<?php echo $row['pj']; ?>" name="pj" />
                                    <input type="submit" value="Transfer" name="submit" class="btn btn-info btn-xs" />
                                </form><?php } else { ?> &nbsp; <?php } ?>  <a href="index.php?p=users&e=<?php echo $row['pj']; ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a></td>
                    </tr>
                    <?php
                }
                ?> 
            </tbody>
        </table> 

    </div>

