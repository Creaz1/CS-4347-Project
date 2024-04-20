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
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO ingredient (name, type, quantity, unit, supplierID) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssdss", $name, $type, $quantity, $unit_of_measurement, $supplier_id);

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
