<?php


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css  -->
    <link href="Home.css" rel="stylesheet" type="text/css">

</head>

<body>

    <?php
    include('../../../Includes/Navbar/navbarMain.php');  // Mahbub 
    ?>



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





            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First set of 6 smaller cards -->
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 1</h5>
                                        <p class="card-text">Description 1.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 2</h5>
                                        <p class="card-text">Description 2.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 3</h5>
                                        <p class="card-text">Description 3.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 4</h5>
                                        <p class="card-text">Description 4.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 5</h5>
                                        <p class="card-text">Description 5.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 6</h5>
                                        <p class="card-text">Description 6.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Second set of 6 smaller cards -->
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 7</h5>
                                        <p class="card-text">Description 7.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 8</h5>
                                        <p class="card-text">Description 8.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 9</h5>
                                        <p class="card-text">Description 9.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 10</h5>
                                        <p class="card-text">Description 10.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 11</h5>
                                        <p class="card-text">Description 11.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <img src="../../../Images/FoodImages/6.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">Card 12</h5>
                                        <p class="card-text">Description 12.</p>
                                    </div>
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
                                    <div class="col d-flex justify-content-between">
                                        <div class="text-start">Tk 150</div>
                                        <div class="text-end">Ratings</div>
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
                                    <div class="col d-flex justify-content-between">
                                        <div class="text-start">Tk 150</div>
                                        <div class="text-end">Ratings</div>
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
                                    <div class="col d-flex justify-content-between">
                                        <div class="text-start">Tk 150</div>
                                        <div class="text-end">Ratings</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>



    </section>

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


    <section class="all-categories m-4">
        <div class="container">
            <div class="identity m-2">
                <h2 class="m-0 p-0">All Categories</h2>
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
            </div>




        </div>
    </section>

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




</body>

</html>