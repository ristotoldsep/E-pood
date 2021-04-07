<?php
if (!isset($_SESSION)) {
	session_start();
}
include("partials/connect.php");

//Kui kasutaja on sisse logitud, määra sessioonimuutuja
if (isset($_SESSION['email'])) {
	$userLoggedIn = $_SESSION['email']; //Email of user

	//Get user details from db
	$user_details_query = mysqli_query($connect, "SELECT * FROM customers WHERE username='$userLoggedIn'");

	$user = mysqli_fetch_array($user_details_query); //return array from db (info about the logged in user)
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Ostukorv</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body class="animsition">

	<header class="header-v4">
		<?php

		//Header template
		include("partials/header.php");

		?>
	</header>

	<?php include("partials/cartmodal.php"); ?>

	<!-- breadcrumb -->
	<!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div> -->

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Toode</th>
									<th class="column-5">Nimi</th>
									<th class="column-3">Hind</th>
									<th class="column-5">Kogus</th>
									<th class="column-5"></th>
									<th class="column-3">Kokku</th>
									<th class="column-4"></th>
								</tr>
								<?php

								$total = 0; //For calculating the total sum of cart products

								if (isset($_SESSION['cart'])) {

									$qty = count($_SESSION['cart']);

									// Kui ostukorv on tühi = teavita kasutajat
									if ($qty == 0) { ?>

										<tr class="table_row">
											<td class="column-1">

												<span class="stext-110 cl2">
													Ostukorv on tühi!
												</span>

											</td>
											<td class="column-5">
											<td class="column-3">
											<td class="column-5">
											<td class="column-5">
											<td class="column-3">
											<td class="column-4">
										</tr>

									<?php }

									// Kui ei ole väljasta loopis ostukorvi tooted
									foreach ($_SESSION['cart'] as $key => $value) {

										$total += $value['item_price'] * $value['quantity'];

									?>

										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<img src="./<?php echo $value['item_picture']; ?>" alt="IMG">
												</div>
											</td>
											<td class="column-2"><?php echo $value['item_name']; ?></td>
											<td class="column-3"><?php echo $value['item_price']; ?> €</td>
											<td class="column-4">

												<form action="cartupdate.php" method="POST">
													<div class="wrap-num-product flex-w m-l-auto m-r-0">
														<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-minus"></i>
														</div>

														<input name="quantity" class="mtext-104 cl3 txt-center num-product" type="number" value="<?php echo $value['quantity']; ?>">

														<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
															<i class="fs-16 zmdi zmdi-plus"></i>
														</div>
													</div>
											</td>
											<td class="column-5">
												<button title="Uuenda" data-tooltip="Uuenda" class="btn btn-sm btn-outline-success" name="update"><i class="zmdi zmdi-check"></i></button>
												<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>"> <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
												</form>
											</td>
											<td class="column-3"><?php echo $value['item_price'] * $value['quantity']; //QUANTITY * PRICE 
																	?> €</td>
											<td class="column-3">
												<form action="cartremove.php" method="POST">
													<button title="Kustuta" class="btn btn-sm btn-outline-danger" name="remove"><i class="zmdi zmdi-delete"></i></button>
													<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>"> <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
												</form>
											</td>
										</tr>
									<?php
									} //Loopi lõpp 
								} else { ?>
									<tr class="table_row">
										<td class="column-1">

											<span class="stext-110 cl2">
												Ostukorv on tühi!
											</span>

										</td>
										<td class="column-5">
										<td class="column-3">
										<td class="column-5">
										<td class="column-5">
										<td class="column-3">
										<td class="column-4">
									</tr>
								<?php }
								?>

							</table>
						</div>

						<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div> 
						</div> -->
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Ostukorv kokku
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Kogusumma:
								</span>
							</div>

							<div class="size-209" style="text-align:center;">
								<span class="mtext-110 cl2">
									<?php echo $total; ?> €
								</span>
							</div>
						</div>


						<button onclick="location.href='cart2.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Suundu kassasse
						</button>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Footer -->
	<?php

	//Footer template
	include("partials/footer.php");

	?>

</body>

</html>