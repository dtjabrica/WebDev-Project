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
    <style>
        h1 {
            font-size: 25px;
        }

        p {
            font-size: 17px;
            color: #000000;
        }

        .history-container {
            text-align: justify;
            text-justify: inter-word;
            margin-top: 30px;
            margin-bottom: 30px;
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
<form id="logout-form" action="sign-out.php" method="post" style="display: none;"></form>

            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 history-container">
    <br>
    <br>
    <br>
    <h1 class="text-center">Institute of Computer Engineering in the Philippines History</h1>
    <br>
    <p>
        In 1992, a group of computer engineers formed the Philippine Institute of Computer Engineers, Inc.
        (PhICEs). PhICEs managed to gather a number of professional members. They conducted conventions,
        seminars and symposia in several regions in Luzon and Visayas. After being active for several years,
        PhICEs became inactive.
    </p>
    <p>
        In 2008, computer engineers from different organizations converged to revive the professional
        organization. The group, headed by Engr. Erwin G. Mendoza and Engr. Alexander B. Ybasco, continued
        what the PhICEs started. After several meetings, the group decided to change its name. Thus, the
        Institute of Computer Engineers of the Philippines, Inc. (ICpEP) was born.
    </p>
    <p>
        ICpEP continues to establish a strong partnership with the industry. Well-known companies such as
        Intel, Microsoft, HP, Lenovo, Epson, Red Fox, and PC Buyers Guide recognize ICpEP as the sole
        organization dedicated to computer engineers in the Philippines. Furthermore, ICpEP has made
        collaboration with SM Mall of Asia, in the presence of NIDO Fortified Science Discovery Center, to
        promote research and development in the Philippines through a showcase of notable design projects in
        the field of computer engineering.
    </p>

    <p>
        CpEP has successfully formed its academic linkage to universities and colleges through the ICpEP
        Student Edition (ICpEP.SE). Created in 2008, ICpEP.SE started with 11 schools, namely: Adamson
        University, Asia Pacific College, Central Colleges of the Philippines, De La Salle University, Far
        Eastern University-East Asia College, Mapua Institute of Technology, Pamantasan ng Lungsod ng
        Maynila, Polytechnic University of the Philippines-Manila, STI College-Recto, and Technological
        Institute of the Philippines-Manila and Technological Institute of the Philippines -Quezon City. Now,
        ICpEP.SE is composed of more than sixty-eight (68) schools from all over the Philippines.
    </p>
    <p>
        ICpEP firmly believes that uniting our professionals will contribute to national development and will
        improve the lives of the people. With the support of industry and academe, ICpEP will remain as a
        recognized professional organization of computer engineers. ICpEP strives to engage every Filipino
        computer engineer to become active, involved and significant in achieving one common goal: to become
        world-class.
    </p>
</div>

<div class="container2 mt-5">
    <h1 class="text-center" style="font-size:15px;">FOLLOW US ON OUR SOCIALS:</h1>
    <a href="https://www.facebook.com/ICpEP.SE"><center><img src="fb.png" height="100" width="100"></a>
    <a href="https://www.instagram.com/icpepsencr/"><img src="ig.png" height="100" width="100"></a>
</div>
<!-- href goes here -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
