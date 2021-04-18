<!-- Header -->
<!-- Header desktop -->
<div class="container-menu-desktop">
    <!-- Topbar -->
    <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
            <div class="left-top-bar">
                Tasuta transport tellimusel üle 50€
            </div>

            <div class="right-top-bar flex-w h-full">

                <?php if (!empty($_SESSION['email'])) { ?>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <?php echo $user['username']; ?>
                    </a>
                    <a href="handler/customerlogout.php" class="flex-c-m trans-04 p-lr-25">
                        Logi välja
                    </a>
                <?php } else { ?>
                    <a href="customerforms.php" class="flex-c-m trans-04 p-lr-25">
                        Logi sisse
                    </a>
                <?php }
                ?>
            </div>
        </div>
    </div>

    <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">

            <!-- Logo desktop -->
            <a href="index.php" class="logo" style="margin-right: 10px;">
                <img src="images/icons/logo.png" alt="IMG-LOGO">
            </a>

            <!-- Menu desktop -->
            <div class="menu-desktop">
                <ul class="main-menu">
                    <li class="active-menu">
                        <a href="index.php">Kodu</a>

                    </li>

                    <li>
                        <a href="product.php">Pood</a>
                    </li>

                    <li>
                        <a href="about.php">Meist</a>
                    </li>

                    <li>
                        <a href="contact.php">Kontakt</a>
                    </li>
                </ul>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m">
                <!-- OTSING -->

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search" title="Otsi"></i>
                </div>

                <?php
                if (!empty($_SESSION['cart'])) {
                    $qty = count($_SESSION['cart']);
                } else {
                    $qty = 0;
                }

                ?>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $qty; ?>">
                    <!-- onclick="location.href='cart.php'" -->
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>

                <!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
                        <i class="zmdi zmdi-favorite-outline"></i>
                    </a> -->
            </div>
        </nav>
    </div>
</div>

<!-- Header Mobile -->
<div class="wrap-header-mobile">
    <!-- Logo moblie -->
    <div class="logo-mobile">
        <a href="index.php"><img src="images/icons/logo.png" alt="IMG-LOGO"></a>
    </div>

    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <!-- Otsing -->
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>
        <!-- Ostukorv -->
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $qty; ?>">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>
        <!-- Sooviloend -->
        <!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
                <i class="zmdi zmdi-favorite-outline"></i>
            </a> -->
    </div>

    <!-- Button show menu -->
    <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </div>
</div>


<!-- Menu Mobile -->
<div class="menu-mobile">

    <ul class="main-menu-m">
        <li>
            <a href="index.php">Kodu</a>

        </li>

        <li>
            <a href="product.php">Pood</a>
        </li>

        <li>
            <a href="about.php">Meist</a>
        </li>

        <li>
            <a href="contact.php">Kontakt</a>
        </li>
    </ul>
</div>

<!-- Modal Search -->
<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
    <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
            <img src="images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form action="search.php" method="POST" class="wrap-search-header flex-w p-l-15">
            <button name="submit" class="flex-c-m trans-04">
                <i class="zmdi zmdi-search"></i>
            </button>
            <input class="plh3" type="text" name="search" placeholder="Otsi toodet...">
        </form>
    </div>
</div>