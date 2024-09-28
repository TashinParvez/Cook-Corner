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


// --------------------- For hero segment -------------------
$sql = "SELECT kt.tips_title, kt.description, kt.image, kt.difficulty_level, kt.estimated_time, 
               ui.first_name, ui.last_name,
               kitchen_tips_category.name
        FROM `kitchen_tips`  as kt
        INNER JOIN
        user_info  as ui
        ON ui.id = kt.user_id
        INNER JOIN
        junction_kitchen_tips_into_category
        ON
        kt.id = junction_kitchen_tips_into_category.tip_id
        INNER JOIN 
        kitchen_tips_category
		ON junction_kitchen_tips_into_category.category_id = kitchen_tips_category.id
        
        WHERE 1
        ORDER BY RAND();";

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

            <?php foreach ($allCategorisOfKitchenTips as $category) { ?>
                <a href="#" class="me-3 text-dark fw-bold text-decoration-none">
                    <?php echo htmlspecialchars($category[1]); ?>
                </a>
            <?php } ?>

        </div>

    </div>

    <style>
        .kitchen-tips-container {
            max-width: 70%;
            /* Set the max-width to 80% */
            margin: 0 auto;
            /* Center the container */
        }

        .kitchen-tips-container a {
            flex: 0 1 auto;
            /* Make the links flexible */
            margin-bottom: 10px;
            /* Space between rows */
        }
    </style>




    <!-- -------------------------- ------------------------------------- -->
    <div class="container mt-5">
        <div class="row">
            <!-- Hero Segment-->
            <!-- Left Side: Large Image with Heading and Subheading -->
            <div class="col-lg-6">
                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($heroItems[0][2]);  ?>" alt="Turkey" class="img-fluid">
                <!-- <h6 class="text-uppercase text-center mt-3" style="letter-spacing: 1px;">Skills</h6> -->
                <h2 class="text-center mt-2"><?php echo htmlspecialchars($heroItems[0][0]);  ?></h2>
                <p class="text-center">By <?php echo htmlspecialchars($heroItems[0][5]);
                                            echo " ";
                                            echo htmlspecialchars($heroItems[0][6]);  ?></p>
            </div>

            <!-- Right Side: Articles Grid with Thumbnails and Headings -->
            <div class="col-lg-6">
                <div class="row">


                    <?php foreach (array_slice($heroItems, 1, 3) as $item) { ?>
                        <div class="col-md-4">
                            <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($item[2]);  ?>" alt="Egg Cartons" class="img-fluid">
                            <h6 class="mt-2"> <?php echo htmlspecialchars($item[0]);  ?> </h6>
                        </div>
                    <?php } ?>


                    <!-- First Card -->
                    <!-- <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Egg Cartons" class="img-fluid">
                        <h6 class="mt-2">Cage-Free vs. Free-Range vs. Pasture-Raised: How to Decode Egg Cartons</h6>
                    </div> -->
                    <!-- Second Card -->
                    <!-- <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Roasted Potatoes" class="img-fluid">
                        <h6 class="mt-2">The Easy Italian Trick for the Perfect Roasted Potatoes</h6>
                    </div> -->
                    <!-- Third Card -->
                    <!-- <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Cumin" class="img-fluid">
                        <h6 class="mt-2">What Is Cumin? (Plus How to Use it in Your Cooking)</h6>
                    </div> -->
                </div>

                <!-- Article Links -->
                <div class="mt-4">
                    <ul class="list-unstyled">

                        <?php foreach (array_slice($heroItems, 4, 8) as $item) { ?>

                            <li class="mb-2">
                                <h6><span class="me-2">🍽️</span><?php echo htmlspecialchars($item[0]);  ?></h6>
                            </li>

                        <?php } ?>





                        <!-- <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>My Cooking Tip for Irresistibly Creamy Soup –Without a Drop of Cream</h6>
                        </li>
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>This Brilliant Pillsbury Cookie Dough Hack Will Upgrade Your Fall Baking</h6>
                        </li>
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>This Cheap Canned Bean Cooking Trick Is My Go-To Lazy Dinner</h6>
                        </li> -->


                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------- ------------------------------------- -->



    <!-- ---------------------------- Main Image Section ---------------------------------------- -->


    <!-- Explore Kitchen Tips -->
    <div class="container mt-5">
        <h3>Popular Tips</h3>
        <div class="row">

            <?php foreach (array_slice($forPopularSeg, 0, 4) as $pitems) { ?>
                <div class="col-md-3">
                    <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                    <!-- image chnage tashin -->
                    <h5> <?php echo htmlspecialchars($pitems[0]); ?></h5>
                    <p> <?php echo htmlspecialchars($pitems[0]); ?></p>
                </div>
            <?php } ?>

            <!-- Add more articles here -->
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
                        Sorted by: Name
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                        <li><a class="dropdown-item" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Popularity</a></li>
                    </ul>
                </div>
            </div>


        </div>

        <hr>



        <!-- tashin -->

        <div class="row" id="recipeContainer">
            <?php
            // Assuming $heroItems is defined and contains your items
            $heroItems = array_slice($heroItems, 0); // Replace this with your actual items

            // Example of populating $heroItems for demonstration
            // for ($i = 1; $i <= 100; $i++) {
            //     $heroItems[] = ["Tip " . $i, "", "", "", "", "Author " . $i, "Surname " . $i, "Category " . $i];
            // }

            // Randomly shuffle the $heroItems array
            shuffle($heroItems);

            // Number of items to show initially
            $itemsPerPage = 12;
            $currentIndex = 0;

            // Load initial items
            foreach (array_slice($heroItems, $currentIndex, $itemsPerPage) as $heroItem) { // Changed variable name here
            ?>
                <div class="col-md-4 item">
                    <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                    <!-- image chnage tashin -->

                    <h5><?php echo htmlspecialchars($heroItem[0]); ?></h5> <!-- Changed $item to $heroItem -->
                    <small>(<?php echo htmlspecialchars($heroItem[7]); ?>)</small> <!-- Changed $item to $heroItem -->
                    <p>by <?php echo htmlspecialchars($heroItem[5]) . " " . htmlspecialchars($heroItem[6]); ?></p> <!-- Changed $item to $heroItem -->
                </div>
            <?php
                $currentIndex++;
            }
            ?>
        </div>
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

                    itemsToShow.forEach(heroItem => { // Changed variable name here
                        const itemDiv = document.createElement("div");
                        itemDiv.classList.add("col-md-4", "item");
                        itemDiv.innerHTML = `
                    <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                    <h5>${heroItem[0]}</h5> <!-- Changed $item to $heroItem -->
                    <small>(${heroItem[7]})</small> <!-- Changed $item to $heroItem -->
                    <p>by ${heroItem[5]} ${heroItem[6]}</p> <!-- Changed $item to $heroItem -->
                `;
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