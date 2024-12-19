<?php
include('db.php');

if (isset($_GET['search_value']) && isset($_GET['search_type'])) {
    $search_value = mysqli_real_escape_string($conn, $_GET['search_value']);
    $search_type = $_GET['search_type'];

    // Construct SQL query based on search type
    if ($search_type == 'product_id') {
        $sql = "SELECT * FROM tests WHERE product_id LIKE '%$search_value%'";
    } elseif ($search_type == 'tester_name') {
        $sql = "SELECT * FROM tests WHERE tester_name LIKE '%$search_value%'";
    } else {
        $sql = "SELECT * FROM tests WHERE status LIKE '%$search_value%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Testing ID: " . $row["testing_id"] . " - Product ID: " . $row["product_id"] . " - Status: " . $row["status"] . "<br>";
        }
    } else {
        echo "No results found.";
    }
}
?>
