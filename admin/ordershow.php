<!DOCTYPE html>
<html>
<?php
//Session for login - User data will be saved in session (logged in users can use this page)
include("adminpartials/session.php");
//Head
include("adminpartials/head.php");
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        //Header
        include("adminpartials/header.php");

        //Left side column. contains the logo and sidebar
        include("adminpartials/aside.php");
        ?>

        <?php
        //DB connection
        include('../partials/connect.php');

        //Connected with productsshow.php
        /*  $id = $_GET['order_id'];
        $sql = "SELECT O.*, C.username FROM Orders O INNER JOIN Customers C ON O.customer_id=C.id WHERE O.id='$id'";

        $results = $connect->query($sql);

        $final = $results->fetch_assoc(); //Get associative array of the query results (all records from db) */

        $order_id = $_GET['order_id'];

        $shipping = 3;

        //==============================

        $sql = "SELECT O.*, C.username FROM Orders O INNER JOIN Customers C ON O.customer_id=C.id WHERE O.id='$order_id'";

        $result = mysqli_query($connect, $sql);

        $tellimus = mysqli_fetch_array($result); //Tellimuse rida

        //==============================

        $sql2 = "SELECT order_id, product_id, quantity, P.name AS prod_name, P.price, P.picture, P.description, C.name AS cat_name FROM order_details O INNER JOIN products P ON O.product_id=P.id INNER JOIN categories C ON category_id=C.id WHERE O.order_id=$order_id";

        $result2 = mysqli_query($connect, $sql2);


        //==============================
        //Firma andmed
        $dataquery = "SELECT * FROM Companyinfo WHERE id='1'";

        $tulemuz = mysqli_query($connect, $dataquery);

        $andmed = mysqli_fetch_array($tulemuz);

        

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tellimus #<?php echo $order_id; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="orders.php"><i class="fa fa-dashboard"></i> Tellimused</a></li>
                    <li class="active">Tellimus #<?php echo $order_id; ?></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                
                <div class="row">

                    <!-- <div class="col-sm-9">

                        <h4>Kliendi nr:</h4>
                        <p><?php //echo $final['customer_id']; ?></p>
                        <hr>

                        <h4>Kliendi email:</h4>
                        <p><?php //echo $final['username']; ?></p>
                        <hr>

                        <h4>Kliendi nimi:</h4>
                        <p><?php //echo $final['nimi']; ?></p>
                        <hr>

                        <h4>Pakiautomaat: <?php //echo $final['pakiautomaat']; ?></h4>
                        <hr>

                        <h4>Telefon: <?php //echo $final['phone']; ?></h4>
                        <hr>

                        <h4>Makstud summa: <?php //echo $final['total']; ?> €</h4>
                        <hr>

                        <h4>Maksemeetod: <?php //echo $final['payment_method']; ?></h4>
                        <hr>


                    </div> -->

                    <!-- <div class="col-sm-9">

                        <?php

                       /*  $sql2 = "SELECT * from order_details O, products P WHERE O.order_id='$id' AND O.product_id=P.id";
                        $results = mysqli_query($connect, $sql2);

                        $final = mysqli_fetch_array($results); */

                        // print_r($final);
                        ?>

                        <h4> Toote ID : <?php //echo $final['product_id']; ?> </h4>
                        <hr>

                        <h4> Toote nimi : <?php //echo $final['name']; ?> </h4>
                        <hr>

                        <h4> Kogus : <?php //echo $final['quantity']; ?> </h4>
                        <hr>



                    </div> -->

                    <div class="container">
                        <!-- Content Wrapper. Contains page content -->
                        <!-- Content Header (Page header) -->
                      

                        <!-- Main content -->
                        <section class="invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <h2 class="page-header">
                                        <img src="../images/icons/logo.png" width="80px" alt="IMG-LOGO">
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
                                        echo '<img width="30px" src="dist/img/credit/paypal2.png" alt="Paypal">';
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
                                                    <td><img src="../<?php echo $tooteandmed['picture']; ?>" width="40px" alt="<?php echo $tooteandmed['prod_name']; ?>"></td>
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
                                        <hr>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6">
                                    <!-- <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        Täname, et tellisite meie e-poest. Külastage meid jälle!
                                    </p><br> -->
                                </div>
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-xs-12">
                                    <a href="../arve-prindi.php?order_id=<?php echo $order_id ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Prindi</a>
                                </div>
                            </div>
                        </section>
                        <!-- /.content -->
                        <div class="clearfix"></div>

                    </div>

                    <div class="col-sm-3">

                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php

        //Footer
        include("adminpartials/footer.php");

        ?>

</body>

</html>