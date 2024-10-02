<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$clickedCatagory = "Cooking Techniques";  // get from click

// -------------- clickedCatagory Info -----------------
$sql = "SELECT `id`, `name`, `description`, `image_preview`
        FROM `kitchen_tips_category` 
        WHERE name = '$clickedCatagory'";

$resultantLabel = mysqli_query($conn, $sql);   // get query result

$clickedCatagoryInfo = mysqli_fetch_all($resultantLabel)[0];   // conver to array


// print_r($clickedCatagoryInfo);


// -------------- Fetch all Tips of this category -----------------
$sql = "SELECT kt.image, kt.tips_title, kt.description,
                user_info.first_name , user_info.last_name,
                likes,
                kt.Directions

        FROM `kitchen_tips`  as kt
        INNER JOIN
        junction_kitchen_tips_into_category as jt
        ON
        kt.id = jt.tip_id
        INNER JOIN
        user_info
        on user_info.id = kt.user_id
        INNER JOIN
        kitchen_tips_category as c 
        ON
        c.id = jt.category_id
        WHERE c.id ='$clickedCatagoryInfo[0]'
        ORDER BY likes DESC;";


$resultantLabel = mysqli_query($conn, $sql);

$allTips = mysqli_fetch_all($resultantLabel);

$forheroSegment = array_slice($allTips, 0, 3);

shuffle($allTips);

$direction = $forheroSegment[0][6];
$directionsArray = explode("__COOKCORNER__", $direction);
// print_r($directionsArray);



// $allTips  = array_rand($allTips);



// print_r($forheroSegment[0]);

// print_r($forheroSegment );
// print_r($forheroSegment[0]);

mysqli_free_result($resultantLabel);
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo htmlspecialchars($clickedCatagoryInfo[1]);   ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="kitchenTipsDashboard.css">
    <link rel="stylesheet" href="oneCategoryOfKittchTips.css">

</head>

<body>
    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <!-- ---------------------------- first Segement / hero segment ---------------------------------------- -->
    <div class="text-center mt-4">
        <!-- Title and Subtitle -->
        <h1 class="fw-bold">
            <?php echo htmlspecialchars($clickedCatagoryInfo[1]);   ?>
        </h1>
        <p> <?php echo htmlspecialchars($clickedCatagoryInfo[2]);   ?></p>
    </div>


    <!-- ---------------------------- Hero Main Image Section ---------------------------------------- -->

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-4">
                    <!-- Featured Image -->
                    <div class="card-image" style="height: 435px;"> <!-- Keep image size same -->
                        <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[0][0]); ?>" class="img-fluid" alt="Featured Image">
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Title -->
                        <h2 class="card-title mt-3"> <?php echo htmlspecialchars($forheroSegment[0][1]); ?></h2>
                        <!-- Author -->
                        <p class="card-text">By <?php echo htmlspecialchars($forheroSegment[0][3]) . " " . htmlspecialchars($forheroSegment[0][4]); ?></p>
                        <!-- Description -->
                        <p class="card-text"><?php echo htmlspecialchars($forheroSegment[0][2]); ?></p>

                        <!-- Directions (First 3 directions) -->
                        <p><strong>Directions:</strong></p>
                        <?php
                        $i = 1;
                        foreach (array_splice($directionsArray, 0, 3) as $point) { // Show only 3 directions 
                        ?>
                            <p><?php echo $i . ". " . htmlspecialchars($point); ?></p>
                        <?php $i++;
                        } ?>

                        <!-- Link to full details -->
                        <a href="specificTipPage.php?tip_id=<?php echo htmlspecialchars($forheroSegment[0][0]); ?>" style="color: red; text-decoration: none;" class="mt-2">Read More</a>
                    </div>
                </div>
            </div>


            <!-- Right Column with Thumbnails -->
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-image">
                                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[1][0]); ?>" class="img-fluid" alt="Thumbnail">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo htmlspecialchars($forheroSegment[1][1]); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-image">
                                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[2][0]); ?>" class="img-fluid" alt="Thumbnail">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo htmlspecialchars($forheroSegment[2][1]); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card">
                            <div class="card-image">
                                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[2][0]); ?>" class="img-fluid" alt="Thumbnail">
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo htmlspecialchars($forheroSegment[2][1]); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-----------------------------------------------------------  All Tips ----------------------------------------------------------->
    <div class="container mt-5">
        <div class="explore-section">
            <h1 class="explore-title">All <?php echo htmlspecialchars($clickedCatagoryInfo[1]); ?> Tips</h1>
            <!-- Search Bar -->
            <div class="search-bar">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Find a recipe or ingredient">
                    <button class="btn btn-outline-secondary" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zm-5.442 1.102a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <hr>

        <!---------------------------------------   all cards   --------------------------------------->

        <!--  kt.image, kt.tips_title, kt.description, user_info.first_name , user_info.last_name, likes -->

        <div class="row" id="tipsContainer">
            <?php
            $initialTips = array_slice($allTips, 0, 12); // Get first 12 tips
            foreach ($initialTips as $oneTip) { ?>
                <div class="col-md-4 item mb-4">
                    <!-- card -->
                    <div class="card">
                        <!-- card image -->
                        <div class="card-image">
                            <img src="../Images/Kitchen-Tips/<?php echo htmlspecialchars($oneTip[0]); ?>" class="img-fluid" alt="Care Tip">
                        </div>
                        <!-- card body -->
                        <div class="card-body">
                            <!-- title -->
                            <h5 class="card-title"><?php echo htmlspecialchars($oneTip[1]); ?></h5>
                            <!-- user added by -->
                            <p class="card-text">by <?php echo htmlspecialchars($oneTip[3]) . " " . htmlspecialchars($oneTip[4]); ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button id="loadMore" class="btn btn-primary mt-3 mb-3">Load More</button>
        </div>

        <script>
            const allTips = <?php echo json_encode($allTips); ?>;
            let currentIndex = 12;
            const itemsPerPage = 12;

            function loadMoreTips() {
                const tipsContainer = document.getElementById("tipsContainer");
                const endIndex = currentIndex + itemsPerPage;
                const tipsToShow = allTips.slice(currentIndex, endIndex);

                tipsToShow.forEach(oneTip => {
                    const itemDiv = document.createElement("div");
                    itemDiv.classList.add("col-md-4", "item", "mb-4");

                    itemDiv.innerHTML = `
                <div class="card">
                    <div class="card-image">
                        <img src="../Images/Kitchen-Tips/${oneTip[0]}" class="img-fluid" alt="Care Tip">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${oneTip[1]}</h5>
                        <p class="card-text">by ${oneTip[3]} ${oneTip[4]}</p>
                    </div>
                </div>`;
                    tipsContainer.appendChild(itemDiv);
                });

                currentIndex += itemsPerPage;

                if (currentIndex >= allTips.length) {
                    document.getElementById("loadMore").disabled = true;
                    document.getElementById("loadMore").textContent = "No more tips to load";
                }
            }

            document.getElementById("loadMore").addEventListener("click", loadMoreTips);
        </script>





    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>