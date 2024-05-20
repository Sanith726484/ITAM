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
            <div class="form">
                <form class="manual_form" action="update_assigned.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="employee_details_field">
                        <div>
                            <label for="employee_name">Employee Name:</label>
                            <input type="text" name="employee_name" value="<?php echo $row['employee_name']; ?>"><br>
                        </div>
                        <div>
                            <label for="position">Position:</label>
                            <input type="text" name="position" value="<?php echo $row['position']; ?>"><br>
                        </div>
                    </div>

                    <div class="employee_details_field">
                        <div>
                            <label for="department">Department:</label>
                            <input type="text" name="department" value="<?php echo $row['department']; ?>"><br>
                        </div>
                        <div>
                            <label for="issuance_date">Issuance Date:</label>
                            <input type="date" name="issuance_date" value="<?php echo $row['issuance_date']; ?>"><br>
                        </div>
                    </div>
                    
                    <div class="employee_details_field">
                        <div>
                            <label for="asset_type">Asset Type:</label>
                            <input type="text" name="asset_type" value="<?php echo $row['asset_type']; ?>"><br>
                        </div>
                        <div>
                            <label for="device_model">Device Model:</label>
                            <input type="text" name="device_model" value="<?php echo $row['device_model']; ?>"><br>
                        </div>
                    </div>

                    <div class="employee_details_field">
                        <div>
                            <label for="service_tag">Service Tag:</label>
                            <input type="text" name="service_tag" value="<?php echo $row['service_tag']; ?>"><br>
                        </div>
                        <div>
                            <label for="serial_number">Serial Number:</label>
                            <input type="text" name="serial_number" value="<?php echo $row['serial_number']; ?>"><br>
                        </div>
                    </div>

                    <div class="checkbox_fields">
                        <div>
                            <label for="mouse">Mouse:</label>
                            <input type="checkbox" name="mouse" value="Yes" <?php echo ($row['mouse'] == 'Yes') ? 'checked' : ''; ?>>
                        </div>
                        <div>
                            <label for="connector">Connector:</label>
                            <input type="checkbox" name="connector" value="Yes" <?php echo ($row['connector'] == 'Yes') ? 'checked' : ''; ?>>
                        </div>
                    </div>

                    <input class="submit_button" type="submit" value="Submit">
                </form>
            </div>
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