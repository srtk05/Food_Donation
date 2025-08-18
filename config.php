<?php
$host = "localhost";
$username = "root";  // Default in XAMPP
$password = "";      // Default is empty
$database = "food_donation";

// Connect to Database
$conn = new mysqli($host, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
