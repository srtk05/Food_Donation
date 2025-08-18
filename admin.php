<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM donations");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>".$row['food_details']." | Status: ".$row['status']."</p>";
}
?>
