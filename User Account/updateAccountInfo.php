<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

// Session
session_start();
$id = $_SESSION['id'] ?? '2';

$stmt = $conn->prepare('SELECT user_info.*, user_designation.designation_name 
                        FROM user_info JOIN user_designation
                        ON user_info.designation = user_designation.designation_id 
                        WHERE user_info.id = ? 
                        LIMIT 1');
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
$user_info = $result->fetch_assoc();

$stmt->close();
mysqli_close($conn);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- css  -->
    <link href="css/styles.css" rel="stylesheet" type="text/css">

</head>

<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // Navbar 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
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
                                    <h4><?php echo $user_info['first_name'] . ' ' . $user_info['last_name']; ?></h4>
                                    <p class="text-secondary mb-1"><?php echo $user_info['designation_name']; ?></p>
                                    <p class="text-muted font-size-sm"><?php echo $user_info['location']; ?></p>
                                    <p class="text-muted font-size-sm">Designation</p>
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
                                    Update Profile
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Favourite Recipies
                                </h6>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Your Recipie Collections
                                </h6>
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">
                                    Your Recipie Collections
                                </h6>
                            </li>


                        </ul>

                    </div>
                    <!---------------------- seg2 end ---------------------->
                </div>


                <!------------------------- End 1st col ------------------------->


                <!------------------------- Second col ------------------------->
                <div class="col-md-9">

                    <div class="card mb-3">
                        <div class="card-body">

                            <div class="row">
                                <div class="col">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">First Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user_info['first_name']; ?>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Last Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user_info['last_name']; ?>
                                    </div>
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user_info['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user_info['password']; ?>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user_info['location']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Birth Date </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Kenneth Valdez
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Zip Code</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Kenneth Valdez
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="#">Edit</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- 
                    <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="container">

                        <div class="container mt-5">
                            <div class="form-group">
                                <label for="allergy-input">Allergy Information</label>
                                <div class="tag-input">
                                    <input type="text" id="allergy-input" class="form-control" placeholder="Add allergy" />
                                    <div id="tag-container" class="tag-container mt-2"></div>
                                </div>
                            </div>
                        </div>
                        <!-- ------------ -->


                        <script>
                            const input = document.getElementById('allergy-input');
                            const tagContainer = document.getElementById('tag-container');

                            input.addEventListener('keydown', function(event) {
                                if (event.key === 'Enter') {
                                    event.preventDefault();
                                    const value = input.value.trim();
                                    if (value && !Array.from(tagContainer.children).some(tag => tag.textContent.includes(value))) {
                                        addTag(value);
                                        input.value = '';
                                    }
                                }
                            });

                            function addTag(value) {
                                const tag = document.createElement('div');
                                tag.className = 'tag';
                                tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;
                                tag.querySelector('.remove-btn').addEventListener('click', () => {
                                    tagContainer.removeChild(tag);
                                });
                                tagContainer.appendChild(tag);
                            }

                            // Optional: Add suggestion functionality (basic example)
                            input.addEventListener('input', function() {
                                const value = input.value.toLowerCase();
                                const filteredSuggestions = suggestions.filter(s => s.toLowerCase().includes(value));

                                // Implement suggestion display logic here
                            });
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