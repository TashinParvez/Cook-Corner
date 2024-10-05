<?php

include("../Includes/Database Connection/database_connection.php");  // for home page


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->
    <link rel="stylesheet" href="mealGenerator.css">
    <link rel="stylesheet" href="estimateYourCalorieNeeds.css">

</head>


<body>

    <?php
    // include('../Includes/Navbar/navbarMain.php');  // tashin  prev 
    include('../Includes/Navbar/navbarMain-Search-imp.php');  // tashin  prev 

    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>


    <div class="container meal-planner ">
        <h1 class="mb-4">Put your diet on Autopilot</h1>
        <p>Eat This Much creates personalized meal plans based on your food preferences, budget, and schedule. Reach your diet and nutritional goals with our calorie calculator, weekly meal plans, grocery lists and more. Create your meal plan right here in seconds.
        <p>Let us know your diet.</p>

        <div class="container card">


            <div class="diet-options">
                <div class="diet-option active">
                    <img src="../Images/Personalized-Recommendations/Anything.png" alt="Anything">
                    <p>Anything</p>
                </div>
                <div class="diet-option">
                    <img src="../Images/Personalized-Recommendations/Paleo.png" alt="Paleo">
                    <p>Paleo</p>
                </div>
                <div class="diet-option">
                    <img src="../Images/Personalized-Recommendations/vegetarian.png" alt="Vegetarian">
                    <p>Vegetarian</p>
                </div>
                <div class="diet-option">
                    <img src="../Images/Personalized-Recommendations/vegan.png" alt="Vegan">
                    <p>Vegan</p>
                </div>
                <div class="diet-option">
                    <img src="../Images/Personalized-Recommendations/ketogenic-diet.png" alt="Ketogenic">
                    <p>Ketogenic</p>
                </div>
                <div class="diet-option">
                    <img src="../Images/Personalized-Recommendations/mediterranean.png" alt="Mediterranean">
                    <p>Mediterranean</p>
                </div>
            </div>

            <form class="mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-4">
                        <label for="calories" class="form-label">I want to eat</label>
                        <input type="number" class="form-control" id="calories" placeholder="Calories">
                        <div class="form-text">Not sure? <a href="#" class="text-decoration-none text-success fw-bold launch-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">Estimate your calorie needs</a></div>


                        <!-- ------------------------------------------------ -->



                        <!-- Button trigger modal -->



                        <!-- <button type="button" class="btn btn-primary launch-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                        </button> -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nutrition calculator</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!--  Modal Main content  -->
                                        <!-- Hero Section -->
                                        <section class="hero">
                                            <div class="container mb-3">
                                                <h4>Estimate Your Calorie Needs</h4>
                                                <p>Not sure how many calories you should be eating? Use our guide to learn more about daily calorie requirements based on your activity level, goals, and dietary preferences. Get personalized recommendations to better understand how food categories contribute to your overall calorie intake.</p>
                                            </div>
                                        </section>

                                        <!-- Section 1: What Are Calories -->
                                        <section class="container  mb-3">
                                            <h4 class="section-title">What Are Calories?</h4>
                                            <p>Calories are a unit of energy that your body uses for everything from breathing to running. Understanding how many calories are in your food helps manage weight, health, and overall nutrition.</p>
                                        </section>

                                        <!-- Section 2: Daily Calorie Needs -->
                                        <section class="container  mb-3 calculator-section">
                                            <h4 class="section-title">Daily Calorie Needs</h4>
                                            <p>Daily calorie needs vary based on age, gender, activity level, and weight goals.</p>

                                            <!-- Calorie Calculator -->
                                            <form id="calorie-form">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="weight">Weight (kg)</label>
                                                        <input type="number" class="form-control" id="weight" placeholder="E.g 70" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="height">Height (cm)</label>
                                                        <input type="number" class="form-control" id="height" placeholder="E.g 175" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="age">Age</label>
                                                        <input type="number" class="form-control" placeholder="E.g 35" id="age" required>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-select" id="gender">
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-3">
                                                        <label for="activity">Activity Level</label>
                                                        <select class="form-select" id="activity">
                                                            <option value="sedentary">Sedentary</option>
                                                            <option value="light">Light Activity</option>
                                                            <option value="moderate">Moderate Activity</option>
                                                            <option value="active">Active</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="goal">Weight Goal</label>
                                                        <select class="form-select" id="goal">
                                                            <option value="loss">Weight Loss</option>
                                                            <option value="maintenance">Maintenance</option>
                                                            <option value="gain">Weight Gain</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <button type="button" class="btn calculate-btn" onclick="calculateCalories()">Calculate</button>

                                                <!-- Placeholder for the alert -->
                                                <div id="calorieAlert" class="mt-3"></div>
                                            </form>
                                        </section>

                                        <!-- Section 3: Calories in Common Food Categories -->
                                        <section class="container  mb-3">
                                            <h4 class="section-title">Calories in Common Food Categories</h4>
                                            <ul>
                                                <li>Vegetarian Meals: 300–500 calories per meal</li>
                                                <li>Vegan Meals: 250–450 calories per meal</li>
                                                <li>Low-Carb/Ketogenic: 400–600 calories per meal</li>
                                                <li>High-Protein Meals: 400–700 calories per meal</li>
                                                <li>Balanced/General Meals: 500–800 calories per meal</li>
                                            </ul>
                                        </section>

                                        <!-- Section 4: How to Estimate Calories in Your Meals -->
                                        <section class="container  mb-3">
                                            <h4 class="section-title">How to Estimate Calories in Your Meals</h4>
                                            <p>There are various ways to estimate calories in your meals:</p>
                                            <ul class="tips-list">
                                                <li><strong>Use Apps or Websites:</strong> Tools like MyFitnessPal can help you log meals and estimate calories.</li>
                                                <li><strong>Read Nutrition Labels:</strong> Check food labels for calorie information per serving.</li>
                                                <li><strong>Look Up Recipes on Cook Corner:</strong> Search our website for recipes that include calorie details.</li>
                                            </ul>
                                        </section>

                                        <!-- Section 5: Tips for Managing Calorie Intake -->
                                        <section class="container  mb-3">
                                            <h4 class="section-title">Tips for Managing Calorie Intake</h4>
                                            <ul class="tips-list">
                                                <li><strong>Meal Prep:</strong> Plan meals ahead to ensure balanced nutrition.</li>
                                                <li><strong>Portion Control:</strong> Learn the correct serving sizes to avoid overeating.</li>
                                                <li><strong>Stay Hydrated:</strong> Drinking water helps manage hunger levels.</li>
                                            </ul>
                                        </section>

                                        <!-- ---------------------------- -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn close-btn" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn save-btn">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ------------------------------------------------ -->
                    </div>
                    <div class="col-md-3">
                        <label for="meals" class="form-label">in</label>
                        <select id="meals" class="form-select">
                            <option value="1">1 meal</option>
                            <option value="2">2 meals</option>
                            <option value="3">3 meals</option>
                        </select>
                    </div>
                </div>



                <button type="submit" class="btn btn-primary btn-calculate mb-4">Generate</button>
            </form>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // JavaScript to toggle active class
        const dietOptions = document.querySelectorAll('.diet-option');

        dietOptions.forEach(option => {
            option.addEventListener('click', function() {
                dietOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
            });
        });

        function calculateCalories() {
            const weight = document.getElementById('weight').value;
            const height = document.getElementById('height').value;
            const age = document.getElementById('age').value;
            const gender = document.getElementById('gender').value;
            const activity = document.getElementById('activity').value;
            const goal = document.getElementById('goal').value;

            let BMR;

            if (gender === 'male') {
                BMR = 10 * weight + 6.25 * height - 5 * age + 5;
            } else {
                BMR = 10 * weight + 6.25 * height - 5 * age - 161;
            }

            let activityMultiplier = 1.2; // Sedentary
            if (activity === 'light') activityMultiplier = 1.375;
            else if (activity === 'moderate') activityMultiplier = 1.55;
            else if (activity === 'active') activityMultiplier = 1.725;

            const totalCalories = BMR * activityMultiplier;

            // Create the Bootstrap alert
            const alertDiv = document.getElementById('calorieAlert');
            alertDiv.innerHTML = `
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Your estimated daily calorie needs are <strong>${totalCalories.toFixed(0)}</strong> calories.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        `;
        }
    </script>


    <!-- ============================== Footer ==================================== -->
    <?php
    include('../Includes/Footer/footermain.php');  // tashin 
    ?>
    <!-- ============================== Footer End ==================================== -->

</body>

</html>