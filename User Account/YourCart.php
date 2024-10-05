<?php

include('../Includes/Navbar/navbarMain.php');  // tashin

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$tabId = isset($_POST['tabId']) ? $_POST['tabId'] : 'tab-update-profile';

switch ($tabId) {
    case 'tab-update-profile':

        $title = 'Update Profile';

        // ..........This part for updating database edited by user .............

        $errors = array('first_name' => '', 'last_name' => '', 'location' => '', 'date_of_birth' => '', 'zip_code' => '');

        if (isset($_POST['cancel'])) {

            mysqli_close($conn);

            header('Location: updateAccountInfo.php');
            exit();
        } else if (isset($_POST['save'])) {

            $can_edit =  'edit';

            //................ Retrieve all data  from input field ...............

            // These three won't be changed
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $designation_name = $_POST['designation_name'] ?? '';


            // These can be changed
            $first_name = $_POST['first_name'] ?? '';
            $last_name = $_POST['last_name'] ?? '';
            $location = $_POST['location'] ?? '';
            $date_of_birth = $_POST['date_of_birth'] ?? '';
            $zip_code = $_POST['zip_code'] ?? '';

            //.............. All input field validation checking ...................

            if (empty($first_name)) {
                $errors['first_name'] = 'empty!';
            } else {
                if (!preg_match('/^[a-zA-Z\s\.]+$/', $first_name)) {
                    $errors['first_name'] = 'First Name contains letters and space only!';
                }
            }

            if (empty($last_name)) {
                $errors['last_name'] = 'empty!';
            } else {
                if (!preg_match('/^[a-zA-Z\s\.]+$/', $last_name)) {
                    $errors['last_name'] = 'Last Name contains letters and space only!';
                }
            }

            if (empty($location)) {
                $errors['location'] = 'empty!';
            } else {
                if (!preg_match('/^[a-zA-Z0-9\s.,-]+$/', $location)) {
                    $errors['location'] = 'Location can contain letters, numbers, spaces, commas, periods, and hyphens only!';
                }
            }

            if (empty($zip_code)) {
                $errors['zip_code'] = 'empty!';
            } else if (strlen($zip_code) < 4 || strlen($zip_code) > 10) {
                $errors['zip_code'] = 'Zip code must be between 5 and 10 characters long!';
            } else {
                if (!preg_match('/^[a-zA-Z0-9\s.,-]+$/', $zip_code)) {
                    $errors['zip_code'] = 'Zip code must be in the format 12345 or 12345-6789!';
                }
            }


            if (!array_filter($errors)) {

                $stmt = $conn->prepare('UPDATE user_info SET first_name = ?, last_name = ?, location = ?, date_of_birth = ?, zip_code = ? WHERE id = ?');
                $stmt->bind_param('sssssi', $first_name, $last_name, $location, $date_of_birth, $zip_code, $user_id);
                $stmt->execute();

                $stmt->close();
                mysqli_close($conn);

                header('Location: updateAccountInfo.php');
                exit();
            }
        } else {
            $can_edit = isset($_POST['edit']) ? 'edit' : '';

            $stmt = $conn->prepare('SELECT user_info.*, user_designation.designation_name
                        FROM user_info LEFT JOIN user_designation
                        ON user_info.designation = user_designation.designation_id 
                        WHERE user_info.id = ? 
                        LIMIT 1');

            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user_info = $result->fetch_assoc();

            $first_name = $user_info['first_name'];
            $last_name = $user_info['last_name'];
            $designation_name = $user_info['designation_name'];
            $email = $user_info['email'];
            $password = $user_info['password'];
            $location = $user_info['location'];
            $date_of_birth = $user_info['date_of_birth'];
            $zip_code = $user_info['zip_code'];

            $stmt->close();
            mysqli_close($conn);
        }

        // ..........************************ .............

        // These are for testing add health information
        // $common_allergic_items = ['Peanuts', 'Dairy', 'Gluten', 'Shellfish', 'Soy', 'Wheat', 'Tree Nuts', 'Eggs', 'Fish', 'Sesame'];
        // $allergic_items = ['Eggs', 'Fish', 'Sesame'];

        break;
    case 'tab-favorite-recipes':

        $title = 'Favorite Recipies';


        break;
    case 'tab-your-recipe-collections':

        $title = 'Your Recipe Collections';


        break;
    default:
        // If any exceptional case arise
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
    <!-- css  -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

</head>

<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <div class="container pb-5">
        <div class="main-body">

            <!-- Breadcrumb -->
            <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav> -->
            <!-- /Breadcrumb -->

            <div class="row gutters-sm">
                <!------------------------- 1st col ------------------------->
                <div class="col-md-3 mb-3">
                    <!---------------------- seg1 ---------------------->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $first_name . ' ' . $last_name; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $designation_name; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $location; ?></p>
                                    <!-- <p class="text-muted font-size-sm">Designation</p> -->
                                    <!-- <button class="btn btn-primary">Follow</button>
                                    <button class="btn btn-outline-primary">Message</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------- seg1 end ---------------------->
                    <!---------------------- seg2 ---------------------->

                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Update Profile -->
                                    <a class="nav-link <?php echo ($tabId == 'tab-update-profile') ? 'active' : ''; ?>" id="tab-update-profile" data-bs-toggle="tab" href="#content-update-profile" role="tab" aria-controls="content-update-profile" aria-selected="<?php echo ($tabId == 'tab-update-profile') ? 'true' : 'false'; ?>" onclick="submitForm('tab-update-profile')">Update Profile</a>
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Favourite Recipies -->
                                    <a class="nav-link <?php echo ($tabId == 'tab-favorite-recipes') ? 'active' : ''; ?>" id="tab-favorite-recipes" data-bs-toggle="tab" href="#content-favorite-recipes" role="tab" aria-controls="content-favorite-recipes" aria-selected="<?php echo ($tabId == 'tab-favorite-recipes') ? 'true' : 'false'; ?>" onclick="submitForm('tab-favorite-recipes')">Favourite Recipies</a>
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Your Recipie Collections -->
                                    <a class="nav-link <?php echo ($tabId == 'tab-your-recipe-collections') ? 'active' : ''; ?>" id="tab-your-recipe-collections" data-bs-toggle="tab" href="YourRecipieCollections.php" role="tab"
                                        aria-controls="content-your-recipe-collections" aria-selected="
                                    <?php echo ($tabId == 'tab-your-recipe-collections') ? 'true' : 'false'; ?>" onclick="submitForm('tab-your-recipe-collections')">
                                        Your Recipie Collections
                                    </a>
                                </h6>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Your Recipies -->
                                    <a class="nav-link <?php echo ($tabId == 'tab-your-recipe-collections') ? 'active' : ''; ?>" id="tab-your-recipe-collections" data-bs-toggle="tab"
                                        href="YourRecipieCollections.php" role="tab"
                                        aria-controls="content-your-recipe-collections" aria-selected="
                                    <?php echo ($tabId == 'tab-your-recipe-collections') ? 'true' : 'false'; ?>" onclick="submitForm('tab-your-recipe-collections')">
                                        Your Recipies
                                    </a>
                                </h6>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- YourCart.php  -->
                                    <a class="nav-link <?php echo ($tabId == 'tab-your-recipe-collections') ? 'active' : ''; ?>" id="tab-your-recipe-collections" data-bs-toggle="tab"
                                        href="YourCart.php" role="tab"
                                        aria-controls="content-your-recipe-collections" aria-selected="
                                    <?php echo ($tabId == 'tab-your-recipe-collections') ? 'true' : 'false'; ?>" onclick="submitForm('tab-your-recipe-collections')">
                                        Your Cart
                                    </a>
                                </h6>
                            </li>


                        </ul>

                        <form id="tabIdkForm" action="updateAccountInfo.php" method="post">
                            <input type="hidden" name="tabId" id="tabIdInput">
                        </form>

                        <script>
                            function submitForm(tabId) {
                                document.getElementById('tabIdInput').value = tabId;
                                document.getElementById('tabIdkForm').submit();
                            }
                        </script>

                    </div>
                    <!---------------------- seg2 end ---------------------->
                </div>


                <!------------------------- End 1st col ------------------------->


                <!------------------------- Second col ------------------------->
                <div class="col-md-9">
                    <div class="tab-content">
                        <!--  Main Content -->
                        <!--  noman -->







                        <!--  Main end -->
                    </div>
                </div>
                <!------------------------- End Second col ------------------------->

            </div>

        </div>
    </div>

    <!-- ============================== Footer ==================================== -->
    <?php
    // include('../Includes/Footer/footermain.php');  // tashin
    include('../Includes/Footer/footermain.php');  // tashin
    ?>
    <!-- ============================== Footer End ==================================== -->


</body>

</html>