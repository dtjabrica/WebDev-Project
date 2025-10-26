<?php
session_start();
include 'connection.php';
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register form</title>

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
   <form action="register.php" method="post">
      <h3>Register</h3>
      <input type="text" name="username" required placeholder="Enter your Name">
      <input type="email" name="email" required placeholder="Enter your Email">
      <input type="password" name="password" required placeholder="Enter your Password">
      <input type="password" name="confirm_password" required placeholder="Confirm Password">
      <input type="submit" name="register" value="Register" class="form-btn">
      <p>Already a Member? <a href="login.php">Login Now</a></p>
   </form>
</div>

<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirm_password'];

    if ($password !== $cpassword) {
      echo '<script type="text/javascript">';
      echo 'alert("Password and Confirm Password do not match!");';
      echo 'window.location.href = "register.php";';
      echo '</script>';
      exit();
    }

    $select = "SELECT * FROM tbl_users WHERE email_address = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        echo '<script type="text/javascript">';
        echo 'alert("Email Already Taken!");';
        echo 'window.location.href = "register.php";';
        echo '</script>';
    } 
    else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $register = "INSERT INTO tbl_users (username, email_address, password, cpassword, status) VALUES ('$username', '$email', '$password', '$cpassword', 'pending')";
        mysqli_query($conn, $register);
        echo '<script type="text/javascript">';
        echo 'alert("Your account is now pending!");';
        echo 'window.location.href = "login.php";';
        echo '</script>';
    }
}
?>
  <!-- Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</body>
<div class="footer">
  <p>Adamson University Computer Engineering Society 2023 © ICpEP</p>
</div>
</html>