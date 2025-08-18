<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM donations WHERE status='pending'");
while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>Food: " . $row['food_details'] . " | Address: " . $row['pickup_address'] . "</p>";
    echo "<a href='pickup.php?id=".$row['id']."'>Accept Pickup</a>";
}
?>
