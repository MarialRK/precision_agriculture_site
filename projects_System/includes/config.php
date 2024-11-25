<?php
// Database connection settings
$host = 'localhost';        // Database host
$dbname = 'precision_agriculture';  // Database name
$username = 'root';         // MySQL username (default is 'root')
$password = '';             // MySQL password (leave empty if none)

// Create a new MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Uncomment the line below to check if connection was successful
// echo "Connected successfully";
?>
