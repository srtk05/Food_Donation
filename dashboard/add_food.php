<?php
session_start();
include "../config.php"; // Ensure database connection

// Ensure only hotel users can add food
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'hotel') {
    session_destroy();
    header("Location: ../index.php?error=unauthorized");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = htmlspecialchars(trim($_POST['food_name']), ENT_QUOTES, 'UTF-8');
    $quantity = filter_var(trim($_POST['quantity']), FILTER_VALIDATE_INT);
    $pickup_address = htmlspecialchars(trim($_POST['pickup_address']), ENT_QUOTES, 'UTF-8');
    $hotel_id = $_SESSION['user_id'];

    // Prepare the SQL statement
    $sql = "INSERT INTO food_listings (hotel_id, food_name, quantity, pickup_address, status) VALUES (?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("SQL Error: " . $conn->error);
        header("Location: hotel_dashboard.php?error=db_issue");
        exit();
    }

    $stmt->bind_param("isss", $hotel_id, $food_name, $quantity, $pickup_address);

    if ($stmt->execute()) {
        // Set session variable to display success message
        $_SESSION['food_added'] = true;
        header("Location: hotel_dashboard.php");
        exit();
    } else {
        error_log("Database Insert Error: " . $stmt->error);
        header("Location: hotel_dashboard.php?error=insert_failed");
        exit();
    }
}
?>
