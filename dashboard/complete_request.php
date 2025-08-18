<?php
session_start();
include "../config.php";

// Secure session validation
session_regenerate_id(true);
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "volunteer") {
    header("Location: ../index.php?error=unauthorized");
    exit();
}

// Get request ID
$request_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
if (!$request_id) {
    header("Location: volunteer_dashboard.php?error=invalid_id");
    exit();
}

// Debugging: Log request before updating status
error_log("📌 Marking request as completed - Request ID: $request_id");

// Update status to "completed"
$sql = "UPDATE pickup_requests SET status = 'completed' WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $request_id);
$stmt->execute();

// Debugging: Confirm rows affected
error_log("✅ Affected Rows: " . $stmt->affected_rows);

if ($stmt->affected_rows > 0) {
    error_log("🎯 Request successfully marked as completed - Request ID: $request_id");
    header("Location: volunteer_dashboard.php?success=request_completed");
    exit();
} else {
    error_log("❌ Update Failed - Request ID: $request_id might not exist.");
    header("Location: volunteer_dashboard.php?error=update_failed");
    exit();
}
?>
