 <form action="" method="post" >
  <div class="form-group">
  <label for="leave_type">Edit leave_type</label>

  <?php 

  if(isset($_GET['edit'])){

  $edit_leave_type = $_GET['edit']; // catch the edit key from $_GET


    $query = " SELECT * FROM leave_types WHERE leave_type = '$edit_leave_type' ";

      $select_categories_id = mysqli_query($conn, $query);


       while ($row = mysqli_fetch_assoc($select_categories_id)) {

         $leave_type = $row['leave_type'];

       }

       ?>

       <input value ="<?php if(isset($leave_type)){echo $leave_type;} ?>"
       class= "form-control" type="text" name="leave_type">

  <?php } ?>

  <?php 
  //Update Categories Query 

  if(isset($_POST['update_leave_type'])){
      $leave_type = $_POST['leave_type'];
      $query = " UPDATE leave_types SET leave_type = '{$leave_type}' WHERE leave_type = '{$edit_leave_type}' ";
      $update_query = mysqli_query($conn, $query);

      if(!$update_query){

        die("query failed" . mysqli_error($conn));
      }
    }
  ?>
  </div>
   <div class="form-group">
    <input class="btn btn-primary" type="submit" name="update_leave_type" value="Update leave type">    
  </div>
  </form>