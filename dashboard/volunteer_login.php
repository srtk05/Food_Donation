<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = ? AND role = 'volunteer'";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error preparing SQL: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (!$result) {
        die("Error executing SQL: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_role'] = "volunteer";

            // Fix Redirect Path
            header("Location: dashboard/volunteer_dashboard.php");
            exit();
        } else {
            die("Incorrect password!");
        }
    } else {
        die("No email found!");
    }
}
?>
