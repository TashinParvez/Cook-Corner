<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");


// .............. Recipe search ....................

$searched_text = htmlspecialchars($_GET['searched_text'] ?? ''); // comes from home page
if (isset($_POST['searchButton'])) {
  $searched_text = isset($_POST['search']) ?? '';
}

// $searched_text = htmlspecialchars($_POST['recipes_search'] ?? '');
// echo $searched_text;

if (!empty($searched_text)) {

  $sql = "SELECT SQL_CALC_FOUND_ROWS recipe_id, title, description, rating, image
          FROM
            recipe_info
          WHERE 
                title LIKE ?
            OR subtitle LIKE ?
            OR description LIKE ?
            OR recipe_id IN (
                    SELECT rt.recipe_id 
                    FROM recipe_tags rt
                    JOIN tags t ON rt.tag_id = t.id
                    WHERE t.tag_name LIKE ?
                )
                OR recipe_id IN (
                    SELECT jri.recipe_id 
                    FROM junction_recipe_ingredients jri
                    JOIN ingredient_info ii ON jri.ingredient_id = ii.ingredient_id
                    WHERE ii.ingredient_name LIKE ?
                );";

  $stmt = $conn->prepare($sql);
  $search_param = '%' . $searched_text . '%';
  $stmt->bind_param('sssss', $search_param, $search_param, $search_param, $search_param, $search_param);
  $stmt->execute();

  $result = $stmt->get_result();
  $recipes = $result->fetch_all();
  // echo 'search';
  // print_r($recipes); output confirm

  $total_recipes_result = $conn->query("SELECT FOUND_ROWS()");
  $total_recipes = $total_recipes_result->fetch_array()[0];

  $stmt->close();
  mysqli_close($conn);
}


?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recipe Search Result</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- favicon -->
  <link rel="icon" href="../Images/logo/fav-icon.png" />

  <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

  <link rel="stylesheet" href="RecipeSearch.css">
</head>


<body style="background-color: #f0faf0;">


  <?php
  include('../Includes/Navbar/navbarMain.php');  // Navbar 
  include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin    
  ?>


  <div class="container">
    <!-- Page items section -->
    <div class="row g-0 text-center">
      <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="content-eid-fitr" role="tabpanel">
          <!-- Tab 1 -->
          <div class="row g-0 text-center">

            <div class="col-3">
              <div class="container">
                <div class="row">
                  Filter By:-
                </div>

                <div class="row">
                  <div class="col">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="filterType" id="includeFilter" checked>
                        <label class="form-check-label" for="includeFilter">
                          Includes
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="filterType" id="excludeFilter">
                        <label class="form-check-label" for="excludeFilter">
                          Excludes
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <form class="container w-100 " action="" method="post">
                    <div class="accordion accordion-flush" id="accordionFlushExample" style="background-color: transparent;  border-radius: 0px;">

                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <input class="form-check-input me-1 filter-checkbox" type="checkbox" value="First checkbox" data-filter="include" id="firstCheckbox">
                                <label class="form-check-label" for="firstCheckbox">First checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1 filter-checkbox" type="checkbox" value="Second checkbox" data-filter="include" id="secondCheckbox">
                                <label class="form-check-label" for="secondCheckbox">Second checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1 filter-checkbox" type="checkbox" value="Third checkbox" data-filter="include" id="thirdCheckbox">
                                <label class="form-check-label" for="thirdCheckbox">Third checkbox</label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Accordion Item #2
                          </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">
                            <ul class="list-group">
                              <li class="list-group-item">
                                <input class="form-check-input me-1 filter-checkbox" type="checkbox" value="Another checkbox" data-filter="exclude" id="firstExcludeCheckbox">
                                <label class="form-check-label" for="firstExcludeCheckbox">Another checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1 filter-checkbox" type="checkbox" value="Another second checkbox" data-filter="exclude" id="secondExcludeCheckbox">
                                <label class="form-check-label" for="secondExcludeCheckbox">Another second checkbox</label>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>

            </div>

            <div class="col-9">
              <div class="container">
                <div class="row">
                  <!-- Head -->
                  <div class="container">

                    <div class="row"> <!-- working -->
                      <!-- Added Filters -->
                      <div class="container">
                        <div class="row">



                          <div class="recipe-search mb-2">
                            <form class="d-flex" action="RecipeSearch.php" method=" post">
                              <input class="form-control me-2" type="search" placeholder="Search your recipe here" aria-label="Search" name="search"
                                value="<?php echo !empty($searched_text) ? 'Searched By: ' . htmlspecialchars($searched_text) : ''; ?>">
                              <button class="btn btn-success" name="searchButton" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                          </div>


                        </div>
                        <div class="row">
                          <div class="container">
                            <div class="row">
                              <!-- Include -->
                              <div class="mb-2">
                                <strong>Included Items</strong>
                                <div id="includedFilters" class="d-flex flex-wrap border p-2 rounded">
                                  <!-- Placeholder will be added if empty -->
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <!-- Exclude -->
                              <div>
                                <strong>Excluded Items</strong>
                                <div id="excludedFilters" class="d-flex flex-wrap border p-2 rounded">
                                  <!-- Placeholder will be added if empty -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Added Filters div close -->
                    </div>





                    <div class="row  mb-5">

                      <script>
                        function submirecipeForm(recipe_id) {
                          const form = document.getElementById('recipeForm');
                          form.action = '../Recipe View/recipeView.php?recipe_id=' + recipe_id;
                          form.submit();
                        }
                      </script>

                      <form id="recipeForm" action="../Recipe View/recipeView.php" method="post">
                        <!-- No hidden input needed -->
                      </form>

                      <!-- Card -->
                      <div class=" row row-cols-1 row-cols-md-3 g-4">
                        <!-- recipe_id, title, description, rating, image -->
                        <?php foreach ($recipes as $recipe) { ?>
                          <div class="col">
                            <a href="#" class="text-decoration-none" onclick="submirecipeForm(<?php echo $recipe[0]; ?>)">
                              <div class="card">
                                <img src="../Images/FoodImages/cookingClass.jpeg" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-text mb-0"><?php echo htmlentities($recipe[1]) ?></h5>
                                  <p class="card-text mb-0"><?php echo htmlentities($recipe[2]) ?></p>
                                </div>
                              </div>
                            </a>
                          </div>
                        <?php } ?>

                      </div>
                    </div>




                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>



  <script src="RecipeSearch.js"></script>

  <?php
  include('../Includes/Footer/footermain.php');  // tashin 
  ?>

</body>

</html>