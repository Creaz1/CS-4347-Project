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
    $sql_last_id = "SELECT MAX(id) as max_id FROM appliance";
    $result_last_id = $conn->query($sql_last_id);
    $row_last_id = $result_last_id->fetch_assoc();
    $last_id = $row_last_id['max_id'];
    // Increment the last ID to generate the new ID
    $new_id = $last_id + 1;

    // Prepare data for insertion
    $appliance_id = $new_id;
    $appliance_name = $_POST['appliance_name'];
    $appliance_status = $_POST['appliance_status'];

    // Prepare SQL statement
    $sql = "INSERT INTO appliance (id, name, status) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $appliance_id, $appliance_name, $appliance_status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
