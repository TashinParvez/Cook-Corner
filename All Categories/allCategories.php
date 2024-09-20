<?php

// Database table name: recipe_category

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$categories_per_page = 24; // 6 rows * 4 categories per row
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $categories_per_page;

$sql_count = "SELECT COUNT(*) 
              FROM `recipe_category`";

$total_categories = mysqli_fetch_array(mysqli_query($conn, $sql_count))[0];

// Calculate total pages
$total_pages = ceil($total_categories / $categories_per_page);

// --------------- Sort by name with limit and offset -----------------
$sql = "SELECT * 
        FROM `recipe_category` 
        ORDER BY name 
        LIMIT $categories_per_page OFFSET $offset";

$result = mysqli_query($conn, $sql);
$allcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="CSS/allCategories.css">
    <link rel="stylesheet" href="CSS/pagination.css">

    <!-- <style>
        @media (min-width: 992px) {
            .col-lg-1-5 {
                flex: 0 0 12.5%;
                max-width: 12.5%;
            }
        }
    </style> -->

    <!-- javascript -->
    <script src="sortBtn.js"></script>

</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <h2 class="text-center mt-5">All Categories</h2>


    <div class="container mt-4 justify-content-center align-items-center">
        <div class="row justify-content-center">
            <!-------------------------------------------------- Search -------------------------------------------------->
            <div class="col-6  justify-content-center align-items-center">
                <form class="w-100 me-3" role="search">
                    <input type="search" class="form-control p-2" placeholder="Search Category..." aria-label="Search">
                </form>
            </div>

            <!------------------------ sort ------------------------>
            <div class="col-4 d-flex  justify-content">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sorted by: Name
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Most Recipies</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <!------------------------------------------------- ALL categories ----------------------------------------------->
    <section class="mt-5">
        <div class="container">
            <div class="row g-4">

                <!-- Loop through all categories and display them -->
                <?php foreach ($allcategories as $category) { ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                        <a href="#">
                            <div class="card text-center bg-transparent border-0">
                                <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($category['name']); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php } ?>

            </div>

            <!----------------------------------------- Pagination Section ----------------------------------------->
            <!-- Logo Pagination Section -->
            <div class="logo-pagination d-flex justify-content-center align-items-center mb-4">
                <!-- Previous Button -->
                <a href="?page=<?php echo $current_page - 1; ?>" class="prev-arrow me-4 <?php if ($current_page <= 1) echo 'disabled'; ?>">
                    &lt;&lt;
                </a>

                <!-- Logo or Center Text -->
                <div class="logo-box">
                    <span class="logo-text">
                        <img src="../Images/logo/cook_Corner_LOGO-removebg.png" class=" " alt="...">

                    </span> <!-- Replace with image if needed -->

                </div>

                <!-- Next Button -->
                <a href="?page=<?php echo $current_page + 1; ?>" class="next-arrow ms-4 <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                    &gt;&gt;
                </a>
            </div> 


            <!-- Pagination Section -->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mt-5">
                    <!-- Previous Button -->
                    <li class="page-item <?php if ($current_page <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">Previous</a>
                    </li>

                    <!-- Page Numbers -->
                    <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                        <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>

                    <!-- Next Button -->
                    <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </section>

    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>