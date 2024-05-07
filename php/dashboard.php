<?php
session_start();

// Check if admin is logged in, redirect to login page if not
if(!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome to the Admin Dashboard</h1>
    <p>This is where you can manage your application.</p>
    <div class="dashboard-menu">
        <form action="dashboard.php" method="get">
            <button type="submit">Dashboard</button>
        </form>
        <!-- To assign assets -->
        <form action="index.php" method="get">
            <button type="submit">Form/Add Assets</button>
        </form>
        <!-- To view assigned assets -->
        <form action="view_assigned.php" method="get">
            <button type="submit">View Assets</button>
        </form>
        <!-- To update Stock -->
        <form action="assets_stock.php" method="get">
            <button type="submit">Update Stock</button>
        </form>
        <!-- To view Stock -->
        <form action="view_assets_stock.php" method="get">
            <button type="submit">View Stock</button>
        </form>
        <form action="admin_logout.php" method="get">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>


<style>
    .dashboard-menu form{
        margin: 25px;
        display: inline-flex;
    }
</style>