<?php
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

// SQL query to fetch all assets
$sql = "SELECT * FROM asset_issuance";
$result = $conn->query($sql);

// Check if there are any assets to export
if ($result->num_rows > 0) {
    // Define CSV filename
    $filename = "assets_export.csv";

    // Set the appropriate headers for CSV download
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    // Open file handle for writing
    $output = fopen('php://output', 'w');

    // Write CSV headers
    fputcsv($output, array('ID', 'Employee Name', 'Position', 'Department', 'Issuance Date', 'Asset Type', 'Device Model', 'Service Tag', 'Serial Number', 'Mouse', 'Connector'));

    // Iterate through assets and write them to CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    // Close the file handle
    fclose($output);
} else {
    // No assets found, redirect back to the page where export was triggered
    header("Location: view_assets.php");
    exit;
}

// Close connection
$conn->close();
?>
