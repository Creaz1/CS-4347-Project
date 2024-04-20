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
    // Additional fields as necessary

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
