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
                    <small>Kategooriad</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Kategooriad</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-3">
                        <a href="categories.php">
                            <button class="btn btn-success">Lisa kategooria</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box">
                                    <div class="box-header">
                                        <h3 class="box-title">Kategooriad</h3>
                                    </div>

                                    <?php
                                    //DB connection
                                    include('../partials/connect.php');

                                    $sql = "SELECT C.id, C.name, COUNT(S.category_id) AS toodete_arv
                                    FROM categories C
                                    LEFT JOIN products S ON C.id = S.category_id
                                    GROUP BY C.id";
                                    $results = $connect->query($sql);

                                    ?>
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>ID</th>
                                                <th>Kategooria</th>
                                                <th>Toodete arv</th>
                                            </tr>
                                            <?php
                                            while ($final = $results->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $final['id']; ?></td>
                                                    <td><?php echo $final['name']; ?></td>
                                                    <td><?php echo $final['toodete_arv']; ?></td>
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