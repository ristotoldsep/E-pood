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
                    <small>Uudiskirjaga liitunud</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                    <li class="active">Uudiskiri</li>
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

                    <div class="col-sm-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Uudiskirjaga liitunud kliendid</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Liitus</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        // Väljastab loopis andmebaasiread

                                        while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['email']; ?>
                                                </td>
                                                <td><?php echo $row['created_at']; ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>

                                <a title="Võimalik kasutada näiteks MailChimpis" href="../handler/emailid.txt" download><i class="fa fa-download" aria-hidden="true"></i>
                                    Ekspordi .txt fail kõikide e-mailidega</a>
                            </div>
                            <!-- /.box-body -->
                        </div>
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