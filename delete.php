<?PHP
$sql = " 


SELECT 
    ri.recipe_id AS id, 
    ri.title AS title, 
    ri.description AS description, 
    ri.rating AS rating, 
    ri.image AS img
FROM 
    recipe_info AS ri
-- Join for events
LEFT JOIN 
    junction_event_recipes AS jer 
    ON jer.recipe_id = ri.recipe_id
LEFT JOIN 
    event_info 
    ON event_info.event_id = jer.event_id
-- Join for meal types
LEFT JOIN 
    junction_meal_type_recipe_info AS jmt 
    ON jmt.recipe_id = ri.recipe_id
LEFT JOIN 
    meal_type 
    ON meal_type.meal_type_id = jmt.meal_type_id
-- Join for recipe categories
LEFT JOIN 
    junction_recipe_info_recipe_category AS jrrc 
    ON jrrc.recipe_id = ri.recipe_id
LEFT JOIN 
    recipe_category 
    ON recipe_category.id = jrrc.category_id
-- Join for cuisines
LEFT JOIN 
    junction_cuisine_recipe AS jcr 
    ON jcr.recipe_id = ri.recipe_id
LEFT JOIN 
    cuisine_type 
    ON cuisine_type.id = jcr.cuisine_id
-- Join for ingredients
LEFT JOIN 
    junction_recipe_ingredients AS jri 
    ON jri.recipe_id = ri.recipe_id
LEFT JOIN 
    ingredient_info 
    ON ingredient_info.ingredient_id = jri.ingredient_id
-- WHERE clause to search across different fields
WHERE 
    ri.title LIKE '%$eid%' OR
    ri.subtitle LIKE '%$eid%' OR
    ri.description LIKE '%$eid%' OR
    ri.notes LIKE '%$eid%' OR
    event_info.event_name LIKE '%$eid%' OR
    meal_type.meal_name LIKE '%$eid%' OR
    meal_type.description LIKE '%$eid%' OR
    recipe_category.name LIKE '%$eid%' OR
    cuisine_type.cuisine_name LIKE '%$eid%' OR
    ingredient_info.ingredient_name LIKE '%$eid%';

GROUP BY 
    ri.recipe_id;

    

";
?>