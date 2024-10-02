<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Minimalistic custom CSS -->
    <style>
        body {
            background-color: #f5f5f5;
        }

        .recipe-card {
            transition: transform 0.2s, box-shadow 0.2s;
            background-color: white;
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
        }

        .recipe-card:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .no-recipes {
            text-align: center;
            margin-top: 50px;
        }

        .load-more-btn {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .filter-bar {
            margin-bottom: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
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
        <div class="container p-5" style="margin-left: 280px;">
            <h1>Recipe Management</h1>

            <!-- Search & Filter Bar -->
            <div class="filter-bar row g-2 align-items-center">
                <!-- Search Bar with larger width -->
                <div class="col-md-9">
                    <input type="text" class="form-control" id="searchRecipe" placeholder="Search by recipe name..." onkeyup="searchRecipes()">
                </div>
                <!-- Filter Dropdown -->
                <div class="col-md-3">
                    <select class="form-select" id="filterByUser" onchange="filterRecipes()">
                        <option value="all">Filter by user</option>
                        <option value="user1">User 1</option>
                        <option value="user2">User 2</option>
                        <!-- Add more users as needed -->
                    </select>
                </div>
            </div>

            <!-- Recipe Cards Grid -->
            <div class="row" id="recipeCards">
                <!-- Card example -->
                <div class="col-md-4">
                    <div class="recipe-card">
                        <h5>Chocolate Cake</h5>
                        <p><small>Added by: User 1</small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recipe-card">
                        <h5>Grilled Chicken</h5>
                        <p><small>Added by: User 2</small></p>
                    </div>
                </div>
                <!-- More cards can be dynamically loaded here -->
            </div>

            <!-- No recipes message -->
            <div id="noRecipes" class="no-recipes d-none">
                <p>No recipes found.</p>
            </div>

            <!-- Load More Button -->
            <div class="load-more-btn">
                <button id="loadMoreBtn" class="btn btn-outline-primary" onclick="loadMoreRecipes()">Load More</button>
            </div>
        </div>
    </div>

    <!-- Add JavaScript to handle search, filter, and load more functionality -->
    <script>
        function searchRecipes() {
            let input = document.getElementById('searchRecipe').value.toLowerCase();
            let cards = document.querySelectorAll('.recipe-card');
            let noRecipes = document.getElementById('noRecipes');
            let visibleCards = 0;

            cards.forEach(card => {
                let recipeName = card.querySelector('h5').textContent.toLowerCase();
                if (recipeName.includes(input)) {
                    card.parentElement.style.display = 'block';
                    visibleCards++;
                } else {
                    card.parentElement.style.display = 'none';
                }
            });

            // Show 'no recipes' message if no cards are visible
            noRecipes.classList.toggle('d-none', visibleCards > 0);
        }

        function filterRecipes() {
            let filterValue = document.getElementById('filterByUser').value;
            let cards = document.querySelectorAll('.recipe-card');
            let noRecipes = document.getElementById('noRecipes');
            let visibleCards = 0;

            cards.forEach(card => {
                let addedBy = card.querySelector('p small').textContent.toLowerCase();
                if (filterValue === 'all' || addedBy.includes(filterValue)) {
                    card.parentElement.style.display = 'block';
                    visibleCards++;
                } else {
                    card.parentElement.style.display = 'none';
                }
            });

            // Show 'no recipes' message if no cards are visible
            noRecipes.classList.toggle('d-none', visibleCards > 0);
        }

        function loadMoreRecipes() {
            // Simulate loading more cards (you can fetch more cards via AJAX)
            let newCard = `
            <div class="col-md-4">
                <div class="recipe-card">
                    <h5>Loaded Recipe</h5>
                    <p><small>Added by: User 3</small></p>
                </div>
            </div>
            `;
            document.getElementById('recipeCards').innerHTML += newCard;
        }
    </script>

</body>

</html>
