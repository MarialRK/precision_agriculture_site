<?php
session_start();

// Clear dashboard flag
unset($_SESSION['is_dashboard']);

// Include the header
include 'includes/header.php';
?>




<?php include 'includes/config.php'; ?>

<div class="container py-5">
    <div class="auth-form">
        <h2 class="text-center"><i class="fas fa-user-plus"></i> Register</h2>
        <form action="register_action.php" method="POST">
            <div class="form-floating mb-3">
                <input type="text" id="registerUsername" name="username" class="form-control" placeholder="Username" required>
                <label for="registerUsername">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" id="registerEmail" name="email" class="form-control" placeholder="Email">
                <label for="registerEmail">Email (optional)</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" id="registerPhone" name="phone" class="form-control" placeholder="Phone Number" required>
                <label for="registerPhone">Phone Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" id="registerPassword" name="password" class="form-control" placeholder="Password" required>
                <label for="registerPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <select id="registerRole" name="role" class="form-select">
                    <option value="farmer" selected>Farmer</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="registerRole">Role</label>
            </div>
            <div class="form-floating mb-3">
                <select id="languageSelect" name="language" class="form-select" required>
                    <option value="en" selected>English</option>
                    <option value="ar">Arabic</option>
                    <option value="din">Dinka</option>
                </select>
                <label for="languageSelect">Select Language</label>
            </div>
            <button type="submit" class="btn btn-success w-100"><i class="fas fa-save"></i> Register</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
