<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Dashboard | Food Donation</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Hotel Dashboard</h2>
        <form method="post" action="add_food.php">
            <div class="mb-3">
                <label class="form-label">Food Name</label>
                <input type="text" class="form-control" name="food_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" name="quantity" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Pickup Address</label>
                <textarea class="form-control" name="pickup_address" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Add Food Listing</button>
        </form>
    </div>
</body>
</html>
