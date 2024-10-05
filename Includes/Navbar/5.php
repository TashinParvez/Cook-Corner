<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Layout</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
            padding: 0 20px;
            background-color: #f8f9fa;
        }

        .navbar {
            position: sticky;
            top: 0;
            height: 80px;
            /* Adjust the height */
            background-color: #f8f9fa;
            /* Optional: background color */
            z-index: 999;
            /* Ensures it stays on top */
        }


        /* Logo */
        .navbar-logo img {
            height: 60px;
            /* Adjust the logo size */
            width: auto;
        }



        /* Center Section (Search and Links) */
        .navbar-center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex: 1;
            /* Takes up most space */
        }

        .search-bar {
            margin-bottom: 10px;
        }

        .search-bar input {
            height: 35px;
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            list-style: none;
        }

        .nav-links li {
            margin: 0 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }

        /* Right Section (Welcome and Logout) */
        .navbar-right {
            display: flex;
            align-items: center;
            /* Vertically center */
            gap: 15px;
            /* Spacing between Welcome and Logout */
        }

        .navbar-right span {
            font-size: 16px;
            color: #333;
        }

        .navbar-right a {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }

        /* Navbar height control */
        .navbar {
            height: 80px;
        }
    </style>
</head>

<body>


    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin 
    // include('../Includes/Navbar/navbarMain-try.php');  // tashin  edit here
    // include('../Includes/Navbar/3.php');  // tashin  edit here 
    // include('../Includes/Navbar/5.php');  // tashin  edit here   // -------------------------->>> main
    // include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>


    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            <div class="navbar-logo">
                <img src="../../Images/logo/cook_Corner_LOGO-removebg.png" alt="Logo">
            </div>



            <!---------------------------------------- -------------------------------------->
            <!--------------------- ----------  Middle Segment --------------------- ------------>
            <!---------------------------------------- --------------------------------------->

            <div class="navbar-center" style="display: flex; justify-content: center; align-items: center; width: 100%; position: absolute;">
                <!----------------------------------------- Search bar ----------------------------------------->
                <div class="search-bar" style="display: flex; justify-content: center; margin: 10px 0;"> <!-- Added flex styling here -->
                    <form class="d-flex" role="search">
                        <input class="form-control search me-2" type="search" placeholder="Search your Recipe" aria-label="Search">
                        <button class="btn" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>

                <!----------------------------------------- Navigation Links ----------------------------------------->
                <div class="collapse navbar-collapse" id="navbarNav" style="display: flex; justify-content: center;">
                    <ul class="navbar-nav" style="display: flex; justify-content: center; padding: 0;">
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
                                    </div>
                                </div>
                                <div class="go-next ">
                                    <a href="/Occasions/occasion_main.php">View all Occasions <i class="fa-solid fa-angles-right"></i></a>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Meal Plan/mealPlan.php">MealPlan</a>
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



            <!-----------------------------------------  Links On Right ----------------------------------------->

            <div class="navbar-right">

                <div class="text-end">
                    <?php if (isset($user_id)): ?>
                        <span class="text-black">Welcome &nbsp;<?= htmlspecialchars($name); ?></span>
                        <a href="../../User Account/logout.php" class="text-black text-decoration-none ms-3">Logout</a>
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

</body>

</html>