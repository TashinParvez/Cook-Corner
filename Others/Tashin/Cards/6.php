<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .recipe-card {
            position: relative;
            margin: 20px;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .save-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            padding: 5px;
            transition: background 0.3s;
        }

        .save-icon:hover {
            background: rgba(255, 255, 255, 1);
        }

        .card-body {
            text-align: left;
        }

        .card-title {
            font-weight: bold;
        }

        .card-footer {
            background: #f8f9fa;
            padding: 10px;
            border-top: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
        }

        .prep-time,
        .cook-time,
        .ingredients {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card recipe-card">
                    <img src="/Images/Kitchen-Tips/batch_cooking.jpg" class="card-img-top" alt="Recipe Image">
                    <div class="save-icon">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Recipe Title</h5>
                        <p class="card-text">Added by: Chef John</p>
                        <p class="card-text">Rating: ★★★★☆</p>
                    </div>
                    <div class="card-footer">
                        <div class="prep-time">Prep Time: 15 mins</div>
                        <div class="cook-time">Cook Time: 30 mins</div>
                        <div class="ingredients">Ingredients: 5</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>