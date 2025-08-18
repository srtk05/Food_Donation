<?php
session_start();
include "config.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Email and password are required!";
        header("Location: index.php");
        exit();
    }

    $sql = "SELECT id, name, password, role FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $stmt->close();

        if (password_verify($password, $user['password'])) {
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            // Redirect user based on role
            if ($user['role'] == 'admin') {
                header("Location: dashboard/admin_dashboard.php");
            } elseif ($user['role'] == 'hotel') {
                header("Location: dashboard/hotel_dashboard.php");
            } else {
                header("Location: dashboard/volunteer_dashboard.php");
            }
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password!";
            header("Location: index.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "User not found!";
        header("Location: index.php");
        exit();
    }
}

$conn->close();
?>
