<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


	if(isset($_GET['id'])) {
		$id = $_GET['id'];


		//data for single product
		$product = $conn->query("SELECT * FROM products WHERE id='$id'");
		$product->execute();

		$singelProduct = $product->fetch(PDO::FETCH_OBJ);


		//data for relatedProducts
		$relatedProducts = $conn->query("SELECT * FROM products WHERE type='$singelProduct->type'
		AND id !='$singelProduct->id'");

		$relatedProducts->execute();

		$allRelatedProducts = $relatedProducts->fetchAll(PDO::FETCH_OBJ);

		//add to cart
		if(isset($_POST['submit'])) {

			$name = $_POST['name'];
			$image = $_POST['image'];
			$price = $_POST['price'];
			$pro_id = $_POST['pro_id'];
			$description = $_POST['description'];
			$quantity = $_POST['quantity'];
			$user_id = $_SESSION['user_id'];
