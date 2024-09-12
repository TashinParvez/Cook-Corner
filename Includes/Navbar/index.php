<!-- use body padding top 90px to use this navbar -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="Style.css">
</head>

<body>
    <nav class="navbar">
        <div class="upper-nav">
            <a href="#" class="logo">
                <img src="NavLogo.png" alt="logo">
            </a>
            <div class="search">
                <form action="#">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="" id="" placeholder="Search your recipe here">
                    <!-- <button type="submit"></button> -->
                </form>
            </div>
            <div class="login-sign">
                <ul>
                    <li><a href="#">Login</a></li>
                    <li>|</li>
                    <li><a href="#">SignUp</a></li>
                </ul>
            </div>

            <div class="nav-function">
                <ul>
                    <li><a href="#"><i class="fa-solid fa-user"></i></a></i></li>
                    <li><a href="#"><i class="fa-solid fa-clipboard-list"></a></i></li>
                    <li><a href="#"><i class="fa-solid fa-heart"></a></i></li>
                </ul>
            </div>
        </div>

        <div class="lower-nav">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Recipe</a></li>
                <li><a href="#">RecipeGenerator</a></li>
                <li><a href="#">Occasions</a></li>
                <li><a href="#">Occasions</a></li>
                <li><a href="#">KitchenTips</a></li>
                <li><a href="#">KitchenTips</a></li>
                <li><a href="#">MealPlan</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Course</a></li>
                <li><a href="#">AddRecipe</a></li>
            </ul>
        </div>
    </nav>

</body>

</html>