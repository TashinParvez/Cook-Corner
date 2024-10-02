<?php

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");


$sql = "SELECT ingredient_name FROM `ingredient_info`";
$resultantLabel = mysqli_query($conn, $sql);   // Get query result

$allingredents = [];  // Initialize an empty array

// Fetch data from the query result
while ($row = mysqli_fetch_assoc($resultantLabel)) {
    $allingredents[] = $row['ingredient_name'];
}

mysqli_free_result($resultantLabel);
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <style>
        #add-ingredient {
            margin-top: 10px;
        }

        .suggestion-list {
            position: absolute;
            width: 100%;
            border: 1px solid #ccc;
            background-color: white;
            /* Set background to white */
            max-height: 150px;
            /* Set max height for dropdown */
            overflow-y: auto;
            /* Enable scrolling if needed */
            z-index: 1000;
        }

        .suggestion-item {
            padding: 10px;
            cursor: pointer;
        }

        .suggestion-item.highlight {
            background-color: #f0f0f0;
            /* Background color for highlighted suggestion */
        }

        .highlighted-text {
            color: red;
            /* Set matched text to red */
        }
    </style>

</head>

<body>

    <div class="container mt-4">
        <div class="form-group position-relative">
            <h4>Ingredients</h4>
            <p>
                Enter one ingredient per line. Include the quantity (i.e. cups, tablespoons) and any special preparation
                (i.e. sifted, softened, chopped). Use optional headers to organize the different parts of the recipe (i.e. Cake, Frosting, Dressing).
            </p>

            <!-- Ingredient row -->
            <div class="row mb-2 ingredient-row">
                <!-- Name input with suggestions -->
                <div class="col-md-4 position-relative">
                    <input type="text" class="form-control ingredient-name" placeholder="Ingredient name (e.g., flour, sifted)" autocomplete="off" />
                    <!-- Suggestions will appear here -->
                    <div class="suggestion-list"></div>
                </div>

                <!-- Quantity input -->
                <div class="col-md-3">
                    <input type="number" class="form-control" placeholder="Quantity">
                </div>

                <!-- Unit dropdown -->
                <div class="col-md-3">
                    <select class="form-control">
                        <option value="" disabled selected>Select unit</option>
                        <option value="Kilograms">Kilograms (kg)</option>
                        <option value="Grams">Grams (g)</option>
                        <option value="Liter">Liter</option>
                        <option value="Milliliters">Milliliters (ml)</option>
                        <option value="Pounds">Pounds (lbs)</option>
                        <option value="Pieces">Pieces (pcs)</option>
                        <option value="Tablespoon">Tablespoon</option>
                        <option value="Teaspoon">Teaspoon</option>
                        <option value="Ounce">Ounce</option>
                        <option value="Cups">Cups</option>
                    </select>
                </div>

                <!-- Remove button -->
                <div class="col-md-1">
                    <button type="button" class="btn btn-danger remove-btn">&times;</button>
                </div>
            </div>

            <!-- Add Ingredient Button -->
            <button type="button" class="btn btn-outline-primary" id="add-ingredient">+ Add Ingredient</button>
        </div>
    </div>

    <!--  -------------------- for Ingredients -------------- -->
    <script>
        let allIngredients = <?php echo json_encode($allingredents); ?>;

        document.querySelectorAll('.ingredient-name').forEach(function(inputField) {
            // Handle input event
            inputField.addEventListener('input', function() {
                const value = this.value.toLowerCase();
                const suggestionList = this.nextElementSibling;
                suggestionList.innerHTML = ''; // Clear previous suggestions

                if (value) {
                    const filteredIngredients = allIngredients.filter(ingredient => ingredient.toLowerCase().includes(value));

                    filteredIngredients.forEach(ingredient => {
                        const highlightedIngredient = highlightMatchingChars(value, ingredient);
                        const suggestionItem = document.createElement('div');
                        suggestionItem.className = 'suggestion-item';
                        suggestionItem.innerHTML = highlightedIngredient;

                        suggestionItem.addEventListener('click', () => {
                            this.value = ingredient; // Set input to clicked suggestion
                            suggestionList.innerHTML = ''; // Clear suggestions
                        });

                        suggestionList.appendChild(suggestionItem);
                    });
                }
            });

            // Handle Enter key press to select the first suggestion
            inputField.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') {
                    const suggestionList = this.nextElementSibling;
                    if (suggestionList.firstChild) {
                        this.value = suggestionList.firstChild.textContent; // Set input to the first suggestion
                        suggestionList.innerHTML = ''; // Clear suggestions
                    }
                }
            });
        });

        // Function to highlight matching characters
        function highlightMatchingChars(input, ingredient) {
            const regex = new RegExp(`(${input})`, 'gi');
            return ingredient.replace(regex, '<span class="highlighted-text">$1</span>'); // Change color of matched chars
        }

        // Function to add new ingredient row
        document.getElementById('add-ingredient').addEventListener('click', function() {
            const newRow = document.querySelector('.ingredient-row').cloneNode(true);
            newRow.querySelectorAll('input').forEach(input => input.value = ''); // Reset input values
            document.querySelector('.form-group').insertBefore(newRow, this);

            // Re-attach event listener to the new remove button
            newRow.querySelector('.remove-btn').addEventListener('click', function() {
                this.closest('.row').remove();
            });

            // Re-attach event listener to new input field
            newRow.querySelector('.ingredient-name').addEventListener('input', function() {
                const value = this.value.toLowerCase();
                const suggestionList = this.nextElementSibling;
                suggestionList.innerHTML = ''; // Clear previous suggestions

                if (value) {
                    const filteredIngredients = allIngredients.filter(ingredient => ingredient.toLowerCase().includes(value));

                    filteredIngredients.forEach(ingredient => {
                        const highlightedIngredient = highlightMatchingChars(value, ingredient);
                        const suggestionItem = document.createElement('div');
                        suggestionItem.className = 'suggestion-item';
                        suggestionItem.innerHTML = highlightedIngredient;

                        suggestionItem.addEventListener('click', () => {
                            this.value = ingredient; // Set input to clicked suggestion
                            suggestionList.innerHTML = ''; // Clear suggestions
                        });

                        suggestionList.appendChild(suggestionItem);
                    });
                }
            });
        });

        // Function to remove ingredient row
        document.querySelectorAll('.remove-btn').forEach(function(button) {
            button.addEventListener('click', function() {
                this.closest('.row').remove();
            });
        });
    </script>

</body>

</html>