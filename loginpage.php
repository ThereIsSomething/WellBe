<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellBe Login & Signup</title>
    <link rel="stylesheet" href="loginpage.css">
</head>
 
<script async src="https://www.googletagmanager.com/gtag/js?id=G-JES74WTYXK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-JES74WTYXK');
</script>
<body>
<div class="background">

    <div class="flex-container">
      
        <div class="left-section">
            <img src="https://i.imgur.com/126cWea.gif" alt="WellBe">
            <p class="app-tagline">Connect. Reflect. Thrive.</p>
        </div>

       
        <div class="right-section">

           
            <div class="form-container active" id="loginForm">
     <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
                <h2 class="form-title">Welcome Back</h2>
                <p class="form-subtitle">Log in to continue your journey.</p>
                <form id="login" action="login.php" method="post">
                    <input type="email" id="Email" name="email" placeholder="Email" required autocomplete="on">
                    <input type="password" id="Password" name="password" placeholder="Password" required autocomplete="on">
                    <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
                    <p>Don't have an account? <a href="#" onclick="toggleForms()">Sign up</a></p>
                    <p><a href="#">Forgotten your password?</a></p>
                </form>
            </div>

            
            <div class="form-container hidden" id="signupForm">
		<div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
                     require_once "database.php";
           $sql = "SELECT * FROM users WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
                <h2 class="form-title">Join WellBe</h2>
                <p class="form-subtitle">Sign up and start exploring.</p>
                <form id="signup" action="login.php" method="post">
                    <input type="text" id="username" name="full name" placeholder="Full Name" required autocomplete="on">
                    <input type="email" id="email" name="email" placeholder="Email" required autocomplete="on">
                    <input type="password" id="password" name="password" placeholder="Password" required autocomplete="on">
                     <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
                    <p>Already have an account?
                        <a href="#" onclick="toggleForms()">Login</a>
                    </p>

                </form>
            </div>

        </div>
    </div>
</div>
<script src="loginpage.js"></script>
</body>
</html>
