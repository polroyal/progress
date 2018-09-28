<?php

//Confirm connection

function confirm($result) {
    global $conn;
    if (!$result) {
        die("Query  failed" . pg_last_error($conn));
    }
}

function insert_user() {
    global $conn;

    if (isset($_POST['submit'])) {
        $pj = $_POST['pj'];
        $fullname = $_POST['fullname'];
        $designation = $_POST['designation'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        // $user_group = $_POST['user_group'];
        // $date_of_birth = $_POST['date_of_birth'];
        // $division = $_POST['division'];
        $station = $_POST['station'];
        // $date_transfered = $_POST['date_transfered'];
        if ($pj && $fullname && $designation && $email && $username) {
            if (isset($_POST['edit_pj']) && $_POST['edit_pj'] != '') {
                $query = "UPDATE users SET pj = '$pj', fullname = '$fullname', username = '$username', designation = '$designation',"
                        . " email = '$email', Station = '$station', "
                        . " WHERE pj like '$_POST[edit_pj]'";
                $insert_user = pg_query($conn, $query);
            } else {
                $query = "INSERT INTO users (pj, fullname, username, designation, email, "
                        . " password, station) ";
                $query .= " VALUES ('$pj', '$fullname', '$username', '$designation', '$email', "
                        . "'pass', '$station')";
                $insert_user = pg_query($conn, $query);

                echo "user";
            }

            if ($insert_user) {
                $query = "SELECT * FROM transfers WHERE PJ like '$pj' AND isnull(TransferFrom)";
                $res = pg_query($conn, $query);
                if ($rw = pg_fetch_array($res)) {
                    $query = "UPDATE transfers SET DateIn = '$date_transfered', TransferTo = '$station', "
                            . "ToDivision = '$division' WHERE PJ like '$pj' AND isnull(TransferFrom)";
                    pg_query($conn, $query);
                } else {
                    $query = "INSERT INTO transfers (PJ, DateIn, TransferTo, ToDivision) VALUES "
                            . "('$pj', '$date_transfered', '$station', '$division')";
                    pg_query($conn, $query);
                }
                echo "<div class='alert alert-info'>User Inserted successfully</div>";
            } else {
                echo "Save failed";
            }
        }
    }
}

function insert_station() {
    global $conn;

    if (isset($_POST['submit'])) {
        $station_code = $_POST['station_code'];
        $station_name = $_POST['station_name'];
        $unit_code = $_POST['unit_code'];
        if ($station_code && $station_name && $unit_code) {
            $query = "INSERT INTO stations (station_code, station_name, unit_code) ";
            $query .= " VALUES ('$station_code', '$station_name', '$unit_code')";

            $insert_user = pg_query($conn, $query);

            if ($insert_user) {
                echo "Station inserted successfully";
            } else {
                echo "Save failed";
            }
        }
    }
}

function insert_adminunit() {
    global $conn;

    if (isset($_POST['submit'])) {
        $unit_code = $_POST['unit_code'];
        $admin_unit = $_POST['admin_unit'];
        if ($unit_code && $admin_unit) {
            $query = "INSERT INTO adminunit (unit_code, admin_unit) ";
            $query .= " VALUES ('$unit_code', '$admin_unit')";

            $insert_user = pg_query($conn, $query);

            if ($insert_user) {
                echo "Admin Unit inserted successfully";
            } else {
                echo "Save failed";
            }
        }
    }
}


//insert strategy
function insert_strategy(){

    global $conn;

    if(isset($_POST['submit'])){

        $strategy = $_POST['strategy'];
        $description = $_POST['description'];
        $performance_measure = $_POST['performance_measure'];
        $supervising_unit = $_POST['supervising_unit'];
        $dates = $_POST['dates'];
        $completion_date = $_POST['completion_date'];

    if ($strategy && $description && $performance_measure && $supervising_unit && $dates && $completion_date) {
        $query = "INSERT INTO strategy(strategy, description, performance_measure, supervising_unit, dates, completion_date) ";
        $query .= " VALUES ('$strategy', '$description', '$performance_measure', '$supervising_unit', '$dates', $completion_date)";
        //echo $query;
        $insert_strategy = pg_query($conn, $query); 
        if($insert_strategy){
        echo "strategy inserted successfully";
        }else {

            echo "save failed";
        }
     }
    }
}

//insert theme
function insert_theme(){

    global $conn;

    if(isset($_POST['submit'])){

        $strategy = $_POST['strategy'];
        $theme = $_POST['theme'];
        $dates = $_POST['dates'];
        $completion_date = $_POST['completion_date'];
        $responsibility = $_POST['responsibility'];

    if ($strategy && $theme && $dates && $completion_date && $responsibility) {
        $query = "INSERT INTO strategy(strategy, theme, dates, completion_date, responsibility) ";
        $query .= " VALUES ('$strategy', '$theme', '$dates', '$completion_date', '$responsibility') ";
        //echo $query;
        $insert_theme = pg_query($conn, $query); 
        if($insert_theme){
        echo "strategy inserted successfully";
        }else {

            echo "save failed";
        }
     }
    }
}

//INSERT leave_types FUNCTION

// function insert_leave_type() {

//     global $conn;

//     if (isset($_POST['submit'])) {

//         $leave_type = $_POST['leave_type'];

//         if ($leave_type == "" || empty($leave_type)) {

//             echo "This field cannot be empty";
//         } else {

//             $query = " INSERT INTO leave_types(leave_type) ";
//             $query .= " VALUES('{$leave_type}') ";
//             $create_leave_type_query = mysqli_query($conn, $query); //send the inserted data to db

//             if (!$create_leave_type_query) {

//                 die('Query Failed' . mysqli_error($conn));
//             }
//         }
//     }
// }


function insert_activity(){

    global $conn;

    if(isset($_POST['submit'])){

        $strategy = $_POST['strategy'];
        $activity = $_POST['activity'];
        $indicator = $_POST['indicator'];
        $baseline = $_POST['baseline'];
        $target = $_POST['target'];
        $status = $_POST['status'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

    if ($strategy && $activity && $indicator && $baseline && $target && $status && $start_date && $end_date) {
        $query = "INSERT INTO events(fullname, event, location, start_date, end_date) ";
        $query .= " VALUES ('$fullname', '$event', '$location', '$start_date', '$end_date')";
		//echo $query;
        $insert_event = pg_query($conn, $query); 
        if($insert_event){
        echo "event inserted successfully";
        }else {

            echo "save failed";
        }
     }
    }
}




//FIND leave_types FUNCTION

// function find_all_leave_types() {
//     global $conn;

//     $query = " SELECT * FROM leave_types ";
//     $select_leave_types = mysqli_query($conn, $query);

//     while ($row = mysqli_fetch_assoc($select_leave_types)) {


//         $leave_type = $row['leave_type'];

//         echo "<tr>";
//         echo " <td>{$leave_type}</td>";

//         echo " <td><a href = 'index.php?p=leave_types&edit={$leave_type}' title='Edit {$leave_type}'><i class=\"fa fa-edit\"></i></a></td> ";
//         echo " <td><a href = 'index.php?p=leave_types&delete={$leave_type}' title='Delete {$leave_type}'><i class=\"fa fa-remove\"></i></a></td>"; //using $_GET super global  

//         echo "</tr>";
//     }
// }

//DELETE CATEGORY

function Delete_Leave_type() {
    global $conn;
    if (isset($_GET['delete'])) {
        $get_id = $_GET['delete'];
        $query = " DELETE FROM leave_types WHERE leave_type = '{$get_id}' ";
        $delete_query = mysqli_query($conn, $query);
        ?>
        <script type="text/javascript">
            window.location = "index.php?p=leave_types";
        </script>
        <?php

        //header("Location: leave_types.php"); //refreshing leave_types page
    }
}

?>
