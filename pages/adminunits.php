

<!-- Page Heading -->

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">
            <small>Add Implementing Unit</small>
              <!-- <small>Author</small> -->
        </h1>

        <div class="col-xs-6">
            <?php insert_adminunit(); ?>

            <form class="form-horizontal" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" accept-charset="utf-8" id="frmLeaveForm"><div style="display:none">

                </div>

                <div class="form-group">
                    <label for="unit_code" class="col-sm-3 control-label">Unit Code: </label>
                    <div class="col-sm-9">
                        <input class="form-control" id="pj" name="unit_code" type="text" value="" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="admin_units" class="col-sm-3 control-label">Implementing Unit:</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="fullname" name="admin_unit" type="text" value="" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="submit"><i class="icon-ok icon-white"></i>&nbsp; Save Admin Unit</button>
                &nbsp;
                <a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>


            </form>
        </div>


        <div class="col-xs-6">

            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>Unit Code</th>
                        <th>Implementing Unit</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * from adminunits";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row['UnitCode']; ?></td>
                            <td><?php echo $row['AdminUnit']; ?></td>
                        </tr>
                        <?php
                    }
                    ?> 

                </tbody>
            </table> 

        </div>
    </div>
