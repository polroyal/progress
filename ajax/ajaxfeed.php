<?php
if (isset($_GET['start'])){
	$query = "SELECT * from requests_v WHERE Date(start_date) = \"$_GET[start]\"";
	$result = mysql_query($query);
	echo "<table><tr><th>FullName</th><th>Leave Type</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr><td>$row[fullname]</td><td>$row[leave_type]</td></tr>";
	}
	echo "</table>";
}
