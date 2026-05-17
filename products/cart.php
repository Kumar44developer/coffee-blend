<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


	if(!isset($_SESSION['user_id'])) {
		header("location: ".APPURL."");
	}

	$products = $conn->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
	$products->execute();

	$allProducts = $products->fetchAll(PDO::FETCH_OBJ);

	//cart total

	$cartTotal = $conn->query("SELECT SUM(quantity*price) AS total FROM cart WHERE user_id='$_SESSION[user_id]'");
	$cartTotal->execute();

	$allCartTotal = $cartTotal->fetch(PDO::FETCH_OBJ);



	//procced to checkout

	if(isset($_POST['checkout'])) {

		$_SESSION['total_price'] = $_POST['total_price'];

		header("location: checkout.php");
	}

?>
