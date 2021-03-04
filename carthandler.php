<?php 

session_start(); //Without it session variables would not work

if (isset($_SESSION['cart'])) { //If session variable cart is already made (1 product or more already in the cart, then add new product to next pos in array)
    $checker = array_column($_SESSION['cart'], 'item_name'); //Check if same product is already in cart

    if (in_array($_GET['cart_name'], $checker)) { //needle, haystack
        echo "<script>
        
        alert('Product already in cart!');
        
        window.location.href='details.php?details_id=". $_GET['cart_id'] . "';

        </script>";
    }

    $count = count($_SESSION['cart']); //Count the items in the cart

    $_SESSION['cart'][$count] = array(
        'item_id' => $_GET['cart_id'],
        'item_name' => $_GET['cart_name'],
        'item_price' => $_GET['cart_price']
    );

    echo "<script>
    window.location.href='product.php';
    </script>";
} else { //if cart session is not yet made (cart is empty), add the new product on index 0 in array
    $_SESSION['cart'][0] = array(
        'item_id' => $_GET['cart_id'],
        'item_name' => $_GET['cart_name'],
        'item_price' => $_GET['cart_price']
    );
    
    echo "<script>
    window.location.href='product.php';
    </script>";
}

//print_r($_SESSION['cart']);

//session_destroy();
