<?php
session_start();  // Start the session
include 'includes/config.php';  // Include database connection


// Check if the user is logged in and has the 'farmer' role
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'farmer') {
    header("Location: login.php");
    exit();
}

// Set a flag to identify dashboard pages
$_SESSION['is_dashboard'] = true;

include 'includes/header.php';  // Include header for farmer page
?>



<div class="container py-5">
    <h2 class="text-center mb-4"><i class="fas fa-tachometer-alt"></i> Farmer Dashboard</h2>
    <div class="row">
        <!-- Soil Health Monitoring -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Soil Health Monitoring</h5>
                    <p class="card-text">View real-time soil conditions, including moisture and nutrients.</p>
                    <button class="btn btn-success"><i class="fas fa-eye"></i> View Soil Data</button>
                </div>
            </div>
        </div>

        <!-- Weather Updates -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Weather Updates</h5>
                    <p class="card-text">Access the latest weather information to plan your farming activities.</p>
                    <button class="btn btn-success"><i class="fas fa-cloud-sun"></i> View Weather</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
