<?php
$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Search Results</title>
</head>

<body>
    <?php
    include 'navbar.php';  // Include your navbar file
    ?>

    <script>
        $(document).ready(function() {
            // Set the search input to the query value on page load
            let searchQuery = "<?php echo $searchQuery; ?>";
            $('#search-input').val(searchQuery); // Set the search input value
        });
    </script>

    <!-- Your search results content goes here -->
</body>

</html>