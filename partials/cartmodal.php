<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Sinu ostukorv
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <!-- TOOTED OSTUKORVIS -->
            <ul class="header-cart-wrapitem w-full">
                <?php
                $total = 0; //Kogusumma arvutamiseks

                if (isset($_SESSION['cart'])) {

                    $qty = count($_SESSION['cart']);

                    if ($qty == 0) { ?>
                        <li class="header-cart-item flex-w flex-t m-b-12">
                            Ostukorv on tühi!
                        </li>
                    <?php }

                    // print_r($_SESSION['cart']);
                    //Kui ei ole tühi, väljasta loopis ostukorvi tooted
                    // $i = 0; 
                    foreach ($_SESSION['cart'] as $key => $value) {

                        $total += $value['item_price'] * $value['quantity']; //Kogusumma liita tooted ja korrutada kogusega
                    ?>
                        <li class="header-cart-item flex-w flex-t m-b-12">

                            <!-- <form id="eemalda" name="eemalda" action="cartremove.php" method="POST"> -->
                            <div title="Eemalda" class="header-cart-item-img" onclick="document.forms['eemalda'].submit();">
                                <!-- Pildile vajutades eemaldab toote korvist -->
                                <!-- <button name="remove"> --><img title="Eemalda" src="./<?php echo $value['item_picture']; ?>" alt="IMG"><!-- </button> -->

                                <!-- <input type="hidden" name="item_name" value="<?php //echo $value['item_name']; 
                                                                                    ?>">  -->
                                <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
                            </div>
                            <!-- </form> -->

                            <div class="header-cart-item-txt p-t-8">
                                <div style="display:flex; justify-content: space-between;">
                                    <a href="details.php?details_id=<?php echo $value['item_id']; ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        <?php echo $value['item_name']; ?>
                                    </a>
                                    <form style="margin-left:40px;" action="cartremove.php" method="POST">
                                        <button title="Kustuta" class="btn btn-sm btn-outline-danger" name="remove"><i class="zmdi zmdi-delete"></i></button>
                                        <input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>"> <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
                                    </form>
                                </div>
                                <span class="header-cart-item-info">
                                    <?php echo $value['quantity']; ?> x <?php echo $value['item_price']; ?>€
                                </span>

                            </div>
                        </li>

                    <?php
                        //Et ei laseks kujundusel katki minna kui liiga palju tooteid korvis
                        /* $i++;
                        echo $i;
                        if ($qty > 6) {
                            break;
                        } */
                    }
                } else { ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        Ostukorv on tühi!
                    </li>
                <?php }
                ?>

            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Kokku: <?php echo $total; ?>€
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Vaata ostukorvi
                    </a>

                    <!-- <a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Liigu kassasse
                    </a> -->
                </div>
            </div>
        </div>
    </div>
</div>