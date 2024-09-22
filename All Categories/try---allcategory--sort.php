<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$categories_per_page = 24; // 6 rows * 4 categories per row
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($current_page - 1) * $categories_per_page;

// Get filter and search inputs
$sort_by = isset($_GET['sort']) ? $_GET['sort'] : 'name'; // Default sort
$search_query = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : ''; // Sanitize search input

// Prepare base SQL query
$sql_count = "SELECT COUNT(*) FROM `recipe_category` WHERE name LIKE '%$search_query%'";
$total_categories = mysqli_fetch_array(mysqli_query($conn, $sql_count))[0];

// Calculate total pages
$total_pages = ceil($total_categories / $categories_per_page);



// Sort based on user selection
if ($sort_by === 'recently_added') {
    $sql = "SELECT * FROM `recipe_category` 
            WHERE name LIKE '%$search_query%' 
            ORDER BY date_added DESC 
            LIMIT $categories_per_page OFFSET $offset";
} elseif ($sort_by === 'popularity') {
    $sql = "SELECT * FROM `recipe_category` 
            WHERE name LIKE '%$search_query%' 
            ORDER BY recipe_count DESC 
            LIMIT $categories_per_page 
            OFFSET $offset";
} else {
    $sql = "SELECT * FROM `recipe_category` 
            WHERE name LIKE '%$search_query%' 
            ORDER BY name LIMIT $categories_per_page 
            OFFSET $offset";
}

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

    <!-- javascript -->
    <script src="sortBtn.js"></script>
</head>

<body>
    <?php include('../Includes/Navbar/navbarMain.php'); ?>

    <div class="container text-center">
        <h2 class="text-center mt-5">All Categories</h2>
        <p>Explore a wide range of categories, each offering unique recipes tailored to your taste.<br>Find your next favorite dish across different cuisines and cooking styles.</p>
    </div>

    <div class="container mt-4">
        <form method="GET" class="d-flex justify-content-between">
            <input type="search" name="search" class="form-control" placeholder="Search Category..." aria-label="Search" value="<?php echo htmlspecialchars($search_query); ?>">
            <select name="sort" class="form-select ms-2" onchange="this.form.submit()">
                <option value="name" <?php echo $sort_by === 'name' ? 'selected' : ''; ?>>Sorted by: Name</option>
                <option value="recently_added" <?php echo $sort_by === 'recently_added' ? 'selected' : ''; ?>>Recently Added</option>
                <option value="popularity" <?php echo $sort_by === 'popularity' ? 'selected' : ''; ?>>Most Recipes</option>
            </select>
            <button type="submit" class="btn btn-primary ms-2">Filter</button>
        </form>
    </div>

    <section class="mt-5">
        <div class="container">
            <div class="row g-4">
                <!-- Loop through all categories and display them -->
                <?php foreach ($allcategories as $category) { ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                        <a href="#" style="text-decoration: none;">
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

            <!-- Pagination Section -->
            <div class="container mt-5">
                <!-- Pagination logic remains unchanged -->
            </div>
        </div>
    </section>

    <?php include('../Includes/Footer/footermain.php'); ?>
</body>

</html>