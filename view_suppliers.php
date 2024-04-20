<html>
<!-- Supplier: Supplier Name, Supplier Email, Supplier Phone Number -->

<head>
    <title>View Suppliers</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
    $dbname = "test";

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
            echo "<td>" . $row["supplier_id"] . "</td>";
            echo "<td>" . $row["supplier_name"] . "</td>";
            echo "<td>" . $row["supplier_email"] . "</td>";
            echo "<td>" . $row["supplier_phone"] . "</td>";
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