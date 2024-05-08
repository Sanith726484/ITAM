<?php include 'header.php'; ?>

<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input and sanitize data (to prevent SQL injection)
    $id = $_POST['id'];
    $employee_name = $_POST['employee_name'];
    // Validate and sanitize other input fields...

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

    // SQL query to update asset details
    $sql = "UPDATE asset_issuance SET employee_name=?, position=?, department=?, issuance_date=?, asset_type=?, device_model=?, service_tag=?, serial_number=?, mouse=?, connector=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssi", $employee_name, $department, $position, $issuance_date, $asset_type, $device_model, $service_tag, $serial_number, $mouse, $connector, $id);

    // Set parameters and execute statement
    $employee_name = $_POST['employee_name'];
    $position = $_POST['position'];
    $department = $_POST['department'];
    $issuance_date = $_POST['issuance_date'];
    $asset_type = $_POST['asset_type'];
    $device_model = $_POST['device_model'];
    $service_tag = $_POST['service_tag'];
    $serial_number = $_POST['serial_number'];
    $mouse = isset($_POST['mouse']) ? 'Yes' : 'No';
    $connector = isset($_POST['connector']) ? 'Yes' : 'No';

    if ($stmt->execute()) {
        echo "Asset updated successfully";
    } else {
        echo "Error updating asset: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the form is not submitted via POST method, redirect the user to the edit page
    header("Location: edit_assigned.php");
    exit;
}
?>
