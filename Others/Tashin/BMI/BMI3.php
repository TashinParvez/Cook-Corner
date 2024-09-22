<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .card {
            padding: 20px;
        }

        .bmi-chart {
            margin-left: 50px;
        }

        .result-box {
            margin-top: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            display: none;
            /* Hidden by default */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <!-- BMI Calculator Form -->
            <div class="col-md-6">
                <div class="card">
                    <h2>Calculate Your BMI</h2>
                    <p>BMI calculator generates the number of calories your body burns per day at rest. Your BMI with activity factor is the number of calories your body burns per day based on the activity factor you selected.</p>
                    <form id="bmiForm">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="height" class="form-label">Height (cm)*</label>
                                <input type="number" class="form-control" id="height" placeholder="Enter height">
                            </div>
                            <div class="col">
                                <label for="weight" class="form-label">Weight (kg)*</label>
                                <input type="number" class="form-control" id="weight" placeholder="Enter weight">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="age" class="form-label">Age*</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter age">
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label">Gender*</label>
                                <select class="form-select" id="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="activity" class="form-label">Select an activity factor*</label>
                            <select class="form-select" id="activity">
                                <option value="1.2">Little or no Exercise / desk job</option>
                                <option value="1.375">Light exercise / sports 1-3 days/week</option>
                                <option value="1.55">Moderate exercise / sports 3-5 days/week</option>
                                <option value="1.725">Hard exercise / sports 6-7 days a week</option>
                                <option value="1.9">Very hard exercise / physical job</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-dark" onclick="calculateBMI()">Calculate</button>
                    </form>
                </div>
            </div>
            <!-- BMI Chart -->
            <div class="col-md-5 bmi-chart">
                <h2>BMI Calculator Chart</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>BMI</th>
                            <th>Weight Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Below 18.5</td>
                            <td>Underweight</td>
                        </tr>
                        <tr>
                            <td>18.5 - 24.9</td>
                            <td>Healthy</td>
                        </tr>
                        <tr>
                            <td>25.0 - 29.9</td>
                            <td>Overweight</td>
                        </tr>
                        <tr>
                            <td>30.0 and Above</td>
                            <td>Obese</td>
                        </tr>
                    </tbody>
                </table>
                <p>*BMR Metabolic Rate / BMI Body Mass Index</p>

                <!-- BMI Result Box -->
                <div id="resultBox" class="result-box">
                    <p id="bmiResultText"></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // function calculateBMI() {
        //     var height = document.getElementById('height').value;
        //     var weight = document.getElementById('weight').value;

        //     // Check if height and weight are positive values
        //     if (height > 0 && weight > 0) {
        //         var bmi = weight / ((height / 100) * (height / 100)); // BMI Calculation
        //         var bmiStatus = "";

        //         // Determine weight status based on BMI value
        //         if (bmi < 18.5) {
        //             bmiStatus = "Underweight";
        //         } else if (bmi >= 18.5 && bmi <= 24.9) {
        //             bmiStatus = "Healthy";
        //         } else if (bmi >= 25.0 && bmi <= 29.9) {
        //             bmiStatus = "Overweight";
        //         } else {
        //             bmiStatus = "Obese";
        //         }

        //         // Update the result box content and show it
        //         var resultBox = document.getElementById('resultBox');
        //         var bmiResultText = document.getElementById('bmiResultText');
        //         resultBox.style.display = 'block'; // Ensure the result box is shown
        //         bmiResultText.innerHTML = "Your BMI is " + bmi.toFixed(2) + " (" + bmiStatus + ")";

        //     } else {
        //         // Handle cases where height or weight is not valid
        //         alert("Please enter valid height and weight.");
        //     }
        // }

        // ----------------------------------------------- func 2 -------------------------------------------------------

        // function calculateBMI() {
        //     var height = document.getElementById('height');
        //     var weight = document.getElementById('weight');
        //     var age = document.getElementById('age');

        //     var isValid = true; // Flag to check if all inputs are valid

        //     // Reset all borders first
        //     height.style.border = '';
        //     weight.style.border = '';
        //     age.style.border = '';

        //     // Check if height is positive
        //     if (height.value <= 0) {
        //         height.style.border = '2px solid red';
        //         isValid = false;
        //     }

        //     // Check if weight is positive
        //     if (weight.value <= 0) {
        //         weight.style.border = '2px solid red';
        //         isValid = false;
        //     }

        //     // Check if age is positive
        //     if (age.value <= 0) {
        //         age.style.border = '2px solid red';
        //         isValid = false;
        //     }

        //     // If all inputs are valid, proceed with BMI calculation
        //     if (isValid) {
        //         var bmi = weight.value / ((height.value / 100) * (height.value / 100));
        //         var bmiStatus = "";

        //         // Determine weight status based on BMI value
        //         if (bmi < 18.5) {
        //             bmiStatus = "Underweight";
        //         } else if (bmi >= 18.5 && bmi <= 24.9) {
        //             bmiStatus = "Healthy";
        //         } else if (bmi >= 25.0 && bmi <= 29.9) {
        //             bmiStatus = "Overweight";
        //         } else {
        //             bmiStatus = "Obese";
        //         }

        //         // Update the result box content and show it
        //         var resultBox = document.getElementById('resultBox');
        //         var bmiResultText = document.getElementById('bmiResultText');
        //         resultBox.style.display = 'block'; // Ensure the result box is shown
        //         bmiResultText.innerHTML = "Your BMI is " + bmi.toFixed(2) + " (" + bmiStatus + ")";
        //     } else {
        //         alert("Please enter valid height, weight, and age.");
        //     }
        // }


        // ----------------------------------------------- func 3 -------------------------------------------------------
        function calculateBMI() {
            var height = document.getElementById('height');
            var weight = document.getElementById('weight');
            var age = document.getElementById('age');
            var gender = document.getElementById('gender').value;
            var activityFactor = document.getElementById('activity').value;

            // Remove any existing error messages
            removeErrorMessages();

            var isValid = true; // Flag to check if all inputs are valid

            // Reset all borders first
            height.style.border = '';
            weight.style.border = '';
            age.style.border = '';

            // Check if height is positive
            if (height.value <= 0) {
                height.style.border = '2px solid red';
                displayErrorMessage(height, "Please enter a valid height.");
                isValid = false;
            }

            // Check if weight is positive
            if (weight.value <= 0) {
                weight.style.border = '2px solid red';
                displayErrorMessage(weight, "Please enter a valid weight.");
                isValid = false;
            }

            // Check if age is positive
            if (age.value <= 0) {
                age.style.border = '2px solid red';
                displayErrorMessage(age, "Please enter a valid age.");
                isValid = false;
            }

            // If all inputs are valid, proceed with BMI and BMR calculation
            if (isValid) {
                // Calculate BMI
                var bmi = weight.value / ((height.value / 100) * (height.value / 100));
                var bmiStatus = "";

                // Determine weight status based on BMI value
                if (bmi < 18.5) {
                    bmiStatus = "Underweight";
                } else if (bmi >= 18.5 && bmi <= 24.9) {
                    bmiStatus = "Healthy";
                } else if (bmi >= 25.0 && bmi <= 29.9) {
                    bmiStatus = "Overweight";
                } else {
                    bmiStatus = "Obese";
                }

                // Calculate BMR based on gender
                var bmr;
                if (gender === "Male") {
                    bmr = 88.362 + (13.397 * weight.value) + (4.799 * height.value) - (5.677 * age.value);
                } else {
                    bmr = 447.593 + (9.247 * weight.value) + (3.098 * height.value) - (4.330 * age.value);
                }

                // Apply activity factor to BMR
                var bmrWithActivity = bmr * activityFactor;

                // Update the result box content and show it
                var resultBox = document.getElementById('resultBox');
                var bmiResultText = document.getElementById('bmiResultText');
                resultBox.style.display = 'block'; // Ensure the result box is shown
                bmiResultText.innerHTML = "Your BMI is " + bmi.toFixed(2) + " (" + bmiStatus + ")" +
                    "<br>Your BMR w/Activity Factor is " + bmrWithActivity.toFixed(2) + " kcal/day";
            }
        }

        // Function to display error message below the input field
        function displayErrorMessage(inputElement, message) {
            var errorMessage = document.createElement('div');
            errorMessage.style.color = 'red';
            errorMessage.style.fontSize = '12px';
            errorMessage.className = 'error-message'; // Added for easier future manipulation
            errorMessage.innerText = message;
            inputElement.parentNode.appendChild(errorMessage);
        }

        // Function to remove existing error messages before recalculating
        function removeErrorMessages() {
            var errorMessages = document.querySelectorAll('.error-message');
            errorMessages.forEach(function(msg) {
                msg.remove();
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>