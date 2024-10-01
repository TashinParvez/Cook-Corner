<?php
$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;
$limit = isset($_GET['limit']) ? intval($_GET['limit']) : 12;

// Assuming $cards contains the data for the cards
// Replace this with the actual card fetching logic from your database

// For demonstration purposes, I am using a loop with dummy data
for ($i = $offset; $i < $offset + $limit; $i++) {
    echo '<div class="card item">';
    echo '<div class="card-image"><img src="image' . $i . '.jpg" alt="Card Image"></div>';
    echo '<h5 class="card-title">Card Title ' . $i . '</h5>';
    echo '</div>';
}
?>
