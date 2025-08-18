<?php
session_start();
include "../config.php";

// Secure session handling
session_regenerate_id(true);
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "volunteer") {
    session_destroy();
    header("Location: ../index.php?error=unauthorized");
    exit();
}

$volunteer_id = $_SESSION['user_id'];

// Fetch only available pickup requests (exclude assigned & accepted ones)
$sql = "
    SELECT fl.id, fl.food_name, fl.quantity, fl.pickup_address 
    FROM food_listings fl
    LEFT JOIN pickup_requests pr ON fl.id = pr.food_id
    WHERE fl.status = 'pending' AND (pr.food_id IS NULL OR (pr.status = 'pending' AND pr.volunteer_id IS NULL))
";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    error_log("SQL Error: " . $conn->error);
    echo "<p class='alert alert-danger text-center'>🚨 Database error! Please try again later.</p>";
    exit();
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pickup Requests</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">📦 Available Pickup Requests</h2>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success text-center">✅ Pickup request accepted successfully! Redirecting to dashboard...</div>
        <?php endif; ?>

        <?php if ($result->num_rows == 0): ?>
            <div class="text-center">
                <p class="alert alert-warning">🚨 No available requests currently.</p>
                <a href="volunteer_dashboard.php" class="btn btn-secondary w-100">⬅️ Back to Dashboard</a>
            </div>
        <?php else: ?>
            <table class="table table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Pickup Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row['food_name']) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td><?= htmlspecialchars($row['pickup_address']) ?></td>
                        <td>
                            <form method="POST" action="accept_pickup.php">
                                <input type="hidden" name="food_id" value="<?= htmlspecialchars($row['id']) ?>">
                                <button type="submit" class="btn btn-success w-100">Accept Request</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="text-center mt-3">
            <a href="volunteer_dashboard.php" class="btn btn-secondary w-100">⬅️ Back to Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
