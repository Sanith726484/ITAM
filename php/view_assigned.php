<?php include 'header.php'; ?>
<?php
if (isset($_SESSION['message'])) {
    echo "<div class='message'>" . $_SESSION['message'] . "</div>";
    unset($_SESSION['message']); // Clear the message after displaying it
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assets</title>
</head>
<body>
    <h1>View Assets</h1>

    <!-- Export button -->
    <form action="export_assets.php" method="post">
        <button type="submit" name="export_assets">Export to CSV</button>
    </form>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Position</th>
            <th>Department</th>
            <th>Issuance Date</th>
            <th>Asset Type</th>
            <th>Device Model</th>
            <th>Service Tag</th>
            <th>Serial Number</th>
            <th>Mouse</th>
            <th>Connector</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        // Database connection parameters
        $servername = "mysql";
        $username = "navtech";
        $password = "navtech";
        $dbname = "asset_issuance_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch all assets
        $sql = "SELECT * FROM asset_issuance";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["employee_name"] . "</td>";
                echo "<td>" . $row["position"] . "</td>";
                echo "<td>" . $row["department"] . "</td>";
                echo "<td>" . $row["issuance_date"] . "</td>";
                echo "<td>" . $row["asset_type"] . "</td>";
                echo "<td>" . $row["device_model"] . "</td>";
                echo "<td>" . $row["service_tag"] . "</td>";
                echo "<td>" . $row["serial_number"] . "</td>";
                echo "<td>" . $row["mouse"] . "</td>";
                echo "<td>" . $row["connector"] . "</td>";
                echo "<td><a href='edit_assigned.php?id=" . $row["id"] . "'>Edit</a></td>";
                echo "<td><form action='delete_assigned.php' method='post'><input type='hidden' name='id' value='" . $row["id"] . "'><button type='submit' name='delete_assigned'>Delete</button></form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No assets found.</td></tr>";
        }

        // Close connection
        $conn->close();
        ?>
    </table>

</body>
</html>
