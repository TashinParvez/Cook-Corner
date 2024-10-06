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
$stmt = $conn->prepare('SELECT recipe_info.recipe_id, recipe_info.title, recipe_info.description, 
                                recipe_feedback.rating, recipe_info.image
                        FROM
                            recipe_info LEFT JOIN recipe_feedback
                        ON
                            recipe_info.recipe_id = recipe_feedback.recipe_id
                        WHERE
                            recipe_info.recipe_id IN
                                (SELECT recipe_id FROM junction_meal_type_recipe_info WHERE meal_type_id IN
                                (SELECT meal_type_id FROM junction_meal_type_day_chunk WHERE chunk_id =
                                (SELECT chunk_id FROM day_chunk WHERE chunk_name = ?))) LIMIT 20;');
$stmt->bind_param('s', $current_chunk);
$stmt->execute();
$result = $stmt->get_result();
$chunk_recipes = $result->fetch_all();
$stmt->close();
// print_r($chunk_recipes[0]);

// Load Best Rcipes from DB                       is it necessary to take all information about a recipe???
$stmt = $conn->prepare('SELECT recipe_info.recipe_id, recipe_info.title, recipe_feedback.rating, recipe_info.image
                        FROM
                            recipe_info LEFT JOIN recipe_feedback
                        ON
                            recipe_info.recipe_id = recipe_feedback.recipe_id
                        ORDER BY recipe_feedback.rating DESC LIMIT 12;');
$stmt->execute();
$result = $stmt->get_result();
$best_recipes = $result->fetch_all();
// print_r($best_recipes[0]);

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
// print_r($latest_recipes[0]);
$stmt->close();

// Load All Categories from DB working
$stmt = $conn->prepare('SELECT * FROM recipe_category;');
$stmt->execute();
$result = $stmt->get_result();
$categories = $result->fetch_all();
// print_r($categories[0]);
$stmt->close();

// Load Popular Courses from DB              there is no parameter for being polular a course???
$stmt = $conn->prepare('SELECT c.course_id, c.course_title, c.image, c.rating, c.price
                        FROM course AS c 
                        LIMIT 3;');
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
            <!-- Swiper for categories -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php foreach ($chunk_recipes as $key => $recipe): ?>


                        <div class="swiper-slide">
                            <a href="javascript:void(0);" class="category-tab" data-target="content-<?php echo $recipe[0]; ?>">

                                <div class="row justify-content-center">
                                    <div class="col-md">
                                        <div class="card text-white">
                                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                                <h5 class="card-title"><?php echo $recipe[1]; ?></h5>
                                                <p class="card-text"><?php echo $recipe[2]; ?></p>
                                            </div>

                                            <!-- <img src="/Images/Recipe-Images/<?php
                                                                                    // echo $recipe[4]; 
                                                                                    ?>" class="card-img carouselImg" alt="..."> -->
                                            <img src="/Images/Recipe-Images/10.jpg" class="card-img carouselImg" alt="...">

                                        </div>
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





        </div>
    </section>


    <!------------------------------------------------- Course section  ----------------------------------------------->

    <section class="course m-4">
        <div class="container">
            <div class="identity m-2">
                <p class="m-0 p-0">Here are our cooking classes</p>
                <h2 class="m-0 p-0">Popular Courses</h2>
            </div>


            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- course_id, course_title, image, price, rating, taken_by_count -->
                <?php foreach ($popular_courses  as $course) { ?>

                    <div class="col">
                        <a href="#">
                            <div class="card">
                                <!-- <img src="<?php
                                                // echo $course[2] ;
                                                ?>" class="card-img-top" alt="..."> -->
                                <img src="/Images/Course-Image/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">

                                    <p class="card-text"><?php echo $course[1] ?></p>
                                    <div class="row">
                                        <div class="col d-flex  justify-content-between">
                                            <div><?php echo $course[3] ?></div>
                                            <div>
                                                <?php
                                                $rating = (float)$course[4];
                                                $decimal = $rating - floor($rating);

                                                $i = floor($rating);

                                                // while ($i > 0) {
                                                // 
                                                ?>

                                                <!-- //     <i class="fa-solid fa-star"></i> -->

                                                <?php
                                                //     if ($i == 1 && $decimal != 0) {
                                                //         
                                                ?>
                                                <!-- //         <i class="fa-solid fa-star-half-stroke"></i> -->
                                                <?php
                                                //     }

                                                //     $i--;
                                                // }
                                                // 
                                                ?>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>

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


    <!-- cooking class section -->
    <section class="cooking-class">
        <div class="class-info">
            <h1>Join Our Cooking Class,<br>Become a Chef</h1>
            <p>Want to cook like a chef? Our cooking online courses offer step-by-step guidance and expert tips to
                transform your cooking. Join us now!</p>
            <a href="#" class="btn">Register Now</a>
        </div>
    </section>

    <!------------------------------------------------- Best Recipe section  ----------------------------------------------->


    <section class="best-recipe m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">The Best Recipe</h2>
            </div>
            <!-- recipe_id, title, rating, image, description -->

            <div class="row row-cols-1 row-cols-md-4 g-4">

                <?php foreach ($best_recipes as $recipe) { ?>
                    <div class="col">
                        <a href="#">
                            <div class="card">
                                <!-- <img src="-->
                                <?php
                                // echo $recipe[3];
                                ?>
                                <!-- " class="card-img-top" alt="..."> -->
                                <img src="/Images/Recipe-Images/4.jpg" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><?php echo $recipe[1] ?></h5>
                                    <div>
                                        <?php
                                        $rating = (float)$recipe[2];
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
                <h2 class="m-0 p-0">All Categories</h2>
            </div>



            <!-- Swiper for all categories -->
            <div class="swiper mySwiper swiper-category">
                <div class="swiper-wrapper">
                    <!-- <?php
                            // foreach ([1, 2, 3, 4, 5, 6, 7, 8, 9, 10] as $key => $value):
                            ?> -->
                    <?php foreach ($categories as  $value): ?>
                        <div class="swiper-slide">
                            <a href="javascript:void(0);" class="category-tab" data-target="content-<?php echo $key; ?>">
                                <!-- <div class="row justify-content-center">
                        <div class="col-md"> -->

                                <div class="card text-center bg-transparent border-0">
                                    <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="card-body">
                                        <!-- <h5 class="card-title">Eid al-Fitr -->
                                        <?php
                                        // echo $key; 
                                        ?>
                                        <!-- </h5> -->
                                        <h5 class="card-title"> <?php echo $value[0]; ?></h5>
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
                <h2 class="m-0 p-0">Latest Recipe</h2>
            </div>



            <div class="row row-cols-1 row-cols-md-4 g-4">
                <!-- recipe_info.recipe_id, recipe_info.title, recipe_info.description, recipe_feedback.rating, recipe_info.image -->
                <?php foreach ($latest_recipes as $recipe) { ?>
                    <div class="col">
                        <a href="#">
                            <div class="card">
                                <img src="/Images/Recipe-Images/frozen_vegetables.jpg" class="card-img-top" alt="...">
                                <!-- <img src="/Images/Recipe-Images/ -->
                                <?php
                                // echo $recipe[3] 
                                ?>
                                <!-- " class="card-img-top" alt="..."> -->
                                <div class="card-body text-center">
                                    <h5 class="card-title">
                                        <?php
                                        // echo $recipe[0] 
                                        ?>
                                    </h5>
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
    <section class="BMISection bg-light pt-4 mt-5">

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





</body>

</html>