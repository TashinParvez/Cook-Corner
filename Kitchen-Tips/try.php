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
                <!-- <img src="https://via.placeholder.com/960x540" class="img-fluid" alt="Featured Image"> -->
                <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[0][0]);   ?>" class="img-fluid" alt="Featured Image">
                <!-- Title -->
                <h2 class="mt-3"> <?php echo htmlspecialchars($forheroSegment[0][1]);   ?></h2>
                <!-- author -->
                <p>By <?php echo htmlspecialchars($forheroSegment[0][3]);
                        echo " ";
                        echo htmlspecialchars($forheroSegment[0][4]);
                        ?>
                </p>
                <!-- description -->
                <p>
                    <?php echo htmlspecialchars($forheroSegment[0][2]); ?>
                </p>

                <!-- Directions -->
                <p> Directions: <br> </p>

                <?php
                $i = 1;
                foreach (array_splice($directionsArray, 0) as $point) { ?>
                    <p>
                        <?php
                        echo $i;
                        echo ". ";
                        echo htmlspecialchars($point);
                        ?>
                    </p>
                <?php $i++;
                } ?>
            </div>

        </div>



        <div class="col-md-4">

            <div class="row">

                <div class="col-md-12 mb-3">
                    <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[1][0]);   ?>" class="img-fluid" alt="Thumbnail">
                    <p><?php echo htmlspecialchars($forheroSegment[1][1]);   ?></p>
                </div>

                <div class="col-md-12 mb-3">
                    <img src="/Images/Kitchen-Tips/<?php echo htmlspecialchars($forheroSegment[2][0]);   ?>" class="img-fluid" alt="Thumbnail">
                    <p><?php echo htmlspecialchars($forheroSegment[2][1]);   ?></p>
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

        <div class="row" id="tip-container">
            <!-- Display the first 12 tips initially -->
            <?php
            $initialTips = array_slice($allTips, 0, 12); // Get first 12 tips
            foreach ($initialTips as $oneTip) { ?>
                <div class="col-md-4">
                    <img src="../Images/Kitchen-Tips/<?php echo htmlspecialchars($oneTip[0]); ?> " class="img-fluid" alt="Care Tip">
                    <h5><?php echo htmlspecialchars($oneTip[1]); ?></h5>
                    <p>by <?php echo htmlspecialchars($oneTip[3]) . " " . htmlspecialchars($oneTip[4]); ?></p>
                </div>
            <?php } ?>
        </div>

        <!-- Load More Button -->
        <div class="text-center">
            <button id="load-more-btn" class="btn btn-primary" data-offset="12">Load More</button>
        </div>

        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $offset = (int)$_POST['offset'];

    // Slice the next 12 tips based on the offset
    $newTips = array_slice($allTips, $offset, 12);

    // Prepare response
    $response = [
        'cards' => []
    ];

    // If there are tips left to load
    if (count($newTips) > 0) {
        foreach ($newTips as $oneTip) {
            $response['cards'][] = [
                'title' => htmlspecialchars($oneTip[1]),
                'first_name' => htmlspecialchars($oneTip[3]),
                'last_name' => htmlspecialchars($oneTip[4])
            ];
        }
    }

    // If no more cards are left
    if (count($allTips) <= $offset + 12) {
        $response['noMoreCards'] = true;
    }

    // Return the response as JSON
    echo json_encode($response);
    exit();
}
?>

        <script>
            document.getElementById('load-more-btn').addEventListener('click', function() {
                let button = this;
                let offset = parseInt(button.getAttribute('data-offset')); // Get the current offset

                // AJAX request to fetch more cards
                let xhr = new XMLHttpRequest();
                xhr.open('POST', '', true); // Since we're not using a new file, this will be the same file

                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        let response = JSON.parse(xhr.responseText);

                        // Check if there are any more cards to load
                        if (response.cards.length > 0) {
                            // Append the new cards to the container
                            let container = document.getElementById('tip-container');
                            response.cards.forEach(function(card) {
                                let cardHTML = `<div class="col-md-4">
                        <img src="../Images/Kitchen-Tips/${card[0]}" class="img-fluid" alt="Care Tip">
                        <h5>${card.title}</h5>
                        <p>by ${card.first_name} ${card.last_name}</p>
                    </div>`;
                                container.innerHTML += cardHTML;
                            });

                            // Update the offset for the next batch
                            button.setAttribute('data-offset', offset + 12);
                        }

                        // If there are no more cards, disable the button
                        if (response.noMoreCards) {
                            button.disabled = true;
                            button.innerText = 'No More Cards';
                        }
                    } else {
                        console.error('Error loading more cards');
                    }
                };

                // Send offset as a POST request to the same page
                xhr.send('offset=' + offset);
            });
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