<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube Video Embedder</title>
</head>

<body>
    <h1>YouTube Video Embedder</h1>

    <!-- Form to take input -->
    <form method="POST" action="">
        <label for="youtubeLink">YouTube Link:</label>
        <input type="text" id="youtubeLink" name="youtubeLink" required placeholder="Enter YouTube link">
        <br><br>

        <label for="startTime">Start Time (seconds):</label>
        <input type="number" id="startTime" name="startTime" required placeholder="Start time in seconds">
        <br><br>

        <label for="endTime">End Time (seconds):</label>
        <input type="number" id="endTime" name="endTime" required placeholder="End time in seconds">
        <br><br>

        <button type="submit">Generate Embed</button>
    </form>

    <br><br>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Get the form inputs
        $youtubeLink = $_POST['youtubeLink'];
        $startTime = $_POST['startTime'];
        $endTime = $_POST['endTime'];

        // Function to generate YouTube embed iframe
        function generateYouTubeEmbed($link, $startTime, $endTime)
        {
            // Extract the video ID from the provided link
            parse_str(parse_url($link, PHP_URL_QUERY), $queryParams);
            if (!isset($queryParams['v'])) {
                echo "Invalid YouTube link.";
                return;
            }
            $videoId = $queryParams['v'];

            // Create the embed URL
            $embedUrl = "https://www.youtube.com/embed/" . $videoId . "?start=" . $startTime . "&end=" . $endTime;

            // Output the iframe
            echo '<iframe width="560" height="315" 
                src="' . $embedUrl . '" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
                </iframe>';
        }

        // Call the function to generate the iframe
        generateYouTubeEmbed($youtubeLink, $startTime, $endTime);
    }
    ?>

</body>

</html>