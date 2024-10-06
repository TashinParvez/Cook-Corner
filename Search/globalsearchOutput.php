<?php
include("/Cook-Corner/Includes/Database Connection/database_connection.php");

// Get the search query
$search_query = $_GET['query'] ?? '';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Include the navbar
include("/Cook-Corner/Includes/Navbar/n1.php");

if ($search_query) {

    // Prepare the SQL query for searching
    $sql = "SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL AND title LIKE '%$search_query%'
            UNION
            SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL AND subtitle LIKE '%$search_query%'
            UNION
            SELECT description AS combined_info FROM `recipe_info` WHERE description IS NOT NULL AND description LIKE '%$search_query%'
            UNION
            SELECT notes AS combined_info FROM `recipe_info` WHERE notes IS NOT NULL AND notes LIKE '%$search_query%'
            UNION
            SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL AND ingredient_name LIKE '%$search_query%'
            UNION
            SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL AND category LIKE '%$search_query%'";




$sql ="SELECT ri.recipe_id as id, ri.title as title, ri.description as description, ri.rating as rating, 
       ri.image as img 

        FROM recipe_info as ri
        WHERE  
        ri.title LIKE '%aaaa%'
        OR ri.subtitle LIKE '%aaaa%'
        OR ri.description LIKE '%aaaa%'
        OR ri.notes LIKE '%aaaa%';
        
        
        
        
        
        
        
        
        
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

    $matchrecipes = [];
    $matchtips = [];


    // Fetch up to 10 items at a time (initial load)
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
            <div id="recipe-section">
                <?php if ($recipes_count > 0): ?>
                    <?php for ($i = 0; $i < min(10, $recipes_count); $i++): ?>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= $matchrecipes[$i]['image_url']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($matchrecipes[$i]['title']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($matchrecipes[$i]['description']); ?></p>
                                        <p class="card-text"><small class="text-muted">Last updated <?= $matchrecipes[$i]['last_updated']; ?> ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <p>No recipes found.</p>
                <?php endif; ?>
            </div>
            <?php if ($recipes_count > 10): ?>
                <button id="load-more-recipes" class="btn btn-primary" data-offset="10">Load More Recipes</button>
            <?php endif; ?>


            <!--------------------------------------- Tips Section --------------------------------------->
            <h3 class="mt-5">Tips</h3>
            <div id="tips-section">
                <?php if ($tips_count > 0): ?>
                    <?php for ($i = 0; $i < min(10, $tips_count); $i++): ?>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="<?= $matchtips[$i]['image_url']; ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= htmlspecialchars($matchtips[$i]['title']); ?></h5>
                                        <p class="card-text"><?= htmlspecialchars($matchtips[$i]['description']); ?></p>
                                        <p class="card-text"><small class="text-muted">Last updated <?= $matchtips[$i]['last_updated']; ?> ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                <?php else: ?>
                    <p>No tips found.</p>
                <?php endif; ?>
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