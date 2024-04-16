<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Asset</title>
</head>
<body>
    <h1>Edit Asset</h1>
    <?php
    // Check if ID parameter is provided in the URL
    if (isset($_GET['id'])) {
        // Get the asset ID from the URL
        $asset_id = $_GET['id'];

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

        // SQL query to fetch asset details by ID
        $sql = "SELECT * FROM asset_issuance WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $asset_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Asset found, display edit form
            $row = $result->fetch_assoc();
    ?>
            <form action="update_assigned.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <label for="employee_name">Employee Name:</label>
                <input type="text" name="employee_name" value="<?php echo $row['employee_name']; ?>"><br>

                <label for="department">Department:</label>
                <input type="text" name="department" value="<?php echo $row['department']; ?>"><br>

                <label for="position">Position:</label>
                <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>

                <label for="issuance_date">Issuance Date:</label>
                <input type="date" name="issuance_date" value="<?php echo $row['issuance_date']; ?>"><br>

                <label for="asset_type">Asset Type:</label>
                <input type="text" name="asset_type" value="<?php echo $row['asset_type']; ?>"><br>

                <label for="serial_number">Serial Number:</label>
                <input type="text" name="serial_number" value="<?php echo $row['serial_number']; ?>"><br>

                <label for="asset_condition">Asset Condition:</label>
                <input type="text" name="asset_condition" value="<?php echo $row['asset_condition']; ?>"><br>

                <label for="employee_signature">Employee Signature:</label>
                <input type="text" name="employee_signature" value="<?php echo $row['employee_signature']; ?>"><br>

                <label for="employee_signature_date">Employee Signature Date:</label>
                <input type="date" name="employee_signature_date" value="<?php echo $row['employee_signature_date']; ?>"><br>

                <label for="device_model">Device Model:</label>
                <input type="text" name="device_model" value="<?php echo $row['device_model']; ?>"><br>

                <label for="service_tag">Service Tag:</label>
                <input type="text" name="service_tag" value="<?php echo $row['service_tag']; ?>"><br>

                <label for="laptop_bag">Laptop Bag:</label>
                <input type="checkbox" name="laptop_bag" value="Yes" <?php echo ($row['laptop_bag'] == 'Yes') ? 'checked' : ''; ?>>
                <label for="laptop_bag">Laptop Bag</label><br>

                <label for="mouse">Mouse:</label>
                <input type="checkbox" name="mouse" value="Yes" <?php echo ($row['mouse'] == 'Yes') ? 'checked' : ''; ?>>
                <label for="mouse">Mouse</label><br>

                <label for="connector">Connector:</label>
                <input type="checkbox" name="connector" value="Yes" <?php echo ($row['connector'] == 'Yes') ? 'checked' : ''; ?>>
                <label for="connector">Connector</label><br>
                <input type="submit" value="Update">
            </form>
    <?php
        } else {
            echo "Asset not found.";
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Asset ID not provided.";
    }
    ?>
</body>
</html>
