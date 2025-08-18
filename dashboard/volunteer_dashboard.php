<?php
session_start();
session_regenerate_id(true);
include "../config.php";

// Secure session handling
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'volunteer') {
    session_destroy();
    header("Location: ../index.php?error=unauthorized");
    exit();
}

$volunteer_id = $_SESSION['user_id'];

// Fetch assigned pickup requests
$sql = "
    SELECT pr.id, fl.food_name, fl.quantity, fl.pickup_address, pr.status 
    FROM pickup_requests pr
    JOIN food_listings fl ON pr.food_id = fl.id
    WHERE pr.volunteer_id = ?
";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    error_log("SQL Error: " . $conn->error);
    echo "<p class='alert alert-danger text-center'>🚨 Database error! Please try again later.</p>";
    exit();
}

$stmt->bind_param("i", $volunteer_id);
$stmt->execute();
$result = $stmt->get_result();

$requests = [];
$all_completed = true;
while ($row = $result->fetch_assoc()) {
    $requests[] = $row;
    if ($row['status'] !== 'completed') {
        $all_completed = false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Volunteer Dashboard</a>
            <div class="d-flex">
                <a href="../logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Assigned Pickup Requests</h2>

        <!-- Success Message -->
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success text-center">✅ Pickup request marked as completed!</div>
        <?php endif; ?>

        <?php if (count($requests) === 0 || $all_completed): ?>
            <div class="text-center text-success">
                <?php if (count($requests) === 0): ?>
                    <p>🚨 No pickup requests assigned yet.</p>
                <?php else: ?>
                    <p>✅ All your assigned pickup requests are completed.</p>
                <?php endif; ?>
                <a href="available_requests.php" class="btn btn-primary">🔍 Browse Pickup Requests</a>
            </div>
        <?php else: ?>
            <table class="table table-bordered table-responsive">
                <thead class="table-dark">
                    <tr>
                        <th>Food Name</th>
                        <th>Quantity</th>
                        <th>Pickup Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($requests as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['food_name']) ?></td>
                        <td><?= htmlspecialchars($row['quantity']) ?></td>
                        <td><?= htmlspecialchars($row['pickup_address']) ?></td>
                        <td><?= ucfirst(htmlspecialchars($row['status'])) ?></td>
                        <td>
                            <?php if ($row['status'] === 'accepted'): ?>
                                <a href="complete_request.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Mark as Completed</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
