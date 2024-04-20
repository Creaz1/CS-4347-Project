<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch the last ID from the table
    $sql_last_id = "SELECT MAX(id) as max_id FROM chef";
    $result_last_id = $conn->query($sql_last_id);
    $row_last_id = $result_last_id->fetch_assoc();
    $last_id = $row_last_id['max_id'];
    // Increment the last ID to generate the new ID
    $new_id = $last_id + 1;

    // Prepare data for insertion
    $chef_id = $new_id;
    $chef_name = $_POST['chef_name'];
    $chef_email = $_POST['chef_email'];
    $chef_phone_number = $_POST['chef_phone_number'];

    // Prepare SQL statement
    $sql = "INSERT INTO chef (id, name, email, phoneNumber) VALUES (?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $chef_id, $chef_name, $chef_email, $chef_phone_number);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New chef added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
