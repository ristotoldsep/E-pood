<?php
// session_start();
include("../partials/connect.php");

if (isset($_POST['login'])) { //Kas logi sisse nuppu vajutati?


    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Customers WHERE username='$email' AND password='$password'";
    $results = $connect->query($sql); //Queries the db - need to connect connect.php file to access object!
    $final = $results->fetch_assoc();
    
    $_SESSION['email'] = $final['username']; //this will make three variables of session 
    $_SESSION['password'] = $final['password'];
    $_SESSION['customer_id'] = $final['id']; //We need the id for order details later

    if ($email = $final['username'] AND $password = $final['password']) {
        header('location: ../index.php'); //If credentials OK, redirect to front page
    } else {
        header('location: ../customerforms.php');
    }
}

?>
