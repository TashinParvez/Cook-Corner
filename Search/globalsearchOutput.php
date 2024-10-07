<?php
// include("D:\All UIU Materials\8th Trimester\SAD Lab\Project\Cook-Corner\Includes\Navbar\\n1.php");
include("/Cook-Corner/Includes/Navbar/n1.php");

include("/Cook-Corner/Includes/Database Connection/database_connection.php");
// include("D:\All UIU Materials\8th Trimester\SAD Lab\Project\Cook-Corner\Includes\Database-connection-new\database_connection.php"); // noman

// Get the search query
$search_query = $_GET['query'] ?? 'chicken';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include the navbar
// include("/Cook-Corner/Includes/Navbar/n1.php");

if ($search_query) {

    // ---------------------- Recipe -------------------------------- 
    $sql = "SELECT recipe_id, title, description, rating, image
          FROM
            recipe_info
          WHERE 
                title LIKE ?
            OR subtitle LIKE ?
            OR description LIKE ?
            OR recipe_id IN (
                    SELECT rt.recipe_id 
                    FROM recipe_tags rt
                    JOIN tags t ON rt.tag_id = t.id
                    WHERE t.tag_name LIKE ?
                )
                OR recipe_id IN (
                    SELECT jri.recipe_id 
                    FROM junction_recipe_ingredients jri
                    JOIN ingredient_info ii ON jri.ingredient_id = ii.ingredient_id
                    WHERE ii.ingredient_name LIKE ?
                );";




    $resultofsql = mysqli_query($conn, $sql);   // get query result

    $rrr = mysqli_fetch_all($resultofsql);   // conver to array

    // print_r($rrr);

    mysqli_free_result($resultofsql);


    // ---------------------- Recipe -------------------------------- 

    $sql = "SELECT recipe_id, title, description, rating, image
          FROM
            recipe_info
          WHERE 
                title LIKE ?
            OR subtitle LIKE ?
            OR description LIKE ?
            OR recipe_id IN (
                    SELECT rt.recipe_id 
                    FROM recipe_tags rt
                    JOIN tags t ON rt.tag_id = t.id
                    WHERE t.tag_name LIKE ?
                )
                OR recipe_id IN (
                    SELECT jri.recipe_id 
                    FROM junction_recipe_ingredients jri
                    JOIN ingredient_info ii ON jri.ingredient_id = ii.ingredient_id
                    WHERE ii.ingredient_name LIKE ?
                );";





    // Execute the query
    $resultantLabel = mysqli_query($conn, $sql); // Get query result

    $ttt = mysqli_fetch_all($resultantLabel);   // conver to array

    $matchrecipes = $rrr;
    $matchtips = $ttt;


    // Fetch up to 10 items at a time  (initial load)
    $recipes_count = count($matchrecipes);
    // $recipes_count = 0;
    $tips_count = count($matchtips);
    // $tips_count = 0;
}
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

            <!----------------------------------- Recipe Section ----------------------------------->
            <h3>Recipes</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                foreach ($rrr as $item) {
                ?>



                    <div class="card" style="width: 18rem;">
                        <img src="/Images/Recipe-Images/frozen_vegetables.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-text"> <?php echo htmlspecialchars($item[1]) ?></h4>
                            <p class="card-text"> <?php echo htmlspecialchars($item[2]) ?></p>
                        </div>
                    </div>


                <?php

                }
                ?>

            </div>


            <?php if ($recipes_count > 10): ?>
                <button id="load-more-recipes" class="btn btn-primary" data-offset="10">Load More Recipes</button>
            <?php endif; ?>


            <!--------------------------------------- Tips Section --------------------------------------->
            <h3>Tips</h3>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                foreach ($ttt as $item) {
                ?>
                    <div class="card" style="width: 18rem;">
                        <img src="/Images/Recipe-Images/frozen_vegetables.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-text"> <?php echo htmlspecialchars($item[1]) ?></h4>
                            <p class="card-text"> <?php echo htmlspecialchars($item[2]) ?></p>
                        </div>
                    </div>


                <?php

                }
                ?>

            </div>
            <?php if ($tips_count > 10): ?>
                <button id="load-more-tips" class="btn btn-primary" data-offset="10">Load More Tips</button>
            <?php endif; ?>

        <?php endif; ?>
    </div>

    <!-- jQuery Script for Loading More Recipes and Tips -->
    <script>
        // Load More Recipes
        $('#load-more-recipes').on('click', function() {
            let offset = $(this).data('offset');
            $.ajax({
                url: '/Cook-Corner/Search/load_more_recipes.php',
                method: 'POST',
                data: {
                    offset: offset,
                    query: '<?= htmlspecialchars($search_query); ?>'
                },
                success: function(data) {
                    $('#recipe-section').append(data);
                    let newOffset = offset + 10;
                    $('#load-more-recipes').data('offset', newOffset);
                    if (newOffset >= <?= $recipes_count; ?>) {
                        $('#load-more-recipes').hide(); // Hide button when all recipes are loaded
                    }
                }
            });
        });

        // Load More Tips
        $('#load-more-tips').on('click', function() {
            let offset = $(this).data('offset');
            $.ajax({
                url: '/Cook-Corner/Search/load_more_tips.php',
                method: 'POST',
                data: {
                    offset: offset,
                    query: '<?= htmlspecialchars($search_query); ?>'
                },
                success: function(data) {
                    $('#tips-section').append(data);
                    let newOffset = offset + 10;
                    $('#load-more-tips').data('offset', newOffset);
                    if (newOffset >= <?= $tips_count; ?>) {
                        $('#load-more-tips').hide(); // Hide button when all tips are loaded
                    }
                }
            });
        });
    </script>
</body>

</html>


<!-- $sql = "SELECT ri.recipe_id as id, ri.title as title, ri.description as description, ri.rating as rating,
ri.image as img

FROM recipe_info as ri
LEFT JOIN
junction_event_recipes AS jer -- event
On jer.recipe_id = ri.recipe_id
JOIN
event_info
ON event_info.event_id = jer.event_id

LEFT JOIN
junction_meal_type_recipe_info as jmt -- meal
ON jmt.recipe_id = ri.recipe_id
INNER JOIN
meal_type
ON meal_type.meal_type_id = jmt.meal_type_id

LEFT JOIN
junction_recipe_info_recipe_category as jrrc -- category
ON jrrc.recipe_id = ri.recipe_id
INNER JOIN
recipe_category
ON recipe_category.id = jrrc.category_id

LEFT JOIN
junction_cuisine_recipe as jcr -- cuisine
ON jcr.recipe_id = ri.recipe_id
INNER JOIN
cuisine_type
ON cuisine_type.id = jcr.cuisine_id


LEFT JOIN
junction_recipe_ingredients as jri -- cuisine
ON jri.recipe_id = ri.recipe_id
INNER JOIN
ingredient_info
ON ingredient_info.ingredient_id = jri.ingredient_id

WHERE
ri.title LIKE '%$search_query%'
OR ri.subtitle LIKE '%$search_query%'
OR ri.description LIKE '%$search_query%'
OR ri.notes LIKE '%$search_query%'
OR event_info.event_name LIKE '%$search_query%'
OR meal_type.meal_name LIKE '%$search_query%'
OR meal_type.description LIKE '%$search_query%'
OR recipe_category.name LIKE '%$search_query%'
OR cuisine_type.cuisine_name LIKE '%$search_query%'
OR ingredient_info.ingredient_name LIKE '%$search_query%';"; -->