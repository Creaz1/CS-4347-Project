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

// Check if form is submitted for specialty assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $chef_id = $_POST['chef_id'];
    $specialty = $_POST['specialty'];

    $chef_id = trim($chef_id);
    $specialty = trim($specialty);

    // Check if chef ID is a positive integer
    if (!ctype_digit($chef_id) || $chef_id <= 0) {
        die("Error: Invalid chef ID. Please enter a positive integer.");
    }

    // Check if chef ID exists in the database
    $sql = "SELECT * FROM chef WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $chef_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Chef ID does not exist.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO specialties (chef_id, specialty) VALUES (?, ?)");
    $stmt->bind_param("is", $chef_id, $specialty);

    // Execute
    if ($stmt->execute()) {
        echo "Specialty assigned to chef successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
