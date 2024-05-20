<?php
if (isset($_POST['delete_assigned'])) {
    $id = $_POST['id'];

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

    // Fetch the details of the asset to be deleted
    $sql = "SELECT employee_name, serial_number FROM asset_issuance WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($employee_name, $serial_number);
    $stmt->fetch();
    $stmt->close();

    // Delete the asset
    $sql = "DELETE FROM asset_issuance WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Insert the deleted asset's information into stock_update table
        $sql = "INSERT INTO stock_update (Name, Type, Serial_number, Configuration, Performance, Status, Comments)
                VALUES (?, '', ?, '', '', '', '')"; // Assuming the columns Type, Configuration, Performance, Status, Comments can be left empty
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $employee_name, $serial_number);

        if ($stmt->execute()) {
            // Success message to be displayed on view_assigned.php
            $_SESSION['message'] = "Asset deleted and moved to stock_update successfully.";
        } else {
            $_SESSION['message'] = "Error moving asset to stock_update: " . $conn->error;
        }
    } else {
        $_SESSION['message'] = "Error deleting asset: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    // Redirect to view_assigned.php
    header("Location: view_assigned.php");
    exit();
}
?>
