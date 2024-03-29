<header class="main-header">
    <!-- Logo -->
    <a href="adminindex.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>E</b>-pood</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>E</b>-pood</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Ava/Sulge navigatsioon</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4 messages</li>
                        <li>
                            
                            <ul class="menu">
                                <li>
                                    
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            AdminLTE Design Team
                                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Developers
                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Sales Department
                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            Reviewers
                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li> -->
                <?php
                //DB connection
                include('../partials/connect.php');

                $sql = "SELECT C.*, DATEDIFF(CURRENT_TIMESTAMP, C.created_at) AS days FROM Contact C ORDER BY id DESC";
                $kontakt = $connect->query($sql);

                $sql2 = "SELECT O.*, DATEDIFF(CURRENT_TIMESTAMP, O.created_at) AS days FROM Orders O ORDER BY id DESC";
                $tellimus = $connect->query($sql2);

                $sql3 = "SELECT C.*, DATEDIFF(CURRENT_TIMESTAMP, C.created_at) AS days FROM Customers C ORDER BY id DESC";
                $klient = $connect->query($sql3);

                $count1 = mysqli_num_rows($kontakt);
                $count2 = mysqli_num_rows($tellimus);
                $count3 = mysqli_num_rows($klient);

                $count = $count1 + $count2 + $count3;

                ?>

                <!-- Notifications: style can be found in dropdown.less -->
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning"><?php echo $count; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Sul on <?php echo $count; ?> teavitust</li>
                        <li>

                            <ul class="menu">
                                <?php
                                while ($kontaktid = mysqli_fetch_array($kontakt)) { ?>
                                    <li>
                                        <a href="teated.php">
                                            <i class="fa fa-users text-aqua"></i> Teade <?php echo $kontaktid['email']; ?>-lt<br>
                                            <small><?php echo $kontaktid['days'] ?> päeva tagasi</small>
                                        </a>
                                    </li>
                                <?php }

                                while ($tellimused = mysqli_fetch_array($tellimus)) { ?>
                                    <li>
                                        <a href="orders.php">
                                            <i class="fa fa-shopping-basket text-red"></i> Uus tellimus #<?php echo $tellimused['id']; ?><br>
                                            <small><?php echo $tellimused['days'] ?> päeva tagasi</small>
                                        </a>
                                    </li>
                                <?php }
                                while ($kliendid = mysqli_fetch_array($klient)) { ?>
                                    <li>
                                        <a href="kliendid.php">
                                            <i class="fa fa-users text-green"></i> Liitus klient <?php echo $kliendid['username'] ?><br>
                                            <small><?php echo $kliendid['days'] ?> päeva tagasi</small>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">Vaata kõiki</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="dist/img/profile_pic.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?php echo $_SESSION['email']; ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="dist/img/profile_pic.jpg" class="img-circle" alt="User Image">

                            <p>
                                <?php echo $_SESSION['email']; ?>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">Friends</a>
                                </div>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-right">
                                <a href="adminpartials/logout.php" class="btn btn-default btn-flat">Logi välja</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!--  <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>