<?php
session_start();
include "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user_id'])) {
    $food_name = $_POST['food_name'];
    $quantity = $_POST['quantity'];
    $pickup_address = $_POST['pickup_address'];
    $hotel_id = $_SESSION['user_id'];

    $sql = "INSERT INTO food_listings (hotel_id, food_name, quantity, pickup_address) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $hotel_id, $food_name, $quantity, $pickup_address);

    if ($stmt->execute()) {
        echo "Food listed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
