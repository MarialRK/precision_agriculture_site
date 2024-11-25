<?php
// Include the database connection
include 'includes/config.php';

// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input values and sanitize them
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate the input fields
    if (empty($username) || empty($password)) {
        die("Please fill in both fields.");
    }

    // Query to fetch the user's data based on the entered username
    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Verify the entered password against the stored hashed password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['user_id'];       // Store user ID
            $_SESSION['username'] = $user['username']; // Store username
            $_SESSION['role'] = $user['role'];       // Store user role
            $_SESSION['language'] = $user['language']; // Store preferred language

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: admin.php");
            } else {
                header("Location: farmer.php");
            }
            exit();
        } else {
            die("Incorrect username or password.");
        }
    } else {
        die("User not found.");
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
