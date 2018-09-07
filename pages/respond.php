<?php 

$reason = "";
$response = "";
if (isset($_GET['r_id'])){
	$r_id = $_GET['r_id'];
	$query = "SELECT * FROM request_v WHERE request_id like '$_GET[r_id]'";
	//echo $query;
	$result = mysqli_query($conn, $query);
	if ($row = mysqli_fetch_assoc($result)){
		$fullname = $row['fullname'];
		$pj = $row['user_id'];
		$leave_type = $row['leave_type'];
		$replacement = $row['replacement_fullname'];
		$start_date = $row['start_date'];
		$end_date = $row['end_date'];
		$response = $row['status'];
		$email = $row['email'];
		$reason = $row['reason'];
	} else {
		//die('');
		?>
		<script type="text/javascript">
			window.location = "index.php?p=requests_list";
		</script>
		<?php
	}
} else {
    ?>
    <script type="text/javascript">
		window.location = "index.php?p=requests_list";
	</script>
    <?php
}

?>
<div class="row">
<form name="respond" action="index.php?p=requests_list" method="post">
<div class="row">
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">PJ: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" name="pj" class="form-control" type="text" value="<?php echo $pj; ?>" placeholder="Disabled Input">
	  <input name="r_id" class="form-control" type="hidden" value="<?php echo $r_id; ?>" placeholder="Disabled Input">
	</div>
  </div> 
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Fullname: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" name="fullname" class="form-control" type="text" value="<?php echo $fullname; ?>"placeholder="Disabled Input">
	  <input name="fullname" class="form-control" type="hidden" value="<?php echo $fullname; ?>"placeholder="Disabled Input">
	</div>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Leave Type: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" name="leavetype" class="form-control" type="text"  value="<?php echo $leave_type; ?>"placeholder="Disabled Input">
	</div>
  </div> 
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Replacement: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" name="replacement" class="form-control" type="text"  value="<?php echo $replacement; ?>"placeholder="Disabled Input">
	</div>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" class="form-control" type="text"  value="<?php echo $start_date; ?>"placeholder="Disabled Input">
	  <input name="startdate" class="form-control" type="hidden"  value="<?php echo $start_date; ?>"placeholder="Disabled Input">
	</div>
  </div> 
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">End Date: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" class="form-control" type="text"  value="<?php echo $end_date; ?>"placeholder="Disabled Input">
	  <input name="enddate" class="form-control" type="hidden"  value="<?php echo $end_date; ?>"placeholder="Disabled Input">
	</div>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Response: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
		<select name="response" class="form-control" onchange="
		if(this.value === 'Approved'){
			document.getElementById('reason').disabled=true;
			document.getElementById('reason').value='N/A';
		}else{
			if(this.value === 'Rejected'){
				document.getElementById('reason').disabled=false;
				document.getElementById('reason').value='';
			}
		}">
			<option>Select Response</option>
			<option value="Approved" <?php if(strtolower($response) == 'approved'){ echo "selected='selected'"; } ?>>Approve</option>
			<option value="Rejected" <?php if(strtolower($response) == 'rejected'){ echo "selected='selected'"; } ?>>Reject</option>
		</select>
	</div>
  </div> 
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Email: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <input disabled="disabled" class="form-control" type="text"  value="<?php echo $email; ?>"placeholder="Disabled Input">
	  <input name="email" class="form-control" type="hidden"  value="<?php echo $email; ?>"placeholder="Disabled Input">
	</div>
  </div>
</div>
<div class="row">
  <div class="form-group col-md-6">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Reason: </label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	  <textarea class="form-control" name="reason" id="reason"><?php echo $reason; ?></textarea>
	</div>
  </div>
</div>
<div class="row">
	<div class="col-md-12">
		<input type="submit" class="btn btn-primary"  value="Submit Response" name="submit_response"/>
		<input type="reset"  class="btn btn-warning" value="Clear" name="clear"/>
	</div>
</div>
</form>
