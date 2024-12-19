<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SRS Electrical Appliances - Testing Records</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>SRS Electrical Appliances - Testing Records</h1>

    <!-- Add Product Form -->
    <h2>Add Product</h2>
    <form action="insert_record.php" method="POST">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>

        <label for="product_description">Product Description:</label>
        <textarea id="product_description" name="product_description" required></textarea>

        <label for="product_type">Product Type:</label>
        <input type="text" id="product_type" name="product_type" required>

        <input type="submit" name="submit_product" value="Add Product">
    </form>

    <!-- Display Products -->
    <h2>All Products</h2>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Product Type</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["product_description"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["product_type"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No products found</td></tr>";
        }

        // Close the connection
        $conn->close();
        ?>
    </table>
</body>
</html>
