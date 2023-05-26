<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "qratt";
$conn = mysqli_connect($server, $username, $password, $database, 3306);
if (!$conn) {
    //     echo "Success";
    // } else {
    die("Error database connection failed" . mysqli_connect_error());
}
