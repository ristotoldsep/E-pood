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

          <div class="col-sm-9">
            <a href="products.php">
              <button class="btn btn-success">Lisa uus toode +</button>
            </a>
            <hr>
            <a href="categories.php">
              <button class="btn btn-primary">Lisa uus kategooria +</button>
            </a>
            <hr>
            <a href="orders.php">
              <button class="btn btn-warning">Vaata tellimusi</button>
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