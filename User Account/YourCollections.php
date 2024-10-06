<?php

include('../Includes/Navbar/navbarMain.php');  // tashin

// Database Connection
include("../Includes/Database Connection/database_connection.php");

$tabId = isset($_POST['tabId']) ? $_POST['tabId'] : 'tab-your-recipe-collections';

switch ($tabId) {
    case 'tab-update-profile':
        $title = 'Update Profile';
        break;
    case 'tab-favorite-recipes':
        $title = 'Favorite Recipes';
        break;
    case 'tab-your-recipe-collections':
        $title = 'Your Recipe Collections';
        break;
    default:
        // Exceptional case
        $title = 'Account';
        break;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <style>
        .custom-bg {
            background-color: #0DCAF0 !important;
            color: white !important;
        }
    </style>
</head>

<body>

    <div class="container pb-5 mt-3">
        <div class="main-body">
            <div class="row gutters-sm">
                <!-- First column -->
                <div class="col-md-3 mb-3">
                    <!-- Profile and Navigation Section -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo "John Doe"; ?></h4>
                                    <p class="text-secondary mb-1">Senior Developer</p>
                                    <p class="text-muted font-size-sm">San Francisco, CA</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <a class="nav-link" href="updateAccountInfo.php">Update Profile</a>
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <a class="nav-link " href="FavouriteRecipies.php">Favourite Recipes</a>
                                </h6>
                            </li>
                            <li class="list-group-item custom-bg d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <a class="nav-link" href="YourCollections.php">Your Collections</a>
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <a class="nav-link " href="YourRecipies.php">Your Recipes</a>
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <a class="nav-link" href="YourCart.php">Your Cart</a>
                                </h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End First column -->

                <!-- Second column -->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!-- Main Content -->
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 1</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 2</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 3</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 4</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 5</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Card title 6</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <!-- Button to trigger modal -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addNewCollectionModal">
                                Add New Collection
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Second column -->
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="addNewCollectionModal" tabindex="-1" aria-labelledby="addNewCollectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNewCollectionModalLabel">Add New Collection</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form to get card title -->
                    <form id="newCollectionForm" method="POST" action="saveCollection.php">
                        <div class="mb-3">
                            <label for="cardTitle" class="form-label">Card Title</label>
                            <input type="text" class="form-control" id="cardTitle" name="cardTitle" placeholder="Enter card title" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="newCollectionForm">Save</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('../Includes/Footer/footermain.php'); ?>

</body>

</html>