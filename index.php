<head>
    <title>Login | Food Donation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('assets/images/index_img.jpg') no-repeat center center;
            background-size: cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 350px;
            color: black;
            transition: transform 0.3s ease-in-out;
        }

        .login-container:hover {
            transform: scale(1.02);
        }

        .logo-container {
            display: inline-block;
            padding: 10px;
            background: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border-radius: 10px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .input-group-text {
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
            border: none;
            transition: 0.3s ease-in-out;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            color: black;
            transition: all 0.3s ease-in-out;
        }

        .form-control:focus {
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.8);
            border: none;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.7);
        }

        .btn-primary {
            background-color: blue;
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: darkblue;
            box-shadow: 0px 0px 15px rgba(0, 0, 255, 0.6);
        }

        a {
            color: blue !important;
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    <div class="login-container text-center">
        <div class="logo-container">
            <img src="assets/images/logo.png" alt="Food Donation Logo" class="logo">
        </div>
        <h2>Login</h2>
        <form method="post" action="login_process.php">
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" name="password" required placeholder="Enter your password">
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
            <p class="mt-3">Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"></script>
</body>
</html>
