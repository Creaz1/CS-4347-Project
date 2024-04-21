<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "restaurant";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate and sanitize input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check if data is retrieved from the form
    if (empty($username) || empty($password)) {
        die("Error: Username or password is empty.");
    }

    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Error: Invalid username or password.";
    }

    // Close connection
    $conn->close();
}