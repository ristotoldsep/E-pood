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


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Tellimused
                    <small>Töölaud</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Tellimused</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-9">

                        <?php
                        //DB connection
                        include('../partials/connect.php');

                        $sql = "SELECT * FROM Orders";
                        $results = $connect->query($sql);

                        while ($final = $results->fetch_assoc()) { ?>

                            <a href="ordershow.php?order_id=<?php echo $final['id']; ?>">
                                <!-- <img src="../<?php echo $final['picture']; ?>" alt="product_image" style="heigth:70px; width:70px;"> -->
                                <small><?php echo $final['created_at']; ?></small>
                                <h3>Tellimus #<?php echo $final['id']; ?></h3>
                                <br>
                            </a>

                            <!-- <a href="proupdate.php?up_id=<?php echo $final['id']; ?>">
                                <button>Uuenda</button>
                            </a> -->

                            <a href="orderdelete.php?del_id=<?php echo $final['id']; ?>">
                                <button style="background:red; color:white;">Kustuta</button>
                            </a>
                            <hr>

                        <?php }
                        ?>




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