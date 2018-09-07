

<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Add Stations</small>
              <!-- <small>Author</small> -->
        </h1>

        <div class="col-xs-6">
            <?php insert_station(); ?>

            <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" accept-charset="utf-8" id="frmLeaveForm"><div style="display:none">

                </div>

                <div class="form-group">
                    <label for="station_code" class="col-sm-3 control-label">Station Code: </label>
                    <div class="col-sm-9">
                        <input class="form-control" id="pj" name="station_code" type="text" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="station_name" class="col-sm-3 control-label">Station Name:</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="fullname" name="station_name" type="text" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Admin Unit:</label>
                    <div class="col-sm-9">
                        <select name="unit_code" id="" class="form-control">
                            <option value="">Select Admin Unit</option>
                            <?php
                            $query = "SELECT * FROM adminunits";
                            $results = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_array($results)) {
                                echo "<option value='$row[UnitCode]'>$row[AdminUnit]</option>";
                            }
                            ?>
                        </select>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary" name="submit"><i class="icon-ok icon-white"></i>&nbsp; Save Station</button>
                &nbsp;
                <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>


            </form>
        </div>


        <div class="col-xs-6">

            <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">

                <thead>
                    <tr>
                        <th>Station Code</th>
                        <th>Station Name</th>
                        <th>Admin Unit</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * from stationsv";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['StationCode']; ?></td>
                            <td><?php echo $row['StationName']; ?></td>
                            <td><?php echo $row['AdminUnit']; ?></td>
                        </tr>
                        <?php
                    }
                    ?> 

                </tbody>
            </table> 

        </div>
    </div>
