<?php

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- navbar css -->
    <link href="recipeView.css" rel="stylesheet" type="text/css">
</head>



<body style="background-color: #f0faf0;">

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>

    <div class="container bg-light pt-3">
        <!-- <div class="row g-0 text-center">
            <div class="col-8 bg-light mb-4 text-start"> -->
        <div class="row g-4 text-center">
            <div class="col-8 bg-light mb-4 text-start">

                <!------------------- Segment 1 ------------------->
                <h2 class="text-start">Cornflakes, Low-Fat Milk & Berries Recipe</h2>
                <p class="text-start">Bite into these delightful Cheeseburger Tater Tot Cups for a fun twist on a classic favorite. Perfect for parties or a quick snack, these crispy cups are packed with savory cheeseburger goodness.</p>
                <p>Uploaded on May 05 2023</p>
                <p>Uploaded by Tashin Parvez</p>
                <p>Tags: CAKE , AMERICAN , YOGURT , GRAINS , FATHER’S DAY , MOTHER’S DAY FOURTH OF JULY BREAKFAST</p>

                <img src="/Images/maxresdefault.jpg" class="img-fluid" alt="...">


                <!-- Time segment -->
                <div class="row">
                    <div class="col-auto">
                        <h6>Total Time</h6>
                        <p>55 minutes</p>
                    </div>
                    <!-- <div class="vr" style="width: 2px;"></div> -->

                    <div class="col-auto">
                        <h6>Prep Time</h6>
                        <p>55 minutes</p>
                    </div>
                    <!-- <div class="vr" style="width: 2px;"></div> -->

                    <div class="col-auto">
                        <h6>Cook Time</h6>
                        <p>55 minutes</p>
                    </div>
                </div>



                <!--------------------- Recipe Segment --------------------->
                <div class="row">
                    <div class="col-auto">
                        <p>Cuisine: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Course: English</p>
                    </div>

                    <div class="col-auto">
                        <p>Skill level: English</p>
                    </div>
                </div>

                <!--------------------- Ingredents --------------------->
                <h3>Ingredents</h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input type="checkbox">
                            </th>
                            <th scope="col">First</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td>Mark</td>
                            <td>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td>Jacob</td>
                            <td>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td colspan="1">Larry the Bird</td>
                            <td>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>


                <!-- ================================================== Dish Need ================================================== -->
                <h3>Dish Needed </h3>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <input type="checkbox">
                            </th>
                            <th scope="col">First</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td>Mark</td>

                        </tr>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td>Jacob</td>

                        </tr>
                        <tr>
                            <th scope="row">
                                <input type="checkbox">
                            </th>
                            <td colspan="1">Larry the Bird</td>

                        </tr>
                    </tbody>
                </table>

                <!-- ================================================== Directions ================================================== -->
                <h2>Directions</h2>
                <!-- <div class="container align-self-start">
                    <div class="card mb-3">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                        <img src="..." class="card-img-bottom" alt="...">
                    </div>

                </div> -->
                <div class="container">
                    <div class="container">
                        <h4>1</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div class="container">
                        <h4>2</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div class="container">
                        <h4>3</h4>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                </div>

                <!-- ================================================== Notes ================================================== -->
                <h2>Notes</h2>

                <div class="container">
                    <div class="container">
                        <h6>1</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div class="container">
                        <h6>2</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                    <div class="container">
                        <h6>3</h6>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde minima qui nam nostrum exercitationem possimus sequi quae hic voluptates aspernatur.</p>
                    </div>
                </div>





                <!---  __________________________________________   Segment 1 End __________________________________________  -->
            </div>

            <div class="col-4 bg-light">

                <!-------__________________________________________ Segment 2 __________________________________________------->

                <!--------------------------- about Segment --------------------------->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">About Chef</div>
                            <div class="container text-center">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="image-container text-center">
                                            <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                        </div>
                                    </div>
                                    <div class="image-title">Tashin Parvez</div>
                                    <p>I create simple, delicious recipes that require 10 ingredients or less, one bowl, or 30 minutes or less to prepare.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- Neuttrations ---------------------------------- -->
                <div class="container">
                    <div class="container bg-dark text-light fw-light text-start p-1">
                        <h3>Nutrition Facts</h3> <!-- Corrected "Neuttrations" to "Nutrition" -->
                        <h6>Serving Size: 4</h6>
                        <h6>Calories Per Serving: 375</h6> <!-- Corrected "Calloris" to "Calories" -->
                    </div>

                    <div class="container">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="row">No</th>
                                    <td>Name</td>
                                    <td>Percentage/gm</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Protine</td>
                                    <td>30%</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Fat</td>
                                    <td>5%</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Carbohydrate</td>
                                    <td>100gm</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>Sugar</td>
                                    <td>12gm</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
                <!-- -------------------------- Neuttrations End ---------------------------------- -->
                <!-- -------------------------- Category End ---------------------------------- -->
                <!--------------------------- about Segment --------------------------->
                <div class="container">
                    <div class="container my-4">
                        <div class="bordered-container">
                            <div class="title-on-border">Category</div>
                            <div class="container text-center">


                                <!-- <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <div class="image-container text-center">
                                            <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                        </div>
                                    </div>
                                    <div class="image-title">Tashin Parvez</div>
                                </div> -->

                                <!-- ------------------ tashin -->
                                <div class="row row-cols-1 row-cols-md-3 g-4">


                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row justify-content-center">
                                            <div class="col-md-4">
                                                <div class="image-container text-center">
                                                    <img src="/Images/IMG-20240131-WA0004.jpg" alt="Circular Image" class="circle-image">
                                                </div>
                                            </div>
                                            <div class="image-title">Items</div>
                                        </div>
                                    </div>

                                </div>
                                <!-- ------------------ -->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- -------------------------- Category End ---------------------------------- -->

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                    <img src="/Images/maxresdefault.jpg" class="card-img-bottom" alt="...">
                </div>
                <!-- __________________________________________------- Segment 2 End __________________________________________------->
            </div>
        </div>
    </div>



    <!-- ============================== Footer ==================================== -->
    <?php
    // include('../Includes/Footer/footermain.php');  // tashin
    include('../Includes/Footer/footermainTry.php');  // tashin
    ?>
    <!-- ============================== Footer End ==================================== -->


</body>

</html>