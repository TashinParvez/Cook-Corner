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
  <!-- Include Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- <link href="css/styles.css" rel="stylesheet" type="text/css"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body style="background-color: #f0faf0;">

  <?php
  include('../Includes/Navbar/navbarMain.php');  // tashin
  ?>

  <div class="container bg-light">
    <div class="row g-0 text-center">
      <div class="col-3 ">

        <!-- <h2>Filters</h2> -->

        <form class=" container bg-light w-100 mb-3" action="" method="post">

          <div class="btn-group w-100">
            <button class="btn btn-secondary btn-sm  d-flex justify-content-between align-items-center"
              type="button"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="border-radius: 0px; background-color:transparent; border:0cap; border-top: 1px solid #6c757d; ">
              <span style="color:black">Meal</span>
              <i class="fas fa-plus" style="color:black"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class=" dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
          </div>

          <div class="btn-group w-100">
            <button class="btn btn-secondary btn-sm  d-flex justify-content-between align-items-center"
              type="button"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="border-radius: 0px; background-color:transparent; border:0cap; border-top: 1px solid #6c757d; ">
              <span style="color:black">Ingredients</span>
              <i class="fas fa-plus" style="color:black"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class=" dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
          </div>

          <div class="btn-group w-100">
            <button class="btn btn-secondary btn-sm  d-flex justify-content-between align-items-center"
              type="button"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="border-radius: 0px; background-color:transparent; border:0cap; border-top: 1px solid #6c757d; ">
              <span style="color:black">Dish Type</span>
              <i class="fas fa-plus" style="color:black"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class=" dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
          </div>

          <div class="btn-group w-100">
            <button class="btn btn-secondary btn-sm  d-flex justify-content-between align-items-center"
              type="button"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="border-radius: 0px; background-color:transparent; border:0cap; border-top: 1px solid #6c757d; ">
              <span style="color:black">Occation</span>
              <i class="fas fa-plus" style="color:black"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class=" dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
          </div>

          <div class="btn-group w-100">
            <button class="btn btn-secondary btn-sm  d-flex justify-content-between align-items-center"
              type="button"
              id="dropdownMenuButton"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="border-radius: 0px; background-color:transparent; border:0cap; border-top: 1px solid #6c757d; border-bottom: 1px solid #6c757d;">
              <span style="color:black">Cuisine</span>
              <i class="fas fa-plus" style="color:black"></i>
            </button>
            <ul class="dropdown-menu w-100">
              <li><a class=" dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
              <li><a class="dropdown-item" href="#">Menu item</a></li>
            </ul>
          </div>

        </form>
      </div>

      <div class=" col-8 ">

        <div class="row row-cols-1 row-cols-md-3 g-4">
          <!-- .... -->
        </div>

        <div class=" row row-cols-1 row-cols-md-3 g-4">

          <div class="col- ">
            <div class="card" style="width: 18rem;">
              <img src="../Images/background.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col- ">
            <div class="card" style="width: 18rem;">
              <img src="../Images/background.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col- ">
            <div class="card" style="width: 18rem;">
              <img src="../Images/background.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <div class="col- ">
            <div class="card" style="width: 18rem;">
              <img src="../Images/background.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>


  </div>

</body>

</html>