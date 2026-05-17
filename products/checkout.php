<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 



	if(!isset($_SERVER['HTTP_REFERER'])){
		// redirect them to your desired location
		header('location: http://localhost/coffee-blend');
		exit;
	}


	if(!isset($_SESSION['user_id'])) {
		header("location: ".APPURL."");
	}


	if(isset($_POST['submit'])) {

		if(empty($_POST['first_name']) OR empty($_POST['last_name']) OR empty($_POST['state'])
		 OR empty($_POST['street_address']) OR empty($_POST['town']) OR empty($_POST['zip_code'])
		 OR empty($_POST['phone']) OR empty($_POST['email'])) {
			echo "<script>alert('one or more inputs are empty');</script>";
		} else {

			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$state = $_POST['state'];
			$street_address = $_POST['street_address'];
			$town = $_POST['town'];
			$zip_code = $_POST['zip_code'];
			$phone = $_POST['phone'];
			$user_id = $_SESSION['user_id'];
			$status = "Pending";
			$total_price = $_SESSION['total_price'];


			$place_orders = $conn->prepare("INSERT INTO orders (first_name, last_name, state, street_address,
			town, zip_code, phone, user_id, status, total_price) VALUES (:first_name, :last_name,
			:state, :street_address, :town, :zip_code, :phone, :user_id, :status, :total_price)");


			$place_orders->execute([
				":first_name" => $first_name,
				":last_name" => $last_name,
				":state" => $state,
				":street_address" => $street_address,
				":town" => $town,
				":zip_code" => $zip_code,
				":phone" => $phone,
				":user_id" => $user_id,
				":status" => $status,
				":total_price" => $total_price,
			]);
