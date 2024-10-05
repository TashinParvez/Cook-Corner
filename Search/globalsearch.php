<?php
include("/Cook-Corner/Includes/Database Connection/database_connection.php");

// Get the search query
$search_query = $_GET['query'] ?? '';


// include("/Cook-Corner/Includes/Navbar/navbarMain-Search-imp.php");  // main tashin
include("/Cook-Corner/Includes/Navbar/navbarMain-Search-imp.php"); // try

// Process the search query, for example, querying the database
if ($search_query) {
    // Perform your search query here
    // Example: SELECT * FROM recipes WHERE title LIKE '%$search_query%'
}

// Ensure the connection is closed at the end
// mysqli_close($conn);
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

    <?php
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    include "../Includes/AddMenu/addMenu.php";
    ?>





    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>