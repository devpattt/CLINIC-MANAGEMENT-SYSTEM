<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PrecisionCare Hospital</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>

body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.logo {
    margin-bottom: 20px;
}

.logo img {
    width: 60px;
    height: auto;
}

.login-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    border: 1px solid #ddd; 
}

h2 {
    color: #333;
    margin-bottom: 20px;
}

label {
    display: block;
    text-align: left;
    color: #333;
    margin: 10px 0 5px;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

.forgot-password {
    text-align: right;
    margin-bottom: 20px;
}

.forgot-password a {
    color: #007BFF;
    text-decoration: none;
    font-size: 12px;
}

.forgot-password a:hover {
    text-decoration: underline;
}

button {
    background-color: #333;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    width: 100%;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #555;
}

</style>
<body>
    <!-- Logo at the top -->
    <div class="logo">
        <img src="assets/img/bcp logo.png" alt="Clinic Management System">
    </div>
    
    <!-- Container with form elements only -->
    <div class="login-container">
        <h2>Log Into Your Account</h2>
        <form id="loginForm">
            <label for="accountId">Account ID</label>
            <input type="text" id="accountId" name="accountId" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <div class="forgot-password">
                <a href="#">Forgot your password?</a>
            </div>

            <button type="submit">LOGIN</button>
        </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
