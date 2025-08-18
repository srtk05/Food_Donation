<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('assets/images/help_img.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.7);
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #FFD700 !important;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 30px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .btn-donate {
            background-color: #FFD700;
            color: black;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-donate:hover {
            background-color: orange;
            color: white;
        }

        /* About Section */
        .about {
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
        }

        .about h2 {
            font-weight: 700;
        }

        .about p {
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Footer */
        .footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Food Donation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Donate</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-white" href="home.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Help End Hunger</h1>
        <p>Join us in providing food for those in need. Every meal counts.</p>
        <a href="donate.php" class="btn-donate">Donate Now</a>
    </div>

    <!-- About Section -->
    <div class="about">
        <h2>About Us</h2>
        <p>We are committed to reducing food waste and helping those in need by connecting donors with volunteers who distribute food to the hungry.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2025 Food Donation. All Rights Reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
