<?php
$servername = "193.203.184.189"; // Replace with the hostname from Hostinger if not localhost
$username = "u448196158_wellbe"; // Your MySQL username
$password = "@Wellbe.Mindsage2024"; // Your MySQL password
$dbname = "u448196158_wellbe"; // Your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
