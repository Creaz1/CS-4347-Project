
<html>
    <head>
        <title>View Chefs</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
            rel="stylesheet">
        <!-- import index.css -->
        <link rel="stylesheet" href="index.css">
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