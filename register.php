<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "e_clinic";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accountId']) && isset($_POST['password'])) {
        $accountId = $_POST['accountId'];
        $password = $_POST['password'];

        // SQL injection prevention
        $accountId = $conn->real_escape_string($accountId);
        $password = $conn->real_escape_string($password);

        $sql = "SELECT * FROM users WHERE `Account ID` = '$accountId' AND `Password` = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['accountId'] = $accountId;
            header("Location: index.php"); 
            exit(); 
        } else {
            echo "<script>alert('Invalid Account ID or Password');</script>";
            echo "<script>window.location.href = 'register.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Please enter both Account ID and Password');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login page for PrecisionCare Hospital's Clinic Management System.">
    <title>Login - PrecisionCare Hospital</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>
    <div class="logo">
        <img src="assets/img/bcp logo.png" alt="Logo">
        <p>Clinic Management System</p> 
    </div>
    
    <div class="login-container">
        <h2>Log Into Your Account</h2>
        <form id="loginForm" action="register.php" method="post">
            <label for="accountId">Account ID</label>
            <input type="text" id="accountId" name="accountId" required aria-label="Account ID">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required aria-label="Password">

            <div class="forgot-password">
                <a href="#" aria-label="Forgot password?">Forgot your password?</a>
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
