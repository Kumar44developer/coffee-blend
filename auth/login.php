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





























