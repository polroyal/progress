

<?php
if (isset($_POST['submit'])){
	$pj_from = $_POST['pj_from'];
	$pj_to = $_POST['pj_to'];
	$query = "DROP TABLE IF EXISTS transferstemp";
	mysqli_query($conn, $query);
	$query = "CREATE TABLE transferstemp as SELECT * FROM transfers";
	mysqli_query($conn, $query);
	if ($pj_from){
		$query = "UPDATE transferstemp SET Pj = '$pj_to' WHERE pj like '$pj_from'";
		mysqli_query($conn, $query);
		$query = "DELETE FROM users WHERE pj like '$pj_from'";
		mysqli_query($conn, $query);
	}
	$query = "UPDATE transferstemp SET DateOut = NULL WHERE PJ like '$pj_to' ";
	mysqli_query($conn, $query);
	$query = "SELECT * FROM transferstemp WHERE pj like '$pj_to' ORDER BY DateIn ";
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
			$query = "DELETE FROM transferstemp WHERE pj like '$pj_to' AND TransferFrom = TransferTo AND FromDivision = ToDivision";
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
?>

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">
            <small>SELECT THE FULLNAMES TO COMBINE, LEAVE THE FIRST FIELD BLANK TO REPAIR THE TRANSFERS OF THE USER SELECTED ON THE SECOND FIELD</small>
              <!-- <small>Author</small> -->
        </h1>
		<form name="test" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" onsubmit="
						if(document.getElementById('pj_from').value == document.getElementById('pj_to').value){
							alert('please select different fullnames to avoid loosing data');
							return false;
						}">
			<div class="col-md-7">
				<div class="form-group">
					<label for="pj_from" class="col-sm-12 control-label">Combine Data from: HON JUSTICE </label>
					<div class="col-sm-12">
						<select name="pj_from" id="pj_from" class="form-control" onchange="
						if(document.getElementById('pj_from').value == document.getElementById('pj_to').value){
							alert('please select different fullnames to avoid loosing data');
						}">
							<option value="">SELECT THE BAD FULLNAME</option>
							<?php 
							$query = "SELECT *, trim(replace(upper(fullname), 'HON JUSTICE', '')) as fn FROM users ORDER BY fullname";
							$results = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_array($results)){
								echo "<option value=\"$row[pj]\">$row[fn]</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="pj_to" class="col-sm-12 control-label">Change Name to: HON JUSTICE </label>
					<div class="col-sm-12">
						<select name="pj_to" id="pj_to" class="form-control" required="required" onchange="
						if(document.getElementById('pj_from').value == document.getElementById('pj_to').value){
							alert('please select different fullnames to avoid loosing data');
						}">
							<option value="">SELECT FULLNAME TO CHANGE TO</option>
							<?php 
							$query = "SELECT *, trim(replace(upper(fullname), 'HON JUSTICE', '')) as fn FROM users ORDER BY fullname";
							$results = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_array($results)){
								echo "<option value=\"$row[pj]\">$row[fn]</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-4" >
						<button type="submit" class="btn btn-primary" name="submit"><i class="icon-ok icon-white"></i>&nbsp; Combine Fullname</button>
						&nbsp;
						<a href="" class="btn btn-danger"><i class="icon-remove icon-white"></i>&nbsp; Cancel</a>
					</div> 
				</div>
			</div>
		</form>
	</div>
</div>
