<?php
session_start();
include "../config.php";

// Secure session handling
session_regenerate_id(true);
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'volunteer') {
    session_destroy();
    header("Location: ../index.php?error=unauthorized");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input
    $pickup_id = filter_var($_POST['pickup_id'], FILTER_VALIDATE_INT);
    if (!$pickup_id) {
        header("Location: volunteer_dashboard.php?error=invalid_data");
        exit();
    }

    // Prepare SQL query securely
    $stmt = $conn->prepare("UPDATE pickup_requests SET status = 'completed' WHERE id = ?");
    
    if (!$stmt) {
        error_log("SQL Error: " . $conn->error);
        header("Location: volunteer_dashboard.php?error=db_issue");
        exit();
    }

    $stmt->bind_param("i", $pickup_id);

    if ($stmt->execute()) {
        header("Location: volunteer_dashboard.php?success=pickup_completed");
        exit();
    } else {
        error_log("Database Update Error: " . $stmt->error);
        header("Location: volunteer_dashboard.php?error=update_failed");
        exit();
    }
}
?>
