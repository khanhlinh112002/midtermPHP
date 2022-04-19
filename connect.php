<?php
$host = "localhost";
$use = "root";
$password = "";
$database = "khanhlinh";

$conn = mysqli_connect($host, $use, $password, $database);
mysqli_set_charset($conn,'UTF8');

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
//echo "Connected successfully";
?>