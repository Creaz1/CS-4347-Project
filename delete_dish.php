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

// Check if form is submitted for dish deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['dish_id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM dish WHERE id=?");
    $stmt->bind_param("i", $id);

    // Execute
    if ($stmt->execute()) {
        echo "dish deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
