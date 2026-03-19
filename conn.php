<?php
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "log system";

$conn = mysqli_connect(
    $db_server, 
    $db_user, 
    $db_pass, 
    $db_name);

    $conn = new mysqli("localhost", "root", "", "log system");

    // Checking connection
     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
}
?>