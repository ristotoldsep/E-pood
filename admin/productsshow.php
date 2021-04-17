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
                    Töölaud
                    <small>Tooted</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Tooted</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-12">

                        <a href="products.php">
                            <button class="btn btn-success">Lisa toode</button>
                            <hr>
                        </a>

                        <?php
                        //DB connection
                        include('../partials/connect.php');

                        // $sql = "SELECT * FROM Products";
                        $test = "SELECT P.id AS prod_id, P.name AS prod_name, P.price AS price, P.picture AS picture, P.description AS description, P.category_id AS cat_id, C.name AS cat_name FROM Products P, Categories C WHERE P.category_id=C.id";

                        $results = $connect->query($test);

                        ?>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Tooted</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pilt</th>
                                            <th>Nimi</th>
                                            <th>Hind</th>
                                            <th>Kirjeldus</th>
                                            <th>Kategooria</th>
                                            <th>Tegevused</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // Väljastab loopis andmebaasiread

                                        while ($row = $results->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $row['prod_id']; ?></td>
                                                <td>
                                                    <a href="proshow.php?pro_id=<?php echo $row['prod_id']; ?>">
                                                        <img src="../<?php echo $row['picture']; ?>" alt="product_image" style="heigth:50px; width:50px;">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="proshow.php?pro_id=<?php echo $row['prod_id']; ?>">
                                                        <?php echo $row['prod_name']; ?>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['price']; ?>€</td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['cat_name']; ?></td>
                                                <td><a href="proupdate.php?up_id=<?php echo $row['prod_id']; ?>">
                                                        <button class="btn btn-yahoo">Muuda</button>
                                                    </a>

                                                    <a href="prodelete.php?del_id=<?php echo $row['prod_id']; ?>">
                                                        <button class="btn btn-danger">Kustuta</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>

                            </div>
                            <!-- /.box-body -->
                        </div>

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