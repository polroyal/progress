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
        // $user_group = $_POST['user_group'];
        // $date_of_birth = $_POST['date_of_birth'];
        // $division = $_POST['division'];
        $station = $_POST['station'];
        // $date_transfered = $_POST['date_transfered'];
        if ($pj && $fullname && $designation && $email) {
            if (isset($_POST['edit_pj']) && $_POST['edit_pj'] != '') {
                $query = "UPDATE users SET pj = '$pj', fullname = '$fullname', Designation = '$designation',"
                        . " email = '$email', Station = '$station', "
                        . " WHERE pj like '$_POST[edit_pj]'";
                $insert_user = pg_query($conn, $query);
            } else {
                $query = "INSERT INTO users (pj, fullname, designation, email, "
                        . " password, Station) ";
                $query .= " VALUES ('$pj', '$fullname', '$designation', '$email', "
                        . "'pass', '$station')";
                $insert_user = pg_query($conn, $query);
            }

            if ($insert_user) {
                $query = "SELECT * FROM transfers WHERE PJ like '$pj' AND isnull(TransferFrom)";
                $res = mysqli_query($conn, $query);
                if ($rw = mysqli_fetch_array($res)) {
                    $query = "UPDATE transfers SET DateIn = '$date_transfered', TransferTo = '$station', "
                            . "ToDivision = '$division' WHERE PJ like '$pj' AND isnull(TransferFrom)";
                    mysqli_query($conn, $query);
                } else {
                    $query = "INSERT INTO transfers (PJ, DateIn, TransferTo, ToDivision) VALUES "
                            . "('$pj', '$date_transfered', '$station', '$division')";
                    mysqli_query($conn, $query);
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
            $query = "INSERT INTO stations (StationCode, StationName, UnitCode) ";
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
            $query = "INSERT INTO adminunits (UnitCode, AdminUnit) ";
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

// function insert_division() {
//     global $conn;

//     if (isset($_POST['submit'])) {
//         $division = $_POST['division'];
//         if ($division) {
//             $query = "INSERT INTO divisions (Division) ";
//             $query .= " VALUES ('$division')";

//             $insert_user = mysqli_query($conn, $query);

//             if ($insert_user) {
//                 echo "Division inserted successfully";
//             } else {
//                 echo "Save failed";
//             }
//         }
//     }
// }

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

        $fullname = $_POST['fullname'];
        $event = $_POST['event'];
        $location = $_POST['location'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

    if ($fullname && $event && $location && $start_date && $end_date) {
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

// function Delete_Leave_type() {
//     global $conn;
//     if (isset($_GET['delete'])) {
//         $get_id = $_GET['delete'];
//         $query = " DELETE FROM leave_types WHERE leave_type = '{$get_id}' ";
//         $delete_query = mysqli_query($conn, $query);
//         ?>
//         <script type="text/javascript">
//             window.location = "index.php?p=leave_types";
//         </script>
//         <?php

//         //header("Location: leave_types.php"); //refreshing leave_types page
//     }
// }

?>
