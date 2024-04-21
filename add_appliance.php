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
    $appliance_name = trim($_POST['appliance_name']);
    $appliance_status = trim($_POST['appliance_status']);

    // Check if data is retrieved from the form
    if (empty($appliance_name) || empty($appliance_status)) {
        die("Error: Appliance name or status is empty.");
    }

    // Validate input format
    if (!preg_match("/^[a-zA-Z0-9 ]*$/", $appliance_name)) {
        die("Error: Appliance name contains invalid characters.");
    }
    if (!in_array($appliance_status, array('Functional', 'Non-Functional'))) {
        die("Error: Appliance status is invalid.");
    }

    // Prepare SQL statement
    $sql = "INSERT INTO appliance (name, status) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Error: " . $conn->error);
    }
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
