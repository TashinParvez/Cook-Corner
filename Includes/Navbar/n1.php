<?php

session_start();

$user_id = $_SESSION['user_id'] ?? '5';


// for search
// Check if the variable is defined; if not, set it to an empty string
$search_query = $search_query ?? '';


//...................... Database Connection ..............................
// include("../Includes/Database Connection/database_connection.php");  // for home page
// include("../../Includes/Database Connection/database_connection.php");  // for only navbar

include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");   // new for search

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Database connected successfully!";
}



$sql = "SELECT event_id, event_name FROM event_info";
$result = $conn->query($sql);


$stmt = $conn->prepare('SELECT first_name FROM user_info WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();

$stmt->close();


// --------------------------------------------- fetch data For search ------------------------
$data = array();

// Fetch data ( FROM recipe_info and ingredient_info tables )

// $sql = "SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL 
//         UNION
//         SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL
//         UNION
//         SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL
//         UNION
//         SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL";



$sql = "    SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL 
            UNION
            SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL
            UNION
            SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL
            UNION
            SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL 
            UNION
            SELECT name AS combined_info FROM `recipe_category` WHERE name IS NOT NULL 
            UNION
            SELECT cuisine_name AS combined_info FROM `cuisine_type` WHERE cuisine_name IS NOT NULL 
            UNION
            SELECT meal_name AS combined_info FROM `meal_type` WHERE meal_name IS NOT NULL 
            UNION
            SELECT method_name AS combined_info FROM `cooking_method` WHERE method_name IS NOT NULL
            UNION
            SELECT spice_name AS combined_info FROM `spices` WHERE spice_name IS NOT NULL
            UNION
            SELECT city_name AS combined_info FROM `cities` WHERE city_name IS NOT NULL
            UNION
            SELECT event_name AS combined_info FROM `event_info` WHERE event_name IS NOT NULL
            UNION
            SELECT preference_name AS combined_info FROM `dietary_preferences` WHERE preference_name IS NOT NULL
            UNION
            SELECT focus_name AS combined_info FROM `health_focus` WHERE focus_name IS NOT NULL
            UNION
            SELECT tips_title AS combined_info FROM `kitchen_tips` WHERE tips_title IS NOT NULL
            UNION
            SELECT description AS combined_info FROM `kitchen_tips` WHERE description IS NOT NULL
            UNION
            SELECT name AS combined_info FROM `kitchen_tips_category` WHERE name IS NOT NULL
            UNION
            SELECT description AS combined_info FROM `kitchen_tips_category` WHERE description IS NOT NULL
            ORDER BY RAND() 
            -- LIMIT 8 ";



$resultForSuggestion = mysqli_query($conn, $sql);  // get query result 

foreach ($resultForSuggestion as $row) {
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

// ------------------------------------------------------------------------------------------------



mysqli_free_result($resultForSuggestion);
mysqli_close($conn);

// echo $name;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <!-- Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="navbarMain.css">
    <!-- <link rel="stylesheet" href="sidebar.css"> -->
    <!-- sidebar -->
</head>

<body>

    <header class="sticky-top">
        <!---------------------------------- First segment ---------------------------------->
        <!-- navbar bg-dark sticky-top  -->
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Home/Homepage.php"><img src="../../Images/logo/cook_Corner_LOGO-removebg.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse upper-nav" id="navbarSupportedContent">


                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->


                    <!-- tashin search change here -->

                    <form class="d-flex" role="search" action="/Search/globalsearchOutput.php" method="GET">
                        <input class="form-control search me-2" id="search-input" type="search" name="query" placeholder="Search your Recipe" aria-label="Search" value="<?= htmlspecialchars($search_query); ?>" required autocomplete="off">
                        <div id="suggestions" class="list-group position-absolute" style="width: 100%; max-height: 200px; z-index: 1000; overflow-y: auto;"></div>
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </form>

                    <!-- Include jQuery -->
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                    <script>
                        $(document).ready(function() {
                            let selectedIndex = -1; // Tracks the current selection index
                            let suggestions = [];

                            // AJAX for getting suggestions as user types
                            $('#search-input').on('input', function() {
                                let query = $(this).val();

                                if (query.length > 0) {
                                    $.ajax({
                                        url: '/Cook-Corner/Includes/Navbar/navbar.php', // Ensure this is the correct PHP file path
                                        type: 'POST',
                                        data: {
                                            query: query
                                        },
                                        success: function(data) {
                                            suggestions = JSON.parse(data); // Parse the suggestions JSON
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

                            // Handle up/down key navigation for suggestions
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
                                $('#suggestions').empty(); // Clear suggestions after selection
                                $('form').submit(); // Submit the form when a suggestion is clicked
                            });

                            // Highlight the currently selected suggestion
                            function highlightSuggestion(index) {
                                $('#suggestions .list-group-item').removeClass('active'); // Remove active class from all items
                                $('#suggestions .list-group-item').eq(index).addClass('active'); // Add active class to the current item
                            }

                            // Hide suggestions when clicking outside the input or suggestion box
                            $(document).click(function(e) {
                                if (!$(e.target).closest('#search-input, #suggestions').length) {
                                    $('#suggestions').empty();
                                }
                            });
                        });
                    </script>




                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->
                    <!-- -------------------------------------------------------------- -->


                    <div class="login-icon">
                        <div class="text-end">
                            <?php if ($user_id): ?>
                                <span class="text-black">Welcome &nbsp;<?= htmlspecialchars($name); ?></span>
                                <!-- <a href="../../User Account/logout.php" class="text-black text-decoration-none ms-3">Logout</a> -->
                            <?php else: ?>
                                <a href="../../Login SignUp/Login.php" class="text-black text-decoration-none">Login</a>
                                <span>|</span>
                                <a href="../../Login SignUp/Signup.php" class="text-black text-decoration-none">Sign Up</a>
                            <?php endif; ?>
                        </div>

                        <!-- Sidebar -->
                        <div class="icons">
                            <a href="../../User Account/updateAccountInfo.php" class="text-black text-decoration-none" title="Profile"><i class="fa-solid fa-user"></i></a>
                            <a href="#" class="text-black text-decoration-none" title="Glossary List" id="todoBtn"><i class="fa-solid fa-calendar-check"></i></a>
                            <a href="#" class="text-black text-decoration-none" title="Cart" id="cartBtn"><i class="fa-solid fa-cart-shopping"></i></a>
                            <a href="#" class="text-black text-decoration-none" title="Favourites" id="favBtn"><i class="fa-solid fa-heart"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <!-- end 1st seg -->


        <!---------------------------------- Second segment ---------------------------------->
        <div class="navbar navbar-expand-lg px-3 py-2 border-bottom  bg-light">

            <div class="container d-flex flex-wrap justify-content-center">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Home/Homepage.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Recipe Search/RecipeSearch.php" role="button" aria-expanded="false">
                            Recipe
                        </a>
                        <ul class="dropdown-menu recipe-menu">
                            <div class="container-fluid">
                                <div class="row nav-row">
                                    <div class="col-md-2">
                                        <h6>Popular Categories</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="/All Categories/oneparticularCategoryShow.php">Appetizer</a></li>
                                            <li><a class="dropdown-item" href="#">Main Course</a></li>
                                            <li><a class="dropdown-item" href="#">Desserts</a></li>
                                            <li><a class="dropdown-item" href="#">Snickers</a></li>
                                            <li><a class="dropdown-item" href="#">Beverage</a></li>
                                            <li><a class="dropdown-item" href="#">Street Food</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Recipe by Meal</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Breakfast</a></li>
                                            <li><a class="dropdown-item" href="#">Brunch</a></li>
                                            <li><a class="dropdown-item" href="#">Lunch</a></li>
                                            <li><a class="dropdown-item" href="#">Dinner</a></li>
                                            <li><a class="dropdown-item" href="#">Snacks</a></li>
                                            <li><a class="dropdown-item" href="#">Desserts</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Recipe by Diet</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Vegetarian</a></li>
                                            <li><a class="dropdown-item" href="#">Vegan</a></li>
                                            <li><a class="dropdown-item" href="#">Gluten Free</a></li>
                                            <li><a class="dropdown-item" href="#">Keto</a></li>
                                            <li><a class="dropdown-item" href="#">Low-Carb</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>What to Cook</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Quick and Easy</a></li>
                                            <li><a class="dropdown-item" href="#">Everyday Recipe</a></li>
                                            <li><a class="dropdown-item" href="#">Family Recipe</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>New and Trending</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">July Edition Picks</a></li>
                                            <li><a class="dropdown-item" href="#">Summer Comfort Food</a></li>
                                            <li><a class="dropdown-item" href="#">Wimbledon Recipe</a></li>
                                            <li><a class="dropdown-item" href="#">Football Party Recipe</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Everyday Recipes</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Easy</a></li>
                                            <li><a class="dropdown-item" href="#">Healthy</a></li>
                                            <li><a class="dropdown-item" href="#">Weeknight</a></li>
                                            <li><a class="dropdown-item" href="#">Pasta</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="go-next ">
                                <a href="/Recipe Search/RecipeSearch.php">View all Recipe <i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/Recipe Search/RecipeGenerator.php">RecipeGenerator</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Occasions/occasion_main.php" role="button" aria-expanded="false">
                            Occasions
                        </a>
                        <ul class="dropdown-menu occasion-menu">
                            <div class="container-fluid">
                                <div class="row nav-row">
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $event_name = $row['event_name'];
                                            $event_id = $row['event_id'];
                                            // Display event name and dynamic href
                                            echo '<div class="col-md-2">';
                                            // echo '<h6>' . $event_name . '</h6>';
                                            echo '<ul>';
                                            echo '<li><a class="dropdown-item" href="/Occasions/occasion_main.php?event_id=' . $event_id . '">' . $event_name . '</a></li>';
                                            echo '</ul>';
                                            echo '</div>';
                                            // Display dynamic href for each event
                                            // echo '<li><a class="dropdown-item" href="/Occasions/occasion_main.php?event_id=' . $event_id . '">' . $event_name . '</a></li>';
                                        }
                                    } else {
                                        echo "<div>No occasions found</div>";
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="go-next ">
                                <a href="/Occasions/occasion_main.php">View all Occasions <i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </ul>
                    </li>

                    <!-- <div class="col-md-2">
                                        <h6>Islamic</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Eid ul Fitr</a></li>
                                            <li><a class="dropdown-item" href="#">Eid ul Adha</a></li>
                                            <li><a class="dropdown-item" href="#">Ramadan</a></li>
                                            <li><a class="dropdown-item" href="#">Miladun Nabi</a></li>
                                            <li><a class="dropdown-item" href="#">Muharram</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Hinduism</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Diwali</a></li>
                                            <li><a class="dropdown-item" href="#">Holi</a></li>
                                            <li><a class="dropdown-item" href="#">Navratri</a></li>
                                            <li><a class="dropdown-item" href="#">Janmashtami</a></li>
                                            <li><a class="dropdown-item" href="#">Dussehra</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Christianity</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Christmas</a></li>
                                            <li><a class="dropdown-item" href="#">Easter</a></li>
                                            <li><a class="dropdown-item" href="#">Good Friday</a></li>
                                            <li><a class="dropdown-item" href="#">Lent</a></li>
                                            <li><a class="dropdown-item" href="#">Star Sunday</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Common Occasions</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">New Year</a></li>
                                            <li><a class="dropdown-item" href="#">Birthday</a></li>
                                            <li><a class="dropdown-item" href="#">Anniversary</a></li>
                                            <li><a class="dropdown-item" href="#">Graduation</a></li>
                                            <li><a class="dropdown-item" href="#">Thanksgiving</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="go-next ">
                                <a href="/Occasions/occasion_main.php">View all Occasions <i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </ul>
                    </li>

 -->



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Kitchen-Tips/kitchenTipsDashboard.php" role="button" aria-expanded="false">
                            Kitchen Tips
                        </a>
                        <ul class="dropdown-menu occasion-menu">
                            <div class="container-fluid">
                                <div class="row nav-row">
                                    <div class="col-md-2">
                                        <h6>Heading</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Cooking Techniques</a></li>
                                            <li><a class="dropdown-item" href="#">Ingredient Storage</a></li>
                                            <li><a class="dropdown-item" href="#">Time-Saving Hacks</a></li>
                                            <li><a class="dropdown-item" href="#">Meal Prep Tips</a></li>
                                            <li><a class="dropdown-item" href="#">Food Safety</a></li>
                                            <li><a class="dropdown-item" href="#">Baking Tips</a></li>
                                            <li><a class="dropdown-item" href="#">Healthy Cooking</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-2">
                                        <h6>Heading</h6>
                                        <ul>
                                            <li><a class="dropdown-item" href="#">Cooking Techniques</a></li>
                                            <li><a class="dropdown-item" href="#">Ingredient Storage</a></li>
                                            <li><a class="dropdown-item" href="#">Time-Saving Hacks</a></li>
                                            <li><a class="dropdown-item" href="#">Meal Prep Tips</a></li>
                                            <li><a class="dropdown-item" href="#">Food Safety</a></li>
                                            <li><a class="dropdown-item" href="#">Baking Tips</a></li>
                                            <li><a class="dropdown-item" href="#">Healthy Cooking</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card">
                                            <a href="#" class="text-decoration-none">
                                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                                <div class="card-body">

                                                    <div class="row">
                                                        <div class="col d-flex justify-content-between">
                                                            <div>Tk 150</div>
                                                            <div class="ratings">
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                                <i class="fa-solid fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <p class="card-text mb-0">How to cook rice in home</p>
                                                    <p class="card-text"><i class="fa-solid fa-users "></i> 69 student enroled</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="go-next ">
                                <a href="/Kitchen-Tips/kitchenTipsDashboard.php">View all Kitchen tips <i class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Meal Plan/mealGenerator.php">MealPlan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Course/allCourses.php">Course</a>
                    </li>

                </ul>

            </div>
        </div>

        <!-- End 2nd seg -->

        <!-- ============================== Sidebar ==================================== -->
        <?php
        // include('../Includes/Navbar/sidebar.php');  // tashin prev
        include('/Cook-Corner/Includes/Navbar/sidebar.php');  // tashin
        // include('/Cook-Corner/Includes/Navbar/sidebar-2.php');  // tashin change
        ?>

    </header>
</body>

</html>