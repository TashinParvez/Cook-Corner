const apiKey = "AIzaSyBm4S9TTRDo8Loo3xpFkm9ihwYRjOrSl7c"; // Replace with your API key
const playlistId = "PLl0KD3g-oDOHpWRyyGBUJ9jmul0lUOD80"; // Replace with the playlist ID

fetch(
  `https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=${playlistId}&maxResults=50&key=${apiKey}`
)
  .then((response) => response.json())
  .then((data) => {
    console.log("Total videos: ", data.pageInfo.totalResults);
    data.items.forEach((item) => {
      const videoTitle = item.snippet.title;
      const videoUrl = `https://www.youtube.com/watch?v=${item.snippet.resourceId.videoId}`;
      console.log(`Title: ${videoTitle}, URL: ${videoUrl}`);
    });
  })
  .catch((error) => console.error("Error:", error));
