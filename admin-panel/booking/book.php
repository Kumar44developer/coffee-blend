<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 

if(isset($_POST['submit'])) {

    if(empty($_POST['first_name']) OR empty($_POST['last_name']) OR empty($_POST['date'])
    OR empty($_POST['time']) OR empty($_POST['phone'])  OR empty($_POST['message'])) {
      echo "<script>alert('one or more inputs are empty');</script>";
    } else { 


