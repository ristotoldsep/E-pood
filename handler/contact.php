<?php 

//DB query to insert data into contact table

include("../partials/connect.php");

$email=$_POST['email'];

$msg=$_POST['msg'];

$sql="INSERT INTO contact(email, msg) VALUES('$email', '$msg')";

//$connect object comes from partials/connect.php
$connect->query($sql);

?>