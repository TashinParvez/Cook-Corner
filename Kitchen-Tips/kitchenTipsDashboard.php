<?php
// Database table name:  

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

// --------------------- For segment 1 -------------------
$sql = "SELECT id,name 
        FROM kitchen_tips_category  WHERE 1;";

$resultantLabel = mysqli_query($conn, $sql);   // get query result

$allCategorisOfKitchenTips = mysqli_fetch_all($resultantLabel);   // conver to array

// print_r($allCategorisOfKitchenTips);
// foreach ($allCategorisOfKitchenTips as $category) {
//     echo htmlspecialchars($category[1]);
//     echo "<br>";
// }


// .......Set default value for order if not provided
$sort = isset($_POST['sortInput']) ? $_POST['sortInput'] : 'namewise';

switch ($sort) {
    case 'namewise':
        $sortBy = "kt.tips_title";
        break;
    case 'recentlyAdded':
        $sortBy = "kt.created_at DESC";
        break;
    case 'popularTips':
        $sortBy = "likes DESC";
        break;
    default:
        $sortBy = "name"; // Default sorting
        break;
}

// --------------------- For hero segment ------------------- working
$sql = "SELECT kt.tips_title, kt.description, kt.image, kt.difficulty_level, kt.estimated_time, 
               ui.first_name, ui.last_name,
               kitchen_tips_category.name, kt.created_at, kt.id
        FROM 
            kitchen_tips  as kt INNER JOIN user_info  as ui
        ON 
            ui.id = kt.user_id
        INNER JOIN
            junction_kitchen_tips_into_category
        ON
            kt.id = junction_kitchen_tips_into_category.tip_id
        INNER JOIN 
            kitchen_tips_category
		ON 
            junction_kitchen_tips_into_category.category_id = kitchen_tips_category.id
   
        ORDER BY $sortBy;";

$resultantLabel = mysqli_query($conn, $sql);   // get query result
$heroItems = mysqli_fetch_all($resultantLabel);   // conver to array


// print_r($heroItems);
// foreach ($heroItems as $item) {
//     echo htmlspecialchars($item[0]);
//     echo "<br>";
// }


// --------------------- forPopularSeg-------------------
$sql = "SELECT kt.tips_title, kt.description, kt.image, kt.difficulty_level, kt.estimated_time,  kt.likes,
               ui.first_name, ui.last_name
        FROM `kitchen_tips`  as kt
        INNER JOIN
        user_info  as ui
        ON ui.id = kt.user_id
        
        WHERE 1
        ORDER BY likes DESC;";

$resultantLabel = mysqli_query($conn, $sql);   // get query result
$forPopularSeg = mysqli_fetch_all($resultantLabel);   // conver to array


mysqli_free_result($resultantLabel);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitchen Tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="kitchenTipsDashboard.css">

    <!-- javascript -->
    <script src="dashboard-sort-btn.js"></script>
    <script src="dashboard-filter.js"></script>

</head>

<body>
    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>



    <!-- ---------------------------- first Segement ---------------------------------------- -->


    <div class="text-center mt-4">
        <!-- Title and Subtitle -->
        <h1 class="fw-bold">Kitchen Tips</h1>
        <p>Find cookware recommendations, money-saving ideas, holiday help, how-to tips, and more cooking and baking
            suggestions from our Allrecipes editors.</p>

        <!-- First Row of Navigation Links -->
        <div class="d-flex justify-content-center flex-wrap mb-3 kitchen-tips-container">
            <script>
                function submitKitchenTipsCategoryForm(kitchenTipsCategoryId) {
                    const form = document.getElementById('kitchenTipsCategoryForm');
                    form.action = 'oneCategoryOfKittchTips.php?kitchenTipsCategoryId=' + kitchenTipsCategoryId;
                    form.submit();
                }
            </script>

            <form id="kitchenTipsCategoryForm" action="oneCategoryOfKittchTips.php" method="post">
                <!-- No hidden input needed -->
            </form>

            <?php foreach ($allCategorisOfKitchenTips as $category) { ?>
                <a href="#" class="me-3 text-dark fw-bold text-decoration-none navigation-link" onclick="submitKitchenTipsCategoryForm(<?php echo $category[0]; ?>)">
                    <?php echo htmlspecialchars($category[1]); ?>
                </a>
            <?php } ?>

        </div>

    </div>



    <!-- -------------------------- ------------------------------------- -->
    <div class="container mt-5">
        <div class="row">
            <?php
            $randomTips = $heroItems;
            shuffle($randomTips);
            ?>

            <!-- Left Side: Large Image with Heading and Subheading -->
            <div class="col-lg-6">
                <a href="some-link-to-tip-details.php" class="text-decoration-none text-dark">

                    <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($randomTips[0][2]); ?>" alt="Large Tip" class="img-fluid" style="height: 550px; width: 100%; object-fit: cover;">
                    <h2 class="text-center mt-2"><?php echo htmlspecialchars($randomTips[0][0]); ?></h2>
                    <p class="text-center">By <?php echo htmlspecialchars($randomTips[0][5]) . " " . htmlspecialchars($randomTips[0][6]); ?></p>
                </a>
            </div>

            <!-- Right Side: Articles Grid with Thumbnails and Headings -->
            <div class="col-lg-6">
                <div class="row">
                    <?php foreach (array_slice($randomTips, 1, 3) as $item) { ?>
                        <div class="col-md-4">
                            <a href="some-link-to-tip-details.php" class="text-decoration-none text-dark">

                                <div class="card">
                                    <!-- Set a fixed height for the image and use object-fit -->
                                    <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($item[2]); ?>" alt="Tip Thumbnail" class="img-fluid card-img-top" style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title"><?php echo htmlspecialchars($item[0]); ?></h6>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php } ?>
                </div>

                <!-- Article Links -->
                <div class="mt-4">
                    <ul class="list-unstyled">
                        <?php foreach (array_slice($randomTips, 4, 8) as $item) { ?>
                            <li class="mb-2">
                                <h6><span class="me-2">🍽️</span><?php echo htmlspecialchars($item[0]); ?></h6>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <!-- -------------------------- ------------------------------------- -->



    <!-- ---------------------------- Main Image Section ---------------------------------------- -->


    <!-- Explore Kitchen Tips  Popular Tips section-->
    <div class="container mt-5">
        <h3>Popular Tips</h3>
        <div class="row">
            <?php foreach (array_slice($forPopularSeg, 0, 4) as $pitems) { ?>
                <div class="col-md-3">
                    <!-- Card structure -->
                    <a href="some-link-to-tip-details.php" class="text-decoration-none text-dark">
                        <div class="card mb-4">
                            <!-- Card image -->
                            <div class="card-image">
                                <img src="../Images/Kitchen-Tips/<?php echo htmlspecialchars($pitems[2]); ?>" class="img-fluid" alt="Article">
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo htmlspecialchars($pitems[0]); ?></h5>
                                <p class="card-text"> <?php echo htmlspecialchars($pitems[1]); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>


    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!-- ALL Tips -->
    <div class="container mt-5 mb-3">

        <div class="row">
            <div class="col-4">
                <h3>All Tips</h3>
            </div>

            <!--------------------------------------------------------->
            <!------------------------ filters ------------------------>
            <!---------------------------------------------------------->

            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-filter w-100" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by: All
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="filterDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('All')"><span id="check-all">✔</span> All</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Cooking Techniques')"><span id="check-techniques"></span> Cooking Techniques</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Ingredient Storage')"><span id="check-storage"></span> Ingredient Storage</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Time-Saving Hacks')"><span id="check-hacks"></span> Time-Saving Hacks</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Meal Prep Tips')"><span id="check-meal-prep"></span> Meal Prep Tips</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Food Safety')"><span id="check-safety"></span> Food Safety</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Baking Tips')"><span id="check-baking"></span> Baking Tips</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Healthy Cooking')"><span id="check-healthy"></span> Healthy Cooking</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Herb & Spice Usage')"><span id="check-herbs"></span> Herb & Spice Usage</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Cleaning & Maintenance')"><span id="check-cleaning"></span> Cleaning & Maintenance</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeFilter('Leftover Management')"><span id="check-leftovers"></span> Leftover Management</a></li>
                    </ul>
                </div>
            </div>

            <!------------------------ sort btn ------------------------>

            <div class="col-md-4">
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
                                        case 'popularTips':
                                            echo 'Most Recipes';
                                            break;
                                    }
                                    ?>
                    </button>

                    <script>
                        function changeSort(sortInput) { // hidden input name
                            document.getElementById('sortInput').value = sortInput; // hidden input id
                            document.getElementById('sortForm').submit(); // form id
                        }
                    </script>

                    <form id="sortForm" action="kitchenTipsDashboard.php" method="post">
                        <input type="hidden" name="sortInput" id="sortInput">
                    </form>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeSort('namewise')"><span id="check-name"><?php echo ($sort == 'namewise') ? '✔' : ''; ?></span> Name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('recentlyAdded')"><span id="check-recent"><?php echo ($sort == 'recentlyAdded') ? '✔' : ''; ?></span> Recently Added</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('popularTips')"><span id="check-popularity"><?php echo ($sort == 'popularTips') ? '✔' : ''; ?></span> Popular Tips</a></li>
                    </ul>
                </div>
            </div>


        </div>

        <hr>



        <!-- tashin -->

        <div class="row" id="recipeContainer">
            <?php
            // Assuming $heroItems is defined and contains your items
            $itemsPerPage = 12;
            $currentIndex = 0;

            // Load initial items
            foreach (array_slice($heroItems, $currentIndex, $itemsPerPage) as $heroItem) {
            ?>
                <div class="col-md-4">
                    <!-- Card structure -->
                    <div class="card mb-4">
                        <a href="some-link-to-tip-details.php" class="text-decoration-none text-dark">
                            <!-- Card image -->
                            <div class="card-image">
                                <img src="../Images/Kitchen-Tips/<?php echo htmlspecialchars($heroItem[2]); ?>" class="img-fluid" alt="Care Tip">
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($heroItem[0]); ?></h5>
                                <small class="card-category">(<?php echo htmlspecialchars($heroItem[7]); ?>)</small>
                                <p class="card-text">by <?php echo htmlspecialchars($heroItem[5]) . " " . htmlspecialchars($heroItem[6]); ?></p>
                            </div>
                        </a>
                    </div>
                </div>
            <?php
                $currentIndex++;
            }
            ?>
        </div>

        <!-- Load More Button -->
        <div class="row justify-content-center">
            <button id="loadMore" class="btn btn-primary mt-3 col-3">Load More</button>
        </div>

        <script>
            // JavaScript to handle loading more items
            const heroItems = <?php echo json_encode($heroItems); ?>;
            let currentIndex = 12; // Starting from the 13th item
            const itemsPerPage = 12;

            function loadItems() {
                const recipeContainer = document.getElementById("recipeContainer");

                // Check if there are more items to load
                if (currentIndex < heroItems.length) {
                    // Load the next set of items
                    const itemsToShow = heroItems.slice(currentIndex, currentIndex + itemsPerPage);

                    itemsToShow.forEach(heroItem => {
                        const itemDiv = document.createElement("div");
                        itemDiv.classList.add("col-md-4", "item");

                        // Create the HTML for the new item
                        itemDiv.innerHTML = `
                    <div class="card mb-4">
                        <a href="some-link-to-tip-details.php" class="text-decoration-none text-dark">
                        <div class="card-image">
                            <img src="../Images/Kitchen-Tips/${heroItem[2]}" class="img-fluid" alt="Care Tip">
                        </div>
                        <div class="card-body">
                            <h5>${heroItem[0]}</h5>
                            <small>(${heroItem[7]})</small>
                            <p>by ${heroItem[5]} ${heroItem[6]}</p>
                        </div>
                        </a>
                    </div>
                `;

                        // Append the newly created item to the container
                        recipeContainer.appendChild(itemDiv);
                    });

                    // Update the current index
                    currentIndex += itemsPerPage;

                    // Disable button if no more items to show
                    if (currentIndex >= heroItems.length) {
                        document.getElementById("loadMore").disabled = true;
                        document.getElementById("loadMore").textContent = "No more items to load";
                    }
                }
            }

            // Load more items on button click
            document.getElementById("loadMore").addEventListener("click", loadItems);
        </script>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>