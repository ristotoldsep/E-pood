<!DOCTYPE html>
<html lang="en">

<!-- Head template -->
<?php

	if (!isset($_SESSION)) {
		session_start();
	} 
	
//If not logged in, redirect to login page
include ("./handler/customersession.php");

include ("partials/head.php");

?>

<body class="animsition">

	<?php

	//Header template
	include ("partials/header.php");

	?>


	<!-- breadcrumb -->
	<!-- <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shopping Cart
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
									<th class="column-1">Product</th>
									<th class="column-5">Name</th>
									<th class="column-3">Price</th>
									<th class="column-5">Quantity</th>
									<th class="column-5"></th>
									<th class="column-3">Total</th>
									<th class="column-4"></th>
								</tr>
								<?php
								
								$total = 0; //For calculating the total sum of cart products

								if (isset($_SESSION['cart'])) {

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
												<button class="btn btn-sm btn-outline-success" name="update"><i class="zmdi zmdi-check"></i></button>
												<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>"> <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
												</form>
											</td>
											<td class="column-3"><?php echo $value['item_price'] * $value['quantity']; //QUANTITY * PRICE 
																	?> €</td>
											<td class="column-3">
												<form action="cartremove.php" method="POST">
													<button class="btn btn-sm btn-outline-danger" name="remove"><i class="zmdi zmdi-delete"></i></button>
													<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>"> <!-- TO TELL BACK END WHICH PRODUCT TO REMOVE -->
												</form>
											</td>
										</tr>
								<?php
									}
								}
								?>

							</table>
						</div>

						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<!-- <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								Update Cart
							</div> -->
						</div>
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
									Kokku:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $total; ?> €
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Transport:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Saadame kõikjale üle Eesti pakiautomaatide kaudu.
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Kliendi andmed
									</span>

									<form action="handler/orderhandler.php" method="POST">
										<div class="bor8 bg0 m-b-12">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="Aadress" name="address">
										</div>

										<div class="bor8 bg0 m-b-22">
											<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="Telefoninumber" name="phone">
										</div>
										<span class="stext-112 cl8">
											Makseviis
										</span>
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<select class="js-select2" name="payment_method">
												<option value="bank_transfer">Pangaülekanne</option>
												<option value="paypal">PayPal</option>
											</select>
											<div class="dropDownSelect2"></div>
										</div>

										<!-- <div class="flex-w">
											<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
												Update Totals
											</div>
										</div> -->

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Kokku:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $total; ?> €
								</span>
							</div>
						</div>
						<input type="hidden" name="total" value="<?php echo $total; ?>">
						<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="placeorder">
							Esita tellimus
						</button>
						</form>
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