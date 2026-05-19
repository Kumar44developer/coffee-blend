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

		if(empty($_POST['review'])) {
			echo "<script>alert('one or more inputs are empty');</script>";
		} else {

			$review = $_POST['review'];
            $username = $_SESSION['username'];
