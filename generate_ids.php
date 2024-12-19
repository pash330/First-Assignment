<?php
// Function to generate a 10-digit Product ID
function generateProductId() {
    return strtoupper(uniqid('P', true)); // Unique product ID with prefix 'P'
}

// Function to generate a 12-digit Testing ID
function generateTestingId() {
    return strtoupper(uniqid('T', true)); // Unique testing ID with prefix 'T'
}
?>
