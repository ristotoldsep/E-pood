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
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">

                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Tellimused</h3>
                                    </div>

                                    <?php
                                    //DB connection
                                    include('../partials/connect.php');

                                    $sql = "SELECT * FROM Orders";
                                    $results = $connect->query($sql);

                                    ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Tellimus</th>
                                                <th>Postitatud</th>
                                                <th class="column-3">Tegevus</th>
                                            </tr>
                                            <?php
                                            while ($final = $results->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $final['id']; ?></td>
                                                    <td><a href="ordershow.php?order_id=<?php echo $final['id']; ?>">

                                                            <h4>Tellimus #<?php echo $final['id']; ?></h4>

                                                        </a></td>
                                                    <td><?php echo $final['created_at']; ?></td>
                                                    <td><a href="orderdelete.php?del_id=<?php echo $final['id']; ?>">
                                                            <button class="btn btn-danger">Kustuta</button>
                                                        </a><a href="../arve.php?order_id=<?php echo $final['id']; ?>">
                                                            <button class="btn btn-success">Arve</button>
                                                        </a></td>
                                                </tr>

                                            <?php } ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-sm-1">

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