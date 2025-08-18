<?php
session_start();
include("config.php");

// Enable error reporting for debugging (Only for Development Mode)
error_reporting(E_ALL);
ini_set('display_errors', 1);

$message = ""; // Variable to store user feedback

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name = trim(htmlspecialchars($_POST['name']));
    $food_type = trim(htmlspecialchars($_POST['food_type']));
    $quantity = trim($_POST['quantity']);
    $address = trim(htmlspecialchars($_POST['address']));
    $contact = trim($_POST['contact']);

    // Validate fields
    if (empty($name) || empty($food_type) || empty($quantity) || empty($address) || empty($contact)) {
        $message = "<div class='alert alert-danger'>All fields are required!</div>";
    } elseif (!filter_var($quantity, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
        $message = "<div class='alert alert-danger'>Quantity must be a valid number!</div>";
    } elseif (!preg_match('/^\d{10}$/', $contact)) {
        $message = "<div class='alert alert-danger'>Invalid contact number format! Please enter a 10-digit number.</div>";
    } else {
        // Prepare SQL query
        $query = "INSERT INTO donations (name, food_type, quantity, address, contact_number, created_at) 
                  VALUES (?, ?, ?, ?, ?, NOW())";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            error_log("SQL Error: " . $conn->error);
            $message = "<div class='alert alert-danger'>Something went wrong. Please try again.</div>";
        } else {
            // Bind parameters and execute query
            $stmt->bind_param("ssiss", $name, $food_type, $quantity, $address, $contact);

            if ($stmt->execute()) {
                $message = "<div class='alert alert-success'>Thank you for your generous donation!</div>";
            } else {
                error_log("Insert Error: " . $stmt->error);
                $message = "<div class='alert alert-danger'>Failed to process your donation. Please try again.</div>";
            }

            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donate Food | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Donate Food</h2>

    <!-- Display Messages -->
    <?php echo $message; ?>

    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label">Your Name*</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Type of Food*</label>
            <input type="text" class="form-control" name="food_type" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Quantity (in servings)*</label>
            <input type="number" class="form-control" name="quantity" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pickup Address*</label>
            <textarea class="form-control" name="address" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Contact Number*</label>
            <input type="text" class="form-control" name="contact" pattern="\d{10}" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Submit Donation</button>
    </form>
</div>

</body>
</html>
