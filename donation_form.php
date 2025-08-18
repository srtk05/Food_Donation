<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_type = $_POST["food_type"];
    $quantity = $_POST["quantity"];
    $description = $_POST["description"];
    $user_id = $_SESSION["user_id"];

    // Insert donation into the database
    $stmt = $conn->prepare("INSERT INTO donations (user_id, food_type, quantity, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $user_id, $food_type, $quantity, $description);

    if ($stmt->execute()) {
        $success = "Donation submitted successfully!";
    } else {
        $error = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Donate Food</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Food Type</label>
                <input type="text" name="food_type" class="form-control" placeholder="Enter food type" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Enter description of the food" rows="4" required></textarea>
            </div>
            <?php if (isset($error)) echo "<p class='text-danger'>$error</p>"; ?>
            <?php if (isset($success)) echo "<p class='text-success'>$success</p>"; ?>
            <button type="submit" class="btn btn-success w-100">Submit Donation</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Back to Dashboard</a>
    </div>

</body>
</html>
