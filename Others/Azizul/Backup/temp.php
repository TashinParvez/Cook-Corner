<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Item Suggestion Input</title>
    <style>
        .suggestion-box {
            border: 1px solid #ccc;
            position: absolute;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
            background-color: white;
        }

        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }

        .selected-items {
            margin-bottom: 10px;
        }

        .selected-item {
            display: inline-block;
            background-color: #d1e7ff;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
        }

        .remove-item {
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="selected-items" id="selectedItems"></div>
    <input type="text" id="itemInput" placeholder="Start typing...">
    <div id="suggestions" class="suggestion-box"></div>

    <script>
        const suggestions = ["Chicken", "Cheese", "Chocolate", "Chips", "Chili", "Chia", "Cherries", "Chives"];
        let selectedItems = [];

        // Get DOM elements
        const itemInput = document.getElementById('itemInput');
        const suggestionBox = document.getElementById('suggestions');
        const selectedItemsContainer = document.getElementById('selectedItems');

        // Event listener for input field
        itemInput.addEventListener('input', function() {
            const query = itemInput.value.toLowerCase();
            const matchedSuggestions = suggestions.filter(item => item.toLowerCase().includes(query));
            showSuggestions(matchedSuggestions);
        });

        // Function to display suggestions
        function showSuggestions(matches) {
            suggestionBox.innerHTML = '';
            if (matches.length > 0) {
                matches.forEach(match => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.classList.add('suggestion-item');
                    suggestionItem.innerText = match;
                    suggestionItem.addEventListener('click', function() {
                        addItem(match);
                    });
                    suggestionBox.appendChild(suggestionItem);
                });
            }
        }

        // Function to add item to selected list
        function addItem(item) {
            if (!selectedItems.includes(item)) {
                selectedItems.push(item);

                // Create a div for selected item
                const selectedItem = document.createElement('div');
                selectedItem.classList.add('selected-item');
                selectedItem.innerText = item;

                // Add remove option
                const removeIcon = document.createElement('span');
                removeIcon.classList.add('remove-item');
                removeIcon.innerText = 'x';
                removeIcon.addEventListener('click', function() {
                    removeItem(item, selectedItem);
                });

                selectedItem.appendChild(removeIcon);
                selectedItemsContainer.appendChild(selectedItem);
            }

            // Clear input and suggestions after selection
            itemInput.value = '';
            suggestionBox.innerHTML = '';
        }

        // Function to remove item from the selected list
        function removeItem(item, element) {
            selectedItems = selectedItems.filter(i => i !== item);
            element.remove();
        }

        // Close the suggestion box when clicking outside
        document.addEventListener('click', function(e) {
            if (!itemInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.innerHTML = '';
            }
        });
    </script>
</body>
</html> -->


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Item Suggestion Input</title>
    <style>
        .suggestion-box {
            border: 1px solid #ccc;
            position: absolute;
            max-height: 150px;
            overflow-y: auto;
            width: 100%;
            background-color: white;
        }

        .suggestion-item {
            padding: 8px;
            cursor: pointer;
        }

        .suggestion-item:hover {
            background-color: #f0f0f0;
        }

        .selected-items {
            margin-bottom: 10px;
        }

        .selected-item {
            display: inline-block;
            background-color: #d1e7ff;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
        }

        .remove-item {
            margin-left: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="selected-items" id="selectedItems"></div>
    <input type="text" id="itemInput" placeholder="Start typing...">
    <div id="suggestions" class="suggestion-box"></div>

    <script>
        // Fixed list of suggestions
        const suggestions = ["Chicken", "Cheese", "Chocolate", "Chips", "Chili", "Chia", "Cherries", "Chives"];
        let selectedItems = [];

        // Get DOM elements
        const itemInput = document.getElementById('itemInput');
        const suggestionBox = document.getElementById('suggestions');
        const selectedItemsContainer = document.getElementById('selectedItems');

        // Event listener for input field
        itemInput.addEventListener('input', function() {
            const query = itemInput.value.toLowerCase();
            // Filter the fixed list based on the user's input
            const matchedSuggestions = suggestions.filter(item => item.toLowerCase().includes(query));
            showSuggestions(matchedSuggestions);
        });

        // Function to display suggestions
        function showSuggestions(matches) {
            suggestionBox.innerHTML = ''; // Clear previous suggestions
            if (matches.length > 0) {
                matches.forEach(match => {
                    const suggestionItem = document.createElement('div');
                    suggestionItem.classList.add('suggestion-item');
                    suggestionItem.innerText = match;
                    suggestionItem.addEventListener('click', function() {
                        addItem(match);
                    });
                    suggestionBox.appendChild(suggestionItem);
                });
            }
        }

        // Function to add item to selected list
        function addItem(item) {
            if (!selectedItems.includes(item)) {
                selectedItems.push(item);

                // Create a div for selected item
                const selectedItem = document.createElement('div');
                selectedItem.classList.add('selected-item');
                selectedItem.innerText = item;

                // Add remove option
                const removeIcon = document.createElement('span');
                removeIcon.classList.add('remove-item');
                removeIcon.innerText = 'x';
                removeIcon.addEventListener('click', function() {
                    removeItem(item, selectedItem);
                });

                selectedItem.appendChild(removeIcon);
                selectedItemsContainer.appendChild(selectedItem);
            }

            // Clear input and suggestions after selection
            itemInput.value = '';
            suggestionBox.innerHTML = '';
        }

        // Function to remove item from the selected list
        function removeItem(item, element) {
            selectedItems = selectedItems.filter(i => i !== item);
            element.remove();
        }

        // Close the suggestion box when clicking outside
        document.addEventListener('click', function(e) {
            if (!itemInput.contains(e.target) && !suggestionBox.contains(e.target)) {
                suggestionBox.innerHTML = '';
            }
        });
    </script>
</body>
</html> -->

<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipes_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form values
$recipeName = $_POST['recipeName'];
$occasions = $_POST['occasions']; // This will be an array of selected occasions

// Convert the selected occasions array to a string (e.g., 'eidul_fitr,marriage')
$occasionsString = implode(',', $occasions);

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO recipes (name, occasions) VALUES (?, ?)");
$stmt->bind_param("ss", $recipeName, $occasionsString);

// Execute the statement
if ($stmt->execute()) {
    echo "Recipe added successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Occasion Selection</title>
    <style>
        .occasion-container {
            margin-bottom: 15px;
        }
        .occasion-item {
            display: block;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <form action="submit_recipe.php" method="POST">
        <label for="recipeName">Recipe Name:</label>
        <input type="text" name="recipeName" id="recipeName" required>
        
        <div class="occasion-container">
            <label for="occasions">Select Occasions:</label>
            <select name="occasions[]" id="occasions" multiple>
                <option value="eidul_fitr">Eid ul-Fitr</option>
                <option value="eidul_adha">Eid ul-Adha</option>
                <option value="maghi_purnima">Maghi Purnima</option>
                <option value="marriage">Marriage</option>
                <option value="birthday">Birthday</option>
            </select>
        </div>

        <input type="submit" value="Submit Recipe">
    </form>
</body>
</html>
