<?php
// Database table name:  

//...................... Database Connection ..............................
// include("../Includes/Database Connection/database_connection.php");

$page_name = "My Favourite Breakfast List";

// sql query
// $sql = " ";

// $resultantLabel = mysqli_query($conn, $sql);   // get query result

// $labels = mysqli_fetch_all($resultantLabel);   // conver to array

// mysqli_free_result($resultantLabel);
// mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_name); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <style>
        #mainContent {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Include Spinner -->
    <?php 
    //include('/Cook-Corner/Includes/Spinner/spinnerBasic.php'); // ovi
     include('../Includes/Spinner/spinnerBasic.php'); ?> // ovi
    

    <!------------------------------------------ Main content ------------------------------------------>
    <div id="mainContent" style="display:none;">
        <?php
        // Include your navbar, footer, and other content here
        include('../Includes/Navbar/navbarMain.php');
        include '../Includes/Scroll UP/scrollUpBtn.php';
        ?>
        <!-- ============================== breadcrumb ==================================== -->
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>

        <!-- ------------------ main  ----------------------- -->

        <div class="container-fluid row d-flex justify-content-center">
            <!-------------------------------- First Seg -------------------------------->
            <div class="col-md-6">
                <h2><?php echo htmlspecialchars($page_name); ?></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti nihil consectetur placeat ut? Accusantium, magni pariatur! Numquam molestias repudiandae voluptates.</p>

                <!------------------------ sort ------------------------>

                <div class="row">
                    <div class="col-3 text-end dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown2" data-bs-toggle="dropdown" aria-expanded="false">
                            Show Per Page: 10
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown2">
                            <li><a class="dropdown-item" href="#" onclick="changeSort('10')"><span id="check-per-page">✔</span> 10</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSort('20')"><span id="check-per-page"></span> 20</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSort('30')"><span id="check-per-page"></span> 30</a></li>
                        </ul>
                    </div>
                    <div class="col-3 text-end dropdown">
                        <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                            Sorted by: Name
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="sortDropdown1">
                            <li><a class="dropdown-item" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                            <li><a class="dropdown-item" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Most Recipes</a></li>
                        </ul>
                    </div>
                </div> 

            <hr>


            <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <!-- --------------REMOVE----------------------- -->
            <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a> <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a> <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a> <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a> <a href="../Recipe View/recipeView.php" style="text-decoration: none;">
                <div class="card mb-3 border-0" style="max-width: 100%;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="/Images/curryInHand.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Cornflakes, Low-Fat Milk & Berries Recipe</h5>
                                <p class="card-text">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite.</p>
                                <p class="card-text">
                                    Cuisine: English || Course: English || Skill level: English
                                </p>
                                <p class="card-text"><small class="text-muted">Uploaded by Shafayet Ovi</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <!-- --------------REMOVE----------------------- -->

            <!-- Buttons -->
            <div class="container d-flex justify-content-between mt-5">
                <button type="button" class="btn btn-primary btn-sm">
                    << Prev</button>
                        <p>My Favourite Breakfast List</p>
                        <button type="button" class="btn btn-primary btn-sm">Next >></button>
            </div>


        </div>

        <!-------------------------------- Second Seg -------------------------------->
        <div class="col-md-2">

            <div class="card" style="width: 100%;">
                <div class="card-header">
                    All Collections
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item ">Collection NO-1 </li>
                    <li class="list-group-item">Collection NO-2 </li>
                    <li class="list-group-item">Collection NO-3</li>
                </ul>
            </div>

            <!-- Add Collection -->
            <div class="mt-3 text-center">
                <button type="button" class="btn btn-outline-secondary btn-sm" id="addStep">+ Add Collection</button>
            </div>



        </div>
    </div>






    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>

    </div>
    <!------------------------------------------ End of Main content ------------------------------------------>

    <script>
        window.addEventListener('load', function() {
            document.getElementById('loadingSpinner').style.display = 'none';
            document.getElementById('mainContent').style.display = 'block';
        });
    </script>
</body>

</html>