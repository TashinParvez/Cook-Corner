<?php

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

    <?php
    include('../Includes/Navbar/navbarMain.php');
    ?>

    <section class="best-recipe">
        <div class="container">
            <div class="row g-0 text-center">
                <div class="col-12">
                    <h2 class="m-0 p-0">Occasions</h2>
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
                <?php foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $key => $value): ?>
                    <div class="swiper-slide">
                        <a href="javascript:void(0);" class="category-tab" data-target="content-<?php echo $key; ?>">
                            <div class="card text-center bg-transparent border-0">
                                <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 70px; height: 70px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">Eid al-Fitr <?php echo $key; ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>

        <!-- Tab Content Area (this does not slide) -->
        <div class="tab-content">
            <?php foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $key => $value): ?>
                <div class="tab-pane fade <?php echo ($key == 0) ? 'show active' : ''; ?>" id="content-<?php echo $key; ?>">
                    <div class="special-category">
                        <h3>Special Occasion: Eid al-Fitr <?php echo $key; ?></h3>
                        <div class="child-list">
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- <section>
        <div class="container">
            

      <div class="child-list">
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            </div>
    </div>

      </section> -->

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
    <!-- <script>
    document.querySelectorAll('.category-tab').forEach(function (element) {
        element.addEventListener('click', function () {
            // Remove active class from all tab panes
            document.querySelectorAll('.tab-pane').forEach(function (pane) {
                pane.classList.remove('show', 'active');
            });

            // Get the target pane ID from the clicked category's data-target attribute
            var target = this.getAttribute('data-target');

            // Add active class to the targeted tab pane
            document.getElementById(target).classList.add('show', 'active');
        });
    });
</script> -->

    <!-- <script>
    document.querySelectorAll('.category-tab').forEach(function (element) {
        element.addEventListener('click', function () {
            // Remove active class from all tab panes
            document.querySelectorAll('.tab-pane').forEach(function (pane) {
                pane.classList.remove('show', 'active');
            });

            // Remove 'active-tab' class from all category tabs
            document.querySelectorAll('.category-tab').forEach(function (tab) {
                tab.classList.remove('active-tab');
            });

            // Get the target pane ID from the clicked category's data-target attribute
            var target = this.getAttribute('data-target');

            // Add active class to the targeted tab pane
            document.getElementById(target).classList.add('show', 'active');

            // Add 'active-tab' class to the clicked category tab
            this.classList.add('active-tab');
        });
    });
</script> -->

    <script>
        document.querySelectorAll('.category-tab').forEach(function(element) {
            element.addEventListener('click', function() {
                // Remove active class from all tab panes
                document.querySelectorAll('.tab-pane').forEach(function(pane) {
                    pane.classList.remove('show', 'active');
                });

                // Remove 'active-tab' class from all category tabs
                document.querySelectorAll('.category-tab').forEach(function(tab) {
                    tab.classList.remove('active-tab');
                });

                // Get the target pane ID from the clicked category's data-target attribute
                var target = this.getAttribute('data-target');

                // Add active class to the targeted tab pane
                document.getElementById(target).classList.add('show', 'active');

                // Add 'active-tab' class to the clicked category tab
                this.classList.add('active-tab');
            });
        });
    </script>


</body>

</html>








<!-- 
<div class="child-list">
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                                <a href="#" class="text-decoration-none">Eid al-Fitr</a>
                            </div> -->