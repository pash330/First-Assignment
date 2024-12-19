<?php
$host = 'localhost';
$user = 'root'; 
$password = ''; 
$dbname = 'srs_testing'; // Database name for testing records

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>