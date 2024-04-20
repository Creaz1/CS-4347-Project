
<html>
    <!-- Dish: Name, Category, Price, Cooking Time -->
    <head>
        <title>View Dishes</title>
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
        <h1>View Dishes</h1>
        <!-- <table>
            <tr>
                <th>Dish ID</th>
                <th>Dish Name</th>
                <th>Dish Category</th>
                <th>Dish Price</th>
                <th>Dish Cooking Time</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Spaghetti</td>
                <td>Pasta</td>
                <td>$10.00</td>
                <td>30 minutes</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Chicken Alfredo</td>
                <td>Pasta</td>
                <td>$12.00</td>
                <td>45 minutes</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Chicken Parmesan</td>
                <td>Chicken</td>
                <td>$15.00</td>
                <td>45 minutes</td>
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
            $sql = "SELECT * FROM dish";

            // Execute the statement
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Dish ID</th>";
                echo "<th>Dish Name</th>";
                echo "<th>Dish Category</th>";
                echo "<th>Dish Price</th>";
                echo "<th>Dish Cooking Time</th>";
                echo "</tr>";

                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['category'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['cooking_time'] . "</td>";
                    echo "</tr>";
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