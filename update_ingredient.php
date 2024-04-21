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
    // Validate and sanitize input
    $id = $_POST['ingredient_id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $quantity = $_POST['quantity'];
    $unit = $_POST['unit'];
    $supplier_id = $_POST['supplier_id'];

    $id = trim($id);
    $name = trim($name);
    $type = trim($type);
    $quantity = trim($quantity);
    $unit = trim($unit);
    $supplier_id = trim($supplier_id);

    // Check if ingredient ID is a positive integer
    if (!ctype_digit($id) || $id <= 0) {
        die("Error: Invalid ingredient ID format. Please enter a positive integer.");
    }

    // Check if ingredient ID exists in the database
    $sql = "SELECT * FROM ingredient WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Ingredient ID does not exist.");
    }
    $stmt->close();

    // Validate quantity as a valid decimal number
    if (!is_numeric($quantity) || $quantity <= 0) {
        die("Error: Invalid quantity format. Please enter a positive number.");
    }

    // Check if supplier ID is a positive integer
    if (!ctype_digit($supplier_id) || $supplier_id <= 0) {
        die("Error: Invalid supplier ID format. Please enter a positive integer.");
    }

    // Check if supplier ID exists in the database
    $sql = "SELECT * FROM supplier WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Supplier ID does not exist.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE ingredient SET name=?, type=?, quantity=?, unit=?, supplier_id=? WHERE id=?");
    $stmt->bind_param("ssdsii", $name, $type, $quantity, $unit, $supplier_id, $id);

    // Execute
    if ($stmt->execute()) {
        echo "Ingredient updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
