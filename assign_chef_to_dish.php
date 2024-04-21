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

// Check if form is submitted for chef assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $chef_id = $_POST['chef_id'];
    $dish_id = $_POST['dish_id'];

    $chef_id = trim($chef_id);
    $dish_id = trim($dish_id);

    // Check if chef ID and dish ID are positive integers
    if (!ctype_digit($chef_id) || $chef_id <= 0 || !ctype_digit($dish_id) || $dish_id <= 0) {
        die("Error: Invalid IDs. Please enter positive integers for both chef ID and dish ID.");
    }

    // Check if chef ID exists in the database
    $sql = "SELECT * FROM chef WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $chef_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Chef ID does not exist.");
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
    $sql = "SELECT * FROM cooked_by WHERE dish_id = ? AND chef_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $dish_id, $chef_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Error: The chef is already assigned to this dish.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO cooked_by (dish_id, chef_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $dish_id, $chef_id);

    // Execute
    if ($stmt->execute()) {
        echo "Chef assigned to dish successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
