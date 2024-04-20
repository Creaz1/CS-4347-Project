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
    $id = $_POST['dish_id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $cookingTime = $_POST['cooking_time'];
    // Additional fields as necessary

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE dish SET name=?, category=?, price=?, cooking_time=? WHERE id=?");
    $stmt->bind_param("ssdsi", $name, $category, $price, $cookingTime, $id);

    // Execute
    if ($stmt->execute()) {
        echo "dish updated successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
