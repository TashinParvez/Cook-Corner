<?php
include("../Includes/Database Connection/database_connection.php");

// Get the query from the URL
$query = $_GET['query'] ?? '';

// Prepare an array for suggestions
$suggestions = [];

// Always provide the top 8 best suggestions
$top_suggestions = [];

// Fetch the top 8 suggestions from the database
$top_stmt = $conn->prepare(

       "SELECT title AS combined_info  -- Recipe Info
        FROM `recipe_info` 
        WHERE title IS NOT NULL 

        UNION
        SELECT subtitle AS combined_info 
        FROM `recipe_info` 
        WHERE subtitle IS NOT NULL

        -- Ingredients Info
        UNION
        SELECT ingredient_name AS combined_info
        FROM `ingredient_info`
        WHERE ingredient_name IS NOT NULL

        UNION
        SELECT category AS combined_info
        FROM `ingredient_info`
        WHERE category IS NOT NULL 

        -- Recipe Category
        UNION
        SELECT name AS combined_info
        FROM `recipe_category` 
        WHERE name IS NOT NULL 

        -- Cuisine Type
        UNION
        SELECT cuisine_name AS combined_info
        FROM `cuisine_type` 
        WHERE cuisine_name IS NOT NULL 

        -- Meal Type
        UNION
        SELECT meal_name AS combined_info 
        FROM `meal_type` 
        WHERE meal_name IS NOT NULL 

        -- Cooking Method
        UNION
        SELECT method_name AS combined_info
        FROM `cooking_method` 
        WHERE method_name IS NOT NULL

        -- Spices
        UNION
        SELECT spice_name AS combined_info
        FROM `spices` 
        WHERE spice_name IS NOT NULL

        -- Cities
        UNION
        SELECT city_name AS combined_info 
        FROM `cities` 
        WHERE city_name IS NOT NULL

        -- Events
        UNION
        SELECT event_name AS combined_info 
        FROM `event_info` 
        WHERE event_name IS NOT NULL

        -- Dietary Preferences
        UNION
        SELECT preference_name AS combined_info 
        FROM `dietary_preferences` 
        WHERE preference_name IS NOT NULL

        -- Health Focus
        UNION
        SELECT focus_name AS combined_info
        FROM `health_focus` 
        WHERE focus_name IS NOT NULL

        -- Kitchen Tips Titles
        UNION
        SELECT tips_title AS combined_info
        FROM `kitchen_tips` 
        WHERE tips_title IS NOT NULL

        -- Kitchen Tips Descriptions
        UNION
        SELECT description AS combined_info
        FROM `kitchen_tips` 
        WHERE description IS NOT NULL

        -- Kitchen Tips Category Names
        UNION
        SELECT name AS combined_info
        FROM `kitchen_tips_category` 
        WHERE name IS NOT NULL

        -- Kitchen Tips Category Descriptions
        UNION
        SELECT description AS combined_info
        FROM `kitchen_tips_category` 
        WHERE description IS NOT NULL

        ORDER BY RAND() 
        LIMIT 8;"
);

// $top_stmt->execute();
// $top_stmt->bind_result($recipe_name);

// while ($top_stmt->fetch()) {
//     $top_suggestions[] = $recipe_name;
// }
// $top_stmt->close();

$top_stmt->execute();
$top_stmt->store_result(); // Store result for later use

if ($top_stmt->num_rows > 0) {
    $top_stmt->bind_result($suggestion);
    while ($top_stmt->fetch()) {
        $top_suggestions[] = $suggestion; // Store each suggestion in the array
    }
}

// Clean up
$top_stmt->close();

// debug
print_r($top_suggestions);
error_reporting(E_ALL);
ini_set('display_errors', 1);




// If there is a search query, fetch suggestions based on it
if ($query) {
    $stmt = $conn->prepare(
        "SELECT recipe_name 
                            FROM recipe_info 
                            WHERE recipe_name 
                            LIKE CONCAT('%', ?, '%') 
                            LIMIT 5"
    );
    $stmt->bind_param('s', $query);
    $stmt->execute();
    $stmt->bind_result($recipe_name);

    while ($stmt->fetch()) {
        $suggestions[] = $recipe_name;
    }

    $stmt->close();
}

// Close the database connection
mysqli_close($conn);

// Combine both suggestions: If there are matching suggestions, return them; otherwise, return the top suggestions
$suggestions = !empty($suggestions) ? $suggestions : $top_suggestions;

// Return the suggestions as a JSON array
echo json_encode($suggestions);
