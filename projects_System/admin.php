<?php
session_start();

// Check if the user is logged in and has the 'admin' role
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    // If the user is not logged in or doesn't have 'admin' role, redirect to login page
    header("Location: login.php");
    exit();  // Stop further script execution

}

// Set a flag to identify dashboard pages
$_SESSION['is_dashboard'] = true;

include 'includes/header.php';
?>


 

<div class="container py-5">
    <h2 class="text-center mb-4"><i class="fas fa-users-cog"></i> Admin Dashboard</h2>
    
    <div class="row">
        <!-- Manage Farmers -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manage Farmers</h5>
                    <p class="card-text">View, edit, and manage all farmer accounts in the system.</p>
                    <button class="btn btn-success"><i class="fas fa-user-cog"></i> Manage Farmers</button>
                </div>
            </div>
        </div>

        <!-- System Settings -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">System Settings</h5>
                    <p class="card-text">Configure system-wide settings and user permissions.</p>
                    <button class="btn btn-success"><i class="fas fa-tools"></i> System Settings</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
