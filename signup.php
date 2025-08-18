<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Food Donation</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f9f9f9, #e0f7fa);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .signup-card {
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .signup-card:hover {
            transform: scale(1.01);
        }

        .signup-image {
            background-image: url('assets/images/signup_1.jpg');
            background-size: cover;
            background-position: center;
        }

        .form-control {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0,123,255,0.3);
        }

        .form-label {
            font-weight: 500;
        }

        .form-section {
            padding: 40px;
            animation: fadeIn 1.2s ease-in;
        }

        .btn-primary {
            border-radius: 30px;
            padding: 10px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .text-center a:hover {
            color: #004a99;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup-card {
                flex-direction: column;
            }

            .signup-image {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row signup-card shadow-lg">
            <div class="col-md-6 d-none d-md-block signup-image">
                <!-- Image side -->
            </div>
            <div class="col-md-6 form-section">
                <h2 class="text-center mb-4">Create an Account</h2>
                <form method="post" action="signup_process.php">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required placeholder="example@domain.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required placeholder="Choose a strong password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="" disabled selected>Select your role</option>
                            <option value="hotel">Hotel</option>
                            <option value="volunteer">Volunteer</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                    <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
