<html>
<!-- Supplier: Supplier Name, Supplier Email, Supplier Phone Number -->

<head>
    <title>View Suppliers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- import index.css -->
        <link rel="stylesheet" href="index.css">
</head>

<body>
    <h1>View Suppliers</h1>
    <!-- <table>
        <tr>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Supplier Email</th>
            <th>Supplier Phone Number</th>
        </tr>
        <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>John.Doe@gmail.com</td>
            <td>123-456-7890</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>Jane.Smith@gmail.com</td>
            <td>098-765-4321</td>
        </tr>
    </table> -->
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

    // SQL query
    $sql = "SELECT * FROM supplier";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Supplier ID</th>";
        echo "<th>Supplier Name</th>";
        echo "<th>Supplier Email</th>";
        echo "<th>Supplier Phone Number</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phoneNumber"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>

</html>