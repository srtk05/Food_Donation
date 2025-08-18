<?php
session_start();
include "../config.php";

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    die("Unauthorized Access!");
}

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
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Admin Dashboard</h2>
    
    <h3>Users List</h3>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
        <?php while ($row = $result_users->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo ucfirst($row['role']); ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Food Listings</h3>
    <table border="1">
        <tr>
            <th>Food Name</th>
            <th>Quantity</th>
            <th>Pickup Address</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result_food->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['food_name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['pickup_address']; ?></td>
            <td><?php echo ucfirst($row['status']); ?></td>
        </tr>
        <?php } ?>
    </table>

    <h3>Pickup Requests</h3>
    <table border="1">
        <tr>
            <th>Food ID</th>
            <th>Volunteer ID</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result_pickups->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['food_id']; ?></td>
            <td><?php echo $row['volunteer_id']; ?></td>
            <td><?php echo ucfirst($row['status']); ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="../logout.php">Logout</a>
</body>
</html>
