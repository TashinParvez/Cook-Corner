<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");


$category_id = isset($_GET['category_id']) ? htmlspecialchars($_GET['category_id']) : '1'; //---------> this will come from all category page

$stmt = $conn->prepare('SELECT name FROM recipe_category WHERE id = ? LIMIT 1;');

$stmt->bind_param('i', $category_id);
$stmt->execute();
$stmt->bind_result($category_name);
$stmt->fetch();
$stmt->close();


// --------------- Sort by name/ recently/ most recipes with limit and offset -----------------

$recipes_per_page = 16; // 4 rows * 4 categories per row
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $recipes_per_page;

// .......Set default value for order if not provided
$sort = isset($_POST['sortInput']) ? $_POST['sortInput'] : 'namewise';

switch ($sort) {
    case 'namewise':
        $sortBy = "ri.title";
        break;
    case 'recentlyAdded':
        $sortBy = "ri.created_at DESC";
        break;
    case 'mostRecipes': // pending
        $sortBy = "recipe_count DESC";
        break;
    default:
        $sortBy = "ri.title"; // Default sorting
        break;
}

// ..............If search something

$search_text = '';
$search_extended_query = '';

if (isset($_POST['recipes_search'])) {
    $search_text = $_POST['recipes_search'] ?? '';

    if (!empty($search_text)) {
        $search_extended_query = "AND (
                            ri.title LIKE ? 
                            OR ri.sub_title LIKE ? 
                            OR ri.description LIKE ?
                            OR ri.recipe_id IN (
                                    SELECT rt.recipe_id 
                                    FROM recipe_tags rt
                                    JOIN tags t ON rt.tag_id = t.tag_id
                                    WHERE t.tag_name LIKE ?
                                ))";
    }
}


$sql = "SELECT SQL_CALC_FOUND_ROWS ri.recipe_id, ri.title, ri.description, rf.rating, ri.image, COUNT(ri.recipe_id) AS recipe_count
        FROM
            recipe_info ri LEFT JOIN recipe_feedback rf 
        ON 
            ri.recipe_id = rf.recipe_id
        WHERE 
            ri.recipe_id IN (
                SELECT recipe_id FROM junction_recipe_info_recipe_category WHERE category_id = ?
            )
        $search_extended_query 
        GROUP BY ri.recipe_id 
        ORDER BY $sortBy
        LIMIT ? OFFSET ?;";

$stmt = $conn->prepare($sql);

if (!empty($search_text)) {

    $search_param = '%' . $search_text . '%';

    $stmt->bind_param('ssssi', $search_param, $search_param, $search_param, $search_param, $category_id, $recipes_per_page, $offset);
} else {

    $stmt->bind_param('iii', $category_id, $recipes_per_page, $offset);
}

$stmt->execute();
$result = $stmt->get_result();
$recipes = $result->fetch_all(MYSQLI_ASSOC);

$total_recipes_result = $conn->query("SELECT FOUND_ROWS()");
$total_recipes = $total_recipes_result->fetch_array()[0];

$total_pages = ceil($total_recipes / $recipes_per_page);

$stmt->close();
mysqli_close($conn);

// ----------------------------------------------------------------

// Output format

// $recipes = [
//     [
//         'recipe_id' => 1,                     
//         'title' => 'Recipe Title',  
//         'description' => 'Recipe Description',  
//         'rating' => 3, 
//         'image' => 'Image/Link',            
//     ]
// ]

// ----------------------------------------------------------------

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($category_name); ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="CSS/pagination.css">
    <link rel="stylesheet" href="CSS/filterPageOfOneCategory.css">

</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // Navbar 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
    ?>

    <!------------------------------------  Page info  ------------------------------------>
    <div class="container text-center">
        <h2 class="text-center mt-5 mb-3">Recipe Category: <b><?php echo htmlspecialchars($category_name); ?></b> </h2>
        <p>Explore a wide range of categories, each offering unique recipes tailored to your taste.<br>Find your next favorite dish across different cuisines and cooking styles.</p>
    </div>

    <div class="container mt-4 justify-content-center align-items-center">
        <div class="row justify-content-center">
            <!-------------------------------------------------- Search -------------------------------------------------->
            <div class="col-6 justify-content-center align-items-center">
                <form class="w-100 me-3" role="search" action="oneparticularCategoryShow.php" method="post">
                    <input type="search" class="form-control p-2" placeholder="Search a recipe..." aria-label="Search"
                        name="recipes_search" value="<?php echo htmlspecialchars($search_text); ?>">
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Centered HR with 80% width -->
        <hr class="mx-auto" style="width: 90%;">
        <div class="row justify-content-around" style="width: 80%; margin: 0 auto;">

            <div class="col-3">
                <h6><b>
                        <?php echo htmlspecialchars($total_recipes); ?>
                    </b> Recipes </h6>
            </div>

            <div class="col-4">
                <!------------------------ sort ------------------------>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sorted by: <?php
                                    switch ($sort) {
                                        case 'namewise':
                                            echo 'Name';
                                            break;
                                        case 'recentlyAdded':
                                            echo 'Recently Added';
                                            break;
                                        case 'mostRecipes':
                                            echo 'Most Recipes';
                                            break;
                                    }
                                    ?>
                    </button>

                    <script>
                        function submiSorttForm(sortInput) { // hidden input name
                            document.getElementById('sortInput').value = sortInput; // hidden input id
                            document.getElementById('sortForm').submit(); // form id
                        }
                    </script>

                    <form id="sortForm" action="oneparticularCategoryShow.php" method="post">
                        <input type="hidden" name="sortInput" id="sortInput">
                    </form>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('namewise')"><span id="check-name"><?php echo ($sort == 'namewise') ? '✔' : ''; ?></span> Name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('recentlyAdded')"><span id="check-recent"><?php echo ($sort == 'recentlyAdded') ? '✔' : ''; ?></span> Recently Added</a></li>
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('mostRecipes')"><span id="check-popularity"><?php echo ($sort == 'mostRecipes') ? '✔' : ''; ?></span> Most Recipes</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-3">
                <!-- ------------------------------- Filters --------------------------------------- -->

                <div class="filter-section">
                    <p class="filter-title">FILTER BY:</p>

                    <div class="filter-option">
                        <input type="checkbox" id="test-kitchen" class="form-check-input">
                        <label for="test-kitchen" class="form-check-label">Test Kitchen-Approved</label>
                    </div>

                    <div class="filter-option">
                        <input type="checkbox" id="contest-winners" class="form-check-input">
                        <label for="contest-winners" class="form-check-label">Contest Winners</label>
                    </div>

                    <div class="filter-option">
                        <input type="checkbox" id="featured" class="form-check-input">
                        <label for="featured" class="form-check-label">Featured</label>
                    </div>

                    <!-- Meal Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#mealFilters" role="button" aria-expanded="false" aria-controls="mealFilters">
                        <span>Meal</span>
                        <span id="mealIcon">+</span>
                    </div>
                    <div class="collapse" id="mealFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Dish Type Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#dishTypeFilters" role="button" aria-expanded="false" aria-controls="dishTypeFilters">
                        <span>Dish Type</span>
                        <span id="dishTypeIcon">+</span>
                    </div>
                    <div class="collapse" id="dishTypeFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Ingredient Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#ingredientFilters" role="button" aria-expanded="false" aria-controls="ingredientFilters">
                        <span>Ingredient</span>
                        <span id="ingredientIcon">+</span>
                    </div>
                    <div class="collapse" id="ingredientFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Special Consideration Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#specialConsiderationFilters" role="button" aria-expanded="false" aria-controls="specialConsiderationFilters">
                        <span>Special Consideration</span>
                        <span id="specialConsiderationIcon">+</span>
                    </div>
                    <div class="collapse" id="specialConsiderationFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Occasion Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#occasionFilters" role="button" aria-expanded="false" aria-controls="occasionFilters">
                        <span>Occasion</span>
                        <span id="occasionIcon">+</span>
                    </div>
                    <div class="collapse" id="occasionFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Preparation Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#preparationFilters" role="button" aria-expanded="false" aria-controls="preparationFilters">
                        <span>Preparation</span>
                        <span id="preparationIcon">+</span>
                    </div>
                    <div class="collapse" id="preparationFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                    <!-- Cuisine Section -->
                    <div class="filter-category" data-bs-toggle="collapse" href="#cuisineFilters" role="button" aria-expanded="false" aria-controls="cuisineFilters">
                        <span>Cuisine</span>
                        <span id="cuisineIcon">+</span>
                    </div>
                    <div class="collapse" id="cuisineFilters"><!-- collapse seg -->
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="breakfast" class="form-check-input">
                            <label for="breakfast" class="form-check-label">Breakfast</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="dinner" class="form-check-input">
                            <label for="dinner" class="form-check-label">Dinner</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="entree" class="form-check-input">
                            <label for="entree" class="form-check-label">Entree</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="side" class="form-check-input">
                            <label for="side" class="form-check-label">Side</label>
                        </div>
                        <div class="filter-option ms-3">
                            <input type="checkbox" id="snack" class="form-check-input">
                            <label for="snack" class="form-check-label">Snack</label>
                        </div>
                    </div>

                </div>




                <!-- ------------------------------- Filters END --------------------------------------- -->
                <script>
                    // Function to toggle + and - symbols
                    const categories = document.querySelectorAll('.filter-category');
                    categories.forEach(category => {
                        category.addEventListener('click', function() {
                            const icon = this.querySelector('span:last-child');
                            if (icon.innerHTML === '+') {
                                icon.innerHTML = '-';
                            } else {
                                icon.innerHTML = '+';
                            }
                        });
                    });
                </script>
            </div>



            <!-- ------------------------------- recipies --------------------------------------- -->
            <div class="col-9">
                <div class="row row-cols-1 row-cols-md-4 g-4">

                    <script>
                        function submirecipeForm(recipe_id) {
                            const form = document.getElementById('recipeForm');
                            form.action = '../Recipe View/recipeView.php?recipe_id=' + recipe_id;
                            form.submit();
                        }
                    </script>

                    <form id="recipeForm" action="../Recipe View/recipeView.php" method="post">
                        <!-- No hidden input needed -->
                    </form>

                    <?php foreach ($recipes as $recipe) { ?>

                        <div class="col"> Mahbub/Tashin
                            <a href="#" class="text-decoration-none text-dark" onclick="submirecipeForm(<?php echo $recipe['recipe_id']; ?>)">
                                <div class="card">
                                    <img src="<?php echo $recipe['image']; ?>" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $recipe['title']; ?></h5>
                                        <p class="card-text"><?php echo $recipe['description']; ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>

                </div>


                <!----------------------------------------- Pagination Section ----------------------------------------->
                <div class="container mt-5">

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <!-- Previous Button -->
                            <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">Prev</a>
                            </li>

                            <!-- Page Numbers -->
                            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php } ?>

                            <!-- Next Button -->
                            <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>


            </div>



        </div>
    </div>




    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>