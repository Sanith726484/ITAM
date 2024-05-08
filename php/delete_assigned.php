<?php
// Check if the delete button is clicked
if (isset($_POST['delete_assigned']) && isset($_POST['id'])) {
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

    // Prepare and execute SQL statement to delete the asset with the provided ID
    $stmt = $conn->prepare("DELETE FROM asset_issuance WHERE id = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Redirect back to the view assets page after deletion
    header("Location: view_assigned.php");
    exit();
} else {
    // If the delete button is not clicked or if the asset ID is not provided, redirect back to the view assets page
    header("Location: view_assigned.php");
    exit();
}

?>
