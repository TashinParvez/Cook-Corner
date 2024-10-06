
//...................... Database Connection ..............................
// include("../Includes/Database Connection/database_connection.php");  // for home page
// include("../../Includes/Database Connection/database_connection.php");  // for only navbar

include("/Cook-Corner/Includes/Database-connection-new/database_connection.php");   // new for search

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
// --------------------------------------------- fetch data For search ------------------------
$data = array();

// Fetch data ( FROM recipe_info and ingredient_info tables )
$sql = "SELECT title AS combined_info FROM `recipe_info` WHERE title IS NOT NULL 
        UNION
        SELECT subtitle AS combined_info FROM `recipe_info` WHERE subtitle IS NOT NULL
        UNION
        SELECT ingredient_name AS combined_info FROM `ingredient_info` WHERE ingredient_name IS NOT NULL
        UNION
        SELECT category AS combined_info FROM `ingredient_info` WHERE category IS NOT NULL";

$result = mysqli_query($conn, $sql);  // get query result 

foreach ($result as $row) {
    $data[] = $row['combined_info'];
}
