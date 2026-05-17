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

