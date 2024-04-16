<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Management</title>
</head>
<body>
    <header>
        <!-- To assign assets -->
        <form action="index.php" method="get">
            <button type="submit">Form</button>
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
        <hr>
    </header>
</body>
</html>

<style>
    header {
        display: flex;
        gap: 32px;
    }
</style>