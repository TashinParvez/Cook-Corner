<?php

include('../Includes/Navbar/navbarMain.php');
include("../Includes/Database Connection/database_connection.php");

// SQL query to fetch event details
$sql = "SELECT event_id, event_name, description FROM event_info";
$result = $conn->query($sql);

// Get the event_id from URL or set default
$selected_event_id = isset($_GET['event_id']) ? intval($_GET['event_id']) : null;

$event__name = ''; // Default value in case no event is found

if ($selected_event_id) {
    // Use a prepared statement to safely handle the event_id
    $event_name_sql = "SELECT event_name FROM event_info WHERE event_id = ?";
    
    if ($stmt = $conn->prepare($event_name_sql)) {
        // Bind the event_id as an integer parameter
        $stmt->bind_param("i", $selected_event_id);
        $stmt->execute();
        
        // Get the result
        $resultantLabel = $stmt->get_result();
        
        // Check if any rows are returned
        if ($resultantLabel->num_rows > 0) {
            // Fetch the event name from the first row
            $row = $resultantLabel->fetch_assoc();
            $event__name = $row['event_name'];
        } else {
            // If no event is found, set a default message
            $event__name = "Event not found";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        // Handle SQL preparation failure
        echo "Error preparing the SQL statement.";
    }
}

// Fetch recipes for the selected event_id
if ($selected_event_id) {
    $recipe_sql = "
SELECT r.recipe_id, r.title, r.image, r.description, r.author, r.rating, r.prep_time, r.cook_time, COUNT(jri.ingredient_id) AS ingredient_count
FROM recipe_info r
INNER JOIN junction_event_recipes jer ON r.recipe_id = jer.recipe_id
LEFT JOIN junction_recipe_ingredients jri ON r.recipe_id = jri.recipe_id
WHERE jer.event_id = $selected_event_id
GROUP BY r.recipe_id, r.title, r.image, r.description, r.author, r.rating, r.prep_time, r.cook_time";
    $recipe_result = $conn->query($recipe_sql);
} else {
    $recipe_sql = "
       SELECT r.recipe_id, r.title, r.image, r.description, r.author, r.rating, r.prep_time, r.cook_time, COUNT(jri.ingredient_id) AS ingredient_count
FROM recipe_info r
INNER JOIN junction_event_recipes jer ON r.recipe_id = jer.recipe_id
LEFT JOIN junction_recipe_ingredients jri ON r.recipe_id = jri.recipe_id
GROUP BY r.recipe_id, r.title, r.image, r.description, r.author, r.rating, r.prep_time, r.cook_time";
    $recipe_result = $conn->query($recipe_sql);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css">
    <link rel="stylesheet" href="./Occasion-style.css">
    <!-- <link rel="stylesheet" href="CSS/pagination.css">
    <link rel="stylesheet" href="CSS/filterPageOfOneCategory.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- css  -->
    <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->
</head>


<body>

   

    <section class="best-recipe">
        <div class="container">
            <div class="row g-0 text-center">
                <div class="col-12">
                <h2 class="m-0 p-0">Occasions <?php echo htmlspecialchars($event__name ?? ''); ?></h2>
                <p class="m-0 p-0">Plan your special moments with ease and discover personalized recipes, menus and ideas for every
                        celebration, from birthdays to anniversaries, all in one place.</p>
                </div>
            </div>
        </div>
    </section>


    <!------------------------------------------------- categories section  ----------------------------------------------->
    <div class="container">
        <!-- Swiper for categories -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php if($result->num_rows > 0): ?>
                    <?php while($row = $result-> fetch_assoc()): ?>
                        <?php 
                            // Check if the current event is the selected one
                             $is_active = ($row['event_id'] == $selected_event_id) ? 'active' : '';
                            ?>
                    <div class="swiper-slide">
                        <a href="?event_id=<?php echo $row['event_id']; ?>" class="category-tab <?php echo $is_active; ?>" data-target="content-<?php echo $row['event_id']; ?>">
                            <div class="card text-center bg-transparent border-0">
                                <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 70px; height: 70px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($row['event_name']); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php else: ?>
                    <p>No Occasions Found</p>
            </div>
            <?php endif; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

      
    </div>
   
    <div class="container">

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
        <?php if($recipe_result->num_rows > 0): ?>
            <?php while($recipe_row = $recipe_result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card recipe-card">
                        <div class="recipe-img">
                            <img src="/Images/FoodImages/<?php echo htmlspecialchars($recipe_row['image']); ?>.jpg" class="card-img-top" alt="Recipe Image">
                            <i class="fas fa-bookmark save-icon"></i> <!-- Bookmark icon -->
                        </div>
                        <div class="card-body recipe-info">
                            <h5 class="recipe-title"><?php echo htmlspecialchars($recipe_row['title']); ?></h5>
                            <p class="added-by">Added by: <strong><?php echo htmlspecialchars($recipe_row['author']); ?></strong></p>
                            <div class="ratings">
                                <span>★★★★☆</span>
                                <small>(<?php echo htmlspecialchars($recipe_row['rating']); ?>)</small> <!-- Display rating -->
                            </div>
                        </div>
                        <div class="hover-details">
                            <p><strong>Prep Time:</strong> <?php echo htmlspecialchars($recipe_row['prep_time']); ?> mins</p>
                            <p><strong>Cook Time:</strong> <?php echo htmlspecialchars($recipe_row['cook_time']); ?> mins</p>
                            <p><strong>Ingredients:</strong> <?php echo htmlspecialchars($recipe_row['ingredient_count']); ?></p> <!-- Ingredient count -->
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No recipes found for this event.</p>
        <?php endif; ?>
    </div>
</div>



                    <!----------------------------------------- Pagination Section ----------------------------------------->
                    <div class="container mt-5">

                        <!---------------------------------- Logo Pagination Section ---------------------------------->
                        <div class="logo-pagination d-flex justify-content-center align-items-center mb-3">
                            <!-- Previous Button -->
                            <a href="?page=<?php echo $current_page - 1; ?>"
                                class="prev-arrow me-4 <?php if ($current_page <= 1) echo 'disabled'; ?>">
                                &lt;&lt;
                            </a>

                            <!-- Logo or Center Text -->
                            <div class="logo-box">
                                <img src="../Images/logo/cook_Corner_LOGO-removebg-mainPartOnly.png" alt="Logo" style=" width: 100px;">
                            </div>

                            <!-- Next Button -->
                            <a href="?page=<?php echo $current_page + 1; ?>"
                                class="next-arrow ms-4 <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                                &gt;&gt;
                            </a>
                        </div>

                        <!---------------------------------- Pagination Section ---------------------------------->
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <!-- Previous Button -->
                                <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                                    <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">Previous</a>
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
        </div>

    </div>

    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');
    ?>
    <!-- ============================== Footer End ==================================== -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 2,
            loop: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            // cssMode: true,
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
        });
    </script>
</body>

</html>

