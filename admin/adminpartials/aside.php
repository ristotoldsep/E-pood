<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/profile_pic.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $_SESSION['email']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÜÜ</li>

            <li>
                <a href="adminindex.php">
                    <i class="fa fa-th"></i> <span>Töölaud</span>
                </a>
            </li>
            <li>
                <a href="productsshow.php">
                    <i class="fa fa-shopping-bag"></i> <span>Tooted</span>
                </a>
            </li>
            <li>
                <a href="orders.php">
                    <i class="fa fa-shopping-basket"></i> <span>Tellimused</span>
                </a>
            </li>
            <li>
                <a href="teated.php">
                    <i class="fa fa-bell-o"></i> <span>Teated</span>
                </a>
            </li>

            <li class="treeview">
                <a href="newsletter.php">
                    <i class="fa  fa-bookmark-o"></i> <span>Kategooriad</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="categorieslist.php"><i class="fa fa-bookmark"></i> Vaata kategooriaid</a></li>
                    <li><a href="categories.php"><i class="fa fa-plus-square"></i> Lisa kategooria</a></li>
                </ul>
            </li>
            <li>
                <a href="kliendid.php">
                    <i class="fa fa-users"></i> <span>Kliendid</span>
                </a>
            </li>
            <li class="treeview">
                <a href="newsletter.php">
                    <i class="fa fa-envelope-o"></i> <span>Uudiskiri</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="newsletter.php"><i class="fa fa-address-book"></i> Liitunud kliendid</a></li>
                    <li><a href="newslettersend.php"><i class="fa fa-share"></i> Saada uudiskiri</a></li>
                </ul>
            </li>
            <li>
                <a href="firmaandmed.php">
                    <i class="fa  fa-building"></i> <span>Poe andmed</span>
                </a>
            </li>
            <li>
                <a href="adminpartials/logout.php">
                    <i class="fa fa-sign-out"></i> <span>Logi välja</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>