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
    $id = $_POST['supplier_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE supplier SET name=?, email=?, phone_number=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phoneNumber, $id);

    // Execute
    if ($stmt->execute()) {
        echo "supplier updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
