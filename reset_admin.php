<?php
include "config.php";

$new_password = password_hash("admin123", PASSWORD_DEFAULT);
$sql = "UPDATE users SET password='$new_password' WHERE email='admin@example.com'";
$conn->query($sql);
echo "Admin password reset successfully!";
?>
