<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>priority complains</title>
</head>
<body>
<div>
    <?php
        // Establish a connection to your database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch everything from the priority column in the complaints table
        $sql = "SELECT priority FROM complaints";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo $row["priority"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    ?>
    </div></p>
</div>

</body>
</html>