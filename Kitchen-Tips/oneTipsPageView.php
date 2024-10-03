<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$clicked_tips_name = 'How to Get Perfectly Even Cookies'; // from other page


// ------------------------- for all info
$sql = "SELECT *
        FROM `kitchen_tips` 
        WHERE tips_title = '$clicked_tips_name';";

$resultantLabel = mysqli_query($conn, $sql);   // get query result
$tipsInfo = mysqli_fetch_all($resultantLabel)[0];   // conver to array


// print_r($tipsInfo);

$clicked_tips_id = $tipsInfo[0];
$user_id = $tipsInfo[1];


// print_r($clicked_tips_id);

// ------------------------- for all category it is in

$sql = "SELECT ktc.name
        FROM `junction_kitchen_tips_into_category` as jt 
        INNER JOIN 
        kitchen_tips_category as ktc
        ON 
        jt.category_id = ktc.id
        WHERE tip_id = '$clicked_tips_id';";

// echo "TASHIN";

$resultantLabel = mysqli_query($conn, $sql);
$allCategories = mysqli_fetch_all($resultantLabel);

// print_r($allCategories);




// ------------------------- for  Directions
$direction = $tipsInfo[9];
$directionsArray = explode("__COOKCORNER__", $direction);
// print_r($directionsArray);




//--------------------------- for Category box preview

$sql = "SELECT * 
        FROM `kitchen_tips_category`
        ORDER BY RAND()
        LIMIT 6;";


$resultantLabel = mysqli_query($conn, $sql);
$categorisToShow = mysqli_fetch_all($resultantLabel);

// print_r($categorisToShow[0]);


//--------------------------- for user info

$sql = "SELECT first_name,last_name, designation, profile_picture  , d.designation_name
        FROM `user_info` 
        INNER JOIN
        user_designation as d
        ON 
        user_info.designation = d.designation_id
        WHERE id = '$user_id';";



$resultantLabel = mysqli_query($conn, $sql);
$userInfo = mysqli_fetch_all($resultantLabel)[0];

// print_r($userInfo);



//--------------------------- for Popular Tips


$sql = "SELECT image, tips_title 
        FROM `kitchen_tips` WHERE 1
        ORDER by likes DESC
        LIMIT 1;";


$resultantLabel = mysqli_query($conn, $sql);
$PopularTips3 = mysqli_fetch_all($resultantLabel);

// print_r($PopularTips3);



mysqli_free_result($resultantLabel);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tipsInfo[2]);  ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link href="oneTipsPageView.css" rel="stylesheet" type="text/css">

</head>



<body style="background-color: #f0faf0;">

    <?php
    include('../Includes/Navbar/navbarMain.php');  // Navbar 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
    ?>

    <div class="container  pt-3 mb-5  " id="main-content">
        <div class="row g-4 text-center">
            <div class="col-8  mb-4 text-start">
                <!------------------- Segment 1 ------------------->
                <!-- title -->
                <h2 class="text-start">
                    <?php echo htmlspecialchars($tipsInfo[2]);  ?>
                </h2>
                <!-- image -->
                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($tipsInfo[4]); ?>" class="img-fluid mb-3" alt="..." style="height: 500px; width:900px">
                <!-- categoris  show -->
                <p>
                    <?php
                    $totalCategories = count($allCategories);

                    foreach ($allCategories as $index => $category) { ?>
                        <a href="#" class="text-decoration-none text-dark ">
                            <b>
                                <?php
                                echo htmlspecialchars($category[0]);

                                if ($index < $totalCategories - 1) {
                                    echo ", ";
                                }
                                ?>
                            </b>
                        </a>
                    <?php } ?>
                </p>

                <!-- Description -->
                <p class="text-start">
                    <?php echo htmlspecialchars($tipsInfo[3]);  ?>

                </p>


                <!-- Time segment -->
                <div class="row">
                    <div class="col-auto">
                        <h6><b> Estimate Time <?php echo htmlspecialchars($tipsInfo[7]);  ?> </b> </h6>
                    </div>
                </div>

                <!-- likes -->
                <div class="row">
                    <div class="col-auto">
                        <h6><b> People likes <?php echo htmlspecialchars($tipsInfo[8]);  ?> </b> </h6>
                    </div>
                </div>


                <!--------------------- Recipe Segment --------------------->
                <div class="row">
                    <div class="col-auto">
                        <p>Cuisine: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Course: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Skill level: English</p>
                    </div>
                </div>






                <!-- ================================================== Directions ================================================== -->
                <h2>Directions</h2>
                <div class="container">
                    <?php
                    $itr = 1;
                    foreach ($directionsArray as $dir) { ?>
                        <div class="direction-container" id="step-<?php echo $itr; ?>">
                            <div class="step">
                                <div class="step-header">
                                    <div class="step-number"><?php echo htmlspecialchars($itr); ?></div>
                                    <div class="step-title">Step <?php echo htmlspecialchars($itr); ?>:</div>
                                </div>
                                <p class="ms-5"><?php echo htmlspecialchars($dir); ?></p>
                            </div>
                            <div class="markSection">
                                <input type="checkbox" id="mark-complete-<?php echo $itr; ?>">
                                <label for="mark-complete-<?php echo $itr; ?>">Mark as complete</label>
                            </div>
                        </div>
                    <?php
                        $itr++;
                    } ?>
                </div>


                <div class="col text-center">
                    <button type="button" class="btn btn-outline-success"> Like This 👍</button>
                </div>


                <!---  __________________________________________   Segment 1 End __________________________________________  -->
            </div>

            <div class="col-4 ">

                <!-------__________________________________________ Segment 2 __________________________________________------->

                <!--------------------------- about Segment --------------------------->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">About Chef</div>
                            <div class="container text-center">
                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="image-container text-center">
                                            <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                        </div>
                                    </div>
                                    <div class="image-title">Tashin Parvez</div>
                                    <p>I create simple, delicious recipes that require 10 ingredients or less, one bowl, or 30 minutes or less to prepare.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- -------------------------- Category   ---------------------------------- -->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">Category</div>

                            <div class="container text-center">
                                <div class="row">

                                    <?php foreach ($categorisToShow as $oneCategory) { ?>
                                        <div class="col-12 d-flex align-items-center mb-3"> <!-- Use d-flex for horizontal alignment -->
                                            <div class="col-auto">
                                                <div class="image-container text-center">
                                                    <a href="#" class="text-decoration-none text-dark">
                                                        <img src="/Images/Category-Image/<?php echo htmlspecialchars($oneCategory[3]); ?>"
                                                            alt="Circular Image"
                                                            class="circle-image category-image">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-auto ms-3"> <!-- Add margin to the left for spacing -->
                                                <a href="#" class="text-decoration-none text-dark">
                                                    <div class="image-title mt-4"> <?php echo htmlspecialchars($oneCategory[1]); ?> </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- -------------------------- Category End ---------------------------------- -->


                <!-- Popular Tips -->

                <!-- Explore Kitchen Tips  Popular Tips section-->
                <div class="container mt-5">
                    <h3>Popular Tips</h3>

                    <?php foreach ($PopularTips3  as $items_p) { ?>

                        <div class="">


                            <div class="card">
                                <img src="../Images/Kitchen-Tips/<?php echo htmlspecialchars($items_p[0]); ?> " class="img-fluid" alt="Article">

                                <div class="card-body">
                                    <!-- title -->
                                    <h5> <?php echo htmlspecialchars($items_p[1]); ?></h5>
                                </div>
                            </div>

                        </div>

                    <?php } ?>

                    <!-- Add more articles here -->

                </div>





                <!-- __________________________________________------- Segment 2 End __________________________________________------->
            </div>
        </div>
    </div>



    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin
    // include('../Includes/Footer/footermainTry.php');  // tashin
    ?>
    <!-- ============================== Footer End ==================================== -->


    <script>
        const checkboxes = document.querySelectorAll('.markSection input[type="checkbox"]');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                const directionContainer = event.target.closest('.direction-container');
                if (event.target.checked) {
                    directionContainer.style.opacity = 0.5; // Reduce opacity
                } else {
                    directionContainer.style.opacity = 1; // Restore opacity
                }
            });
        });
    </script>

</body>

</html>