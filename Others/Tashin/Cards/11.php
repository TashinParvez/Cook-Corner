<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .recipe-card {
            width: 100%;
            max-width: 350px;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            background: #fff;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .recipe-card .card-body {
            padding: 20px;
        }

        .recipe-card .card-title {
            font-size: 1.25rem;
            color: #343a40;
            margin-bottom: 10px;
        }

        .recipe-card .added-by {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 10px;
        }

        .recipe-card .ratings {
            color: #ffbc00;
            font-size: 1.2rem;
        }

        /* Hover effect */
        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .hover-details {
            display: none;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #495057;
        }

        .recipe-card:hover .hover-details {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Recipe Card -->
                <div class="recipe-card">
                    <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image">
                    <div class="card-body">
                        <h5 class="card-title">Delicious Pasta</h5>
                        <p class="added-by">Added by: Chef Anna</p>
                        <div class="ratings">
                            <span>&#9733;&#9733;&#9733;&#9734;&#9734;</span> <!-- 3 out of 5 stars -->
                        </div>
                        <!-- Details shown on hover -->
                        <div class="hover-details">
                            <p><strong>Prep Time:</strong> 10 mins</p>
                            <p><strong>Cook Time:</strong> 20 mins</p>
                            <p><strong>Ingredients:</strong> 8</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
