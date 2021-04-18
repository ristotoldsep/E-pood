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

    $admin_query = mysqli_query($connect, "SELECT * FROM admins WHERE username='$userLoggedIn'");

    //Kontrolli kas sisselogitud kasutaja on admin
    if (mysqli_num_rows($admin_query) == 0) {
        $user = mysqli_fetch_array($user_details_query); //return array from db (info about the logged in user)
    } else {
        $user = mysqli_fetch_array($admin_query); //return array from db (info about the logged in user)
    }
}

if (isset($_GET['order_id'])) {

    $order_id = $_GET['order_id'];

    $shipping = 3;

    //==============================

    $sql = "SELECT O.*, C.username FROM Orders O INNER JOIN Customers C ON O.customer_id=C.id WHERE O.id='$order_id'";

    $result = mysqli_query($connect, $sql);

    $tellimus = mysqli_fetch_array($result); //Tellimuse rida

    //==============================

    $sql2 = "SELECT order_id, product_id, quantity, P.name AS prod_name, P.price, P.picture, P.description, C.name AS cat_name FROM order_details O INNER JOIN products P ON O.product_id=P.id INNER JOIN categories C ON category_id=C.id WHERE O.order_id=$order_id";

    $result2 = mysqli_query($connect, $sql2);

    // $tooteandmed = mysqli_fetch_array($result2); //Tooteandmed

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Täname ostu eest! - Tellimuse #<?php echo $order_id; ?> andmed</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">

    <!-- ============================================================================================= -->
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

    <!-- breadcrumb -->
    <!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div> -->

    <div class="container">
        <!-- Content Wrapper. Contains page content -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Täname tellimuse eest!
                <small>Arve tellimusele #<?php echo $order_id ?></small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-shopping-cart"></i> E-pood.
                        <small class="pull-right">&nbsp; Kuupäev: <?php echo $tellimus['created_at'] ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Müüja
                    <address>
                        <strong>Kuldne Trio OÜ</strong><br>
                        Ravi 11, Tallinn<br>
                        Reg. nr: 123456<br>
                        Telefon: +372 5911 3357<br>
                        E-post: info@epood.ee
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    Klient
                    <address>
                        <strong><?php echo $tellimus['nimi']; ?></strong><br>
                        <?php echo $tellimus['pakiautomaat']; ?><br>
                        Telefon: <?php echo $tellimus['phone']; ?><br>
                        Email: <?php echo $tellimus['username']; ?>
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Arve nr #<?php echo $order_id; ?></b><br>
                    <br>
                    <b>Tellimuse ID:</b> <?php echo $order_id; ?><br>
                    <b>Maksekuupäev:</b> <?php echo $tellimus['created_at']; ?><br>
                    <b>Makseviis:</b>
                    <?php

                    //Pildi loogika
                    if ($tellimus['payment_method'] == "paypal") {
                        echo "Paypal ";
                        echo '<img width="30px" src="admin/dist/img/credit/paypal2.png" alt="Paypal ">';
                    } else {
                        echo "Pangaülekanne";
                    }
                    ?>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Kogus</th>
                                <th>Toode</th>
                                <th>Nimi</th>
                                <th>Kirjeldus</th>
                                <th>Kategooria</th>
                                <th>Hind</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Loopis väljasta ostetud tooted
                            while ($tooteandmed = mysqli_fetch_array($result2)) { ?>
                                <tr>
                                    <td><?php echo $tooteandmed['quantity']; ?></td>
                                    <td><img src="<?php echo $tooteandmed['picture']; ?>" width="40px" alt="<?php echo $tooteandmed['prod_name']; ?>"></td>
                                    <td><?php echo $tooteandmed['prod_name']; ?></td>
                                    <td><?php echo $tooteandmed['description']; ?></td>
                                    <td><?php echo $tooteandmed['cat_name']; ?></td>
                                    <td><?php echo $tooteandmed['price']; ?> €</td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <!-- <div class="col-xs-6">
                    <p class="lead">Maksemeetod:</p>
                
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div> -->
                <!-- /.col -->
                <div class="col-sm-6">
                    <hr>
                    <p class="lead">Tehingukuupäev <?php echo $tellimus['created_at']; ?></p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Kokku:</th>
                                <td><?php echo $tellimus['total'] - $shipping; ?> €</td>
                            </tr>
                            <tr>
                                <th>Transport:</th>
                                <td><?php echo $shipping ?> €</td>
                            </tr>
                            <tr>
                                <th>Kogusumma:</th>
                                <td><?php echo $tellimus['total']; ?> €</td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Prindi</a>

                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info"></i> Märkus:</h4>
                See leht on kujundatud printimiseks. Soovi korral vajutage nuppu "Prindi" arve printimiseks.
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php

    //Footer template
    include("partials/footer.php");

    ?>

</body>

</html>