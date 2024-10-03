<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Recipe Card</title>

    <style>
        /* styles.css */
        body {
            background-color: #f8f9fa;
        }

        .recipe-card {
            position: relative;
            margin: 20px;
            border: none;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .recipe-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .card-hover-info {
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.8);
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .recipe-card:hover .card-hover-info {
            display: block;
        }

        .save-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: white;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            padding: 5px;
            transition: background-color 0.3s;
        }

        .save-icon:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card recipe-card">
            <img src="/Images/Kitchen-Tips/batch_cooking.jpg" class="card-img-top" alt="Recipe Image">
            <div class="card-body">
                <h5 class="card-title">Delicious Recipe</h5>
                <p class="card-text">Added by: <span class="added-by">Chef John</span></p>
                <p class="card-text">Rating: <span class="ratings">⭐⭐⭐⭐⭐</span></p>
                <div class="save-icon">
                    <i class="fa fa-save"></i>
                </div>
            </div>
            <div class="card-hover-info">
                <p>Prep Time: 15 min</p>
                <p>Cook Time: 30 min</p>
                <p>Ingredients: 5</p>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        // script.js
        document.querySelector('.save-icon').addEventListener('click', function() {
            alert('Recipe saved!');
        });
    </script>
</body>

</html>