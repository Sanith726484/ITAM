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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
</head>
<body>
    <header>
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
    </header>
</body>
</html>

<style>
    .import_form {
        display: flex;
        gap: 32px;
    }

    .manual_form {
        margin: auto;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .checkbox_fields, .employee_details_field {
        display: inline-flex;
        gap: 55px;
    }

    .employee_details_field div {
        min-width: 250px;
        display: flex;
        flex-direction: column;
    }

    .submit_button {
        padding: 10px;
        margin: 25px 0;
        text-align: center;
        width: 25%;
    }

    header{
        display: flex;
        float: right;
        gap: 32px;
    }

    .main_row{
        display: flex;
        gap: 32px;
    }

    body {
        margin: 50px;
    }

    .form {
        margin: auto;
        width: 50%;
        padding: 50px;   
    }

</style>