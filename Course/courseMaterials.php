<?php
include('../Includes/Navbar/navbarMain.php');
include("../Includes/Database Connection/database_connection.php");

$clicked_course = 1;  // have to change [get from previous page]

// ---------------------- course info
$sql = "SELECT course_title, c.description, c.playlist_link
        FROM `course` as c
        WHERE c.course_id = $clicked_course;"; // Using $clicked_course instead of hard-coded 1

$resultantLabel = mysqli_query($conn, $sql);
$course_info = mysqli_fetch_all($resultantLabel)[0];

// ---------------------------------------- FOR outlin
$playlistID =  $course_info[2];


$apiKey =  "AIzaSyBm4S9TTRDo8Loo3xpFkm9ihwYRjOrSl7c"; //-------- Tashin API Key [HAHAHHAHAHHAHAHHA] 


function getVideoInfoFromPlaylist($playlistID, $apiKey)
{
    $videoInfo = [];
    $nextPageToken = '';

    do {
        $url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId={$playlistID}&pageToken={$nextPageToken}&key={$apiKey}";

        $response = file_get_contents($url);
        $data = json_decode($response, true);

        if (isset($data['items'])) {
            foreach ($data['items'] as $item) {
                $videoTitle = $item['snippet']['title'];
                $videoId = $item['snippet']['resourceId']['videoId'];
                $videoLink = "https://www.youtube.com/watch?v={$videoId}";

                $videoInfo[] = [
                    'name' => $videoTitle,
                    'link' => $videoLink
                ];
            }
        }

        $nextPageToken = isset($data['nextPageToken']) ? $data['nextPageToken'] : '';
    } while ($nextPageToken);
    return $videoInfo;
}

$allVideos = getVideoInfoFromPlaylist($playlistID, $apiKey);

mysqli_free_result($resultantLabel);
mysqli_close($conn);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- favicon -->
    <link rel="icon" href="../Images/logo/fav-icon.png" />

    <!-- css  -->
    <link rel="stylesheet" href="../Includes/Navbar/navbarMain.css"> <!-- Navbar CSS -->

</head>

<body>

    <?php include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up button 
    ?>

    <div class="container mt-5">

        <h1 class="text-center"><?php echo htmlspecialchars($course_info[0]); ?></h1>
        <p class="fs-5  text-center"><?php echo htmlspecialchars($course_info[1]); ?></p>
        <div class="mb-5 text-center">
            <!-- Updated Link to Download Outlines -->
            <a href="generate_pdf.php" class="btn btn-danger btn-lg px-4">Download Outlines</a>
        </div>

        <div class="container">
            <div class="container mt-4">
                <h5>Course Progress</h5>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">Course Materials: </h6>

                <?php
                $itr = 1;
                foreach ($allVideos as $oneClass) { ?>
                    <div class="d-flex text-muted pt-3">
                        <!-- Icon -->
                        <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                        </svg>
                        <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                            <div class="d-flex justify-content-between">
                                <strong class="text-gray-dark">Class <?php echo htmlspecialchars($itr); ?></strong>
                            </div>
                            <span class="d-block"><?php echo htmlspecialchars($oneClass['name']); ?></span>
                        </div>
                    </div>
                <?php
                    $itr += 1;
                } ?>

                <small class="d-block text-end mt-3">
                    <a href="#" class="text-danger text-decoration-none">Start learning</a>
                </small>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('../Includes/Footer/footermain.php'); ?>

</body>

</html>