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
    // Validate and sanitize input
    $id = $_POST['dish_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $cookingTime = $_POST['cooking_time'];

    $id = trim($id);
    $name = trim($name);
    $category = trim($category);
    $price = trim($price);
    $cookingTime = trim($cookingTime);

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

    // Validate price as a valid decimal number
    if (!is_numeric($price) || $price <= 0) {
        die("Error: Invalid price format. Please enter a positive number.");
    }

    // Validate cooking time as a valid integer
    if (!ctype_digit($cookingTime) || $cookingTime <= 0) {
        die("Error: Invalid cooking time format. Please enter a positive integer.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE dish SET name=?, category=?, price=?, cookingTime=? WHERE id=?");
    $stmt->bind_param("ssdsi", $name, $category, $price, $cookingTime, $id);

    // Execute
    if ($stmt->execute()) {
        echo "Dish updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
