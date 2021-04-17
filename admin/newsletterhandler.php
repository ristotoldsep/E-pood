<?php

//DB query to insert data into contact table

include("../partials/connect.php");

$from = 'email_to_be_sent_from';//specify here the address that you want email to be sent from 

if (isset($_POST['saada'])) {
    $subject = $_POST['pealkiri'];
    $body = $_POST['sonum'];

    $query = "SELECT * FROM newsletter";
    $result = mysqli_query($connect, $query)
        or die('Error querying database.');

    while ($row = mysqli_fetch_array($result)) {
        
        $email = $row['email'];

        $msg = "Lugupeetud $email,\n$body";

        mail($email, $subject, $msg, 'Saatja:' . $from);
        
        echo 'Email saadetud kliendile: ' . $email . '<br>';
    } 

}

header('location:newslettersend.php'); //Redirect to all products page!
