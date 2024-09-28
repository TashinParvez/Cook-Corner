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
            <!-- Left Side: Large Image with Heading and Subheading -->
            <div class="col-lg-6">
                <img src="../Images/background.png" alt="Turkey" class="img-fluid">
                <h6 class="text-uppercase text-center mt-3" style="letter-spacing: 1px;">Skills</h6>
                <h2 class="text-center mt-2">What to Do Now If Your Turkey's Still Frozen on Thanksgiving</h2>
                <p class="text-center">By EMMA CHRISTENSEN</p>
            </div>

            <!-- Right Side: Articles Grid with Thumbnails and Headings -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- First Card -->
                    <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Egg Cartons" class="img-fluid">
                        <h6 class="mt-2">Cage-Free vs. Free-Range vs. Pasture-Raised: How to Decode Egg Cartons</h6>
                    </div>
                    <!-- Second Card -->
                    <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Roasted Potatoes" class="img-fluid">
                        <h6 class="mt-2">The Easy Italian Trick for the Perfect Roasted Potatoes</h6>
                    </div>
                    <!-- Third Card -->
                    <div class="col-md-4">
                        <img src="../Images/FoodImages/2.jpg" alt="Cumin" class="img-fluid">
                        <h6 class="mt-2">What Is Cumin? (Plus How to Use it in Your Cooking)</h6>
                    </div>
                </div>

                <!-- Article Links -->
                <div class="mt-4">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>Why You Should Never Leave Out Pizza on the Counter</h6>
                        </li>
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>My Cooking Tip for Irresistibly Creamy Soup –Without a Drop of Cream</h6>
                        </li>
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>This Brilliant Pillsbury Cookie Dough Hack Will Upgrade Your Fall Baking</h6>
                        </li>
                        <li class="mb-2">
                            <h6><span class="me-2">🍽️</span>This Cheap Canned Bean Cooking Trick Is My Go-To Lazy Dinner</h6>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------------- ------------------------------------- -->






    <!-- ---------------------------- Main Image Section ---------------------------------------- -->


    <!-- Explore Kitchen Tips -->
    <div class="container mt-5">
        <h3>Explore Kitchen Tips</h3>
        <div class="row">
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <!-- Add more articles here -->
        </div>
    </div> <!-- Explore Kitchen Tips -->
    <div class="container mt-5">
        <h3>Explore Kitchen Tips</h3>
        <div class="row">
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <div class="col-md-3">
                <img src="../Images//FoodImages/3.jpg" class="img-fluid" alt="Article">
                <h5>Article Title</h5>
                <p>Trends</p>
            </div>
            <!-- Add more articles here -->
        </div>
    </div>
    <!-- -------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Care Tips and Buying Guides -->
    <div class="container mt-5">
        <h3>Care Tips and Buying Guides</h3>
        <div class="row">
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Season a Cast Iron Skillet</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>How to Clean Dirty Sheet Pans</h5>
                <p>Cleaning</p>
            </div>
            <div class="col-md-4">
                <img src="../Images/FoodImages/4.jpg" class="img-fluid" alt="Care Tip">
                <h5>What's the Difference Between a Convection Oven and an Air Fryer?</h5>
                <p>Kitchen Tools and Techniques</p>
            </div>
            <!-- Add more care tips here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>