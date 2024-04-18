<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data for insertion
    $appliance_name = $_POST['appliance_name'];
    $appliance_status = $_POST['appliance_status'];

    // Prepare SQL statement
    $sql = "INSERT INTO appliance (name, status) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $appliance_name, $appliance_status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
