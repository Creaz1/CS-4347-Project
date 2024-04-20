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

    // Validate and sanitize input
    $id = trim($id);

    // Check if dish ID is a positive integer
    if (!ctype_digit($id) || $id <= 0) {
        die("Error: Invalid dish ID format. Please enter a positive integer.");
    }

    // Check if dish ID exists in the database
    $sql = "SELECT * FROM dish WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Dish ID does not exist.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM dish WHERE id=?");
    $stmt->bind_param("i", $id);

    // Execute
    if ($stmt->execute()) {
        echo "Dish deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
