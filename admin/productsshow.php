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
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-9">

                        <a href="products.php">
                            <button style="color:green;">Add new</button><hr>
                        </a>
                        
                        <?php
                        //DB connection
                        include('../partials/connect.php');

                        $sql = "SELECT * FROM Products";
                        $results = $connect->query($sql);

                        while ($final = $results->fetch_assoc()) { ?>

                            <a href="proshow.php?pro_id=<?php echo $final['id']; ?>">
                                <img src="<?php echo $final['picture']; ?>" alt="product_image" style="heigth:70px; width:70px;">
                                <h3><?php echo $final['id']; ?>: <?php echo $final['name']; ?></h3>
                                <br>
                            </a>

                            <a href="proupdate.php?up_id=<?php echo $final['id']; ?>">
                                <button>Update</button>
                            </a>

                            <a href="prodelete.php?del_id=<?php echo $final['id']; ?>">
                                <button style="background:red; color:white;">Delete</button>
                            </a><hr>

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