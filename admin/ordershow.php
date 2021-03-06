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

                <div class="row">
                    <div class="col-sm-9">




                        <h3>Name: <?php echo $final['name']; ?></h3>
                        <hr><br>

                        <h3>Price: <?php echo $final['price']; ?></h3>
                        <hr><br>

                        <h3>Description: <?php echo $final['description']; ?></h3>
                        <hr><br>

                        <img src="../<?php echo $final['picture']; ?>" alt="product_image" style="height:300px; width:300px;">





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