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

                    </div>
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form role="form" action="cathandler.php" method="POST">
                            <h1>Lisa kategooria</h1>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="category">Kategooria</label>
                                    <input type="text" class="form-control" id="category" name="name" placeholder="Sisesta kategooria nimi">
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Lisa</button>
                            </div>
                        </form>
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