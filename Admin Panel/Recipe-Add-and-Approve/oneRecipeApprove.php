<?php

//...................... Database Connection ..............................
include("/Cook-Corner/Includes/Database Connection/database_connection.php");


$recipe_id = 1;  // from another page


//--------------------------------------------------------------------------------
//---------------------------  Recipe Info Show ----------------------------------
//--------------------------------------------------------------------------------


$sql = "SELECT  ri.recipe_id, ri.title	,ri.subtitle	,ri.prep_time,
                ri.cook_time, ri.directions	 ,ri.servings	,ri.skill_level,
                user_info.first_name, user_info.last_name

        FROM `recipe_info`  as ri 
        INNER JOIN
        junction_recipe_ingredients as jun 
        ON ri.recipe_id = jun.recipe_id
        INNER JOIN
        ingredient_info as ii
        ON ii.ingredient_id = jun.ingredient_id
        INNER JOIN user_info
        ON ri.author = user_info.id

        WHERE ri.recipe_id = 1;";  // recipe id change

$resultantLabel = mysqli_query($conn, $sql);
$recipe_info = mysqli_fetch_all($resultantLabel);

// print_r($recipe_info);




//--------------------------------------------------------------------------------
//---------------------------  ALL Category -------------------------------------------
//------------------------------------------------------------------------------

//---------------------------     recipe_category
$sql = "SELECT id,name,description FROM `recipe_category` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$recipe_category = mysqli_fetch_all($resultantLabel);


//---------------------------  meal_type  
$sql = "SELECT * FROM `meal_type` WHERE 1;";
$resultantLabel = mysqli_query($conn, $sql);
$meal_type = mysqli_fetch_all($resultantLabel);


//---------------------------     cuisine_type
$sql = "SELECT * FROM `cuisine_type` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$cuisine_type = mysqli_fetch_all($resultantLabel);


//---------------------------     dietary_preferences
$sql = "SELECT * FROM `dietary_preferences` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$dietary_preferences = mysqli_fetch_all($resultantLabel);


//---------------------------     health_focus
$sql = "SELECT * FROM `health_focus` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$health_focus = mysqli_fetch_all($resultantLabel);


//---------------------------     cooking_method
$sql = "SELECT * FROM `cooking_method` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$cooking_method = mysqli_fetch_all($resultantLabel);


//---------------------------     dishes
$sql = "SELECT * FROM `dishes` WHERE 1";
$resultantLabel = mysqli_query($conn, $sql);
$dishes = mysqli_fetch_all($resultantLabel);

//---------------------------  event info
$sql = "SELECT * FROM `event_info` WHERE 1;";
$resultantLabel = mysqli_query($conn, $sql);
$event_info = mysqli_fetch_all($resultantLabel);

//  recipe_category   meal_type  cuisine_type  dietary_preferences  health_focus  cooking_method  dishes  event_info
// print_r($recipe_category);





mysqli_free_result($resultantLabel);
mysqli_close($conn);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management

    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="/Images/logo/fav-icon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="oneRecipeApprove.css">

</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php
        include '/Cook-Corner/Admin Panel/Includes/sidebar.php';
        ?>

        <!-- Main content area -->
        <div class="container p-5 flex-grow-1">
            <div class="container mt-5">
                <header class="text-center mb-4">
                    <h1>Recipe Management</h1>
                </header>



                <!-- Accordion for Recipe Info -->
                <div class="accordion" id="recipeAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <div class="accordion-body">
                                    <!------------------- Accordion Head ------------------->
                                    <!-- Noman: title , subtitle, added by, then list of ingredents -->


                                    <!-- // print_r($recipe_info); -->

                                    <h2><strong> <?php echo htmlspecialchars($recipe_info[1]); ?> </strong> </h2>
                                    <span> <?php echo htmlspecialchars($recipe_info[2]); ?> </span>
                                    <p><strong>Submitted by:</strong> User Name (user@example.com)</p>

                                    <h5>Ingredients:</h5>
                                    <ul>

                                        <li>Flour</li>
                                    </ul>
                                    <!-- Accordion Head End -->

                                </div>

                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                            data-bs-parent="#recipeAccordion">
                            <div class="accordion-body">

                                <!-- Accordion Body  -->
                                <!-- Noman: description, directions, tags -->

                                <p><strong>Submitted by:</strong> User Name (user@example.com)</p>
                                <h5>Ingredients:</h5>
                                <ul>
                                    <li>Flour</li>
                                    <li>Sugar</li>
                                    <li>Cocoa Powder</li>
                                </ul>
                                <h5>Instructions:</h5>
                                <p>Mix ingredients and bake at 350°F for 30 minutes.</p>
                                <h5>Images:</h5>
                                <img src="recipe-image.jpg" alt="Chocolate Cake" class="img-fluid">

                                <!-- Accordion Body End -->


                            </div>
                        </div>
                    </div>
                </div>


                <!--------------------------- Categorization Section --------------------------->
                <!-- //  recipe_category   meal_type  cuisine_type  dietary_preferences  health_focus  cooking_method  dishes  event_info -->
                <form id="categoryForm">
                    <h4>Select Categories</h4>




                    <!-- Category 1: recipe_category -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 1: Recipe Category</h6>
                        <?php foreach ($recipe_category as $item) { ?>

                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>

                        <?php } ?>
                    </div>

                    <!-- cuisine_type  dietary_preferences  health_focus  cooking_method  dishes  event_info -->

                    <!-- Category 2: recipe_category -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 2: Meal Type</h6>
                        <?php foreach ($meal_type as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>


                    <!--  dietary_preferences  health_focus  cooking_method  dishes  event_info -->

                    <!-- Category 3: cuisine_type -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 3: cuisine Type</h6>
                        <?php foreach ($cuisine_type as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>

                    <!--     health_focus  cooking_method  dishes  event_info -->
                    <!-- Category 4: cuisine_type -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 4: Dietary Preferences Type</h6>
                        <?php foreach ($dietary_preferences as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>



                    <!--     health_focus  cooking_method  dishes  event_info -->

                    <!-- Category 5: health_focus -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 5: Health Focus Type</h6>
                        <?php foreach ($health_focus as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>


                    <!--        cooking_method  dishes  event_info -->

                    <!-- Category 6: cooking_method -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 6: Cooking Method Type</h6>
                        <?php foreach ($cooking_method as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>

                    <!--         event_info -->
                    <!-- Category 6: event_info -->
                    <div class="card p-3 shadow-sm">
                        <h6>Category 6: Event Info Type</h6>
                        <?php foreach ($event_info as $item) { ?>
                            <div class="form-check category-section">
                                <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                                <label class="form-check-label" for="eventBirthday">
                                    <?php echo htmlspecialchars($item[1]); ?>
                                </label>
                            </div>
                        <?php } ?>
                    </div>



                    <!--------------------------------- Approve and Reject Buttons --------------------------------->
                    <div class="text-end approve-btn">
                        <button type="button" class="btn btn-success" onclick="approveRecipe()">Approve Recipe</button>
                        <button type="button" class="btn btn-danger" onclick="rejectRecipe()">Reject Recipe</button>
                    </div>
                </form>

                <div class="mt-3">
                    <p id="notification-message" class="notification"></p>
                </div>
            </div>

            <script>
                function approveRecipe() {
                    const selectedCategories = [
                        'eventBirthday', 'eventMarriage', 'eventEid', 'eventPuja', 'eventOther',
                        'cuisineIndian', 'cuisineChinese'
                    ].filter(id => document.getElementById(id).checked).map(id => document.getElementById(id).value);

                    if (selectedCategories.length === 0) {
                        displayNotification('Please select at least one category.', 'error');
                    } else {
                        displayNotification('Recipe approved successfully! Categories: ' + selectedCategories.join(', '));
                    }
                }

                function rejectRecipe() {
                    displayNotification('Recipe rejected. Please provide feedback if necessary.', 'error');
                }

                function displayNotification(message, type = '') {
                    const notificationElement = document.getElementById('notification-message');
                    notificationElement.textContent = message;
                    notificationElement.className = type === 'error' ? 'notification error' : 'notification';
                }
            </script>
        </div>

        <!-- Custom styles -->
        <style>
            .d-flex {
                display: flex;
            }

            .sidebar {
                background-color: #f8f9fa;
                /* Customize this based on your sidebar design */
            }

            .container {
                padding-left: 20px;
                padding-right: 20px;
            }
        </style>
    </div>
</body>

</html>