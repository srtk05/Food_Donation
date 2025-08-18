<?php
session_start();
include "../config.php";

// Check if volunteer is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== "volunteer") {
    header("Location: ../index.php?error=unauthorized");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['food_id'])) {
    $food_id = intval($_POST['food_id']);
    $volunteer_id = $_SESSION['user_id'];

    // Check if already accepted
    $check_sql = "SELECT id FROM pickup_requests WHERE food_id = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("i", $food_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        // Update existing request
        $update_sql = "UPDATE pickup_requests SET volunteer_id = ?, status = 'accepted' WHERE food_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $volunteer_id, $food_id);
        $update_stmt->execute();
    } else {
        // Insert new pickup request
        $insert_sql = "INSERT INTO pickup_requests (food_id, volunteer_id, status) VALUES (?, ?, 'accepted')";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $food_id, $volunteer_id);
        $insert_stmt->execute();
    }

    // ✅ Update status in food_listings to 'accepted'
    $update_food_sql = "UPDATE food_listings SET status = 'accepted' WHERE id = ?";
    $update_food_stmt = $conn->prepare($update_food_sql);
    $update_food_stmt->bind_param("i", $food_id);
    $update_food_stmt->execute();

    header("Location: volunteer_dashboard.php?message=request_accepted");
    exit();
} else {
    header("Location: available_request.php?error=invalid_request");
    exit();
}
?>
