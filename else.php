<?php

session_start();

$user_id = $_SESSION['user_id'] ?? '5';



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
        <div class="collapse navbar-collapse upper-nav" id="navbarSupportedContent">
          <form class="d-flex" role="search">
            <input class="form-control search me-2" type="search" placeholder="Search your Recipe" aria-label="Search">
            <button class="btn" type="submit"><i class="fa-solid fa-magnifying-glass"></i></i>
            </button>
          </form>


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

          </li>


          <li class="nav-item">
            <a class="nav-link" href="/Recipe Search/RecipeGenerator.php">RecipeGenerator</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/Occasions/occasion_main.php" role="button" aria-expanded="false">
              Occasions
            </a>

          </li>





          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/Kitchen-Tips/kitchenTipsDashboard.php" role="button" aria-expanded="false">
              Kitchen Tips
            </a>

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

  </header>
</body>

</html>