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
                <p class="card-added-by">Added by: John Doe</p>
                <p class="card-ratings">Ratings: ⭐⭐⭐⭐⭐</p>
                <button class="save-button">Save</button>
            </div>
            <div class="card-hover-details">
                <p>Prep Time: 15 minutes</p>
                <p>Cook Time: 30 minutes</p>
                <p>Ingredients: 5</p>
            </div>
        </div>
    </div>

    
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .card-hover-details {
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

        .card:hover .card-hover-details {
            opacity: 1;
        }
    </style>

    <script>
        const recipeData = {
            title: "Delicious Recipe",
            addedBy: "John Doe",
            ratings: 5,
            prepTime: 15,
            cookTime: 30,
            ingredients: 5,
        };

        const cardTitle = document.querySelector(".card-title");
        cardTitle.textContent = recipeData.title;

        // ... update other elements similarly
    </script>


</body>

</html>