<?php
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
	echo "true";
} else {
	echo "Script siia";
}


/* if (empty($_SESSION['username'] AND $_SESSION['password'])) {
	echo "<script> alert('Please Log In');
		//window.location.href='customerforms.php';
		</script>";
} */ ?>

