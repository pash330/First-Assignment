<?php
// Database configuration
include('db.php'); // Added missing semicolon

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (!empty($username) && !empty($password)) {
        // Prepare the SQL query
        $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($storedPassword, $role);

        // Check if a user was found and verify the password
        if ($stmt->fetch() && password_verify($password, $storedPassword)) {
            if ($role === 'CPRI') {
                header("Location: test.html");
                exit;
            } elseif ($role === 'SRS') {
                header("Location: product.html");
                exit;
            } else {
                echo "Invalid role assigned to the user.";
            }
        } else {
            echo "Invalid username or password!";
        }

        $stmt->close();
    } else {
        echo "All fields are required!";
    }
}

$conn->close();
?>
