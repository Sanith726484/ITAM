<?php include 'header.php'; ?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $employee_name = $_POST["employee_name"];
    $position = $_POST["position"];
    $department = $_POST["department"];
    $issuance_date = $_POST["issuance_date"];
    $asset_type = $_POST["asset_type"];
    $device_model = isset($_POST["device_model"]) ? $_POST["device_model"] : "";
    $service_tag = isset($_POST["service_tag"]) ? $_POST["service_tag"] : "";
    $serial_number = $_POST["serial_number"];
    $laptop_bag = isset($_POST["laptop_bag"]) ? $_POST["laptop_bag"] : "No";
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
        position VARCHAR(255) NOT NULL,
        department VARCHAR(255) NOT NULL,
        issuance_date DATE NOT NULL,
        asset_type VARCHAR(50) NOT NULL,
        device_model VARCHAR(100),
        service_tag VARCHAR(100),
        serial_number VARCHAR(100) NOT NULL,
        mouse ENUM('Yes', 'No') NOT NULL,
        connector ENUM('Yes', 'No') NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute SQL query
    if ($conn->query($sql) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    // Check if serial number already exists
    $sql = "SELECT employee_name FROM asset_issuance WHERE serial_number = ?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $serial_number);
    $stmt->execute();
    $stmt->bind_result($existing_employee_name);
    $stmt->fetch();
    $stmt->close();

    if ($existing_employee_name) {
        echo "Error: This device is already assigned to $existing_employee_name.";
    } else {
        // Prepare SQL statement for insertion
        $stmt = $conn->prepare("INSERT INTO asset_issuance (employee_name, position, department, issuance_date, asset_type, device_model, service_tag, serial_number, mouse, connector) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        // Check if prepare() succeeded
        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssssssssss", $employee_name, $position, $department, $issuance_date, $asset_type, $device_model, $service_tag, $serial_number, $mouse, $connector);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo "Asset issuance record created successfully";
            echo '<form action="view_assigned.php" method="get">';
            echo '<button type="submit">View Assigned</button>';
            echo '</form>';
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement and connection
        $stmt->close();
    }
    
    $conn->close();
} else {
    echo "Error: Form not submitted";
}
?>
