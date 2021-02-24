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
              <button style="color:green;">Add new product</button>
            </a>
            <hr>
            <a href="categories.php">
              <button style="color:blue;">Add new categories</button>
            </a>
            <hr>
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