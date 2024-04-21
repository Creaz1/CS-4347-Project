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

// Check if form is submitted for diet restriction assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $ingredient_id = $_POST['ingredient_id'];
    $restriction = $_POST['restriction'];

    $ingredient_id = trim($ingredient_id);
    $restriction = trim($restriction);

    // Check if ingredient ID is a positive integer
    if (!ctype_digit($ingredient_id) || $ingredient_id <= 0) {
        die("Error: Invalid ingredient ID. Please enter a positive integer.");
    }

    // Check if ingredient ID exists in the database
    $sql = "SELECT * FROM ingredient WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $ingredient_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Ingredient ID does not exist.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO diet_restrictions (ingredient_id, restriction) VALUES (?, ?)");
    $stmt->bind_param("is", $ingredient_id, $restriction);

    // Execute
    if ($stmt->execute()) {
        echo "Diet restriction assigned to ingredient successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
