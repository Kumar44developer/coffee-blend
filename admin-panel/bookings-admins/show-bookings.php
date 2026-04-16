<?php require "../layouts/header.php"; ?>    
<?php require "../../config/config.php"; ?> 
<?php 

  if(!isset($_SESSION['admin_name'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
  }

  $bookings = $conn->query("SELECT * FROM bookings");
  $bookings->execute();

  $allBookings = $bookings->fetchAll(PDO::FETCH_OBJ);

?>

?>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>

