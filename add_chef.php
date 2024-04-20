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

// Check if form is submitted for chef addition
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['chef_name'];
    $email = $_POST['chef_email'];
    $phone = $_POST['chef_phone_number'];

    // Validate and sanitize input
    $name = trim($name);
    $email = trim($email);
    $phone = trim($phone);

    // Check if data is retrieved from the form
    if (empty($name) || empty($email) || empty($phone)) {
        die("Error: Name, email, or phone number is empty.");
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Error: Invalid email format.");
    }

    // Validate phone number format (Example format: XXX-XXX-XXXX)
    if (!preg_match("/^\d{3}-\d{3}-\d{4}$/", $phone)) {
        die("Error: Invalid phone number format. Please use XXX-XXX-XXXX format.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO chef (name, email, phoneNumber) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);

    // Execute
    if ($stmt->execute()) {
        echo "New chef added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
