<?php
session_start();
include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL query for searching
$sql = "SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL 
        UNION
        SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL


        UNION
        SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL
        UNION
        SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL 
        ";




// Execute the query
$resultantLabel = mysqli_query($conn, $sql); // Get query result

$data = array();
if ($resultantLabel) {
    // Convert to array
    while ($item = mysqli_fetch_assoc($resultantLabel)) {
        $data[] = $item['combined_info'];
    }
}

print_r($data);
$conn->close();
