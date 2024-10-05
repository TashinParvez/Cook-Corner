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


    <style>
        .custom-bg {
            background-color: #0DCAF0 !important;
            color: white !important;
        }
    </style>

</head>

<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <div class="container pb-5">
        <div class="main-body">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---------------------- seg1 end ---------------------->
                    <!---------------------- seg2 ---------------------->

                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">


                            <li class="list-group-item custom-bg d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Update Profile -->
                                    <a class="nav-link" href="updateAccountInfo.php">Update Profile</a>
                                </h6>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Favourite Recipies -->
                                    <a class="nav-link " href="FavouriteRecipies.php">Favourite Recipies</a>
                                </h6>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Your Collections -->
                                    <a class="nav-link" href="YourCollections.php">
                                        Your Collections
                                    </a>
                                </h6>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- Your Recipies -->
                                    <a class="nav-link " href="YourRecipies.php">
                                        Your Recipies
                                    </a>
                                </h6>
                            </li>


                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    <!-- YourCart.php  -->
                                    <a class="nav-link" href="YourCart.php">
                                        Your Cart
                                    </a>
                                </h6>
                            </li>
                        </ul>

                    </div>
                    <!---------------------- seg2 end ---------------------->
                </div>


                <!------------------------- End 1st col ------------------------->


                <!------------------------- Second col ------------------------->
                <div class="col-md-9">

                    <!-- Update Profile -->

                    <form action="updateAccountInfo.php" method="post">
                        <div class="card mb-3">
                            <div class="card-body">

                                <style>
                                    .error-message {
                                        color: #f44336;
                                    }
                                </style>
                                <div class="row">
                                    <div class="col">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">First Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>"
                                                style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" <?php echo ($can_edit == 'edit') ? '' : 'readonly'; ?>>

                                            <?php if ($errors['first_name'] != '') { ?>
                                                <small class="error-message"><?php echo $errors['first_name']; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Last Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>"
                                                style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" <?php echo ($can_edit == 'edit') ? '' : 'readonly'; ?>>

                                            <?php if ($errors['last_name'] != '') { ?>
                                                <small class="error-message"><?php echo $errors['last_name']; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <input type="text" name="designation_name" id="designation_name" value="<?php echo $designation_name; ?>" style="display: none;">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="email" name="email" value="<?php echo $email; ?>"
                                            style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" readonly>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Password</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary" style="position: relative;">
                                        <div class="row">
                                            <div class="col-9">
                                                <input type="password" id="password" name="password" value="<?php echo $password; ?>"
                                                    style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" readonly>
                                            </div>
                                            <div class="col-3">
                                                <button class="btn btn-info" type="submit" name="change_password"
                                                    style=" border: none; background-color: #FFF0F5; <?php echo ($can_edit == 'edit') ? '' : 'display: none;'; ?>">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" id="location" name="location" value="<?php echo $location; ?>"
                                            style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" <?php echo ($can_edit == 'edit') ? '' : 'readonly'; ?>>

                                        <?php if ($errors['location'] != '') { ?>
                                            <small class="error-message"><?php echo $errors['location']; ?></small>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Birth Date </h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="date" id="date_of_birth" name="date_of_birth" value="<?php echo $date_of_birth; ?>"
                                                style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" <?php echo ($can_edit == 'edit') ? '' : 'readonly'; ?>>

                                            <?php if ($errors['date_of_birth'] != '') { ?>
                                                <small class="error-message"><?php echo $errors['date_of_birth']; ?></small>
                                            <?php } ?>
                                        </div>

                                    </div>
                                    <div class="col">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Zip Code</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" id="zip_code" name="zip_code" value="<?php echo $zip_code; ?>"
                                                style="border: none; background-color: transparent; width: 100%; padding: 5px; outline: none;" <?php echo ($can_edit == 'edit') ? '' : 'readonly'; ?>>

                                            <?php if ($errors['zip_code'] != '') { ?>
                                                <small class="error-message"><?php echo $errors['zip_code']; ?></small>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <button class="btn btn-info" type="submit" name="edit"
                                            style=" <?php echo ($can_edit == 'edit') ? 'display: none;' : ''; ?>">Edit</button>
                                    </div>
                                    <div class="col-sm-4 d-flex justify-content-end">
                                        <button class="btn btn-info" type="submit" name="cancel"
                                            style="background-color: #f44336; border-color: #f44336; <?php echo ($can_edit == 'edit') ? '' : 'display: none;'; ?>">Cancel</button>
                                    </div>
                                    <div class="col-sm-2 d-flex justify-content-end">
                                        <button class="btn btn-info" type="submit" name="save"
                                            style="background-color: #5cb85c; border-color: #5cb85c; <?php echo ($can_edit == 'edit') ? '' : 'display: none;'; ?>">Save Change</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>


                    <div class="container">


                    </div>

                    <!-- Adding health information -->
                    <div class="container">
                        <style>
                            /* Capsule-like tags */
                            .tag {
                                display: inline-block;
                                padding: 5px 10px;
                                margin-right: 5px;
                                background-color: #e2e2e2;
                                border-radius: 15px;
                                font-size: 14px;
                                margin-top: 5px;
                            }

                            .tag button.remove-btn {
                                border: none;
                                background: none;
                                margin-left: 10px;
                                font-size: 16px;
                                cursor: pointer;
                                color: red;
                            }

                            /* Suggestions styling */
                            .suggestion {
                                padding: 5px;
                                cursor: pointer;
                                background-color: #f0f0f0;
                            }

                            .suggestion:hover,
                            .suggestion.highlight {
                                background-color: #ddd;
                            }

                            /* Container styling */
                            .tag-container {
                                min-height: 40px;
                            }

                            #suggestion-container {
                                margin-top: 5px;
                                background-color: white;
                                border: 1px solid #ccc;
                                max-height: 150px;
                                overflow-y: auto;
                            }
                        </style>

                        <div class="container mt-5">
                            <div class="form-group">
                                <h5>Allergy Information</h5>
                                <div class="tag-input">
                                    <!-- Section to display allergic items from the database -->
                                    <div id="tag-container" class="tag-container mt-2">
                                        <?php if (!empty($allergic_items)): ?>
                                            <?php foreach ($allergic_items as $item): ?>
                                                <div class="tag">
                                                    <span><?php echo $item; ?></span>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p>No allergic item</p>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Input for adding new allergy items (initially hidden, will be shown in edit mode) -->
                                    <input type="text" id="allergy-input" class="form-control mt-2" placeholder="Add allergy" style="display:none;" />
                                    <div id="suggestion-container" class="suggestion-container"></div>
                                </div>
                            </div>
                        </div>

                        <script>
                            // Assume this comes from the database as a PHP list
                            let allergicItems = <?php echo json_encode($allergic_items); ?>;
                            let commonAllergicItems = <?php echo json_encode($common_allergic_items); ?>;

                            const input = document.getElementById('allergy-input');
                            const tagContainer = document.getElementById('tag-container');
                            const suggestionContainer = document.getElementById('suggestion-container');

                            // Show existing items or placeholder message
                            function loadAllergicItems() {
                                tagContainer.innerHTML = ''; // Clear container
                                if (allergicItems.length > 0) {
                                    allergicItems.forEach(item => addTag(item));
                                } else {
                                    tagContainer.innerHTML = '<p>No allergic item</p>';
                                }
                            }

                            // Function to add tag/capsule
                            function addTag(value) {
                                const tag = document.createElement('div');
                                tag.className = 'tag';
                                tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;
                                tag.querySelector('.remove-btn').addEventListener('click', () => {
                                    tagContainer.removeChild(tag);
                                    allergicItems = allergicItems.filter(item => item !== value);
                                });
                                tagContainer.appendChild(tag);
                            }

                            // Handle Enter key to add items
                            input.addEventListener('keydown', function(event) {
                                if (event.key === 'Enter') {
                                    event.preventDefault();
                                    const value = input.value.trim();
                                    if (value && !allergicItems.includes(value)) {
                                        addTag(value);
                                        allergicItems.push(value);
                                        input.value = '';
                                    }
                                }
                            });

                            // Show suggestions while typing
                            input.addEventListener('input', function() {
                                const value = input.value.toLowerCase();
                                suggestionContainer.innerHTML = ''; // Clear previous suggestions

                                if (value) {
                                    const filteredSuggestions = commonAllergicItems.filter(item =>
                                        item.toLowerCase().includes(value)
                                    );

                                    filteredSuggestions.forEach(suggestion => {
                                        const suggestionElement = document.createElement('div');
                                        suggestionElement.className = 'suggestion';
                                        suggestionElement.textContent = suggestion;

                                        suggestionElement.addEventListener('click', function() {
                                            addTag(suggestion);
                                            allergicItems.push(suggestion);
                                            input.value = '';
                                            suggestionContainer.innerHTML = ''; // Clear suggestions after selection
                                        });

                                        suggestionContainer.appendChild(suggestionElement);
                                    });
                                }
                            });

                            // Navigate suggestions with up/down arrow keys and add on Enter
                            let selectedSuggestionIndex = -1;

                            input.addEventListener('keydown', function(event) {
                                const suggestions = Array.from(suggestionContainer.children);

                                if (event.key === 'ArrowDown') {
                                    selectedSuggestionIndex = (selectedSuggestionIndex + 1) % suggestions.length;
                                    highlightSuggestion(suggestions, selectedSuggestionIndex);
                                } else if (event.key === 'ArrowUp') {
                                    selectedSuggestionIndex =
                                        (selectedSuggestionIndex - 1 + suggestions.length) % suggestions.length;
                                    highlightSuggestion(suggestions, selectedSuggestionIndex);
                                } else if (event.key === 'Enter' && selectedSuggestionIndex > -1) {
                                    event.preventDefault();
                                    const selectedItem = suggestions[selectedSuggestionIndex].textContent;
                                    addTag(selectedItem);
                                    allergicItems.push(selectedItem);
                                    input.value = '';
                                    suggestionContainer.innerHTML = ''; // Clear suggestions after selection
                                    selectedSuggestionIndex = -1;
                                }
                            });

                            // Highlight selected suggestion
                            function highlightSuggestion(suggestions, index) {
                                suggestions.forEach((suggestion, i) => {
                                    if (i === index) {
                                        suggestion.classList.add('highlight');
                                    } else {
                                        suggestion.classList.remove('highlight');
                                    }
                                });
                            }

                            // Call loadAllergicItems initially
                            loadAllergicItems();
                        </script>
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