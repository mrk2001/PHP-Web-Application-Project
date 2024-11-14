<?php
// sort_drinks.php
include 'db_connect.php';

// Determine sort order
$order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
$sql = "SELECT p.productID, p.productCode, p.productName, p.listPrice, c.categoryName 
        FROM Products p
        JOIN Categories c ON p.categoryID = c.categoryID
        ORDER BY p.productName $order";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sort Drinks</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <header>
        <h1>Sort Drinks</h1>
    </header></br>

    <!-- Display sorted drinks -->
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Price</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['productName']; ?></td>
                    <td><?= $row['listPrice']; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="2">No drinks found.</td></tr>
        <?php endif; ?>
    </table></br>

    <!-- Links to sort drinks -->
    <div>
        <a href="sort_drinks.php?order=ASC">Sort Ascending</a></br></br>
        <a href="sort_drinks.php?order=DESC">Sort Descending</a></br>
    </div>

    <br>
    <a href="index.php">Back to Drink List</a>
    <footer>
        <p>&copy; 2024 Cold Drink Cafe, Inc.</p>
    </footer>
</body>
</html>

<?php $conn->close(); ?>
