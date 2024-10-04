<?php

include('../Includes/Navbar/navbarMain.php');  // tashin
// echo $user_id;

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");


// .....................___________---------- For Adding a Recipe ----------___________ ...............

// Single Inputs
$title = $sub_title = $image = $description = $prep_time = $cook_time = $servings = $difficulty_level = $story_or_learn = '';

// 1D Inputs ('$tags' in different table)
$directions = $tags = $cities = '';

// 2D Inputs ('$ingredients' & '$dishes' in different table)
$ingredients = $dishes = $notes = '';


if (isset($_POST['submit_recipe'])) {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {

        $tempname = $_FILES['image']['tmp_name'];

        $file_name = $_FILES['image']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_base_name = pathinfo($file_name, PATHINFO_FILENAME);

        $upload_dir = '../../Images/Recipe-Images/';
        // $upload_dir = 'D:\All UIU Materials\8th Trimester\SAD Lab\Project\Cook-Corner\Images\Recipe-Images\\';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $counter = 0;
        $target_file = $upload_dir . $file_base_name . '.' . $file_ext;

        while (file_exists($target_file)) {
            $counter++;
            $new_file_name = $file_base_name . "($counter)" . '.' . $file_ext;
            $target_file = $upload_dir . $new_file_name;
        }

        // Now move the file to the target directory with the new unique file name
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image = isset($new_file_name) ? $new_file_name : $file_base_name . '.' . $file_ext;
        } else {
            echo "There was an error uploading the file.";
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
    }


    // Single Inputs
    $title = $_POST['title'] ?? '';
    $sub_title = $_POST['sub_title'] ?? '';

    $image = isset($image) ?? '';

    $description = $_POST['description'] ?? '';

    $prep_time = $_POST['prep_time'] ?? '';
    $cook_time = $_POST['cook_time'] ?? '';
    $servings = $_POST['servings'] ?? '';
    $difficulty_level = $_POST['difficulty_level'] ?? '';

    $story_or_learn = $_POST['story_or_learn'] ?? '';

    // 1D Inputs ('$tags' in different table) Split text doesn't include
    $directions = $_POST['directions'] ?? [];
    $directions = implode('<splitForDirection>', array_map('trim', $directions));

    $cities = $_POST['cities'] ?? [];
    $tags = $_POST['tags'] ?? [];

    // 2D Inputs ('$ingredients' & '$dishes' in different table) working
    $notes = $_POST['notes'] ?? [];

    if (!empty($notes)) {

        $tempNotes = [];
        foreach ($notes as $note) {

            $tempNotes[] = implode('<separatorForTitleAndDescription>', array_map('trim', $note));
        }

        $notes = implode('<separatorForEachNote>', array_map('trim', $tempNotes));
    }

    $ingredients = $_POST['ingredients'] ?? [];

    $dishes = $_POST['dishes'] ?? [];

    $stmt = $conn->prepare('SELECT CASE 
                                    WHEN designation IS NULL THEN 0
                                    ELSE 1
                            END AS chef_status
                            FROM user_info WHERE id = ?;');
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->bind_result($chef_status);
    $stmt->fetch();
    $stmt->close();

    if ($chef_status == 1) {

        // get the 'level' by 'level_name' from the 'skill_level' table
        $stmt = $conn->prepare('SELECT level FROM skill_level WHERE level_name = ?');
        $stmt->bind_param('s', $difficulty_level);
        $stmt->execute();
        $stmt->bind_result($difficulty_level);
        $stmt->fetch();
        $stmt->close();

        $stmt = $conn->prepare('INSERT INTO recipe_info
                    (title, subtitle, image, description, prep_time, cook_time, servings, skill_level, how_you_learn_or_story, directions, notes, author) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $stmt->bind_param(
            'ssssssssssss',
            $title,
            $sub_title,
            $image,
            $description,
            $prepTime,
            $cookTime,
            $servings, // for how many person
            $difficulty_level,
            $story_or_learn,
            $directions,
            $notes,
            $user_id
        );


        if ($stmt->execute()) {

            $recipe_id = $conn->insert_id; // recipe_id after inserting into recipe_info
            $stmt->close();

            $flag = true;
            foreach ($ingredients as $ingredient) {

                $ingredient_name = trim($ingredient['name']);
                $quantity = $ingredient['quantity'];
                $unit_of_measurement = trim($ingredient['unit']);

                //Check if the ingredient already exists in the 'ingredient_info' table
                $stmt = $conn->prepare('SELECT ingredient_id FROM ingredient_info WHERE ingredient_name = ?');
                $stmt->bind_param('s', $ingredient_name);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    // If the ingredient exists, fetch the ingredient_id
                    $stmt->bind_result($ingredient_id);
                    $stmt->fetch();
                } else {
                    // If the ingredient does not exist, insert it and get the new ingredient_id
                    $stmt_insert = $conn->prepare('INSERT INTO ingredient_info (ingredient_name) VALUES (?)');
                    $stmt_insert->bind_param('s', $ingredient_name);
                    $stmt_insert->execute();
                    $ingredient_id = $conn->insert_id;  // Get the inserted ingredient_id
                    $stmt_insert->close();
                }

                $stmt->close();

                // Insert into junction_recipe_ingredients (ingredient_id, recipe_id, quantity, unit_of_measurement)
                $stmt_junction = $conn->prepare('INSERT INTO junction_recipe_ingredients (ingredient_id, recipe_id, quantity, unit_of_measurement) VALUES (?, ?, ?, ?)');
                $stmt_junction->bind_param('iiis', $ingredient_id, $recipe_id, $quantity, $unit_of_measurement);

                if (!$stmt_junction->execute()) {

                    $flag = false;
                    echo "Error executing query (Ingredients): " . $stmt_junction->error;
                }

                $stmt_junction->close();
            }

            if ($flag) {

                foreach ($dishes as $dish) {

                    $dish_name = trim($dish['name']);
                    $quantity = $dish['quantity'];

                    // Check if the dish already exists in the 'dishes' table
                    $stmt = $conn->prepare('SELECT dish_id FROM dishes WHERE dish_name = ?');
                    $stmt->bind_param('s', $dish_name);
                    $stmt->execute();
                    $stmt->store_result();

                    if ($stmt->num_rows > 0) {

                        // If dish exists, fetch the dish_id
                        $stmt->bind_result($dish_id);
                        $stmt->fetch();
                    } else {
                        // Step 2: If the dish does not exist, insert it and get the new dish_id
                        $stmt_insert = $conn->prepare('INSERT INTO dishes (dish_name) VALUES (?)');
                        $stmt_insert->bind_param('s', $dish_name);
                        $stmt_insert->execute();
                        $dish_id = $conn->insert_id;  // Get the inserted dish_id
                        $stmt_insert->close();
                    }

                    $stmt->close();

                    // Insert into junction_dishes_used_in_recipe (dish_id, recipe_id, quantity)
                    $stmt_junction = $conn->prepare('INSERT INTO junction_dishes_used_in_recipe (dish_id, recipe_id, quantity) VALUES (?, ?, ?)');
                    $stmt_junction->bind_param('iii', $dish_id, $recipe_id, $quantity);

                    if (!$stmt_junction->execute()) {

                        $flag = false;
                        echo "Error executing query (Dishes): " . $stmt_junction->error;
                    }

                    $stmt_junction->close();
                }

                if ($flag) {

                    if (!empty($tags)) {

                        foreach ($tags as $tag) {

                            $tag = trim($tag);

                            // Check if the tag already exists in the 'tags' table
                            $checkTagStmt = $conn->prepare('SELECT id FROM tags WHERE tag_name = ?');
                            $checkTagStmt->bind_param('s', $tag);
                            $checkTagStmt->execute();
                            $checkTagStmt->store_result();

                            if ($checkTagStmt->num_rows > 0) {
                                // Tag exists, get the tag ID
                                $checkTagStmt->bind_result($tag_id);
                                $checkTagStmt->fetch();
                            } else {
                                // Insert new tag into the 'tags' table and retrieve the new tag ID
                                $insertTagStmt = $conn->prepare('INSERT INTO tags (tag_name) VALUES (?)');
                                $insertTagStmt->bind_param('s', $tag);
                                $insertTagStmt->execute();
                                $tag_id = $conn->insert_id; // Get the newly created tag ID
                                $insertTagStmt->close();
                            }

                            $checkTagStmt->close();

                            // Insert the relationship into the 'recipe_tags' table
                            $insertRecipeTagStmt = $conn->prepare('INSERT INTO recipe_tags (tag_id, recipe_id) VALUES (?, ?)');
                            $insertRecipeTagStmt->bind_param('ii', $tag_id, $recipe_id);

                            if (!$insertRecipeTagStmt->execute()) {

                                $flag = false;
                                echo "Error executing query (Tags): " . $stmt_junction->error;
                            }

                            $insertRecipeTagStmt->close();
                        }
                    }

                    if ($flag) {

                        foreach ($cities as $city_name) {

                            $city_name = trim($city_name);

                            // Check if the city exists
                            $stmt_check_city = $conn->prepare('SELECT city_id FROM cities WHERE city_name = ?');
                            $stmt_check_city->bind_param('s', $city_name);
                            $stmt_check_city->execute();
                            $stmt_check_city->store_result();

                            if ($stmt_check_city->num_rows > 0) {
                                // City exists, retrieve city_id
                                $stmt_check_city->bind_result($city_id);
                                $stmt_check_city->fetch();
                            } else {
                                // City does not exist, insert it
                                $stmt_insert_city = $conn->prepare('INSERT INTO cities (city_name) VALUES (?)');
                                $stmt_insert_city->bind_param('s', $city_name);
                                $stmt_insert_city->execute();
                                $city_id = $stmt_insert_city->insert_id;
                                $stmt_insert_city->close();
                            }

                            $stmt_check_city->close();

                            // insert city_id and recipe_id into the recipe_cities table
                            $stmt_recipe_cities = $conn->prepare('INSERT INTO recipe_cities (city_id, recipe_id) VALUES (?, ?)');
                            $stmt_recipe_cities->bind_param('ii', $city_id, $recipe_id);

                            if (!$stmt_recipe_cities->execute()) {

                                $flag = false;
                                echo "Error executing query (Cities): " . $stmt_junction->error;
                            }

                            $stmt_recipe_cities->close();
                        }

                        if ($flag) {

                            mysqli_close($conn);

                            header('Location: addRecipe.php');
                            exit();
                        } else {

                            echo 'Error executing cities';
                        }
                    } else {

                        echo 'Error executing tags';
                    }
                } else {

                    echo 'Error executing dishes';
                }
            } else {

                echo 'Error executing ingredients';
            }
        } else {

            echo "Error executing query(Single Inputs): " . $stmt->error;
            $stmt->close();
        }
    } else {
        echo 'Only chef can add a recipe!';
    }

    //........................***********.............
    // Store $ingredients in the database as plain text (without altering line breaks)

    // When retrieving from the database, apply nl2br before displaying
    // $storedIngredients = nl2br(htmlspecialchars($storedIngredientsFromDb));
    //......................................................
}

// .....................___________---------- *************----------___________ ...............



// .....................___________---------- For Suggestions----------___________ ...............

// -------------------------- For ingredent suggestion -------------------------
$sql = "SELECT ingredient_name FROM `ingredient_info`";
$resultantLabel = mysqli_query($conn, $sql);

$allingredents = [];

while ($row = mysqli_fetch_assoc($resultantLabel)) {
    $allingredents[] = $row['ingredient_name'];
}


// -------------------------- For tag suggestion -------------------------
$sql = "SELECT tag_name FROM `tags` WHERE 1;";
$result = mysqli_query($conn, $sql);

$allTage = [];

while ($row = mysqli_fetch_assoc($result)) {
    $allTage[] = $row['tag_name'];
}

// -------------------------- For City suggestion -------------------------
$sql = "SELECT city_name FROM `cities` WHERE 1";
$result = mysqli_query($conn, $sql);

$allCities = [];

while ($row = mysqli_fetch_assoc($result)) {
    $allCities[] = $row['city_name'];
}

// .....................___________---------- *************----------___________ ...............


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />


    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="ingredent-sugg.css"> <!-- ingredent CSS -->
    <link rel="stylesheet" href="tags.css"> <!-- tag CSS -->
    <link rel="stylesheet" href="dish.css"> <!-- dish CSS -->

    <!-- javascript -->
    <!-- <script src="addRecipe.js"></script> -->

</head>

<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <div class="container my-5">
        <h1 class="text-center text-danger mb-4">Add Recipe</h1>
        <p class="text-center">Uploading personal recipes is easy! Add yours to your favorites, share with friends, family, or the community.</p>

        <form id="recipeForm" class="p-4 border bg-light rounded" action="addRecipe.php" method="post" enctype="multipart/form-data">

            <!-- Recipe Title -->
            <div class="mb-3">
                <label for="title" class="form-label">Recipe Title<small style="color: red;">*</small></label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Give your recipe a title"
                    value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            <hr>
            <!-- Recipe SubTitle -->
            <div class="mb-3">
                <label for="sub_title" class="form-label">Subtitle(Optional)</label>
                <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Give your recipe a sub title"
                    value="<?php echo htmlspecialchars($sub_title); ?>">
            </div>
            <hr>

            <!-- Photo Upload -->
            <div class="mb-3 row">
                <label for="image" class="form-label">Photo<small style="color: red;">*</small></label>
                <div class="col-md-6">
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                </div>
                <small class="text-muted mt-2">Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</small>
            </div>
            <hr>
            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description<small style="color: red;">*</small></label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Share the story behind your recipe and what makes it special"
                    required><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <hr>

            <!-- Ingredients Section -->




            <div class="container mt-4">
                <div class="form-group position-relative">
                    <h4 class="text-start">Ingredients</h4>
                    <small class="text-muted text-start">
                        Enter ingredients with quantity and preparation instructions (e.g., '2 cups flour, sifted', '1 tablespoon butter, softened'). Use headers like 'Cake' or 'Frosting' to separate parts.
                    </small>

                    <!-- Ingredient rows container -->
                    <div id="ingredient-rows">
                        <?php if (!empty($ingredients)) : ?>
                            <?php foreach ($ingredients as $index => $ingredient) : ?>
                                <div class="row mb-2 ingredient-row">
                                    <div class="col-md-4 position-relative">
                                        <input type="text" name="ingredients[<?php echo $index; ?>][name]" class="form-control ingredient-name" placeholder="Ingredient name (e.g., flour, sifted)" autocomplete="off" value="<?php echo htmlspecialchars($ingredient['name']); ?>" required />
                                        <div class="suggestion-list"></div>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="ingredients[<?php echo $index; ?>][quantity]" class="form-control" placeholder="Quantity" value="<?php echo htmlspecialchars($ingredient['quantity']); ?>" required>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="ingredients[<?php echo $index; ?>][unit]" class="form-control">
                                            <option value="" disabled <?php echo empty($ingredient['unit']) ? 'selected' : ''; ?>>Select unit</option>
                                            <option value="Kilograms" <?php echo ($ingredient['unit'] == 'Kilograms') ? 'selected' : ''; ?>>Kilograms (kg)</option>
                                            <option value="Grams" <?php echo ($ingredient['unit'] == 'Grams') ? 'selected' : ''; ?>>Grams (g)</option>
                                            <option value="Liter" <?php echo ($ingredient['unit'] == 'Liter') ? 'selected' : ''; ?>>Liter</option>
                                            <option value="Milliliters" <?php echo ($ingredient['unit'] == 'Milliliters') ? 'selected' : ''; ?>>Milliliters (ml)</option>
                                            <option value="Pounds" <?php echo ($ingredient['unit'] == 'Pounds') ? 'selected' : ''; ?>>Pounds (lbs)</option>
                                            <option value="Pieces" <?php echo ($ingredient['unit'] == 'Pieces') ? 'selected' : ''; ?>>Pieces (pcs)</option>
                                            <option value="Tablespoon" <?php echo ($ingredient['unit'] == 'Tablespoon') ? 'selected' : ''; ?>>Tablespoon</option>
                                            <option value="Teaspoon" <?php echo ($ingredient['unit'] == 'Teaspoon') ? 'selected' : ''; ?>>Teaspoon</option>
                                            <option value="Ounce" <?php echo ($ingredient['unit'] == 'Ounce') ? 'selected' : ''; ?>>Ounce</option>
                                            <option value="Cups" <?php echo ($ingredient['unit'] == 'Cups') ? 'selected' : ''; ?>>Cups</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-danger remove-btn">&times;</button>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <!-- Placeholder for new ingredient input -->
                            <div class="row mb-2 ingredient-row">
                                <div class="col-md-4 position-relative">
                                    <input type="text" name="ingredients[0][name]" class="form-control ingredient-name" placeholder="Ingredient name (e.g., flour, sifted)" autocomplete="off" required />
                                    <div class="suggestion-list"></div>
                                </div>
                                <div class="col-md-3">
                                    <input type="number" name="ingredients[0][quantity]" class="form-control" placeholder="Quantity" required>
                                </div>
                                <div class="col-md-3">
                                    <select name="ingredients[0][unit]" class="form-control">
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
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-danger remove-btn">&times;</button>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Add Ingredient Button -->
                    <button type="button" class="btn btn-outline-primary" id="add-ingredient">+ Add Ingredient</button>
                </div>
            </div>

            <!-- JavaScript for handling ingredients -->
            <script>
                let allIngredients = <?php echo json_encode($allingredents); ?>;

                // Function to handle ingredient suggestions
                function attachIngredientNameListener(inputField) {
                    inputField.addEventListener('input', function() {
                        const value = this.value.toLowerCase();
                        const suggestionList = this.nextElementSibling;
                        suggestionList.innerHTML = ''; // Clear previous suggestions

                        if (value) {
                            const filteredIngredients = allIngredients.filter(ingredient => ingredient.toLowerCase().includes(value));

                            filteredIngredients.forEach(ingredient => {
                                const suggestionItem = document.createElement('div');
                                suggestionItem.className = 'suggestion-item';
                                suggestionItem.textContent = ingredient;

                                suggestionItem.addEventListener('click', () => {
                                    this.value = ingredient; // Set input to clicked suggestion
                                    suggestionList.innerHTML = ''; // Clear suggestions
                                });

                                suggestionList.appendChild(suggestionItem);
                            });
                        }
                    });
                }

                // Attach listeners to existing ingredient fields
                document.querySelectorAll('.ingredient-name').forEach(attachIngredientNameListener);

                // Add new ingredient row
                document.getElementById('add-ingredient').addEventListener('click', function() {
                    const rows = document.querySelectorAll('.ingredient-row');
                    const newIndex = rows.length; // Get new index based on the number of existing rows

                    const newRow = document.createElement('div');
                    newRow.className = 'row mb-2 ingredient-row';
                    newRow.innerHTML = `
            <div class="col-md-4 position-relative">
                <input type="text" name="ingredients[${newIndex}][name]" class="form-control ingredient-name" placeholder="Ingredient name (e.g., flour, sifted)" autocomplete="off" required />
                <div class="suggestion-list"></div>
            </div>
            <div class="col-md-3">
                <input type="number" name="ingredients[${newIndex}][quantity]" class="form-control" placeholder="Quantity" required>
            </div>
            <div class="col-md-3">
                <select name="ingredients[${newIndex}][unit]" class="form-control">
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
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-btn">&times;</button>
            </div>
        `;

                    // Append the new row
                    document.getElementById('ingredient-rows').appendChild(newRow);

                    // Attach listeners to the new fields
                    attachIngredientNameListener(newRow.querySelector('.ingredient-name'));

                    // Attach remove button functionality
                    newRow.querySelector('.remove-btn').addEventListener('click', function() {
                        newRow.remove();
                    });
                });

                // Remove ingredient row functionality
                document.querySelectorAll('.remove-btn').forEach(function(button) {
                    button.addEventListener('click', function() {
                        this.closest('.row').remove();
                    });
                });
            </script>

            <hr>

            <!-- Dish add Section -->

            <div class="container mt-3">
                <h3 class="text-danger">Dishes you need</h3>
                <p>Enter one ingredient per line. Include the quantity (i.e. cups, tablespoons) and any special preparation (i.e. sifted, softened, chopped). Use optional headers to organize the different parts of the recipe (i.e. Cake, Frosting, Dressing).</p>

                <div id="dishes-list">
                    <?php
                    if (!empty($dishes)) {
                        foreach ($dishes as $index => $dish) {
                    ?>
                            <div class="dish-container">
                                <input type="text" name="dishes[<?php echo $index; ?>][name]" placeholder="Dish name" class="form-control" value="<?php echo htmlspecialchars($dish['name']); ?>" required />
                                <input type="number" name="dishes[<?php echo $index; ?>][quantity]" placeholder="Quantity" class="form-control" value="<?php echo htmlspecialchars($dish['quantity']); ?>" required />
                                <button class="remove-btn" onclick="removeDish(this)">✖</button>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

                <button id="add-dish" class="btn btn-primary add-dish-btn">+ ADD Dishes</button>
            </div>

            <script>
                let dishCount = 0; // Initialize count with existing dishes

                // Function to create a new dish input
                function createDishInput() {
                    dishCount++;
                    const dishContainer = document.createElement('div');
                    dishContainer.className = 'dish-container';

                    dishContainer.innerHTML = `
            <input type="text" name="dishes[${dishCount}][name]" placeholder="Dish name" class="form-control" required />
            <input type="number" name="dishes[${dishCount}][quantity]" placeholder="Quantity" class="form-control" required />
            <button class="remove-btn" onclick="removeDish(this)">✖</button>
        `;

                    document.getElementById('dishes-list').appendChild(dishContainer);
                    toggleAddButton();


                }

                // Function to remove a dish input
                function removeDish(button) {
                    const dishContainer = button.parentElement;
                    dishContainer.remove();
                    dishCount--;
                    toggleAddButton();
                }

                // // Function to toggle the Add Dish button
                // function toggleAddButton() {
                //     const addButton = document.getElementById('add-dish');
                //     addButton.disabled = dishCount <= 0; // Disable button if there are no dishes
                // }

                // Add event listener to Add Dish button
                document.getElementById('add-dish').addEventListener('click', function(event) {
                    event.preventDefault();
                    createDishInput();
                });
            </script>

            <hr>

            <!-- Directions Section -->

            <div class="mb-3">
                <label class="form-label">Directions<small style="color: red;">*</small></label>
                <div id="directionsList" class="mb-2">
                    <?php
                    $directions = array_map('trim', explode('<splitForDirection>', $directions));

                    if (!empty($directions)) {
                        foreach ($directions as $direction) {
                    ?>
                            <input type="text" name="directions[]" class="form-control mb-2" placeholder="Step" value="<?php echo htmlspecialchars($direction); ?>" required>
                        <?php
                        }
                    } else {
                        ?>
                        <input type="text" name="directions[]" class="form-control mb-2" placeholder="Step 1" required>
                    <?php
                    }
                    ?>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addStep">+ Add Step</button>
            </div>

            <script>
                // Function to create a new step input
                function createStepInput() {
                    const directionsList = document.getElementById('directionsList');
                    const stepInput = document.createElement('input');

                    stepInput.type = 'text';
                    stepInput.name = 'directions[]';
                    stepInput.className = 'form-control mb-2';
                    stepInput.placeholder = 'Step';
                    stepInput.required = true;

                    directionsList.appendChild(stepInput);
                }

                // Add event listener to Add Step button
                document.getElementById('addStep').addEventListener('click', createStepInput);
            </script>
            <hr>

            <!-- Time Section -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prep_time" class="form-label">Prep Time (min)<small style="color: red;">*</small></label>
                    <input type="number" id="prep_time" name="prep_time" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($prep_time); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="cook_time" class="form-label">Cook Time (min)<small style="color: red;">*</small></label>
                    <input type="number" id="cook_time" name="cook_time" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($cook_time); ?>" required>
                </div>
            </div>

            <!-- Servings -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="servings" class="form-label">Servings</label>
                    <input type="number" id="servings" name="servings" class="form-control" placeholder="e.g. 8"
                        value="<?php echo htmlspecialchars($servings); ?>" required>
                </div>

                <!-- Difficulty Section -->
                <div class="col-md-6">
                    <label for="difficulty_level" class="form-label">Difficulty Level</label>
                    <select id="difficulty_level" name="difficulty_level" class="form-control" required>
                        <option value="">Select Level</option>
                        <option value="Beginner" <?php echo ($difficulty_level == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
                        <option value="Intermediate" <?php echo ($difficulty_level == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                        <option value="Advanced" <?php echo ($difficulty_level == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
                    </select>
                </div>
            </div>
            <hr>

            <!-- Notes Section  -->

            <div class="mb-3">
                <label class="form-label">Notes (Optional)</label>
                <div id="notesList" class="mb-2">
                    <div class="note-entry mb-3">
                        <?php
                        if (!empty($notes)) {

                            $notes = array_map('trim', explode('<separatorForEachNote>', $notes));

                            foreach ($notes as $index => $note) {
                                $note = array_map('trim', explode('<separatorForTitleAndDescription>', $note));
                        ?>
                                <input type="text" name="notes[<?php echo $index; ?>][title]" class="form-control mb-2" placeholder="Note title (e.g., Tip about storage)"
                                    value="<?php echo htmlspecialchars($note[0]); ?>">

                                <textarea name="notes[<?php echo $index; ?>][description]" class="form-control mb-2" rows="3" placeholder="Add a note description (e.g., Keep in the fridge for 3 days)"
                                    <?php echo !empty($note[0]) ? 'required' : ''; ?>><?php echo htmlspecialchars($note[1]); ?></textarea>

                                <button type="button" class="btn btn-outline-danger remove-note">Remove</button>
                            <?php
                            }
                        } else {
                            ?>

                            <input type="text" name="notes[0][title]" class="form-control mb-2" placeholder="Note title (e.g., Tip about storage)" required>
                            <textarea name="notes[0][description]" class="form-control mb-2" rows="3" placeholder="Add a note description (e.g., Keep in the fridge for 3 days)"
                                <?php echo !empty($notes[0]['title']) ? 'required' : ''; ?>></textarea>

                            <button type="button" class="btn btn-outline-danger remove-note">Remove</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addNote">+ Add Note</button>
            </div>
            <hr>

            <script>
                let noteCount = 1; // Start with 1 because the first note already exists in the form

                function createNoteInput() {
                    const notesList = document.getElementById('notesList');
                    const noteEntry = document.createElement('div');
                    noteEntry.className = 'note-entry mb-3';

                    // Use the noteCount to index the array properly for each new note
                    noteEntry.innerHTML = `
        <input type="text" name="notes[${noteCount}][title]" class="form-control mb-2" placeholder="Note title" required>
        <textarea name="notes[${noteCount}][description]" class="form-control mb-2" rows="3" placeholder="Note description" required></textarea>
        <button type="button" class="btn btn-outline-danger remove-note">Remove</button>
    `;

                    notesList.appendChild(noteEntry);

                    // Add event listener to the remove button
                    noteEntry.querySelector('.remove-note').addEventListener('click', function() {
                        notesList.removeChild(noteEntry);
                    });

                    noteCount++; // Increment the counter for the next note
                }

                document.getElementById('addNote').addEventListener('click', createNoteInput);
            </script>


            <!-- --------------------------- tags input ------------------------ -->
            <div class="container mt-3">
                <div class="form-group position-relative">
                    <label for="tags-input">Tag Information</label>

                    <!-- Moved the tag-container ABOVE the input field -->
                    <div id="tag-container" class="tag-container mt-2">
                        <?php
                        // PHP: Initialize the tag container with existing tags
                        if (!empty($tags)) {
                            foreach ($tags as $tag) {
                                echo '<div class="tag"><span>' . htmlspecialchars($tag) . '</span><button class="remove-btn">&times;</button></div>';
                            }
                        }
                        ?>
                    </div>

                    <div class="tag-input position-relative">
                        <input type="text" id="tags-input" name="" class="form-control" placeholder="Add Tags" />
                    </div>

                    <!-- Suggestions will appear here -->
                    <div id="suggestions" class="list-group mt-1"></div>
                </div>
            </div>

            <hr>
            <script>
                const suggestions = <?php echo json_encode($allTage); ?>;

                const input = document.getElementById('tags-input');
                const tagContainer = document.getElementById('tag-container');
                const suggestionBox = document.getElementById('suggestions');

                // Event listener for input changes
                input.addEventListener('input', function() {
                    const value = input.value.toLowerCase();
                    suggestionBox.innerHTML = '';

                    if (value) {
                        const filteredSuggestions = suggestions.filter(s => s.toLowerCase().includes(value));

                        filteredSuggestions.forEach(tag => {
                            const highlightedTag = highlightMatch(tag, value);
                            const suggestionItem = document.createElement('div');
                            suggestionItem.innerHTML = highlightedTag;
                            suggestionItem.classList.add('list-group-item', 'list-group-item-action');

                            suggestionItem.addEventListener('click', function() {
                                addTag(tag);
                                input.value = '';
                                suggestionBox.innerHTML = '';
                            });

                            suggestionBox.appendChild(suggestionItem);
                        });
                    }
                });

                // Event listener for adding tags on Enter
                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        const value = input.value.trim();
                        if (value && !Array.from(tagContainer.children).some(tag => tag.textContent.includes(value))) {
                            addTag(value);
                            input.value = '';
                            suggestionBox.innerHTML = '';
                        }
                    }
                });

                // Function to add a tag
                function addTag(value) {
                    const tag = document.createElement('div');
                    tag.className = 'tag';
                    tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;

                    const inputField = document.createElement('input');
                    inputField.type = 'hidden';
                    inputField.name = 'tags[]';
                    inputField.value = value;

                    tag.querySelector('.remove-btn').addEventListener('click', () => {
                        tagContainer.removeChild(tag);
                        inputField.remove(); // Ensure we remove the hidden input when tag is deleted
                    });

                    tagContainer.appendChild(tag);
                    tagContainer.appendChild(inputField);
                }

                // Function to highlight matching text in suggestions
                function highlightMatch(tag, query) {
                    const regex = new RegExp(`(${query})`, 'gi');
                    return tag.replace(regex, '<span style="color: red;">$1</span>');
                }
            </script>


            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

            <!-- tashin --------------------------- Location city where it famous optionals ---------------------------------- -->

            <div class="container mt-5">
                <div class="form-group position-relative">
                    <label for="city-input">City Information</label>

                    <!-- Moved the tag-container ABOVE the input field -->
                    <div id="city-tag-container" class="tag-container mt-2"></div>

                    <div class="tag-input position-relative">
                        <input type="text" id="city-input" name="cities[]" class="form-control" placeholder="Add Cities" />
                    </div>

                    <!-- Suggestions will appear here -->
                    <div id="city-suggestions" class="list-group mt-1"></div>
                </div>
            </div>

            <script>
                // PHP cities array passed to JavaScript
                const citySuggestions = <?php echo json_encode($allCities); ?>;
                const initialCities = <?php echo json_encode($cities); ?>; // Fetch existing cities from PHP

                // Encapsulate city suggestion functionality
                const citySuggestionModule = (() => {
                    const cityInput = document.getElementById('city-input');
                    const cityTagContainer = document.getElementById('city-tag-container');
                    const citySuggestionBox = document.getElementById('city-suggestions');

                    // Initialize event listeners
                    const init = () => {
                        cityInput.addEventListener('input', filterSuggestions);
                        cityInput.addEventListener('keydown', addCityOnEnter);
                        loadInitialCities(); // Load initial cities from PHP
                    };

                    const loadInitialCities = () => {
                        initialCities.forEach(city => {
                            addCityTag(city); // Add each city as a tag
                        });
                    };

                    const filterSuggestions = () => {
                        const value = cityInput.value.toLowerCase();
                        citySuggestionBox.innerHTML = ''; // Clear previous suggestions

                        if (value) {
                            const filteredSuggestions = citySuggestions.filter(city => city.toLowerCase().includes(value));

                            filteredSuggestions.forEach(city => {
                                const highlightedCity = highlightMatch(city, value);
                                const suggestionItem = document.createElement('div');
                                suggestionItem.innerHTML = highlightedCity;
                                suggestionItem.classList.add('list-group-item', 'list-group-item-action');

                                // Add click functionality to add the city as a tag element
                                suggestionItem.addEventListener('click', () => {
                                    if (city.trim()) { // Only add if the city is not blank
                                        addCityTag(city);
                                        cityInput.value = ''; // Clear input after selection
                                        citySuggestionBox.innerHTML = ''; // Clear suggestions after click
                                    }
                                });

                                citySuggestionBox.appendChild(suggestionItem);
                            });
                        }
                    };

                    const addCityOnEnter = (event) => {
                        if (event.key === 'Enter') {
                            event.preventDefault();
                            const value = cityInput.value.trim();
                            if (value && !Array.from(cityTagContainer.children).some(tag => tag.textContent.includes(value))) {
                                addCityTag(value);
                                cityInput.value = ''; // Clear input after adding tag
                                citySuggestionBox.innerHTML = ''; // Clear suggestions
                            }
                        }
                    };

                    // Add the city to the tag container
                    const addCityTag = (value) => {
                        if (value.trim()) { // Prevent adding blank values
                            const tag = document.createElement('div');
                            tag.className = 'tag';
                            tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;

                            // Create a hidden input to hold the city value
                            const input = document.createElement('input');
                            input.type = 'hidden';
                            input.name = 'cities[]'; // Name should be the same as in the form
                            input.value = value;

                            tag.querySelector('.remove-btn').addEventListener('click', () => {
                                cityTagContainer.removeChild(tag);
                                // Remove hidden input when tag is deleted
                                input.remove();
                            });

                            tag.appendChild(input); // Append the hidden input to the tag
                            cityTagContainer.appendChild(tag);
                        }
                    };

                    // Highlight matching part of the city name
                    const highlightMatch = (city, query) => {
                        const regex = new RegExp(`(${query})`, 'gi');
                        return city.replace(regex, '<span style="color: red;">$1</span>');
                    };

                    // Initialize the module
                    return {
                        init: init
                    };
                })();

                // Initialize the city suggestion module
                citySuggestionModule.init();
            </script>


            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


            <!-- --------------------------- City end ---------------------------------- -->

            <!-- --------------------------- ALL optionals ---------------------------------- -->
            <!-- Story -->
            <div class="mb-3">
                <label for="story_or_learn" class="form-label">Any story behind this recipe? or How did you learn/make this? (Optional)</label>
                <textarea id="story_or_learn" name="story_or_learn" class="form-control" rows="4" placeholder="Share the story.."><?php echo htmlspecialchars($story_or_learn); ?></textarea>
            </div>
            <hr>

            <!-- ------------------------------------------------------------- -->
            <!-- Buttons -->
            <div class="container d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-4" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-danger" id="submit_recipe" name="submit_recipe">Submit Recipe</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>



    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>

</body>

</html>