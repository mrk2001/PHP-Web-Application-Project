<?php
// modify_drink.php
include 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the required fields are set
    if (isset($_POST['newProductName'], $_POST['newListPrice'], $_POST['productID'])) {
        $productID = $_POST['productID'];
        $newProductName = $_POST['newProductName'];
        $newListPrice = $_POST['newListPrice'];

        // Update the product details
        $sql = "UPDATE Products 
                SET productName = '$newProductName', listPrice = '$newListPrice' 
                WHERE productID = '$productID'";

        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    } else {
        echo "Error: Missing required fields.";
        // Debugging output for missing fields
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
    $conn->close();
    exit;
}

// Collect product details for modification
if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    $sql = "SELECT * FROM Products WHERE productID = '$productID'";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
} else {
    echo "No product selected for modification.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modify Drink</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
     <header>
        <h1>Cold Drink Cafe</h1>
    </header></br>
    <h2>Modify Drink</h2>
    <form action="modify_drink.php" method="POST">
        <input type="hidden" name="productID" value="<?= $product['productID']; ?>">
        <label>Name:</label></br>
        <input type="text" name="newProductName" value="<?= htmlspecialchars($product['productName']); ?>" required><br></br>
        <label>Price:</label></br>
        <input type="number" step="0.01" name="newListPrice" value="<?= number_format($product['listPrice'], 2); ?>" required><br></br>
        <input type="submit" value="Modify Drink " >
    </form></br>
    <div class="view-link">
        <a href="index.php">View Drink List</a>
    </div>

    <footer>
        <p>&copy; 2024 Cold Drink Cafe, Inc.</p>
    </footer>
</body>
</html>
