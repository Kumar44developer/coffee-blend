<?php require "layouts/header.php"; ?>    
<?php require "../config/config.php"; ?>    
<?php 

  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  //products
  $products = $conn->query("SELECT COUNT(*) AS count_products FROM products");
  $products->execute();


  $productsCount = $products->fetch(PDO::FETCH_OBJ);


    //orders
  $orders = $conn->query("SELECT COUNT(*) AS count_orders FROM orders");
  $orders->execute();
  
  $ordersCount = $orders->fetch(PDO::FETCH_OBJ);

      //bookings
  $bookings = $conn->query("SELECT COUNT(*) AS count_bookings FROM bookings");
  $bookings->execute();

  $bookingsCount = $bookings->fetch(PDO::FETCH_OBJ);


    //admins
    $admins = $conn->query("SELECT COUNT(*) AS count_admins FROM admins");
    $admins->execute();
  
    $adminsCount = $admins->fetch(PDO::FETCH_OBJ);


?>




















