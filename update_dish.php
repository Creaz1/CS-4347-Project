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

// Check if form is submitted for dish update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE dish SET name=? WHERE id=?");
    $stmt->bind_param("si", $name, $id);

    // Execute
    if ($stmt->execute()) {
        echo "dish updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
