<?php 

session_start(); //To use session variables

// header("location: index.php");

if (isset($_POST['remove']) || isset($_POST['eemalda'])) { //If remove button is pushed, loop over the cart items and if right item name is found (Comes from "hidden" input), unset (remove that product)
    foreach ($_SESSION['cart'] as $key => $value) { //key = ID, value = Whole associative array
        if ($value['item_name'] == $_POST['item_name']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); //array_values REARRANGES the array, e.g if index 0 product is deleted & 1,2,3 remain, rearrange to 0, 1, 2 !!!!
            echo "
            <script>
            
            /*alert('Item removed');*/
            
            window.location.href='cart.php';

            </script>
            ";
        }
    }
}