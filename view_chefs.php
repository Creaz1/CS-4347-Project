
<html>
    <head>
        <title>View Chefs</title>
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
        <h1>View Chefs</h1>
        <!-- <table>
            <tr>
                <th>Chef ID</th>
                <th>Chef Name</th>
                <th>Chef Email</th>
                <th>Chef Phone Number</th>
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
            $sql = "SELECT * FROM chef";

            // Execute the SQL query
            $result = $conn->query($sql);

            // Display the results
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Chef ID</th><th>Chef Name</th><th>Chef Email</th><th>Chef Phone Number</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["chef_id"] . "</td><td>" . $row["chef_name"] . "</td><td>" . $row["chef_email"] . "</td><td>" . $row["chef_phone"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            // Close the connection
            $conn->close();
        ?>
    </body>
</html>