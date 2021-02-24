<?php 
    include('../partials/connect.php');

    $newid = $_GET['del_id'];

    $sql = "DELETE FROM Products WHERE id='$newid'";

    if (mysqli_query($connect, $sql)) {
        header('location: productsshow.php');
    } else {
        echo "Error deleting!";
    }
?>