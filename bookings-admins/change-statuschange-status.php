
<?php require "../layouts/header.php"; ?>    
<?php require "../../config/config.php"; ?> 
<?php 


  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }


  if(isset($_GET['id'])) {

    $id = $_GET['id'];

    if(isset($_POST['submit'])) {

        if(empty($_POST['status'])) {
          echo "<script>alert('one or more inputs are empty');</script>";
        } else {
          $status = $_POST['status'];




































