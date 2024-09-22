<?php
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
    <style>
        /* Content wrapper adjustments */
        .content-wrapper {
            margin-left: 280px;
            padding-top: 70px;
        }

        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
            padding-bottom: 56.25%;
        }

        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .buttons-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
    </style>
</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>


    <div class="container row">


        <!-------------------- Left side sidebar -------------------->

        <div class="col-3">
            <div class="flex-shrink-0 p-3 bg-white" style="width: 280px; height: 100vh; overflow-y: auto; position: fixed;">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <svg class="bi pe-none me-2" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-5 fw-semibold">Project 2024</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 1</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 2</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 3</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 4</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 5</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 6</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 7</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 8</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 9</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>
                    <li class="mb-1">
                        <a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Class 10</a>
                    </li>

                    <li class="border-top my-3"></li>
                </ul>
            </div>
        </div>



        <!-------------------- right side -------------------->
        <div class="col-9">


            <!-- Course Progress Bar -->
            <div class="container mt-4">
                <h5>Course Progress</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                        50%
                    </div>
                </div>
            </div>


            <div class="content-wrapper">
                <div class="container">
                    <!-- Class Title -->
                    <h2>Class Title: Introduction to Topic</h2>

                    <!-- Class Description -->
                    <p class="mt-3">This class introduces the fundamental concepts of the topic. It provides an overview of the key areas to be covered and the learning objectives you should achieve by the end of the session.</p>

                    <!-- Embedded Video -->
                    <div class="embed-responsive">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>

                    <!-- Buttons: Go to Previous Class, Mark as Complete -->
                    <div class="buttons-container mt-4">
                        <a href="#" class="btn btn-secondary">Go to Previous Class</a>
                        <a href="#" class="btn btn-success">Mark as Complete</a>
                    </div>
                </div>
            </div>

        </div>

    </div>





    <!-- ============================== Footer ==================================== -->
    <?php
    // include('../Includes/Footer/footermain.php');  // tashin 
    ?>
</body>

</html>