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

// Check if form is submitted for ingredient assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $ingredient_id = $_POST['ingredient_id'];
    $dish_id = $_POST['dish_id'];

    $ingredient_id = trim($ingredient_id);
    $dish_id = trim($dish_id);

    // Check if ingredient ID and dish ID are positive integers
    if (!ctype_digit($ingredient_id) || $ingredient_id <= 0 || !ctype_digit($dish_id) || $dish_id <= 0) {
        die("Error: Invalid IDs. Please enter positive integers for both ingredient ID and dish ID.");
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

    // Check if dish ID exists in the database
    $sql = "SELECT * FROM dish WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $dish_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Dish ID does not exist.");
    }
    $stmt->close();

    // Check if the assignment already exists
    $sql = "SELECT * FROM used_in WHERE ingredient_id = ? AND dish_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $ingredient_id, $dish_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Error: The ingredient is already assigned to this dish.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO used_in (ingredient_id, dish_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $ingredient_id, $dish_id);

    // Execute
    if ($stmt->execute()) {
        echo "Ingredient assigned to dish successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
