<?php
// ob_start(); //Turns on output buffering
// session_start(); //Starts the session

$timezone = date_default_timezone_set("Europe/Helsinki");

$host = "localhost";
$user = "root";
$password = "";
$dbname = "phpstore";

$connect = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
