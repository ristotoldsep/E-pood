<?php 
    include('../partials/connect.php');

    $newid = $_GET['del_id'];

    $sql = "DELETE FROM Orders WHERE id='$newid'";
    $sql2 = "DELETE FROM Order_details WHERE order_id='$newid'";

    if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql2)) {
        header('location: orders.php');
    } else {
        echo "Error deleting!";
    }
