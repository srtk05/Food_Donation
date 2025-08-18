<?php
$password = "admin123"; // Change this if you want another password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
echo "Hashed Password: " . $hashed_password;
?>
