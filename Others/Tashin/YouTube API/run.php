<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cook Corner - YouTube Playlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Cook Corner - YouTube Playlist</h1>
        <button id="fetchVideos" class="btn btn-primary">Get Playlist Videos</button>
        <div id="videoList" class="mt-4"></div>
    </div>

    <script>
        document.getElementById('fetchVideos').addEventListener('click', function() {
            
            const apiKey = "HAHAHAHAHHAHA"; // Replace HAHAHAHAHHAHA with your API key
            const playlistId = "PLl0KD3g-oDOHpWRyyGBUJ9jmul0lUOD80"; // Replace with the playlist ID

            fetch(`https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=${playlistId}&maxResults=50&key=${apiKey}`)
                .then(response => response.json())
                .then(data => {
                    let videoListHtml = '<ul>';
                    data.items.forEach((item, index) => {
                        const videoTitle = item.snippet.title;
                        const videoUrl = `https://www.youtube.com/watch?v=${item.snippet.resourceId.videoId}`;
                        videoListHtml += `<li>${index + 1}. ${videoTitle} - <a href="${videoUrl}" target="_blank">${videoUrl}</a></li>`;
                    });
                    videoListHtml += '</ul>';
                    document.getElementById('videoList').innerHTML = videoListHtml;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>
</body>

</html>