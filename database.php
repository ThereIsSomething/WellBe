<?php

$hostName = "193.203.184.189";
$dbUser = "u448196158_wellbe";
$dbPassword = "@Wellbe.Mindsage2024";
$dbName = "u448196158_wellbe";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>
