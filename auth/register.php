<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>
<?php 


  if(isset($_SESSION['username'])) {
    header("location: ".APPURL."");
  }
