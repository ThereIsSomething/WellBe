<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: index11.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
     
body {
    margin: 0;
    font-family: 'Arial', sans-serif;
    color: #fff;
    background: #121212;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.background {
    position: relative;
    width: 100%;
    height: 100%;
    overflow: hidden;

}


@keyframes gradientAnimation {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.flex-container {
    display: flex;
    width: 100%;
    max-width:revert;
    height: 100%;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);

}


.left-section {
    flex: 1;
    background: rgba(0, 0, 0, 0.8);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    text-align: center;

}



.app-tagline {
    font-size: 35px;
    color:#ccc;;
    max-width: 400px;

}


.right-section {
    flex: 1.5;
    background: rgba(18, 18, 18, 0.9);
    display: flex; 
    justify-content: center; 
    align-items: center; 
    position: relative;
    padding: 20px; 
    background-image: url(https://i.imgur.com/E417k13.png);
    opacity:1;

}



.container {
    width: 100%;
    height: 100%;
    max-height: 500px;
    max-width: 600px;
    background: url("https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/Very_Black_screen.jpg/2560px-Very_Black_screen.jpg"); 
    padding: 40px; 
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); 
    opacity: 0;
    transform: translateY(20px);
    transition: all 0.8s ease;

}

.container {
    opacity:1;
    transform: translateY(0);
    box-shadow: 0 4px 10px #8a6e49;
}

.form-title {
    font-size: 38px;
    margin-bottom: 10px;
}

.form-subtitle {
    font-size: 19px;
    color: #ccc;
    margin-bottom: 20px;
}

.form-group input {
    width: 100%;
    height:2.4rem;
    padding: 12px;
    margin: 10px 0;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    background: rgba(255, 255, 255, 0.1);
    color: #fff;
    
}

.form-group input:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.2);
}

.form-btn {
    width: 106%;
    padding: 12px;
    border: none;
    border-radius: 8px;
    
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease, transform 0.2s ease;
}


}

 a {
    color: #8158ae;
    text-decoration: none;
    font-weight: bold;
    cursor: pointer;

}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
     <div class="background">

    <div class="flex-container">
      
        <div class="left-section">
            <img src="https://i.imgur.com/126cWea.gif" alt="WellBe">
            <p class="app-tagline">Connect. Reflect. Thrive.</p>
        </div>

       
        <div class="right-section">

    <div class="container" id="signup">
        <?php
        if (isset($_POST["submit"])) {
           $fullName = $_POST["fullname"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
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
        <form action="registration.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
            </div>
            <div class="form-group">
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <p>Already Registered <a href="login.php">Login Here</a></p>
        </form>
        
    </div>
    </div>
    </div>
    </div>
</body>
</html>