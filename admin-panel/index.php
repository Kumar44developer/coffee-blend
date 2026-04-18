<?php require "layouts/header.php"; ?>    
<?php require "../config/config.php"; ?>    
<?php 

  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  //products
  $products = $conn->query("SELECT COUNT(*) AS count_products FROM products");
  $products->execute();

























