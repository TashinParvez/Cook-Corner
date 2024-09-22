<?php
//...................... Database Connection .............................. 
// include("../Includes/Database Connection/database_connection.php"); 

// Session
session_start();
$id = $_SESSION['id'] ?? 'user_id_manually';



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cook Corner</title>
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link href="Homepage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="bmi.css">

    <!-- Javascript -->
    <script src="bmi.js"></script>


</head>

<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // Mahbub 

    // include('../Includes/Navbar/navbarMain.php');  // Navbar // tahsin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
    ?>

    <!-------------------------------------------- search section ---------------------------------------------------->


    <section class="get-start">
        <h1>Hungry? Get started</h1>
        <div class="search">
            <form action="#">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="" id="" placeholder="Search your recipe here">
                <!-- <button type="submit"></button> -->

                <div class="search-items">
                    <span class="items">Chicken</span>
                    <span class="items">Beef</span>
                    <span class="items">Vegetable</span>
                    <span class="items">Fish</span>
                    <span class="items">Cookies</span>
                    <span class="items">Sweet</span>
                    <span class="items">Juice</span>
                </div>
            </form>
        </div>
    </section>




    <section class="suggestion m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">Good Morning</h2>
                <p class="m-0 p-0">What to cook today</p>
            </div>


            <!-------------------------------------------- Image sliding section ------------------------------------------------------->



            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First set of 6 smaller cards -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 1</h5>
                                        <p class="card-text">Description 1.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 1">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 2</h5>
                                        <p class="card-text">Description 2.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 2">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 3</h5>
                                        <p class="card-text">Description 3.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 3">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 4</h5>
                                        <p class="card-text">Description 4.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 4">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 5</h5>
                                        <p class="card-text">Description 5.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 5">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 6</h5>
                                        <p class="card-text">Description 6.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 6">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second set of 6 smaller cards -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 7</h5>
                                        <p class="card-text">Description 7.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 7">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 8</h5>
                                        <p class="card-text">Description 8.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 8">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 9</h5>
                                        <p class="card-text">Description 9.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 9">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 10</h5>
                                        <p class="card-text">Description 10.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 10">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 11</h5>
                                        <p class="card-text">Description 11.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 11">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card text-white">
                                    <div class="card-img-overlay d-flex flex-column justify-content-end">
                                        <h5 class="card-title">Card 12</h5>
                                        <p class="card-text">Description 12.</p>
                                    </div>
                                    <img src="../../../Images/FoodImages/1.jpg" class="card-img carouselImg" alt="Card 12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Carousel controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>







        </div>
    </section>


    <!------------------------------------------------- Course section  ----------------------------------------------->

    <section class="course m-4">
        <div class="container">
            <div class="identity m-2">
                <p class="m-0 p-0">Here are our cooking classes</p>
                <h2 class="m-0 p-0">Popular Courses</h2>
            </div>


            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">

                                <p class="card-text">How to cook rice in home</p>
                                <div class="row">
                                    <div class="col d-flex  justify-content-between">
                                        <div>Tk 150</div>
                                        <div>Ratings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">

                                <p class="card-text">How to cook rice in home</p>
                                <div class="row">
                                    <div class="col d-flex  justify-content-between">
                                        <div>Tk 150</div>
                                        <div>Ratings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top" alt="...">
                            <div class="card-body">

                                <p class="card-text">How to cook rice in home</p>
                                <div class="row">
                                    <div class="col d-flex  justify-content-between">
                                        <div>Tk 150</div>
                                        <div>Ratings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>




    </section>


    <!-- cooking class section -->
    <section class="cooking-class">
        <div class="class-info">
            <h1>Join Our Cooking Class,<br>Become a Chef</h1>
            <p>Want to cook like a chef? Our cooking online courses offer step-by-step guidance and expert tips to
                transform your cooking. Join us now!</p>
            <a href="#" class="btn">Register Now</a>
        </div>
    </section>

    <!------------------------------------------------- Best Recipe section  ----------------------------------------------->


    <section class="best-recipe m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">The Best Recipe</h2>
            </div>



            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/3.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Ratings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/3.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Ratings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/3.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Ratings</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/3.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Ratings</p>
                            </div>
                        </div>
                    </a>
                </div>



            </div>
    </section>


    <!------------------------------------------------- All Categories section  ----------------------------------------------->



    <section class="all-categories m-5">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">All Categories</h2>
            </div>




            <div class="row row-cols-1 row-cols-md-6 g-4">
                <!--------------------------------- elements in categories  ------------------------------->

                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card text-center bg-transparent border-0">
                            <img src="../../../Images/FoodImages/2.jpg" class="card-img-top rounded-circle mx-auto d-block" alt="..." style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title ">Eid al-Fitr</h5>
                            </div>
                        </div>
                    </a>
                </div>

            </div>




        </div>
    </section>
    <!------------------------------------------------- Latest Recipe section  ----------------------------------------------->

    <section class="Latest Recipe m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">Latest Recipe</h2>
            </div>



            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="#">
                        <div class="card">
                            <img src="../../../Images/FoodImages/4.jpg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                            </div>
                        </div>
                    </a>
                </div>


            </div>




        </div>
    </section>

    <!------------------------------------------------- BMI section  ----------------------------------------------->
    <section class="BMISection bg-light pt-4 mt-5">

        <div class="container">
            <div class="row">
                <!-- BMI Calculator Form -->
                <div class="col-md-6">
                    <div class="card">
                        <h2>Calculate Your BMI</h2>
                        <p>BMI calculator generates the number of calories your body burns per day at rest. Your BMI with
                            activity factor is the number of calories your body burns per day based on the activity factor
                            you selected.</p>
                        <form id="bmiForm">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="height" class="form-label">Height (cm)*</label>
                                    <input type="number" class="form-control" id="height" placeholder="Enter height">
                                </div>
                                <div class="col">
                                    <label for="weight" class="form-label">Weight (kg)*</label>
                                    <input type="number" class="form-control" id="weight" placeholder="Enter weight">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="age" class="form-label">Age*</label>
                                    <input type="number" class="form-control" id="age" placeholder="Enter age">
                                </div>
                                <div class="col">
                                    <label for="gender" class="form-label">Gender*</label>
                                    <select class="form-select" id="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="activity" class="form-label">Select an activity factor*</label>
                                <select class="form-select" id="activity">
                                    <option value="1.2">Little or no Exercise / desk job</option>
                                    <option value="1.375">Light exercise / sports 1-3 days/week</option>
                                    <option value="1.55">Moderate exercise / sports 3-5 days/week</option>
                                    <option value="1.725">Hard exercise / sports 6-7 days a week</option>
                                    <option value="1.9">Very hard exercise / physical job</option>
                                </select>
                            </div>
                            <button type="button" class="btn btn-dark" onclick="calculateBMI()">Calculate</button>
                        </form>
                    </div>
                </div>
                <!-- BMI Chart -->
                <div class="col-md-5 bmi-chart">
                    <h2>BMI Calculator Chart</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>BMI</th>
                                <th>Weight Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Below 18.5</td>
                                <td>Underweight</td>
                            </tr>
                            <tr>
                                <td>18.5 - 24.9</td>
                                <td>Healthy</td>
                            </tr>
                            <tr>
                                <td>25.0 - 29.9</td>
                                <td>Overweight</td>
                            </tr>
                            <tr>
                                <td>30.0 and Above</td>
                                <td>Obese</td>
                            </tr>
                        </tbody>
                    </table>
                    <p>*BMR Metabolic Rate / BMI Body Mass Index</p>

                    <!-- BMI Result Box -->
                    <div id="resultBox" class="result-box">
                        <span class="close-btn" onclick="hideResultBox()">×</span>
                        <p id="bmiResultText"></p>
                    </div>
                </div>
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