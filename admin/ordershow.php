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
        $id = $_GET['order_id'];
        $sql = "SELECT * FROM Orders WHERE id='$id'";

        $results = $connect->query($sql);

        $final = $results->fetch_assoc(); //Get associative array of the query results (all records from db)

       

        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tellimus #<?php echo $final['id']; ?>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="orders.php"><i class="fa fa-dashboard"></i> Tellimused</a></li>
                    <li class="active">Tellimus #<?php echo $final['id']; ?></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <!-- <div class="wrap-table-shopping-cart">
                    <table class="">
                        <tr class="table_head">
                            <th class="column-1">Kliendi nr:</th>
                            <th class="column-2">Aadress</th>
                            <th class="column-3">Telefon</th>
                            <th class="column-4">Makstud summa</th>
                            <th class="column-5">Maksemeetod</th>
                        </tr>
                        <tr class="table_row">
                            <td class="column-1"><?php //echo $final['customer_id']; 
                                                    ?></td>
                            <td class="column-2"><?php //echo $final['address']; 
                                                    ?></td>
                            <td class="column-3"><?php //echo $final['phone']; 
                                                    ?></td>
                            <td class="column-4"><?php //echo $final['total']; 
                                                    ?></td>
                            <td class="column-5"><?php //echo $final['payment_method']; 
                                                    ?></td>
                        </tr>
                    </table>
                </div> -->

                <div class="row">

                    <div class="col-sm-9">

                        <h4>Kliendi nr:</h4>
                        <p><?php echo $final['customer_id']; ?></p>
                        <hr>

                        <h4>Kliendi nimi:</h4>
                        <p><?php echo $final['nimi']; ?></p>
                        <hr>

                        <h4>Aadress: <?php echo $final['address']; ?></h4>
                        <hr>

                        <h4>Telefon: <?php echo $final['phone']; ?></h4>
                        <hr>

                        <h4>Makstud summa: <?php echo $final['total']; ?> €</h4>
                        <hr>

                        <h4>Maksemeetod: <?php echo $final['payment_method']; ?></h4>
                        <hr>

                        

                    </div>

                    <div class="col-sm-9">

                        <?php

                        $sql2 = "SELECT * from order_details O, products P WHERE O.order_id='$id' AND O.product_id=P.id";
                        $results = mysqli_query($connect, $sql2);

                        $final = mysqli_fetch_array($results);

                        // print_r($final);
                        ?>

                        <h4> Toote ID : <?php echo $final['product_id']; ?> </h4>
                        <hr>

                        <h4> Toote nimi : <?php echo $final['name']; ?> </h4>
                        <hr>

                        <h4> Kogus : <?php echo $final['quantity']; ?> </h4>
                        <hr>



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