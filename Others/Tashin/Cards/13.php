<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Card</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
            margin: 20px;
        }
        .card img {
            width: 100%;
            height: auto;
        }
        .card-title {
            font-size: 1.5rem;
        }
        .card-body {
            background-color: #fff;
        }
        .card-hover-details {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.8);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 15px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card:hover .card-hover-details {
            opacity: 1;
        }
        .ratings {
            color: #f39c12;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="/Images/Kitchen-Tips/batch_cooking.jpg" alt="Recipe Image">
                    <div class="card-body">
                        <h5 class="card-title">Delicious Pasta</h5>
                        <p class="card-text">Added by: Chef John</p>
                        <p class="ratings">⭐⭐⭐⭐☆</p>
                    </div>
                    <div class="card-hover-details">
                        <h6>Recipe Details</h6>
                        <p>Prep Time: 15 min</p>
                        <p>Cook Time: 30 min</p>
                        <p>Servings: 4</p>
                    </div>
                </div>
            </div>
            <!-- Add more cards here -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
