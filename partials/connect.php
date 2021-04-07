<?php
ob_start(); //Turns on output buffering
session_start(); //Starts the session

$timezone = date_default_timezone_set("Europe/Helsinki");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "phpstore";

$connect = mysqli_connect($host, $user, $password, $dbname);

if (mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>
