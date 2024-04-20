
<html>
    <head>
        <title>View Appliances</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- import index.css -->
        <link rel="stylesheet" href="index.css">
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