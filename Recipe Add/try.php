<?php

include('../Includes/Navbar/navbarMain.php');  // tashin
// echo $user_id;

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$recipePhoto = $recipeTitle = $description = $ingredients = $directions = $servings = $yield = $prepTime = $cookTime = $noteTitles = $noteDescriptions = $story = '';


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

// ----------------------------------------------------------------------



if (isset($_POST['submitRecipe'])) {

    if (isset($_FILES['recipePhoto']) && $_FILES['recipePhoto']['error'] === 0) {

        $tempname = $_FILES['recipePhoto']['tmp_name'];

        $file_name = $_FILES['recipePhoto']['name'];
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
        if (move_uploaded_file($_FILES['recipePhoto']['tmp_name'], $target_file)) {
            $recipePhoto = isset($new_file_name) ? $new_file_name : $file_base_name . '.' . $file_ext;
        } else {
            echo "There was an error uploading the file.";
        }
    } else {
        echo "No file was uploaded or there was an upload error.";
    }

    $recipePhoto = isset($recipePhoto) ?? '';

    $recipeTitle = $_POST['recipeTitle'] ?? '';
    $description = $_POST['description'] ?? '';

    $ingredients = $_POST['ingredients'] ?? [];
    $ingredients = implode('<splitForIngredient>', array_map('trim', $ingredients));

    $directions = $_POST['directions'] ?? '';
    $directions = implode('<splitForDirection>', array_map('trim', $directions));

    $servings = $_POST['servings'] ?? '';
    $yield = $_POST['yield'] ?? '';
    $prepTime = $_POST['prepTime'] ?? '';
    $cookTime = $_POST['cookTime'] ?? '';

    $noteTitles = $_POST['noteTitles'] ?? '';
    $noteTitles = implode('<splitForNoteTitles>', array_map('trim', $noteTitles));

    $noteDescriptions = $_POST['noteDescriptions'] ?? '';
    $noteDescriptions = implode('<splitForNoteDescriptions>', array_map('trim', $noteDescriptions));

    $notes = $noteTitles . '<separatorForNoteTitlesAndNoteDescriptions>' . $noteDescriptions;


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

        $stmt = $conn->prepare('INSERT INTO recipe_info
        (title, image, description, ingredients, directions, servings, yield, prep_time, cook_time, notes, author)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $stmt->bind_param(
            'sssssssssss',
            $recipeTitle,
            $recipePhoto,
            $description,
            $ingredients,
            $directions,
            $servings, // for how many person
            $yield,
            $prepTime,
            $cookTime,
            $notes,
            $user_id
        );
        $stmt->execute();

        $stmt->close();
        mysqli_close($conn);

        header('Location: #');
        // exit();
    } else {
        echo 'Only chef can add a recipe!';
    }

    //........................***********.............
    // Store $ingredients in the database as plain text (without altering line breaks)

    // When retrieving from the database, apply nl2br before displaying
    // $storedIngredients = nl2br(htmlspecialchars($storedIngredientsFromDb));
    //......................................................
}

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

    <!-- javascript -->
    <script src="addRecipe.js"></script>

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
                <label for="recipeTitle" class="form-label">Recipe Title<small style="color: red;">*</small></label>
                <input type="text" id="recipeTitle" name="recipeTitle" class="form-control" placeholder="Give your recipe a title"
                    value="<?php echo htmlspecialchars($recipeTitle); ?>" required>
            </div>
            <hr>
            <!-- Recipe SubTitle -->
            <div class="mb-3">
                <label for="recipeTitle" class="form-label">Subtitle(Optional)</label>
                <input type="text" id="recipeTitle" name="recipeTitle" class="form-control" placeholder="Give your recipe a title"
                    value="<?php echo htmlspecialchars($recipeTitle); ?>" required>
            </div>
            <hr>

            <!-- Photo Upload -->
            <div class="mb-3 row">
                <label for="recipePhoto" class="form-label">Photo<small style="color: red;">*</small></label>
                <div class="col-md-6">
                    <input type="file" id="recipePhoto" name="recipePhoto" class="form-control" accept="image/*">
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
                            <input type="text" name="directions[]" class="form-control mb-2" placeholder="Step 1" value="<?php echo htmlspecialchars($direction); ?>" required>
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
            <hr>

            <!-- Time Section -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prepTime" class="form-label">Prep Time (min)<small style="color: red;">*</small></label>
                    <input type="number" id="prepTime" name="prepTime" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($prepTime); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="cookTime" class="form-label">Cook Time (min)<small style="color: red;">*</small></label>
                    <input type="number" id="cookTime" name="cookTime" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($cookTime); ?>">
                </div>
            </div>

            <!-- Servings and Yield -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="servings" class="form-label">Servings</label>
                    <input type="number" id="servings" name="servings" class="form-control" placeholder="e.g. 8"
                        value="<?php echo htmlspecialchars($servings); ?>" required>
                </div>

                <!-- Difficulty Section -->
                <div class="col-md-6">
                    <label for="difficultyLevel" class="form-label">Difficulty Level</label>
                    <select id="difficultyLevel" class="form-control" required>
                        <option value="">Select Level</option>
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
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
                        $noteTitles = array_map('trim', explode('<splitForNoteTitles>', $noteTitles));
                        $noteDescriptions = array_map('trim', explode('<splitForNoteDescriptions>', $noteDescriptions));

                        if (!empty($noteTitles) && !empty($noteDescriptions)) {
                            foreach ($noteTitles as $index => $noteTitle) {
                        ?>
                                <input type="text" name="noteTitles[]" class="form-control mb-2" placeholder="Note title (e.g., Tip about storage)" value="<?php echo htmlspecialchars($noteTitle); ?>" required>
                                <textarea name="noteDescriptions[]" class="form-control mb-2" rows="3" placeholder="Add a note description (e.g., Keep in the fridge for 3 days)" required><?php echo htmlspecialchars($noteDescriptions[$index]); ?></textarea>
                            <?php
                            }
                        } else {
                            ?>
                            <input type="text" name="noteTitles[]" class="form-control mb-2" placeholder="Note title (e.g., Tip about storage)" required>
                            <textarea name="noteDescriptions[]" class="form-control mb-2" rows="3" placeholder="Add a note description (e.g., Keep in the fridge for 3 days)" required></textarea>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addNote">+ Add Note</button>
            </div>
            <hr>

            <!-- --------------------------- tags input ---------------------------------- -->
            <div class="container mt-3">
                <div class="form-group position-relative">
                    <label for="tags-input">Tag Information</label>

                    <!-- Moved the tag-container ABOVE the input field -->
                    <div id="tag-container" class="tag-container mt-2"></div>

                    <div class="tag-input position-relative">
                        <input type="text" id="tags-input" class="form-control" placeholder="Add Tags" />
                    </div>

                    <!-- Suggestions will appear here -->
                    <div id="suggestions" class="list-group mt-1"></div>
                </div>
            </div>
            <hr>

            <script>
                // PHP tags array passed to JavaScript
                const suggestions = <?php echo json_encode($allTage); ?>;

                const input = document.getElementById('tags-input');
                const tagContainer = document.getElementById('tag-container');
                const suggestionBox = document.getElementById('suggestions');

                input.addEventListener('input', function() {
                    const value = input.value.toLowerCase();
                    suggestionBox.innerHTML = ''; // Clear previous suggestions

                    if (value) {
                        const filteredSuggestions = suggestions.filter(s => s.toLowerCase().includes(value));

                        filteredSuggestions.forEach(tag => {
                            const highlightedTag = highlightMatch(tag, value);
                            const suggestionItem = document.createElement('div');
                            suggestionItem.innerHTML = highlightedTag;
                            suggestionItem.classList.add('list-group-item', 'list-group-item-action');

                            // Add click functionality to add the tag as a tag element
                            suggestionItem.addEventListener('click', function() {
                                addTag(tag);
                                input.value = '';
                                suggestionBox.innerHTML = ''; // Clear suggestions after click
                            });

                            suggestionBox.appendChild(suggestionItem);
                        });
                    }
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        event.preventDefault();
                        const value = input.value.trim();
                        if (value && !Array.from(tagContainer.children).some(tag => tag.textContent.includes(value))) {
                            addTag(value);
                            input.value = '';
                            suggestionBox.innerHTML = ''; // Clear suggestions
                        }
                    }
                });

                // Add the tag to the tag container
                function addTag(value) {
                    const tag = document.createElement('div');
                    tag.className = 'tag';
                    tag.innerHTML = `<span>${value}</span><button class="remove-btn">&times;</button>`;
                    tag.querySelector('.remove-btn').addEventListener('click', () => {
                        tagContainer.removeChild(tag);
                    });
                    tagContainer.appendChild(tag);
                }

                // Highlight matching part of the tag name
                function highlightMatch(tag, query) {
                    const regex = new RegExp(`(${query})`, 'gi');
                    return tag.replace(regex, '<span style="color: red;">$1</span>');
                }
            </script>

            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>



            <!-- --------------------------- ALL optionals ---------------------------------- -->
            <!-- Story -->
            <div class="mb-3">
                <label for="description" class="form-label">Any story behind this recipe? or How did you learn/make this? (Optional)</label>
                <textarea id="story" name="story" class="form-control" rows="4" placeholder="Share the story.."> <?php echo htmlspecialchars($story); ?> </textarea>
            </div>
            <hr>



            <!-- ------------------------------------------------------------- -->
            <!-- Buttons -->
            <div class="container d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-4" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-danger" id="submitRecipe" name="submitRecipe">Submit Recipe</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>



    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>