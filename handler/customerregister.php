<?php

include("../partials/connect.php");

$email = $_POST['email'];

$password = $_POST['password'];

$password2 = $_POST['password2'];

if ($password == $password2) {
    
    $sql = "INSERT INTO Customers(username, password) VALUES ('$email', '$password')";

    $connect->query($sql);
    
    header('location: ../customerforms.php');

} else {
    echo "<script>
    
    alert('Pw-s did not match!');
    
    window.location.href='../customerforms.php';

    </script>
    ";
}
