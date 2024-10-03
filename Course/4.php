<?php
include('../Includes/Navbar/navbarMain.php');
include("../Includes/Database Connection/database_connection.php");

$clickedCourseID = 1;

$sql = "SELECT `course_id`,`course_title`,`playlist_link`
        FROM `course` 
        WHERE course_id = $clickedCourseID;";

$resultantLabel = mysqli_query($conn, $sql);
$course_Info = mysqli_fetch_assoc($resultantLabel);

$playlistID =  $course_Info['playlist_link'];

$apiKey =  "HAHAHHHAHAHHA"; // Tashin API Key


$apiUrl = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=50&playlistId={$playlistID}&key={$apiKey}";
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);
$allVideos = [];

if (!empty($data['items'])) {


    foreach ($data['items'] as $item) {
        $videoTitle = $item['snippet']['title'];
        $videoId = $item['snippet']['resourceId']['videoId'];
        $videoLink = "https://www.youtube.com/embed/{$videoId}"; // Embed format
        $allVideos[] = [
            'name' => $videoTitle,
            'link' => $videoLink
        ];
    }
}

// print_r($allVideos);


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
    <style>
        /* Content wrapper adjustments */
        .content-wrapper {
            margin-left: 280px;
            /* Left space for the sidebar */
            padding-top: 70px;
            /* Space for the navbar */
        }

        /* Main flex container for right content */
        .right-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 70px);
            /* Subtract the navbar height */
            margin-left: 280px;
            /* Subtract sidebar width */
        }

        /* Container for centering content */
        .container-content {
            width: 100%;
            max-width: 800px;
            /* Maximum width of the content */
            text-align: center;
            /* Horizontally center the text */
            padding: 20px;
        }

        /* Embedded video adjustments */
        .embed-responsive {
            position: relative;
            display: block;
            width: 100%;
            padding: 0;
            overflow: hidden;
            padding-bottom: 56.25%;
        }

        .embed-responsive iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        /* Buttons alignment */
        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            /* Space between buttons */
        }
    </style>
</head>

<body>

    <?php
    include '../Includes/Scroll UP/scrollUpBtn.php'; // scroll up // tashin
    ?>


    <div class="container row">

        <!-------------------- Left side sidebar -------------------->

        <div class="col-3">
            <div class="flex-shrink-0 p-3 bg-white sidebar" style="width: 280px; height: 100vh; overflow-y: auto; position: fixed;">
                <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
                    <span class="fs-5 fw-semibold">Project 2024</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <?php
                    $itr = 1;
                    foreach ($allVideos as $oneClass) { ?>
                        <li class="mb-1">
                            <a href="#" class="class-link" data-videolink="<?php echo htmlspecialchars($oneClass['link']); ?>">
                                Class <?php echo htmlspecialchars($itr); ?>
                            </a>
                        </li>
                    <?php
                        $itr += 1;
                    } ?>
                    <li class="border-top my-3"></li>
                </ul>
            </div>
        </div>

        <!-------------------- right side -------------------->
        <div class="col-9">
            <!-- Main container for centering content -->
            <div class="right-container">
                <!-- Content wrapper -->
                <div class="container-content">
                    <!-- Course Progress Bar -->
                    <div class="container mt-4">
                        <h5>Course Progress</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                    </div>

                    <!-- Class Title -->
                    <h2 id="classTitle">Class Title: Introduction to Topic</h2>

                    <!-- Class Description -->
                    <p class="mt-3">This class introduces the fundamental concepts of the topic. It provides an overview of the key areas to be covered and the learning objectives you should achieve by the end of the session.</p>

                    <!-- Embedded Video -->
                    <div class="embed-responsive">
                        <iframe id="classVideo" class="embed-responsive-item" src="" allowfullscreen></iframe>
                    </div>



                    <!-- Buttons: Go to Previous Class, Mark as Complete -->
                    <div class="buttons-container mt-4">
                        <a href="#" class="btn btn-secondary">Go to Previous Class</a>
                        <a href="#" class="btn btn-success">Mark as Complete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Get all sidebar links
        const classLinks = document.querySelectorAll('.class-link');
        const classVideo = document.getElementById('classVideo');
        const classTitle = document.getElementById('classTitle');

        // Add event listener to each class link
        classLinks.forEach((link, index) => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all links
                classLinks.forEach((link) => link.classList.remove('active'));

                // Add active class to the clicked link
                this.classList.add('active');

                // Get video link from the data attribute
                const videoLink = this.getAttribute('data-videolink');

                // Debugging: Log the video link to the console
                console.log("Selected video link:", videoLink);

                // Update video iframe source
                classVideo.src = videoLink;

                // Update class title dynamically
                classTitle.textContent = `Class Title: Class ${index + 1}`;
            });
        });
    </script>
</body>

</html>