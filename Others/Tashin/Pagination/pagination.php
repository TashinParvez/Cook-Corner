<?php

//...................... Database Connection ..............................
include("/Cook-Corner/Includes/Database Connection/database_connection.php");

$categories_per_page = 24; // 6 rows * 4 categories per row
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $categories_per_page;

$sql_count = "SELECT COUNT(*) 
              FROM `recipe_category`";

$total_categories = mysqli_fetch_array(mysqli_query($conn, $sql_count))[0];

// Calculate total pages
$total_pages = ceil($total_categories / $categories_per_page);


mysqli_close($conn);
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

</head>


<body>

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
                <img src="/Images/logo/cook_Corner_LOGO-removebg.png" class=" " alt="...">
            </span>

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
                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" tabindex="-1">&lt;</a>
            </li>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>

            <!-- Next Button -->
            <li class="page-item <?php if ($current_page >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">&gt;</a>
            </li>
        </ul>
    </nav>



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


</body>

</html>