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
    <div class="main_row">

        <div>
            <!-- CSV Import Form -->
            <form class="import_form" action="" method="post" enctype="multipart/form-data">
                <label for="csv_file">Import CSV:</label>
                <input type="file" name="csv_file" id="csv_file" accept=".csv">
                <button type="submit" name="import_csv">Import CSV</button>
            </form>
        </div>

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
                    $sql = "INSERT INTO asset_issuance (employee_name, position, department, issuance_date, asset_type, device_model, service_tag, serial_number, mouse, connector)
                            VALUES (?, ?, ? , ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssssssss", ...$row); // Assuming each row of CSV data corresponds to a single record
                    $stmt->execute();
                    $stmt->close();
                }
                echo "<br><br><br>";
                echo '<div class="success-message">CSV file imported successfully. <span class="icon">&#10004;</span></div>';
                echo "<br>";
                echo ' <form action="view_assigned.php" method="get">
                    <button type="submit">View Assets</button>
                </form> ';
                // ob_end_flush(); // Flush the output buffer and send the headers
                exit();
            } else {
                echo "Error uploading CSV file.";
            }
        }
        ?>

        <div class="form">
            <form class="manual_form" action="submit_asset_issuance.php" method="post">

                <div class="employee_details_field">
                    <div>
                        <label for="employee_name">Employee Name:</label>
                        <input type="text" id="employee_name" name="employee_name" required>
                    </div>

                    <div>
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position" required>
                    </div>
                </div>

                <div class="employee_details_field">
                    <div>
                        <label for="department">Department:</label>
                        <input type="text" id="department" name="department" required>
                    </div>
                    <div>
                        <label for="issuance_date">Issuance Date:</label>
                        <input type="date" id="issuance_date" name="issuance_date" required>
                    </div>
                </div>


                <div class="employee_details_field">
                    <div>
                        <label for="asset_type">Asset Type:</label>
                        <select id="asset_type" name="asset_type" required>
                            <option value="Laptop">Laptop</option>
                            <option value="Mobile">Mobile</option>
                            <!-- Add more asset types as needed -->
                        </select>
                    </div>
                    <div>
                        <label for="device_model">Device Model:</label>
                        <input type="text" id="device_model" name="device_model">
                    </div>
                </div>

                
                <div class="employee_details_field">
                    <div>
                        <label for="service_or_serial">Select Service Tag or Serial No.:</label>
                        <select id="service_or_serial" name="service_or_serial" onchange="toggleFields()">
                            <option value="blank">Select choice</option>
                            <option value="service_tag">Service Tag</option>
                            <option value="serial_number">Serial Number</option>
                        </select>
                    </div>

                    <div class="employee_details_field" id="service_tag_field" style="display: none" >
                        <div>
                            <label for="service_tag">Service Tag:</label>
                            <input type="text" id="service_tag" name="service_tag">
                        </div>
                    </div>

                    <div class="employee_details_field" id="serial_number_field" style="display: none">
                        <div>
                            <label for="serial_number">Serial Number:</label>
                            <input type="text" id="serial_number" name="serial_number" required>
                        </div>
                    </div>
                </div>

                <div class="checkbox_fields">
                    <div>
                        <label for="mouse">Mouse:</label>
                        <input type="checkbox" id="mouse" name="mouse" value="Yes">
                    </div>
                    <div>
                        <label for="connector">Connector:</label>
                        <input type="checkbox" id="connector" name="connector" value="Yes">
                    </div>    
                </div>
                <input class="submit_button" type="submit" value="Submit">
            </form>
        </div>
    </div>

</body>
</html>

<script>
    function toggleFields() {
        var selectedOption = document.getElementById("service_or_serial").value;
        var serviceTagField = document.getElementById("service_tag_field");
        var serialNumberField = document.getElementById("serial_number_field");

        if (selectedOption === "service_tag") {
            serviceTagField.style.display = "block";
            serialNumberField.style.display = "none";
        } else if (selectedOption === "serial_number") {
            serviceTagField.style.display = "none";
            serialNumberField.style.display = "block";
        } else {
            serviceTagField.style.display = "none";
            serialNumberField.style.display = "none";
        }
    }
</script>


<style>
    .success-message {
        color: green;
        font-weight: bold;
    }

    .icon {
        color: green;
        font-size: 24px;
        vertical-align: middle;
    }
</style>