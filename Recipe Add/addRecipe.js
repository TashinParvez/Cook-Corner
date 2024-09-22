document.addEventListener('DOMContentLoaded', () => {
    // Add Ingredient Button Functionality
    document.getElementById('addIngredient').addEventListener('click', () => {
        const ingredientInput = document.createElement('input');
        ingredientInput.type = 'text';
        ingredientInput.name = 'ingredient[]';
        ingredientInput.classList.add('form-control', 'mb-2');
        ingredientInput.placeholder = 'e.g. 1 cup sugar';
        document.getElementById('ingredientsList').appendChild(ingredientInput);
    });

    // Add Step Button Functionality
    document.getElementById('addStep').addEventListener('click', () => {
        const stepInput = document.createElement('input');
        stepInput.type = 'text';
        stepInput.name = 'direction[]';
        stepInput.classList.add('form-control', 'mb-2');
        stepInput.placeholder = 'Step ' + (document.querySelectorAll('#directionsList input').length + 1);
        document.getElementById('directionsList').appendChild(stepInput);
    });

    // Add Note Button Functionality
    document.getElementById('addNote').addEventListener('click', () => {
        const noteEntry = document.createElement('div');
        noteEntry.classList.add('note-entry', 'mb-3');
        
        // Note Title input
        const noteTitle = document.createElement('input');
        noteTitle.type = 'text';
        noteTitle.name = 'noteTitle[]';
        noteTitle.classList.add('form-control', 'mb-2');
        noteTitle.placeholder = 'Note title (e.g., Tip about storage)';
        noteEntry.appendChild(noteTitle);
        
        // Note Description textarea
        const noteDescription = document.createElement('textarea');
        noteDescription.name = 'noteDescription[]';
        noteDescription.classList.add('form-control', 'mb-2');
        noteDescription.rows = 3;
        noteDescription.placeholder = 'Add a note description (e.g., Keep in the fridge for 3 days)';
        noteEntry.appendChild(noteDescription);
        
        // Append new note entry to notesList
        document.getElementById('notesList').appendChild(noteEntry);
    });

    // Cancel Button Functionality
    document.getElementById('cancel').addEventListener('click', () => {
        document.getElementById('recipeForm').reset();
    });
});
