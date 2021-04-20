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

	$admin_query = mysqli_query($connect, "SELECT * FROM admins WHERE username='$userLoggedIn'");

	//Kontrolli kas sisselogitud kasutaja on admin
	if (mysqli_num_rows($admin_query) == 0) {
		$user = mysqli_fetch_array($user_details_query); //return array from db (info about the logged in user)
	} else {
		$user = mysqli_fetch_array($admin_query); //return array from db (info about the logged in user)
	}
}
// print_r($user);
// print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Kontakt</title>
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
</head>

<body class="animsition">

	<header class="header-v4">
		<?php

		//Header template
		include("partials/header.php");

		?>
	</header>

	<?php include("partials/cartmodal.php"); ?>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Kontakt
		</h2>
	</section>

	<!-- Content page -->
	<section class="bg0 p-t-50 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form action="handler/contact.php" method="POST">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Kirjuta meile
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Sinu E-posti aadress">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON" required>
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Kuidas saame aidata?" required></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Saada
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Aadress
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								<?php echo $andmed['aadress']; ?><br>
								<?php echo $andmed['firmanimi']; ?><br>
								<?php echo $andmed['regnr']; ?>
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Telefon
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<?php echo $andmed['telefon']; ?>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Klienditugi
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<?php echo $andmed['email']; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Map -->
	<!-- <div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="images/icons/pin.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div> -->



	<!-- Footer -->
	<?php

	//Footer template
	include("partials/footer.php");

	?>

</body>

</html>