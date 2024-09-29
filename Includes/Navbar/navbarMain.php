<?php

session_start();

$user_id = $_SESSION['user_id'];


//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");  // for home page
// include("../../Includes/Database Connection/database_connection.php");  // for only navbar

$stmt = $conn->prepare('SELECT first_name FROM user_info WHERE id = ? LIMIT 1');
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($name);
$stmt->fetch();

$stmt->close();
mysqli_close($conn);

// echo $name;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
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
                <a class="navbar-brand" href="#"><img src="../../Images/logo/cook_Corner_LOGO-removebg.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="d-flex" role="search">
                        <input class="form-control search me-2" type="search" placeholder="Search your Recipe" aria-label="Search">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i>
                        </button>
                    </form>

                    <!-- <div class="text-end">
                        <a href="../../Login SignUp/Login.php" class="text-black text-decoration-none">Login</a>
                        <span>|</span>
                        <a href="../../Login SignUp/Signup.php" class=" text-black text-decoration-none">Sign Up</a>
                    </div> -->

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
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#">RecipeGenerator</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/Occasions/occasion_main.php" role="button" aria-expanded="false">
                            Occasions
                        </a>
                        <ul class="dropdown-menu occasion-menu">
                            <div class="container-fluid">
                                <div class="row nav-row">
                                    <div class="col-md-2">
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
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/Kitchen-Tips/kitchenTipsDashboard.php">KitchenTips</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">MealPlan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Course/allCourses.php">Course</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Collection/collection.php">AddRecipe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../Add-Kitchen-Tips/addKitchenTips.php">AddTips</a>
                    </li>

                </ul>

            </div>
        </div>

        <!-- End 2nd seg -->

        <!-- ============================== Sidebar ==================================== -->
        <?php
        include('../Includes/Navbar/sidebar.php');  // tashin 
        ?>

    </header>
</body>

</html>