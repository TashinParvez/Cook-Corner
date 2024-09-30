<?php

include('../Includes/Navbar/navbarMain.php');  // tashin
// echo $user_id;

//...................... Database Connection ..............................
include("../Includes/Database Connection/database_connection.php");

$recipePhoto = $recipeTitle = $description = $ingredients = $directions = $servings = $yield = $prepTime = $cookTime = $noteTitles = $noteDescriptions = '';

if (isset($_POST['submitRecipe'])) {

    if (isset($_FILES['recipePhoto']) && $_FILES['recipePhoto']['error'] == 0) {

        $tempname = $_FILES['recipePhoto']['tmp_name'];

        $file_name = $_FILES['recipePhoto']['name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_base_name = pathinfo($file_name, PATHINFO_FILENAME);

        $upload_dir = 'Images\Recipe-Images\\';
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
    }

    // These three won't be changed
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

    if ($chef_status == 1) {

        $stmt = $conn->prepare('INSERT INTO recipe_info
        (title, image, description, ingredients, directions, for_how_many_person, yelds, prep_time, cook_time, notes, author)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $stmt->bind_param(
            'sssssssssss',
            $recipeTitle,
            $recipePhoto,
            $description,
            $ingredients,
            $directions,
            $servings,
            $yield,
            $prepTime,
            $cookTime,
            $notes
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

    <!-- javascript -->
    <script src="addRecipe.js"></script>

</head>

<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <div class="container my-5">
        <h1 class="text-center text-danger mb-4">Add a Recipe</h1>
        <p class="text-center">Uploading personal recipes is easy! Add yours to your favorites, share with friends, family, or the community.</p>

        <form id="recipeForm" class="p-4 border bg-light rounded" action="addRecipe.php" method="post">
            <hr>
            <!-- Recipe Title -->
            <div class="mb-3">
                <label for="recipeTitle" class="form-label">Recipe Title</label>
                <input type="text" id="recipeTitle" name="recipeTitle" class="form-control" placeholder="Give your recipe a title"
                    value="<?php echo htmlspecialchars($recipeTitle); ?>" required>
            </div>
            <hr>
            <!-- Photo Upload -->
            <div class="mb-3 row">
                <label for="recipePhoto" class="form-label">Photo (optional)</label>
                <div class="col-md-6">
                    <input type="file" id="recipePhoto" name="recipePhoto" class="form-control" accept="image/*">
                </div>
                <small class="text-muted mt-2">Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</small>
            </div>
            <hr>
            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Share the story behind your recipe and what makes it special"
                    required><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <hr>
            <!-- Ingredients Section -->
            <div class="mb-3">
                <label class="form-label">Ingredients</label>
                <div id="ingredientsList" class="mb-2">
                    <?php
                    $ingredients = array_map('trim', explode('<splitForIngredient>', $ingredients));

                    if (!empty($ingredients)) {
                        foreach ($ingredients as $ingredient) {
                    ?>
                            <input type="text" name="ingredients[]" class="form-control mb-2" placeholder="e.g. 2 cups flour, sifted" value="<?php echo htmlspecialchars($ingredient); ?>" required>
                        <?php
                        }
                    } else {
                        ?>
                        <input type="text" name="ingredients[]" class="form-control mb-2" placeholder="e.g. 2 cups flour, sifted" required>
                    <?php
                    }
                    ?>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addIngredient">+ Add Ingredient</button>
            </div>
            <hr>
            <!-- Directions Section -->
            <div class="mb-3">
                <label class="form-label">Directions</label>
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
            <!-- Servings and Yield -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="servings" class="form-label">Servings</label>
                    <input type="text" id="servings" name="servings" class="form-control" placeholder="e.g. 8"
                        value="<?php echo htmlspecialchars($servings); ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="yield" class="form-label">Yield (Optional)</label>
                    <input type="text" id="yield" name="yield" class="form-control" placeholder="e.g. 1 9-inch cake"
                        value="<?php echo htmlspecialchars($recipeTitle); ?>">
                </div>
            </div>

            <!-- Time Section -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prepTime" class="form-label">Prep Time</label>
                    <input type="number" id="prepTime" name="prepTime" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($recipeTitle); ?>" required> mins
                </div>
                <div class="col-md-6">
                    <label for="cookTime" class="form-label">Cook Time (optional)</label>
                    <input type="number" id="cookTime" name="cookTime" class="form-control" placeholder="0" min="0"
                        value="<?php echo htmlspecialchars($recipeTitle); ?>"> mins
                </div>
            </div>

            <hr>

            <!-- Notes Section 2 -->
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