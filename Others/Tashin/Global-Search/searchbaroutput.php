<?php
// Connect to database
session_start();
include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");
 
// Check connection
if (!$conn) {
    die("Sorry, failed to connect: " . mysqli_connect_error());
}

// Check if the search query is provided
if (isset($_POST['query'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['query']);

    // Query the database for matching titles
    $sql = "SELECT LEFT(title, 105) as title FROM notes WHERE title LIKE '%$search_query%' LIMIT 10";
    $result = mysqli_query($conn, $sql);

    $suggestions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $suggestions[] = $row['title'];
    }

    // Return the results as JSON
    echo json_encode($suggestions);
}

mysqli_close($conn);
?>
