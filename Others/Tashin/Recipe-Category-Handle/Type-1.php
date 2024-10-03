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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2>Add a New Recipe</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="occasions">Select Occasions:</label>
                <select name="occasions[]" id="occasions" multiple="multiple" style="width: 100%;">
                    <?php foreach ($occasions as $occasion): ?>
                        <option value="<?php echo htmlspecialchars($occasion); ?>"><?php echo htmlspecialchars($occasion); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#occasions').select2({
                placeholder: "Choose Occasions",
                allowClear: true
            });
        });
    </script>
</body>

</html>

<?php
// Close the database connection
mysqli_close($conn);
?>