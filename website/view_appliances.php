
<html>
    <head>
        <title>View Appliances</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
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
        <h1>View Appliances</h1>
        <!-- <table>
            <tr>
                <th>Appliance ID</th>
                <th>Appliance Name</th>
                <th>Appliance Status</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Stove</td>
                <td>Working</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Oven</td>
                <td>Not Working</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Refrigerator</td>
                <td>Working</td>
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

            // Prepare SQL statement
            $sql = "SELECT * FROM appliance";

            // Execute the statement
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Appliance ID</th>";
                echo "<th>Appliance Name</th>";
                echo "<th>Appliance Status</th>";
                echo "</tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
        ?>
    </body>
</html>