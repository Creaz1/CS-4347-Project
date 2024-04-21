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

// Check if form is submitted for appliance update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $appliance_id = $_POST['appliance_id'];
    $new_name = $_POST['name'];
    $new_status = $_POST['status'];

    $appliance_id = trim($appliance_id);
    $new_name = trim($new_name);
    $new_status = trim($new_status);

    // Check if appliance ID is a positive integer
    if (!ctype_digit($appliance_id) || $appliance_id <= 0) {
        die("Error: Invalid appliance ID format. Please enter a positive integer.");
    }

    // Check if appliance ID exists in the database
    $sql = "SELECT * FROM appliance WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appliance_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Appliance ID does not exist.");
    }
    $stmt->close();

    // Update the appliance
    $sql = "UPDATE appliance SET name=?, status=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_name, $new_status, $appliance_id);

    if ($stmt->execute()) {
        echo "Appliance updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
