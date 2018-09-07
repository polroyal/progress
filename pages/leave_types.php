
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">
                <small>Leave types</small>
               
            </h1>

            <div class="col-xs-6">

            <?php insert_leave_type(); ?>

        <form action="" method="post" >
            <div class="form-group">
            <label for="leave_type">Add Leave type</label>
                <input class= "form-control" type="text" name="leave_type">
                
            </div>

             <div class="form-group">
              <input class="btn btn-primary" type="submit" name="submit" value="Add Leave type">
                
            </div>
        </form>

       <!--  //Update Form -->

       <?php // Update and include query 

       if(isset($_GET['edit'])){

        $cate_id = $_GET['edit'];

        include "includes/update_leave_type.php";

        }

      ?>

  </div>
    <div class="col-xs-6">

        <table class="table table-bordered table-hover">
        
            <thead>
                <tr>
                    <th>Leave type</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
               <tbody>

    <?php find_all_leave_types(); ?>

    <?php Delete_Leave_type(); //Delete Category?> 

        </tbody>
    </table> 

</div>


    </div>
</div>
