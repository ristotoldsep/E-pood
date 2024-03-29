<?php
if (!isset($_SESSION)) {
	session_start();
}

//Kui pole sisse logitud, suuna sisselogimislehele
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
	echo "<script> 

	window.location.href='customerforms.php';
	
	</script>";
}

//Kui pole sisse logitud, suuna sisselogimislehele
if (isset($_SESSION['cart'])) {

	$quaty = count($_SESSION['cart']);

	if ($quaty == 0) {
		echo "<script>
		window.location.href='cart.php';
		</script>";
	}
} else {
	echo "<script>
		window.location.href='cart.php';
		</script>";
}

/* if (empty($_SESSION['username'] AND $_SESSION['password'])) {
	echo "<script> alert('Please Log In');
		//window.location.href='customerforms.php';
		</script>";
} */

include("partials/connect.php");

//Kui kasutaja on sisse logitud, määra sessioonimuutuja
if (isset($_SESSION['email'])) {
	$userLoggedIn = $_SESSION['email']; //Email of user

	//Get user details from db
	$user_details_query = mysqli_query($connect, "SELECT * FROM customers WHERE username='$userLoggedIn'");

	$admin_query = mysqli_query($connect, "SELECT * FROM admins WHERE username='$userLoggedIn'");

	//Kontrolli kas sisselogitud kasutaja on admin
	if (mysqli_num_rows($admin_query) == 0) {
		$user = mysqli_fetch_array($user_details_query); //return array from db (info about the logged in user)
	} else {
		$user = mysqli_fetch_array($admin_query); //return array from db (info about the logged in user)
	}
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
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/MagnificPopup/magnific-popup.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	<!-- jquery js -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->

	<!-- Omniva js ja css -->
	<script type="text/javascript" src="https://www.omniva.ee/widget/widget.js"> </script>
	<link rel="stylesheet" type="text/css" href="https://www.omniva.ee/widget/widget.css">



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
									Kokku:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $total;

									$shipping = 3; //€

									$totalwithshipping = $total + $shipping;

									$_SESSION['total'] = $totalwithshipping; //Passing the total to session variable, later passing that to Paypal
									?> €

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

									<form id="tellimusevorm" name="tellimusevorm" action="cart2.php" method="POST">
										<div class="bor8 bg0 m-b-12">
											<input id="nimi" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="Nimi" name="nimi" required>
										</div>

										<!-- <div class="bor8 bg0 m-b-12">
											<input id="address" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="Aadress" name="address" required>
										</div> -->

										<div class="bor8 bg0 m-b-22">
											<input id="phone" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" placeholder="Telefoninumber" name="phone">
										</div>

										<!-- container ID consist of "omniva_container" name with exact config id  -->
										<div id="omniva_container2"></div>
										<p class="stext-111 cl6 ">
											Transport: 3€
										</p><br>

										<script>
											var wd2 = new OmnivaWidget({

												compact_mode: true, // Compact widget is not shown
												// If enabled only a dropdown with locations will be shown

												show_offices: false, // Post offices will be shown
												// If disabled post offices will not be shown in the dropdown

												custom_html: false, // Predefined HTML is activated
												// It is allowed to create a custom HTML                                // It will be included in the container

												id: 2, // Will be added to the unique element ids if 
												// there is a need to have more than one widget

												selection_value: 'lagedi' // Preselected value. (case insensitive, will be trimmed) Can be empty or entirely omitted. Optional
											});

											var maat = document.getElementById("omniva_selection_value2");
											console.log(maat);
										</script>

										<span class="stext-112 cl8">
											Makseviis
										</span>
										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
											<!-- <select id="valik" class="js-select2" name="payment_method">
												<option disabled hidden selected value="bank_transfer">Makseviis</option>
												<option value="bank_transfer">Pangaülekanne</option>
												<option value="paypal">PayPal</option>
											</select>
											<div class="dropDownSelect2"></div> -->
										</div>
										<select id="valik" name="payment_method">
											<option disabled hidden selected value="paypal">Makseviis</option>
											<option value="paypal">PayPal</option>
											<option value="bank_transfer">Pangaülekanne</option>
										</select>

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Lõppsumma:
								</span>
							</div>

							<div class="size-208 m-l-30 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $totalwithshipping; ?> €
								</span>
							</div>
						</div>
						<input type="hidden" name="total" value="<?php echo $totalwithshipping; ?>">

						<!-- Set up a container element for the button -->
						<div id="paypal-button-container"></div>

						<div id="ylekas" style="display:none;">
							<strong>
								<p class="stext-40 cl6 p-t-2">
									Sooritage ülekanne & vajutage "Esita tellimus", misjärel võetakse tellimus töötlemisele.<br>
								</p>
								<hr>
								<p class="stext-111 cl6 p-t-2">
									<?php echo $andmed['kontonimi']; ?><br>
									<?php echo $andmed['kontonumber']; ?><br>
									<?php echo $andmed['pank']; ?><br><br>
								</p>
							</strong>
						</div>

						<button id="submitorder" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" type="submit" name="placeorder">
							Esita tellimus
						</button>

						<script>
							function submitform() {
								document.forms["tellimusevorm"].submit();
							}

							let valik = document.getElementById("valik");
							let ylekanne = document.getElementById("ylekas");
							let paypaldiv = document.getElementById("paypal-button-container");
							let tellimusevorm = document.getElementById("tellimusevorm");
							let telli = document.getElementById("submitorder");

							valik.addEventListener('change', () => {

								console.log(valik.value);

								if (valik.value == "paypal") {
									telli.style.display = "none";
									ylekas.style.display = "none";

									// Render the PayPal button into #paypal-button-container
									paypal.Buttons({

										// Set up the transaction
										createOrder: function(data, actions) {
											return actions.order.create({
												purchase_units: [{
													amount: {
														value: '<?php echo $_SESSION['total']; ?>'
													}
												}]
											});
										},

										// Finalize the transaction
										onApprove: function(data, actions) {
											return actions.order.capture().then(function(details) {
												// Show a success message to the buyer
												// tellimusevorm.submit();
												alert('Tellimus edastatud!');

												submitform();

												// window.location.href = 'index.php';

												<?php
												//When order is placed, unset the session
												// unset($_SESSION['cart']); 
												?>

												// window.location.href = 'index.php';
											});
										}
									}).render('#paypal-button-container');
								} else {
									telli.style.display = "block";

									paypaldiv.innerHTML = "";

									ylekas.style.display = "block";
								}
							})
							// paypal.Buttons().render('#paypal-button-container');
						</script>

						</form>

						<?php

						if (isset($_POST['placeorder']) || isset($_POST['tellimusevorm']) || isset($_POST['nimi'])) {
							$total = $_POST['total'];
							$phone = $_POST['phone'];
							// $address = $_POST['address'];
							$nimi = $_POST['nimi'];
							$payment_method = $_POST['payment_method'];
							$customer_id = $_SESSION['customer_id'];
							$pakiautomaat = $_POST['omniva_selection_value2'];
							// $sql = $_POST['sql'];

							$sql = "INSERT INTO Orders (customer_id, phone, total, payment_method, nimi, pakiautomaat) VALUES ('$customer_id', '$phone', '$total', '$payment_method', '$nimi', '$pakiautomaat')";

							$connect->query($sql);

							$sql2 = "SELECT id FROM Orders ORDER BY id DESC LIMIT 1"; //Finc latest order and only 1 row!

							$result = $connect->query($sql2);

							$final = $result->fetch_assoc();

							$order_id = $final['id'];

							foreach ($_SESSION['cart'] as $key => $value) {
								$product_id = $value['item_id'];

								$quantity = $value['quantity'];

								$sql3 = "INSERT INTO order_details (order_id, product_id, quantity) VALUES ('$order_id', '$product_id', '$quantity')";

								$connect->query($sql3);
							}

							//When order is placed, unset the session
							unset($_SESSION['cart']);

							echo "<script>

									window.location.href = 'arve.php?order_id=$order_id';
									
							</script>";

							// header("location: index.php");

							/* 	if ($payment_method == "paypals") {
								// $_SESSION['total'] = $total; //Passing the total to session variable, later passing that to Paypal

								echo "<script>

									renderbuttons();
									
									</script>";
							} else {
								echo "<script>
								
								alert('Tellimus on esitatud!');

								window.location.href='../index.php';
								
								</script>";
							} */

							/* //When order is placed, unset the session
							unset($_SESSION['cart']); */
						}

						?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- Modal content -->
		<div class="modal-content">
			<span class="close">&times;</span>
			<p id="modal-text"></p>
		</div>

	</div>

	<style>
		/* MODAL */
		.loginmodal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 1;
			/* Sit on top */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: #000;
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content/Box */
		.modal-content {
			background-color: #fefefe;
			margin: 15% auto;
			/* 15% from the top and centered */
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
			/* Could be more or less, depending on screen size */
		}

		/* The Close Button */
		.close {
			color: #aaa;
			float: right;
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}
	</style>

	<script>
		// Get the modal
		let modal = document.getElementById("myModal");
		let modalText = document.getElementById("modal-text");
		// Get the <span> element that closes the modal
		let span = document.getElementsByClassName("close")[0];
		/** Show modal for 2 sec */
		let showModal = (text) => {
			modal.style.display = "block";
			modalText.innerHTML = "<p>" + text + "</p>";

			setTimeout(() => {
				modal.style.display = "none";
			}, 2000);
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = () => {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = (event) => {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>

	<!-- Include the PayPal JavaScript SDK -->
	<script src="https://www.paypal.com/sdk/js?client-id=AYg9lS7A9y7CGmURkTYZy0P3S9y9SKNZ3GXmQkNchTMeZX9IXIfKSct1HLoV6-SVmZQcNu40wCnzYDne&currency=EUR"></script>

	<!-- Footer -->
	<?php

	//Footer template
	include("partials/footer.php");

	?>

</body>

</html>