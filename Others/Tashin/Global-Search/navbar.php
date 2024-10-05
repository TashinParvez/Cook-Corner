<?php
session_start();
include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");

// --------------------------------------------- fetch data For search ------------------------
$data = array();

// Fetch data ( FROM recipe_info and ingredient_info tables )
$sql = "SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL 
        UNION
        SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL
        UNION
        SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL
        UNION
        SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL";

$result = mysqli_query($conn, $sql);  // get query result 

foreach ($result as $row) {
    $data[] = $row['combined_info'];
}

// Return data if it's an AJAX request
if (isset($_POST['query'])) {
    $search_query = strtolower($_POST['query']);
    $filtered_data = array_filter($data, function ($item) use ($search_query) {
        return stripos($item, $search_query) !== false;
    });

    echo json_encode(array_values($filtered_data)); // return filtered suggestions as JSON
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Global Search Navbar</title>
    <style>
        #suggestions {
            position: absolute;
            z-index: 1000;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }

        #suggestions .list-group-item {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <div class="collapse navbar-collapse">
            <form class="form-inline ml-auto" method="GET" action="searchbaroutput.php">
                <input type="text" id="search-input" class="form-control" placeholder="Search..." autocomplete="off">
                <div id="suggestions" class="list-group"></div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#search-input').on('input', function() {
                let query = $(this).val();

                if (query.length > 0) {
                    $.ajax({
                        url: '', // Leave the URL empty to send the request to the same page
                        type: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            let suggestions = JSON.parse(data);
                            $('#suggestions').empty();

                            if (suggestions.length > 0) {
                                suggestions.forEach(function(suggestion) {
                                    $('#suggestions').append('<a href="#" class="list-group-item list-group-item-action">' + suggestion + '</a>');
                                });
                            }
                        }
                    });
                } else {
                    $('#suggestions').empty();
                }
            });

            // Hide suggestions when clicking outside
            $(document).click(function(e) {
                if (!$(e.target).closest('#search-input, #suggestions').length) {
                    $('#suggestions').empty();
                }
            });
        });
    </script>
</body>

</html>