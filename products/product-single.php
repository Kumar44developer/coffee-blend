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


			$insert_cart = $conn->prepare("INSERT INTO cart (name, image, price, pro_id, description,
			quantity, user_id) VALUES (:name, :image, :price, :pro_id, :description, :quantity, :user_id)");

			$insert_cart->execute([
				":name" => $name,
				":image" => $image,
				":price" => $price,
				":pro_id" => $pro_id,
				":description" => $description,
				":quantity" => $quantity,
				":user_id" => $user_id
			]);


			echo "<script>alert('added to cart successfully');</script>";
		}


		///validation for the cart
		if(isset($_SESSION['user_id'])) {
			$validateCart = $conn->query("SELECT * FROM cart WHERE pro_id='$id' AND
			user_id='$_SESSION[user_id]'");
			$validateCart->execute();

			$rowCount = $validateCart->rowCount();
		}
