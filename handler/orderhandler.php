<?php 
include("../partials/connect.php");

session_start();

if(isset($_POST['placeorder'])) {
    $total = $_POST['total'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $nimi = $_POST['nimi'];
    $payment_method = $_POST['payment_method'];
    $customer_id = $_SESSION['customer_id'];

    $sql = "INSERT INTO Orders (customer_id, address, phone, total, payment_method, nimi) VALUES ('$customer_id', '$address', '$phone', '$total', '$payment_method', '$nimi')";

    $connect->query($sql);

    $sql2 = "SELECT id FROM Orders ORDER BY id DESC LIMIT 1"; //Finc latest order and only 1 row!

    $result = $connect->query($sql2);

    $final = $result->fetch_assoc();

    $order_id = $final['id'];

    foreach ($_SESSION['cart'] as $key => $value) {
        $product_id = $value['item_id'];

        $quantity = $value['quantity'];

        $sql3 = "INSERT INTO order_details (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";

        $connect->query($sql3);
    }

    if ($payment_method == "paypal") {
        $_SESSION['total'] = $total; //Passing the total to session variable, later passing that to Paypal

        header('location: paypal.php');
    } else {
        echo "<script>
    
    alert('Tellimus on esitatud!');

    window.location.href='../index.php';
    
    </script>";
    }

    //When order is placed, unset the session
    unset($_SESSION['cart']);
}




/** CREATE AND REDIRECT TO ORDER VIEW PAGE  */


?>