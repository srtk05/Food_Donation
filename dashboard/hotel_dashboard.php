<?php
session_start();
$showToast = false;
if (isset($_SESSION['food_added'])) {
    $showToast = true;
    unset($_SESSION['food_added']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Dashboard | Food Donation</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #80deea);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .dashboard-container {
            animation: slideIn 0.8s ease-out;
            transition: transform 0.3s;
        }
        .dashboard-container:hover {
            transform: scale(1.01);
        }
        @keyframes slideIn {
            from {
                transform: translateY(30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .form-control:focus {
            border-color: #26c6da;
            box-shadow: 0 0 5px rgba(38, 198, 218, 0.5);
        }
        .btn-success {
            background: linear-gradient(to right, #43cea2, #185a9d);
            border: none;
            transition: background 0.3s ease-in-out;
        }
        .btn-success:hover {
            background: linear-gradient(to right, #11998e, #38ef7d);
        }
        .btn-danger {
            background: #e53935;
            transition: background 0.3s ease;
        }
        .btn-danger:hover {
            background: #c62828;
        }
        .toast-container {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1055;
        }
    </style>
</head>
<body>
    <!-- Toast Message -->
    <?php if ($showToast): ?>
    <div class="toast-container">
        <div id="successToast" class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ✅ Food added successfully!
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-6 dashboard-container shadow-lg rounded p-4 bg-white">
            <h2 class="text-center mb-4 text-primary fw-bold">Hotel Dashboard</h2>
            <form method="post" action="add_food.php">
                <div class="mb-3">
                    <label class="form-label fw-semibold">Food Name</label>
                    <input type="text" class="form-control" name="food_name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Quantity</label>
                    <input type="text" class="form-control" name="quantity" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Pickup Address/MOB NO</label>
                    <textarea class="form-control" name="pickup_address" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-success w-100">Add Food Listing</button>
            </form>

            <div class="text-center mt-4">
                <a href="../logout.php" class="btn btn-danger w-100">Logout</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for toast -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
