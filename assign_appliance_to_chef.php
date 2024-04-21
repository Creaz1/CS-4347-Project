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

// Check if form is submitted for appliance assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $appliance_id = $_POST['appliance_id'];
    $chef_id = $_POST['chef_id'];

    $appliance_id = trim($appliance_id);
    $chef_id = trim($chef_id);

    // Check if appliance ID and chef ID are positive integers
    if (!ctype_digit($appliance_id) || $appliance_id <= 0 || !ctype_digit($chef_id) || $chef_id <= 0) {
        die("Error: Invalid IDs. Please enter positive integers for both appliance ID and chef ID.");
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

    // Check if the assignment already exists
    $sql = "SELECT * FROM used_by WHERE appliance_id = ? AND chef_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $appliance_id, $chef_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Error: The appliance is already assigned to this chef.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO used_by (appliance_id, chef_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $appliance_id, $chef_id);

    // Execute
    if ($stmt->execute()) {
        echo "Appliance assigned to chef successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
