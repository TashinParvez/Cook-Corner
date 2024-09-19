<?php

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Bootstrap JS and Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</head>


<body style="background-color: #f0faf0;">

  <?php
  include('../Includes/Navbar/navbarMain.php');  // tashin
  ?>

  <div class="container">

    <div class="row g-0 text-center"> <!-- Page togle button -->

      <div class="col-3">
        <!-- ..... -->
      </div>
      <div class="col-5">
        <ul class="nav nav-tabs w-100" id="recipeTabs" role="tablist">
          <li class="nav-item w-50">
            <a class="nav-link active" id="tab-eid-fitr" data-bs-toggle="tab" href="#content-eid-fitr" role="tab" aria-controls="content-eid-fitr" aria-selected="true">Searched Recipe</a>
          </li>
          <li class="nav-item w-50">
            <a class="nav-link" id="tab-eid-fitr-biryani" data-bs-toggle="tab" href="#content-eid-fitr-biryani" role="tab" aria-controls="content-eid-fitr-biryani" aria-selected="false">Recipe Generator</a>
          </li>
        </ul>
      </div>
      <div class="col-4">
        <!-- ......... -->
      </div>
    </div>

    <!-- Page items section -->
    <div class="row g-0 text-center">
      <div class="tab-content mt-">
        <div class="tab-pane fade show active" id="content-eid-fitr" role="tabpanel">
          <!-- Tab 1 -->
          <div class="row g-0 text-center">

            <div class="col-3">
              <!-- <h2>Filters</h2> -->
              <div class="container">
                <div class="row">
                  Filter By:-
                </div>

                <div class="row">
                  <style>
                    .form-check-input {
                      background-color: transparent;
                    }
                  </style>

                  <div class="col">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                          Excludes
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="col-6">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                          Includes
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <form class=" container w-100 " action="" method="post">

                    <div class="accordion accordion-flush" id="accordionFlushExample" style="background-color: transparent;  border-radius: 0px;">

                      <style>
                        .accordion-button {
                          background-color: transparent;

                          padding: 0.25rem 0.5rem;
                          font-size: 1rem;
                          height: 2.5rem;
                          line-height: 1.5;
                          border-radius: 0px;
                        }

                        .accordion-item {
                          background-color: transparent;
                          border-radius: 0px;
                        }

                        .list-group-item {
                          background-color: transparent;
                          border-radius: 0px;
                          text-align: left;
                        }

                        .form-check-input {
                          background-color: transparent;
                        }

                        .accordion-body {
                          margin: 0%;
                          padding: 0%;
                          width: 100%;
                          border-color: black;
                          border-radius: 0px;
                        }
                      </style>

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
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                                <label class="form-check-label" for="firstCheckbox">First checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                <label class="form-check-label" for="secondCheckbox">Second checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
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
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                                <label class="form-check-label" for="firstCheckbox">First checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                <label class="form-check-label" for="secondCheckbox">Second checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                <label class="form-check-label" for="thirdCheckbox">Third checkbox</label>
                              </li>
                            </ul>

                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Accordion Item #3
                          </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="accordion-body">

                            <ul class="list-group">
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="firstCheckbox">
                                <label class="form-check-label" for="firstCheckbox">First checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="secondCheckbox">
                                <label class="form-check-label" for="secondCheckbox">Second checkbox</label>
                              </li>
                              <li class="list-group-item">
                                <input class="form-check-input me-1" type="checkbox" value="" id="thirdCheckbox">
                                <label class="form-check-label" for="thirdCheckbox">Third checkbox</label>
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
                    <div class="row">
                      <!-- Search and button -->

                      <div class="col-8">
                        <!-- search box -->
                        <style>
                          .form-control {
                            background-color: transparent;
                          }

                          .form-control:focus {
                            background-color: transparent !important;
                          }
                        </style>

                        <div class="container mt-3">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" id="searchField" onfocus="showIcon()" onblur="checkSearchText()">
                            <button class="btn btn-outline-secondary d-none" type="button" id="searchBtn" onclick="performSearch()">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>
                        </div>

                        <script>
                          // Function to show the search icon when the field is clicked
                          function showIcon() {
                            const searchField = document.getElementById("searchField");
                            if (searchField.value.trim() === "") {
                              document.getElementById("searchBtn").classList.remove("d-none");
                            }
                          }

                          // Function to check if something was searched or if the input is empty
                          function checkSearchText() {
                            const searchField = document.getElementById("searchField");
                            const searchText = searchField.value.trim();
                            const searchBtn = document.getElementById("searchBtn");

                            if (searchText === "") {
                              // If the search field is empty, hide the icon
                              searchField.placeholder = "Search";
                              searchBtn.classList.add("d-none");
                            } else {
                              // Keep the placeholder with the searched text if something is there
                              searchField.placeholder = `Searched for: ${searchText}`;
                            }
                          }

                          // Function to handle search action
                          function performSearch() {
                            const searchField = document.getElementById("searchField");
                            const searchText = searchField.value.trim();

                            if (searchText !== "") {
                              // Simulate search action
                              alert(`Searching for: ${searchText}`);
                              searchField.placeholder = `Searched for: ${searchText}`;
                            }
                          }
                        </script>

                        <!-- search box div close -->
                      </div>

                      <div class="col-4">
                        <!-- a button -->
                        <div class="container mt-3">
                          <button type="button" class="btn btn-primary w-100" style="background-color: darkgray;">Primary</button>
                        </div>
                      </div>

                      <!-- Search and button div close -->
                    </div>
                    <div class="row">
                      <!-- Added Filters -->

                      <style>
                        .filter-pill {
                          display: inline-flex;
                          align-items: center;
                          background-color: #e2e6ea;
                          color: #495057;
                          border-radius: 50px;
                          padding: 5px 10px;
                          margin: 2px;
                          font-size: 0.875rem;
                        }

                        .filter-pill .close {
                          margin-left: 8px;
                          cursor: pointer;
                        }

                        .filter-pill.placeholder {
                          background-color: #f8f9fa;
                          color: #6c757d;
                          font-style: italic;
                        }
                      </style>
                      <div class="container">
                        <div class="row">
                          <h3>Added Filters</h3>
                        </div>
                        <div class="row">
                          <div class="container">
                            <div class="row">
                              <!-- Include -->
                              <div class="mb-2">
                                <strong>Included Items:</strong>
                                <div id="includedFilters" class="d-flex flex-wrap border p-2 rounded">
                                  <!-- Placeholder will be added if empty -->
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <!-- Exclude -->
                              <div>
                                <strong>Excluded Items:</strong>
                                <div id="excludedFilters" class="d-flex flex-wrap border p-2 rounded">
                                  <!-- Placeholder will be added if empty -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <script>
                        // Function to update filter displays
                        function updateFilters() {
                          const includedFilters = document.getElementById('includedFilters');
                          const excludedFilters = document.getElementById('excludedFilters');

                          // Clear all filters
                          includedFilters.innerHTML = '';
                          excludedFilters.innerHTML = '';

                          let hasIncluded = false;
                          let hasExcluded = false;

                          document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                            if (checkbox.checked) {
                              const pill = document.createElement('div');
                              pill.className = 'filter-pill';
                              pill.textContent = checkbox.nextElementSibling.textContent; // Use the label's text
                              const closeIcon = document.createElement('span');
                              closeIcon.className = 'close';
                              closeIcon.innerHTML = '&times;';
                              closeIcon.addEventListener('click', function() {
                                pill.remove();
                                checkbox.checked = false;
                                updateFilters(); // Recalculate filters after removal
                              });
                              pill.appendChild(closeIcon);

                              if (document.querySelector('input[name="flexRadioDefault"]:checked').id === 'flexRadioDefault2') { // Includes
                                includedFilters.appendChild(pill);
                                hasIncluded = true;
                              } else { // Excludes
                                excludedFilters.appendChild(pill);
                                hasExcluded = true;
                              }
                            }
                          });

                          // Add placeholder if no items
                          if (!hasIncluded) {
                            const placeholderIncluded = document.createElement('div');
                            placeholderIncluded.textContent = 'Empty';
                            placeholderIncluded.className = 'filter-pill placeholder';
                            includedFilters.appendChild(placeholderIncluded);
                          }

                          if (!hasExcluded) {
                            const placeholderExcluded = document.createElement('div');
                            placeholderExcluded.textContent = 'Empty';
                            placeholderExcluded.className = 'filter-pill placeholder';
                            excludedFilters.appendChild(placeholderExcluded);
                          }
                        }

                        // Attach event listeners to checkboxes
                        document.querySelectorAll('.form-check-input').forEach(function(checkbox) {
                          checkbox.addEventListener('change', updateFilters);
                        });

                        // Attach event listeners to radio buttons
                        document.querySelectorAll('input[name="flexRadioDefault"]').forEach(function(radio) {
                          radio.addEventListener('change', updateFilters);
                        });

                        // Initial update on page load
                        document.addEventListener('DOMContentLoaded', updateFilters);
                      </script>

                      <!-- Added Filters div close -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <!-- Card -->

                  <div class=" row row-cols-1 row-cols-md-3 g-4">

                    <style>
                      .card {
                        background-color: transparent;
                      }
                    </style>

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

                  <div class="row row-cols-1 row-cols-md-3 g-4">
                    <!-- .... -->
                  </div>

                  <!-- Card div close -->
                </div>

              </div>
            </div>

          </div>

        </div>

        <div class="tab-pane fade" id="content-eid-fitr-biryani" role="tabpanel">
          Tab 2
        </div>

      </div>
    </div>
  </div>
</body>

</html>