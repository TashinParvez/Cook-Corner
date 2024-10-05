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
            position: sticky;
            top: 0;
            z-index: 999;
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
            flex-grow: 1;
            /* Takes up remaining space */
            text-align: center;
        }

        .search-bar input {
            height: 35px;
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 10px;
            /* Ensure margin-bottom is applied only here */
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
            gap: 15px;
            /* Spacing between Welcome and Logout */
        }

        .navbar-right span,
        .navbar-right a {
            font-size: 16px;
            color: #333;
        }

        .navbar-right a {
            color: #007bff;
            /* Optional: color for logout link */
            text-decoration: none;
        }

        /* Hover effect for navbar links */
        .nav-link:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
            }

            .navbar-center,
            .navbar-right,
            .navbar-logo {
                text-align: center;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>





    <nav class="navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <!---------------------------------- First column (navbar-logo) ---------------------------------->
            <div class="navbar-logo">
                <a class="navbar-brand" href="#"> <img src="../../Images/logo/cook_Corner_LOGO-removebg.png" alt="Logo">
                </a>
            </div>



            <!---------------------------------- Second column (navbar-center) ---------------------------------->
            <div class="navbar-center d-flex justify-content-center">

                <div class="search-bar">
                    <form class="d-flex" role="search">
                        <input class="form-control search me-2" type="search" placeholder="Search your Recipe" aria-label="Search">
                        <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i>
                        </button>
                    </form>

                </div>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav d-flex flex-row">

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

                                <div class="go-next ">
                                    <a href="/Occasions/occasion_main.php">View all Occasions <i class="fa-solid fa-angles-right"></i></a>
                                </div>
                            </ul>
                        </li>


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



            <!---------------------------------- Third column (navbar-right) ---------------------------------->
            <div class="navbar-right d-flex justify-content-end">

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