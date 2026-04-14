<?php require "../layouts/header.php"; ?>    
<?php require "../../config/config.php"; ?> 
<?php 


  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }
  
  $admins = $conn->query("SELECT * FROM admins");
  $admins->execute();
