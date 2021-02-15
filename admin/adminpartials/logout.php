<?php 

/* Logout - destroy session and redirect back to login page 
So all the information in our session, variables like session, a variable of email, password will be destroyed */

session_start();

session_destroy();

header('location: ../adminlogin.php');

?>