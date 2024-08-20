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
        <form id="loginForm">
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