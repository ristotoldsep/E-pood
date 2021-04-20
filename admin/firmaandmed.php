<!DOCTYPE html>
<html>
<?php
//Session for login - User data will be saved in session (logged in users can use this page)
include("adminpartials/session.php");
//Head
include("adminpartials/head.php");

include('../partials/connect.php');

//Küsi andmebaasist kõik firma andmed
$id = 1;

$sql = "SELECT * FROM Companyinfo WHERE id='$id'";

$tulemus = $connect->query($sql);

$andmed = $tulemus->fetch_assoc();

// Kui andmeid uuendatakse
if (isset($_POST['update'])) { //If update button (name="update") is clicked, update data in DB

    $newid = $_POST['form_id'];
    $email = $_POST['email'];
    $aadress = $_POST['aadress'];
    $firmanimi = $_POST['firmanimi'];
    $regnr = $_POST['regnr'];
    $reklaam = $_POST['reklaam'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $logourl = $_POST['logourl'];
    $telefon = $_POST['telefon'];
    $kontonimi = $_POST['kontonimi'];
    $kontonumber = $_POST['kontonumber'];
    $pank = $_POST['pank'];

    /* //Logofaili üleslaadimine...
    $target = "uploads/";
    //$file_path = $target . basename($_FILES['file']['name']);
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name']; //Temporary file name
    $file_store = "../uploads/" . $file_name;

    move_uploaded_file($file_tmp, $file_store); */

    /* $sql1 = "SELECT * FROM Products WHERE id='$newid'";

    $results = $connect->query($sql1);

    $final = $results->fetch_assoc();

    $oldimage = $final['picture'];

    //ADDED CODE SO IF USER UPDATED PRODUCT & DID NOT CHANGE IMAGE, IT WOULD NOT CLEAR IT IN DB
    if (basename($_FILES['file']['name']) !== "") {
        $file_path = $target . basename($_FILES['file']['name']);
    } else {
        $file_path = $oldimage;
    } */

    $sql2 = "UPDATE Companyinfo SET email='$email', aadress='$aadress', firmanimi='$firmanimi', regnr='$regnr', reklaam='$reklaam', facebook='$facebook', instagram='$instagram', logourl='$logourl', telefon='$telefon', kontonimi='$kontonimi', kontonumber='$kontonumber', pank='$pank' WHERE id='$newid'";

    if (mysqli_query($connect, $sql2)) {

        echo "<script>alert('Andmed on uuendatud!');</script>";

        header('location: firmaandmed.php');
    } else {
        header('location: adminindex.php');
    }
}

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
                    <small>Muuda poe andmeid</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="adminindex.php"><i class="fa fa-dashboard"></i> Töölaud</a></li>
                    <li class="active">Muuda poe andmeid</li>
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
                        <form role="form" action="firmaandmed.php" method="POST" enctype="multipart/form-data">

                            <!-- Input addon -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Muuda poe andmeid</h3>
                                </div>
                                <div class="box-body">

                                    <p>Email</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $andmed['email']; ?>">
                                    </div>
                                    <br>
                                    <p>Firma nimi</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-id-card-o"></i></span>
                                        <input type="text" class="form-control" placeholder="Firma nimi" name="firmanimi" value="<?php echo $andmed['firmanimi']; ?>">
                                    </div>
                                    <br>
                                    <p>Aadress</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-location-arrow"></i></span>
                                        <input type="text" class="form-control" placeholder="Aadress" name="aadress" value="<?php echo $andmed['aadress']; ?>">
                                    </div>
                                    <br>
                                    <p>Reg. nr</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-building-o"></i></span>
                                        <input type="text" class="form-control" placeholder="Reg. nr" name="regnr" value="<?php echo $andmed['regnr']; ?>">
                                    </div>
                                    <br>
                                    <p>Poe logo URL (võib võtta ka internetist)</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-globe"></i></span>
                                        <input type="text" class="form-control" placeholder="Poe logo URL" name="logourl" value="<?php echo $andmed['logourl']; ?>">
                                    </div>
                                    <br>
                                    <p>Telefon</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-phone"></i></span>
                                        <input type="text" class="form-control" placeholder="Telefon" name="telefon" value="<?php echo $andmed['telefon']; ?>">
                                    </div>
                                    <br>
                                    <p>Reklaamlause</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-commenting-o"></i></span>
                                        <input type="text" class="form-control" placeholder="Reklaamlause" name="reklaam" value="<?php echo $andmed['reklaam']; ?>">
                                    </div>
                                    <br>
                                    <p>Facebook</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-facebook-square"></i></span>
                                        <input type="text" class="form-control" placeholder="Facebook URL" name="facebook" value="<?php echo $andmed['facebook']; ?>">
                                    </div>
                                    <br>
                                    <p>Instagram</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa  fa-instagram"></i></span>
                                        <input type="text" class="form-control" placeholder="Instagram URL" name="instagram" value="<?php echo $andmed['instagram']; ?>">
                                    </div>
                                    <br>
                                    <hr>
                                    <p>Pangakonto omaniku nimi</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                        <input type="text" class="form-control" placeholder="Pangakonto omanik" name="kontonimi" value="<?php echo $andmed['kontonimi']; ?>">
                                    </div>
                                    <br>
                                    <p>Kontonumber</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                                        <input type="text" class="form-control" placeholder="Kontonumber" name="kontonumber" value="<?php echo $andmed['kontonumber']; ?>">
                                    </div>
                                    <br>
                                    <p>Pank</p>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <input type="text" class="form-control" placeholder="Pank" name="pank" value="<?php echo $andmed['pank']; ?>">
                                    </div>
                                    <br>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer text-center">
                                    <!-- TO ACTUALLY UPDATE THE RIGHT PRODUCT IN DB -->
                                    <input type="hidden" value="<?php echo $id; ?>" name="form_id">

                                    <button type="submit" class="btn btn-primary" name="update">Uuenda</button>
                                </div>

                            </div>
                            <!-- /.box -->

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