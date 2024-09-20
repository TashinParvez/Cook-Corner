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
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="CSS/pagination.css">
    <link rel="stylesheet" href="CSS/filterPageOfOneCategory.css">

</head>


<body>



    <div class="filter-section">
        <p class="filter-title">FILTER BY:</p>

        <div class="filter-category" data-bs-toggle="collapse" data-bs-target="#mealFilters" role="button" aria-expanded="false" aria-controls="mealFilters">
            <span>Meal</span>
            <span id="mealIcon">+</span>
        </div>
        <div class="collapse" id="mealFilters">
            <div class="filter-option ms-3">
                <input type="checkbox" id="breakfast" class="form-check-input">
                <label for="breakfast" class="form-check-label">Breakfast</label>
            </div>
            <div class="filter-option ms-3">
                <input type="checkbox" id="dinner" class="form-check-input">
                <label for="dinner" class="form-check-label">Dinner</label>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Select all collapsible sections
            const collapses = document.querySelectorAll('.collapse');

            collapses.forEach(collapse => {
                const icon = collapse.previousElementSibling.querySelector('span:last-child');

                collapse.addEventListener('shown.bs.collapse', function() {
                    icon.innerHTML = '-';
                });

                collapse.addEventListener('hidden.bs.collapse', function() {
                    icon.innerHTML = '+';
                });
            });
        });
    </script>





</body>

</html>