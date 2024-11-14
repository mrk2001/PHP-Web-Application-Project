<?php
//  database connection file
include 'db_connect.php';

//  drinks from the database based on the selected category
$categoryName = isset($_GET['category']) ? $_GET['category'] : 'Regular'; // Default to 'Regular'
$sql = "SELECT p.productID, p.productName, p.listPrice 
        FROM Products p
        JOIN Categories c ON p.categoryID = c.categoryID
        WHERE c.categoryName = '$categoryName'";

$result = $conn->query($sql);

// check for SQL errors
if (!$result) {
    die("Error executing query: " . $conn->error);
}

//  categories for navigation
$categories = $conn->query("SELECT * FROM Categories");
if (!$categories) {
    die("Error fetching categories: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cold Drink Cafe</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <header>
        <h1>Cold Drink Cafe</h1>
    </header></br>

    <main>
        <aside>
            <nav>
                <h2>Categories</h2>
                <ul class="categories">
                    <?php while ($category = $categories->fetch_assoc()): ?>
                        <li><a href="index.php?category=<?= htmlspecialchars($category['categoryName']); ?>"><?= htmlspecialchars($category['categoryName']); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </nav>
        </aside>

        <section>
            <h2>Drink List</h2>
            <h3><?= htmlspecialchars($categoryName); ?></h3>
            <?php if ($result->num_rows > 0): ?>
                <table>
                    <tr><th>Name</th><th>Price</th><th>Delete</th><th>Modify</th></tr>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['productName']); ?></td>
                            <td><?= number_format($row['listPrice'], 2); ?></td>
                            <td>
                                <form action="delete_drink.php" method="POST">
                                    <input type="hidden" name="productID" value="<?= $row['productID']; ?>">
                                    <input type="submit" value="Delete" class="button">
                                </form>
                            </td>
                            <td>
                                <form action="modify_drink.php" method="GET">
                                    <input type="hidden" name="productID" value="<?= $row['productID']; ?>">
                                    <input type="submit" value="Modify" class="button">
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </table></br>
            <?php else: ?>
                <p>No drinks found in this category.</p>
            <?php endif; ?>

            <div class="links">
                <a href="add_drink.php">Add Drink</a><br></br>
                <a href="sort_drinks.php?order=ASC">Sort Drink in Ascending Order</a><br></br>
                <a href="sort_drinks.php?order=DESC">Sort Drink in Descending Order</a></br>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Cold Drink Cafe, Inc.</p>
    </footer>
</body>
</html>

<?php
// Closed the database connection
$conn->close();
?>
