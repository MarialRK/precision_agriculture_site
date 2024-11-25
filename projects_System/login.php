<?php
session_start();

// Clear dashboard flag
unset($_SESSION['is_dashboard']);

// If the user is already logged in, redirect them to their dashboard
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin.php");
    } else {
        header("Location: farmer.php");
    }
    exit();
}



 include 'includes/header.php';

 include 'includes/config.php'; 

?>

<div class="container py-5">
    <div class="auth-form">
        <h2 class="text-center"><i class="fas fa-sign-in-alt"></i> Login</h2>
        <form action="login_action.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" id="loginUsername" name="username" class="form-control" placeholder="Username" required>
                <label for="loginUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" id="loginPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="loginPassword">Password</label>
            </div>
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-sign-in-alt"></i> Login</button>
            <p class="text-center mt-3">Don't have an account? <a href="register.php">Register here</a></p>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
