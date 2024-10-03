<?php
// Include your database connection file
include('/Cook-Corner/Includes/Database Connection/database_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission
    $selectedOccasions = isset($_POST['occasions']) ? $_POST['occasions'] : [];

    // Assuming you have a variable $recipeId that represents the recipe being added
    $recipeId = 1; // Replace with your actual recipe ID logic

    // Handle the selected occasions
    if (!empty($selectedOccasions)) {
        foreach ($selectedOccasions as $occasion) {
            // Use prepared statements to avoid SQL injection
            $stmt = $conn->prepare("INSERT INTO recipe_occasions (recipe_id, occasion) VALUES (?, ?)");
            $stmt->bind_param("is", $recipeId, $occasion);
            $stmt->execute();
        }
        echo "<div class='alert alert-success'>Your recipe has been successfully added with selected occasions!</div>";
    }
}

// Fetching the list of occasions for display
$occasions = ["Eidul Fitar", "Eid Azha", "Maghi Purnima", "Marriage", "Birthday"]; // Add more occasions as needed
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Recipe</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Styling for dropdown with checkboxes */
        .dropdown-toggle::after {
            display: none;
            /* Hide the default arrow */
        }

        .dropdown-menu {
            max-height: 200px;
            /* Set a maximum height for the dropdown */
            overflow-y: auto;
            /* Enable scrolling */
        }

        .dropdown-item input {
            margin-right: 10px;
            /* Space between checkbox and label */
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h2>Add a New Recipe</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="occasions">Select Occasions:</label>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Choose Occasions
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach ($occasions as $occasion): ?>
                            <label class="dropdown-item">
                                <input type="checkbox" name="occasions[]" value="<?php echo htmlspecialchars($occasion); ?>" onchange="updateSelectedText()">
                                <?php echo htmlspecialchars($occasion); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mt-2" id="selected-occasions">Selected Occasions: None</div>
            </div>

            <button type="submit" class="btn btn-primary">Add Recipe</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to update selected occasions text
        function updateSelectedText() {
            const checkboxes = document.querySelectorAll('input[name="occasions[]"]');
            const selected = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            document.getElementById('selected-occasions').textContent = selected.length > 0 ?
                'Selected Occasions: ' + selected.join(', ') :
                'Selected Occasions: None';
        }

        // Prevent dropdown from closing on click
        document.querySelectorAll('.dropdown-item input').forEach(function(checkbox) {
            checkbox.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent the dropdown from closing
            });
        });
    </script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>