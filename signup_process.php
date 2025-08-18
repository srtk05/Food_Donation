<?php
include "config.php"; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    // Validate inputs
    if (empty($name) || empty($email) || empty($password) || empty($role)) {
        die("❌ All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid email format.");
    }

    // Check if email already exists
    $check_sql = "SELECT id FROM users WHERE email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $check_stmt->store_result();

    if ($check_stmt->num_rows > 0) {
        die("❌ Email already registered. Please log in.");
    }
    $check_stmt->close();

    // Hash password securely
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert new user into the users table
    $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("❌ SQL Error: " . $conn->error);
    }

    $stmt->bind_param("ssss", $name, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        header("Location: index.php?signup_success=1");
        exit();
    } else {
        die("❌ Registration failed. Please try again.");
    }

    $stmt->close();
}

$conn->close();
?>
