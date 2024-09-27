<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get the JSON data sent from JavaScript
    $videos = json_decode(file_get_contents('php://input'), true);
    $videoArray = [];

    // Populate the PHP array with video titles and URLs
    foreach ($videos as $index => $video) {
        $videoArray[] = [
            'name' => $video['title'],
            'link' => $video['url']
        ];
    }

    // Generate HTML output from the PHP array
    $output = '<ul>';
    foreach ($videoArray as $index => $video) {
        $output .= '<li>' . ($index + 1) . '. ' . htmlspecialchars($video['name']) . ' - <a href="' . htmlspecialchars($video['link']) . '" target="_blank">' . htmlspecialchars($video['link']) . '</a></li>';
    }
    $output .= '</ul>';

    // Print the output
    echo $output;
} else {
    echo 'No data received.';
}
?>
