<?php

//DB query to insert data into contact table

include("../partials/connect.php");

$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$category = $_POST['category'];

//Creating a path for uploaded images
$target="../uploads/";
$file_path=$target.basename($_FILES['file']['name']);
$file_name=$_FILES['file']['name'];
$file_tmp= $_FILES['file']['tmp_name']; //Temporary file name
$file_store="../uploads/".$file_name;

move_uploaded_file($file_tmp, $file_store);


$sql = "INSERT INTO products(name, price, picture, description, category_id) VALUES('$name', '$price', '$file_path', '$description', '$category')";

//$connect object comes from partials/connect.php
$connect->query($sql);

header('location:productsshow.php'); //Redirect to all products page!
