<?php


//  Configure DB Parameters
$host = "localhost";
$dbname = "progress";
$dbuser = "automation";
$userpass = "12qwaszxasqw12";

$conn = pg_connect("host=$host
					      dbname=$dbname
					      user=$dbuser
					      password=$userpass
					      ");


if (!$conn) {
        die('Could not connect');
}
else {

        echo ("Connected");
}
?>
