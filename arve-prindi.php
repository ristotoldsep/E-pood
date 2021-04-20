<?php
if (!isset($_SESSION)) {
    session_start();
}
include("partials/connect.php");

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

    $dataquery = "SELECT * FROM Companyinfo WHERE id='1'";

    $tulemuz = mysqli_query($connect, $dataquery);

    $andmed = mysqli_fetch_array($tulemuz);

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
    <!-- Ionicons -->
    <link rel="stylesheet" href="admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/AdminLTE.min.css">

    <!-- ============================================================================================= -->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <style>
        section.invoice {
            border: 1px solid #f4f4f4;
        }
    </style>
</head>

<body onload="window.print();">

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
                        <img src="images/icons/logo.png" width="80px" alt="IMG-LOGO">
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
                        <strong><?php echo $andmed['firmanimi']; ?></strong><br>
                        <?php echo $andmed['aadress']; ?><br>
                        <?php echo $andmed['regnr']; ?><br>
                        Telefon: <?php echo $andmed['telefon']; ?><br>
                        E-post: <?php echo $andmed['email']; ?>
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
                    <hr>
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
                    <hr>
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
                <div class="col-sm-6">
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Täname, et tellisite meie e-poest. Külastage meid jälle!
                    </p>
                </div>
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

</body>

</html>