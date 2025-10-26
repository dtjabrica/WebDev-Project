<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])) {
    // User Login
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $select = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email_address = '$email'");
        $row = mysqli_fetch_array($select);
        $status = $row['status'];

        $select2 = mysqli_query($conn, "SELECT * FROM tbl_users WHERE email_address = '$email' AND password = '$password'");
        $check_user = mysqli_num_rows($select2);

        if ($check_user == 1) {
            $_SESSION["status"] = $row['status'];
            $_SESSION["email"] = $row['email_address'];
            $_SESSION["password"] = $row['password'];

            if ($status == "approved") {
                echo '<script type="text/javascript">';
                echo 'alert("Login Success!");';
                echo 'window.location.href = "Icpep/homepage.php";';
                echo '</script>';
            } elseif ($status == "pending") {
                echo '<script type="text/javascript">';
                echo 'alert("Your account is still pending for approval!");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Incorrect email or password!");';
            echo '</script>';
        }
    }

    // Admin Login
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $adminUsername = $_POST['username'];
        $adminPassword = $_POST['password'];

        // Check if admin credentials match
        if ($adminUsername === "admin" && $adminPassword === "admin") {
            $_SESSION["admin_username"] = $adminUsername;
            echo '<script type="text/javascript">';
            echo 'alert("Admin Login Success!");';
            echo 'window.location.href = "admin-approval.php";';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Incorrect admin username or password!");';
            echo '</script>';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login form</title>

   <!-- Bootstrap CSS -->
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
<img src = "BG.jpg" width = "100%" height="20%">
  <!-- Bootstrap Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="login.php">ICpEP.se - NCR Membership </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#adminLoginModal">Admin Login</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Admin Login Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adminLoginModalLabel">Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Update the form action to an empty string (current page) -->
        <form action="" method="POST">
          <div class="form-group">
            <label for="adminUsername">Username</label>
            <input type="text" class="form-control" id="adminUsername" name="username" required placeholder="Enter your Username">
          </div>
          <div class="form-group">
            <label for="adminPassword">Password</label>
            <input type="password" class="form-control" id="adminPassword" name="password" required placeholder="Enter your Password">
          </div>
          <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

	<div class="form-container">
     <form action="login.php" method="POST">
        <h3>Member Login</h3>
        <input type="email" name="email" required placeholder="Enter your Email">
        <input type="password" name="password" required placeholder="Enter your Password">
        <input type="submit" name="login" value="Login" class="form-btn">
        <p>Not a Member Yet? <a href="register.php">Register here.</a></p>
     </form>
  </div>
=


  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <div class="footer">
    <p>Adamson University Computer Engineering Society 2023 © ICpEP</p>
  </div>
</body>
</html>
