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

</head>


<body>
    <div class="container">


        <div class="card">
            <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image">
            <div class="card-content">
                <h3 class="card-title">Delicious Recipe</h3>
                <p class="card-author">By: John Doe</p>
                <div class="card-rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                </div>
            </div>
            <div class="card-details">
                <ul>
                    <li>Prep Time: 15 mins</li>
                    <li>Cook Time: 30 mins</li>
                    <li>Servings: 4</li>
                </ul>
            </div>
        </div>
    </div>

    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }

        .card-content {
            padding: 15px;
        }

        .card-rating {
            color: gold;
        }

        .card-details {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .card:hover .card-details {
            opacity: 1;
        }
    </style>

    <script>
        const recipeData = {
            // ... recipe data
        };

        const cardTitle = document.querySelector(".card-title");
        cardTitle.textContent = recipeData.title;

        // ... update other elements similarly
    </script>




</body>

</html>