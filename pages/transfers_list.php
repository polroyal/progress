

<h1 class="page-header">
            <small>Judges Transfer List</small>
              <!-- <small>Author</small> -->
        </h1>

<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>fullname</th>
            <th>Current Station</th>
            <th>Transfer History</th>
        </tr>
    </thead>
    <tbody>

<?php
$query = "select c.fullname as fullname, c.pj as pj, StationTo as current_station, replace(t.othertransfers,',','') as transfer_history from currentstationsv as c left join (select pj, fullname, group_concat(concat(DateIn, ' ==> ', StationTo) ORDER BY DateIn, '<br/>') as othertransfers from transfersv group by pj) as t on c.pj = t.pj where Designation NOT LIKE 'Admin' ";
$select_leave_request = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($select_leave_request)) {
 
    //$pj = $row['pj'];
    $fullname = $row['fullname'];
    $current_station = $row['current_station'];
    $transfer_history = $row['transfer_history'];


    echo "<tr>";
   // echo "<td>$pj</td>";
    echo "<td>$fullname</td>";
    echo "<td>$current_station</td>";
    echo "<td>$transfer_history</td>";
    echo "</tr>";
}
?>

    </tbody>    
</table>

