<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
        }
        .container-fluid {
            margin-top: 60px;
        }
        .lead {
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <?php if (file_exists('navbar.php')) include('navbar.php'); ?>

    <div class="container-fluid">
        <h2 class="text-center">About Our Mission</h2>
        <p class="lead text-center">
            We are a non-profit organization committed to ending hunger by redistributing excess food
            from hotels, restaurants, and individuals to those in need. Our network of volunteers ensures
            timely pickup and delivery of food donations across the city.<br>
        </p>
        <hr>
        <div class="text-center mt-3">
            <a href="signup.php" class="btn btn-primary">Join Us Now!</a>
        </div>
    </div>
</body>
</html>
