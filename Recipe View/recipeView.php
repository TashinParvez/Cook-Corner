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

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->


    <link href="recipeView.css" rel="stylesheet" type="text/css">
</head>



<body style="background-color: #f0faf0;">

    <?php
    include('../Includes/Navbar/navbarMain.php');  // Navbar 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
    ?>

    <div class="container  pt-3  " id="main-content">
        <!-- <div class="row g-0 text-center">
            <div class="col-8  mb-4 text-start"> -->
        <div class="row g-4 text-center">
            <div class="col-8  mb-4 text-start">

                <!------------------- Segment 1 ------------------->
                <h2 class="text-start">Cornflakes, Low-Fat Milk & Berries Recipe</h2>
                <p class="text-start">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite. Perfect for parties or a quick snack, these crispy cups are packed with savory cheeseburger goodness.</p>
                <p>Uploaded on May 05 2023</p>
                <p>Uploaded by Tashin Parvez</p>
                <p>Tags: CAKE , AMERICAN , YOGURT , GRAINS , FATHER’S DAY , MOTHER’S DAY FOURTH OF JULY BREAKFAST</p>

                <img src="/Images/maxresdefault.jpg" class="img-fluid mb-4" alt="...">


                <!-- Time segment -->
                <div class="row">
                    <div class="col-auto">
                        <h5>Total Time</h5>
                        <p>55 minutes</p>
                    </div>
                    <!-- <div class="vr" style="width: 2px;"></div> -->

                    <div class="col-auto">
                        <h5>Prep Time</h5>
                        <p>55 minutes</p>
                    </div>
                    <!-- <div class="vr" style="width: 2px;"></div> -->

                    <div class="col-auto">
                        <h5>Cook Time</h5>
                        <p>55 minutes</p>
                    </div>
                </div>



                <!--------------------- Recipe Segment --------------------->
                <div class="row">
                    <div class="col-auto">
                        <p>Cuisine: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Course: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Skill level: English</p>
                    </div>
                </div>

                <!-- ------------------- Ingredients ------------------- -->
                <div class="ing-container container mb-2">
                    <h2>Ingredients</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check ing-name">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="ingredient-1" onchange="toggleOpacity(this)">
                                    <label class="form-check-label" for="ingredient-1">5 tablespoons honey (light brown sugar or maple syrup also works)</label>
                                </div>
                                <button class="btn  btn-sm">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ing-name">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="ingredient-2" onchange="toggleOpacity(this)">
                                    <label class="form-check-label" for="ingredient-2">10 cups blueberries, washed and picked over for stems</label>
                                </div>
                                <button class="btn  btn-sm">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check ing-name">
                                <div>
                                    <input type="checkbox" class="form-check-input" id="ingredient-3" onchange="toggleOpacity(this)">
                                    <label class="form-check-label" for="ingredient-3">150g Mayonnaise</label>
                                </div>
                                <button class="btn  btn-sm">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>



                <!-- ================================================== Dish Need ================================================== -->
                <div class="dish-container container mb-3">
                    <h2>Dish Needed</h2>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dish-1" onchange="toggleOpacity(this)">
                                <label class="form-check-label" for="dish-1">Fresh herbs, such as chopped parsley and/or cilantro</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dish-2" onchange="toggleOpacity(this)">
                                <label class="form-check-label" for="dish-2">10 cups blueberries, washed and picked over for stems</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dish-3" onchange="toggleOpacity(this)">
                                <label class="form-check-label" for="dish-3">150g Mayonnaise</label>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="dish-4" onchange="toggleOpacity(this)">
                                <label class="form-check-label" for="dish-4">5 tablespoons honey (light brown sugar or maple syrup also works)</label>
                            </div>
                        </li>
                    </ul>
                </div>



                <!-- ================================================== Directions ================================================== -->
                <div class="container mb-3">
                    <h2>Directions</h2>

                    <!-- Step 1 -->
                    <div class="direction-container" id="step-1">
                        <div class="step">
                            <div class="step-header">
                                <div class="step-number">1</div>
                                <div class="step-title">Make the egg cream (or substitute 3/4 to 1 cup bottled sauce):</div>
                            </div>
                            <p class="ms-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy eirmod tempor in vid unt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et acc usam et justo duo dolores et ea rebum.</p>

                        </div>
                        <div class="markSection">
                            <input type="checkbox" id="mark-complete-1" >
                            <label for="mark-complete-1">Mark as complete</label>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="direction-container" id="step-2">
                        <div class="step">
                            <div class="step-header">
                                <div class="step-number">2</div>
                                <div class="step-title">Prepare the sauce:</div>
                            </div>
                            <p class="ms-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy eirmod tempor in vid unt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et acc usam et justo duo dolores et ea rebum.</p>

                        </div>
                        <div class="markSection">
                            <input type="checkbox" id="mark-complete-2">
                            <label for="mark-complete-2">Mark as complete</label>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="direction-container" id="step-3">
                        <div class="step">
                            <div class="step-header">
                                <div class="step-number">3</div>
                                <div class="step-title">Serve the dish:</div>
                            </div>
                            <p class="ms-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed diam nonummy eirmod tempor in vid unt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et acc usam et justo duo dolores et ea rebum.</p>

                        </div>
                        <div class="markSection">
                            <input type="checkbox" id="mark-complete-3">
                            <label for="mark-complete-3">Mark as complete</label>
                        </div>
                    </div>
                </div>



                <!-- ================================================== Notes ================================================== -->
                <h2>Notes</h2>

                <div class="container">
                    <div>
                        <div class="step-header">
                            <div class="step-number">1</div>
                            <div class="step-title">Note 1</div>
                        </div>
                        <p class="ms-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div>
                        <div class="step-header">
                            <div class="step-number">2</div>
                            <div class="step-title">Note 2</div>
                        </div>
                        <p class="ms-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div>
                        <div class="step-header">
                            <div class="step-number">2</div>
                            <div class="step-title">Note 2</div>
                        </div>
                        <p class="ms-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                </div>

                <!---  __________________________________________   Segment 1 End __________________________________________  -->
            </div>

            <div class="col-4 ">

                <!-------__________________________________________ Segment 2 __________________________________________------->

                <!--------------------------- about Segment --------------------------->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">About Chef</div>
                            <div class="container text-center">
                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="image-container text-center">
                                            <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                        </div>
                                    </div>
                                    <div class="image-title">Tashin Parvez</div>
                                    <p>I create simple, delicious recipes that require 10 ingredients or less, one bowl, or 30 minutes or less to prepare.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- Neuttrations ---------------------------------- -->
                <div class="container">
                    <div class="container bg-dark text-light fw-light text-start p-3">
                        <h3>Nutrition Facts</h3> <!-- Corrected "Neuttrations" to "Nutrition" -->
                        <h6>Serving Size: 4</h6>
                        <h6>Calories Per Serving: 375</h6> <!-- Corrected "Calloris" to "Calories" -->
                    </div>

                    <div class="container">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="row">No</th>
                                    <td>Name</td>
                                    <td>Percentage/gm</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Protine</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Fat</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Carbohydrate</td>
                                    <td>100gm</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Sugar</td>
                                    <td>12gm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
                <!-- -------------------------- Neuttrations End ---------------------------------- -->
                <!-- -------------------------- Category End ---------------------------------- -->
                <!--------------------------- about Segment --------------------------->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">Category</div>
                            <div class="container text-center">
                                <!-- ------------------ tashin -->
                                <div class="row row-cols-1 row-cols-md-3 g-4">


                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>

                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-9">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image category-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>

                                </div>
                                <!-- ------------------ -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- Category End ---------------------------------- -->

                <div class="card">
                    <img src="/Images/maxresdefault.jpg" class="card-img-bottom" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <!-- __________________________________________------- Segment 2 End __________________________________________------->
            </div>
        </div>
    </div>



    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin
    // include('../Includes/Footer/footermainTry.php');  // tashin
    ?>
    <!-- ============================== Footer End ==================================== -->



    <script>
        // ingredients and dish
        function toggleOpacity(checkbox) {
            const label = checkbox.nextElementSibling; // Get the label element
            if (checkbox.checked) {
                label.style.opacity = '0.5'; // Set opacity to 0.5 when checked
            } else {
                label.style.opacity = '1'; // Set opacity back to 1 when unchecked
            }
        }

        // Direction
        const checkboxes = document.querySelectorAll('.markSection input[type="checkbox"]');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                const directionContainer = event.target.closest('.direction-container');
                if (event.target.checked) {
                    directionContainer.style.opacity = 0.5; // Reduce opacity
                } else {
                    directionContainer.style.opacity = 1; // Restore opacity
                }
            });
        });
    </script>

</body>

</html>