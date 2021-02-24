<?php

include('../partials/connect.php');

if(isset($_POST['update'])) { //If update button (name="update") is clicked, update data in DB
    $newid = $_POST['form_id'];
    $newname = $_POST['name'];
    $newprice = $_POST['price'];    
    $newdesc = $_POST['description'];
    $newcat = $_POST['category'];

    //Creating a path for uploaded images
    $target = "../uploads/";
    //$file_path = $target . basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name']; //Temporary file name
    $file_store = "../uploads/" . $file_name;

    move_uploaded_file($file_tmp, $file_store);

    $sql1 = "SELECT * FROM Products WHERE id='$newid'";

    $results = $connect->query($sql1);

    $final = $results->fetch_assoc();

    $oldimage = $final['picture'];

    //ADDED CODE SO IF USER UPDATED PRODUCT & DID NOT CHANGE IMAGE, IT WOULD NOT CLEAR IT IN DB
    if (basename($_FILES['file']['name']) !== "") {
        $file_path = $target . basename($_FILES['file']['name']);
    } else {
        $file_path = $oldimage;
    } 

    $sql2 = "UPDATE Products SET name='$newname', price='$newprice', picture='$file_path', description='$newdesc', category_id='$newcat' WHERE id='$newid'";

    if (mysqli_query($connect, $sql2)) {
        header('location: productsshow.php');
    } else {
        header('location: adminindex.php');
    }


}

?>