<?php
if (!isset($_SESSION)) {
    session_start();
}

include("partials/connect.php");

//Kui kasutaja on sisse logitud, määra sessioonimuutuja
if (isset($_SESSION['email'])) {
    $userLoggedIn = $_SESSION['email']; //Email of user

    //Get user details from db
    $user_details_query = mysqli_query($connect, "SELECT * FROM customers WHERE username='$userLoggedIn'");

    $user = mysqli_fetch_array($user_details_query); //return array from db (info about the logged in user)
}
// print_r($user);
// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Minu konto</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <header class="header-v4">
        <?php

        //Header template
        include("partials/header.php");

        ?>
    </header>

    <?php include("partials/cartmodal.php"); ?>

    <!-- Content page -->
    <section class="bg0 p-t-40 p-b-116">
        <div class="container">
            <div class="flex-w flex-tr">
                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <!-- Logi sisse vorm -->
                    <form action="handler/customerlogin.php" method="POST">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Logi sisse
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="E-posti aadress">
                            <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="E-post">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Parool">
                            <img class="how-pos4 pointer-none" src="images/icons/lock.png" alt="Parool">
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="login">
                            Logi sisse
                        </button>
                    </form>
                </div>

                <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                    <!-- Registreeri vorm -->
                    <form action="handler/customerregister.php" method="POST">
                        <h4 class="mtext-105 cl2 txt-center p-b-30">
                            Registreeri
                        </h4>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="E-posti aadress">
                            <img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="E-post">
                        </div>

                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Parool">
                            <img class="how-pos4 pointer-none" src="images/icons/lock.png" alt="Parool">
                        </div>
                        <div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password2" placeholder="Korda parooli">
                            <img class="how-pos4 pointer-none" src="images/icons/lock.png" alt="Parool2">
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" name="register">
                            Registreeri
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php

    //Footer template
    include("partials/footer.php");

    ?>

</body>

</html>