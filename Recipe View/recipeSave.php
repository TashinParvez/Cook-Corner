<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="recipeSave.css">
</head>

<body>

    <!-- Modal Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch demo modal
    </button>

    <!-- Modal open -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Left section -->
                    <div class="left-section">
                        <h3 class="card-title">Added to Saved Recipes</h3>
                        <img src="../../../Images/FoodImages/3.jpeg" class="img-fluid rounded-start" alt="...">
                        <h5 class="card-title">Sheet Pan Parmesan Chicken and Veggies</h5>
                    </div>

                    <!-- Right section -->
                    <div class="right-section">
                        <h5 class="card-title">Add to collections</h5>
                        <hr>
                        <div id="checkbox-list" class="checkbox-list">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Keepers (suggested)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                <label class="form-check-label" for="defaultCheck2">
                                    Want to Try (suggested)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                <label class="form-check-label" for="defaultCheck3">
                                    Weeknight Ideas (suggested)
                                </label>
                            </div>
                        </div>
                        <button type="button" id="create-collection-btn" class="btn btn-outline-secondary create-collection">+ CREATE
                            COLLECTION</button>

                        <!-- Footer buttons -->
                        <div class="footer-buttons">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Remove</button>
                            <button type="button" class="btn btn-primary">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.getElementById("create-collection-btn").addEventListener("click", function() {
            // Prompt the user for a new collection name
            let collectionName = prompt("Enter the name of your new collection:");

            // If the user provides a name, create a new checkbox
            if (collectionName) {
                // Create new checkbox and label
                let newCheckbox = document.createElement("div");
                newCheckbox.classList.add("form-check");

                newCheckbox.innerHTML = `
                    <input class="form-check-input" type="checkbox" value="" id="${collectionName}">
                    <label class="form-check-label" for="${collectionName}">
                        ${collectionName}
                    </label>
                `;

                // Append the new checkbox to the checkbox list
                document.getElementById("checkbox-list").appendChild(newCheckbox);
            }
        });
    </script>

</body>

</html>