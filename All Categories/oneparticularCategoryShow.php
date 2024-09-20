<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");


$page_name = "Appetizers"; //---------> this will come from all category page


$categories_per_page = 24; // 6 rows * 4 categories per row
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $categories_per_page;


$sql_count = "SELECT COUNT(*) 
              FROM `recipe_category`";


$total_categories = mysqli_fetch_array(mysqli_query($conn, $sql_count))[0];


// Calculate total pages
$total_pages = ceil($total_categories / $categories_per_page);



// --------------- Sort by name with limit and offset -----------------
$sql = "SELECT * 
        FROM  recipe_category
        ORDER BY name 
        LIMIT $categories_per_page OFFSET $offset";


$result = mysqli_query($conn, $sql);
$allcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);



mysqli_free_result($result);
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_name); ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
        <h2 class="text-center mt-5 mb-3">Recipe Category: <b><?php echo htmlspecialchars($page_name); ?></b> </h2>
        <p>Explore a wide range of categories, each offering unique recipes tailored to your taste.<br>Find your next favorite dish across different cuisines and cooking styles.</p>
    </div>

    <div class="container mt-4 justify-content-center align-items-center">
        <div class="row justify-content-center">
            <!-------------------------------------------------- Search -------------------------------------------------->
            <div class="col-6 justify-content-center align-items-center">
                <form class="w-100 me-3" role="search">
                    <input type="search" class="form-control p-2" placeholder="Search Category..." aria-label="Search">
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
                        <!-- <?php echo htmlspecialchars($total_recipies); ?> -->
                    </b> Matched Category </h6>
            </div>

            <div class="col-4">
                <!------------------------ sort ------------------------>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sorted by: Name
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Most Recipes</a></li>
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


                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>


                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <img src="/Images/FoodImages/1.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
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