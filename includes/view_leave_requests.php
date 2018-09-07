
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

<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Pj</th>
            <th>fullname</th>
            <th>leave type</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Status</th>
            <th>Approve by</th>
            <th>Response</th>
	    <!--<th>Replacement</th> -->
	    

<?php if (strtolower($_SESSION['leave_group']) == 'admin') { ?>
                <th>Delete</th>
            <?php } ?>

        </tr>
    </thead>
    <tbody>

<?php
if (strtolower($_SESSION['leave_group']) == 'admin') {
    $query = " SELECT * FROM request_v WHERE true ";
} else {
    $query = "SELECT * FROM request_v WHERE user_id like '$_SESSION[leave_pj]'";
}
$query .= " $search ";

$select_leave_request = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_leave_request)) {

    $user_id = $row['user_id'];
    $leave_type = $row['leave_type'];
    $fullname = $row['fullname'];
    $replacement = $row['replacement'];
    $start_date = $row['start_date'];
    $end_date = $row['end_date'];
    $status = $row['status'];
    $approved_by = $row['approved_by'];


    echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$fullname</td>";
    echo "<td>$leave_type</td>";
    echo "<td>$start_date</td>";
    //echo "<td>$replacement</td>";
    echo "<td>$end_date</td>";
    echo "<td>$status</td>";
    echo "<td>$approved_by</td>";
    if (strtolower($row['status']) == 'pending') {
        if (strtolower($_SESSION['leave_group']) == 'admin') {
            echo "<td><div class='col-md-12 btn btn-primary'><a style='color: white;' href ='index.php?p=respond&r_id=$row[request_id]'>Respond<a/><div></td>";
        } else {
            echo "<td>&nbsp;</td>";
        }
    } else {
			echo "<td><div class='col-md-12 btn btn-" .
			((strtolower($row['status']) == 'approved') ? "success" : "danger") . "'>" . ((strtolower($_SESSION['leave_group']) == 'admin') ? "<a style='color: white;' href ='index.php?p=respond&r_id=$row[request_id]' title='edit status'>-$row[reason]<a/>" : "-$row[reason]") . "</div></td>";

    }
    if (strtolower($_SESSION['leave_group']) == 'admin') {
        echo "<td><a href = 'posts.php?delete='>Delete<a/></td>";
    }
    echo "</tr>";
}
?>

    </tbody>    
</table>

