<?php
include('db.php');
include('generate_ids.php');

// Insert Product Record
if (isset($_POST['submit_product'])) {
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
    
    $product_id = generateProductId(); // Generate a unique Product ID
    
    $sql_product = "INSERT INTO products (product_id, product_name, product_description, product_type) 
                    VALUES ('$product_id', '$product_name', '$product_description', '$product_type')";
    
    if ($conn->query($sql_product) === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $sql_product . "<br>" . $conn->error;
    }
}

// Insert Testing Record
if (isset($_POST['submit_testing'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $testing_type = mysqli_real_escape_string($conn, $_POST['testing_type']);
    $testing_performed = mysqli_real_escape_string($conn, $_POST['testing_performed']);
    $remarks = mysqli_real_escape_string($conn, $_POST['remarks']);
    $result = mysqli_real_escape_string($conn, $_POST['result']);
    $tester_name = mysqli_real_escape_string($conn, $_POST['tester_name']);
    $revision = mysqli_real_escape_string($conn, $_POST['revision']);
    
    $testing_id = generateTestingId(); // Generate a unique Testing ID
    
    // Determine the next step based on the result
    $next_step = ($result == 'Failed') ? 'Remake' : 'CPRI Approval';
    
    $sql_testing = "INSERT INTO tests (testing_id, product_id, testing_type, testing_performed, remarks, result, status, tester_name, revision, next_step)
                    VALUES ('$testing_id', '$product_id', '$testing_type', '$testing_performed', '$remarks', '$result', 'Pending', '$tester_name', '$revision', '$next_step')";
                    ?>