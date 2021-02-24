<?php 

//DB query to insert data into contact table

include("../partials/connect.php");

$category=$_POST['name'];

$sql="INSERT INTO categories(name) VALUES('$category')";

//$connect object comes from partials/connect.php
$connect->query($sql);

header('location:productsshow.php'); //Redirect to all products page!


