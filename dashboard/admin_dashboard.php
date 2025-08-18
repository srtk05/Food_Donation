<?php
session_start();
include "../config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

// Fetch data from database
$sql_users = "SELECT * FROM users";
$sql_food = "SELECT * FROM food_listings";
$sql_pickups = "SELECT * FROM pickup_requests";

$result_users = $conn->query($sql_users);
$result_food = $conn->query($sql_food);
$result_pickups = $conn->query($sql_pickups);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="d-flex">
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Admin Dashboard</h2>

        <!-- Users List -->
        <h3 class="mt-4">Users List</h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo ucfirst(htmlspecialchars($row['role'])); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Food Listings -->
        <h3 class="mt-4">Food Listings</h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Food Name</th>
                    <th>Quantity</th>
                    <th>Pickup Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_food->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['food_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($row['pickup_address']); ?></td>
                    <td><?php echo ucfirst(htmlspecialchars($row['status'])); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Pickup Requests -->
        <h3 class="mt-4">Pickup Requests</h3>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Food ID</th>
                    <th>Volunteer ID</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result_pickups->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['food_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['volunteer_id']); ?></td>
                    <td><?php echo ucfirst(htmlspecialchars($row['status'])); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>
