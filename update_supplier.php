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

// Check if form is submitted for supplier update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $id = $_POST['supplier_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    $id = trim($id);
    $name = trim($name);
    $email = trim($email);
    $phoneNumber = trim($phoneNumber);

    // Check if supplier ID is a positive integer
    if (!ctype_digit($id) || $id <= 0) {
        die("Error: Invalid supplier ID format. Please enter a positive integer.");
    }

    // Check if supplier ID exists in the database
    $sql = "SELECT * FROM supplier WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Supplier ID does not exist.");
    }
    $stmt->close();

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Validate phone number format (XXX-XXX-XXXX)
    if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phoneNumber)) {
        die("Error: Invalid phone number format. Please enter in XXX-XXX-XXXX format.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE supplier SET name=?, email=?, phoneNumber=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phoneNumber, $id);

    // Execute
    if ($stmt->execute()) {
        echo "Supplier updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
