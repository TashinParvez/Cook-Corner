<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Recipe Approval</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        header {
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
        }

        .notification {
            font-weight: bold;
            text-align: center;
            color: green;
        }

        .notification.error {
            color: red;
        }

        .category-section {
            margin-bottom: 10px;
        }

        .approve-btn {
            margin-top: 20px;
        }

        .form-check {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <header class="text-center mb-4">
            <h1>Recipe Management</h1>
        </header>

        <!-- Accordion for Recipe Info -->
        <div class="accordion" id="recipeAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Recipe: Chocolate Cake
                        <div class="accordion-body">
                            <p><strong>Submitted by:</strong> User Name (user@example.com)</p>
                            <h5>Ingredients:</h5>
                            <ul>
                                <li>Flour</li>
                                <li>Sugar</li>
                                <li>Cocoa Powder</li>
                            </ul>
                            <h5>Instructions:</h5>
                            <p>Mix ingredients and bake at 350°F for 30 minutes.</p>
                            <h5>Images:</h5>
                            <img src="recipe-image.jpg" alt="Chocolate Cake" class="img-fluid">
                        </div>

                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#recipeAccordion">
                    <div class="accordion-body">
                        <p><strong>Submitted by:</strong> User Name (user@example.com)</p>
                        <h5>Ingredients:</h5>
                        <ul>
                            <li>Flour</li>
                            <li>Sugar</li>
                            <li>Cocoa Powder</li>
                        </ul>
                        <h5>Instructions:</h5>
                        <p>Mix ingredients and bake at 350°F for 30 minutes.</p>
                        <h5>Images:</h5>
                        <img src="recipe-image.jpg" alt="Chocolate Cake" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <!-- Categorization Section -->
        <form id="categoryForm">
            <h4>Select Categories</h4>

            <!-- Category 1: Event Info -->
            <div class="card p-3 shadow-sm">
                <h6>Category 1: Event Info</h6>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Birthday" id="eventBirthday">
                    <label class="form-check-label" for="eventBirthday">Birthday</label>
                </div>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Marriage" id="eventMarriage">
                    <label class="form-check-label" for="eventMarriage">Marriage</label>
                </div>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Eid" id="eventEid">
                    <label class="form-check-label" for="eventEid">Eid</label>
                </div>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Puja" id="eventPuja">
                    <label class="form-check-label" for="eventPuja">Puja</label>
                </div>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Other Events" id="eventOther">
                    <label class="form-check-label" for="eventOther">Other Events</label>
                </div>
            </div>

            <!-- Category 2 Example: Cuisine Type -->
            <div class="card p-3 shadow-sm">
                <h6>Category 2: Cuisine Type</h6>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Indian" id="cuisineIndian">
                    <label class="form-check-label" for="cuisineIndian">Indian</label>
                </div>
                <div class="form-check category-section">
                    <input class="form-check-input" type="checkbox" value="Chinese" id="cuisineChinese">
                    <label class="form-check-label" for="cuisineChinese">Chinese</label>
                </div>
            </div>

            <!-- Approve and Reject Buttons -->
            <div class="text-end approve-btn">
                <button type="button" class="btn btn-success" onclick="approveRecipe()">Approve Recipe</button>
                <button type="button" class="btn btn-danger" onclick="rejectRecipe()">Reject Recipe</button>
            </div>
        </form>

        <div class="mt-3">
            <p id="notification-message" class="notification"></p>
        </div>
    </div>

    <script>
        function approveRecipe() {
            const selectedCategories = [
                'eventBirthday', 'eventMarriage', 'eventEid', 'eventPuja', 'eventOther',
                'cuisineIndian', 'cuisineChinese'
            ].filter(id => document.getElementById(id).checked).map(id => document.getElementById(id).value);

            if (selectedCategories.length === 0) {
                displayNotification('Please select at least one category.', 'error');
            } else {
                displayNotification('Recipe approved successfully! Categories: ' + selectedCategories.join(', '));
            }
        }

        function rejectRecipe() {
            displayNotification('Recipe rejected. Please provide feedback if necessary.', 'error');
        }

        function displayNotification(message, type = '') {
            const notificationElement = document.getElementById('notification-message');
            notificationElement.textContent = message;
            notificationElement.className = type === 'error' ? 'notification error' : 'notification';
        }
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>