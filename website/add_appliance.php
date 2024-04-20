<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare data for insertion

    // echo all $_POST variables
    foreach ($_POST as $key => $value) {
        echo $key . " = " . $value . "<br>";
    }

    $appliance_name = $_POST['appliance_name'];
    $appliance_status = $_POST['appliance_status'];
    // $id = $_POST['appliance_id'];

    // get count of rows in the table
    $sql = "SELECT COUNT(*) FROM appliance";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $id = $row['COUNT(*)'] + 1;

    // Prepare SQL statement
    $sql = "INSERT INTO appliance (id, name, status) VALUES (?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dss", $id, $appliance_name, $appliance_status);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "#success");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        header('Location: ' . $_SERVER['HTTP_REFERER'] . "#error");
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
else {
    echo "Form is not submitted";
    header('Location: ' . $_SERVER['HTTP_REFERER'] . "#error");
}

?>
