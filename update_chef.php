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

// Check if form is submitted for chef update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['chef_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone_number'];

    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE chef SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);

    // Execute
    if ($stmt->execute()) {
        echo "chef updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
