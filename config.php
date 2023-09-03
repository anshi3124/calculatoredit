<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "calculator_management";

$con=mysqli_connect("localhost","root","","calculator_management");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>