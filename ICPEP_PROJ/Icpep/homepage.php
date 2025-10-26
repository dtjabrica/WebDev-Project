<?php
session_start();

// Check if the user is logged in
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
    <title>Web Development</title>

    <style>
        body {
            background-image: url('cpe1.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .c-item {
            height: 500px;
        }

        .c-img {
            height: 100%;
            object-fit: fit;
        }

        .gallery-item {
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
        <img src="icpep.png" alt="icpep logo" height="80px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <!-- Carousel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active c-item">
                        <img src="p1.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                    <div class="carousel-item c-item">
                        <img src="p2.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                    <div class="carousel-item c-item">
                        <img src="p3.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                    <div class="carousel-item c-item">
                        <img src="p4.jpg" class="d-block w-100 c-img" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</div>
<br>
<!-- Gallery -->
<div class="container gallery-container">
    <div class="row">
        <div class="col-md-4 gallery-item">
            <img src="cp1.jpg" alt="Image 1" class="img-fluid">
        </div>
        <div class="col-md-4 gallery-item">
            <img src="cp2.jpg" alt="Image 2" class="img-fluid">
        </div>
        <div class="col-md-4 gallery-item">
            <img src="cp3.jpg" alt="Image 3" class="img-fluid">
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 gallery-item">
            <img src="cp4.jpg" alt="Image 4" class="img-fluid">
        </div>
        <div class="col-md-4 gallery-item">
            <img src="cp5.jpg" alt="Image 5" class="img-fluid">
        </div>
        <div class="col-md-4 gallery-item">
            <img src="cp6.jpg" alt="Image 6" class="img-fluid">
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
