document.addEventListener('DOMContentLoaded', function () {
    // Get the "Add Step" button and the directions list
    const addStepButton = document.getElementById('addStep');
    const directionsList = document.getElementById('directionsList');

    // Add an event listener to the "Add Step" button
    addStepButton.addEventListener('click', function () {
        // Count the current number of steps to increment step number
        const currentStepCount = directionsList.querySelectorAll('input[name="direction[]"]').length;
        const nextStepNumber = currentStepCount + 1;

        // Create a new input element for the next step
        const newStepInput = document.createElement('input');
        newStepInput.setAttribute('type', 'text');
        newStepInput.setAttribute('name', 'direction[]');
        newStepInput.setAttribute('class', 'form-control mb-2');
        newStepInput.setAttribute('placeholder', `Step ${nextStepNumber}`);
        newStepInput.required = true;

        // Append the new step input to the directions list
        directionsList.appendChild(newStepInput);
    });
});
document.addEventListener('DOMContentLoaded', function () {
    // Reference to form
    const form = document.getElementById('recipeForm');
    
    // Reference to submit button
    const submitButton = document.getElementById('submitRecipe');
    
    // Reference to modal confirm button
    const confirmButton = document.getElementById('confirmSubmit');

    // Prevent form submission and show the modal
    submitButton.addEventListener('click', function (e) {
        e.preventDefault();  // Prevent default form submission
        const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
        confirmModal.show(); // Show the confirmation modal
    });

    // Submit the form when confirmation is clicked
    confirmButton.addEventListener('click', function () {
        form.submit();  // Submit the form once confirmed
    });
});
