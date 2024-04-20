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
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO dish (name, category, price, cooking_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $category, $price, $cooking_time);

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
