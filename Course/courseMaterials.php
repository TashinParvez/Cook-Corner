<?php
// Database table name:  

//...................... Database Connection ..............................
// include("../Includes/Database Connection/database_connection.php");


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
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />


    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>


    <div class="container mt-5">

        <h1>Be your own Chef</h1>
        <p class="fs-5 col-md-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae maiores voluptate aliquam corrupti sequi natus nihil laudantium, libero ad tempora molestiae porro fugiat ratione vel veniam unde dicta explicabo obcaecati.</p>
        <div class="mb-5">
            <a href="/docs/5.2/examples/" class="btn btn-primary btn-lg px-4">Download Outlines</a>
        </div>

        <div class="container">
            <!-- Course Progress Bar -->
            <div class="container mt-4">
                <h5>Course Progress</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        50%
                    </div>
                </div>
            </div>

        </div>


        <div class="container">

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">Materials</h6>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 1</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>

                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 2</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>


                <!-- ----------- -->
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 3</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 4</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>

                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 5</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 6</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 7</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 8</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Class 9</strong>
                            <!-- <a href="#">Follow</a> -->
                        </div>
                        <span class="d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sed illo distinctio nihil eius repudiandae quae error explicabo eaque facilis voluptas?</span>
                    </div>
                </div>

                <!-- ----------- --> <small class="d-block text-end mt-3">
                    <a href="#">Syart learning</a>
                </small>
            </div>




        </div>



    </div>















    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>