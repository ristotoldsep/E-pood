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
                    <small>Kliendid</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Kliendid</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Kliendid</h3>
                                    </div>

                                    <?php
                                    //DB connection
                                    include('../partials/connect.php');

                                    $sql = "SELECT C.*, COUNT(O.customer_id) AS tellimuste_arv
                                    FROM Customers C
                                    LEFT JOIN Orders O ON C.id = O.customer_id
                                    GROUP BY C.id";
                                    $results = $connect->query($sql);

                                    ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Email</th>
                                                <th>Liitus</th>
                                                <th>Tellimusi</th>
                                            </tr>
                                            <?php
                                            while ($final = $results->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $final['id']; ?></td>
                                                    <td><?php echo $final['username']; ?></td>
                                                    <td><?php echo $final['created_at']; ?></td>
                                                    <td><?php echo $final['tellimuste_arv']; ?></td>
                                                </tr>

                                            <?php } ?>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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