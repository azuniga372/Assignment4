<?php

$server = "localhost";
$usrname = "root";
$password = "";
$database = "assignment4";

$conn = mysqli_connect($server, $usrname, $password, $database);

if (!$conn) {
    die("<script>alert('Connection Failed')</script>");
}

?>