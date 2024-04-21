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

// Check if form is submitted for ingredient addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table = $_POST['table'];
    $first = $_POST['first_id'];
    $second = $_POST['second_id'];

    // Validate and sanitize input
    $table = trim($table);
    $first = trim($first);
    $second = trim($second);

    // Check if data is retrieved from the form
    if (empty($table) || empty($first) || empty($second)) {
        die("Error: Table, first ID, or second ID field left empty.");
    }

    // Validate quantity format (positive float number)
    if (!ctype_digit($first) || $first <= 0) {
        die("Error: Invalid first ID. Please enter a positive number.");
    }

    // Validate supplier ID format (positive integer)
    if (!ctype_digit($second) || $second <= 0) {
        die("Error: Invalid second ID. Please enter a positive integer.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO $table VALUES ($first, $second)");

    // Execute
    if ($stmt->execute()) {
        echo "New relation added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
