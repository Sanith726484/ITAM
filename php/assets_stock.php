<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Stock Import</title>
</head>
<body>
    <h1>Asset Stock Import</h1>
    
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
                $sql = "INSERT INTO stock_update (Name, Type, Serial_number, Configuration, Performance, Status, Comments)
                        VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Error in SQL query: " . mysqli_error($conn));
                }
                $stmt->bind_param("sssssss", ...$row); // Assuming each row of CSV data corresponds to a single record
                $stmt->execute();
                $stmt->close();
            }

            echo "CSV file imported successfully.";
        } else {
            echo "Error uploading CSV file.";
        }
    }
    ?>

    <!-- Form for manual entry -->
    <h2>Manual Entry</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name"><br><br>

        <label for="type">Type:</label>
        <input type="text" name="type" id="type"><br><br>

        <label for="serial_number">Serial Number:</label>
        <input type="text" name="serial_number" id="serial_number"><br><br>

        <label for="configuration">Configuration:</label>
        <input type="text" name="configuration" id="configuration"><br><br>

        <label for="performance">Performance:</label>
        <input type="text" name="performance" id="performance"><br><br>

        <label for="status">Status:</label>
        <input type="text" name="status" id="status"><br><br>

        <label for="comments">Comments:</label>
        <input type="text" name="comments" id="comments"><br><br>

        <button type="submit" name="manual_entry">Submit</button>
    </form>

    <?php
    // Handle manual entry form submission
    if (isset($_POST['manual_entry'])) {
        // Retrieve form data
        $name = $_POST['name'];
        $type = $_POST['type'];
        $serial_number = $_POST['serial_number'];
        $configuration = $_POST['configuration'];
        $performance = $_POST['performance'];
        $status = $_POST['status'];
        $comments = $_POST['comments'];

        $servername = "mysql";
        $username = "navtech";
        $password = "navtech";
        $dbname = "asset_issuance_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        // SQL query to create the table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS stock_update (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            type VARCHAR(255) NOT NULL,
            serial_number VARCHAR(255) NOT NULL,
            configuration VARCHAR(255) NOT NULL,
            performance VARCHAR(255) NOT NULL,
            status VARCHAR(255) NOT NULL,
            device_model VARCHAR(100),
            comments VARCHAR(100)
        )";

        // Execute SQL query
        if ($conn->query($sql) === TRUE) {
            echo "Table stock_update created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
            
        $stmt = $conn->prepare("INSERT INTO stock_update (Name, Type, Serial_number, Configuration, Performance, Status, Comments)
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            die("Error in SQL query: " . mysqli_error($conn));
        }
        $stmt->bind_param("sssssss", $name, $type, $serial_number, $configuration, $performance, $status, $comments);
        if ($stmt->execute()) {
            echo "Manual entry added successfully";
        } else {
            echo "Error adding manual entry: " . $conn->error;
        }
        $stmt->close();
    }
    ?>

</body>
</html>
