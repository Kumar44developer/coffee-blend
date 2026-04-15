
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

          $update = $conn->prepare("UPDATE bookings SET status = :status WHERE id='$id'");
    
          $update->execute([
            ":status" => $status,
            
          ]);
    
          header("location: show-bookings.php");
          
          
    
        }
      }
  }
 
?>
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Update Status</h5>
          <form method="POST" action="change-status.php?id=<?php echo $id; ?>">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">































