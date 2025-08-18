<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: #444 url('assets/images/help_img.jpg') no-repeat center center fixed;
            background-size: cover;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            background: rgba(0, 0, 0, 0.7);
            transition: 0.3s;
        }

        .navbar-brand, .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #FFD700 !important;
            transform: scale(1.1);
            transition: 0.3s;
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
            padding: 30px;
            position: relative;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            opacity: 0;
            animation: fadeInDown 1s forwards;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            opacity: 0;
            animation: fadeInUp 1.2s forwards;
        }

        .btn-donate {
            display: inline-block;
            background-color: #FFD700;
            color: black;
            font-weight: 600;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: 0.3s;
            opacity: 0;
            animation: zoomIn 1.5s forwards;
        }

        .btn-donate:hover {
            background-color: orange;
            color: white;
            transform: scale(1.1);
        }

        /* About Section */
        .about {
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.9);
            text-align: center;
            animation: fadeInUp 1.5s forwards;
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
            animation: fadeInUp 1.5s forwards;
        }

        /* Animations */
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes zoomIn {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="home.php">Food Donation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Signup</a></li>
                    <li class="nav-item">
                        <a class="btn btn-primary text-white px-3 py-2" href="index.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Help End Hunger</h1>
        <p>Join us in providing food for those in need. Every meal counts.</p>
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
