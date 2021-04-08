<!DOCTYPE html>
<html>
<?php
//Session for login - User data will be saved in session (logged in users can use this page)
include("adminpartials/session.php");
//Head
include("adminpartials/head.php");

include('../partials/connect.php');

$newid = $_GET['up_id'];

$sql = "SELECT * FROM Products WHERE id='$newid'";

$results = $connect->query($sql);

$final = $results->fetch_assoc();

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
                    <small>Muuda toodet</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Muuda toodet</li>
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
                        <form role="form" action="proupdatehandler.php" method="POST" enctype="multipart/form-data">

                            <h4>Muuda toodet "<?php echo $final['name']; ?>"</h4>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Nimi</label>
                                    <input type="text" class="form-control" id="name" placeholder="Sisesta toote nimi" name="name" value="<?php echo $final['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="price">Hind</label>
                                    <input type="text" class="form-control" id="price" placeholder="Hind" name="price" value="<?php echo $final['price']; ?>">
                                </div>
                                <img src="../<?php echo $final['picture']; ?>" alt="image" style="width:200px;height:200px;">
                                <div class="form-group">
                                    <label for="picture">Pilt</label>
                                    <input type="file" id="picture" name="file" value="<?php echo $final['picture']; ?>" </div>
                                    <div class="form-group">
                                        <label for="description">Tootekirjeldus</label>
                                        <textarea id="description" class="form-control" rows="5" placeholder="Describe your product.." name="description"><?php echo $final['description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Kategooria</label>
                                        <select id="category" name="category" value="<?php echo $final['category']; ?>">
                                            <?php

                                            $cat = "SELECT * FROM categories";
                                            $results = mysqli_query($connect, $cat);
                                            //Looping over categories in DB and echoing out
                                            while ($row = mysqli_fetch_assoc($results)) {
                                                
                                                if ($row['id'] == $final['category_id']) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
                                                }
                                                
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <!-- TO ACTUALLY UPDATE THE RIGHT PRODUCT IN DB -->
                                    <input type="hidden" value="<?php echo $final['id']; ?>" name="form_id">

                                    <button type="submit" class="btn btn-primary" name="update">Uuenda</button>
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