
<?php
if (isset($_GET['delete'])) {

    $the_request_id = $_GET['delete'];

    $query = " DELETE FROM leave_request WHERE  request_id = {$the_request_id} ";
    $delete_query = mysqli_query($conn, $query);
}

$search = "";
if (isset($_GET['s'])){
	$search = " AND (fullname like '%$_GET[s]%' OR leave_type like '%$_GET[s]%' OR reason like  '%$_GET[s]%' OR status like  '%$_GET[s]%') ";
}

if (isset($_GET['approve'])) {
    $approve = $_GET['approve'];
    $query = "UPDATE leave_request SET Status = 'Approved', approved_by='$_SESSION[leave_fullname]' WHERE request_id like '$approve'";
    mysqli_query($conn, $query);
    echo "Request approved successfully";
}

if (isset($_GET['unapprove'])) {
    $approve = $_GET['unapprove'];
    $query = "UPDATE leave_request SET Status = 'Pending', approved_by = NULL WHERE request_id like '$approve'";
    mysqli_query($conn, $query);
    echo "Request approved successfully";
}

if (isset($_POST['submit_response'])) {
    $r_id = $_POST['r_id'];
    @ $response = $_POST['response'];
    @ $reason = $_POST['reason'];
	if ($r_id && $response) {
		if (strtolower($response) == "approved"){
            $reason='approved';
        }
        echo  $response;
        if (!$reason){
            $reason = $response;
        }
        $query = "UPDATE leave_request SET Status = '$response', reason = '$reason', approved_by = '$_SESSION[leave_fullname]' WHERE request_id = '$r_id'";
        $update_response = mysqli_query($conn, $query);
        if ($update_response) {
            echo "Response Updated successfully";
            $to = $_POST['email'];
            $subject = "Leave Update";
            $txt = " Hello $_POST[fullname], \r\n This is to inform you that your leave request for $_POST[startdate] to $_POST[enddate] has been $_POST[response]. Thank you";
            $headers = "From: webmaster@example.com" . "\r\n" .
                    "CC: polycarproyal@gmail.com";

            //mail($to,$subject,$txt,$headers);
            //mail();
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("fill in all the details");
            window.location = "index.php?p=respond&r_id=<?php echo $r_id; ?>";
        </script>
        <?php
    }
}
?>

<h1 class="page-header">
            <small>Out of Station Judge Activities</small>
              <!-- <small>Author</small> -->
        </h1>
   

<table id="datatable-responsive" class="table table-striped table-bordered">
    <thead>
        <tr>
            
            
            <th>Fullname</th>
            <th>Designation</th>
            <th>Station</th>
            <th>Activity</th>
            <th>Location</th>
            <th>Start Date</th>
            <th>End Date</th>
            <!--<th>Status</th>-->
	    <!--<th>Replacement</th> -->
	    

  <?php if (strtolower($_SESSION['leave_group']) == 'admin') { ?>
                <!--<th>Delete</th>-->
            <?php } ?>

        </tr>
    </thead>
    <tbody>

<?php
if (strtolower($_SESSION['leave_group']) == 'admin') {
    $query = " SELECT * FROM eventsv WHERE true ";
} else {
    $query = "SELECT * FROM request_v WHERE user_id like '$_SESSION[leave_pj]'";
}
$query .= " $search ";

$leave_schedule = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($leave_schedule)) {

   $Fullname = $row['Fullname'];
    $Designation = $row['Designation'];
    $Station = $row['Station'];
    $Activity = $row['Activity'];
    $Location = $row['Location'];
    //$replacement = $row['replacement'];
    $Start_Date = $row['Start_Date'];
    $End_Date = $row['End_Date'];
    //$status = $row['status'];
    
    echo "<td>$Fullname</td>";
    echo "<td>$Designation</td>";
    echo "<td>$Station</td>";
    echo "<td>$Activity</td>";
    echo "<td>$Location</td>";
    echo "<td>$Start_Date</td>";
    echo "<td>$End_Date</td>";
    //echo "<td>$replacement</td>";
    
    //echo "<td>$status</td>";
   // echo "<td>$approved_by</td>";
   //  if (strtolower($row['status']) == 'pending') {
   //      if (strtolower($_SESSION['leave_group']) == 'admin') {
   //          //echo "<td><div class='col-md-12 btn btn-primary'><a style='color: white;' href ='index.php?p=respond&r_id=$row[request_id]'>Respond<a/><div></td>";
   //      } else {
   //          echo "<td>&nbsp;</td>";
   //      }
   //  } else {
			// echo "<td><div class='col-md-12 btn btn-" .
			// ((strtolower($row['status']) == 'approved') ? "success" : "danger") . "'>" . ((strtolower($_SESSION['leave_group']) == 'admin') ? "<a style='color: white;' href ='index.php?p=respond&r_id=$row[request_id]' title='edit status'>-$row[reason]<a/>" : "-$row[reason]") . "</div></td>";

   //  }
    if (strtolower($_SESSION['leave_group']) == 'admin') {
        //echo "<td><a href = 'posts.php?delete='>Delete<a/></td>";
    }
    echo "</tr>";
}
?>

    </tbody>    
</table>

