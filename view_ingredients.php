
<html>
    <!-- Ingredient:  Ingredient ID, Ingredient Name, Ingredient Type, Quantity on hand, Unit of measurement, Supplier ID -->
    <head>
        <title>View Ingredients</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- import index.css -->
        <link rel="stylesheet" href="index.css">
    </head>
    <body>
        <h1>View Ingredients</h1>
        <!-- <table>
            <tr>
                <th>Ingredient ID</th>
                <th>Ingredient Name</th>
                <th>Ingredient Type</th>
                <th>Quantity on hand</th>
                <th>Unit of measurement</th>
                <th>Supplier ID</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Tomato</td>
                <td>Vegetable</td>
                <td>10</td>
                <td>lbs</td>
                <td>1</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Chicken</td>
                <td>Meat</td>
                <td>5</td>
                <td>lbs</td>
                <td>2</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Flour</td>
                <td>Grain</td>
                <td>20</td>
                <td>lbs</td>
                <td>3</td>
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
            $sql = "SELECT * FROM ingredient";

            // Execute the statement
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Ingredient ID</th>";
                echo "<th>Ingredient Name</th>";
                echo "<th>Ingredient Type</th>";
                echo "<th>Quantity on hand</th>";
                echo "<th>Unit of measurement</th>";
                echo "<th>Supplier ID</th>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ingredient_id"] . "</td>";
                    echo "<td>" . $row["ingredient_name"] . "</td>";
                    echo "<td>" . $row["ingredient_type"] . "</td>";
                    echo "<td>" . $row["quantity_on_hand"] . "</td>";
                    echo "<td>" . $row["unit_of_measurement"] . "</td>";
                    echo "<td>" . $row["supplier_id"] . "</td>";
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