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
    $name = $_POST['ingredient_name'];
    $type = $_POST['ingredient_type'];
    $quantity = $_POST['ingredient_quantity'];
    $unit_of_measurement = $_POST['ingredient_unit_of_measurement'];
    $supplier_id = $_POST['ingredient_supplier_id'];

    // Validate and sanitize input
    $name = trim($name);
    $type = trim($type);
    $quantity = trim($quantity);
    $unit_of_measurement = trim($unit_of_measurement);
    $supplier_id = trim($supplier_id);

    // Check if data is retrieved from the form
    if (empty($name) || empty($type) || empty($quantity) || empty($unit_of_measurement) || empty($supplier_id)) {
        die("Error: Name, type, quantity, unit of measurement, or supplier ID is empty.");
    }

    // Validate quantity format (positive float number)
    if (!is_numeric($quantity) || $quantity <= 0) {
        die("Error: Invalid quantity format. Please enter a positive number.");
    }

    // Validate supplier ID format (positive integer)
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
    $stmt = $conn->prepare("INSERT INTO ingredient (name, type, quantity, unit, supplierID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdsi", $name, $type, $quantity, $unit_of_measurement, $supplier_id);

    // Execute
    if ($stmt->execute()) {
        echo "New ingredient added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
