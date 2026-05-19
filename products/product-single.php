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

		
	} else {
		header("location: ".APPURL."/404.php");
	}


?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Product Detail</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="<?php echo APPURL; ?>">Home</a></span> <span>Product Detail</span></p>
            </div>
