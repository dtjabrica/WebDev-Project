<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .container {
            width: 90%;
            padding: 0px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        body {
            background-image: url('cpe1.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .box {
            width: calc(20% - 20px); /* It will adjust the width to fit 5 boxes in a row */
            margin: 0 10px;
            margin-bottom: 20px; /* It will adjust the margin between boxes */
            box-shadow: 0 0 20px 2px rgba(0, 0, 0, .1);
            transition: 1s;
            position: relative;
        }

        .box img {
            display: block;
            width: 100%;
            border-radius: 5px;
        }

        .box:hover {
            transform: scale(1.3);
            z-index: 2;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
        <img src="icpep.png" alt="icpep logo" height="80px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="homepage.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="officer_gallery.php">Officers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item">
    <a class="nav-link" href="../sign-out.php">Sign Out</a>
</li>
<form id="logout-form" action="sign-out.php" method="post" style="display: none;"></form>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="box">
	<img src="ofc/one.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/2.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/3.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/4.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/5.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/6.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/7.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/8.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/9.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/10.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/11.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/12.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/13.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/14.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/15.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/16.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/17.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/18.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/19.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/20.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/21.jpg" class="img-fluid">
  </div>
  <div class="box">
	<img src="ofc/22.jpg" class="img-fluid">
  </div>

</div>

  <!-- href goes here -->
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

