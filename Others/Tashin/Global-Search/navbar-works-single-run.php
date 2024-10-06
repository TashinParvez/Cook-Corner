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

            <!-- Search Field Form -->

            <form class="form-inline ml-auto" method="GET" action="searchbaroutput.php">
                <input type="text" id="search-input" class="form-control" placeholder="Search..." autocomplete="off" name="query">
                <div id="suggestions" class="list-group"></div>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>




        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            let selectedIndex = -1; // Tracks the current selection index
            let suggestions = [];

            $('#search-input').on('input', function() {
                let query = $(this).val();

                if (query.length > 0) {
                    $.ajax({
                        url: 'navbar.php', // Ensure this points to the correct PHP file
                        type: 'POST',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            suggestions = JSON.parse(data); // Store suggestions in an array
                            $('#suggestions').empty();
                            selectedIndex = -1; // Reset the selected index

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

            // Handle up/down key navigation
            $('#search-input').on('keydown', function(e) {
                if (suggestions.length > 0) {
                    if (e.key === 'ArrowDown') {
                        e.preventDefault();
                        selectedIndex = (selectedIndex + 1) % suggestions.length;
                        highlightSuggestion(selectedIndex);
                    } else if (e.key === 'ArrowUp') {
                        e.preventDefault();
                        selectedIndex = (selectedIndex - 1 + suggestions.length) % suggestions.length;
                        highlightSuggestion(selectedIndex);
                    } else if (e.key === 'Enter') {
                        e.preventDefault();
                        if (selectedIndex >= 0) {
                            // If a suggestion is selected, set its value in the search box and submit the form
                            $('#search-input').val(suggestions[selectedIndex]);
                            $('#suggestions').empty();
                            $('form').submit(); // Programmatically submit the form
                        }
                    }
                }
            });

            // Handle clicking on a suggestion
            $('#suggestions').on('click', '.list-group-item', function() {
                $('#search-input').val($(this).text()); // Update the search input with the clicked suggestion
                $('#suggestions').empty(); // Clear suggestions after a selection
                $('form').submit(); // Programmatically submit the form when suggestion is clicked
            });

            // Function to highlight the currently selected suggestion
            function highlightSuggestion(index) {
                $('#suggestions .list-group-item').removeClass('active'); // Remove active class from all items
                $('#suggestions .list-group-item').eq(index).addClass('active'); // Add active class to the current item
            }

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