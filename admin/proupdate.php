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
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <!-- form start -->
                        <form role="form" action="proupdatehandler.php" method="POST" enctype="multipart/form-data">
                            <?php
                            include('../partials/connect.php');

                            $newid = $_GET['up_id'];

                            $sql = "SELECT * FROM Products WHERE id='$newid'";

                            $results = $connect->query($sql);

                            $final = $results->fetch_assoc();

                            ?>

                            <h1>Products</h1>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name" value="<?php echo $final['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="<?php echo $final['price']; ?>">
                                </div>
                                <img src="../<?php echo $final['picture']; ?>" alt="image" style="width:200px;height:200px;">
                                <div class="form-group">
                                    <label for="picture">Image</label>
                                    <input type="file" id="picture" name="file" value="<?php echo $final['picture']; ?>" </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea id="description" class="form-control" rows="5" placeholder="Describe your product.." name="description"><?php echo $final['description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" name="category" value="<?php echo $final['category']; ?>">
                                            <?php

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
                                    <!-- TO ACTUALLY UPDATE THE RIGHT PRODUCT IN DB -->
                                    <input type="hidden" value="<?php echo $final['id']; ?>" name="form_id">

                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
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