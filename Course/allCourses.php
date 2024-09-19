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
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Nav CSS -->
</head>


<body>

    <?php
    include('../Includes/Navbar/navbarMain.php');  // tashin
    ?>
    <!-- ============================== Course section ==================================== -->

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
            <div class="d-grid mx-auto">
                <button type="button" class="btn btn-secondary btn-lg col-1 mx-auto">MORE</button><br>
            </div>
    </section>



    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>