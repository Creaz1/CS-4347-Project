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

// Check if form is submitted for appliance assignment
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $appliance_id = $_POST['appliance_id'];
    $dish_id = $_POST['dish_id'];

    $appliance_id = trim($appliance_id);
    $dish_id = trim($dish_id);

    // Check if appliance ID and dish ID are positive integers
    if (!ctype_digit($appliance_id) || $appliance_id <= 0 || !ctype_digit($dish_id) || $dish_id <= 0) {
        die("Error: Invalid IDs. Please enter positive integers for both appliance ID and dish ID.");
    }

    // Check if appliance ID exists in the database
    $sql = "SELECT * FROM appliance WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $appliance_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        die("Error: Appliance ID does not exist.");
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
    $sql = "SELECT * FROM cooked_using WHERE appliance_id = ? AND dish_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $appliance_id, $dish_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        die("Error: The appliance is already assigned to this dish.");
    }
    $stmt->close();

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO cooked_using (appliance_id, dish_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $appliance_id, $dish_id);

    // Execute
    if ($stmt->execute()) {
        echo "Appliance assigned to dish successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
