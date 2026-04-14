
<?php require "../layouts/header.php"; ?>    
<?php require "../../config/config.php"; ?> 
<?php 

  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  
  if(isset($_POST['submit'])) {

    if(empty($_POST['adminname']) OR empty($_POST['email']) OR empty($_POST['password'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else {

































