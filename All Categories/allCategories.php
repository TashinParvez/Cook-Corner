<?php

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

// --------------- Sort by with limit and offset -----------------

// Set default value for order if not provided
$sort = isset($_POST['sortInput']) ? $_POST['sortInput'] : 'namewise';

switch ($sort) {
    case 'namewise':
        $sortByClause = "ORDER BY name";
        break;
    case 'recentlyAdded':
        $sortByClause = "ORDER BY n.created_at DESC";
        break;
    case 'mostRecipes':
        $sortByClause = "ORDER BY n.created_at DESC";
        break;
}

$stmt = $conn->prepare('SELECT * FROM recipe_category ORDER BY ? LIMIT ? OFFSET ?');

$stmt->bind_param('sii', $sortByClause, $categories_per_page, $offset);
$stmt->execute();
$result = $stmt->get_result();
$allcategories = $result->fetch_all(MYSQLI_ASSOC);

$stmt->close();
mysqli_close($conn);


// $sql = "SELECT *                 // Tashin
//         FROM  recipe_category
//         ORDER BY name 
//         LIMIT $categories_per_page OFFSET $offset";

// $result = mysqli_query($conn, $sql);
// $allcategories = mysqli_fetch_all($result, MYSQLI_ASSOC);

// mysqli_free_result($result);
// mysqli_close($conn);

// ----------------------------------------------------------------


// ----------------------------------------------------------------


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="CSS/allCategories.css">
    <link rel="stylesheet" href="CSS/pagination.css">

    <!-- javascript -->
    <script src="sortBtn.js"></script>

</head>


<body>
    <?php
    include('../Includes/Navbar/navbarMain.php');  // Navbar 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
    ?>

    <!---------------------------- breadcrumb ---------------------------->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/Home/Homepage.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Categories</li>
        </ol>
    </nav>
    <!---------------------------- breadcrumb End ---------------------------->

    <div class="container text-center">

        <h2 class="text-center mt-5">All Categories</h2>
        <p>Explore a wide range of categories, each offering unique recipes tailored to your taste.<br>Find your next favorite dish across different cuisines and cooking styles.</p>

    </div>

    <div class="container mt-4 justify-content-center align-items-center">
        <div class="row justify-content-center">
            <!-------------------------------------------------- Search -------------------------------------------------->
            <div class="col-6 justify-content-center align-items-center">
                <form class="w-100 me-3" role="search">
                    <input type="search" class="form-control p-2" placeholder="Search Category..." aria-label="Search">
                </form>
            </div>


        </div>
    </div>


    <div class="container mt-4">
        <!-- Centered HR with 80% width -->

        <hr class="mx-auto" style="width: 90%;">



        <div class="row justify-content-around" style="width: 80%; margin: 0 auto;">

            <div class="col-3">
                <h6><b><?php echo htmlspecialchars($total_categories); ?></b> Matched Category </h6>
            </div>

            <div class="col-4">
                <!------------------------ sort ------------------------>


                <!-- Filtered by -->





                <!-- ............... -->



                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sorted by: <?php
                                    switch ($sort) {
                                        case 'namewise':
                                            echo 'Name';
                                            break;
                                        case 'recentlyAdded':
                                            echo 'Recently Added';
                                            break;
                                        case 'mostRecipes':
                                            echo 'Most Recipes';
                                            break;
                                    }
                                    ?>
                    </button>

                    <script>
                        function submiSorttForm(sortInput) { // hidden input name
                            document.getElementById('sortInput').value = sortInput; // hidden input id
                            document.getElementById('sortForm').submit(); // form id
                        }
                    </script>

                    <form id="sortForm" action="allCategories.php" method="post">
                        <input type="hidden" name="sortInput" id="sortInput">
                    </form>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('namewise')"><span id="check-name"><?php echo ($sort == 'namewise') ? '✔' : ''; ?></span> Name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('recentlyAdded')"><span id="check-recent"><?php echo ($sort == 'recentlyAdded') ? '✔' : ''; ?></span> Recently Added</a></li>
                        <li><a class="dropdown-item" href="#" onclick="submiSorttForm('mostRecipes')"><span id="check-popularity"><?php echo ($sort == 'mostRecipes') ? '✔' : ''; ?></span> Most Recipes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!------------------------------------------------- ALL categories ----------------------------------------------->
    <section class="mt-5">
        <div class="container">
            <div class="row g-4">

                <script>
                    function submitCategoryForm(categoryId) {
                        const form = document.getElementById('categoryForm');
                        form.action = 'oneparticularCategoryShow.php?categoryId=' + categoryId;
                        form.submit();
                    }
                </script>

                <form id="categoryForm" action="oneparticularCategoryShow.php" method="post">
                    <!-- No hidden input needed -->
                </form>

                <!-- Loop through all categories and display them -->
                <?php foreach ($allcategories as $category) { ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                        <a href="#" style="text-decoration: none;" onclick="submitCategoryForm(<?php echo $category['id']; ?>)">
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
            <div class="container mt-5">

                <!---------------------------------- Logo Pagination Section ---------------------------------->
                <div class="logo-pagination d-flex justify-content-center align-items-center mb-3">
                    <!-- Previous Button -->
                    <a href="?page=<?php echo $current_page - 1; ?>"
                        class="prev-arrow me-4 <?php if ($current_page <= 1) echo 'disabled'; ?>">
                        &lt;&lt;
                    </a>

                    <!-- Logo or Center Text -->
                    <div class="logo-box">
                        <img src="../Images/logo/cook_Corner_LOGO-removebg-mainPartOnly.png" alt="Logo" style=" width: 100px;">
                    </div>

                    <!-- Next Button -->
                    <a href="?page=<?php echo $current_page + 1; ?>"
                        class="next-arrow ms-4 <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                        &gt;&gt;
                    </a>
                </div>

                <!---------------------------------- Pagination Section ---------------------------------->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
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
        </div>

    </section>


    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>