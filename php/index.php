<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Issuance Form</title>
</head>
<body>

    <h1>Asset Issuance Form</h1>

     <!-- CSV Import Form -->
    <form action="" method="post" enctype="multipart/form-data">
        <label for="csv_file">Import CSV:</label>
        <input type="file" name="csv_file" id="csv_file" accept=".csv"><br><br>
        <button type="submit" name="import_csv">Import CSV</button>
    </form>

    <?php
    // Check if form is submitted with CSV file
    if (isset($_POST['import_csv'])) {
        // Check if a file is uploaded
        if ($_FILES['csv_file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['csv_file']['tmp_name'])) {
            // Get uploaded file details
            $file_name = $_FILES['csv_file']['name'];
            $file_tmp = $_FILES['csv_file']['tmp_name'];

            // Process the uploaded CSV file
            $csv_data = array_map('str_getcsv', file($file_tmp));

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

            // Insert CSV data into the database
            foreach ($csv_data as $row) {
                // Assuming the CSV file columns order matches with the database table columns order
                $sql = "INSERT INTO asset_issuance (employee_name, department, position, issuance_date, asset_type, serial_number, asset_condition, employee_signature, employee_signature_date, laptop_bag, device_model, service_tag, mouse, connector)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssssssssssssss", ...$row); // Assuming each row of CSV data corresponds to a single record
                $stmt->execute();
                $stmt->close();
            }

            echo "CSV file imported successfully.";
            // Redirect to view_assigned.php
            header("Location: view_assigned.php");
            // ob_end_flush(); // Flush the output buffer and send the headers
            exit();
        } else {
            echo "Error uploading CSV file.";
        }
    }
    ?>

    <hr>

    <form action="submit_asset_issuance.php" method="post">
        <label for="employee_name">Employee Name:</label><br>
        <input type="text" id="employee_name" name="employee_name" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" required><br><br>

        <label for="position">Position:</label><br>
        <input type="text" id="position" name="position" required><br><br>

        <label for="issuance_date">Issuance Date:</label><br>
        <input type="date" id="issuance_date" name="issuance_date" required><br><br>

        <label for="asset_type">Asset Type:</label><br>
        <select id="asset_type" name="asset_type" required>
            <option value="laptop">Laptop</option>
            <option value="desktop">Desktop</option>
            <option value="tablet">Tablet</option>
            <!-- Add more asset types as needed -->
        </select><br><br>

        <label for="serial_number">Serial Number:</label><br>
        <input type="text" id="serial_number" name="serial_number" required><br><br>

        <label for="asset_condition">Asset Condition:</label><br>
        <input type="text" id="asset_condition" name="asset_condition" required><br><br>

        <label for="employee_signature">Employee Signature:</label><br>
        <input type="text" id="employee_signature" name="employee_signature" required><br><br>

        <label for="employee_signature_date">Employee Signature Date:</label><br>
        <input type="date" id="employee_signature_date" name="employee_signature_date" required><br><br>

        <label for="laptop_bag">Laptop Bag:</label><br>
        <input type="checkbox" id="laptop_bag" name="laptop_bag" value="Yes"><br><br>

        <label for="device_model">Device Model:</label><br>
        <input type="text" id="device_model" name="device_model"><br><br>

        <label for="service_tag">Service Tag:</label><br>
        <input type="text" id="service_tag" name="service_tag"><br><br>

        <label for="mouse">Mouse:</label><br>
        <input type="checkbox" id="mouse" name="mouse" value="Yes"><br><br>

        <label for="connector">Connector:</label><br>
        <input type="checkbox" id="connector" name="connector" value="Yes"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
