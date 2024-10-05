<?php
include("/Cook-Corner/Includes/Database Connection/database_connection.php");

// Get the search query
$search_query = $_GET['query'] ?? '';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include the navbar
include("/Cook-Corner/Includes/Navbar/navbarMain-Search-imp.php");

if ($search_query) {
    // Escape the search query for security
    $search_query = $conn->real_escape_string($search_query);

    // Perform your search query here
    $sql = "SELECT * FROM recipes WHERE title LIKE '%$search_query%' OR description LIKE '%$search_query%'"; // Modify based on your table structure

    $result = $conn->query($sql);

    if ($result) {
        // Check if any results were found
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display each result (customize this based on your needs)
                echo "<div class='search-result'>";
                echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No results found for: " . htmlspecialchars($search_query) . "</p>";
        }
    } else {
        echo "Error: " . $conn->error; // Display SQL error if query fails
    }
}

// $conn->close(); // Close the database connection
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />
    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
</head>

<body>
    <div class="container mt-4">
        <?php if ($search_query): ?>
            <h2>Search Results for: <?= htmlspecialchars($search_query); ?></h2>
            <!-- Display your search results here -->
        <?php endif; ?>
    </div>
</body>

</html>