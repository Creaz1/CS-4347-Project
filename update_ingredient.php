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

// Check if form is submitted for ingredient update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['ingredient_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $supplier_id = $_POST['supplier_id'];
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE ingredient SET name=?, type=?, quantity=?, unit=?, supplier_id=? WHERE id=?");
    $stmt->bind_param("ssdsii", $name, $type, $quantity, $unit, $supplier_id, $id);

    // Execute
    if ($stmt->execute()) {
        echo "ingredient updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
