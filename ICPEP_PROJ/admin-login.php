<?php
session_start();
include 'connection.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username'");
    $row = mysqli_fetch_array($select);

    if ($row && password_verify($password, $row['password'])) {
        $_SESSION["admin_id"] = $row['admin_id'];
        // Additional admin-related session data can be stored here if needed

        echo '<script type="text/javascript">';
        echo 'alert("Admin Login Success!");';
        echo 'window.location.href = "admin-approval.php";';
        echo '</script>';
    } else {
        echo "Incorrect username or password!";
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
  <!-- Bootstrap Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="login.php">ICpEP.se - NCR Membership </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Admin Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
      </ul>
    </div>
  </nav>

<div class="form-container">
   <form action="admin-login.php" method="POST">
      <h3>Admin login</h3>
      <input type="text" name="username" required placeholder="Enter your Username">
      <input type="password" name="password" required placeholder="Enter your Password">
      <input type="submit" name="login" value="Login" class="form-btn">
   </form>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="footer">
  <p>Adamson University Computer Engineering Society 2023 © ICpEP</p>
</div>
</body>
</html>
