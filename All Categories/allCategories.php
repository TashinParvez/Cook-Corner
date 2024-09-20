<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="allCategories.css">

    <!-- <style>
        @media (min-width: 992px) {
            .col-lg-1-5 {
                flex: 0 0 12.5%;
                max-width: 12.5%;
            }
        }
    </style> -->

    <!-- javascript -->
    <script src="sortBtn.js"></script>

</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <h1 class="text-center mt-5">All Categories</h1>


    <div class="container mt-4">
        <div class="row justify-content-center">
            <!-------------------------------------------------- Search -------------------------------------------------->
            <div class="col-8 d-flex justify-content-center align-items-center">
                <form class="w-100 me-3" role="search">
                    <input type="search" class="form-control p-3" placeholder="Search Category..." aria-label="Search">
                </form>
            </div>

            <!------------------------ sort ------------------------>
            <div class="col-4 d-flex justify-content-end">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle dropdown-toggle-sort w-100" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sorted by: Name
                    </button>

                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Name')"><span id="check-name">✔</span> Name</a></li>
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Recently Added')"><span id="check-recent"></span> Recently Added</a></li>
                        <li><a class="dropdown-item dropdown-item-sort" href="#" onclick="changeSort('Popularity')"><span id="check-popularity"></span> Popularity</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>




    <!------------------------------------------------- ALL categories  ----------------------------------------------->

    <section class="mt-5">

        <div class="container">
            <div class="row g-4">

                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Repeat the card structure for more cards -->

                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-1-5">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Repeat the card structure for more cards -->

            </div>
        </div>




    </section>





    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>