<?php

session_start(); //To use session variables

$qty = $_POST['quantity']; //Get the quantity


if (isset($_POST['update'])) { //If update button is pushed, loop over the cart items and if right item name is found (Comes from "hidden" input), update the product quantity
    foreach ($_SESSION['cart'] as $key => $value) { //key = ID, value = Whole associative array

        if ($value['item_name'] == $_POST['item_name']) {

            $_SESSION['cart'][$key]['quantity'] = $qty;

            echo "
            <script>
            
            /*alert('Item updated');*/
            
            window.location.href='cart.php';

            </script>
            ";
        }
    }
}
