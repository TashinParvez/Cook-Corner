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
    include('../Includes/Navbar/navbarMain.php');  // tashin 
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <div class="container my-5">
        <h1 class="text-center text-danger mb-4">Add a Recipe</h1>
        <p class="text-center">Uploading personal recipes is easy! Add yours to your favorites, share with friends, family, or the community.</p>

        <form id="recipeForm" class="p-4 border bg-light rounded">
            <hr>
            <!-- Recipe Title -->
            <div class="mb-3">
                <label for="recipeTitle" class="form-label">Recipe Title</label>
                <input type="text" id="recipeTitle" class="form-control" placeholder="Give your recipe a title" required>
            </div>
            <hr>
            <!-- Photo Upload -->
            <div class="mb-3 row">
                <label for="recipePhoto" class="form-label">Photo (optional)</label>
                <div class="col-md-6">
                    <input type="file" id="recipePhoto" class="form-control" accept="image/*">
                </div>
                <small class="text-muted mt-2">Use JPEG or PNG. Must be at least 960 x 960. Max file size: 30MB</small>
            </div>
            <hr>
            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" class="form-control" rows="4" placeholder="Share the story behind your recipe and what makes it special" required></textarea>
            </div>
            <hr>
            <!-- Ingredients Section -->
            <div class="mb-3">
                <label class="form-label">Ingredients</label>
                <div id="ingredientsList" class="mb-2">
                    <input type="text" name="ingredient[]" class="form-control mb-2" placeholder="e.g. 2 cups flour, sifted" required>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addIngredient">+ Add Ingredient</button>
            </div>
            <hr>
            <!-- Directions Section -->
            <div class="mb-3">
                <label class="form-label">Directions</label>
                <div id="directionsList" class="mb-2">
                    <input type="text" name="direction[]" class="form-control mb-2" placeholder="Step 1" required>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addStep">+ Add Step</button>
            </div>
            <hr>
            <!-- Servings and Yield -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="servings" class="form-label">Servings</label>
                    <input type="text" id="servings" class="form-control" placeholder="e.g. 8">
                </div>
                <div class="col-md-6">
                    <label for="yield" class="form-label">Yield (Optional)</label>
                    <input type="text" id="yield" class="form-control" placeholder="e.g. 1 9-inch cake">
                </div>
            </div>

            <!-- Time Section -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="prepTime" class="form-label">Prep Time</label>
                    <input type="number" id="prepTime" class="form-control" placeholder="0" min="0"> mins
                </div>
                <div class="col-md-6">
                    <label for="cookTime" class="form-label">Cook Time (optional)</label>
                    <input type="number" id="cookTime" class="form-control" placeholder="0" min="0"> mins
                </div>
            </div>

            <hr>

            <!-- Notes Section 2 -->
            <div class="mb-3">
                <label class="form-label">Notes (Optional)</label>
                <div id="notesList" class="mb-2">
                    <div class="note-entry mb-3">
                        <input type="text" name="noteTitle[]" class="form-control mb-2" placeholder="Note title (e.g., Tip about storage)" required>
                        <textarea name="noteDescription[]" class="form-control mb-2" rows="3" placeholder="Add a note description (e.g., Keep in the fridge for 3 days)" required></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-danger" id="addNote">+ Add Note</button>
            </div>


            <hr>

            <!-- Buttons -->
            <div class="container d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-4" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-danger" id="submitRecipe">Submit Recipe</button>
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