<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tyre";
$con = mysqli_connect($servername, $username, $password, $dbname);

// to check whether the connection established
if ($con) {
    //echo "succesful";
} else {
    echo "failed" . mysqli_connect_error();
}
?>