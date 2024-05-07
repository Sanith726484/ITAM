<?php
session_start();

// Check if admin is already logged in, redirect to dashboard if yes
if(isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

// Check if the login form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if(validateAdmin($username, $password)) {
        // Admin is authenticated, set session and redirect to dashboard
        $_SESSION['admin_id'] = $username;
        header("Location: dashboard.php");
        exit;
    } else {
        // Invalid credentials, show error message
        $error_message = "Invalid username or password";
    }
}

// Function to validate admin credentials
function validateAdmin($username, $password) {
    // Query the database to check if the provided credentials are valid
    // Replace this with your actual database query
    $valid_username = "admin"; // Example username
    $valid_password = "password"; // Example password

    // Check if the provided credentials match the valid credentials
    if($username == $valid_username && $password == $valid_password) {
        return true;
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <?php if(isset($error_message)) echo "<p>$error_message</p>"; ?>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
