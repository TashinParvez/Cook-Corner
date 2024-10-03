<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5; /* Light background for contrast */
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .recipe-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 15px;
            width: 300px; /* Fixed width for consistency */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .recipe-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .recipe-title {
            font-size: 1.25rem;
            color: #333;
            margin-bottom: 5px;
        }

        .added-by {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 10px;
        }

        .ratings {
            font-size: 1rem;
            color: #ffbc00;
        }

        .hover-details {
            display: none;
            font-size: 0.85rem;
            color: #666;
            margin-top: 10px;
        }

        .recipe-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .recipe-card:hover .hover-details {
            display: block;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Recipe Collection</h1>
        <div class="card-container">
            <div class="recipe-card">
                <img src="https://via.placeholder.com/300x200" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="recipe-title">Delicious Pasta</h5>
                    <p class="added-by">Added by: Chef Anna</p>
                    <div class="ratings">
                        ★★★☆☆
                    </div>
                    <div class="hover-details">
                        <p><strong>Prep Time:</strong> 10 mins</p>
                        <p><strong>Cook Time:</strong> 20 mins</p>
                        <p><strong>Ingredients:</strong> 8</p>
                    </div>
                </div>
            </div>
            <div class="recipe-card">
                <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="recipe-title">Chocolate Cake</h5>
                    <p class="added-by">Added by: Chef John</p>
                    <div class="ratings">
                        ★★★★☆
                    </div>
                    <div class="hover-details">
                        <p><strong>Prep Time:</strong> 15 mins</p>
                        <p><strong>Cook Time:</strong> 30 mins</p>
                        <p><strong>Ingredients:</strong> 10</p>
                    </div>
                </div>
            </div>
            <!-- You can add more recipe cards here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
