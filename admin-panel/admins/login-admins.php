<?php require "../layouts/header.php"; ?>    
<?php require "../../config/config.php"; ?>    
<?php 

  if(isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."");
  }

  
  if(isset($_POST['submit'])) {

    if(empty($_POST['email']) OR empty($_POST['password'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else { 

    
      $email = $_POST['email'];
      $password = $_POST['password'];



      //write a query to check for email

      $login = $conn->query("SELECT * FROM admins WHERE email='$email'");
      $login->execute();

      $fetch = $login->fetch(PDO::FETCH_ASSOC);

      if($login->rowCount() > 0) {


        if(password_verify($password, $fetch['password'])) {
          //start session

          $_SESSION['admin_name'] = $fetch['adminname'];
          $_SESSION['email'] = $fetch['email'];
          $_SESSION['admin_id'] = $fetch['id'];


          header("location: ".ADMINURL."");

        } else {
          echo "<script>alert('email of password is wrong');</script>";

        }    
