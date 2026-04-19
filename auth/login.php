<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


  if(isset($_SESSION['username'])) {
    header("location: ".APPURL."");
  }

  if(isset($_POST['submit'])) {

    if(empty($_POST['email']) OR empty($_POST['password'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else { 

      $email = $_POST['email'];
      $password = $_POST['password'];

      //write a query to check for email

      $login = $conn->query("SELECT * FROM users WHERE email='$email'");
      $login->execute();

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if($login->rowCount() > 0) {

        if(password_verify($password, $fetch['password'])) {
          //start session

          $_SESSION['username'] = $fetch['username'];
          $_SESSION['email'] = $fetch['email'];
          $_SESSION['user_id'] = $fetch['id'];

          header("location: ".APPURL."");

        } else {
          echo "<script>alert('email of password is wrong');</script>";

        }
      } else {
        echo "<script>alert('email of password is wrong');</script>";

      }
    }
  }


?>

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(<?php echo APPURL; ?>/images/bg_1.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>






















