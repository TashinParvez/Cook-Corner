<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load More Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Additional styling (optional) */
        .item {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <h3>Recipes</h3>
        <div class="row" id="recipeContainer">
            <!-- Recipe items will be inserted here -->
        </div>
        <button id="loadMore" class="btn btn-primary mt-3">Load More</button>
    </div>

    <script>
        // Sample recipe data
        const recipes = [];
        for (let i = 1; i <= 100; i++) {
            recipes.push(`Recipe Item ${i}`);
        }

        let currentIndex = 0; // To keep track of the number of items shown
        const itemsPerPage = 12; // Number of items to show per click

        // Function to load items
        function loadItems() {
            const recipeContainer = document.getElementById("recipeContainer");

            // Determine the end index for slicing the recipes array
            const endIndex = currentIndex + itemsPerPage;

            // Get the slice of recipes to display
            const itemsToShow = recipes.slice(currentIndex, endIndex);

            // Append items to the container
            itemsToShow.forEach(recipe => {
                const itemDiv = document.createElement("div");
                itemDiv.classList.add("col-md-4", "item");
                itemDiv.textContent = recipe;
                recipeContainer.appendChild(itemDiv);
            });

            // Update the current index
            currentIndex += itemsPerPage;

            // Disable button if no more items to show
            if (currentIndex >= recipes.length) {
                document.getElementById("loadMore").disabled = true;
                document.getElementById("loadMore").textContent = "No more items to load";
            }
        }

        // Initial load of items
        loadItems();

        // Load more items on button click
        document.getElementById("loadMore").addEventListener("click", loadItems);
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>