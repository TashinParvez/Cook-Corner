<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
            color: #333; /* Dark text for readability */
        }

        .container {
            margin-left: 280px; /* Adjust for sidebar */
            padding: 2rem;
        }

        .search-bar {
            margin-bottom: 1rem;
        }

        .recipe-card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            padding: 1rem;
            background-color: #fff;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .recipe-card:hover {
            transform: scale(1.02); /* Slightly enlarge card on hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .load-more {
            margin-top: 2rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Include the sidebar -->
        <?php
        include '/Cook-Corner/Admin Panel/Includes/sidebar.php';
        ?>

        <!-- Main content area -->
        <div class="container">
            <h1>Recipe Management</h1>
            <div class="search-bar">
                <input type="text" class="form-control" placeholder="Search Recipes..." aria-label="Search Recipes">
            </div>

            <div class="row">
                <!-- Sample Recipe Cards -->
                <?php for ($i = 1; $i <= 6; $i++): ?>
                    <div class="col-md-4 mb-3">
                        <div class="recipe-card">
                            <h5 class="card-title">Recipe Name <?php echo $i; ?></h5>
                            <p class="card-text">Added by Admin <?php echo $i; ?></p>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>

            <div class="load-more">
                <button class="btn btn-primary">Load More</button>
            </div>
        </div>
    </div>
</body>

</html>
