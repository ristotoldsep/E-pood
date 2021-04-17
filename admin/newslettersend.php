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
                    <small>Töölaud</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                    <li class="active">Töölaud</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <?php

                    $query = "SELECT * FROM newsletter";
                    $result = mysqli_query($connect, $query);

                    ?>
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <div class="box box-primary">
                            <form role="form" action="newsletterhandler.php" method="POST" enctype="multipart/form-data">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Saada tellijatele uudiskiri</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <div class="form-group">
                                        <label for="pealkiri">Pealkiri:</label>
                                        <input id="pealkiri" name="pealkiri" class="form-control" placeholder="Pealkiri:">
                                    </div>
                                    <div class="form-group">
                                        <label for="sonum">Sõnum:</label>
                                        <textarea id="sonum" name="sonum" class="form-control" style="height: 200px" placeholder="Sõnum">
                                    </textarea>
                                    </div>
                                    <!-- <div class="form-group">
                                    <div class="btn btn-default btn-file">
                                        <i class="fa fa-paperclip"></i> Attachment
                                        <input type="file" name="attachment">
                                    </div>
                                    <p class="help-block">Max. 32MB</p>
                                </div> -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <div class="pull-right">

                                        <button type="submit" class="btn btn-primary" name="saada"><i class="fa fa-envelope-o"></i> Saada</button>
                                    </div>
                                </form> <!-- Formi lõpp -->
                                </div>
                                <!-- /.box-footer -->
                        </div>
                    </div>

                    <div class="col-sm-1"></div>
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