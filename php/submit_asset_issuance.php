<?php include 'header.php'; ?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employee_name = $_POST["employee_name"];
    $department = $_POST["department"];
    $position = $_POST["position"];
    $issuance_date = $_POST["issuance_date"];
    $asset_type = $_POST["asset_type"];
    $serial_number = $_POST["serial_number"];
    $asset_condition = $_POST["asset_condition"];
    $employee_signature = $_POST["employee_signature"];
    $employee_signature_date = $_POST["employee_signature_date"];
    $laptop_bag = isset($_POST["laptop_bag"]) ? $_POST["laptop_bag"] : "No";
    $device_model = isset($_POST["device_model"]) ? $_POST["device_model"] : "";
    $service_tag = isset($_POST["service_tag"]) ? $_POST["service_tag"] : "";
    $mouse = isset($_POST["mouse"]) ? $_POST["mouse"] : "No";
    $connector = isset($_POST["connector"]) ? $_POST["connector"] : "No";

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

    // SQL query to create the table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS asset_issuance (
        id INT AUTO_INCREMENT PRIMARY KEY,
        employee_name VARCHAR(255) NOT NULL,
        department VARCHAR(255) NOT NULL,
        position VARCHAR(255) NOT NULL,
        issuance_date DATE NOT NULL,
        asset_type VARCHAR(50) NOT NULL,
        serial_number VARCHAR(100) NOT NULL,
        asset_condition VARCHAR(255) NOT NULL,
        employee_signature VARCHAR(255) NOT NULL,
        employee_signature_date DATE NOT NULL,
        laptop_bag ENUM('Yes', 'No') NOT NULL,
        device_model VARCHAR(100),
        service_tag VARCHAR(100),
        mouse ENUM('Yes', 'No') NOT NULL,
        connector ENUM('Yes', 'No') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table asset_issuance created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO asset_issuance (employee_name, department, position, issuance_date, asset_type, serial_number, asset_condition, employee_signature, employee_signature_date, laptop_bag, device_model, service_tag, mouse, connector) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Check if prepare() succeeded
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters to the prepared statement
    $stmt->bind_param("ssssssssssssss", $employee_name, $department, $position, $issuance_date, $asset_type, $serial_number, $asset_condition, $employee_signature, $employee_signature_date, $laptop_bag, $device_model, $service_tag, $mouse, $connector);

    // Execute SQL statement
    if ($stmt->execute() === TRUE) {
        echo "Asset issuance record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Error: Form not submitted";
}
?>
