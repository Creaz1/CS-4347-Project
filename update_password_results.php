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
    $password = trim($_POST['old_password']);
    $new_password = trim($_POST['new_password']);

    // Check if data is retrieved from the form
    if (empty($username) || empty($password)) {
        die("Error: Username or password is empty.");
    }

    // Update the password
    $sql = "UPDATE admin SET password = '$new_password' WHERE username = '$username' AND password = '$password'";
    if ($conn->query($sql) === TRUE) {
        // check if password is updated successfully or not
        if ($conn->affected_rows > 0) {
            echo "Password updated successfully.";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Error updating password: " . $conn->error;
    }
}