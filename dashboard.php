<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center mt-5">
    <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>

    <a href="donation_form.php" class="btn btn-success mt-3">Donate Food</a>
    <a href="view_donations.php" class="btn btn-info mt-3">View My Donations</a>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</body>
</html>
