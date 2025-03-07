<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        /* Global Styling */
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, #1e3a8a, #000000, #1e40af);
            background-size: 300% 300%;
            animation: gradientAnimation 10s ease infinite;
            color: #fff;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Animated Stars */
        .star {
            position: absolute;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            animation: twinkling 5s infinite ease-in-out alternate;
        }

        @keyframes twinkling {
            0% { opacity: 0.3; transform: scale(0.8); }
            50% { opacity: 1; transform: scale(1.2); }
            100% { opacity: 0.3; transform: scale(0.8); }
        }

        .star:nth-child(1) { top: 10%; left: 20%; animation-delay: 0s; }
        .star:nth-child(2) { top: 30%; left: 50%; animation-delay: 2s; }
        .star:nth-child(3) { top: 80%; left: 70%; animation-delay: 4s; }
        .star:nth-child(4) { top: 50%; left: 15%; animation-delay: 1s; }
        .star:nth-child(5) { top: 20%; left: 80%; animation-delay: 3s; }

        /* Container Styling */
        .container {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 60px 40px;
            text-align: center;
            max-width: 600px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            animation: slideIn 1s ease-out;
        }

        @keyframes slideIn {
            0% { transform: translateY(30px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        .container h1 {
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 15px;
            color: #fff;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        .container p {
            font-size: 1.2rem;
            color: #e0e0e0;
            margin-bottom: 40px;
            letter-spacing: 0.5px;
        }

        /* Button Styles */
        .btn {
            display: inline-block;
            font-size: 1rem;
            font-weight: bold;
            padding: 15px 30px;
            margin: 10px;
            text-transform: uppercase;
            border: none;
            border-radius: 30px;
            color: #fff;
            background: linear-gradient(135deg, #3cde77, #0f9d44);
            box-shadow: 0 5px 15px rgba(58, 213, 118, 0.5);
            transition: all 0.4s ease;
        }

        .btn:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #16a34a, #4ade80);
            box-shadow: 0 10px 25px rgba(72, 216, 128, 0.7);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #f35a5a, #e03131);
            box-shadow: 0 5px 15px rgba(229, 88, 88, 0.5);
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            background: linear-gradient(135deg, #ef4444, #f87171);
            box-shadow: 0 10px 25px rgba(248, 113, 113, 0.7);
        }

        /* Hover Glow Effect */
        .btn:hover::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 30px;
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
            pointer-events: none;
            animation: glow 1.5s infinite alternate;
        }

        @keyframes glow {
            0% { opacity: 0.3; }
            100% { opacity: 1; }
        }
    </style>
    <title>Gateway to Dashboard</title>
</head>
<body>
<!-- Animated Stars -->
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>
<div class="star"></div>

<!-- Main Content -->
<div class="container">
    <h1>Welcome to Your Dashboard</h1>
    <p>Nurture your mind and well-being with a serene and empowering experience crafted just for you.</p>
    <a href="DashBoard.php" class="btn">Let's Start Your Journey →</a>
    <a href="logout.php" class="btn btn-secondary">Logout</a>
</div>
</body>
</html>
