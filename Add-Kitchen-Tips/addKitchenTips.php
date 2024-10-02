<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Kitchen Tips</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />


    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

    <!-- javascript -->
    <script src="addKitchenTips.js"></script>


</head>

<body>

    <?php
    // include('/Cook-Corner/Includes/Navbar/navbarMain.php');  // tashin 
    include("../Includes/Navbar/navbarMain.php");
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>

    <div class="container my-5">
        <h1 class="text-center text-danger mb-4">Add a Kitchen Tips</h1>
        <p class="text-center">Share Your Best Kitchen Secrets and Tips with the Community</p>

        <form id="recipeForm" class="p-4 border bg-light rounded">
            <hr>
            <!-- Tips Title -->
            <div class="mb-3">
                <label for="recipeTitle" class="form-label">Kitchen Tips Title</label>
                <input type="text" id="recipeTitle" class="form-control" placeholder="Give your Kitchen Tips a title" required>
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
                <textarea id="description" class="form-control" rows="4" placeholder="Share the story behind your Kitchen Tips and what makes it special" required></textarea>
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


            <div class="row mb-3">
                <!-- Time Section -->
                <div class="col-md-6">
                    <label for="duration" class="form-label">Duration (in mins)</label>
                    <input type="number" id="duration" class="form-control" placeholder="e.g. 20" min="0" required>
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

            <!-- Buttons -->
            <div class="container d-flex justify-content-end">
                <button type="button" class="btn btn-outline-secondary me-4" id="cancel">Cancel</button>
                <button type="submit" class="btn btn-danger" id="submitRecipe">Submit Your Tips</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="scripts.js"></script>



    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Added modal-dialog-centered -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Submission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to submit your Kitchen Tips?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmSubmit">Confirm</button>
                </div>
            </div>
        </div>
    </div>




    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>