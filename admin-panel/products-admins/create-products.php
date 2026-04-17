<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php 

  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  if(isset($_POST['submit'])) {

    if(empty($_POST['name']) OR empty($_POST['price']) OR empty($_POST['description'])
    OR empty($_POST['type'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $description = $_POST['description'];
      $type = $_POST['type'];
      $image = $_FILES['image']['name'];

      $dir = "images/" . basename($image);

      $insert = $conn->prepare("INSERT INTO products (name, price, description, type,
       image)
      VALUES (:name, :price, :description, :type, :image)");

      $insert->execute([
        ":name" => $name,
        ":price" => $price,
        ":description" => $description,
        ":type" => $type,
        ":image" => $image,
      ]);

      if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
        header("location: show-products.php");

      }

      
      

    }
  }
















