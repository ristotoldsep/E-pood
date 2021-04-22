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

//Get Heroku ClearDB connection information
/* $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$connect = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db); */

// Change character set to utf8
mysqli_set_charset($connect, "utf8");

?>
