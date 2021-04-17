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


    //DB connection
    include('../partials/connect.php');

    $sql = "SELECT * FROM Orders";
    $tellimusi = $connect->query($sql);

    $sql2 = "SELECT * FROM Products";
    $tooteid = $connect->query($sql2);

    $sql3 = "SELECT * FROM Categories";
    $kategooriaid = $connect->query($sql3);

    $sql4 = "SELECT * FROM Customers";
    $kliente = $connect->query($sql4);

    $sql5 = "SELECT * FROM Contact";
    $teateid = $connect->query($sql5);

    $sql6 = "SELECT * FROM Newsletter";
    $uudiskiri = $connect->query($sql6);

    $count1 = mysqli_num_rows($tellimusi);
    $count2 = mysqli_num_rows($tooteid);
    $count3 = mysqli_num_rows($kategooriaid);
    $count4 = mysqli_num_rows($kliente);
    $count5 = mysqli_num_rows($teateid);
    $count6 = mysqli_num_rows($uudiskiri);

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

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php echo $count1; ?></h3>

                <p>Tellimusi</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-cart"></i>
              </div>
              <a href="orders.php" class="small-box-footer">
                Vaata tellimusi <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3><?php echo $count2; ?></h3>

                <p>Tooteid</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-bag"></i>
              </div>
              <a href="productsshow.php" class="small-box-footer">
                Vaata tooteid <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $count3; ?></h3>

                <p>Kategooriaid</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="categorieslist.php" class="small-box-footer">
                Vaata kategooriaid <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php echo $count4; ?></h3>

                <p>Registreeritud kliente</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-blue">
              <div class="inner">
                <h3><?php echo $count5; ?></h3>

                <p>Teateid</p>
              </div>
              <div class="icon">
                <i class="fa fa-bell-o"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-orange">
              <div class="inner">
                <h3><?php echo $count6; ?></h3>

                <p>Uudiskirjaga liitunuid</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-sm-12">
            <hr>
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