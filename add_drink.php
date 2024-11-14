<?php
// add_drink.php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryID = $_POST['categoryID'];
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $listPrice = $_POST['listPrice'];

    $sql = "INSERT INTO Products (categoryID, productCode, productName, listPrice) 
            VALUES ('$categoryID', '$productCode', '$productName', '$listPrice')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}

//  categories for the dropdown
$categories = $conn->query("SELECT * FROM Categories");

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Drink</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <header>
        <h1>Cold Drink Cafe</h1>
    </header></br>
    <h2>Add Drink</h2>
    <form action="add_drink.php" method="POST">
        <label>Category:</label>
        <select name="categoryID">
            <?php while ($category = $categories->fetch_assoc()): ?>
                <option value="<?= $category['categoryID']; ?>"><?= $category['categoryName']; ?></option>
            <?php endwhile; ?>
        </select><br></br>
        <label>Code: (Eg:REG001)</label></br>
        <input type="text" name="productCode" required><br></br>
        <label>Name:</label></br>
        <input type="text" name="productName" required><br></br>
        <label>List Price:</label></br>
        <input type="number" step="0.01" name="listPrice" required><br></br>
        <input type="submit" value="Add Drink">
    </form></br>
    <div class="view-link">
        <a href="index.php">View Drink List</a>
    </div>

    <footer>
        <p>&copy; 2024 Cold Drink Cafe, Inc.</p>
    </footer>
</body>
</html>
