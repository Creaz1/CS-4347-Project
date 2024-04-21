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

// Check if form is submitted for dish addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['dish_name'];
    $category = $_POST['dish_category'];
    $price = $_POST['dish_price'];
    $cooking_time = $_POST['dish_cooking_time'];

    // Validate and sanitize input
    $name = trim($name);
    $category = trim($category);
    $price = trim($price);
    $cooking_time = trim($cooking_time);

    // Check if data is retrieved from the form
    if (empty($name) || empty($category) || empty($price) || empty($cooking_time)) {
        die("Error: Name, category, price, or cooking time is empty.");
    }

    // Validate cooking time format (positive integer)
    if (!ctype_digit($cooking_time) || $cooking_time <= 0) {
        die("Error: Invalid cooking time format. Please enter a positive integer.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO dish (name, category, price, cookingTime) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $name, $category, $price, $cooking_time);

    // Execute
    if ($stmt->execute()) {
        echo "New dish added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
