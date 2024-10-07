<?php

include('../Includes/Navbar/navbarMain.php');  // Mahbub 
// echo $user_id;

//...................... Database Connection .............................. 
include("../Includes/Database Connection/database_connection.php");


// Set the time zone to Bangladesh Standard Time (BST)
$bdTimeZone = new DateTimeZone('Asia/Dhaka');
$bdDateTime = new DateTime('now', $bdTimeZone);

$current_time = $bdDateTime->format('H:i:s'); // Outputs something like 10:25:45


// .......... Load Recipe from DB According to Day Interval ..........
$current_chunk = '';
$greetings = '';

if ($current_time >= '06:00:00' && $current_time < '12:00:00') {

    $current_chunk = 'morning';
    $greetings = 'Good Morning';
} else if ($current_time >= '12:00:00' && $current_time < '16:00:00') {

    $current_chunk = 'afternoon';
    $greetings = 'Good Afternoon';
} else if ($current_time >= '16:00:00' && $current_time < '20:00:00') {

    $current_chunk = 'evening';
    $greetings = 'Good Evening';
} else if ($current_time >= '20:00:00' && $current_time < '23:59:59') {

    $current_chunk = 'night';
    $greetings = 'Good Night';
} else {

    $current_chunk = 'else';
    $greetings = 'Good Night';
}
// echo 'Greetings: ' . $greetings;

// Load Chunk Recipes from DB                       is it necessary to take all information about a recipe???
$stmt = $conn->prepare('SELECT r.recipe_id, r.title, r.description, r.rating, r.image 
                    FROM day_chunk as c 
                    INNER JOIN
                    junction_meal_type_day_chunk as jmt
                    ON c.chunk_id = jmt.chunk_id
                    INNER JOIN
                    junction_meal_type_recipe_info as jmtr
                    ON jmtr.meal_type_id = jmt.meal_type_id
                    INNER JOIN
                    recipe_info as r
                    ON r.recipe_id = jmtr.recipe_id
                    WHERE c.chunk_name = ? LIMIT 20;');

$stmt->bind_param('s', $current_chunk);
$stmt->execute();
$result = $stmt->get_result();
$chunk_recipes = $result->fetch_all();
$stmt->close();
// print_r($chunk_recipes);

// Load Best Rcipes from DB                       is it necessary to take all information about a recipe???
$stmt = $conn->prepare('SELECT recipe_info.recipe_id, recipe_info.title, recipe_feedback.rating, recipe_info.image
                        FROM
                            recipe_info LEFT JOIN recipe_feedback
                        ON
                            recipe_info.recipe_id = recipe_feedback.recipe_id
                        ORDER BY recipe_feedback.rating DESC LIMIT 20;');
$stmt->execute();
$result = $stmt->get_result();
$best_recipes = $result->fetch_all();
$stmt->close();

// Load Latest Rcipes from DB                       is it necessary to take all information about a recipe and all recipes as well???
$stmt = $conn->prepare('SELECT recipe_info.recipe_id, recipe_info.title, recipe_feedback.rating, recipe_info.image
                        FROM
                            recipe_info LEFT JOIN recipe_feedback
                        ON
                            recipe_info.recipe_id = recipe_feedback.recipe_id
                        ORDER BY created_at DESC LIMIT 20;');
$stmt->execute();
$result = $stmt->get_result();
$latest_recipes = $result->fetch_all();
$stmt->close();
// print_r($latest_recipes[0]);

// Load All Categories from DB working
$stmt = $conn->prepare('SELECT * FROM recipe_category;');
$stmt->execute();
$result = $stmt->get_result();
$categories = $result->fetch_all();
$stmt->close();


// ---------- For hero segment ---------------
$sql = "SELECT 
            c.course_id,
            c.course_title,
            c.description,
            c.price,
            c.rating,
            c.image,
            COUNT(jctu.user_id) AS enrolled_user_count,
            IF(EXISTS(
                SELECT 1 
                FROM `junction_course_taken_user` jctu2
                WHERE jctu2.user_id = '$user_id' 
                AND jctu2.course_id = c.course_id
            ), 1, 0) AS found
        FROM 
            course c
        LEFT JOIN 
            junction_course_taken_user jctu 
            ON c.course_id = jctu.course_id
        WHERE 
            c.course_id = 1
        GROUP BY 
            c.course_id;";

$resultantLabel = mysqli_query($conn, $sql);

$heropage = mysqli_fetch_assoc($resultantLabel);
// echo $heropage['course_id'];

// Load Popular Courses from DB              there is no parameter for being polular a course???
$stmt = $conn->prepare('SELECT c.course_id, c.course_title, c.image, c.rating, c.price, COUNT(j.user_id) AS taken_by_count
                        FROM
                        course AS c 
                        LEFT JOIN junction_course_taken_user AS j
                        ON
                        c.course_id = j.course_id
                        GROUP BY
                        c.course_id, c.course_title, c.price
                        ORDER BY
                        taken_by_count DESC LIMIT 20;');
$stmt->execute();
$result = $stmt->get_result();
$popular_courses = $result->fetch_all();
// print_r($popular_courses[0]);



$stmt->close();
mysqli_close($conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cook Corner</title>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link href="Homepage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="bmi.css">

    <!-- Javascript -->
    <script src="bmi.js"></script>

    <style>
        /* Set the height of the swiper-slide */
        .swiper-slide {
            display: flex;
            /* Make the slide a flex container */
            justify-content: center;
            /* Center the card horizontally */
            align-items: center;
            /* Center the card vertically */
            height: 100px;
            /* Set the desired height for the swiper slides */
        }

        /* Style for the cards */
        .custom-card {
            height: 100%;
            /* Make the card take full height of the slide */
            width: 250px;
            /* Set a fixed width for the card */
            overflow: hidden;
            /* Prevent overflow */
            display: flex;
            /* Flex display to help center content */
            flex-direction: column;
            /* Align content vertically */
            margin: 0 auto;
            /* Center the card within the swiper */
        }

        /* Image styles */
        .carouselImg {
            height: 100px;
            /* Fixed height for images */
            width: 100%;
            /* Ensure the image takes full width */
            object-fit: cover;
            /* Crop the image to cover the area */
        }

        /* Ensure text overlay is styled correctly */
        .card-img-overlay {
            flex-grow: 1;
            /* Allow the overlay to take up remaining space */
            display: flex;
            /* Flex display for vertical alignment */
            flex-direction: column;
            /* Arrange title and text vertically */
            justify-content: flex-end;
            /* Align content to the bottom */
            font-size: 0.8rem;
            /* Adjust font size for smaller overlay text */
        }

        .card-title {
            margin: 0;
            /* Remove default margin */
            font-size: 0.8rem;
            /* Set a specific font size */
        }

        .card-text {
            font-size: 0.6rem;
            /* Adjust font size for the text */
        }

        /* Set the height of the swiper-slide */
        .swiper-slide {
            display: flex;
            /* Make the slide a flex container */
            justify-content: center;
            /* Center the card horizontally */
            align-items: center;
            /* Center the card vertically */
            height: 100px;
            /* Set the desired height for the swiper slides */
        }

        /* Style for the cards */
        .custom-card {
            height: 100%;
            /* Make the card take full height of the slide */
            width: 250px;
            /* Set a fixed width for the card */
            overflow: hidden;
            /* Prevent overflow */
            display: flex;
            /* Flex display to help center content */
            flex-direction: column;
            /* Align content vertically */
            margin: 0 auto;
            /* Center the card within the swiper */
        }

        /* Image styles */
        .carouselImg {
            height: 100px;
            /* Fixed height for images */
            width: 100%;
            /* Ensure the image takes full width */
            object-fit: cover;
            /* Crop the image to cover the area */
        }

        /* Ensure text overlay is styled correctly */
        .card-img-overlay {
            flex-grow: 1;
            /* Allow the overlay to take up remaining space */
            display: flex;
            /* Flex display for vertical alignment */
            flex-direction: column;
            /* Arrange title and text vertically */
            justify-content: flex-end;
            /* Align content to the bottom */
            font-size: 0.8rem;
            /* Adjust font size for smaller overlay text */
        }

        .card-title {
            margin: 0;
            /* Remove default margin */
            font-size: 0.8rem;
            /* Set a specific font size */
        }

        .card-text {
            font-size: 0.6rem;
            /* Adjust font size for the text */
        }
    </style>

</head>

<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // Mahbub 

    // include('../Includes/Navbar/navbarMain.php');  // Navbar // tahsin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin   
    include "../Includes/AddMenu/addMenu.php";
    ?>

    <!-------------------------------------------- search section ---------------------------------------------------->


    <section class="get-start">
        <h1>Hungry? Get started</h1>
        <div class="search">
            <form action="#">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="" id="" placeholder="Search your recipe here">
                <!-- <button type="submit"></button> -->

                <div class="search-items">
                    <span class="items">Chicken</span>
                    <span class="items">Beef</span>
                    <span class="items">Vegetable</span>
                    <span class="items">Fish</span>
                    <span class="items">Cookies</span>
                    <span class="items">Sweet</span>
                    <span class="items">Juice</span>
                </div>
            </form>
        </div>
    </section>




    <section class="suggestion m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0"><?php echo $greetings ?></h2>
                <p class="m-0 p-0">What to cook today</p>
            </div>


            <!-------------------------------------------- Image sliding section ------------------------------------------------------->
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



            <!-- r.recipe_id, r.title, r.description, r.rating, r.image  -->
            <!-- Swiper for categories -->

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($chunk_recipes as $key => $recipe): ?>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);" class="category-tab" data-target="content-<?php echo $recipe[0]; ?>" onclick="submirecipeForm(<?php echo $recipe[0]; ?>)">
                                <div class="card text-white custom-card"> <!-- Move the card here -->
                                    <img src="/Images/Recipe-Images/<?php echo $recipe[4]; ?>" class="card-img carouselImg" alt="...">
                                    
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title"><?php 
                                        // echo $recipe[1]; 
                                        ?></h5>
                                        <p class="card-text"><?php 
                                        // echo $recipe[2]; 
                                         ?></p>
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




            <script>
                var swiper = new Swiper('.mySwiper', {
                    slidesPerView: 3, // Adjust according to how many cards you want to show
                    spaceBetween: 10, // Space between cards
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            </script>

        </div>
    </section>


    <!------------------------------------------------- Course section  ----------------------------------------------->
    <script>
        function submitCourseForm(course_id) {
            const form = document.getElementById('courseForm');
            // form.action = 'Course\\courseEnrollPage.php?course_id=' + course_id;
            form.action = '../Course/courseEnrollPage.php?course_id=' + course_id; // noman
            form.submit();
        }
    </script>

    <!-- <form id="courseForm" action="Course\courseEnrollPage.php" method="post"> -->
    <!-- <form id="courseForm" action="D:/All UIU Materials/8th Trimester/SAD Lab/Project/Cook-Corner/Course/courseEnrollPage.php" method="post"> noman -->
    <form id="courseForm" action="../Course/courseEnrollPage.php" method="post"> <!--noman-->
        <!-- No hidden input needed -->
    </form>
    <section class="course m-4">
        <div class="container">
            <div class="identity m-2">
                <p class="m-0 p-0">Here are our cooking classes</p>
                <h2 class="m-0 p-0">Popular Courses</h2>
            </div>

            <!--  c.course_id, c.course_title, c.image, c.rating, c.price, COUNT(j.user_id) AS -->

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- course_id, course_title, image, price, rating, taken_by_count -->
                <?php
                $len = count($popular_courses);

                // echo $len;
                ?>
                <?php foreach ($popular_courses as $course) { ?>

                    <div class="col">
                        <a href="#" onclick="submitCourseForm(<?php echo $course[0]; ?>)">
                            <div class="card">
                                <img src="/Images/Course-Image/<?php echo $course[2] ?>" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <p class="card-text"><?php echo $course[1] ?></p>
                                    <div class="row">
                                        <div class="col d-flex  justify-content-between">
                                            <div><?php echo $course[3] ?></div>
                                            <div>
                                                <?php
                                                $rating = (float)$course[3];
                                                $decimal = $rating - floor($rating);

                                                $i = floor($rating);

                                                while ($i > 0) {
                                                ?>

                                                    <i class="fa-solid fa-star"></i>

                                                    <?php
                                                    if ($i == 1 && $decimal != 0) {
                                                    ?>
                                                        <i class="fa-solid fa-star-half-stroke"></i>
                                                <?php
                                                    }

                                                    $i--;
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>

    </section>


    <!-- Hero Segment -->
    <?php
    if ($heropage['found'] == 0) {
    ?>
        <!-- cooking class section -->
        <section class="cooking-class">
            <div class="class-info">
                <h1>Join Our Cooking Class,<br>Become a Chef</h1>
                <p>Want to cook like a chef? Our cooking online courses offer step-by-step guidance and expert tips to
                    transform your cooking. Join us now!</p>

                <a href="#" class="btn" onclick="submitCourseForm(<?php echo $heropage['course_id']; ?>)">Register Now</a>
            </div>
        </section>
    <?php
    }
    ?>

    <!------------------------------------------------- Best Recipe section  ----------------------------------------------->


    <section class="best-recipe m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0 m-5">The Best Recipes</h2>
            </div>
            <!-- recipe_id, title, rating, image, description -->

            <style>
                .card-img-top {
                    width: 100%;
                    height: 200px;
                    /* Fixed height for all images */
                    object-fit: cover;
                    /* Ensures image scales to cover the frame */
                    object-position: center;
                    /* Centers the image within the frame */
                }
            </style>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($best_recipes as $recipe) { ?>
                    <div class="col">
                        <a href="#" onclick="submirecipeForm(<?php echo $recipe[0]; ?>)">
                            <div class="card">
                                <img src="/Images/Recipe-Images/<?php echo $recipe[3]; ?>" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $recipe[1]; ?></h5>
                                    <div>
                                        <?php
                                        $rating = (float)$recipe[2];
                                        $decimal = $rating - floor($rating);

                                        $i = floor($rating);
                                        while ($i > 0) {
                                        ?>
                                            <i class="fa-solid fa-star"></i>
                                            <?php if ($i == 1 && $decimal != 0) { ?>
                                                <i class="fa-solid fa-star-half-stroke"></i>
                                        <?php }
                                            $i--;
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>





        </div>
    </section>


    <!------------------------------------------------- All Categories section  ----------------------------------------------->

    <section class="all-categories m-5">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0 mb-4">All Categories</h2>
            </div>
            <script>
                function submitCategoryForm(category_id) {
                    const form = document.getElementById('categoryForm');
                    form.action = 'oneparticularCategoryShow.php?category_id=' + category_id;
                    form.submit();
                }
            </script>

            <form id="categoryForm" action="oneparticularCategoryShow.php" method="post">
                <!-- No hidden input needed -->
            </form>


            <!-- Swiper for all categories -->
            <div class="swiper mySwiper swiper-category">
                <div class="swiper-wrapper">
                    <?php foreach ($categories as $value):
                        // echo "atasa";
                    ?>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);" class="category-tab" data-target="content-<?php echo $key; ?>" onclick="submitCategoryForm(<?php echo $value[0]; ?>)">
                                <!-- <div class="row justify-content-center">
                        <div class="col-md"> -->

                                <div class="card text-center bg-transparent border-0">
                                    <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">Eid al-Fitr <?php echo $key; ?></h5>
                                    </div>
                                </div>
                                <!-- </div>
                        </div> -->
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
    </section>


    <!------------------------------------------------- Latest Recipe section  ----------------------------------------------->

    <section class="Latest Recipe m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0 mb-4">Latest Recipe</h2>
            </div>

            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- recipe_info.recipe_id, recipe_info.title, recipe_info.description, recipe_feedback.rating, recipe_info.image -->
                <?php foreach ($latest_recipes as $recipe) { ?>
                    <div class="col">
                        <a href="#" onclick="submirecipeForm(<?php echo $recipe[0]; ?>)">
                            <div class="card">
                                <img src="/Images/Recipe-Images/<?php echo $recipe[3] ?>" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $recipe[1] ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>

                <?php } ?>

            </div>




        </div>
    </section>

    <!------------------------------------------------- BMI section  ----------------------------------------------->
    <!-- <section class="BMISection bg-light pt-4 mt-5"> -->
    <section id="bmiSection" class="BMISection bg-light pt-4 mt-5">

        <div class="container">
            <div class="row">
                <!-- BMI Calculator Form -->
                <div class="col-md-6">
                    <div class="card">
                        <h2>Calculate Your BMI</h2>
                        <p>BMI calculator generates the number of calories your body burns per day at rest. Your BMI with
                            activity factor is the number of calories your body burns per day based on the activity factor
                            you selected.</p>
                        <form id="bmiForm">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="height" class="form-label">Height (cm)*</label>
                                    <input type="number" class="form-control" id="height" placeholder="Enter height">
                                </div>
                                <div class="col">
                                    <label for="weight" class="form-label">Weight (kg)*</label>
                                    <input type="number" class="form-control" id="weight" placeholder="Enter weight">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="age" class="form-label">Age*</label>
                                    <input type="number" class="form-control" id="age" placeholder="Enter age">
                                </div>
                                <div class="col">
                                    <label for="gender" class="form-label">Gender*</label>
                                    <select class="form-select" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="activity" class="form-label">Select an activity factor*</label>
                                <select class="form-select" id="activity">
                                    <option value="1.2">Little or no Exercise / desk job</option>
                                    <option value="1.375">Light exercise / sports 1-3 days/week</option>
                                    <option value="1.55">Moderate exercise / sports 3-5 days/week</option>
                                    <option value="1.725">Hard exercise / sports 6-7 days a week</option>
                                    <option value="1.9">Very hard exercise / physical job</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-dark" onclick="calculateBMI()">Calculate</button>
                        </form>
                    </div>
                </div>
                <!-- BMI Chart -->
                <div class="col-md-5 bmi-chart">
                    <h2>BMI Calculator Chart</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>BMI</th>
                                <th>Weight Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Below 18.5</td>
                                <td>Underweight</td>
                            </tr>
                            <tr>
                                <td>18.5 - 24.9</td>
                                <td>Healthy</td>
                            </tr>
                            <tr>
                                <td>25.0 - 29.9</td>
                                <td>Overweight</td>
                            </tr>
                            <tr>
                                <td>30.0 and Above</td>
                                <td>Obese</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>*BMR Metabolic Rate / BMI Body Mass Index</p>

                    <!-- BMI Result Box -->
                    <div id="resultBox" class="result-box">
                        <span class="close-btn" onclick="hideResultBox()">×</span>
                        <p id="bmiResultText"></p>
                    </div>
                </div>
            </div>
        </div>

    </section>




    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
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




    <!-- $stmt = $conn->prepare('SELECT recipe_info.recipe_id, recipe_info.title, recipe_info.description, recipe_feedback.rating, recipe_info.image
    FROM
    recipe_info LEFT JOIN recipe_feedback
    ON
    recipe_info.recipe_id = recipe_feedback.recipe_id
    WHERE
    recipe_info.recipe_id IN
    (SELECT recipe_id FROM junction_meal_type_recipe_info WHERE meal_type_id IN
    (SELECT meal_type_id FROM junction_meal_type_day_chunk WHERE chunk_id =
    (SELECT chunk_id FROM day_chunk WHERE chunk_name = ?))) LIMIT 20;'); -->




</body>

</html>