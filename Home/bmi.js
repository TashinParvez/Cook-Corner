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

// Function to hide the result box
function hideResultBox() {
  document.getElementById('resultBox').style.display = 'none';
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
  errorMessages.forEach(function (msg) {
    msg.remove();
  });
}