<!DOCTYPE html>
<html>
<?php
//Session for login - User data will be saved in session (logged in users can use this page)
include("adminpartials/session.php");
//Head
include("adminpartials/head.php");

//DB connection
include('../partials/connect.php');

//Connected with productsshow.php
$id = $_GET['pro_id'];
$sql = "SELECT * FROM Products WHERE id='$id'";

$results = $connect->query($sql);

$final = $results->fetch_assoc(); //Get associative array of the query results (all records from db)

?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        //Header
        include("adminpartials/header.php");

        //Left side column. contains the logo and sidebar
        include("adminpartials/aside.php");
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Töölaud
                    <small><?php echo $final['name']; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active"><?php echo $final['name']; ?></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-9">

                        <h3>Nimi:</h3> <p><?php echo $final['name']; ?></p>
                        <hr><br>

                        <h3>Hind:</h3> <p><?php echo $final['price']; ?>€</p>
                        <hr><br>

                        <h3>Tootekirjeldus:</h3> <p><?php echo $final['description']; ?></p>
                        <hr><br>
                        
                        <h4>Pilt</h4>
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