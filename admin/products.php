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
                    <small>Lisa toode</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Lisa toode</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->

                <div class="row">
                    <div class="col-sm-3">
                        <a href="productsshow.php">
                            <button class="btn btn-primary">Tagasi</button>
                        </a>
                    </div>
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form role="form" action="producthandler.php" method="POST" enctype="multipart/form-data">
                            <h1>Lisa toode</h1>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Nimi</label>
                                    <input type="text" class="form-control" id="name" placeholder="Sisesta toote nimi" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Hind</label>
                                    <input type="text" class="form-control" id="price" placeholder="Hind" name="price">
                                </div>
                                <div class="form-group">
                                    <label for="picture">Pilt</label>
                                    <input type="file" id="picture" name="file">
                                </div>
                                <div class="form-group">
                                    <label for="description">Tootekirjeldus</label>
                                    <textarea id="description" class="form-control" rows="5" placeholder="Kirjeldage toodet..." name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="category">Kategooria</label>
                                    <select id="category" name="category">
                                        <?php
                                        include("../partials/connect.php"); //To access $connect object

                                        $cat = "SELECT * FROM categories";
                                        $results = mysqli_query($connect, $cat);
                                        //Looping over categories in DB and echoing out
                                        while ($row = mysqli_fetch_assoc($results)) {
                                            echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Sisesta</button>
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