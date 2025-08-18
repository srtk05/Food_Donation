<?php
session_start();
include("config.php");

// Admin check
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] !== 'admin') {
    header("Location: login.php");
    exit();
}

// Fetch donations
$sql = "SELECT donations.id, users.username, donations.food_type, donations.quantity, donations.description, donations.donation_date 
        FROM donations 
        JOIN users ON donations.user_id = users.id
        ORDER BY donations.donation_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Admin Panel</h2>
    <h4>All Donations</h4>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>User</th>
                <th>Food Type</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Donation Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['food_type']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['donation_date']; ?></td>
                    <td><a href="delete_donation.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
</body>
</html>
