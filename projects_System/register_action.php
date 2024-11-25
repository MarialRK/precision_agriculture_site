<?php
// Include the database connection
include 'includes/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form input values and sanitize them
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);

    // Validate the fields (e.g., make sure the fields are not empty)
    if (empty($username) || empty($password) || empty($phone)) {
        die("Please fill all required fields.");
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user into the database
    $sql = "INSERT INTO users (username, email, phone, password, role, language) 
            VALUES ('$username', '$email', '$phone', '$hashed_password', '$role', '$language')";

    if (mysqli_query($conn, $sql)) {
        // If registration is successful, check the user's role and redirect to the appropriate dashboard
        session_start();  // Start the session to store user data

        // Query to fetch the inserted user's data
        $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        // Store user data in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['language'] = $user['language'];

        // Redirect based on role
        if ($user['role'] == 'admin') {
            header("Location: admin.php");
        } else {
            header("Location: farmer.php");
        }
        exit();  // Ensure no further code is executed
    } else {
        // If there was an error inserting into the database, display an error message
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
