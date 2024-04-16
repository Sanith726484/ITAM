<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assets Stock</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }

        .menu {
            display: flex;
            gap: 32px;
        }
    </style>
</head>
<body>
    <div class="menu">
        <form action="index.php" method="get">
            <button type="submit">Assign New Asset</button>
        </form>
        
        <form action="assets_stock.php" method="get">
            <button type="submit">Update Inventory/stock</button>
        </form>
    </div>

    <h1>View Inventory/Assets Stock</h1>
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

    $sql = "CREATE TABLE IF NOT EXISTS stock_update (
        id INT AUTO_INCREMENT PRIMARY KEY,
        Name VARCHAR(255),
        Type VARCHAR(255),
        Serial_number VARCHAR(255),
        Configuration VARCHAR(255),
        Performance VARCHAR(255),
        Status VARCHAR(255),
        Comments VARCHAR(255)
    )";
    
    // Execute SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Table stock_update created or already exists";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    

    // Check if delete request is submitted
    if(isset($_POST['delete']) && isset($_POST['delete_id'])){
        $delete_id = $_POST['delete_id'];
        $sql_delete = "DELETE FROM stock_update WHERE id = ?";
        
        // Prepare the delete statement
        $stmt = $conn->prepare($sql_delete);
        if (!$stmt) {
            echo "Error preparing delete statement: " . $conn->error;
        } else {
            // Bind the delete_id parameter
            $stmt->bind_param("i", $delete_id);
    
            // Execute the delete statement
            if($stmt->execute()) {
                echo "<p>Record deleted successfully</p>";
            } else {
                echo "Error deleting record: " . $stmt->error;
            }
    
            // Close the statement
            $stmt->close();
        }
    }

    // SQL query to select all records from stock_update table
    $sql = "SELECT * FROM stock_update";

    // Execute SQL query
    $result = $conn->query($sql);

    // Check if any records were returned
    if ($result->num_rows > 0) {
        // Output data of each row in a table
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Type</th><th>Serial Number</th><th>Configuration</th><th>Performance</th><th>Status</th><th>Comments</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["Name"] . "</td>
                <td>" . $row["Type"] . "</td>
                <td>" . $row["Serial_number"] . "</td>
                <td>" . $row["Configuration"] . "</td>
                <td>" . $row["Performance"] . "</td>
                <td>" . $row["Status"] . "</td>
                <td>" . $row["Comments"] . "</td>
                <td>";
                echo "<form method='post'>";
                if(isset($row["id"])) {
                    echo "<input type='hidden' name='delete_id' value='" . $row["id"] . "'>";
                }
                echo "<button type='submit' name='delete'>Delete</button>";
                echo "</form>";
                echo "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found";
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
