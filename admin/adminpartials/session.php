<?php 

session_start();

//If someone tries to access adminindex.php from URL bar, check if session is created, if not, redirect to login!
if (empty($_SESSION['email'] AND $_SESSION['password'])) {
    header('location: adminlogin.php');
}

?>