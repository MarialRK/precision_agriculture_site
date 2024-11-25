<?php
// Redirect to the login page
header("Location: login.php");
exit();

include 'includes/header.php'; 

include 'includes/config.php'; 

?>

<!-- Main Content -->
<div class="container py-5">
    <!-- Registration Form -->
    <div id="registerForm" class="auth-form">
        <?php include 'register.php'; ?>
    </div>

    <!-- Login Form -->
    <div id="loginForm" class="auth-form d-none">
        <?php include 'login.php'; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
