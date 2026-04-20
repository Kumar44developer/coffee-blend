<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


  if(isset($_SESSION['username'])) {
    header("location: ".APPURL."");
  }


  if(isset($_POST['submit'])) {

    if(empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else {
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);



      $insert = $conn->prepare("INSERT INTO users (username, email, password)
       VALUES (:username, :email, :password)");

      $insert->execute([
        ":username" => $username,
        ":email" => $email,
        ":password" => $password
      ]);

      header("location: login.php");
      
      

    }
  }


?>
    
